<script>

export default {
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
                        menu_name: this.menuName,
                        locale: this.locale
                    },
                    function(res) {
                        location.href = cp_url('addons/big-kahuna/edit/') + res.menu
                    }
                )
            } else {
                this.$dispatch("setFlashError", 'Uh oh! Enter a name for this menu')
            }
        }
    },

    ready: function() {}
}

</script>
