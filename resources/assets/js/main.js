Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.component('myfilter', require('./components/MyFilter.vue'));
Vue.component('mycustomlink', require('./components/MyCustomLink.vue'));
Vue.component('mybranch', require('./components/MyBranch.vue'));
Vue.component('mybranches', require('./components/MyBranches.vue'));
Vue.component('my-page-tree', require('./components/MyPageTree.vue'));
