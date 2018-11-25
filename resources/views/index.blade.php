@extends('layout')

@section('content')

    <script>
        var pages = [
            @foreach ($pages as $index => $page)
            {
                "id": "{{$index}}",
                "title": "{{ $page->get('title') }}",
                "type": "pages",
            },
            @endforeach
            @foreach ($collections as $collection)
            @foreach ($entries as $index => $entry)
            @if (strtolower($collection->get('title')) == $entry->collectionName())
            {
                "id": "{{$index}}",
                "title": "{{ $entry->get('title') }}",
                "type": "{{$entry->collectionName()}}",
            },
            @endif
            @endforeach
            @endforeach
        ]

    </script>

    <div class="flexy mb-24">
        <h1>Menu editor</h1>
    </div>

    <div class="row">

        <div class="col-md-5">

            <div class="card flush">
                <div class="dossier-table-wrapper">
                    <table class="dossier has-checkboxes">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Content
                                </th>

                            </tr>
                            <tr>
                                <th colspan="2">
                                    <input v-model="query" type="search" placeholder="Search for a page, entry or collection" class="form-control">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                            <tr is="menus-fieldtype" colspan="2"></tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <button  type="button" class="btn float-left">
                                        Select all
                                    </button>
                                    <button type="button" class="btn btn-primary add-row float-right">
                                    Add to menu
                                    <i class="icon icon-plus icon-right"></i>
                                </button>
                                </td>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="card flush">
                <div class="head">
                    Aangepaste links
                </div>
            </div>

        </div>

        <div class="col-md-7">

            <div class="card flush">

                <div class="page-tree">

                    {{-- <script type="application/json">
                    {
                      "nestables": [
                        {
                          "id": "72c016c6-cc0a-4928-b53b-3275f3f6da0a",
                          "order": 1,
                          "title": "About Me",
                          "url": "/about",
                          "uri": "/about",
                          "extension": "md",
                          "edit_url": "http://statamic.localhost/cp/pages/edit/about",
                          "create_child_url": "http://statamic.localhost/cp/pages/create/about",
                          "slug": "about",
                          "published": true,
                          "has_entries": false,
                          "create_entry_url": "http://statamic.localhost/cp/collections/entries//create",
                          "entries_url": "http://statamic.localhost/cp/collections/entries",
                          "collapsed": false,
                          "items": []
                        },
                        {
                          "id": "60962021-f154-4cd2-a1d7-035a12b6da9e",
                          "order": 2,
                          "title": "My Magical Blogventure",
                          "url": "/blog",
                          "uri": "/blog",
                          "extension": "md",
                          "edit_url": "http://statamic.localhost/cp/pages/edit/blog",
                          "create_child_url": "http://statamic.localhost/cp/pages/create/blog",
                          "slug": "blog",
                          "published": true,
                          "has_entries": true,
                          "create_entry_url": "http://statamic.localhost/cp/collections/entries/blog/create",
                          "entries_url": "http://statamic.localhost/cp/collections/entries/blog",
                          "collapsed": false,
                          "items": []
                        },
                        {
                          "id": "3cd2d431-699c-417c-8d57-9183cd17a6fc",
                          "order": 3,
                          "title": "Gallery",
                          "url": "/gallery",
                          "uri": "/gallery",
                          "extension": "md",
                          "edit_url": "http://statamic.localhost/cp/pages/edit/gallery",
                          "create_child_url": "http://statamic.localhost/cp/pages/create/gallery",
                          "slug": "gallery",
                          "published": true,
                          "has_entries": false,
                          "create_entry_url": "http://statamic.localhost/cp/collections/entries//create",
                          "entries_url": "http://statamic.localhost/cp/collections/entries",
                          "collapsed": false,
                          "items": []
                        },
                        {
                          "id": "26a4ce21-d768-440d-806b-213918df0ee0",
                          "order": 4,
                          "title": "Favorite Things",
                          "url": "/things",
                          "uri": "/things",
                          "extension": "md",
                          "edit_url": "http://statamic.localhost/cp/pages/edit/things",
                          "create_child_url": "http://statamic.localhost/cp/pages/create/things",
                          "slug": "things",
                          "published": true,
                          "has_entries": true,
                          "create_entry_url": "http://statamic.localhost/cp/collections/entries/things/create",
                          "entries_url": "http://statamic.localhost/cp/collections/entries/things",
                          "collapsed": false,
                          "items": []
                        },
                        {
                          "id": "de627bca-7595-429e-9b41-ad58703916d7",
                          "order": 5,
                          "title": "Contact",
                          "url": "/contact",
                          "uri": "/contact",
                          "extension": "md",
                          "edit_url": "http://statamic.localhost/cp/pages/edit/contact",
                          "create_child_url": "http://statamic.localhost/cp/pages/create/contact",
                          "slug": "contact",
                          "published": true,
                          "has_entries": false,
                          "create_entry_url": "http://statamic.localhost/cp/collections/entries//create",
                          "entries_url": "http://statamic.localhost/cp/collections/entries",
                          "collapsed": false,
                          "items": []
                        }
                      ]
                    }
                    </script> --}}

                    <page-tree inline-template v-cloak>

                        <div :class="{'page-tree': true, 'show-urls': showUrls}">

                            <branches :pages="pages" :depth="1" :sortable="isSortable" :dirty="changed"></branches>

                        </div>

                    </page-tree>

                </div>

            </div>

        </div>

    </div>


@endsection
