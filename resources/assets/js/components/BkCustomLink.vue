<template>
    <div class="card flush">
        <div class="card-body">
            <div class="card-heading mb-0">{{ translate('cp.Add a custom link') }}</div>
            <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
                <div class="w-1/3 pr-2">
                    <label class="block" for="customTitle">{{ translate('cp.title') }}</label>
                </div>
                <div class="w-2/3 flex justify-end">
                    <input type="text" class="form-control" v-model="customTitle" id="customTitle">
                </div>
            </div>
            <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
                <div class="w-1/3 pr-2">
                    <label class="block" for="customUrl">{{ translate('cp.url') }}</label>
                </div>
                <div class="w-2/3 flex justify-end">
                    <input type="url" class="form-control" v-model="customUrl" placeholder="Including http:// or https://" id="customUrl">
                </div>
            </div>
            <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
                <div class="w-1/3 pr-2">
                    <label class="block" for="customClass">{{ translate('cp.extra classname') }} <span class="text-muted">({{ translate('cp.optional') }})</span></label>
                </div>
                <div class="w-2/3 flex justify-end">
                    <input type="text" class="form-control" v-model="customClass" id="customClass">
                </div>
            </div>
            <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
                <div class="w-1/3 pr-2">
                    <label class="block" for="customLinkTitle">{{ translate('cp.link title') }} <span class="text-muted">({{ translate('cp.optional') }})</span></label>
                </div>
                <div class="w-2/3 flex justify-end">
                    <input type="text" class="form-control" v-model="customLinkTitle" id="customLinkTitle" placeholder="Defaults to the title">
                </div>
            </div>
            <div class="form-group p-2 mb-0 w-full flex items-end border-b">
                <button type="button" class="btn btn-primary add-row float-right" @click="add">
                    {{ translate('cp.add') }}
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
            customTitle: '',
            customUrl: '',
            customClass: '',
            customLinkTitle: '',
            customType: 'Custom',

        };
    },

    computed: {

    },

    watch: {

    },

    methods: {

        add: function() {

            if (this.customTitle != '' && this.customUrl != '') {
                // Push new object in possibleLinks
                var d = new Date().valueOf();
                this.possibleLinks.push({
                    id:                 d.toString(),
                    "order":            1,
                    "url":              this.customUrl,
                    "title":            this.customTitle,
                    "original_title":   this.customTitle,
                    "classname":        this.customClass,
                    "linktitle":        this.customLinkTitle,
                    "type":             this.customType,
                    "items":            [],
                    "pages":            []
                });
                this.$eventHub.$emit('append-links', this.possibleLinks);

                this.customTitle    =  ''
                this.customUrl      =  ''
                this.customClass    =  ''
                this.customLinkTitle=  ''
                this.possibleLinks  = []
            } else {
                this.$dispatch("setFlashError", 'Uh oh! Enter a title and URL.');
            }
        },
    }

};
</script>
