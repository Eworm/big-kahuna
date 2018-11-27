<?php

namespace Statamic\Addons\Menus;

use Statamic\API\Page;
use Statamic\API\Collection;
use Statamic\API\Entry;
use Statamic\Extend\Controller;

class MenusController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function index()
    {
        $pages          = Page::all(); // Returns PageCollection
        $collections    = Collection::all(); // Returns Illuminate\Support\Collection
        $entries        = Entry::all(); // Returns EntryCollection

        return $this->view('index', [
            'pages'         => $pages,
            'collections'   => $collections,
            'entries'       => $entries,
            'items'         => $this->getItems()
        ]);
    }

    public function json()
    {
        return [
            'pages'         => $this->getItems(),
            'pages1'        => $this->storage->getJSON('test')
        ];
    }

    private function getItems()
    {
        $index = 0;
        return Entry::whereCollection('blog')->map(function ($entry) use (&$index) {

            return [
                'id'                => $entry->id(),
                'url'               => $entry->url(),
                "order"             => $index++,
                "title"             => $entry->get('title'),
                "uri"               => "",
                "extension"         => "",
                "edit_url"          => "",
                "create_child_url"  => "",
                "slug"              => "",
                "published"         => true,
                "has_entries"       => true,
                "create_entry_url"  => "",
                "entries_url"       => "",
                "collapsed"         => false,
                "items"             => []
            ];

        });
    }
}
