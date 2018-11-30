<template>
    <div class="card flush">
        <div class="card-body">
            <div class="form-group p-2 mb-0 w-full flex items-center border-b">
                <div class="w-1/3 pr-2">
                    <label class="block">Title</label>
                </div>
                <div class="w-2/3 flex justify-end">
                    <input type="text" class="form-control" v-model="customtitle">
                </div>
            </div>
            <div class="form-group p-2 mb-0 w-full flex items-center border-b">
                <div class="w-1/3 pr-2">
                    <label class="block">URL</label>
                </div>
                <div class="w-2/3 flex justify-end">
                    <input type="url" class="form-control" v-model="customurl">
                </div>
            </div>
            <div class="form-group p-2 mb-0 w-full flex items-end border-b">
                <button type="button" class="btn btn-primary add-row float-right" @click="add">
                    Add to menu
                    <i class="icon icon-plus icon-right"></i>
                </button>
            </div>
        </div>
    </div>
</template>
<script>

export default {

    data() {

        return {

            possibleLinks: [],
            customInfo: {},
            customtitle: '',
            customurl: '',
            obj: [{
                "id":"",
                "order":5,
                "uri":"",
                "extension":"",
                "edit_url":"",
                "create_child_url":"",
                "slug":"",
                "published":true,
                "has_entries":true,
                "create_entry_url":"",
                "entries_url":"",
                "collapsed":false,
                "items":[],
                "pages":[]
            }]

        };
    },

    computed: {

    },

    watch: {

    },

    methods: {

        add: function() {

            console.log('Adding..');
            console.log(this.customtitle);
            console.log(this.customurl);
            this.customInfo.title = this.customtitle;
            this.customInfo.url = this.customurl;
            console.log(this.customInfo);
            this.obj.push(this.obj, this.customInfo);
            // console.log(this.obj);
            this.possibleLinks.push(this.obj);
            this.$eventHub.$emit('append-links', this.possibleLinks);

        },
    }

};
</script>
