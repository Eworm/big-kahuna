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
     * Return all pages in menu as an array
     *
     * @return array
     */
    public function json()
    {
        $pages = $this->storage->getJSON('pages');
        if (!empty($pages)) {
            return [
                'pages' => $this->getJsonItems($pages)
            ];
        }
    }

    /**
     * Return a single branch object
     *
     * @return array
     */
    private function getJsonItems ($pages)
    {
        $newpages = [];
        foreach ($pages as $item) {
            $id = $item['id'];
            $content = Content::find($id);

            $newpages[] = (object) [
                'id'                => $id,
                'order'             => $item['order'],
                'type'              => $item['type'],
                'title'             => $item['title'],
                'original_title'    => $this->itemTitle($item),
                'url'               => $this->itemUrl($item),
                'items'             => $this->getJsonItems($item['items']),
                'pages'             => $item['pages']
            ];
        }
        return $newpages;
    }

    /**
     * Return the branch title
     *
     * @return string
     */
    private function itemTitle($item)
    {
        $id = $item['id'];
        $content = Content::find($id);

        if ($item['type'] == 'Custom') {
            return $item['title'];
        } else {
            return $content->get('title');
        }
    }

    /**
     * Return the branch url
     *
     * @return string
     */
    private function itemUrl($item)
    {
        $id = $item['id'];
        $content = Content::find($id);

        if ($item['type'] == 'Custom') {
            return $item['url'];
        } else {
            return $content->absoluteUrl();
        }
    }

    /**
     * Return all content as json
     *
     * @return json
     */
    private function getItems($request)
    {
        $items = Content::all();

        if ($request->has('q')){

            $items = $items->filter(function($item) use ($request) {
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
                    "type"      => 'Pages',
                ];
            } elseif ($entry->contentType() == 'entry') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->get('title'),
                    "type"      => $entry->collectionName(),
                ];
            } elseif ($entry->contentType() == 'term') {
                return [
                    'id'        => $entry->id(),
                    "title"     => $entry->id(),
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
    private function contentType()
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
     * @return array
     */
    public function save()
    {
        get('token', function () {
            return csrf_token();
        });

        // Grab the JSON payload
        $pages = $this->request->input('pages');

        // Save a new json with only the above options
        $this->storage->putJSON('pages', $this->saveJsonItems($pages));

        return [
            'success' => true,
            'message' => 'Pages updated successfully.'
        ];

    }

    /**
     * Return a single branch object for saving
     *
     * @return array
     */
    private function saveJsonItems ($pages)
    {
        $newpages = [];
        foreach ($pages as $page) {
            $id = $page['id'];
            $content = Content::find($id);

            if ($page['type'] == 'Custom') {

                $newpages[] = (object) [
                    'id'                => $id,
                    'order'             => $page['order'],
                    'type'              => $page['type'],
                    'title'             => $page['title'],
                    'url'               => $page['url'],
                    'items'             => $this->saveJsonItems($page['items']),
                    'pages'             => $page['pages']
                ];

            } else {

                $newpages[] = (object) [
                    'id'                => $id,
                    'order'             => $page['order'],
                    'type'              => $page['type'],
                    'title'             => $page['title'],
                    'items'             => $this->saveJsonItems($page['items']),
                    'pages'             => $page['pages']
                ];

            }
        }
        return $newpages;
    }
}
