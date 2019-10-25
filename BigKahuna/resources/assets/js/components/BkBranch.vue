<template>
    <li class="branch" :data-depth="depth">
        <div class="branch-row w-full flex items-center">

            <div class="page-move drag-handle w-6 h-full"></div>

            <div class="flex items-center flex-1 p-1">

                <div class="page-text" v-bind:class="classObject">

                    <div class="page-title" v-if="title">{{ title }} <span class="text-muted">({{ type }})</span></div>
                    <div class="page-title" v-else>{{ locales[0].title }} <span class="text-muted">({{ type }})</span></div>

                    <div class="edit-url pt-1 mb-1">
                        <div class="form-group form-group--main mb-1 mt-1 p-0">
                            <input type="text" value="{{ title }}" v-model="title" v-on:input="editTitle" placeholder="Title">
                            <input type="text" value="{{ url }}" v-model="url" v-on:input="editUrl" v-if="type == 'Custom'" placeholder="URL">
                        </div>
                        <div class="form-group mb-1 mt-1 p-0">
                            <input type="text" value="{{ classname }}" v-model="classname" v-on:input="editClassname" placeholder="Extra classname">
                            <input type="text" value="{{ linktitle }}" v-model="linktitle" v-on:input="editLinkTitle" placeholder="Custom link title">
                        </div>
                        <div class="form-group p-0">
                            <button type="button" class="btn btn-primary" @click="editPage">{{ translate('cp.done') }}</button>
                            <button type="button" class="btn btn-default" @click="cancelTitleChange">{{ translate('cp.cancel') }}</button>
                        </div>
                        <span v-if="title != original_title" class="original-title mt-1 text-muted">Original title: {{ original_title }}</span>
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

        <bkbranches :pages="childPages"
                  :depth="depth + 1"
                  :parent-url="url"
                  :collapsed.sync="collapsed">
        </bkbranches>
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
        id: String,
        title: String,
        original_title: String,
        url: String,
        classname: String,
        linktitle: String,
        type: String,
        childPages: {
            type: Array,
            default: function() {
                return [];
            }
        },
        locales: Array,
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

            // Find object by selected ID
            var index = this.$parent.pages.findIndex(function(item, i) {
                return item.id === self.id
            });

            // Remove the object by index
            if (index > -1) {
                this.$parent.pages.splice(index, 1);
            }
            this.$dispatch('page.deleted');
        },

        editTitle: function(evt) {
            var self = this;
            const result = this.$parent.pages[this.branchIndex];
            result.title = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editUrl: function(evt) {
            var self = this;
            const result = this.$parent.pages[this.branchIndex];
            result.url = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editClassname: function(evt) {
            var self = this;
            const result = this.$parent.pages[this.branchIndex];
            result.classname = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editLinkTitle: function(evt) {
            var self = this;
            const result = this.$parent.pages[this.branchIndex];
            result.linktitle = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editPage: function() {
            var self = this;
            self.isActive = !self.isActive;
        },

        cancelTitleChange: function() {
            var self = this;
            self.isActive = !self.isActive;
            self.title = self.original_title;
        }
    }

};
</script>
