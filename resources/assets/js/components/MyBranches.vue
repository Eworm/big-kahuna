<template>
    <ul :class="classes">
        <mybranch v-for="page in pages"
                :branch-index="$index"
                :uuid="page.id"
                :title="page.title || page.slug"
                :original_title="page.original_title || page.slug"
                :url="buildUrl(page.slug)"
                :type="page.type"
                :child-pages="page.items"
                :depth="depth"
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
