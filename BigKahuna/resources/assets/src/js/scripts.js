Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.component('bkmenulist', require('./BkMenuList.vue'));
Vue.component('bkcreatemenu', require('./BkCreateMenu.vue'));
Vue.component('bkfilter', require('./BkFilter.vue'));
Vue.component('bkcustomlink', require('./BkCustomLink.vue'));
Vue.component('bkbranch', require('./BkBranch.vue'));
Vue.component('bkbranches', require('./BkBranches.vue'));
Vue.component('bkpagetree', require('./BkPageTree.vue'));
