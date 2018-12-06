@extends('layout')

@section('content')

<menus-create-page inline-template>
    <div>
        <div class="sticky flexy mb-3 full-width">
            <h1 class="fill"> Add Menu </h1>
            <button type="button" class="btn btn-primary" v-on:click="saveMenu">Create Menu</button>
        </div>
        <div class="px-3">
            <div class="card p-3">
                <div class="fieldset-builder">
                    <div class="form-group">
                        <label class="block">Menu Name</label>
                        <small class="help-block">The name will be converted to a slugified version that you'll use to reference in your templates (i.e. main-menu)</small>
                        <input type="text" class="form-control mb-2" autofocus="autofocus" v-model="menuName">
                    </div>
                </div>
            </div>
        </div>
    </div>
</menus-create-page>

@endsection
