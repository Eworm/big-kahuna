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
        $id             = $this->getParam('id');
        $class          = $this->getParam('class');
        $activeClass    = $this->getParam('active_class');
        $itemClass      = $this->getParam('item_class');
        $submenuClass      = $this->getParam('submenu_class');

        //
        $html = '';
        $html .= '<ul id="' . $id . '" class="' . $class . '">';
        foreach ($pages as $page) {
            $html .= '<li class="' . $itemClass . '">';
            $html .= '<a href="' . $page["url"] . '" title="">';
            $html .= $page["title"];
            $html .= '</a>';

            $html .= '<ul class="' . $submenuClass . '">';
            foreach ($page['items'] as $item) {

                $html .= '<li class="">';
                $html .= '<a href="' . $item["url"] . '" title="">';
                $html .= $item["title"];
                $html .= '</a>';
                $html .= '</li>';
            }
            $html .= '</ul>';

            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;

    }
}
