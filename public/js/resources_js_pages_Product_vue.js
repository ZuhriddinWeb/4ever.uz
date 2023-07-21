"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_Product_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/Product.vue?vue&type=script&setup=true&lang=js":
/*!*******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/Product.vue?vue&type=script&setup=true&lang=js ***!
  \*******************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _components_Header_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/Header.vue */ "./resources/js/components/Header.vue");
/* harmony import */ var _components_Footer_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/Footer.vue */ "./resources/js/components/Footer.vue");
/* harmony import */ var _components_Preloader_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/Preloader.vue */ "./resources/js/components/Preloader.vue");
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.esm-bundler.js");





/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  __name: 'Product',
  props: ["id", "product_id"],
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var product_id = __props;
    var route = (0,vue_router__WEBPACK_IMPORTED_MODULE_4__.useRoute)();
    var loader = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(null);
    var openTab = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(1);
    var product_with_cat = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(null);
    var uzsnbu = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(null);
    function toggleTabs(tabNumber) {
      return openTab.value = tabNumber;
    }
    var currentProduct = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)({});
    function add_cart_user(id_product) {
      axios.get("cart-save/".concat(id_product)).then(function (_ref2) {
        var data = _ref2.data;
        if (data) store.state.cart.push(id_product);else {
          store.state.cart = store.state.cart.filter(function (item) {
            return item !== id_product;
          });
        }
      });
    }
    axios.get("uzsnbu").then(function (_ref3) {
      var data = _ref3.data;
      uzsnbu.value = data[0];
    });
    function getProducts() {
      axios.get("products-by-id/".concat(product_id.id)).then(function (_ref4) {
        var data = _ref4.data;
        currentProduct.value = data[0];
        axios.get("products-with-cat/".concat(data[0].category_id)).then(function (res) {
          product_with_cat.value = res.data;
        });
        setInterval(function () {
          loader.value = true;
        }, 1500);
      });
    }
    getProducts();
    (0,vue__WEBPACK_IMPORTED_MODULE_0__.watch)(function () {
      return route.params.id;
    }, function (old) {
      return getProducts();
    });
    var __returned__ = {
      route: route,
      loader: loader,
      openTab: openTab,
      product_with_cat: product_with_cat,
      uzsnbu: uzsnbu,
      toggleTabs: toggleTabs,
      product_id: product_id,
      currentProduct: currentProduct,
      add_cart_user: add_cart_user,
      getProducts: getProducts,
      reactive: vue__WEBPACK_IMPORTED_MODULE_0__.reactive,
      onMounted: vue__WEBPACK_IMPORTED_MODULE_0__.onMounted,
      ref: vue__WEBPACK_IMPORTED_MODULE_0__.ref,
      watch: vue__WEBPACK_IMPORTED_MODULE_0__.watch,
      Header: _components_Header_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
      Footer: _components_Footer_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
      Preloader: _components_Preloader_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
      get useRoute() {
        return vue_router__WEBPACK_IMPORTED_MODULE_4__.useRoute;
      }
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Footer.vue?vue&type=template&id=61a7c374":
/*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Footer.vue?vue&type=template&id=61a7c374 ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<section class=\"py-8\"><div><a class=\"uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8\" href=\"#\"> About </a><p class=\"mt-8 mb-8\">This template is inspired by the stunning nordic minamalist design - in particular: <br><a class=\"text-gray-800 underline hover:text-gray-900\" href=\"http://savoy.nordicmade.com/\" target=\"_blank\">Savoy Theme</a> created by <a class=\"text-gray-800 underline hover:text-gray-900\" href=\"https://nordicmade.com/\">https://nordicmade.com/</a> and <a class=\"text-gray-800 underline hover:text-gray-900\" href=\"https://www.metricdesign.no/\" target=\"_blank\">https://www.metricdesign.no/</a></p><p class=\"mb-8\">Lorem ipsum dolor sit amet, consectetur <a href=\"#\">random link</a> adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu consequat ac.</p></div></section><footer class=\"py-8 border-t border-gray-300\"><div><div class=\"flex flex-wrap\"><div class=\"w-full lg:w-1/2\"><h3 class=\"font-bold text-gray-900\">About</h3><p class=\"py-4\"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia. </p></div><div class=\"w-full lg:w-1/2 lg:justify-end lg:text-right\"><h3 class=\"font-bold text-gray-900\">Social</h3><ul class=\"list-reset items-center pt-3\"><li><a class=\"inline-block no-underline hover:text-black hover:underline py-1\" href=\"#\">Add social links</a></li></ul></div></div></div></footer>", 2);
function render(_ctx, _cache) {
  return _hoisted_1;
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/Product.vue?vue&type=template&id=b8645414":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/Product.vue?vue&type=template&id=b8645414 ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3"
};
var _hoisted_2 = {
  "class": "flex flex-col w-full"
};
var _hoisted_3 = {
  "class": "w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0"
};
var _hoisted_4 = {
  "class": "flex justify-between md:w-2/3 lg:w-3/4 py-5"
};
var _hoisted_5 = {
  "class": "w-5/6 mx-3 bg-gray-200"
};
var _hoisted_6 = ["src"];
var _hoisted_7 = {
  "class": "flex flex-col justify-between my-2 px-4 py-5 lg:w-1/4 md:w-2/3"
};
var _hoisted_8 = {
  "class": "flex flex-col h-2/3"
};
var _hoisted_9 = {
  "class": "text-gray-300"
};
var _hoisted_10 = {
  "class": "text-2xl my-3"
};
var _hoisted_11 = {
  "class": "font-medium text-xl"
};
var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "mr-1"
}, "Категория:", -1 /* HOISTED */);
var _hoisted_13 = {
  "class": "text-orange-500"
};
var _hoisted_14 = {
  "class": "font-medium text-xl"
};
var _hoisted_15 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "mr-1"
}, "Аромат:", -1 /* HOISTED */);
var _hoisted_16 = {
  "class": "text-orange-500"
};
var _hoisted_17 = {
  "class": "font-medium text-xl"
};
var _hoisted_18 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "mr-1"
}, "Доступность:", -1 /* HOISTED */);
var _hoisted_19 = {
  key: 0,
  "class": "text-green-500"
};
var _hoisted_20 = {
  key: 1,
  "class": "text-rose-500"
};
var _hoisted_21 = {
  "class": "flex flex-col"
};
var _hoisted_22 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, null, -1 /* HOISTED */);
var _hoisted_23 = {
  "class": "my-2"
};
var _hoisted_24 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "mr-1 text-xl"
}, "Объем :", -1 /* HOISTED */);
var _hoisted_25 = {
  "class": "text-md uppercase my-1 text-xl"
};
var _hoisted_26 = {
  "class": "font-medium"
};
var _hoisted_27 = {
  "class": "text-md uppercase my-1 text-xl"
};
var _hoisted_28 = {
  "class": "font-medium"
};
var _hoisted_29 = {
  "class": "flex justify-start items-center"
};
var _hoisted_30 = {
  key: 0
};
var _hoisted_31 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fal fa-shopping-bag pr-3"
}, null, -1 /* HOISTED */);
var _hoisted_32 = {
  key: 1
};
var _hoisted_33 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fal fa-check pr-3"
}, null, -1 /* HOISTED */);
var _hoisted_34 = {
  "class": "px-2"
};
var _hoisted_35 = {
  "class": "flex flex-wrap"
};
var _hoisted_36 = {
  "class": "w-full"
};
var _hoisted_37 = {
  "class": "flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row"
};
var _hoisted_38 = {
  "class": "-mb-px mr-2 last:mr-0 flex-auto text-center"
};
var _hoisted_39 = {
  "class": "-mb-px mr-2 last:mr-0 flex-auto text-center"
};
var _hoisted_40 = {
  "class": "relative flex flex-col min-w-0 break-words bg-white w-full mb-6"
};
var _hoisted_41 = {
  "class": "px-4 py-5 flex-auto"
};
var _hoisted_42 = {
  "class": "tab-content tab-space"
};
var _hoisted_43 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1 /* HOISTED */);
var _hoisted_44 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1 /* HOISTED */);
var _hoisted_45 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1 /* HOISTED */);
var _hoisted_46 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1 /* HOISTED */);
var _hoisted_47 = {
  "class": "flex flex-col"
};
var _hoisted_48 = {
  key: 0,
  "class": "flex h-10 text-xl px-2 mx-2 mb-2 items-center border-b-2 border-orange-500 justify-center rounded-sm"
};
var _hoisted_49 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fal fa-leaf-maple mr-2"
}, null, -1 /* HOISTED */);
var _hoisted_50 = {
  "class": "flex flex-wrap w-full"
};
var _hoisted_51 = {
  "class": "w-full p-4 flex flex-col bg-white mb-2 rounded-sm border border-gray-100 hover:shadow-lg"
};
var _hoisted_52 = {
  "class": "-m-4 mb-3 relative overflow-hidden"
};
var _hoisted_53 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "absolute top-0 left-0 w-full h-full bg-black/20"
}, null, -1 /* HOISTED */);
var _hoisted_54 = ["src"];
var _hoisted_55 = {
  "class": "flex flex-col"
};
var _hoisted_56 = {
  "class": "text-orange-500"
};
var _hoisted_57 = {
  "class": "text-gray-400 mb-4"
};
var _hoisted_58 = {
  "class": "text-gray-400 flex justify-between items-center"
};
var _hoisted_59 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fal fa-certificate text-orange-500 mr-1"
}, null, -1 /* HOISTED */);
var _hoisted_60 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-xs"
}, " 17 Mar "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "ml-1 fal text-orange-500 fa-calendar"
})], -1 /* HOISTED */);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _$setup$currentProduc, _$setup$currentProduc2;
  var _component_router_link = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("router-link");
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("section", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("article", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
    "class": "h-wull w-full",
    src: '/images/' + ((_$setup$currentProduc = $setup.currentProduct) === null || _$setup$currentProduc === void 0 ? void 0 : _$setup$currentProduc.images_product)
  }, null, 8 /* PROPS */, _hoisted_6)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("article", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_9, "#" + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.id), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_10, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.product_name), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_11, [_hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_13, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)((_$setup$currentProduc2 = $setup.currentProduct.category) === null || _$setup$currentProduc2 === void 0 ? void 0 : _$setup$currentProduc2.category_name), 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_14, [_hoisted_15, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_16, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.flavor), 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_17, [_hoisted_18, $setup.currentProduct.count_products > 0 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_19, "на складе")) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_20, "нет складе"))])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("main", _hoisted_21, [_hoisted_22, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_23, [_hoisted_24, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.volume) + "ml ", 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Цена на USD: "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_26, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.price) + "$", 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Цена на UZS: "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_28, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.price * $setup.uzsnbu.Rate) + " сум", 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return $setup.add_cart_user($setup.currentProduct.id);
    }),
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([{
      'bg-orange-600 text-white': _ctx.$store.state.cart.includes($setup.currentProduct.id)
    }, "border border-orange-600 text-orange-600 px-4 py-2 rounded-sm hover:opacity-70 text-xs font-bold uppercase"])
  }, [_ctx.$store.state.cart.includes($setup.currentProduct.id) == false ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_30, [_hoisted_31, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("В корзину")])) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_32, [_hoisted_33, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Удалить из корзины ")]))], 2 /* CLASS */)])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_34, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_35, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_37, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_38, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["text-xs font-bold uppercase px-5 py-3 block leading-normal cursor-pointer hover:text-orange-500", {
      'text-black': $setup.openTab !== 1,
      'border-b-2 border-orange-500': $setup.openTab === 1
    }]),
    onClick: _cache[1] || (_cache[1] = function ($event) {
      return $setup.toggleTabs(1);
    })
  }, " Описание продукта ", 2 /* CLASS */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_39, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["text-xs font-bold uppercase px-5 py-3 block leading-normal cursor-pointer hover:text-orange-500", {
      'text-black': $setup.openTab !== 2,
      'border-b-2 border-orange-500': $setup.openTab === 2
    }]),
    onClick: _cache[2] || (_cache[2] = function ($event) {
      return $setup.toggleTabs(2);
    })
  }, " Ингредиенты ", 2 /* CLASS */)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_40, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_41, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_42, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)({
      hidden: $setup.openTab !== 1,
      block: $setup.openTab === 1
    })
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.description_product) + " ", 1 /* TEXT */), _hoisted_43, _hoisted_44])], 2 /* CLASS */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)({
      hidden: $setup.openTab !== 2,
      block: $setup.openTab === 2
    })
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.currentProduct.instruction_product) + " ", 1 /* TEXT */), _hoisted_45, _hoisted_46])], 2 /* CLASS */)])])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_47, [$setup.product_with_cat ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("h3", _hoisted_48, [_hoisted_49, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("МЫ РЕКОМЕНДУЕМ ")])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_50, [$setup.product_with_cat ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    key: 0
  }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.product_with_cat, function (similarProducts, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(_component_router_link, {
      to: {
        name: 'product-view',
        params: {
          id: similarProducts.id
        }
      },
      "class": "w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col px-2 cursor-pointer border-gray-50"
    }, {
      "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
        return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_51, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("main", _hoisted_52, [_hoisted_53, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
          "class": "h-[180px] w-full object-contain",
          src: '/images/' + (similarProducts === null || similarProducts === void 0 ? void 0 : similarProducts.images_product)
        }, null, 8 /* PROPS */, _hoisted_54)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("main", _hoisted_55, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <h3 class=\"font-semibold text-xl\">{{ similarProducts.id }}</h3> "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_56, " #" + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(similarProducts.id), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_57, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(similarProducts.description_product), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("main", _hoisted_58, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, [_hoisted_59, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(similarProducts.category_name), 1 /* TEXT */)]), _hoisted_60])])])];
      }),
      _: 2 /* DYNAMIC */
    }, 1032 /* PROPS, DYNAMIC_SLOTS */, ["to"]);
  }), 256 /* UNKEYED_FRAGMENT */)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <footer>\r\n<Footer/>\r\n</footer> ")], 2112 /* STABLE_FRAGMENT, DEV_ROOT_FRAGMENT */);
}

/***/ }),

/***/ "./resources/js/components/Footer.vue":
/*!********************************************!*\
  !*** ./resources/js/components/Footer.vue ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Footer_vue_vue_type_template_id_61a7c374__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Footer.vue?vue&type=template&id=61a7c374 */ "./resources/js/components/Footer.vue?vue&type=template&id=61a7c374");
/* harmony import */ var D_media_ospanel_domains_4ever_uz_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,D_media_ospanel_domains_4ever_uz_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_Footer_vue_vue_type_template_id_61a7c374__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/components/Footer.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/pages/Product.vue":
/*!****************************************!*\
  !*** ./resources/js/pages/Product.vue ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Product_vue_vue_type_template_id_b8645414__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Product.vue?vue&type=template&id=b8645414 */ "./resources/js/pages/Product.vue?vue&type=template&id=b8645414");
/* harmony import */ var _Product_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Product.vue?vue&type=script&setup=true&lang=js */ "./resources/js/pages/Product.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var D_media_ospanel_domains_4ever_uz_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,D_media_ospanel_domains_4ever_uz_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Product_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Product_vue_vue_type_template_id_b8645414__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/pages/Product.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/pages/Product.vue?vue&type=script&setup=true&lang=js":
/*!***************************************************************************!*\
  !*** ./resources/js/pages/Product.vue?vue&type=script&setup=true&lang=js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Product.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/Product.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/components/Footer.vue?vue&type=template&id=61a7c374":
/*!**************************************************************************!*\
  !*** ./resources/js/components/Footer.vue?vue&type=template&id=61a7c374 ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Footer_vue_vue_type_template_id_61a7c374__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Footer_vue_vue_type_template_id_61a7c374__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Footer.vue?vue&type=template&id=61a7c374 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Footer.vue?vue&type=template&id=61a7c374");


/***/ }),

/***/ "./resources/js/pages/Product.vue?vue&type=template&id=b8645414":
/*!**********************************************************************!*\
  !*** ./resources/js/pages/Product.vue?vue&type=template&id=b8645414 ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_template_id_b8645414__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_template_id_b8645414__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Product.vue?vue&type=template&id=b8645414 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/Product.vue?vue&type=template&id=b8645414");


/***/ })

}]);