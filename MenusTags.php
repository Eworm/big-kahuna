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
     * The {{ menus }} tag
     *
     * @return array
     */
    private function getItems($pages)
    {

        $id             = ($this->getParam('id')) ? $this->getParam('id') : "";
        $class          = ($this->getParam('class')) ? $this->getParam('class') : "nav";
        $activeClass    = ($this->getParam('active_class')) ? $this->getParam('active_class') : "is--active";
        $itemClass      = ($this->getParam('item_class')) ? $this->getParam('item_class') : "nav__item";
        $submenuClass   = ($this->getParam('submenu_class')) ? $this->getParam('submenu_class') : "submenu";

        $html = '';
        $html .= '<ul id="' . $id . '" class="' . $class . '">';

        foreach ($pages as $page) {
            $id = $page['id'];
            $content = Content::find($id);

            $html .= '<li class="' . $itemClass . '">';
            $html .= '<a href="' . $content->absoluteUrl() . '" title="">';
            $html .= $page['title'];
            $html .= '</a>';

            if ($page['items']) {
                $html .= $this->getItems($page['items']);
            }

            $html .= '</li>';
        }

        $html .= '</ul>';
        return $html;
    }
}
