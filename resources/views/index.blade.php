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


        // Statamic.Publish = {
        //     pages: {!! json_encode($pages) !!}
        // };

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

                            <tr v-for="(index, page) of pages">
                                <td class="checkbox-col">
                                    <input type="checkbox" id="checkbox-@{{index}}">
                                    <label for="checkbox-@{{index}}"></label>
                                </td>
                                <td class="cell-title first-cell">
                                    <span class="column-label"></span>
                                    @{{ page.title }} <span class="text-muted">(@{{page.type}})</span>
                                </td>
                            </tr>


                @foreach ($pages as $index => $page)
                    {{-- <tr>
                        <td class="checkbox-col">
                            <input type="checkbox" id="checkbox-{{$index}}">
                            <label for="checkbox-{{$index}}"></label>
                        </td>
                        <td class="cell-title first-cell">
                            <span class="column-label"></span>
                            {{ $page->get('title') }} <span class="text-muted">(Pages)</span>
                        </td>
                </tr> --}}
                @endforeach

                {{-- @foreach ($collections as $collection)

                    @foreach ($entries as $index => $entry)

                        @if (strtolower($collection->get('title')) == $entry->collectionName())

            <tr>
                <td class="checkbox-col">
                    <input type="checkbox" id="checkbox-{{$index}}">
                    <label for="checkbox-{{$index}}"></label>
                </td>
                <td class="cell-title first-cell">
                    <span class="column-label"></span>
                    {{$entry->get('title')}} <span class="text-muted">({{$entry->collectionName()}})</span>
                </td>
        </tr>

    @endif

    @endforeach

                @endforeach --}}

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

            {{-- @foreach ($collections as $collection)
            <div class="card flush">
                <div class="dossier-table-wrapper">
                    <table class="dossier has-checkboxes">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    {{ $collection->get('title') }}
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($entries as $index => $entry)

                                @if (strtolower($collection->get('title')) == $entry->collectionName())

                    <tr>
                        <td class="checkbox-col">
                            <input type="checkbox" id="checkbox-{{$index}}">
                            <label for="checkbox-{{$index}}"></label>
                        </td>
                        <td class="cell-title first-cell">
                            <span class="column-label"></span>
                            {{$entry->get('title')}}
                        </td>
                </tr>

            @endif

            @endforeach

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
            @endforeach --}}

            <div class="card flush">
                <div class="head">
                    Aangepaste links
                </div>
            </div>

        </div>

        <div class="col-md-7">

            <div class="card flush">

                <div class="head">

                    <ul class="uk-nestable" data-uk-nestable>
        <li class="uk-nestable-item">
            <div class="uk-nestable-panel">Lorem ipsum</div>
        </li>
        <li class="uk-nestable-item">
            <div class="uk-nestable-panel">Lorem ipsum</div>
        </li>
        <li class="uk-nestable-item">
            <div class="uk-nestable-panel">Lorem ipsum</div>
        </li>
        <li class="uk-nestable-item">
            <div class="uk-nestable-panel">Lorem ipsum</div>
        </li>
        <li class="uk-nestable-item">
            <div class="uk-nestable-panel">Lorem ipsum</div>
        </li>
    </ul>

                        {{-- <tbody>

                            <tr>

                                <td class="checkbox-col">
                                    <input type="checkbox" id="checkbox-">
                                    <label for="checkbox-"></label>
                                </td>
                                <td class="cell-title first-cell">
                                    <span class="column-label"></span>
                                    Title <span class="text-muted">(type)</span>
                                </td>

                            </tr>
                        </tbody> --}}
                    </table>

                </div>
            </div>

        </div>
    </div>


@endsection
