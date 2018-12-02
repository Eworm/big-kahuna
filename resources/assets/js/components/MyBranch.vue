<template>
    <li class="branch" :class="{ draft: !published }" :data-depth="depth">
        <div class="branch-row w-full flex items-center">

            <div class="page-move drag-handle w-6 h-full"></div>

            <div class="flex items-center flex-1 p-1">

                <div class="page-text" v-bind:class="classObject">
                    <span class="page-title">{{ title }}</span>
                    <div class="edit-url">
                        <input type="text" value="{{ title }}">
                        <button class="btn btn-primary btn-sm">Save</button>
                        <button class="btn btn-default btn-sm" @click="editPage">Cancel</button>
                    </div>
                </div>

            </div>

            <div class="branch-meta flex items-center pr-1">
                <div class="page-actions">
                    <div class="btn-group page-action action-more px-sm">
                        <i class="icon icon-dots-three-vertical opacity-25 hover:opacity-75" data-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li>
                                <button type="button" class="btn btn-block" @click="editPage">{{ translate('cp.edit') }}</button>
                            </li>
                            <li class="warning">
                                <button type="button" class="btn btn-block btn-danger" @click="deletePage">{{ translate('cp.delete') }}</button>
                            </li>
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

    data: function(){
        return {
            isActive: false,
        }
    },

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
        },

        classObject: function () {
            return {
                active: this.isActive
            }
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

        editPage: function() {
            var self = this;
            self.isActive = !self.isActive;
            console.log(self.isActive);
        }
    }

};
</script>
