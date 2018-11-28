<template>
    <table class="dossier has-checkboxes">
        <thead>
            <tr>
                <th colspan="2">
                    Content
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="search" placeholder="Search for a page, entry or collection" class="form-control">
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

    data: function() {
        return {
            allpages
        }
    },

    props: {
        allpages: Array,
    },

    computed: {
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
