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
        return $this->view('index', [
            'items' => $this->getItems($request)
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
     * Return all pages in menu as json
     *
     * @return array
     */
    public function json()
    {
        $pages      = $this->storage->getJSON('pages');
        $newpages   = [];

        foreach ($pages as $item) {
            $id      = $item['id'];
            $content = Content::find($id);

            $newpages[] = (object) [
                'id'                => $id,
                'order'             => $item['order'],
                'type'              => $item['type'],
                'title'             => $item['title'],
                'original_title'    => $content->get('title'),
                'url'               => $content->slug(),
                'items'             => $item['items'],
                'pages'             => $item['pages']
            ];
        }

        return [
            'pages' => $newpages
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
                if (stripos($item->get('title'), $request->q) !== false || stripos($item->id(), $request->q) !== false) {
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
                    // "url"       => $entry->uri(),
                    "type"      => 'Pages',
                ];
            } elseif ($entry->contentType() == 'entry') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->get('title'),
                    // "url"       => $entry->uri(),
                    "type"      => $entry->collectionName(),
                ];
            } elseif ($entry->contentType() == 'term') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->id(),
                    // "url"       => $entry->uri(),
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
    {
        get('token', function () {
            return csrf_token();
        });

        // Grab the JSON payload
        $tree       = $this->request->input('pages');
        $newpages   = [];

        // Add only the usefull info to the json
        foreach ($tree as $item) {
            $id      = $item['id'];
            $newpages[] = (object) [
                'id'        => $id,
                'order'     => $item['order'],
                'type'      => $item['type'],
                'title'     => $item['title'],
                'items'     => $item['items'],
                'pages'     => $item['pages']
            ];
        }

        // Save a new json with only the above options
        $this->storage->putJSON('pages', $newpages);

        return [
            'success' => true,
            'message' => 'Pages updated successfully.'
        ];

    }
}
