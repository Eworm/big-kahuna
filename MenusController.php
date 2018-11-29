<?php

namespace Statamic\Addons\Menus;

use Statamic\API\Page;
use Statamic\API\Collection;
use Statamic\API\Entry;
use Statamic\API\Content;
use Statamic\Contracts\Data\Pages\PageTreeReorderer;
use Statamic\Extend\Controller;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        // $pages          = Page::all(); // Returns PageCollection
        // $collections    = Collection::all(); // Returns Illuminate\Support\Collection
        // $entries        = Entry::all(); // Returns EntryCollection

        return $this->view('index', [
            // 'pages'         => $pages,
            // 'collections'   => $collections,
            // 'entries'       => $entries,
            'items'         => $this->getItems($request)
        ]);
    }

    /**
     * Return all content as json
     *
     * @return json
     */
    public function allpages(Request $request)
    {
        return [
            'allpages' => $this->getItems($request),
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
    private function getItems($request)
    {
        $items = Content::all();

        if ($request->has('q')) {

            $items = $items->filter(function($item) use ($request)
            {
                if (stripos($item->get('title'), $request->q) !== false) {
                    return true;
                }
                return false;
            });

        }

        return $items->map(function ($entry) {

            if ($entry->contentType() == 'page') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->get('title'),
                    "url"       => $entry->uri(),
                    "type"      => 'Pages',
                ];
            } elseif ($entry->contentType() == 'entry') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->get('title'),
                    "url"       => $entry->uri(),
                    "type"      => $entry->collectionName(),
                ];
            } elseif ($entry->contentType() == 'term') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->id(),
                    "url"       => $entry->uri(),
                    "type"      => 'Term',
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
