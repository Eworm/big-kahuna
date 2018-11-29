<template>
    <table class="dossier has-checkboxes">
        <thead>
            <tr>
                <th colspan="2">
                    Content ({{ repoCount }})
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <input v-model="searchTerm" type="search" placeholder="Search for a page, entry or collection" class="form-control">
                </th>
            </tr>
        </thead>
        <tbody id="tbody">
            <tr v-for="(index, page) in allpages">
                <td class="checkbox-col">
                    <input type="checkbox" id="checkbox-{{index}}">
                    <label for="checkbox-{{index}}"></label>
                </td>
                <td class="cell-title first-cell">
                    <span class="column-label"></span>
                    {{ page.title }} <span class="text-muted">({{page.type}})</span>
                </td>
            </tr>
        </tbody>
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
    </table>
</template>

<script>
export default {

    // data: function() {
    //     allpages: {}
    // },

    data: {
        allpages: {},
        searchTerm: '',
        activeFilter: '*',
        activeFilterObj: {},
        // repos: allpages
    },

    props: {
        allpages: Array,
    },

    computed: {

        repoCount: function repoCount() {
            return this.allpages.length;
        },
        // allpages: function allpages() {
        // https://codepen.io/mattrothenberg/pen/dvNrLL
        //     var self = this;
        //     console.log(self);
        //
        //     return _.
        //     chain(this.repos).
        //     filter(function (repo) {
        //         return repo.name.includes(self.searchTerm);
        //     }).
        //     filter(this.activeFilterObj).
        //     value();
        // }

        // allpages: function() {
        //     return this.getPages();
        // }

    },

    ready: function() {
        this.getPages();
    },

    methods: {

        getPages: function() {
            this.allpages = [];
            this.loading = true;
            var url = 'http://statamic.localhost/cp/addons/menus/allpages';

            this.$http.get(url, function(data) {
                this.arePages = data.allpages.length > 0;
                this.allpages = data.allpages;
            });
        },

        add: function() {

            console.log('Adding..');
            console.log(this.allpages);

        }
    }

};
</script>
