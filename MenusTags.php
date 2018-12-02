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
        $pages = $this->storage->getJSON('pages');

        //
        $html = '';
        $html .= '<ul class="nav navbar-nav">';
        foreach ($pages as $page) {
            $html .= '<li>';
            $html .= '<a href="' . $page["url"] . '" title="">';
            $html .= $page["title"];
            $html .= '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;

    }
}
