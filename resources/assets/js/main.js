Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.component('bkfilter', require('./components/BkFilter.vue'));
Vue.component('bkcustomlink', require('./components/BkCustomLink.vue'));
Vue.component('bkbranch', require('./components/BkBranch.vue'));
Vue.component('bkbranches', require('./components/BkBranches.vue'));
Vue.component('bkpagetree', require('./components/BkPageTree.vue'));

Vue.component('bk-list-page', {
    props: [],

    data: function() {
        return {}
    },

    methods: {
        deleteMenu: function(menu) {
            var vm = this;

            swal({
                    title: "Are you sure?",
                    text: 'This item will be deleted',
                    type: 'warning',
                    confirmButtonText: 'Yes, I\'m sure',
                    showCancelButton: true,
                    closeOnConfirm: false,
                },
                function(canDelete) {
                    if (canDelete) {
                        vm.$http.delete(
                            cp_url('addons/big-kahuna/destroy'), {
                                menu: menu
                            },
                            function() {
                                location.reload();
                            }
                        )
                    }
                });

        }
    },

    ready: function() {}
});

Vue.component('bk-create-page', {
    props: [],

    data: function() {
        return {
            menuName: ''
        }
    },

    methods: {
        saveMenu: function() {
            if (this.menuName !== '') {
                this.$http.post(
                    cp_url("addons/big-kahuna/store"), {
                        menu_name: this.menuName
                    },
                    function(res) {
                        location.href = cp_url('addons/big-kahuna/edit/') + res.menu
                    }
                )
            } else {
                this.$dispatch("setFlashError", 'Enter a menu name')
            }
        }
    },

    ready: function() {}
});
