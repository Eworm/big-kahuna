@extends('layout')

@section('content')

<bkcreatemenu inline-template>

    <div id="bigkahuna">

        <div class="flex items-center flex-wrap mb-3">
            <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">New Menu</h1>
        </div>

        <div class="card p-1">
            <div class="fieldset-builder">

                <div class="form-group select-fieldtype w-full">
                    <label class="block">Name</label>
                    <input type="text" class="form-control mb-2" autofocus="autofocus" v-model="menuName">
                </div>

                <div class="form-group radio-fieldtype w-full">
                    <div class="field-inner">
                        <label class="block">Choose a locale</label>
                        <div class="radio-fieldtype-wrapper">
                            <ul class="list-unstyled">
                                @foreach ($locales as $locale)
                                <li>
                                    <input type="radio" name="locale" value="{{ $locale }}" id="{{ $locale }}[0]" v-model="locale">
                                    <label for="{{ $locale }}[0]">{{ $locale }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="form-group w-full">

                    <small class="help-block">The name will be slugified. Use that name in your templates (i.e. main-menu). Don't start the name with a dot.</small>
                    <button type="button" class="btn btn-primary" v-on:click="saveMenu">
                        Create Menu
                    </button>

                </div>

            </div>

        </div>

    </div>

</bkcreatemenu>

@endsection
