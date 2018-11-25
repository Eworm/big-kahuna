Vue.component('menus-fieldtype', {

    mixins: [Fieldtype],

    template: `<tr v-for="(index, page) of pages">
                <td class="checkbox-col">
                <input type="checkbox" id="checkbox-{{index}}">
                <label for="checkbox-{{index}}"></label>
                </td>
                <td class="cell-title first-cell">
                <span class="column-label"></span>
                {{ page.title }} <span class="text-muted">({{page.type}})</span>
                </td>
                </tr>`,

    data: function() {
        return {
            pages
        };
    },

    computed: {
        //
    },

    methods: {
        //
    },

    ready: function() {
        //
    }

});
