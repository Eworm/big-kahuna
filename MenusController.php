<?php

namespace Statamic\Addons\Menus;

use Statamic\API\Page;
use Statamic\API\Collection;
use Statamic\API\Entry;
use Statamic\Extend\Controller;
use Statamic\API\Content;
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

    /**
     * Return all content as json
     *
     * @return json
     */
    public function allpages()
    {
        return [
            'allpages' => $this->getItems(),
        ];
    }

    /**
     * Return all pages as json
     *
     * @return json
     */
    public function json()
    {
        return [
            'pages' => $this->storage->getJSON('pages')
        ];
    }

    /**
     * Return all content as json
     *
     * @return json
     */
    private function getItems()
    {
        return Content::all()->map(function ($entry) {

            if ($entry->contentType() == 'page') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->get('title'),
                    "type"      => 'Pages',
                ];
            } elseif ($entry->contentType() == 'entry') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->get('title'),
                    "type"      => $entry->collectionName(),
                ];
            }

        });
    }

    /**
     * Get the content type
     *
     * @return string
     */
    public function contentType()
    {
        if ($this instanceof Page) {
            return 'page';
        } elseif ($this instanceof Entry) {
            return 'entry';
        } elseif ($this instanceof Term) {
            return 'term';
        } elseif ($this instanceof GlobalSet) {
            return 'globals';
        }
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
