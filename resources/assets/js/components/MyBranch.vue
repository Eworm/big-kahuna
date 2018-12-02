<template>
    <li class="branch" :class="{ draft: !published }" :data-depth="depth">
        <div class="branch-row w-full flex items-center">

            <div class="page-move drag-handle w-6 h-full"></div>

            <div class="flex items-center flex-1 p-1">

                <div class="page-text">
                    <span class="page-title">{{ title }}</span>
                </div>

            </div>

            <div class="branch-meta flex items-center pr-1">
                <div class="page-actions" v-if="can('pages:create') || can('pages:delete')">
                    <div class="btn-group page-action action-more px-sm">
                        <i class="icon icon-dots-three-vertical opacity-25 hover:opacity-75" data-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li><a href="" @click.prevent="duplicatePage">{{ translate('cp.edit') }}</a></li>
                            <li class="warning"><a href="" @click.prevent="deletePage">{{ translate('cp.delete') }}</a></li>
                        </ul>
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
