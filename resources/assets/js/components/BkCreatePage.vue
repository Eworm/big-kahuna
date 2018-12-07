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
