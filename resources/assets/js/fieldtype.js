Vue.component('menus-fieldtype', {

    mixins: [Fieldtype],

    template: `<table class="dossier has-checkboxes">
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
                                    <button type="button" class="btn btn-primary add-row float-right" @click="add">
                                        Add to menu
                                        <i class="icon icon-plus icon-right"></i>
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>`,

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

        add: function() {

            console.log('Adding..');

            //https://vuejs.org/v2/guide/reactivity.html
            // Vue.set(vm.pages, 'b', 2)
            // this.$set(this.pages, 'b', 2)
            console.log(this.allpages);
            this.allpages = Object.assign({}, this.allpages, {
                a: 1,
                b: 2
            })


            // var self = this;
            //
            // self.saving = true;
            //
            // var pages = JSON.parse(JSON.stringify(self.pages));
            // pages = self.updateOrderIndexes(pages);
            //
            // console.log('Saving..');
            // console.log(pages);
            //
            // // this.$http.post(cp_url('/pages'), { pages: pages }).success(function(data) {
            // this.$http.post('http://statamic.localhost/cp/addons/menus/save', { pages: pages }).success(function(data) {
            //     self.getPages();
            //     self.changed = false;
            //     self.saving = false;
            //     self.$dispatch('setFlashSuccess', translate('cp.pages_reordered'))
            // });
        },
    },

    ready: function() {
        //
    }

});
