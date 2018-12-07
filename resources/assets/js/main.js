Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.component('bkfilter', require('./components/BkFilter.vue'));
Vue.component('bkcustomlink', require('./components/BkCustomLink.vue'));
Vue.component('bkbranch', require('./components/BkBranch.vue'));
Vue.component('bkbranches', require('./components/BkBranches.vue'));
Vue.component('bkpagetree', require('./components/BkPageTree.vue'));

Vue.component('bk-list-page', require('./components/BkListPage.vue'));
Vue.component('bk-create-page', require('./components/BkCreatePage.vue'));
