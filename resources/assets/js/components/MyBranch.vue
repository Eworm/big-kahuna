<template>
    <li class="branch" :class="{ draft: !published }" :data-depth="depth">
        <div class="branch-row w-full flex items-center">

            <div v-if="!home && sortable" :class="['page-move drag-handle w-6 h-full', {'cursor-not-allowed opacity-50': isSingleTopLevelPage}]"></div>

            <div class="flex items-center flex-1 p-1">

                <div class="page-text">
                    <span class="page-title">{{ title }}</span>
                </div>

                <div class="w-6 opacity-25 hover:opacity-50 page-toggle-container ml-px" v-if="hasChildren">
                    <div :class="{'page-toggle': true, toggleable: hasChildren}" v-on:click="toggle">
                        <i :class="{ 'icon': true, 'icon-chevron-down': true, 'collapsed': collapsed }"></i>
                    </div>
                </div>

            </div>
        </div>

        <mybranches :pages="childPages"
                  :depth="depth + 1"
                  :parent-url="url"
                  :collapsed.sync="collapsed"
                  :sortable="sortable"
                  :dirty="dirty"
                  v-if="!home">
        </mybranches>
    </li>
</template>

<script>
export default {

    props: {
        branchIndex: Number,
        uuid: String,
        title: String,
        url: String,
        published: {
            type: Boolean,
            default: true
        },
        editUrl: String,
        hasEntries: Boolean,
        entriesUrl: String,
        createEntryUrl: String,
        childPages: {
            type: Array,
            default: function() {
                return [];
            }
        },
        collapsed: Boolean,
        depth: Number,
        home: {
            type: Boolean,
            default: false
        },
        sortable: Boolean,
        dirty: {
            type: Boolean,
            default: false
        }
    },

    computed: {

        hasChildren: function() {
            return this.childPages.length;
        },

        isSingleTopLevelPage() {
            return this.$parent.pages.length === 1 && this.depth === 1;
        }

    },

    methods: {

        deletePage: function() {
            var self = this;

            swal({
                type: 'warning',
                title: translate('cp.are_you_sure'),
                text: translate(self.title + translate('cp.confirm_delete_page')),
                confirmButtonText: translate('cp.yes_im_sure'),
                cancelButtonText: translate('cp.cancel'),
                showCancelButton: true
            }, function() {
                self.$http.post(cp_url('pages/delete'), { uuid: self.uuid }).success(function() {
                    self.$parent.pages.splice(self.branchIndex, 1);

                    this.$dispatch('page.deleted');
                });
            });
        },

    }

};
</script>
