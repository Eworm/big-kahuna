<script>
import MyFilter from './MyFilter.vue';
import MyCustomLink from './MyCustomLink.vue';
import MyBranch from './MyBranch.vue';
import MyBranches from './MyBranches.vue';

export default {

    components: {
        MyFilter,
        MyCustomLink,
        MyBranches,
        MyBranch,
    },

    data: function() {
        return {
            loading: true,
            saving: false,
            changed: false,
            showUrls: false,
            show: "urls",
            pages: [],
            allpages: [],
            arePages: true,
            name: []
        }
    },

    created() {
        this.$eventHub.$on('append-links', this.changeName)
    },

    beforeDestroy(){
        this.$eventHub.$off('append-links');
    },

    computed: {

        hasChildren() {
            return _.some(this.pages, page => page.pages.length);
        },

        isSortable() {
            return Vue.can('pages:reorder');
        }

    },

    ready: function() {
        this.getPages();
        Mousetrap.bindGlobal('mod+s', (e) => {
            e.preventDefault();
            this.save();
        });
    },

    methods: {

        changeName(name) {
            // name will be automatically transported to the parameter.
            this.name = name;
            this.pages.push.apply(this.pages, name);
            this.changed = true;
        },

        getPages: function() {
            this.pages      = [];
            this.loading    = true;
            var url         = cp_url('addons/menus/json');

            this.$http.get(url, function(data) {
                this.arePages   = data.pages.length > 0;
                this.pages      = data.pages;
                this.loading    = false;

                this.$nextTick(function() {
                    this.initSortable();
                });
            });
        },

        initSortable: function() {
            if (! this.isSortable) {
                return;
            }

            var self = this;
            var draggedIndex, draggedPage, draggedInstance;

            var placeholder = '' +
                    '<li class="branch branch-placeholder">' +
                        '<div class="branch-row w-full flex items-center depth-{{ depth }}">' +
                            '<div class="page-move drag-handle w-6 h-full"></div>' +
                            '<div class="flex p-1 items-center flex-1">' +
                                '<div class="page-text">&nbsp;</div>' +
                            '</div>' +
                        '</div>' +
                    '</li>';

            $(this.$el).find('.page-tree > ul + ul').nestedSortable({
                containerSelector: 'ul',
                handle: '.drag-handle',
                placeholderClass: 'branch-placeholder',
                placeholder: placeholder,
                bodyClass: 'page-tree-dragging',
                draggedClass: 'branch-dragged',
                onMousedown: function ($item, _super, event) {
                    // Prevent dragging a lone top level page.
                    var branch = $item[0].__vue__;
                    var depth = parseInt($item[0].dataset.depth);
                    if (branch.$parent.pages.length === 1 && depth === 1) return false;
                    return true;
                },
                onDragStart: function($item, container, _super, event) {
                    // Grab the original page we're dragging now so we can move it later.
                    var branch = $item[0].__vue__;
                    draggedInstance = branch;
                    draggedIndex = branch.branchIndex;
                    draggedPage = branch.$parent.pages[draggedIndex];

                    // Let the plugin continue
                    _super($item, container);
                },
                onDrag: function($item, container, _super, event) {
                    // Update the placeholder template to show the page name.
                    $('.branch-placeholder').find('.page-text').text(draggedPage.title);
                    _super($item, container);
                },
                onDrop: function($item, container, _super, event) {
                    self.$els.click.play();
                    self.changed = true;

                    // Remove the page from its original place
                    draggedInstance.$parent.pages.splice(draggedIndex, 1);

                    // Get the drop position
                    var dropIndex = $item.index();
                    var parentInstance = $item.parent()[0].__vue__;

                    // Update the page to use the new parent's url (recursively)
                    draggedPage = self.updateDroppedUrl(draggedPage, parentInstance.$parent.url);

                    // Get the new page's position and inject it into the data
                    parentInstance.pages.splice(dropIndex, 0, draggedPage);

                    // Force the Vue component to reload itself
                    var pages = self.pages;
                    self.pages = [];
                    self.$nextTick(function() {
                        self.pages = pages;
                    });

                    // Let the plugin continue
                    _super($item, container);
                }
            });
        },

        updateDroppedUrl: function(page, url) {
            var self = this;

            url = url || '';

            page.url = url + '/' + page.slug;

            page.pages = _.map(page.pages, function(child) {
                return self.updateDroppedUrl(child, page.url);
            });

            return page;
        },

        save: function() {
            var self = this;

            self.saving = true;

            var pages = JSON.parse(JSON.stringify(self.pages));
            pages = self.updateOrderIndexes(pages);

            this.$http.post(cp_url('addons/menus/save'), { pages: pages }).success(function(data) {
                self.getPages();
                self.changed = false;
                self.saving = false;
                self.$dispatch('setFlashSuccess', translate('cp.pages_reordered'))
            });
        },

        updateOrderIndexes: function(pages) {
            var self = this;

            return _.map(pages, function(item, i) {
                // Recursively iterate over any children
                if (item.items.length) {
                    item.items = self.updateOrderIndexes(item.items);
                }

                // We need the 1-based indexes
                item.order = i + 1;

                return item;
            });
        },

        onShowDraftsChanged() {
            this.getPages();
        },

        onLocaleChanged() {
            this.getPages();
        },

    },

    events: {

        'page.edit': function() {
            var self = this;
            self.changed = true;
        },

        'page.deleted': function () {
            var self = this;
            self.changed = true;
        }

    },

    watch: {
        changed(changed) {
            this.$dispatch('changesMade', changed);
        }
    }

};
</script>
