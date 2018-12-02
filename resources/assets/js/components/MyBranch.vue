<template>
    <li class="branch" :data-depth="depth">
        <div class="branch-row w-full flex items-center">

            <div class="page-move drag-handle w-6 h-full"></div>

            <div class="flex items-center flex-1 p-1">

                <div class="page-text" v-bind:class="classObject">
                    <span class="page-title">{{ title || originalTitle }}</span>
                    <div class="edit-url pt-1">
                        <input type="text" value="{{ title }}" v-model="title">
                        <button type="button" class="btn btn-default" @click="cancelTitleChange">{{ translate('cp.cancel') }}</button>
                        <span v-if="title != originalTitle" class="original-title mt-1 text-muted">Original title: {{ originalTitle }}</span>
                    </div>
                </div>

            </div>

            <div class="branch-meta flex items-center pr-1">
                <div class="page-actions">
                    <a :href="url" :title="url" class="page-action text-grey-dark px-sm bloop" target="_blank">
                        <svg-icon name="visit" class="opacity-25 hover:opacity-75 h-4 w-4"></svg-icon>
                    </a>
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
        originalTitle: String,
        url: String,
        childPages: {
            type: Array,
            default: function() {
                return [];
            }
        },
        depth: Number,
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
            this.isActive = !this.isActive;
            console.log(self.isActive);
        },

        cancelTitleChange: function(evt) {
            this.title = this.originalTitle;
        }
    }

};
</script>
