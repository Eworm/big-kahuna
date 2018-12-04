<?php

namespace Statamic\Addons\Menus;

use Statamic\API\Content;
use Statamic\Extend\Tags;

class MenusTags extends Tags
{
    /**
     * The {{ menus }} tag
     *
     * @return string|array
     */
    public function index()
    {
        // Get the pages from storage and return proper html
        $pages = $this->storage->getJSON('pages');
        return $this->getItems($pages);
    }

    /**
     * The recursive list
     *
     * @return html
     */
    private function getItems($pages, $root = true)
    {

        $id             = ($this->getParam('id')) ? $this->getParam('id') : "";
        $class          = ($this->getParam('class')) ? $this->getParam('class') : "nav";
        $activeClass    = ($this->getParam('active_class')) ? $this->getParam('active_class') : "is--active";
        $itemClass      = ($this->getParam('item_class')) ? $this->getParam('item_class') : "nav__item";
        $submenuClass   = ($this->getParam('submenu_class')) ? $this->getParam('submenu_class') : "submenu";

        $html = '';

        if ($root == true) {
            // The root list
            $html .= '<ul id="' . $id . '" class="' . $class . '">';
        } else {
            // A submenu list
            $html .= '<ul  class="' . $submenuClass . '">';
        }

        foreach ($pages as $page) {
            $id = $page['id'];
            $content = Content::find($id);
            $html .= '<li class="' . $itemClass . '">';
            $html .= '<a href="' . $content->absoluteUrl() . '" title="">';
            $html .= $page['title'];
            $html .= '</a>';
            if ($page['items']) {
                $html .= $this->getItems($page['items'], false);
            }
            $html .= '</li>';
        }

        $html .= '</ul>';
        return $html;
    }
}
