"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_profilepages_MyPeoplesTable_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=script&setup=true&lang=js":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=script&setup=true&lang=js ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ssthouse_vue3_tree_chart_dist_vue3_tree_chart_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @ssthouse/vue3-tree-chart/dist/vue3-tree-chart.css */ "./node_modules/@ssthouse/vue3-tree-chart/dist/vue3-tree-chart.css");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _helpers_userAccount__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../helpers/userAccount */ "./resources/js/helpers/userAccount.js");



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  __name: 'MyPeoplesTable',
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var vehicules = (0,vue__WEBPACK_IMPORTED_MODULE_1__.reactive)({
      name: null,
      children: []
    });
    var _Init = (0,_helpers_userAccount__WEBPACK_IMPORTED_MODULE_2__.Init)(store.state.user.id, store.state.user.lastPeriod),
      users = _Init.users,
      levels = _Init.levels,
      totalPrice = _Init.totalPrice,
      user = _Init.user,
      period = _Init.period,
      changePeriod = _Init.changePeriod;
    (0,vue__WEBPACK_IMPORTED_MODULE_1__.watch)(function () {
      return user.value;
    }, function () {
      vehicules.name = user.value.fname;
      vehicules.total = user.value.periodSumma;
      vehicules.children = user.value.children;
      vehicules.childrenCount = user.value.children.length;
    });
    var columnDefs = (0,vue__WEBPACK_IMPORTED_MODULE_1__.reactive)([{
      headerName: "T/r",
      valueGetter: "node.rowIndex + 1",
      width: 90
    },
    // { headerName: "Kod", field: "id",width: 90 },
    // { headerName: "Buyurtma vaqti", field: "order_check",flex:1 },
    {
      headerName: "Имя ",
      field: "fname",
      width: 120
    }, {
      headerName: "Фамилия ",
      field: "lname",
      width: 120
    }, {
      headerName: "Поколение ",
      field: 'level'
    }, {
      headerName: "Сумма",
      field: 'total'
    }, {
      headerName: "Процент",
      field: 'procent',
      flex: 1
    }]);
    var defaultColDef = {
      sortable: true,
      filter: true
    };
    var __returned__ = {
      vehicules: vehicules,
      users: users,
      levels: levels,
      totalPrice: totalPrice,
      user: user,
      period: period,
      changePeriod: changePeriod,
      columnDefs: columnDefs,
      defaultColDef: defaultColDef,
      reactive: vue__WEBPACK_IMPORTED_MODULE_1__.reactive,
      ref: vue__WEBPACK_IMPORTED_MODULE_1__.ref,
      watch: vue__WEBPACK_IMPORTED_MODULE_1__.watch,
      get Init() {
        return _helpers_userAccount__WEBPACK_IMPORTED_MODULE_2__.Init;
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=template&id=71c3655e":
/*!********************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=template&id=71c3655e ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "flex flex-col h-full"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", {
  "class": "text-2xl text-gray-700 mb-4"
}, "Таблица", -1 /* HOISTED */);
var _hoisted_3 = {
  "class": "text-xl font-semibold"
};
var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Квалификация", -1 /* HOISTED */);
var _hoisted_5 = {
  "class": "text-teal-500 pl-2"
};
var _hoisted_6 = {
  "class": "text-xl font-semibold"
};
var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Сумма за расчётный период", -1 /* HOISTED */);
var _hoisted_8 = {
  "class": "text-teal-500 pl-2"
};
var _hoisted_9 = {
  "class": "flex justify-between mb-5 items-end"
};
var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "font-semibold"
}, "Расчётный период", -1 /* HOISTED */);
var _hoisted_11 = {
  "class": "pl-2"
};
var _hoisted_12 = {
  "class": "flex flex-col"
};
var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "period",
  "class": "text-gray-500 mb-1 w-full inline-block text-right text-sm"
}, "Период", -1 /* HOISTED */);
var _hoisted_14 = ["value"];
var _hoisted_15 = {
  "class": "flex-grow flex flex-col"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _$setup$user, _$setup$user2;
  var _component_ag_grid_vue = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("ag-grid-vue");
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [_hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("header", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_3, [_hoisted_4, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_5, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$store.state.statuses[$setup.levels - 1]), 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_6, [_hoisted_7, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_8, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.totalPrice), 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("main", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_10, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_11, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)((_$setup$user = $setup.user) === null || _$setup$user === void 0 ? void 0 : _$setup$user.days[0]) + " - " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)((_$setup$user2 = $setup.user) === null || _$setup$user2 === void 0 ? void 0 : _$setup$user2.days[1]), 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [_hoisted_13, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    id: "period",
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.period = $event;
    }),
    onChange: _cache[1] || (_cache[1] = function () {
      return $setup.changePeriod && $setup.changePeriod.apply($setup, arguments);
    }),
    "class": "border-b outline-none px-2 py-0.5"
  }, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(_ctx.$store.state.user.lastPeriod, function (period) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("option", {
      value: period
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(period) + " Период ", 9 /* TEXT, PROPS */, _hoisted_14);
  }), 256 /* UNKEYED_FRAGMENT */))], 544 /* HYDRATE_EVENTS, NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.period]])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("section", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_ag_grid_vue, {
    "class": "ag-theme-material h-96 w-full shadow border-0",
    columnDefs: $setup.columnDefs,
    rowData: $setup.users,
    defaultColDef: $setup.defaultColDef,
    animateRows: "true",
    rowSelection: 'multiple'
  }, null, 8 /* PROPS */, ["columnDefs", "rowData"])])]);
}

/***/ }),

/***/ "./resources/js/helpers/mathHelpers.js":
/*!*********************************************!*\
  !*** ./resources/js/helpers/mathHelpers.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getBigNumbers": () => (/* binding */ getBigNumbers),
/* harmony export */   "roundNumber": () => (/* binding */ roundNumber)
/* harmony export */ });
function getBigNumbers(array, length) {
  array.sort(function (a, b) {
    return a - b;
  });
  return array.slice(-length);
}
function roundNumber(number) {
  var multiple = Math.pow(10, 1);
  return Math.round(number * multiple) / multiple;
}

/***/ }),

/***/ "./resources/js/helpers/userAccount.js":
/*!*********************************************!*\
  !*** ./resources/js/helpers/userAccount.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Init": () => (/* binding */ Init)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _mathHelpers__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./mathHelpers */ "./resources/js/helpers/mathHelpers.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }


function Init() {
  var selectedUser = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var lastPeriod = arguments.length > 1 ? arguments[1] : undefined;
  var totalPrice = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(null);
  var user = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(null);
  var period = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(lastPeriod);
  var users = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)([]);
  var liderCategories = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)([]);
  var leaderBonus = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(0);
  function recursiya(data) {
    data.forEach(function (user) {
      user.name = user.fname;
      if (user.level == 1) getProcent(user, 11);
      if (user.level == 2 && levels.value > 1) getProcent(user, 11);
      if (user.level == 3 && levels.value > 2) getProcent(user, 10);
      if (user.level == 4 && levels.value > 3) getProcent(user, 10);
      if (user.level == 5 && levels.value > 4) getProcent(user, 8);
      if (user.level == 6 && levels.value > 5) getProcent(user, 8);
      if (user.level == 7 && levels.value > 6) getProcent(user, 8);
      if (user.level == 8 && levels.value > 7) getProcent(user, 7);
      if (user.level == 9 && levels.value > 8) getProcent(user, 7);
      user.children = user.children.filter(function (element) {
        return user.id == element.parent_id;
      });
      user.childrenCount = user.children.length;
      if (LiderProsent.value && user.level > 5) {
        user.liderBonus = +user.total * (LiderProsent.value / 100);
        leaderBonus.value += user.liderBonus;
      }
      users.value.push(user);
      recursiya(user.children);
    });
  }
  axios.get('lidershipbonus').then(function (_ref) {
    var data = _ref.data;
    liderCategories.value = data;
    getSelectedPeoples(period.value, selectedUser);
  });
  function getSelectedPeoples() {
    var period = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
    var selectedUser = arguments.length > 1 ? arguments[1] : undefined;
    axios.get("getusers/".concat(period, "/").concat(selectedUser)).then(function (_ref2) {
      var data = _ref2.data;
      user.value = data;
      recursiya(data.children);
    });
  }
  var LiderProsent = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
    if (user.value && liderCategories.value.length) {
      var prosent = 0;
      var summaBranches = user.value.children.map(function (children) {
        return +children.summaBranch;
      });
      var threeBigBranches = (0,_mathHelpers__WEBPACK_IMPORTED_MODULE_1__.getBigNumbers)(summaBranches, 3);
      if (threeBigBranches.length < 3) return 0;
      var minBranch = Math.min.apply(Math, _toConsumableArray(threeBigBranches));
      liderCategories.value.forEach(function (bonus, index) {
        var maxLimit = liderCategories.value[index + 1] ? liderCategories.value[index + 1].ball : Infinity;
        if (minBranch > bonus.ball && minBranch <= maxLimit) {
          prosent = bonus.prosent;
        }
      });
      return prosent;
    }
  });
  var levels = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
    var _user$value, _user$value2;
    var activeUsers = (_user$value = user.value) === null || _user$value === void 0 ? void 0 : _user$value.children.filter(function (user) {
      return user.total >= 30;
    }).length;
    var userSumma = (_user$value2 = user.value) === null || _user$value2 === void 0 ? void 0 : _user$value2.total;
    var levelUp = getLevelUp();
    if (activeUsers >= 9 && userSumma >= 5000 && levelUp == 9) return 9;else if (activeUsers >= 8 && userSumma >= 2500 && levelUp >= 8) return 8;else if (activeUsers >= 7 && userSumma >= 1200 && levelUp >= 7) return 7;else if (activeUsers >= 6 && userSumma >= 600 && levelUp >= 6) return 6;else if (activeUsers >= 5 && userSumma >= 250 && levelUp >= 5) return 5;else if (activeUsers >= 4 && userSumma >= 120 && levelUp >= 4) return 4;else if (activeUsers >= 3 && userSumma >= 60) return 3;else if (activeUsers >= 2) return 2;else if (activeUsers >= 1) return 1;else return 1;
  });
  function getProcent(user, cent) {
    var prosent = +user.total / 100 * cent;
    user.procent = Math.round(prosent * 100) / 100 / 2;
    totalPrice.value += user.procent;
  }
  function getLevelUp() {
    var _user$value3;
    var levelUp = 0;
    (_user$value3 = user.value) === null || _user$value3 === void 0 ? void 0 : _user$value3.children.forEach(function (user, index, some) {
      if (some.length > 4 && some.filter(function (user) {
        return user.summaBranch >= 25000;
      }).length > 4) {
        levelUp = 9;
      } else if (some.length > 3 && some.filter(function (user) {
        return user.summaBranch >= 5000;
      }).length > 3) {
        levelUp = 8;
      } else if (some.length >= 3 && some.filter(function (user) {
        return user.summaBranch >= 2000;
      }).length >= 3) {
        levelUp = 7;
      } else if (some.length >= 3 && some.filter(function (user) {
        return user.summaBranch >= 600;
      }).length >= 3) {
        levelUp = 6;
      } else if (some.length >= 2 && some.filter(function (user) {
        return user.summaBranch >= 300;
      }).length >= 2) {
        levelUp = 5;
      } else if (some.length >= 2 && some.filter(function (user) {
        return user.summaBranch >= 100;
      }).length >= 2) {
        levelUp = 4;
      }
    });
    return levelUp;
  }
  return {
    users: users,
    levels: levels,
    totalPrice: totalPrice,
    user: user,
    period: period,
    leaderBonus: leaderBonus,
    getSelectedPeoples: getSelectedPeoples
  };
}

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.tree-container .link {\r\n    stroke-width: 1px !important;\r\n    stroke: #ee5fa6 !important;\n}\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_style_index_0_id_71c3655e_lang_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_style_index_0_id_71c3655e_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_style_index_0_id_71c3655e_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/pages/profilepages/MyPeoplesTable.vue":
/*!************************************************************!*\
  !*** ./resources/js/pages/profilepages/MyPeoplesTable.vue ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _MyPeoplesTable_vue_vue_type_template_id_71c3655e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MyPeoplesTable.vue?vue&type=template&id=71c3655e */ "./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=template&id=71c3655e");
/* harmony import */ var _MyPeoplesTable_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MyPeoplesTable.vue?vue&type=script&setup=true&lang=js */ "./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var _MyPeoplesTable_vue_vue_type_style_index_0_id_71c3655e_lang_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css */ "./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css");
/* harmony import */ var E_xampp_htdocs_4ever_uz_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;


const __exports__ = /*#__PURE__*/(0,E_xampp_htdocs_4ever_uz_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__["default"])(_MyPeoplesTable_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_MyPeoplesTable_vue_vue_type_template_id_71c3655e__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/pages/profilepages/MyPeoplesTable.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=script&setup=true&lang=js":
/*!***********************************************************************************************!*\
  !*** ./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=script&setup=true&lang=js ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyPeoplesTable.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=template&id=71c3655e":
/*!******************************************************************************************!*\
  !*** ./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=template&id=71c3655e ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_template_id_71c3655e__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_template_id_71c3655e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyPeoplesTable.vue?vue&type=template&id=71c3655e */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=template&id=71c3655e");


/***/ }),

/***/ "./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css":
/*!********************************************************************************************************!*\
  !*** ./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css ***!
  \********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyPeoplesTable_vue_vue_type_style_index_0_id_71c3655e_lang_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/profilepages/MyPeoplesTable.vue?vue&type=style&index=0&id=71c3655e&lang=css");


/***/ })

}]);