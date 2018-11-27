@extends('layout')

@section('content')

    <script>

        var allpages = [
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

    <my-page-tree inline-template v-cloak>

        <div id="pages">

            <div class="flex items-center flex-wrap mb-3">

            <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">Menu editor</h1>

            <div class="controls flex flex-wrap justify-center md:block items-center w-full md:w-auto">
                <div class="btn-group btn-group-primary ml-1" v-if="arePages && changed">
                    <button type="button" class="btn btn-primary" v-if="! saving" @click="save">
                        Save Changes
                    </button>
                    <span class="btn btn-primary btn-has-icon-right disabled" v-if="saving">
                        Saving <i class="icon icon-circular-graph animation-spin"></i>
                    </span>
                </div>
            </div>

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
                                            <button type="button" class="btn btn-primary add-row float-right">
                                                Add to menu
                                                <i class="icon icon-plus icon-right"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                </div>

                <div class="col-md-7">

                    <div class="page-tree">

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
                            <mybranches
                                :pages="pages"
                                :depth="1"
                                :sortable="isSortable"
                                :dirty="!dirty">
                            </mybranches>

                            <br>
                            <pre>
                            @{{ pages | json }}
                            </pre>

                        </div>

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

                </div>

            </div>
            
        </div>

    </my-page-tree>

@endsection
