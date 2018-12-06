<?php

namespace Statamic\Addons\BigKahuna;

use Statamic\API\Content;
use Statamic\Extend\Tags;

class BigKahunaTags extends Tags
{
    /**
     * The {{ menus }} tag
     *
     * @return string|array
     */
    public function index()
    {
        // Get the pages from storaBigKahunad return proper html
        $pages = $this->storage->getJSON($this->getParam('name'));
        return $this->getItems($pages);
    }

    /**
     * The recursive list
     *
     * @return html
     */
    private function getItems($pages, $root = true)
    {
        $id                     = ($this->getParam('id')) ? $this->getParam('id') : "";
        $class                  = ($this->getParam('class')) ? $this->getParam('class') : "nav";
        $itemClass              = ($this->getParam('item_class')) ? $this->getParam('item_class') : "nav__item";
        $submenu_class          = ($this->getParam('submenu_class')) ? $this->getParam('submenu_class') : "submenu";
        $submenu_item_class     = ($this->getParam('submenu_item_class')) ? $this->getParam('submenu_item_class') : "submenu__item";
        $activeClass            = ($this->getParam('active_class')) ? $this->getParam('active_class') : "is--active";

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $html = '';

        if ($root == true) {
            // The root list
            $html .= '<ul id="' . $id . '" class="' . $class . '">';
        } else {
            // A submenu list
            $html .= '<ul class="' . $submenu_class . '">';
        }

        foreach ($pages as $page) {
            $id = $page['id'];
            $content = Content::find($id);

            if ($page['type'] == 'Custom') {
                // A custom link
                $html .= '<li class="' . $itemClass . '">';
            } else {
                // An internal link
                $isactive = '';
                if ($content->absoluteUrl() == $actual_link) {
                    $isactive = ' ' . $activeClass;
                }
                $html .= '<li class="' . $itemClass . $isactive . '">';
            }

            if ($page['type'] == 'Custom') {
                // A custom link
                $html .= '<a href="' . $page['url'] . '" title="' . $page['title'] . '" rel="external">';
            } else {
                // An internal link
                $html .= '<a href="' . $content->absoluteUrl() . '" title="' . $page['title'] . '">';
            }

            $html .= $page['title'];
            $html .= '</a>';

            if ($page['items']) {
                // Return the submenu html
                $html .= $this->getItems($page['items'], false);
            }

            $html .= '</li>';
        }

        $html .= '</ul>';
        return $html;
    }
}
