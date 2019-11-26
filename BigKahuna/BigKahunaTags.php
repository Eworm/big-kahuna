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
        // Get the pages from storage and return proper html
        $pages = $this->storage->getJSON($this->getParam('menu'));
        if ($pages) {
            return $this->getItems($pages['pages'], $pages['locale']);
        }
    }

    /**
     * The recursive list
     *
     * @return html
     */
     private function getItems($pages, $locale, $root = true)
     {
         $menu                   = ($this->getParam('menu')) ? ' ' . $this->getParam('menu') : "";
         $id                     = ($this->getParam('id')) ? $this->getParam('id') : "";
         $class                  = ($this->getParam('class')) ? $this->getParam('class') : "nav";
         $itemClass              = ($this->getParam('item_class')) ? $this->getParam('item_class') : "nav__item";
         $linkClass              = ($this->getParam('link_class')) ? $this->getParam('link_class') : "nav__link";
         $parentClass            = ($this->getParam('parent_class')) ? $this->getParam('parent_class') : "nav__item--parent";
         $parentLinkClass        = ($this->getParam('parent_link_class')) ? $this->getParam('parent_link_class') : "nav__item--toggle";
         $submenu_class          = ($this->getParam('submenu_class')) ? $this->getParam('submenu_class') : "submenu";
         $submenu_item_class     = ($this->getParam('submenu_item_class')) ? $this->getParam('submenu_item_class') : "submenu__item";
         $activeClass            = ($this->getParam('active_class')) ? $this->getParam('active_class') : "is--active";

         $actual_link = "$_SERVER[REQUEST_URI]";

         $html = '';

         if ($root == true) {
             // The root list
             $html .= '<ul id="' . $id . '" class="' . $class . $menu . '">';
         } else {
             // A submenu list
             $itemClass = $submenu_item_class;
             $html .= '<ul class="' . $submenu_class . '">';
         }

         foreach ($pages as $page) {
             $id               = $page['id'];
             $myClassname      = ' ' . $page['classname'];
             $isParent         = $page['items'] ? ' ' . $parentClass    : '';
             $isParentLink     = $page['items'] ? ' ' . $parentLinkClass: '';
             $parentAttributes = $page['items'] ? ' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"': '';

             if ($page['linktitle'] != '') {
                 $myLinkTitle = $page['linktitle'];
             } else {
                 $myLinkTitle = $page['title'];
             }
             $content = Content::find($id);

             if ($page['type'] == 'Custom') {
                 // A custom link
                 $html .= '<li class="' . $itemClass . $isParent . $myClassname .'">';
             } else {
                 if ($content) {
                     $isactive = '';
                     if ($content->in($locale)->url() == $actual_link || $this->getChildActiveStatus($page, $actual_link)) {
                         $isactive = ' ' . $activeClass;
                     }
                 }
                 $html .= '<li class="' . $itemClass . $isParent . $isactive . $myClassname . '">';
             }

             if ($page['type'] == 'Custom') {
                 // A custom link
                 $html .= '<a class="' . $linkClass . $isParentLink . '"' . $parentAttributes . ' href="' . $page['url'] . '" title="' . $myLinkTitle . '" rel="external">';
             } else {
                 // An internal link
                 if ($content) {
                     $html .= '<a class="' . $linkClass . $isParentLink . '"' . $parentAttributes . ' href="' . $content->in($locale)->url() . '" title="' . $myLinkTitle . '">';
                 }
             }

             if ($content || $page['type'] == 'Custom') {
                 $html .= $page['title'];
                 $html .= '</a>';
             }

             if ($page['items']) {
                 // Return the submenu html
                 $html .= $this->getItems($page['items'], $locale, false);
             }

             $html .= '</li>';
         }

         $html .= '</ul>';
         return $html;
     }

    public function getChildActiveStatus($page, $actual_link)
    {
        foreach ($page['items'] as $child) {
            $child_content = Content::find($child['id']);

            if ($child_content && $child_content->url() == $actual_link) {
                return true;
            } else {
                return $this->getChildActiveStatus($child, $actual_link);
            }
        }

        return false;
    }
}
