Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.component('myfilter', require('./components/MyFilter.vue'));
Vue.component('mycustomlink', require('./components/MyCustomLink.vue'));
Vue.component('mybranch', require('./components/MyBranch.vue'));
Vue.component('mybranches', require('./components/MyBranches.vue'));
Vue.component('my-page-tree', require('./components/MyPageTree.vue'));

Vue.component('menus-list-page', {
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
      function(canDelete){
        if (canDelete) {
          vm.$http.delete(
            cp_url('addons/big-kahuna/destroy'),
            {menu: menu},
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

Vue.component('menus-create-page', {
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
          cp_url("addons/big-kahuna/store"),
          {menu_name: this.menuName},
          function(res) {
            location.href = '/admin/addons/big-kahuna/edit/'+res.menu
          }
        )
      } else {
        this.$dispatch("setFlashError", 'Enter a menu name')
      }
    }
  },

  ready: function() {}
});
