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
                                    {{-- <button  type="button" class="btn float-left">
                                        Select all
                                    </button> --}}
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

            <div class="page-tree">

                <page-tree inline-template v-cloak>

                    <div id="pages">

                        <div :class="{'page-tree': true, 'show-urls': showUrls}">
                            <div class="loading" v-if="loading">
                                <span class="icon icon-circular-graph animation-spin"></span> Loading
                            </div>

                            <div class="saving" v-if="saving">
                                <div class="inner">
                                    <i class="icon icon-circular-graph animation-spin"></i> Saving
                                </div>
                            </div>

                            {{-- Keeping this or else drag & drop won't work --}}
                            <ul class="tree-home list-unstyled" v-if="!loading">
                            </ul>

                            <branches
                                :pages="items"
                                :depth="1"
                                :sortable="isSortable"
                                :dirty="!dirty">
                            </branches>

                            {{-- <branches :pages="childPages"
                                      :depth="depth + 1"
                                      :parent-url="url"
                                      :collapsed.sync="collapsed"
                                      :sortable="sortable"
                                      :dirty="dirty"
                                      v-if="!home">
                            </branches> --}}

                        </div>

                        <create-page :locale="locale"></create-page>
                        <mount-collection></mount-collection>
                        <audio v-el:click>
                            <source src="/index.php/_resources/cp/audio/click.mp3" type="audio/mp3">
                        </audio>
                        <audio v-el:card_drop>
                            <source src="/index.php/_resources/cp/audio/card_drop.mp3" type="audio/mp3">
                        </audio>
                        <audio v-el:card_set>
                            <source src="/index.php/_resources/cp/audio/card_set.mp3" type="audio/mp3">
                        </audio>

                    </div>

                </page-tree>

            </div>

        </div>

    </div>

@endsection
