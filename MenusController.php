<?php

namespace Statamic\Addons\Menus;

use Statamic\API\Page;
use Statamic\API\Collection;
use Statamic\API\Entry;
use Statamic\Extend\Controller;
use Statamic\Contracts\Data\Pages\PageTreeReorderer;

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

    public function allpages()
    {
        return [
            'allpages'        => $this->getItems(),
        ];
    }

    public function json()
    {
        return [
            // $this->getItems(),
            'pages'        => $this->storage->getJSON('pages')
        ];
    }

    private function getItems()
    {
        $index = 0;
        return Entry::all()->map(function ($entry) use (&$index) {

            return [
                'id'                => $entry->id(),
                "title"             => $entry->get('title'),
                "type"              => 'Pages'
            ];

        });
    }

    /**
     * Page tree save submission
     *
     * @param PageTreeReorderer $reorderer
     * @return array
     */
    public function save(PageTreeReorderer $reorderer)
    // public function save()
    {
        get('token', function () {
            return csrf_token();
        });

        // $this->authorize('pages:reorder');

        // Grab the JSON payload
        $tree = $this->request->input('pages');

        // $reorderer->reorder($tree);

        // Stache::update();

        // event(new PagesReordered);

        $this->storage->putJSON('pages', $tree);

        return [
            'tree' => var_dump($tree),
            'success' => true,
            'message' => 'Pages updated successfully.'
        ];

    }
}
