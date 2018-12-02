<template>
    <ul :class="classes">
        <mybranch v-for="page in pages"
                :branch-index="$index"
                :uuid="page.id"
                :title="page.title || page.slug"
                :original-title="page.title || page.slug"
                :url="buildUrl(page.slug)"
                :child-pages="page.items"
                :collapsed.sync="page.collapsed"
                :depth="depth"
                :sortable="sortable"
        ></mybranch>
    </ul>
</template>

<script>
export default {

    props: {
        pages: Array,
        depth: Number,
        parentUrl: {
            type: String,
            default: ''
        },
        sortable: Boolean,
        dirty: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        classes: function () {
            // Start with the static ones
            var classes = ['branches'];

            // Add depth
            classes.push('depth-' + this.depth);

            // Empty
            if (!this.pages.length) {
                classes.push('empty');
            }

            // State
            var state = (this.collapsed) ? 'collapsed' : 'open';
            classes.push('branches-' + state);

            return classes.join(' ');
        }
    },

    methods: {

        toggle: function(page) {
            page.$set('collapsed', !page.collapsed);
        },

        buildUrl: function(slug) {
            return this.parentUrl + '/' + slug;
        }

    }

};
</script>
