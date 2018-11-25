<?php

namespace Statamic\Addons\Menus;

use Statamic\API\Page;
use Statamic\API\Collection;
use Statamic\API\Entry;
// use Statamic\Data\Content\ContentCollection;
// use Statamic\Data\Entries\Entry;
// use Statamic\Data\Entries\EntryCollection;
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
        $pages = Page::all(); // Returns PageCollection
        $collections = Collection::all(); // Returns Illuminate\Support\Collection
        $entries = Entry::all(); // Returns EntryCollection

        return $this->view('index', [
            'pages' => $pages,
            'collections' => $collections,
            'entries' => $entries
        ]);
    }
}
