Vue.component('menus-fieldtype', {

    mixins: [Fieldtype],

    template: `<div class="card flush">
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
                <tr v-for="(index, page) of allpages">
                <td class="checkbox-col">
                <input type="checkbox" id="checkbox-{{index}}">
                <label for="checkbox-{{index}}"></label>
                </td>
                <td class="cell-title first-cell">
                <span class="column-label"></span>
                {{ page.title }} <span class="text-muted">({{page.type}})</span>
                </td>
                </tr></tbody>
                <tfoot>
                <tr>
                <td colspan="2">
                <button type="button" class="btn btn-primary add-row float-right">
                Add to menu
                <i class="icon icon-plus icon-right"></i>
                </button>
                </td>
                </tfoot>
                </table>
                </div>
                </div>`,

    data: function() {
        return {
            allpages
        };
    },

    computed: {
        //
    },

    methods: {
        //
    },

    ready: function() {
        //
    }

});

// $.getJSON("menus/json", function(json) {
//     console.log(json); // this will show the info it in firebug console
// });
