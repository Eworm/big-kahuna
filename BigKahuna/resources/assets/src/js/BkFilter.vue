<template>
    <div class="card flush">
        <div class="dossier-table-wrapper">
            <table class="dossier has-checkboxes">
                <thead>
                    <tr>
                        <th colspan="2">
                            {{ translate('cp.All content') }} ({{ contentCount }})
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" class="pr-2">
                            <input v-model="searchTerm" type="search" placeholder="{{ translate('cp.Search for a title, collection name or just type pages') }}" class="form-control">
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr v-for="(index, page) in allpages">
                        <td class="checkbox-col">
                            <input type="checkbox" id="{{page.id}}" value="{{page.id}}" @change="handleChange($event)">
                            <label for="{{page.id}}"></label>
                        </td>
                        <td class="cell-title first-cell">
                            <span class="column-label"></span>
                            {{ page.title }} <span class="text-muted">({{ page.type }})</span>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="p-2">
                            <button type="button" class="btn btn-primary add-row" @click="add">
                                {{ translate('cp.add') }}
                                <i class="icon icon-plus icon-right"></i>
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</template>
<script>

export default {

    props: ['locale'],

    data() {

        return {

            allpages: [],
            searchTerm: '',
            possibleLinks: []

        };
    },

    ready: function() {
        this.getPages();
    },

    computed: {

        contentCount: function contentCount() {
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
                var url = cp_url('addons/big-kahuna/allpages?locale=' + this.locale);

                if (this.searchTerm.length > 0) {
                    url = url + '&q=' + this.searchTerm;
                }

                this.$http.get(url, function(data) {
                    this.allpages = data.allpages;
                });
            }, 250
        ),

        add: function() {
            if (this.possibleLinks.length) {
                this.$eventHub.$emit('append-links', this.possibleLinks);

                this.possibleLinks = [];

                var checkboxes = document.querySelectorAll('#bigkahuna .checkbox-col > input')

                checkboxes.forEach(function(box) {
                    box.checked = false
                })
            } else {
               this.$dispatch("setFlashError", 'Uh oh! Select one or more items')
            }
        },

        handleChange: function(e) {

            if (e.target.checked == true) {

                // Find object by selected ID
                const result = this.allpages.filter(function(el) {
                    return el.id == e.target.id
                });

                // Push new object in possibleLinks
                this.possibleLinks.push({
                    id:                 result[0].id,
                    "order":            1,
                    "title":            result[0].title,
                    "original_title":   result[0].title,
                    "type":             result[0].type,
                    "classname":        '',
                    "linktitle":        '',
                    "items":            [],
                    "pages":            []
                });

            } else {

                // Find object by selected ID
                var index = this.possibleLinks.findIndex(function(item, i){
                    return item.id === e.target.id
                });

                // Remove the object by index
                if (index > -1) {
                    this.possibleLinks.splice(index, 1);
                }

            }
        }

    }

};
</script>
