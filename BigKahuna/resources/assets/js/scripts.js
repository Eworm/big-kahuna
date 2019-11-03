/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

var __vue_script__, __vue_template__
var __vue_styles__ = {}
__vue_script__ = __webpack_require__(10)
if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
  console.warn("[vue-loader] BigKahuna/resources/assets/src/js/BkFilter.vue: named exports in *.vue files are ignored.")}
__vue_template__ = __webpack_require__(11)
module.exports = __vue_script__ || {}
if (module.exports.__esModule) module.exports = module.exports.default
var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
if (__vue_template__) {
__vue_options__.template = __vue_template__
}
if (!__vue_options__.computed) __vue_options__.computed = {}
Object.keys(__vue_styles__).forEach(function (key) {
var module = __vue_styles__[key]
__vue_options__.computed[key] = function () { return module }
})
if (false) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  var id = "_v-30011d80/BkFilter.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, __vue_template__)
  }
})()}

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

var __vue_script__, __vue_template__
var __vue_styles__ = {}
__vue_script__ = __webpack_require__(12)
if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
  console.warn("[vue-loader] BigKahuna/resources/assets/src/js/BkCustomLink.vue: named exports in *.vue files are ignored.")}
__vue_template__ = __webpack_require__(13)
module.exports = __vue_script__ || {}
if (module.exports.__esModule) module.exports = module.exports.default
var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
if (__vue_template__) {
__vue_options__.template = __vue_template__
}
if (!__vue_options__.computed) __vue_options__.computed = {}
Object.keys(__vue_styles__).forEach(function (key) {
var module = __vue_styles__[key]
__vue_options__.computed[key] = function () { return module }
})
if (false) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  var id = "_v-875eb0da/BkCustomLink.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, __vue_template__)
  }
})()}

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

var __vue_script__, __vue_template__
var __vue_styles__ = {}
__vue_script__ = __webpack_require__(14)
if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
  console.warn("[vue-loader] BigKahuna/resources/assets/src/js/BkBranch.vue: named exports in *.vue files are ignored.")}
__vue_template__ = __webpack_require__(15)
module.exports = __vue_script__ || {}
if (module.exports.__esModule) module.exports = module.exports.default
var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
if (__vue_template__) {
__vue_options__.template = __vue_template__
}
if (!__vue_options__.computed) __vue_options__.computed = {}
Object.keys(__vue_styles__).forEach(function (key) {
var module = __vue_styles__[key]
__vue_options__.computed[key] = function () { return module }
})
if (false) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  var id = "_v-458b5aac/BkBranch.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, __vue_template__)
  }
})()}

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

var __vue_script__, __vue_template__
var __vue_styles__ = {}
__vue_script__ = __webpack_require__(16)
if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
  console.warn("[vue-loader] BigKahuna/resources/assets/src/js/BkBranches.vue: named exports in *.vue files are ignored.")}
__vue_template__ = __webpack_require__(17)
module.exports = __vue_script__ || {}
if (module.exports.__esModule) module.exports = module.exports.default
var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
if (__vue_template__) {
__vue_options__.template = __vue_template__
}
if (!__vue_options__.computed) __vue_options__.computed = {}
Object.keys(__vue_styles__).forEach(function (key) {
var module = __vue_styles__[key]
__vue_options__.computed[key] = function () { return module }
})
if (false) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  var id = "_v-54fec850/BkBranches.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, __vue_template__)
  }
})()}

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(5);


/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.component('bkmenulist', __webpack_require__(6));
Vue.component('bkcreatemenu', __webpack_require__(8));
Vue.component('bkfilter', __webpack_require__(0));
Vue.component('bkcustomlink', __webpack_require__(1));
Vue.component('bkbranch', __webpack_require__(2));
Vue.component('bkbranches', __webpack_require__(3));
Vue.component('bkpagetree', __webpack_require__(18));

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

var __vue_script__, __vue_template__
var __vue_styles__ = {}
__vue_script__ = __webpack_require__(7)
if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
  console.warn("[vue-loader] BigKahuna/resources/assets/src/js/BkMenuList.vue: named exports in *.vue files are ignored.")}
module.exports = __vue_script__ || {}
if (module.exports.__esModule) module.exports = module.exports.default
var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
if (__vue_template__) {
__vue_options__.template = __vue_template__
}
if (!__vue_options__.computed) __vue_options__.computed = {}
Object.keys(__vue_styles__).forEach(function (key) {
var module = __vue_styles__[key]
__vue_options__.computed[key] = function () { return module }
})
if (false) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  var id = "_v-07bc8e25/BkMenuList.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, __vue_template__)
  }
})()}

/***/ }),
/* 7 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
// <script>

/* harmony default export */ __webpack_exports__["default"] = ({
    props: [],

    data: function data() {
        return {};
    },

    methods: {
        deleteMenu: function deleteMenu(menu) {
            var self = this;

            swal({
                title: translate('cp.are_you_sure'),
                text: translate_choice('cp.confirm_delete_items', 1),
                type: 'warning',
                confirmButtonText: translate('cp.yes_im_sure'),
                showCancelButton: true,
                closeOnConfirm: false
            }, function (canDelete) {
                if (canDelete) {
                    self.$http.delete(cp_url('addons/big-kahuna/destroy'), {
                        menu: menu
                    }, function () {
                        location.reload();
                    });
                }
            });
        }
    },

    ready: function ready() {}

    // </script>

});

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

var __vue_script__, __vue_template__
var __vue_styles__ = {}
__vue_script__ = __webpack_require__(9)
if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
  console.warn("[vue-loader] BigKahuna/resources/assets/src/js/BkCreateMenu.vue: named exports in *.vue files are ignored.")}
module.exports = __vue_script__ || {}
if (module.exports.__esModule) module.exports = module.exports.default
var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
if (__vue_template__) {
__vue_options__.template = __vue_template__
}
if (!__vue_options__.computed) __vue_options__.computed = {}
Object.keys(__vue_styles__).forEach(function (key) {
var module = __vue_styles__[key]
__vue_options__.computed[key] = function () { return module }
})
if (false) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  var id = "_v-30382d03/BkCreateMenu.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, __vue_template__)
  }
})()}

/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
// <script>

/* harmony default export */ __webpack_exports__["default"] = ({
    props: [],

    data: function data() {
        return {
            menuName: ''
        };
    },

    methods: {
        saveMenu: function saveMenu() {
            if (this.menuName !== '') {
                this.$http.post(cp_url("addons/big-kahuna/store"), {
                    menu_name: this.menuName,
                    locale: this.locale
                }, function (res) {
                    location.href = cp_url('addons/big-kahuna/edit/') + res.menu;
                });
            } else {
                this.$dispatch("setFlashError", 'Uh oh! Enter a name for this menu');
            }
        }
    },

    ready: function ready() {}

    // </script>

});

/***/ }),
/* 10 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
// <template>
//     <div class="card flush">
//         <div class="dossier-table-wrapper">
//             <table class="dossier has-checkboxes">
//                 <thead>
//                     <tr>
//                         <th colspan="2">
//                             {{ translate('cp.All content') }} ({{ contentCount }})
//                         </th>
//                     </tr>
//                     <tr>
//                         <th colspan="2" class="pr-2">
//                             <input v-model="searchTerm" type="search" placeholder="{{ translate('cp.Search for a title, collection name or just type pages') }}" class="form-control">
//                         </th>
//                     </tr>
//                 </thead>
//                 <tbody id="tbody">
//                     <tr v-for="(index, page) in allpages">
//                         <td class="checkbox-col">
//                             <input type="checkbox" id="{{page.id}}" value="{{page.id}}" @change="handleChange($event)">
//                             <label for="{{page.id}}"></label>
//                         </td>
//                         <td class="cell-title first-cell">
//                             <span class="column-label"></span>
//                             {{ page.title }} <span class="text-muted">({{ page.type }})</span>
//                         </td>
//                     </tr>
//                 </tbody>
//                 <tfoot>
//                     <tr>
//                         <td colspan="2" class="p-2">
//                             <button type="button" class="btn btn-primary add-row" @click="add">
//                                 {{ translate('cp.add') }}
//                                 <i class="icon icon-plus icon-right"></i>
//                             </button>
//                         </td>
//                     </tr>
//                 </tfoot>
//             </table>
//         </div>
//     </div>
// </template>
// <script>

/* harmony default export */ __webpack_exports__["default"] = ({

    props: ['locale'],

    data: function data() {

        return {

            allpages: [],
            searchTerm: '',
            possibleLinks: []

        };
    },


    ready: function ready() {
        this.getPages();
    },

    computed: {

        contentCount: function contentCount() {
            return this.allpages.length;
        }

    },

    watch: {

        searchTerm: function searchTerm() {
            this.getPages();
        }

    },

    methods: {

        getPages: _.debounce(function () {
            var url = cp_url('addons/big-kahuna/allpages?locale=' + this.locale);

            if (this.searchTerm.length > 0) {
                url = url + '&q=' + this.searchTerm;
            }

            this.$http.get(url, function (data) {
                this.allpages = data.allpages;
            });
        }, 250),

        add: function add() {
            if (this.possibleLinks.length) {
                this.$eventHub.$emit('append-links', this.possibleLinks);

                this.possibleLinks = [];

                var checkboxes = document.querySelectorAll('#bigkahuna .checkbox-col > input');

                checkboxes.forEach(function (box) {
                    box.checked = false;
                });
            } else {
                this.$dispatch("setFlashError", 'Uh oh! Select one or more items');
            }
        },

        handleChange: function handleChange(e) {

            if (e.target.checked == true) {

                // Find object by selected ID
                var result = this.allpages.filter(function (el) {
                    return el.id == e.target.id;
                });

                // Push new object in possibleLinks
                this.possibleLinks.push({
                    id: result[0].id,
                    "order": 1,
                    "title": result[0].title,
                    "original_title": result[0].title,
                    "type": result[0].type,
                    "classname": '',
                    "linktitle": '',
                    "items": [],
                    "pages": []
                });
            } else {

                // Find object by selected ID
                var index = this.possibleLinks.findIndex(function (item, i) {
                    return item.id === e.target.id;
                });

                // Remove the object by index
                if (index > -1) {
                    this.possibleLinks.splice(index, 1);
                }
            }
        }

    }

});
// </script>

/***/ }),
/* 11 */
/***/ (function(module, exports) {

module.exports = "\n<div class=\"card flush\">\n    <div class=\"dossier-table-wrapper\">\n        <table class=\"dossier has-checkboxes\">\n            <thead>\n                <tr>\n                    <th colspan=\"2\">\n                        {{ translate('cp.All content') }} ({{ contentCount }})\n                    </th>\n                </tr>\n                <tr>\n                    <th colspan=\"2\" class=\"pr-2\">\n                        <input v-model=\"searchTerm\" type=\"search\" placeholder=\"{{ translate('cp.Search for a title, collection name or just type pages') }}\" class=\"form-control\">\n                    </th>\n                </tr>\n            </thead>\n            <tbody id=\"tbody\">\n                <tr v-for=\"(index, page) in allpages\">\n                    <td class=\"checkbox-col\">\n                        <input type=\"checkbox\" id=\"{{page.id}}\" value=\"{{page.id}}\" @change=\"handleChange($event)\">\n                        <label for=\"{{page.id}}\"></label>\n                    </td>\n                    <td class=\"cell-title first-cell\">\n                        <span class=\"column-label\"></span>\n                        {{ page.title }} <span class=\"text-muted\">({{ page.type }})</span>\n                    </td>\n                </tr>\n            </tbody>\n            <tfoot>\n                <tr>\n                    <td colspan=\"2\" class=\"p-2\">\n                        <button type=\"button\" class=\"btn btn-primary add-row\" @click=\"add\">\n                            {{ translate('cp.add') }}\n                            <i class=\"icon icon-plus icon-right\"></i>\n                        </button>\n                    </td>\n                </tr>\n            </tfoot>\n        </table>\n    </div>\n</div>\n";

/***/ }),
/* 12 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
// <template>
//     <div class="card flush">
//         <div class="card-body">
//             <div class="card-heading mb-0">{{ translate('cp.Add a custom link') }}</div>
//             <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
//                 <div class="w-1/3 pr-2">
//                     <label class="block" for="customTitle">{{ translate('cp.title') }}</label>
//                 </div>
//                 <div class="w-2/3 flex justify-end">
//                     <input type="text" class="form-control" v-model="customTitle" id="customTitle">
//                 </div>
//             </div>
//             <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
//                 <div class="w-1/3 pr-2">
//                     <label class="block" for="customUrl">{{ translate('cp.url') }}</label>
//                 </div>
//                 <div class="w-2/3 flex justify-end">
//                     <input type="url" class="form-control" v-model="customUrl" placeholder="Including http:// or https://" id="customUrl">
//                 </div>
//             </div>
//             <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
//                 <div class="w-1/3 pr-2">
//                     <label class="block" for="customClass">{{ translate('cp.extra classname') }} <span class="text-muted">({{ translate('cp.optional') }})</span></label>
//                 </div>
//                 <div class="w-2/3 flex justify-end">
//                     <input type="text" class="form-control" v-model="customClass" id="customClass">
//                 </div>
//             </div>
//             <div class="form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b">
//                 <div class="w-1/3 pr-2">
//                     <label class="block" for="customLinkTitle">{{ translate('cp.link title') }} <span class="text-muted">({{ translate('cp.optional') }})</span></label>
//                 </div>
//                 <div class="w-2/3 flex justify-end">
//                     <input type="text" class="form-control" v-model="customLinkTitle" id="customLinkTitle" placeholder="Defaults to the title">
//                 </div>
//             </div>
//             <div class="form-group p-2 mb-0 w-full flex items-end border-b">
//                 <button type="button" class="btn btn-primary add-row float-right" @click="add">
//                     {{ translate('cp.add') }}
//                     <i class="icon icon-plus icon-right"></i>
//                 </button>
//             </div>
//         </div>
//     </div>
// </template>
// <script>

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {

        return {

            possibleLinks: [],
            customInfo: {},
            customTitle: '',
            customUrl: '',
            customClass: '',
            customLinkTitle: '',
            customType: 'Custom'

        };
    },


    computed: {},

    watch: {},

    methods: {

        add: function add() {

            if (this.customTitle != '' && this.customUrl != '') {
                // Push new object in possibleLinks
                var d = new Date().valueOf();
                this.possibleLinks.push({
                    id: d.toString(),
                    "order": 1,
                    "url": this.customUrl,
                    "title": this.customTitle,
                    "original_title": this.customTitle,
                    "classname": this.customClass,
                    "linktitle": this.customLinkTitle,
                    "type": this.customType,
                    "items": [],
                    "pages": []
                });
                this.$eventHub.$emit('append-links', this.possibleLinks);

                this.customTitle = '';
                this.customUrl = '';
                this.customClass = '';
                this.customLinkTitle = '';
                this.possibleLinks = [];
            } else {
                this.$dispatch("setFlashError", 'Uh oh! Enter a title and URL.');
            }
        }
    }

});
// </script>

/***/ }),
/* 13 */
/***/ (function(module, exports) {

module.exports = "\n<div class=\"card flush\">\n    <div class=\"card-body\">\n        <div class=\"card-heading mb-0\">{{ translate('cp.Add a custom link') }}</div>\n        <div class=\"form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b\">\n            <div class=\"w-1/3 pr-2\">\n                <label class=\"block\" for=\"customTitle\">{{ translate('cp.title') }}</label>\n            </div>\n            <div class=\"w-2/3 flex justify-end\">\n                <input type=\"text\" class=\"form-control\" v-model=\"customTitle\" id=\"customTitle\">\n            </div>\n        </div>\n        <div class=\"form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b\">\n            <div class=\"w-1/3 pr-2\">\n                <label class=\"block\" for=\"customUrl\">{{ translate('cp.url') }}</label>\n            </div>\n            <div class=\"w-2/3 flex justify-end\">\n                <input type=\"url\" class=\"form-control\" v-model=\"customUrl\" placeholder=\"Including http:// or https://\" id=\"customUrl\">\n            </div>\n        </div>\n        <div class=\"form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b\">\n            <div class=\"w-1/3 pr-2\">\n                <label class=\"block\" for=\"customClass\">{{ translate('cp.extra classname') }} <span class=\"text-muted\">({{ translate('cp.optional') }})</span></label>\n            </div>\n            <div class=\"w-2/3 flex justify-end\">\n                <input type=\"text\" class=\"form-control\" v-model=\"customClass\" id=\"customClass\">\n            </div>\n        </div>\n        <div class=\"form-group pt-1 pr-2 pb-1 pl-2 mb-0 w-full flex items-center border-b\">\n            <div class=\"w-1/3 pr-2\">\n                <label class=\"block\" for=\"customLinkTitle\">{{ translate('cp.link title') }} <span class=\"text-muted\">({{ translate('cp.optional') }})</span></label>\n            </div>\n            <div class=\"w-2/3 flex justify-end\">\n                <input type=\"text\" class=\"form-control\" v-model=\"customLinkTitle\" id=\"customLinkTitle\" placeholder=\"Defaults to the title\">\n            </div>\n        </div>\n        <div class=\"form-group p-2 mb-0 w-full flex items-end border-b\">\n            <button type=\"button\" class=\"btn btn-primary add-row float-right\" @click=\"add\">\n                {{ translate('cp.add') }}\n                <i class=\"icon icon-plus icon-right\"></i>\n            </button>\n        </div>\n    </div>\n</div>\n";

/***/ }),
/* 14 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
// <template>
//     <li class="branch" :data-depth="depth">
//         <div class="branch-row w-full flex items-center">
//
//             <div class="page-move drag-handle w-6 h-full"></div>
//
//             <div class="flex items-center flex-1 p-1">
//
//                 <div class="page-text" v-bind:class="classObject">
//
//                     <div class="page-title" v-if="title">{{ title }} <span class="text-muted">({{ type }})</span></div>
//                     <div class="page-title" v-else>{{ locales[0].title }} <span class="text-muted">({{ type }})</span></div>
//
//                     <div class="edit-url pt-1 mb-1">
//                         <div class="form-group form-group--main mb-1 mt-1 p-0">
//                             <input type="text" value="{{ title }}" v-model="title" v-on:input="editTitle" placeholder="Title">
//                             <input type="text" value="{{ url }}" v-model="url" v-on:input="editUrl" v-if="type == 'Custom'" placeholder="URL">
//                         </div>
//                         <div class="form-group mb-1 mt-1 p-0">
//                             <input type="text" value="{{ classname }}" v-model="classname" v-on:input="editClassname" placeholder="Extra classname">
//                             <input type="text" value="{{ linktitle }}" v-model="linktitle" v-on:input="editLinkTitle" placeholder="Custom link title">
//                         </div>
//                         <div class="form-group p-0">
//                             <button type="button" class="btn btn-primary" @click="editPage">{{ translate('cp.done') }}</button>
//                             <button type="button" class="btn btn-default" @click="cancelTitleChange">{{ translate('cp.cancel') }}</button>
//                         </div>
//                         <span v-if="title != original_title" class="original-title mt-1 text-muted">Original title: {{ original_title }}</span>
//                     </div>
//                 </div>
//
//             </div>
//
//             <div class="branch-meta flex items-center pr-1">
//                 <div class="page-actions">
//                     <a :href="url" :title="url" class="page-action text-grey-dark px-sm bloop" target="_blank">
//                         <svg-icon name="visit" class="opacity-25 hover:opacity-75 h-4 w-4"></svg-icon>
//                     </a>
//                     <div class="btn-group page-action action-more px-sm">
//                         <i class="icon icon-dots-three-vertical opacity-25 hover:opacity-75" data-toggle="dropdown"></i>
//                         <ul class="dropdown-menu">
//                             <li>
//                                 <button type="button" class="btn btn-block" @click="editPage">{{ translate('cp.edit') }}</button>
//                             </li>
//                             <li class="warning">
//                                 <button type="button" class="btn btn-block btn-danger" @click="deletePage">{{ translate('cp.delete') }}</button>
//                             </li>
//                         </ul>
//                     </div>
//                 </div>
//             </div>
//         </div>
//
//         <bkbranches :pages="childPages"
//                   :depth="depth + 1"
//                   :parent-url="url"
//                   :collapsed.sync="collapsed">
//         </bkbranches>
//     </li>
// </template>
//
// <script>
/* harmony default export */ __webpack_exports__["default"] = ({

    data: function data() {
        return {
            isActive: false
        };
    },

    props: {
        branchIndex: Number,
        id: String,
        title: String,
        original_title: String,
        url: String,
        classname: String,
        linktitle: String,
        type: String,
        childPages: {
            type: Array,
            default: function _default() {
                return [];
            }
        },
        locales: Array,
        depth: Number
    },

    computed: {

        hasChildren: function hasChildren() {
            return this.childPages.length;
        },

        isSingleTopLevelPage: function isSingleTopLevelPage() {
            return this.$parent.pages.length === 1 && this.depth === 1;
        },


        classObject: function classObject() {
            return {
                active: this.isActive
            };
        }

    },

    methods: {

        deletePage: function deletePage() {
            var self = this;

            // Find object by selected ID
            var index = this.$parent.pages.findIndex(function (item, i) {
                return item.id === self.id;
            });

            // Remove the object by index
            if (index > -1) {
                this.$parent.pages.splice(index, 1);
            }
            this.$dispatch('page.deleted');
        },

        editTitle: function editTitle(evt) {
            var self = this;
            var result = this.$parent.pages[this.branchIndex];
            result.title = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editUrl: function editUrl(evt) {
            var self = this;
            var result = this.$parent.pages[this.branchIndex];
            result.url = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editClassname: function editClassname(evt) {
            var self = this;
            var result = this.$parent.pages[this.branchIndex];
            result.classname = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editLinkTitle: function editLinkTitle(evt) {
            var self = this;
            var result = this.$parent.pages[this.branchIndex];
            result.linktitle = evt.target.value;
            this.$dispatch('page.edit', evt.target.value);
        },

        editPage: function editPage() {
            var self = this;
            self.isActive = !self.isActive;
        },

        cancelTitleChange: function cancelTitleChange() {
            var self = this;
            self.isActive = !self.isActive;
            self.title = self.original_title;
        }
    }

});
// </script>

/***/ }),
/* 15 */
/***/ (function(module, exports) {

module.exports = "\n<li class=\"branch\" :data-depth=\"depth\">\n    <div class=\"branch-row w-full flex items-center\">\n\n        <div class=\"page-move drag-handle w-6 h-full\"></div>\n\n        <div class=\"flex items-center flex-1 p-1\">\n\n            <div class=\"page-text\" v-bind:class=\"classObject\">\n\n                <div class=\"page-title\" v-if=\"title\">{{ title }} <span class=\"text-muted\">({{ type }})</span></div>\n                <div class=\"page-title\" v-else>{{ locales[0].title }} <span class=\"text-muted\">({{ type }})</span></div>\n\n                <div class=\"edit-url pt-1 mb-1\">\n                    <div class=\"form-group form-group--main mb-1 mt-1 p-0\">\n                        <input type=\"text\" value=\"{{ title }}\" v-model=\"title\" v-on:input=\"editTitle\" placeholder=\"Title\">\n                        <input type=\"text\" value=\"{{ url }}\" v-model=\"url\" v-on:input=\"editUrl\" v-if=\"type == 'Custom'\" placeholder=\"URL\">\n                    </div>\n                    <div class=\"form-group mb-1 mt-1 p-0\">\n                        <input type=\"text\" value=\"{{ classname }}\" v-model=\"classname\" v-on:input=\"editClassname\" placeholder=\"Extra classname\">\n                        <input type=\"text\" value=\"{{ linktitle }}\" v-model=\"linktitle\" v-on:input=\"editLinkTitle\" placeholder=\"Custom link title\">\n                    </div>\n                    <div class=\"form-group p-0\">\n                        <button type=\"button\" class=\"btn btn-primary\" @click=\"editPage\">{{ translate('cp.done') }}</button>\n                        <button type=\"button\" class=\"btn btn-default\" @click=\"cancelTitleChange\">{{ translate('cp.cancel') }}</button>\n                    </div>\n                    <span v-if=\"title != original_title\" class=\"original-title mt-1 text-muted\">Original title: {{ original_title }}</span>\n                </div>\n            </div>\n\n        </div>\n\n        <div class=\"branch-meta flex items-center pr-1\">\n            <div class=\"page-actions\">\n                <a :href=\"url\" :title=\"url\" class=\"page-action text-grey-dark px-sm bloop\" target=\"_blank\">\n                    <svg-icon name=\"visit\" class=\"opacity-25 hover:opacity-75 h-4 w-4\"></svg-icon>\n                </a>\n                <div class=\"btn-group page-action action-more px-sm\">\n                    <i class=\"icon icon-dots-three-vertical opacity-25 hover:opacity-75\" data-toggle=\"dropdown\"></i>\n                    <ul class=\"dropdown-menu\">\n                        <li>\n                            <button type=\"button\" class=\"btn btn-block\" @click=\"editPage\">{{ translate('cp.edit') }}</button>\n                        </li>\n                        <li class=\"warning\">\n                            <button type=\"button\" class=\"btn btn-block btn-danger\" @click=\"deletePage\">{{ translate('cp.delete') }}</button>\n                        </li>\n                    </ul>\n                </div>\n            </div>\n        </div>\n    </div>\n\n    <bkbranches :pages=\"childPages\"\n              :depth=\"depth + 1\"\n              :parent-url=\"url\"\n              :collapsed.sync=\"collapsed\">\n    </bkbranches>\n</li>\n";

/***/ }),
/* 16 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
// <template>
//     <ul :class="classes">
//         <bkbranch v-for="page in pages"
//                 :branch-index="$index"
//                 :id="page.id"
//                 :title="page.title"
//                 :original_title="page.original_title"
//                 :locales="page.locales"
//                 :url="page.url"
//                 :classname="page.classname"
//                 :linktitle="page.linktitle"
//                 :type="page.type"
//                 :child-pages="page.items"
//                 :depth="depth"
//         ></bkbranch>
//     </ul>
// </template>
//
// <script>
/* harmony default export */ __webpack_exports__["default"] = ({

    props: {
        pages: Array,
        depth: Number,
        parentUrl: {
            type: String,
            default: ''
        }
    },

    computed: {

        classes: function classes() {
            // Start with the static ones
            var classes = ['branches'];

            // Add depth
            classes.push('depth-' + this.depth);

            // Empty
            if (!this.pages.length) {
                classes.push('empty');
            }

            // State
            var state = this.collapsed ? 'collapsed' : 'open';
            classes.push('branches-' + state);

            return classes.join(' ');
        }
    },

    methods: {

        toggle: function toggle(page) {
            page.$set('collapsed', !page.collapsed);
        },

        buildUrl: function buildUrl(slug) {
            return this.parentUrl + '/' + slug;
        }

    }

});
// </script>

/***/ }),
/* 17 */
/***/ (function(module, exports) {

module.exports = "\n<ul :class=\"classes\">\n    <bkbranch v-for=\"page in pages\"\n            :branch-index=\"$index\"\n            :id=\"page.id\"\n            :title=\"page.title\"\n            :original_title=\"page.original_title\"\n            :locales=\"page.locales\"\n            :url=\"page.url\"\n            :classname=\"page.classname\"\n            :linktitle=\"page.linktitle\"\n            :type=\"page.type\"\n            :child-pages=\"page.items\"\n            :depth=\"depth\"\n    ></bkbranch>\n</ul>\n";

/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

var __vue_script__, __vue_template__
var __vue_styles__ = {}
__vue_script__ = __webpack_require__(19)
if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
  console.warn("[vue-loader] BigKahuna/resources/assets/src/js/BkPageTree.vue: named exports in *.vue files are ignored.")}
module.exports = __vue_script__ || {}
if (module.exports.__esModule) module.exports = module.exports.default
var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
if (__vue_template__) {
__vue_options__.template = __vue_template__
}
if (!__vue_options__.computed) __vue_options__.computed = {}
Object.keys(__vue_styles__).forEach(function (key) {
var module = __vue_styles__[key]
__vue_options__.computed[key] = function () { return module }
})
if (false) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  var id = "_v-49402356/BkPageTree.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, __vue_template__)
  }
})()}

/***/ }),
/* 19 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__BkFilter_vue__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__BkFilter_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__BkFilter_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__BkCustomLink_vue__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__BkCustomLink_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__BkCustomLink_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__BkBranch_vue__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__BkBranch_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__BkBranch_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__BkBranches_vue__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__BkBranches_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3__BkBranches_vue__);
// <script>





/* harmony default export */ __webpack_exports__["default"] = ({

    components: {
        BkFilter: __WEBPACK_IMPORTED_MODULE_0__BkFilter_vue___default.a,
        BkCustomLink: __WEBPACK_IMPORTED_MODULE_1__BkCustomLink_vue___default.a,
        BkBranches: __WEBPACK_IMPORTED_MODULE_3__BkBranches_vue___default.a,
        BkBranch: __WEBPACK_IMPORTED_MODULE_2__BkBranch_vue___default.a
    },

    props: ['menu', 'locale'],

    data: function data() {
        return {
            loading: true,
            saving: false,
            changed: false,
            showUrls: false,
            show: "urls",
            pages: [],
            allpages: [],
            arePages: true,
            name: [],
            locale: ''
        };
    },

    created: function created() {
        this.$eventHub.$on('append-links', this.appendLinks);
    },
    beforeDestroy: function beforeDestroy() {
        this.$eventHub.$off('append-links');
    },


    computed: {
        hasChildren: function hasChildren() {
            return _.some(this.pages, function (page) {
                return page.pages.length;
            });
        },
        isSortable: function isSortable() {
            return Vue.can('pages:reorder');
        }
    },

    ready: function ready() {
        var _this = this;

        this.getPages();
        Mousetrap.bindGlobal('mod+s', function (e) {
            e.preventDefault();
            _this.save();
        });
    },

    methods: {
        appendLinks: function appendLinks(page) {
            this.page = page;
            this.pages.push.apply(this.pages, page);
            this.changed = true;
            this.arePages = true;

            this.$nextTick(function () {
                this.initSortable();
            });
        },


        getPages: function getPages() {
            this.pages = [];
            this.loading = false;
            var url = cp_url('addons/big-kahuna/json/' + this.menu);

            this.$http.get(url, function (data) {
                if (data) {
                    this.arePages = data.pages.length > 0;
                    this.pages = data.pages;
                    this.loading = false;

                    this.$nextTick(function () {
                        this.initSortable();
                    });
                } else {
                    this.arePages = false;
                }
            });
        },

        initSortable: function initSortable() {
            if (!this.isSortable) {
                return;
            }

            var self = this;
            var draggedIndex, draggedPage, draggedInstance;

            var placeholder = '' + '<li class="branch branch-placeholder">' + '<div class="branch-row w-full flex items-center depth-{{ depth }}">' + '<div class="page-move drag-handle w-6 h-full"></div>' + '<div class="flex p-1 items-center flex-1">' + '<div class="page-text">&nbsp;</div>' + '</div>' + '</div>' + '</li>';

            $(this.$el).find('.page-tree > ul + ul').nestedSortable({
                containerSelector: 'ul',
                handle: '.drag-handle',
                placeholderClass: 'branch-placeholder',
                placeholder: placeholder,
                bodyClass: 'page-tree-dragging',
                draggedClass: 'branch-dragged',
                onMousedown: function onMousedown($item, _super, event) {
                    // Prevent dragging a lone top level page.
                    var branch = $item[0].__vue__;
                    var depth = parseInt($item[0].dataset.depth);
                    if (branch.$parent.pages.length === 1 && depth === 1) return false;
                    return true;
                },
                onDragStart: function onDragStart($item, container, _super, event) {
                    // Grab the original page we're dragging now so we can move it later.
                    var branch = $item[0].__vue__;
                    draggedInstance = branch;
                    draggedIndex = branch.branchIndex;
                    draggedPage = branch.$parent.pages[draggedIndex];

                    // Let the plugin continue
                    _super($item, container);
                },
                onDrag: function onDrag($item, container, _super, event) {
                    // Update the placeholder template to show the page name.
                    if (Array.isArray(draggedPage.locales)) {
                        $('.branch-placeholder').find('.page-text').text(draggedPage.locales[0].title + ' (' + draggedPage.type + ')');
                    } else {
                        $('.branch-placeholder').find('.page-text').text(draggedPage.title + ' (' + draggedPage.type + ')');
                    }
                    _super($item, container);
                },
                onDrop: function onDrop($item, container, _super, event) {
                    self.$els.click.play();
                    self.changed = true;

                    // Remove the page from its original place
                    draggedInstance.$parent.pages.splice(draggedIndex, 1);

                    // Get the drop position
                    var dropIndex = $item.index();
                    var parentInstance = $item.parent()[0].__vue__;

                    // Get the new page's position and inject it into the data
                    parentInstance.pages.splice(dropIndex, 0, draggedPage);

                    // Force the Vue component to reload itself
                    var pages = self.pages;
                    self.pages = [];
                    self.$nextTick(function () {
                        self.pages = pages;
                    });

                    // Let the plugin continue
                    _super($item, container);
                }
            });
        },

        updateDroppedUrl: function updateDroppedUrl(page, url) {
            var self = this;

            url = url || '';

            page.url = url + '/' + page.slug;

            page.pages = _.map(page.pages, function (child) {
                return self.updateDroppedUrl(child, page.url);
            });

            return page;
        },

        save: function save() {
            var self = this;

            self.saving = true;

            var pages = JSON.parse(JSON.stringify(self.pages));
            pages = self.updateOrderIndexes(pages);

            this.$http.post(cp_url('addons/big-kahuna/save/' + this.menu), { pages: pages, locale: self.locale }).success(function (data) {
                self.getPages();
                self.changed = false;
                self.saving = false;
                self.$dispatch('setFlashSuccess', translate('cp.pages_reordered'));
            });
        },

        updateOrderIndexes: function updateOrderIndexes(pages) {
            var self = this;

            return _.map(pages, function (item, i) {
                // Recursively iterate over any children
                if (item.items.length) {
                    item.items = self.updateOrderIndexes(item.items);
                }

                // We need the 1-based indexes
                item.order = i + 1;

                return item;
            });
        },

        onShowDraftsChanged: function onShowDraftsChanged() {
            this.getPages();
        },
        onLocaleChanged: function onLocaleChanged() {
            this.getPages();
        }
    },

    events: {

        'page.edit': function pageEdit() {
            var self = this;
            self.changed = true;
        },

        'page.deleted': function pageDeleted() {
            var self = this;
            self.changed = true;
        }

    },

    watch: {
        changed: function changed(_changed) {
            this.$dispatch('changesMade', _changed);
        }
    }

});
// </script>

/***/ })
/******/ ]);