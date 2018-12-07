<script>

export default {
   props: [],

    data: function() {
        return {}
    },

    methods: {
        deleteMenu: function(menu) {
            var self = this;

            swal({
                title: translate('cp.are_you_sure'),
                text: translate_choice('cp.confirm_delete_items', 1),
                type: 'warning',
                confirmButtonText: translate('cp.yes_im_sure'),
                showCancelButton: true,
                closeOnConfirm: false,
            },
            function(canDelete) {
                if (canDelete) {
                    self.$http.delete(
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
}

</script>
