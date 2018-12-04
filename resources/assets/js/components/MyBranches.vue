<template>
    <ul :class="classes">
        <mybranch v-for="page in pages"
                :branch-index="$index"
                :id="page.id"
                :title="page.title || page.url"
                :original_title="page.original_title || page.url"
                :url="page.url"
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
