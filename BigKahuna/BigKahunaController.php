<?php

namespace Statamic\Addons\BigKahuna;

use Statamic\Data\Data;
use Statamic\API\Config;
use Statamic\API\Page;
use Statamic\API\Collection;
use Statamic\API\Entry;
use Statamic\API\Content;
use Statamic\Contracts\Data\Pages\PageTreeReorderer;
use Statamic\Events\Data\AddonSettingsSaved;
use Statamic\Extend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BigKahunaController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $menus_storage = Storage::files('/site/storage/addons/BigKahuna');
        $menus = [];

        if (!$menus_storage) {
            return redirect()->route('addons.menu_editor.create');
        }

        foreach ($menus_storage as $menu) {
            $add = str_replace('site/storage/addons/BigKahuna/', '', $menu);
            $add = str_replace('.json', '', $add);
            $menu = $this->storage->getJSON($add);
            $locale = $menu['locale'];
            $menus[] = [
                'name' => $add,
                'locale' => $locale
            ];
        }

        return $this->view('index', [
            'menus' => $menus
        ]);
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function edit(Request $request)
    {
        $menu = $this->storage->getJSON($request->menu);
        $locale = $menu['locale'];

        return $this->view('edit', [
            'items' => $this->getItems($request, $locale),
            'locale' => $locale,
            'menu' => $request->menu
        ]);
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        return $this->view('create', [
            'locales' => collect(Config::getLocales())
        ]);
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $menu_name = str_slug($request->menu_name);
        $locale = $request->locale;

        $this->storage->putJSON($menu_name, ['locale' => $locale]);

        return [
            'success' => true,
            'message' => 'Pages updated successfully.',
            'menu'    => $menu_name
        ];
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function destroy(Request $request)
    {
        Storage::delete('site/storage/addons/BigKahuna/' . $request->menu . '.json');

        return [
            'success' => true,
            'message' => 'Menu deleted successfully'
        ];
    }

    /**
     * Return all content as json
     *
     * @return json
     */
    public function allpages(Request $request)
    {
        $locale = $request['locale'];

        return [
            'allpages' => $this->getItems($request, $locale),
        ];
    }

    /**
     * Return the site locales
     *
     * @return json
     */
    public function alllocales(Request $request)
    {
        $locales = [];
        foreach (Config::getLocales() as $locale) {
            $locales[] = (object) [
                'code' => $locale
            ];
        }
        return $locales;
    }

    /**
     * Return all pages in menu as an array
     *
     * @return array
     */
    public function json(Request $request)
    {
        $pages = $this->storage->getJSON($request->menu);
        if (!empty($pages['pages'])) {
            return [
                'pages' => $this->getJsonItems($pages['pages'], $pages['locale'])
            ];
        }
    }

    /**
     * Return a single branch object
     *
     * @return array
     */
     private function getJsonItems($pages, $locale)
     {
         $newpages = [];
         foreach ($pages as $item) {
             $id = $item['id'];

             if (Content::exists($id) || $item['type'] == 'Custom') {
                 $newpages[] = (object) [
                     'id'             => $id,
                     'order'          => $item['order'],
                     'type'           => $item['type'],
                     'title'          => $item['title'],
                     'original_title' => $this->itemTitle($item, $locale),
                     'url'            => $this->itemUrl($item, $locale),
                     'classname'      => $this->itemClassname($item),
                     'linktitle'      => $this->itemLinkTitle($item),
                     'items'          => $this->getJsonItems($item['items'], $locale),
                     'pages'          => $item['pages']
                 ];
             }
         }
         return $newpages;
     }

    /**
     * Return the branch title
     *
     * @return string
     */
    private function itemTitle($item, $locale)
    {
        $id = $item['id'];
        $content = Content::find($id);

        if ($item['type'] == 'Custom') {
            return $item['original_title'];
        } else {
            if ($content) {
                return $content->in($locale)->get('title');
            }
        }
    }

    /**
     * Return the branch url
     *
     * @return string
     */
    private function itemUrl($item, $locale)
    {
        $id = $item['id'];
        $content = Content::find($id);

        if ($item['type'] == 'Custom') {
            return $item['url'];
        } else {
            if ($content) {
                return $content->in($locale)->url();
            }
        }
    }

    /**
     * Return the branch classname
     *
     * @return string
     */
    private function itemClassname($item)
    {
        if (isset($item['classname'])) {
            return $item['classname'];
        } else {
            return '';
        }
    }

    /**
     * Return the branch classname
     *
     * @return string
     */
    private function itemLinkTitle($item)
    {
        if (isset($item['linktitle'])) {
            return $item['linktitle'];
        } else {
            return '';
        }
    }

    /**
     * Return all content as json
     *
     * @return json
     */
     private function getItems($request, $locale)
     {
         $items = Content::all();

         if ($request->has('q')) {
             $items = $items->filter(function ($item) use ($request, $locale) {

                 if ($item->contentType() == 'page') {
                     if (stripos($item->in($locale)->get('title'), $request->q) !== false || stripos($item->id(), $request->q) !== false || stripos($item->path(), $request->q) !== false) {
                         return true;
                     }
                 } elseif ($item->contentType() == 'entry') {
                     if (stripos($item->in($locale)->get('title'), $request->q) !== false || stripos($item->id(), $request->q) !== false || stripos($item->collectionName(), $request->q) !== false) {
                         return true;
                     }
                 } elseif ($item->contentType() == 'term') {
                     if (stripos($item->in($locale)->title(), $request->q) !== false || stripos($item->id(), $request->q) !== false || stripos($item->taxonomyName(), $request->q) !== false) {
                         return true;
                     }
                 }
                 return false;
             });
         }

         $entries = $items->filter(function ($entry) use ($locale) {
            return $entry->hasLocale($locale);
         });

         $return_entries = [];
         foreach ($entries as $entry) {
            $id = $entry->id();
            $title = $entry->in($locale)->get('title');
            if ($entry->contentType() == 'page' && $title != null) {
                $return_entries[] = [
                    'id'    => $id,
                    'title' => $title,
                    'type'  => 'Pages',
                ];
            } elseif ($entry->contentType() == 'entry') {
                $return_entries[] = [
                    'id'    => $id,
                    'title' => $title,
                    'type'  => ucwords(str_replace('-', ' ', $entry->collectionName()))
                ];
            } elseif ($entry->contentType() == 'term') {
                $return_entries[] = [
                    'id'    => $id,
                    'title' => $entry->in($locale)->title(),
                    'type'  => ucwords(str_replace('-', ' ', $entry->taxonomyName()))
                ];
            }
        }
        return $return_entries;
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
    public function save(Request $request)
    {
        get('token', function () {
            return csrf_token();
        });

        // Grab the JSON payload
        $pages = $this->request->all();

        // Save a new json with only the above options
        $this->storage->putJSON($request->menu, $pages);

        // Emit event
        event(new AddonSettingsSaved('site/storage/addons/BigKahuna/' . $request->menu . '.json', $pages));

        return [
            'success' => true,
            'message' => 'Pages updated successfully.'
        ];
    }
}
