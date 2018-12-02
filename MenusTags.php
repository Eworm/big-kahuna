<?php

namespace Statamic\Addons\Menus;

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
        //
        $pages          = $this->storage->getJSON('pages');
        $id             = ($this->getParam('id')) ? $this->getParam('id') : "";
        $class          = ($this->getParam('class')) ? $this->getParam('class') : "nav";
        $activeClass    = ($this->getParam('active_class')) ? $this->getParam('active_class') : "is--active";
        $itemClass      = ($this->getParam('item_class')) ? $this->getParam('item_class') : "nav__item";
        $submenuClass   = ($this->getParam('submenu_class')) ? $this->getParam('submenu_class') : "nav__submenu";

        //
        $html = '';
        $html .= '<ul id="' . $id . '" class="' . $class . '">';
        foreach ($pages as $page) {
            $html .= '<li class="' . $itemClass . '">';
            $html .= '<a href="' . $page["url"] . '" title="">';
            $html .= $page["title"];
            $html .= '</a>';

            if ($page['items']) {

                $html .= '<ul class="' . $submenuClass . '">';
                    foreach ($page['items'] as $item) {

                        $html .= '<li class="">';
                        $html .= '<a href="' . $item["url"] . '" title="">';
                        $html .= $item["title"];
                        $html .= '</a>';
                        $html .= '</li>';
                    }
                $html .= '</ul>';

            }

            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;

    }
}
