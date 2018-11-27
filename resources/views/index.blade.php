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

    <div class="flexy mb-24">
        <h1>Menu editor</h1>
    </div>

    <div class="row">

        <div class="col-md-5">

            <menus-fieldtype></menus-fieldtype>

        </div>

        <div class="col-md-7">

            <div class="page-tree">

                <my-page-tree inline-template v-cloak>

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

                            <mybranches
                                :pages="pages"
                                :depth="1"
                                :sortable="isSortable"
                                :dirty="!dirty">
                            </mybranches>

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

                </my-page-tree>

            </div>

        </div>

    </div>

@endsection
