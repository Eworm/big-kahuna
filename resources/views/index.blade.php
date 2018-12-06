@extends('layout')

@section('content')

<menus-list-page inline-template>
    <div class="flex items-center mb-3">
        <h1 class="flex-1">Menus</h1>
        <a href="{{ route('addons.menu_editor.create') }}" class="btn btn-primary">Add New Menu</a>
    </div>

    <div class="card flush">
        <div class="dossier-table-wrapper">
            <table class="dossier">
                <tbody>
                    @foreach ($menus as $menu)
                    <tr>
                        <td class="cell-title first-cell">
                            <span class="column-label">Title</span>
                            <a href="{{ route('addons.menu_editor.edit', $menu) }}">
                                {{ ucwords(str_replace('-', ' ', $menu)) }}
                            </a>
                        </td>

                        <td class="cell-slug">
                            <span class="column-label">Slug</span>
                            {{ $menu }}
                        </td>

                        <td class="column-actions">
                            <div class="btn-group action-more">
                                <button type="button" class="btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon icon-dots-three-vertical"></i> </button>
                                <ul class="dropdown-menu">
                                    <li class="warning" @click="deleteMenu('{{ $menu }}')">
                                        <a href="#">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</menus-list-page>

@endsection
