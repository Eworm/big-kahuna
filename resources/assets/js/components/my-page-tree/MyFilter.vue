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

    data() {

        return {

            allpages: [],
            searchTerm: ''

        };
    },

    ready: function() {
        this.getPages();
    },

    computed: {

        repoCount: function repoCount() {
            return this.allpages.length;
        },

    },

    watch: {

        searchTerm: function() {
            this.getPages()
        },

    },

    methods: {

        getPages: _.debounce(
            function () {
                var url = 'http://statamic.localhost/cp/addons/menus/allpages';

                if (this.searchTerm.length > 0) {
                    url = url + '?q=' + this.searchTerm;
                }

                this.$http.get(url, function(data) {
                    this.allpages = data.allpages;
                });
            }, 250
        ),

        add: function() {

            console.log('Adding..');
            console.log(this.allpages);

        },

    }

};
</script>
