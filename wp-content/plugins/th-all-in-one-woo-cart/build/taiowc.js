/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@wordpress/icons/build-module/icon/index.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/icon/index.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */


/** @typedef {{icon: JSX.Element, size?: number} & import('@wordpress/primitives').SVGProps} IconProps */

/**
 * Return an SVG icon.
 *
 * @param {IconProps}                                 props icon is the SVG component to render
 *                                                          size is a number specifiying the icon size in pixels
 *                                                          Other props will be passed to wrapped SVG component
 * @param {import('react').ForwardedRef<HTMLElement>} ref   The forwarded ref to the SVG element.
 *
 * @return {JSX.Element}  Icon component
 */
function Icon({
  icon,
  size = 24,
  ...props
}, ref) {
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(icon, {
    width: size,
    height: size,
    ...props,
    ref
  });
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.forwardRef)(Icon));
//# sourceMappingURL=index.js.map

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/backup.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/backup.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);

/**
 * WordPress dependencies
 */

const backup = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M5.5 12h1.75l-2.5 3-2.5-3H4a8 8 0 113.134 6.35l.907-1.194A6.5 6.5 0 105.5 12zm9.53 1.97l-2.28-2.28V8.5a.75.75 0 00-1.5 0V12a.747.747 0 00.218.529l1.282-.84-1.28.842 2.5 2.5a.75.75 0 101.06-1.061z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (backup);
//# sourceMappingURL=backup.js.map

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/settings.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/settings.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);

/**
 * WordPress dependencies
 */

const settings = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "m19 7.5h-7.628c-.3089-.87389-1.1423-1.5-2.122-1.5-.97966 0-1.81309.62611-2.12197 1.5h-2.12803v1.5h2.12803c.30888.87389 1.14231 1.5 2.12197 1.5.9797 0 1.8131-.62611 2.122-1.5h7.628z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "m19 15h-2.128c-.3089-.8739-1.1423-1.5-2.122-1.5s-1.8131.6261-2.122 1.5h-7.628v1.5h7.628c.3089.8739 1.1423 1.5 2.122 1.5s1.8131-.6261 2.122-1.5h2.128z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (settings);
//# sourceMappingURL=settings.js.map

/***/ }),

/***/ "./src/block/taiowc/components/clear-button/index.js":
/*!***********************************************************!*\
  !*** ./src/block/taiowc/components/clear-button/index.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);

/**
 * WordPress dependencies.
 */



const ClearButton = ({
  values,
  setAttributes
}) => {
  const clearValues = () => {
    const attrToClear = ((0,lodash__WEBPACK_IMPORTED_MODULE_2__.isArray)(values) ? values : [values]).map(value => {
      if ((0,lodash__WEBPACK_IMPORTED_MODULE_2__.isString)(value)) {
        return value;
      } else if ((0,lodash__WEBPACK_IMPORTED_MODULE_2__.isObject)(value)) {
        const keys = Object.keys(value);
        if (1 === keys.length) {
          return value[keys[0]] ? keys[0] : undefined;
        }
      }
      return undefined;
    }).filter(lodash__WEBPACK_IMPORTED_MODULE_2__.isString).reduce((acc, attrName) => {
      acc[attrName] = undefined;
      return acc;
    }, {});
    setAttributes(attrToClear);
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "th-clear-button"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    isSmall: true,
    isSecondary: true,
    onClick: clearValues
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Clear', 'vayu-blocks')));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ClearButton);

/***/ }),

/***/ "./src/block/taiowc/components/control-panel-control/index.js":
/*!********************************************************************!*\
  !*** ./src/block/taiowc/components/control-panel-control/index.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/icon/index.js");
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/backup.js");
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/settings.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);

/**
 * External dependencies
 */



/**
 * WordPress dependencies
 */





/**
 * Internal dependencies
 */

const ControlPanelControl = ({
  label,
  attributes,
  setAttributes,
  resetValues,
  onClick,
  children
}) => {
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useEffect)(() => {
    for (const key in resetValues) {
      if (resetValues[key] !== attributes[key]) {
        return setActive(true);
      }
      setActive(false);
    }
  }, [attributes]);
  const instanceId = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__.useInstanceId)(ControlPanelControl);
  const [isActive, setActive] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)(false);
  const id = `inspector-control-panel-control-${instanceId}`;
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "th-control-panel-control"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "components-base-control__field"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "components-base-control__title"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "components-base-control__label",
    htmlFor: id
  }, label), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "floating-controls"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Dropdown, {
    position: "top left",
    headerTitle: label,
    expandOnMobile: true,
    renderToggle: ({
      isOpen,
      onToggle
    }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.Fragment, null, isActive && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_icons__WEBPACK_IMPORTED_MODULE_6__["default"], {
        icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_7__["default"]
      }),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Reset to default', 'vayu-blocks'),
      showTooltip: true,
      isTertiary: true,
      onClick: () => setAttributes({
        ...resetValues
      })
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      id: id,
      icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_8__["default"],
      label: label,
      showTooltip: true,
      onClick: () => {
        onToggle();
        if (onClick) {
          onClick();
        }
      },
      "aria-expanded": isOpen,
      className: classnames__WEBPACK_IMPORTED_MODULE_1___default()({
        'is-active': isActive
      })
    })),
    renderContent: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "th-popover-settings"
    }, children)
  })))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ControlPanelControl);

/***/ }),

/***/ "./src/block/taiowc/components/icon-picker/index.js":
/*!**********************************************************!*\
  !*** ./src/block/taiowc/components/icon-picker/index.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _svgs_list__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./svgs-list */ "./src/block/taiowc/components/icon-picker/svgs-list.js");
/* harmony import */ var dompurify__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! dompurify */ "./node_modules/dompurify/dist/purify.js");
/* harmony import */ var dompurify__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(dompurify__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_6__);

/**
 * Internal dependencies
 */


function sanitizeSVG(svg) {
  return dompurify__WEBPACK_IMPORTED_MODULE_2___default().sanitize(svg, {
    USE_PROFILES: {
      svg: true,
      svgFilters: true
    }
  });
}

/**
 * WordPress dependencies
 */





/**
 * Typography Component
 */
class IconPicker extends _wordpress_element__WEBPACK_IMPORTED_MODULE_4__.Component {
  constructor() {
    super(...arguments);
    this.state = {
      showIcons: false,
      showGeneralIcons: false,
      showSocialIcons: false
    };
  }
  render() {
    const {
      attributes,
      setAttributes,
      attrIcon,
      attrIconLocation,
      locationOptions,
      attrRemoveText,
      id
    } = this.props;
    let iconSVGSets = {
      general: {
        group: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Icon Library', 'vayu-blocks'),
        svgs: _svgs_list__WEBPACK_IMPORTED_MODULE_1__["default"]
      }
    };
    iconSVGSets = (0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_6__.applyFilters)('thblocks.editor.iconSVGSets', iconSVGSets, {
      attributes
    });
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.BaseControl, {
      className: "th-svg-html"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "th-icon-label"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Icon', 'vayu-blocks')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "th-icon-preview"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      dangerouslySetInnerHTML: {
        __html: sanitizeSVG(attributes[attrIcon])
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Button, {
      isSmall: true,
      className: "reset-icon is-secondary",
      onClick: () => {
        setAttributes({
          [this.props['attrIcon']]: '',
          // eslint-disable-line dot-notation
          hasIcon: false,
          [this.props['attrRemoveText']]: false // eslint-disable-line dot-notation
        });
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "editor-block-types-list__item-icon"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Clear', 'vayu-blocks'))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.BaseControl, {
      className: "th-icon-chooser"
    }, Object.keys(iconSVGSets).map((svg, i) => {
      const svgItems = iconSVGSets[svg].svgs;
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
        className: "th-blocks-panel-label th-blocks-icon-panel",
        title: iconSVGSets[svg].group,
        initialOpen: false,
        key: i
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.BaseControl, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
        className: "th-blocks-icon-chooser"
      }, Object.keys(svgItems).map((svgItem, index) => {
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
          key: `editor-pblock-types-list-item-${index}`
        }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Tooltip, {
          text: svgItems[svgItem].label
        }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Button, {
          className: "editor-block-list-item-button",
          onClick: () => {
            let iconValue = svgItems[svgItem].icon;
            if ('string' !== typeof iconValue) {
              iconValue = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.renderToString)(iconValue);
            }
            setAttributes({
              [this.props.attrIcon]: iconValue,
              hasIcon: true,
              display: 'headline' === id ? 'flex' : 'inline-flex',
              alignItems: 'center'
            });
          }
        }, 'string' === typeof svgItems[svgItem].icon ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
          className: "editor-block-types-list__item-icon",
          dangerouslySetInnerHTML: {
            __html: sanitizeSVG(svgItems[svgItem].icon)
          }
        })) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
          className: "editor-block-types-list__item-icon"
        }, svgItems[svgItem].icon)))));
      })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('SVG Markup', 'vayu-blocks'),
        value: attributes[attrIcon],
        onChange: value => {
          setAttributes({
            [this.props['attrIcon']]: sanitizeSVG(value) // eslint-disable-line dot-notation
          });

          if ('' !== value) {
            setAttributes({
              'hasIcon': true,
              // eslint-disable-line quote-props
              display: 'headline' === id ? 'flex' : 'inline-flex',
              alignItems: 'center'
            });
          } else {
            setAttributes({
              'hasIcon': true // eslint-disable-line quote-props
            });
          }
        }
      }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Can also enter custom code', 'vayu-blocks')))));
    })), typeof attributes[attrRemoveText] !== 'undefined' && !!attributes[attrIcon] && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Remove Text', 'vayu-blocks'),
      checked: !!attributes[attrRemoveText],
      onChange: value => {
        setAttributes({
          [this.props['attrRemoveText']]: value // eslint-disable-line dot-notation
        });
      }
    }));
  }
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (IconPicker);

/***/ }),

/***/ "./src/block/taiowc/components/icon-picker/svgs-list.js":
/*!**************************************************************!*\
  !*** ./src/block/taiowc/components/icon-picker/svgs-list.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);

/**
 * WordPress dependencies
 */

const svgs = {
  clock: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Clock', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm92.49 313l-20 25a16 16 0 01-22.49 2.5l-67-49.72a40 40 0 01-15-31.23V112a16 16 0 0116-16h32a16 16 0 0116 16v144l58 42.5a16 16 0 012.49 22.5z"
    }))
  },
  clockAlt: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Clock Outline', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"
    }))
  },
  asterisk: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Asterisk', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M478.21 334.093L336 256l142.21-78.093c11.795-6.477 15.961-21.384 9.232-33.037l-19.48-33.741c-6.728-11.653-21.72-15.499-33.227-8.523L296 186.718l3.475-162.204C299.763 11.061 288.937 0 275.48 0h-38.96c-13.456 0-24.283 11.061-23.994 24.514L216 186.718 77.265 102.607c-11.506-6.976-26.499-3.13-33.227 8.523l-19.48 33.741c-6.728 11.653-2.562 26.56 9.233 33.037L176 256 33.79 334.093c-11.795 6.477-15.961 21.384-9.232 33.037l19.48 33.741c6.728 11.653 21.721 15.499 33.227 8.523L216 325.282l-3.475 162.204C212.237 500.939 223.064 512 236.52 512h38.961c13.456 0 24.283-11.061 23.995-24.514L296 325.282l138.735 84.111c11.506 6.976 26.499 3.13 33.227-8.523l19.48-33.741c6.728-11.653 2.563-26.559-9.232-33.036z"
    }))
  },
  at: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('At', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C118.941 8 8 118.919 8 256c0 137.059 110.919 248 248 248 48.154 0 95.342-14.14 135.408-40.223 12.005-7.815 14.625-24.288 5.552-35.372l-10.177-12.433c-7.671-9.371-21.179-11.667-31.373-5.129C325.92 429.757 291.314 440 256 440c-101.458 0-184-82.542-184-184S154.542 72 256 72c100.139 0 184 57.619 184 160 0 38.786-21.093 79.742-58.17 83.693-17.349-.454-16.91-12.857-13.476-30.024l23.433-121.11C394.653 149.75 383.308 136 368.225 136h-44.981a13.518 13.518 0 0 0-13.432 11.993l-.01.092c-14.697-17.901-40.448-21.775-59.971-21.775-74.58 0-137.831 62.234-137.831 151.46 0 65.303 36.785 105.87 96 105.87 26.984 0 57.369-15.637 74.991-38.333 9.522 34.104 40.613 34.103 70.71 34.103C462.609 379.41 504 307.798 504 232 504 95.653 394.023 8 256 8zm-21.68 304.43c-22.249 0-36.07-15.623-36.07-40.771 0-44.993 30.779-72.729 58.63-72.729 22.292 0 35.601 15.241 35.601 40.77 0 45.061-33.875 72.73-58.161 72.73z"
    }))
  },
  award: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Award', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 384 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M97.12 362.63c-8.69-8.69-4.16-6.24-25.12-11.85-9.51-2.55-17.87-7.45-25.43-13.32L1.2 448.7c-4.39 10.77 3.81 22.47 15.43 22.03l52.69-2.01L105.56 507c8 8.44 22.04 5.81 26.43-4.96l52.05-127.62c-10.84 6.04-22.87 9.58-35.31 9.58-19.5 0-37.82-7.59-51.61-21.37zM382.8 448.7l-45.37-111.24c-7.56 5.88-15.92 10.77-25.43 13.32-21.07 5.64-16.45 3.18-25.12 11.85-13.79 13.78-32.12 21.37-51.62 21.37-12.44 0-24.47-3.55-35.31-9.58L252 502.04c4.39 10.77 18.44 13.4 26.43 4.96l36.25-38.28 52.69 2.01c11.62.44 19.82-11.27 15.43-22.03zM263 340c15.28-15.55 17.03-14.21 38.79-20.14 13.89-3.79 24.75-14.84 28.47-28.98 7.48-28.4 5.54-24.97 25.95-45.75 10.17-10.35 14.14-25.44 10.42-39.58-7.47-28.38-7.48-24.42 0-52.83 3.72-14.14-.25-29.23-10.42-39.58-20.41-20.78-18.47-17.36-25.95-45.75-3.72-14.14-14.58-25.19-28.47-28.98-27.88-7.61-24.52-5.62-44.95-26.41-10.17-10.35-25-14.4-38.89-10.61-27.87 7.6-23.98 7.61-51.9 0-13.89-3.79-28.72.25-38.89 10.61-20.41 20.78-17.05 18.8-44.94 26.41-13.89 3.79-24.75 14.84-28.47 28.98-7.47 28.39-5.54 24.97-25.95 45.75-10.17 10.35-14.15 25.44-10.42 39.58 7.47 28.36 7.48 24.4 0 52.82-3.72 14.14.25 29.23 10.42 39.59 20.41 20.78 18.47 17.35 25.95 45.75 3.72 14.14 14.58 25.19 28.47 28.98C104.6 325.96 106.27 325 121 340c13.23 13.47 33.84 15.88 49.74 5.82a39.676 39.676 0 0 1 42.53 0c15.89 10.06 36.5 7.65 49.73-5.82zM97.66 175.96c0-53.03 42.24-96.02 94.34-96.02s94.34 42.99 94.34 96.02-42.24 96.02-94.34 96.02-94.34-42.99-94.34-96.02z"
    }))
  },
  ban: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Ban', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z"
    }))
  },
  bars: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Bars', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
    }))
  },
  beer: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Beer', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M368 96h-48V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56v400c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24v-42.11l80.606-35.977C429.396 365.063 448 336.388 448 304.86V176c0-44.112-35.888-80-80-80zm16 208.86a16.018 16.018 0 0 1-9.479 14.611L320 343.805V160h48c8.822 0 16 7.178 16 16v128.86zM208 384c-8.836 0-16-7.164-16-16V144c0-8.836 7.164-16 16-16s16 7.164 16 16v224c0 8.836-7.164 16-16 16zm-96 0c-8.836 0-16-7.164-16-16V144c0-8.836 7.164-16 16-16s16 7.164 16 16v224c0 8.836-7.164 16-16 16z"
    }))
  },
  bolt: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Bolt', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 320 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"
    }))
  },
  book: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Book', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"
    }))
  },
  boxOpen: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Box - Open', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 640 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M425.7 256c-16.9 0-32.8-9-41.4-23.4L320 126l-64.2 106.6c-8.7 14.5-24.6 23.5-41.5 23.5-4.5 0-9-.6-13.3-1.9L64 215v178c0 14.7 10 27.5 24.2 31l216.2 54.1c10.2 2.5 20.9 2.5 31 0L551.8 424c14.2-3.6 24.2-16.4 24.2-31V215l-137 39.1c-4.3 1.3-8.8 1.9-13.3 1.9zm212.6-112.2L586.8 41c-3.1-6.2-9.8-9.8-16.7-8.9L320 64l91.7 152.1c3.8 6.3 11.4 9.3 18.5 7.3l197.9-56.5c9.9-2.9 14.7-13.9 10.2-23.1zM53.2 41L1.7 143.8c-4.6 9.2.3 20.2 10.1 23l197.9 56.5c7.1 2 14.7-1 18.5-7.3L320 64 69.8 32.1c-6.9-.8-13.5 2.7-16.6 8.9z"
    }))
  },
  bullhorn: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Bullhorn', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 576 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M576 240c0-23.63-12.95-44.04-32-55.12V32.01C544 23.26 537.02 0 512 0c-7.12 0-14.19 2.38-19.98 7.02l-85.03 68.03C364.28 109.19 310.66 128 256 128H64c-35.35 0-64 28.65-64 64v96c0 35.35 28.65 64 64 64h33.7c-1.39 10.48-2.18 21.14-2.18 32 0 39.77 9.26 77.35 25.56 110.94 5.19 10.69 16.52 17.06 28.4 17.06h74.28c26.05 0 41.69-29.84 25.9-50.56-16.4-21.52-26.15-48.36-26.15-77.44 0-11.11 1.62-21.79 4.41-32H256c54.66 0 108.28 18.81 150.98 52.95l85.03 68.03a32.023 32.023 0 0 0 19.98 7.02c24.92 0 32-22.78 32-32V295.13C563.05 284.04 576 263.63 576 240zm-96 141.42l-33.05-26.44C392.95 311.78 325.12 288 256 288v-96c69.12 0 136.95-23.78 190.95-66.98L480 98.58v282.84z"
    }))
  },
  bullseye: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Bullseye', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 496 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm0 432c-101.69 0-184-82.29-184-184 0-101.69 82.29-184 184-184 101.69 0 184 82.29 184 184 0 101.69-82.29 184-184 184zm0-312c-70.69 0-128 57.31-128 128s57.31 128 128 128 128-57.31 128-128-57.31-128-128-128zm0 192c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64z"
    }))
  },
  burn: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Burn', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 384 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M192 0C79.7 101.3 0 220.9 0 300.5 0 425 79 512 192 512s192-87 192-211.5c0-79.9-80.2-199.6-192-300.5zm0 448c-56.5 0-96-39-96-94.8 0-13.5 4.6-61.5 96-161.2 91.4 99.7 96 147.7 96 161.2 0 55.8-39.5 94.8-96 94.8z"
    }))
  },
  calendarAlt: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Calender', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"
    }))
  },
  check: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Check', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
    }))
  },
  checkCircle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Check - Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
    }))
  },
  checkCircleOutline: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Check - Circle Outline', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"
    }))
  },
  checkSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Check - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M400 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h352c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zm-204.686-98.059l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.248-16.379-6.249-22.628 0L184 302.745l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.25 16.379 6.25 22.628.001z"
    }))
  },
  checkSquareOutline: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Check - Square Outline', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M400 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm0 400H48V80h352v352zm-35.864-241.724L191.547 361.48c-4.705 4.667-12.303 4.637-16.97-.068l-90.781-91.516c-4.667-4.705-4.637-12.303.069-16.971l22.719-22.536c4.705-4.667 12.303-4.637 16.97.069l59.792 60.277 141.352-140.216c4.705-4.667 12.303-4.637 16.97.068l22.536 22.718c4.667 4.706 4.637 12.304-.068 16.971z"
    }))
  },
  chevronDown: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Chevron - Down', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"
    }))
  },
  chevronLeft: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Chevron - Left', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 256 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"
    }))
  },
  chevronRight: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Chevron - Right', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 256 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
    }))
  },
  chevronUp: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Chevron - Up', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"
    }))
  },
  circle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"
    }))
  },
  circleOutline: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Circle - Outline', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z"
    }))
  },
  coffee: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Coffee', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 640 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M192 384h192c53 0 96-43 96-96h32c70.6 0 128-57.4 128-128S582.6 32 512 32H120c-13.3 0-24 10.7-24 24v232c0 53 43 96 96 96zM512 96c35.3 0 64 28.7 64 64s-28.7 64-64 64h-32V96h32zm47.7 384H48.3c-47.6 0-61-64-36-64h583.3c25 0 11.8 64-35.9 64z"
    }))
  },
  dotCircle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Dot - Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm80 248c0 44.112-35.888 80-80 80s-80-35.888-80-80 35.888-80 80-80 80 35.888 80 80z"
    }))
  },
  dotCircleOutline: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Dot - Circle Outline', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"
    }))
  },
  ellipsesH: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Ellipses - Horizontal', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"
    }))
  },
  ellipsesV: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Ellipses - Vertical', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 192 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"
    }))
  },
  envelope: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Envelope', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"
    }))
  },
  fireAlt: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Fire', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M323.56 51.2c-20.8 19.3-39.58 39.59-56.22 59.97C240.08 73.62 206.28 35.53 168 0 69.74 91.17 0 209.96 0 281.6 0 408.85 100.29 512 224 512s224-103.15 224-230.4c0-53.27-51.98-163.14-124.44-230.4zm-19.47 340.65C282.43 407.01 255.72 416 226.86 416 154.71 416 96 368.26 96 290.75c0-38.61 24.31-72.63 72.79-130.75 6.93 7.98 98.83 125.34 98.83 125.34l58.63-66.88c4.14 6.85 7.91 13.55 11.27 19.97 27.35 52.19 15.81 118.97-33.43 153.42z"
    }))
  },
  heart: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Heart', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"
    }))
  },
  mapMarkerAlt: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Map Marker', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 384 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"
    }))
  },
  paperPlane: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Paper Plane', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M440 6.5L24 246.4c-34.4 19.9-31.1 70.8 5.7 85.9L144 379.6V464c0 46.4 59.2 65.5 86.6 28.6l43.8-59.1 111.9 46.2c5.9 2.4 12.1 3.6 18.3 3.6 8.2 0 16.3-2.1 23.6-6.2 12.8-7.2 21.6-20 23.9-34.5l59.4-387.2c6.1-40.1-36.9-68.8-71.5-48.9zM192 464v-64.6l36.6 15.1L192 464zm212.6-28.7l-153.8-63.5L391 169.5c10.7-15.5-9.5-33.5-23.7-21.2L155.8 332.6 48 288 464 48l-59.4 387.3z"
    }))
  },
  phone: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Phone', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"
    }))
  },
  plus: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Plus', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"
    }))
  },
  plusCircle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Plus - Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"
    }))
  },
  plusSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Plus - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-32 252c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92H92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"
    }))
  },
  plusSquareOutline: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Plus - Square Outline', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M352 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm96-160v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"
    }))
  },
  shield: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Shield', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M466.5 83.7l-192-80a48.15 48.15 0 0 0-36.9 0l-192 80C27.7 91.1 16 108.6 16 128c0 198.5 114.5 335.7 221.5 380.3 11.8 4.9 25.1 4.9 36.9 0C360.1 472.6 496 349.3 496 128c0-19.4-11.7-36.9-29.5-44.3zM256.1 446.3l-.1-381 175.9 73.3c-3.3 151.4-82.1 261.1-175.8 307.7z"
    }))
  },
  star: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Star', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 576 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"
    }))
  },
  tags: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Tags', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 640 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"
    }))
  },
  userCircle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('User - Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 496 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"
    }))
  },
  facebook: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Facebook', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 320 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
    }))
  },
  facebookCircle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Facebook - Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
    }))
  },
  facebookSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Facebook - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"
    }))
  },
  instagram: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Instagram', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
    }))
  },
  linkedin: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('LinkedIn', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
    }))
  },
  linkedinSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('LinkedIn - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
    }))
  },
  pinterest: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Pinterest', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 384 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"
    }))
  },
  pinterestCircle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Pinterest - Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 496 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"
    }))
  },
  pinterestSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Pinterest - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M448 80v352c0 26.5-21.5 48-48 48H154.4c9.8-16.4 22.4-40 27.4-59.3 3-11.5 15.3-58.4 15.3-58.4 8 15.3 31.4 28.2 56.3 28.2 74.1 0 127.4-68.1 127.4-152.7 0-81.1-66.2-141.8-151.4-141.8-106 0-162.2 71.1-162.2 148.6 0 36 19.2 80.8 49.8 95.1 4.7 2.2 7.1 1.2 8.2-3.3.8-3.4 5-20.1 6.8-27.8.6-2.5.3-4.6-1.7-7-10.1-12.3-18.3-34.9-18.3-56 0-54.2 41-106.6 110.9-106.6 60.3 0 102.6 41.1 102.6 99.9 0 66.4-33.5 112.4-77.2 112.4-24.1 0-42.1-19.9-36.4-44.4 6.9-29.2 20.3-60.7 20.3-81.8 0-53-75.5-45.7-75.5 25 0 21.7 7.3 36.5 7.3 36.5-31.4 132.8-36.1 134.5-29.6 192.6l2.2.8H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"
    }))
  },
  reddit: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Reddit', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M440.3 203.5c-15 0-28.2 6.2-37.9 15.9-35.7-24.7-83.8-40.6-137.1-42.3L293 52.3l88.2 19.8c0 21.6 17.6 39.2 39.2 39.2 22 0 39.7-18.1 39.7-39.7s-17.6-39.7-39.7-39.7c-15.4 0-28.7 9.3-35.3 22l-97.4-21.6c-4.9-1.3-9.7 2.2-11 7.1L246.3 177c-52.9 2.2-100.5 18.1-136.3 42.8-9.7-10.1-23.4-16.3-38.4-16.3-55.6 0-73.8 74.6-22.9 100.1-1.8 7.9-2.6 16.3-2.6 24.7 0 83.8 94.4 151.7 210.3 151.7 116.4 0 210.8-67.9 210.8-151.7 0-8.4-.9-17.2-3.1-25.1 49.9-25.6 31.5-99.7-23.8-99.7zM129.4 308.9c0-22 17.6-39.7 39.7-39.7 21.6 0 39.2 17.6 39.2 39.7 0 21.6-17.6 39.2-39.2 39.2-22 .1-39.7-17.6-39.7-39.2zm214.3 93.5c-36.4 36.4-139.1 36.4-175.5 0-4-3.5-4-9.7 0-13.7 3.5-3.5 9.7-3.5 13.2 0 27.8 28.5 120 29 149 0 3.5-3.5 9.7-3.5 13.2 0 4.1 4 4.1 10.2.1 13.7zm-.8-54.2c-21.6 0-39.2-17.6-39.2-39.2 0-22 17.6-39.7 39.2-39.7 22 0 39.7 17.6 39.7 39.7-.1 21.5-17.7 39.2-39.7 39.2z"
    }))
  },
  redditCircle: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Reddit - Circle', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M201.5 305.5c-13.8 0-24.9-11.1-24.9-24.6 0-13.8 11.1-24.9 24.9-24.9 13.6 0 24.6 11.1 24.6 24.9 0 13.6-11.1 24.6-24.6 24.6zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-132.3-41.2c-9.4 0-17.7 3.9-23.8 10-22.4-15.5-52.6-25.5-86.1-26.6l17.4-78.3 55.4 12.5c0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.3 24.9-24.9s-11.1-24.9-24.9-24.9c-9.7 0-18 5.8-22.1 13.8l-61.2-13.6c-3-.8-6.1 1.4-6.9 4.4l-19.1 86.4c-33.2 1.4-63.1 11.3-85.5 26.8-6.1-6.4-14.7-10.2-24.1-10.2-34.9 0-46.3 46.9-14.4 62.8-1.1 5-1.7 10.2-1.7 15.5 0 52.6 59.2 95.2 132 95.2 73.1 0 132.3-42.6 132.3-95.2 0-5.3-.6-10.8-1.9-15.8 31.3-16 19.8-62.5-14.9-62.5zM302.8 331c-18.2 18.2-76.1 17.9-93.6 0-2.2-2.2-6.1-2.2-8.3 0-2.5 2.5-2.5 6.4 0 8.6 22.8 22.8 87.3 22.8 110.2 0 2.5-2.2 2.5-6.1 0-8.6-2.2-2.2-6.1-2.2-8.3 0zm7.7-75c-13.6 0-24.6 11.1-24.6 24.9 0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.1 24.9-24.6 0-13.8-11-24.9-24.9-24.9z"
    }))
  },
  redditSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Reddit - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M283.2 345.5c2.7 2.7 2.7 6.8 0 9.2-24.5 24.5-93.8 24.6-118.4 0-2.7-2.4-2.7-6.5 0-9.2 2.4-2.4 6.5-2.4 8.9 0 18.7 19.2 81 19.6 100.5 0 2.4-2.3 6.6-2.3 9 0zm-91.3-53.8c0-14.9-11.9-26.8-26.5-26.8-14.9 0-26.8 11.9-26.8 26.8 0 14.6 11.9 26.5 26.8 26.5 14.6 0 26.5-11.9 26.5-26.5zm90.7-26.8c-14.6 0-26.5 11.9-26.5 26.8 0 14.6 11.9 26.5 26.5 26.5 14.9 0 26.8-11.9 26.8-26.5 0-14.9-11.9-26.8-26.8-26.8zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-99.7 140.6c-10.1 0-19 4.2-25.6 10.7-24.1-16.7-56.5-27.4-92.5-28.6l18.7-84.2 59.5 13.4c0 14.6 11.9 26.5 26.5 26.5 14.9 0 26.8-12.2 26.8-26.8 0-14.6-11.9-26.8-26.8-26.8-10.4 0-19.3 6.2-23.8 14.9l-65.7-14.6c-3.3-.9-6.5 1.5-7.4 4.8l-20.5 92.8c-35.7 1.5-67.8 12.2-91.9 28.9-6.5-6.8-15.8-11-25.9-11-37.5 0-49.8 50.4-15.5 67.5-1.2 5.4-1.8 11-1.8 16.7 0 56.5 63.7 102.3 141.9 102.3 78.5 0 142.2-45.8 142.2-102.3 0-5.7-.6-11.6-2.1-17 33.6-17.2 21.2-67.2-16.1-67.2z"
    }))
  },
  snapchat: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Snapchat', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M510.846 392.673c-5.211 12.157-27.239 21.089-67.36 27.318-2.064 2.786-3.775 14.686-6.507 23.956-1.625 5.566-5.623 8.869-12.128 8.869l-.297-.005c-9.395 0-19.203-4.323-38.852-4.323-26.521 0-35.662 6.043-56.254 20.588-21.832 15.438-42.771 28.764-74.027 27.399-31.646 2.334-58.025-16.908-72.871-27.404-20.714-14.643-29.828-20.582-56.241-20.582-18.864 0-30.736 4.72-38.852 4.72-8.073 0-11.213-4.922-12.422-9.04-2.703-9.189-4.404-21.263-6.523-24.13-20.679-3.209-67.31-11.344-68.498-32.15a10.627 10.627 0 0 1 8.877-11.069c69.583-11.455 100.924-82.901 102.227-85.934.074-.176.155-.344.237-.515 3.713-7.537 4.544-13.849 2.463-18.753-5.05-11.896-26.872-16.164-36.053-19.796-23.715-9.366-27.015-20.128-25.612-27.504 2.437-12.836 21.725-20.735 33.002-15.453 8.919 4.181 16.843 6.297 23.547 6.297 5.022 0 8.212-1.204 9.96-2.171-2.043-35.936-7.101-87.29 5.687-115.969C158.122 21.304 229.705 15.42 250.826 15.42c.944 0 9.141-.089 10.11-.089 52.148 0 102.254 26.78 126.723 81.643 12.777 28.65 7.749 79.792 5.695 116.009 1.582.872 4.357 1.942 8.599 2.139 6.397-.286 13.815-2.389 22.069-6.257 6.085-2.846 14.406-2.461 20.48.058l.029.01c9.476 3.385 15.439 10.215 15.589 17.87.184 9.747-8.522 18.165-25.878 25.018-2.118.835-4.694 1.655-7.434 2.525-9.797 3.106-24.6 7.805-28.616 17.271-2.079 4.904-1.256 11.211 2.46 18.748.087.168.166.342.239.515 1.301 3.03 32.615 74.46 102.23 85.934 6.427 1.058 11.163 7.877 7.725 15.859z"
    }))
  },
  soundcloud: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Soundcloud', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 640 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M111.4 256.3l5.8 65-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3 5.6-65c0-2.2 1.9-4.2 4.2-4.2 2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6 5 68.3c.3 2.8 2.2 5 5 5 2.5 0 4.7-2.2 4.7-5l5.8-68.3-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130 4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3 2.8 0 5.3-2.2 5.3-5.3l5.3-67.8-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9c-1.4 0-2.5 1.1-2.5 2.5l-6.4 57.5 6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1 1.7 0 3.1-1.4 3.1-3.1l6.9-65.8-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2c-1.9 0-3.6 1.4-3.6 3.6l-5.8 70 5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8-6.4-70c-.3-2.2-2-3.6-3.9-3.6zm241.4-110.9c-1.1-.8-2.8-1.4-4.2-1.4-2.2 0-4.2.8-5.6 1.9-1.9 1.7-3.1 4.2-3.3 6.7v.8l-3.3 176.7 1.7 32.5 1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4c-2.2 1.4-3.6 3.9-3.6 6.7l-.3 1.7-2.8 160.8s0 .3 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7 1.7 1.9 3.9 3.1 6.4 3.1 2.2 0 4.2-1.1 5.6-2.5 1.7-1.4 2.5-3.3 2.5-5.6l.3-6.7 3.1-58.6-3.3-162.8c-.3-2.8-1.7-5.3-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6 4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8 3.3 0 5.8-2.5 6.1-5.8l5-67.2-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8c-10.8 0-21.1 2.2-30.6 6.1-6.4-70.8-65.8-126.4-138.3-126.4-17.8 0-35 3.3-50.3 9.4-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3c43.3 0 78.6-35 78.6-78.3.1-43.6-35.2-78.9-78.5-78.9zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7 3.3 65.6c.3 4.2 3.6 7.5 7.8 7.5 4.2 0 7.5-3.3 7.5-7.5l3.9-65.6-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3 3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4 3.6 0 6.4-2.8 6.7-6.4l4.4-66.9-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4c-3.9 0-6.9 3.1-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4-4.2-141.7c0-3.9-3-6.9-6.9-6.9z"
    }))
  },
  twitch: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Twitch', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M40.1 32L10 108.9v314.3h107V480h60.2l56.8-56.8h87l117-117V32H40.1zm357.8 254.1L331 353H224l-56.8 56.8V353H76.9V72.1h321v214zM331 149v116.9h-40.1V149H331zm-107 0v116.9h-40.1V149H224z"
    }))
  },
  twitter: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Twitter', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 512 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
    }))
  },
  twitterSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Twitter - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"
    }))
  },
  vimeo: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Vimeo', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M447.8 153.6c-2 43.6-32.4 103.3-91.4 179.1-60.9 79.2-112.4 118.8-154.6 118.8-26.1 0-48.2-24.1-66.3-72.3C100.3 250 85.3 174.3 56.2 174.3c-3.4 0-15.1 7.1-35.2 21.1L0 168.2c51.6-45.3 100.9-95.7 131.8-98.5 34.9-3.4 56.3 20.5 64.4 71.5 28.7 181.5 41.4 208.9 93.6 126.7 18.7-29.6 28.8-52.1 30.2-67.6 4.8-45.9-35.8-42.8-63.3-31 22-72.1 64.1-107.1 126.2-105.1 45.8 1.2 67.5 31.1 64.9 89.4z"
    }))
  },
  vimeoSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('Vimeo - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M403.2 32H44.8C20.1 32 0 52.1 0 76.8v358.4C0 459.9 20.1 480 44.8 480h358.4c24.7 0 44.8-20.1 44.8-44.8V76.8c0-24.7-20.1-44.8-44.8-44.8zM377 180.8c-1.4 31.5-23.4 74.7-66 129.4-44 57.2-81.3 85.8-111.7 85.8-18.9 0-34.8-17.4-47.9-52.3-25.5-93.3-36.4-148-57.4-148-2.4 0-10.9 5.1-25.4 15.2l-15.2-19.6c37.3-32.8 72.9-69.2 95.2-71.2 25.2-2.4 40.7 14.8 46.5 51.7 20.7 131.2 29.9 151 67.6 91.6 13.5-21.4 20.8-37.7 21.8-48.9 3.5-33.2-25.9-30.9-45.8-22.4 15.9-52.1 46.3-77.4 91.2-76 33.3.9 49 22.5 47.1 64.7z"
    }))
  },
  whatsapp: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('WhatsApp', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
    }))
  },
  whatsappSquare: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('WhatsApp - Square', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 448 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M224 122.8c-72.7 0-131.8 59.1-131.9 131.8 0 24.9 7 49.2 20.2 70.1l3.1 5-13.3 48.6 49.9-13.1 4.8 2.9c20.2 12 43.4 18.4 67.1 18.4h.1c72.6 0 133.3-59.1 133.3-131.8 0-35.2-15.2-68.3-40.1-93.2-25-25-58-38.7-93.2-38.7zm77.5 188.4c-3.3 9.3-19.1 17.7-26.7 18.8-12.6 1.9-22.4.9-47.5-9.9-39.7-17.2-65.7-57.2-67.7-59.8-2-2.6-16.2-21.5-16.2-41s10.2-29.1 13.9-33.1c3.6-4 7.9-5 10.6-5 2.6 0 5.3 0 7.6.1 2.4.1 5.7-.9 8.9 6.8 3.3 7.9 11.2 27.4 12.2 29.4s1.7 4.3.3 6.9c-7.6 15.2-15.7 14.6-11.6 21.6 15.3 26.3 30.6 35.4 53.9 47.1 4 2 6.3 1.7 8.6-1 2.3-2.6 9.9-11.6 12.5-15.5 2.6-4 5.3-3.3 8.9-2 3.6 1.3 23.1 10.9 27.1 12.9s6.6 3 7.6 4.6c.9 1.9.9 9.9-2.4 19.1zM400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM223.9 413.2c-26.6 0-52.7-6.7-75.8-19.3L64 416l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4 167.1 136.5 96 223.9 96c42.4 0 82.2 16.5 112.2 46.5 29.9 30 47.9 69.8 47.9 112.2 0 87.4-72.7 158.5-160.1 158.5z"
    }))
  },
  youtube: {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('YouTube', 'label', 'vayu-blocks'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      "aria-hidden": "true",
      role: "img",
      height: "1em",
      width: "1em",
      viewBox: "0 0 576 512",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "currentColor",
      d: "M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"
    }))
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (svgs);

/***/ }),

/***/ "./src/block/taiowc/components/icon.js":
/*!*********************************************!*\
  !*** ./src/block/taiowc/components/icon.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   ArwDn: () => (/* binding */ ArwDn),
/* harmony export */   ArwLft: () => (/* binding */ ArwLft),
/* harmony export */   ArwRgt: () => (/* binding */ ArwRgt),
/* harmony export */   ArwUp: () => (/* binding */ ArwUp),
/* harmony export */   BgGraclr: () => (/* binding */ BgGraclr),
/* harmony export */   BgImg: () => (/* binding */ BgImg),
/* harmony export */   Bgclr: () => (/* binding */ Bgclr),
/* harmony export */   Center: () => (/* binding */ Center),
/* harmony export */   ConatinerIcon: () => (/* binding */ ConatinerIcon),
/* harmony export */   Custom: () => (/* binding */ Custom),
/* harmony export */   End: () => (/* binding */ End),
/* harmony export */   Grow: () => (/* binding */ Grow),
/* harmony export */   HeadingIcon: () => (/* binding */ HeadingIcon),
/* harmony export */   HorizontalLeft: () => (/* binding */ HorizontalLeft),
/* harmony export */   HorizontalRight: () => (/* binding */ HorizontalRight),
/* harmony export */   JfCntctr: () => (/* binding */ JfCntctr),
/* harmony export */   JfCntctr1: () => (/* binding */ JfCntctr1),
/* harmony export */   JfCntend: () => (/* binding */ JfCntend),
/* harmony export */   JfCntend1: () => (/* binding */ JfCntend1),
/* harmony export */   JfCntendRR: () => (/* binding */ JfCntendRR),
/* harmony export */   JfCntsparnd: () => (/* binding */ JfCntsparnd),
/* harmony export */   JfCntsparnd1: () => (/* binding */ JfCntsparnd1),
/* harmony export */   JfCntspbtn: () => (/* binding */ JfCntspbtn),
/* harmony export */   JfCntspbtn1: () => (/* binding */ JfCntspbtn1),
/* harmony export */   JfCntspevn: () => (/* binding */ JfCntspevn),
/* harmony export */   JfCntspevn1: () => (/* binding */ JfCntspevn1),
/* harmony export */   JfCntstr: () => (/* binding */ JfCntstr),
/* harmony export */   JfCntstr1: () => (/* binding */ JfCntstr1),
/* harmony export */   JfCntstrRR: () => (/* binding */ JfCntstrRR),
/* harmony export */   None: () => (/* binding */ None),
/* harmony export */   OrderEnd: () => (/* binding */ OrderEnd),
/* harmony export */   OrderStart: () => (/* binding */ OrderStart),
/* harmony export */   Shrink: () => (/* binding */ Shrink),
/* harmony export */   Start: () => (/* binding */ Start),
/* harmony export */   Strech: () => (/* binding */ Strech),
/* harmony export */   VerticalBottom: () => (/* binding */ VerticalBottom),
/* harmony export */   VerticalTop: () => (/* binding */ VerticalTop),
/* harmony export */   alignBottom: () => (/* binding */ alignBottom),
/* harmony export */   alignCenter: () => (/* binding */ alignCenter),
/* harmony export */   alignTop: () => (/* binding */ alignTop),
/* harmony export */   alignitemcnt: () => (/* binding */ alignitemcnt),
/* harmony export */   alignitemcnt1: () => (/* binding */ alignitemcnt1),
/* harmony export */   alignitemend: () => (/* binding */ alignitemend),
/* harmony export */   alignitemend1: () => (/* binding */ alignitemend1),
/* harmony export */   alignitemstr: () => (/* binding */ alignitemstr),
/* harmony export */   alignitemstr1: () => (/* binding */ alignitemstr1),
/* harmony export */   alignitemstrech: () => (/* binding */ alignitemstrech),
/* harmony export */   alignitemstrech1: () => (/* binding */ alignitemstrech1),
/* harmony export */   checkIcon: () => (/* binding */ checkIcon),
/* harmony export */   wrap1: () => (/* binding */ wrap1),
/* harmony export */   wrap2: () => (/* binding */ wrap2)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__);

/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */

const checkIcon = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Path, {
  d: "M9 18.6L3.5 13l1-1L9 16.4l9.5-9.9 1 1z"
}));
const alignBottom = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Path, {
  d: "M15 4H9v11h6V4zM4 18.5V20h16v-1.5H4z"
}));
const alignCenter = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Path, {
  d: "M20 11h-5V4H9v7H4v1.5h5V20h6v-7.5h5z"
}));
const alignTop = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "101",
  y: "102",
  width: "298",
  height: "20",
  rx: "10",
  ry: "10"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy",
  "data-name": "Rounded Rectangle 1 copy",
  className: "cls-1",
  x: "101",
  y: "379",
  width: "298",
  height: "20",
  rx: "10",
  ry: "10"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_2_copy",
  "data-name": "Rounded Rectangle 2 copy",
  className: "cls-1",
  x: "182",
  y: "148",
  width: "46",
  height: "205",
  rx: "19.5",
  ry: "19.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_2_copy_2",
  "data-name": "Rounded Rectangle 2 copy 2",
  className: "cls-1",
  x: "272",
  y: "148",
  width: "46",
  height: "205",
  rx: "19.5",
  ry: "19.5"
}));
const Start = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "64",
  y: "114",
  width: "372",
  height: "36",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy",
  "data-name": "Rounded Rectangle 1 copy",
  className: "cls-1",
  x: "194",
  y: "172",
  width: "41",
  height: "244",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy_2",
  "data-name": "Rounded Rectangle 1 copy 2",
  className: "cls-1",
  x: "275",
  y: "172",
  width: "41",
  height: "141",
  rx: "18",
  ry: "18"
}));
const Center = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "64",
  y: "232",
  width: "372",
  height: "36",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy",
  "data-name": "Rounded Rectangle 1 copy",
  className: "cls-1",
  x: "195",
  y: "128",
  width: "41",
  height: "244",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy_2",
  "data-name": "Rounded Rectangle 1 copy 2",
  className: "cls-1",
  x: "262",
  y: "180",
  width: "41",
  height: "141",
  rx: "18",
  ry: "18"
}));
const End = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "64",
  y: "347",
  width: "372",
  height: "36",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy",
  "data-name": "Rounded Rectangle 1 copy",
  className: "cls-1",
  x: "193",
  y: "84",
  width: "41",
  height: "244",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy_2",
  "data-name": "Rounded Rectangle 1 copy 2",
  className: "cls-1",
  x: "276",
  y: "180",
  width: "41",
  height: "141",
  rx: "18",
  ry: "18"
}));
const Strech = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "64",
  y: "384",
  width: "372",
  height: "36",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy_3",
  "data-name": "Rounded Rectangle 1 copy 3",
  className: "cls-1",
  x: "64",
  y: "80",
  width: "372",
  height: "36",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy",
  "data-name": "Rounded Rectangle 1 copy",
  className: "cls-1",
  x: "190",
  y: "137",
  width: "41",
  height: "219",
  rx: "18",
  ry: "18"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy_2",
  "data-name": "Rounded Rectangle 1 copy 2",
  className: "cls-1",
  x: "276",
  y: "137",
  width: "41",
  height: "219",
  rx: "18",
  ry: "18"
}));
const OrderStart = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  d: "M88,64h2.989a14,14,0,0,1,14,14V422a14,14,0,0,1-14,14H88a14,14,0,0,1-14-14V78A14,14,0,0,1,88,64Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  d: "M426.011,265.977l-223.5.142c10.788,29.72,16.161,49.1,16.728,75.529-24.524-45.547-56.382-69.25-94.877-91.535,38.467-21.393,68.89-47.493,94.761-91.689-1.635,28.722-6.091,46.069-16.966,77.688l223.835-.143Z"
}));
const OrderEnd = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "395",
  y: "64",
  width: "31",
  height: "372",
  rx: "14",
  ry: "14"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  d: "M73.99,234.023l223.5-.142c-10.788-29.72-16.161-49.1-16.728-75.529,24.524,45.547,56.382,69.25,94.877,91.535-38.467,21.393-68.89,47.493-94.761,91.689,1.635-28.722,6.091-46.069,16.966-77.688l-223.835.143Z"
}));
const Custom = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
  className: "cls-1",
  cx: "250",
  cy: "107",
  r: "40"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
  id: "Ellipse_1_copy",
  "data-name": "Ellipse 1 copy",
  className: "cls-1",
  cx: "250",
  cy: "250",
  r: "40"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
  id: "Ellipse_1_copy_2",
  "data-name": "Ellipse 1 copy 2",
  className: "cls-1",
  cx: "250",
  cy: "394",
  r: "40"
}));
const None = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  d: "M137.231,116.182a175,175,0,1,0,246.586,21.05A175,175,0,0,0,137.231,116.182Zm12.062,218.685a131.726,131.726,0,0,1,.773-170.66L317.614,363.03A131.726,131.726,0,0,1,149.293,334.867Zm200.641,0.926L182.386,136.971A131.711,131.711,0,0,1,349.934,335.793Z"
}));
const Shrink = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "240",
  y: "64",
  width: "21",
  height: "372",
  rx: "10.5",
  ry: "10.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  d: "M56.995,247.762l116.336-.069c-5.616-14.437-8.412-23.852-8.708-36.689,12.766,22.125,29.348,33.639,49.385,44.464-20.022,10.392-35.858,23.07-49.324,44.539,0.851-13.952,3.17-22.379,8.831-37.738L57,262.338Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Shape_1_copy",
  "data-name": "Shape 1 copy",
  className: "cls-2",
  d: "M442.005,263.238l-116.335.069c5.616,14.437,8.412,23.852,8.708,36.689-12.766-22.125-29.348-33.639-49.385-44.464,20.022-10.392,35.858-23.07,49.324-44.539-0.851,13.952-3.17,22.379-8.831,37.738L442,248.662Z"
}));
const Grow = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "388",
  y: "64",
  width: "21",
  height: "372",
  rx: "10.5",
  ry: "10.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1_copy_3",
  "data-name": "Rounded Rectangle 1 copy 3",
  className: "cls-1",
  x: "91",
  y: "64",
  width: "21",
  height: "372",
  rx: "10.5",
  ry: "10.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  d: "M307.005,252.042l-116.335.077c5.616,16.041,8.412,26.5,8.708,40.765-12.766-24.582-29.348-37.376-49.385-49.4,20.022-11.546,35.858-25.633,49.324-49.487-0.851,15.5-3.17,24.865-8.831,41.93L307,235.846Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Shape_1_copy",
  "data-name": "Shape 1 copy",
  className: "cls-2",
  d: "M197,235.958l116.335-.077c-5.616-16.041-8.412-26.5-8.708-40.765,12.766,24.582,29.348,37.376,49.385,49.4-20.022,11.546-35.858,25.633-49.324,49.487,0.851-15.5,3.17-24.865,8.831-41.93L197,252.154Z"
}));
const HorizontalLeft = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "59",
  y: "64",
  width: "22",
  height: "372",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  d: "M441.012,268.521l-250.455.076c12.09,15.9,18.111,26.264,18.747,40.4-27.482-24.361-63.182-37.04-106.32-48.96,43.106-11.442,77.2-25.4,106.189-49.042-1.832,15.362-6.825,24.641-19.012,41.553l250.829-.076Z"
}));
const HorizontalRight = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "419",
  y: "64",
  width: "22",
  height: "372",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  d: "M58.988,231.479l250.455-.076c-12.09-15.9-18.111-26.264-18.747-40.4,27.482,24.361,63.182,37.04,106.32,48.96-43.106,11.442-77.2,25.4-106.189,49.042,1.832-15.362,6.825-24.641,19.012-41.553L59.01,247.53Z"
}));
const VerticalTop = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "64",
  y: "59",
  width: "372",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  d: "M231.479,441.012L231.4,190.557c-15.9,12.09-26.264,18.111-40.4,18.747,24.361-27.483,37.04-63.182,48.96-106.32,11.442,43.106,25.4,77.2,49.042,106.189-15.362-1.832-24.641-6.825-41.553-19.012L247.53,440.99Z"
}));
const VerticalBottom = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_1",
  "data-name": "Rounded Rectangle 1",
  className: "cls-1",
  x: "64",
  y: "419",
  width: "372",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  d: "M268.521,58.988L268.6,309.443c15.9-12.09,26.264-18.111,40.4-18.747-24.361,27.483-37.04,63.182-48.96,106.32-11.442-43.106-25.4-77.2-49.042-106.189,15.362,1.832,24.641,6.825,41.553,19.012L252.47,59.01Z"
}));
const Bgclr = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  fillRule: "evenodd",
  fill: "#5d5d5e",
  d: "M77,78h62.041V422H77V78Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Rectangle_1_copy_3",
  "data-name": "Rectangle 1 copy 3",
  className: "cls-2",
  fillRule: "evenodd",
  fill: "#bbbbbc",
  d: "M360.959,78H423V422H360.959V78Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Rectangle_1_copy",
  "data-name": "Rectangle 1 copy",
  className: "cls-3",
  fillRule: "evenodd",
  fill: "#bdbdbe",
  d: "M139.041,78H250V422H139.041V78Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Rectangle_1_copy_2",
  "data-name": "Rectangle 1 copy 2",
  className: "cls-4",
  fillRule: "evenodd",
  fill: "#e3e3e5",
  d: "M250,78H360.959V422H250V78Z"
}));
const BgGraclr = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  fillRule: "evenodd",
  fill: "#5d5d5e",
  d: "M77,78h62.041V422H77V78Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Rectangle_1_copy_3",
  "data-name": "Rectangle 1 copy 3",
  className: "cls-2",
  fillRule: "evenodd",
  fill: "#bbbbbc",
  d: "M360.959,78H423V422H360.959V78Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Rectangle_1_copy",
  "data-name": "Rectangle 1 copy",
  className: "cls-3",
  fillRule: "evenodd",
  fill: "#bdbdbe",
  d: "M139.041,78H250V422H139.041V78Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  id: "Rectangle_1_copy_2",
  "data-name": "Rectangle 1 copy 2",
  className: "cls-4",
  fillRule: "evenodd",
  fill: "#e3e3e5",
  d: "M250,78H360.959V422H250V78Z"
}));
const BgImg = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
  className: "cls-1",
  fill: "#5d5d5e",
  cx: "137.5",
  cy: "200.5",
  r: "32.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  fillRule: "evenodd",
  fill: "#5d5d5e",
  d: "M320.261,246.989L431,431.6l-98.452,1.416L186,431.918Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-2",
  fill: "#5d5d5e",
  d: "M146.8,267L227,420.423l-26.113,9.568L89.012,435.01Z"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-3",
  fill: "none",
  stroke: "#5d5d5e",
  "stroke-width": "15px",
  x: "49",
  y: "103",
  width: "408",
  height: "335",
  rx: "15",
  ry: "15"
}));
const ArwLft = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  fill: "#5d5d5e",
  fillRule: "evenodd",
  d: "M447.994,265.555H156.067c14.066,29.692,21.068,49.056,21.787,75.452-32-45.51-73.587-69.206-123.848-91.49,50.261-21.344,90.021-47.395,123.848-91.524-2.158,28.688-7.993,46.013-22.224,77.588H447.994v29.974Z"
}));
const ArwRgt = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  fill: "#5d5d5e",
  fillRule: "evenodd",
  d: "M53.006,234.445H344.933c-14.066-29.692-21.068-49.056-21.787-75.452,32,45.51,73.587,69.206,123.848,91.49-50.261,21.344-90.021,47.395-123.848,91.524,2.158-28.688,7.993-46.013,22.224-77.588H53.006V234.445Z"
}));
const ArwUp = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  fill: "#5d5d5e",
  fillRule: "evenodd",
  d: "M235.445,446.994V155.067c-29.692,14.066-49.056,21.068-75.452,21.787,45.51-32,69.206-73.587,91.49-123.848,21.344,50.261,47.395,90.021,91.524,123.848-28.688-2.158-46.013-7.993-77.588-22.224V446.994H235.445Z"
}));
const ArwDn = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  className: "cls-1",
  fill: "#5d5d5e",
  fillRule: "evenodd",
  d: "M266.555,53.006V344.933c29.692-14.066,49.056-21.068,75.452-21.787-45.51,32-69.206,73.587-91.49,123.848-21.344-50.261-47.395-90.021-91.524-123.848,28.688,2.158,46.013,7.993,77.588,22.224V53.006h29.974Z"
}));
const JfCntstr = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content_more",
  "data-name": "Justify content more",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "284",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "226",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "175",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}));
const JfCntend = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content_more",
  "data-name": "Justify content more",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "175",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "233",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "290",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}));
const JfCntctr = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content_more",
  "data-name": "Justify content more",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "174",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "284",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "231",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}));
const JfCntspbtn = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content_more",
  "data-name": "Justify content more",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "166",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "291",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "350",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_5",
  "data-name": "Rounded Rectangle 5 copy 5",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "115",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}));
const JfCntsparnd = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content_more",
  "data-name": "Justify content more",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "204",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "255",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "345",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_5",
  "data-name": "Rounded Rectangle 5 copy 5",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "119",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}));
const JfCntspevn = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content_more",
  "data-name": "Justify content more",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "189",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "133",
  y: "270",
  width: "235",
  height: "42",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "345",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_5",
  "data-name": "Rounded Rectangle 5 copy 5",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "107",
  y: "119",
  width: "287",
  height: "36",
  rx: "9",
  ry: "9"
}));
const JfCntstr1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "278",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "221",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "180",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));
const JfCntctr1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "283",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "176",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "236",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));
const JfCntend1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "180",
  y: "127",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "237",
  y: "127",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "294",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));

// row reverse
const JfCntstrRR = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content",
  "data-name": "Justify content",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "165",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "221",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "286",
  y: "92",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));
const JfCntendRR = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content",
  "data-name": "Justify content",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "282",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "226",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "177",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));
/************************* */

const JfCntspbtn1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "161",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "300",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "363",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_4",
  "data-name": "Rounded Rectangle 5 copy 4",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "112",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));
const JfCntsparnd1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  id: "Justify_content",
  "data-name": "Justify content",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "201",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "258",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "360",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_7",
  "data-name": "Rounded Rectangle 5 copy 7",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "114",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));
const JfCntspevn1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy",
  "data-name": "Rounded Rectangle 5 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "198",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_3",
  "data-name": "Rounded Rectangle 5 copy 3",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "261",
  y: "128",
  width: "42",
  height: "245",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_2",
  "data-name": "Rounded Rectangle 5 copy 2",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "354",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_4",
  "data-name": "Rounded Rectangle 5 copy 4",
  fill: "#a1a1a2",
  className: "cls-2",
  x: "121",
  y: "91",
  width: "26",
  height: "318",
  rx: "9",
  ry: "9"
}));
const alignitemstr = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5",
  "data-name": "Rounded Rectangle 5",
  fill: "#777778",
  className: "cls-1",
  x: "106",
  y: "62",
  width: "29",
  height: "376",
  rx: "14.5",
  ry: "14.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6",
  "data-name": "Rounded Rectangle 6",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "147",
  y: "190",
  width: "149",
  height: "52",
  rx: "24",
  ry: "24"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6_copy",
  "data-name": "Rounded Rectangle 6 copy",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "147",
  y: "258",
  width: "248",
  height: "52",
  rx: "24",
  ry: "24"
}));
const alignitemcnt = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5",
  "data-name": "Rounded Rectangle 5",
  fill: "#777778",
  className: "cls-1",
  x: "236",
  y: "62",
  width: "29",
  height: "376",
  rx: "14.5",
  ry: "14.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6",
  "data-name": "Rounded Rectangle 6",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "173",
  y: "259",
  width: "155",
  height: "52",
  rx: "24",
  ry: "24"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6_copy",
  "data-name": "Rounded Rectangle 6 copy",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "119",
  y: "189",
  width: "262",
  height: "52",
  rx: "24",
  ry: "24"
}));
const alignitemend = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5",
  "data-name": "Rounded Rectangle 5",
  fill: "#777778",
  className: "cls-1",
  x: "367",
  y: "62",
  width: "29",
  height: "376",
  rx: "14.5",
  ry: "14.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6",
  "data-name": "Rounded Rectangle 6",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "203",
  y: "198",
  width: "149",
  height: "52",
  rx: "24",
  ry: "24"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6_copy",
  "data-name": "Rounded Rectangle 6 copy",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "104",
  y: "266",
  width: "248",
  height: "52",
  rx: "24",
  ry: "24"
}));
const alignitemstrech = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5",
  "data-name": "Rounded Rectangle 5",
  fill: "#777778",
  className: "cls-1",
  x: "379",
  y: "62",
  width: "29",
  height: "376",
  rx: "14.5",
  ry: "14.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_5_copy_6",
  "data-name": "Rounded Rectangle 5 copy 6",
  fill: "#777778",
  className: "cls-1",
  x: "93",
  y: "62",
  width: "29",
  height: "376",
  rx: "14.5",
  ry: "14.5"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6",
  "data-name": "Rounded Rectangle 6",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "139",
  y: "190",
  width: "225",
  height: "52",
  rx: "24",
  ry: "24"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_6_copy",
  "data-name": "Rounded Rectangle 6 copy",
  fill: "#5d5d5e",
  className: "cls-2",
  x: "139",
  y: "258",
  width: "225",
  height: "52",
  rx: "24",
  ry: "24"
}));
const alignitemstr1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "78",
  y: "142",
  width: "344",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "201",
  y: "177",
  width: "40",
  height: "182",
  rx: "16",
  ry: "16"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_8_copy",
  "data-name": "Rectangle 8 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "259",
  y: "177",
  width: "40",
  height: "120",
  rx: "16",
  ry: "16"
}));
const alignitemcnt1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "78",
  y: "239",
  width: "344",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "200",
  y: "131",
  width: "40",
  height: "238",
  rx: "16",
  ry: "16"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_8_copy",
  "data-name": "Rectangle 8 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "259",
  y: "190",
  width: "40",
  height: "120",
  rx: "16",
  ry: "16"
}));
const alignitemend1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "78",
  y: "337",
  width: "344",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "259",
  y: "142",
  width: "40",
  height: "182",
  rx: "16",
  ry: "16"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_8_copy",
  "data-name": "Rectangle 8 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "201",
  y: "204",
  width: "40",
  height: "120",
  rx: "16",
  ry: "16"
}));
const alignitemstrech1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "92",
  y: "97",
  width: "316",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_7_copy",
  "data-name": "Rectangle 7 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "92",
  y: "384",
  width: "316",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "196",
  y: "131",
  width: "40",
  height: "238",
  rx: "16",
  ry: "16"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_8_copy_2",
  "data-name": "Rectangle 8 copy 2",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "264",
  y: "131",
  width: "40",
  height: "238",
  rx: "16",
  ry: "16"
}));
const wrap1 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "92",
  y: "97",
  width: "316",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_7_copy",
  "data-name": "Rectangle 7 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "92",
  y: "384",
  width: "316",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "196",
  y: "131",
  width: "40",
  height: "238",
  rx: "16",
  ry: "16"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_8_copy_2",
  "data-name": "Rectangle 8 copy 2",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "264",
  y: "131",
  width: "40",
  height: "238",
  rx: "16",
  ry: "16"
}));
const wrap2 = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "92",
  y: "97",
  width: "316",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_7_copy",
  "data-name": "Rectangle 7 copy",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "92",
  y: "384",
  width: "316",
  height: "22",
  rx: "11",
  ry: "11"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  className: "cls-1",
  x: "196",
  y: "131",
  width: "40",
  height: "238",
  rx: "16",
  ry: "16"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rectangle_8_copy_2",
  "data-name": "Rectangle 8 copy 2",
  fill: "#5d5d5e",
  className: "cls-1",
  x: "264",
  y: "131",
  width: "40",
  height: "238",
  rx: "16",
  ry: "16"
}));
const HeadingIcon = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  className: "th-block-icon",
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Text, {
  id: "H",
  "font-size": "347.65px",
  "text-anchor": "middle",
  "font-family": "Comfortaa",
  "font-weight": "700",
  fill: "#777778",
  className: "cls-1",
  transform: "matrix(1.184, 0, 0, 1.184, 250, 405.422)"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("tspan", {
  x: "0"
}, "H")));
const ConatinerIcon = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  className: "th-block-icon",
  xmlns: "http://www.w3.org/2000/svg",
  width: "500",
  height: "500",
  viewBox: "0 0 500 500"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10",
  "data-name": "Rounded Rectangle 10",
  fill: "#000",
  className: "cls-1",
  x: "110",
  y: "112",
  width: "83",
  height: "8",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy",
  "data-name": "Rounded Rectangle 10 copy",
  fill: "#000",
  className: "cls-1",
  x: "110",
  y: "112",
  width: "8",
  height: "83",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_2",
  "data-name": "Rounded Rectangle 10 copy 2",
  fill: "#000",
  className: "cls-1",
  x: "307",
  y: "381",
  width: "83",
  height: "8",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_3",
  "data-name": "Rounded Rectangle 10 copy 3",
  fill: "#000",
  className: "cls-1",
  x: "382",
  y: "306",
  width: "8",
  height: "83",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_6",
  "data-name": "Rounded Rectangle 10 copy 6",
  fill: "#000",
  className: "cls-1",
  x: "110",
  y: "306",
  width: "8",
  height: "83",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_7",
  "data-name": "Rounded Rectangle 10 copy 7",
  fill: "#000",
  className: "cls-1",
  x: "110",
  y: "381",
  width: "83",
  height: "8",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_4",
  "data-name": "Rounded Rectangle 10 copy 4",
  fill: "#000",
  className: "cls-1",
  x: "382",
  y: "112",
  width: "8",
  height: "83",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_5",
  "data-name": "Rounded Rectangle 10 copy 5",
  fill: "#000",
  className: "cls-1",
  x: "307",
  y: "112",
  width: "83",
  height: "8",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_8",
  "data-name": "Rounded Rectangle 10 copy 8",
  fill: "#000",
  className: "cls-2",
  x: "214",
  y: "112",
  width: "72",
  height: "8",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_9",
  "data-name": "Rounded Rectangle 10 copy 9",
  fill: "#000",
  className: "cls-2",
  x: "110",
  y: "214",
  width: "8",
  height: "72",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_10",
  "data-name": "Rounded Rectangle 10 copy 10",
  fill: "#000",
  x: "382",
  y: "214",
  width: "8",
  height: "72",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_11",
  "data-name": "Rounded Rectangle 10 copy 11",
  fill: "#000",
  x: "382",
  y: "214",
  width: "8",
  height: "72",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_12",
  "data-name": "Rounded Rectangle 10 copy 12",
  fill: "#000",
  x: "214",
  y: "381",
  width: "72",
  height: "8",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_13",
  "data-name": "Rounded Rectangle 10 copy 13",
  fill: "#000",
  x: "214",
  y: "246",
  width: "72",
  height: "8",
  rx: "4",
  ry: "4"
}), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  id: "Rounded_Rectangle_10_copy_14",
  "data-name": "Rounded Rectangle 10 copy 14",
  fill: "#000",
  x: "246",
  y: "214",
  width: "8",
  height: "72",
  rx: "4",
  ry: "4"
}));

/***/ }),

/***/ "./src/block/taiowc/components/index.js":
/*!**********************************************!*\
  !*** ./src/block/taiowc/components/index.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   ClearButton: () => (/* reexport safe */ _clear_button_index_js__WEBPACK_IMPORTED_MODULE_6__["default"]),
/* harmony export */   ControlPanelControl: () => (/* reexport safe */ _control_panel_control_index_js__WEBPACK_IMPORTED_MODULE_3__["default"]),
/* harmony export */   IconPicker: () => (/* reexport safe */ _icon_picker_index_js__WEBPACK_IMPORTED_MODULE_7__["default"]),
/* harmony export */   InsSettingHeader: () => (/* reexport safe */ _ins_setting_header_index_js__WEBPACK_IMPORTED_MODULE_0__["default"]),
/* harmony export */   ResponsiveControl: () => (/* reexport safe */ _responsive_control_index_js__WEBPACK_IMPORTED_MODULE_2__["default"]),
/* harmony export */   SizingControl: () => (/* reexport safe */ _sizing_control_index_js__WEBPACK_IMPORTED_MODULE_1__["default"]),
/* harmony export */   ToogleGroupControl: () => (/* reexport safe */ _toogle_group_control_index_js__WEBPACK_IMPORTED_MODULE_5__["default"]),
/* harmony export */   UnitChooser: () => (/* reexport safe */ _unit_picker_index_js__WEBPACK_IMPORTED_MODULE_4__["default"])
/* harmony export */ });
/* harmony import */ var _ins_setting_header_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ins-setting-header/index.js */ "./src/block/taiowc/components/ins-setting-header/index.js");
/* harmony import */ var _sizing_control_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sizing-control/index.js */ "./src/block/taiowc/components/sizing-control/index.js");
/* harmony import */ var _responsive_control_index_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./responsive-control/index.js */ "./src/block/taiowc/components/responsive-control/index.js");
/* harmony import */ var _control_panel_control_index_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./control-panel-control/index.js */ "./src/block/taiowc/components/control-panel-control/index.js");
/* harmony import */ var _unit_picker_index_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./unit-picker/index.js */ "./src/block/taiowc/components/unit-picker/index.js");
/* harmony import */ var _toogle_group_control_index_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./toogle-group-control/index.js */ "./src/block/taiowc/components/toogle-group-control/index.js");
/* harmony import */ var _clear_button_index_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./clear-button/index.js */ "./src/block/taiowc/components/clear-button/index.js");
/* harmony import */ var _icon_picker_index_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./icon-picker/index.js */ "./src/block/taiowc/components/icon-picker/index.js");
/**
 * Import General Editor CSS
 */









/***/ }),

/***/ "./src/block/taiowc/components/ins-setting-header/index.js":
/*!*****************************************************************!*\
  !*** ./src/block/taiowc/components/ins-setting-header/index.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);

/**
 * External dependencies.
 */


/**
 * WordPress dependencies.
 */




/**
 * Internal dependencies.
 */

const InsSettingHeader = ({
  value,
  options,
  onChange
}) => {
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    className: "th-setting-header"
  }, options.map((option, index) => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: index,
      className: "th-tab-wrap"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      key: index,
      className: classnames__WEBPACK_IMPORTED_MODULE_1___default()({
        'is-active': option.value === value
      }),
      onClick: () => onChange(option.value)
    }, option.label));
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (InsSettingHeader);

/***/ }),

/***/ "./src/block/taiowc/components/responsive-control/index.js":
/*!*****************************************************************!*\
  !*** ./src/block/taiowc/components/responsive-control/index.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _icon_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../icon.js */ "./src/block/taiowc/components/icon.js");

/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */





/**
 * Internal dependencies
 */


const ResponsiveControl = ({
  label,
  className,
  children
}) => {
  const instanceId = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__.useInstanceId)(ResponsiveControl);
  const isLarger = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__.useViewportMatch)('large', '>=');
  const isLarge = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__.useViewportMatch)('large', '<=');
  const isSmall = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__.useViewportMatch)('small', '>=');
  const isSmaller = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__.useViewportMatch)('small', '<=');
  const isMobile = !isLarger && !isLarge && !isSmall && !isSmaller;
  const getView = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useSelect)(select => {
    const {
      getView
    } = select('taiowc/data');
    const {
      __experimentalGetPreviewDeviceType
    } = select('core/edit-post') ? select('core/edit-post') : false;
    return __experimentalGetPreviewDeviceType && !isMobile ? __experimentalGetPreviewDeviceType() : getView();
  }, []);
  const {
    updateView
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useDispatch)('taiowc/data');
  const {
    __experimentalSetPreviewDeviceType
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useDispatch)('core/edit-post') ? (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useDispatch)('core/edit-post') : false;
  const setView = __experimentalSetPreviewDeviceType && !isMobile ? __experimentalSetPreviewDeviceType : updateView;
  const id = `inspector-responsive-control-${instanceId}`;
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    id: id,
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('o-responsive-control', className)
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "components-base-control__field"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "components-base-control__title"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "components-base-control__label"
  }, label), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "floating-controls"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Dropdown, {
    position: "top left",
    renderToggle: ({
      isOpen,
      onToggle
    }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      icon: 'Mobile' === getView ? 'smartphone' : getView.toLowerCase(),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Responsiveness Settings', 'vayu-blocks'),
      showTooltip: true,
      className: "is-button",
      onClick: onToggle,
      "aria-expanded": isOpen
    }),
    renderContent: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "o-responsive-control-settings"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "o-responsive-control-settings-title"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View', 'vayu-blocks')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('o-responsive-control-settings-item', {
        'is-selected': 'Desktop' === getView
      }),
      onClick: () => setView('Desktop')
    }, 'Desktop' === getView && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Icon, {
      icon: _icon_js__WEBPACK_IMPORTED_MODULE_6__.checkIcon
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "popover-title"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Desktop', 'vayu-blocks'))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('o-responsive-control-settings-item', {
        'is-selected': 'Tablet' === getView
      }),
      onClick: () => setView('Tablet')
    }, 'Tablet' === getView && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Icon, {
      icon: _icon_js__WEBPACK_IMPORTED_MODULE_6__.checkIcon
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "popover-title"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Tablet', 'vayu-blocks'))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('o-responsive-control-settings-item', {
        'is-selected': 'Mobile' === getView
      }),
      onClick: () => setView('Mobile')
    }, 'Mobile' === getView && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Icon, {
      icon: _icon_js__WEBPACK_IMPORTED_MODULE_6__.checkIcon
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "popover-title"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Mobile', 'vayu-blocks'))))
  }))), children));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ResponsiveControl);

/***/ }),

/***/ "./src/block/taiowc/components/sizing-control/field.js":
/*!*************************************************************!*\
  !*** ./src/block/taiowc/components/sizing-control/field.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);

/**
 * WordPress dependencies
 */

const Field = ({
  id,
  index,
  option,
  min,
  max,
  onChange
}) => {
  const fieldRef = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useRef)(null);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "th-sizing-control-item"
  }, index.disabled ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    disabled: index.disabled,
    className: "th-sizing-control-item-input",
    id: `th-sizing-control-item-input-${option}`
  }) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    className: "th-sizing-control-item-input",
    id: `th-sizing-control-item-input-${option}-${id}`,
    value: undefined !== index.value ? index.value : '',
    min: min,
    max: max,
    ref: fieldRef,
    onChange: e => onChange(index.type, parseInt(e.target.value))
  })), index.label && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "th-sizing-control-item-label",
    htmlFor: `th-sizing-control-item-input-${option}-${id}`
  }, index.label));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Field);

/***/ }),

/***/ "./src/block/taiowc/components/sizing-control/index.js":
/*!*************************************************************!*\
  !*** ./src/block/taiowc/components/sizing-control/index.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _field_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./field.js */ "./src/block/taiowc/components/sizing-control/field.js");

/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */


const SizingControl = ({
  label,
  type,
  min,
  max,
  changeType,
  options,
  onChange
}) => {
  const instanceId = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__.useInstanceId)(SizingControl);
  const id = `inspector-sizing-control-${instanceId}`;
  if (options && 1 > options.length) {
    return (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Please specify more options.', 'vayu-blocks');
  }
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    id: id,
    className: "th-sizing-control"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "components-base-control__field"
  }, label && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "components-base-control__label",
    htmlFor: id
  }, label), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('th-sizing-control-wrapper', {
      'linking': type
    })
  }, options.map((i, n) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_field_js__WEBPACK_IMPORTED_MODULE_5__["default"], {
    key: n,
    id: instanceId,
    index: i,
    option: n,
    min: min,
    max: max,
    onChange: onChange
  })), type && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('th-sizing-control-item', 'toggle-linking', {
      'is-linked': 'linked' === type
    })
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    icon: 'linked' === type ? 'admin-links' : 'editor-unlink',
    label: 'linked' === type ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Unlink Values', 'vayu-blocks') : (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Link Values', 'vayu-blocks'),
    showTooltip: true,
    className: "th-sizing-control-item-input",
    onClick: () => changeType('linked' === type ? 'unlinked' : 'linked')
  })))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SizingControl);

/***/ }),

/***/ "./src/block/taiowc/components/toogle-group-control/index.js":
/*!*******************************************************************!*\
  !*** ./src/block/taiowc/components/toogle-group-control/index.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);

/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */
const ToogleGroupControl = ({
  value,
  options,
  onChange,
  hasIcon = false
}) => {
  const handleClick = option => {
    const newValue = value === option.value ? null : option.value;
    //const newValue = value === option.value ? value : option.value;
    onChange(newValue);
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ButtonGroup, {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('th-toggle-group-control', {
      'has-icon': hasIcon
    })
  }, options?.map(option => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: option.value,
      className: "th-toggle-option"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
      isPrimary: value === option.value,
      variant: value === option.value ? 'primary' : 'secondary',
      icon: option.icon,
      label: option.label,
      onClick: () => handleClick(option),
      showTooltip: hasIcon
    }, hasIcon ? '' : option.label));
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ToogleGroupControl);

/***/ }),

/***/ "./src/block/taiowc/components/unit-picker/index.js":
/*!**********************************************************!*\
  !*** ./src/block/taiowc/components/unit-picker/index.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ UnitChooser)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);




class UnitChooser extends _wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Component {
  render() {
    const {
      label,
      value,
      onClick,
      units,
      id,
      singleOption = false
    } = this.props;
    const allUnits = singleOption ? [value] : units;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
      label: label,
      id: id,
      className: "components-th-blocks-units-control-header__units"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "components-th-blocks-control__units"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ButtonGroup, {
      className: "components-th-blocks-control-buttons__units",
      "aria-label": (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select Units', 'vayu-blocks')
    }, allUnits.map(unit => {
      let unitName = unit;
      if ('px' === unit) {
        unitName = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__._x)('Pixel', 'A size unit for CSS markup', 'vayu-blocks');
      }
      if ('em' === unit) {
        unitName = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__._x)('Em', 'A size unit for CSS markup', 'vayu-blocks');
      }
      if ('%' === unit) {
        unitName = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__._x)('Percentage', 'A size unit for CSS markup', 'vayu-blocks');
      }
      if ('deg' === unit) {
        unitName = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__._x)('Degree', 'A size unit for CSS markup', 'vayu-blocks');
      }
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Tooltip
      /* translators: Unit type (px, em, %) */, {
        text: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.sprintf)((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('%s Units', 'vayu-blocks'), unitName),
        key: unit
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
        key: unit,
        className: 'components-th-blocks-control-button__units--' + unit,
        isSmall: true,
        isPrimary: value === unit,
        "aria-pressed": value === unit
        /* translators: %s: values associated with CSS syntax, 'Pixel', 'Em', 'Percentage' */,
        "aria-label": (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.sprintf)((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('%s Units', 'vayu-blocks'), unitName),
        onClick: () => onClick(unit)
      }, unit));
    }))));
  }
}

/***/ }),

/***/ "./src/block/taiowc/edit.js":
/*!**********************************!*\
  !*** ./src/block/taiowc/edit.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var hex_rgba__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! hex-rgba */ "./node_modules/hex-rgba/index.js");
/* harmony import */ var hex_rgba__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(hex_rgba__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./editor.scss */ "./src/block/taiowc/editor.scss");
/* harmony import */ var _settings_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./settings.js */ "./src/block/taiowc/settings.js");

/**
 * WordPress dependencies.
 */
/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */







/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */


/**
 * Internal dependencies
 */

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


function Edit({
  attributes,
  setAttributes,
  clientId,
  uniqueID
}) {
  let counter = 0;
  function getUniqueId(uniqueID, clientId, isUniqueID, isUniqueBlock) {
    let smallID = '_' + clientId.substr(2, 9);
    if (!uniqueID) {
      //new block
      if (!isUniqueID(smallID)) {
        smallID = generateUniqueId(smallID);
      }
      return smallID;
    } else if (!isUniqueID(uniqueID)) {
      // This checks if we are just switching views, client ID the same means we don't need to update.
      if (!isUniqueBlock(uniqueID, clientId)) {
        return smallID;
      }
    }
    //normal block loading 
    return uniqueID;
  }
  function generateUniqueId(smallID) {
    counter += 1;
    return `${smallID}${counter}`;
  }
  const {
    id
  } = attributes;
  const {
    addUniqueID
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useDispatch)('taiowc/data');
  const {
    isUniqueID,
    isUniqueBlock
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useSelect)(select => {
    return {
      isUniqueID: value => select('taiowc/data').isUniqueID(value),
      isUniqueBlock: (value, clientId) => select('taiowc/data').isUniqueBlock(value, clientId)
    };
  }, [clientId]);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_6__.useEffect)(() => {
    const uniqueId = getUniqueId(uniqueID, clientId, isUniqueID, isUniqueBlock);
    if (uniqueId !== uniqueID) {
      attributes.uniqueID = uniqueId;
      setAttributes({
        uniqueID: uniqueId
      });
      addUniqueID(uniqueId, clientId);
    } else {
      addUniqueID(uniqueId, clientId);
    }
  }, []);
  const ThiconStyle = ({
    cartIconAttr
  }) => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "th-icon th-icon-Shopping_icons-01"
    });
  };
  let countPositionVar;
  if (attributes.countPosition === 'left') {
    countPositionVar = 'count-left';
  } else if (attributes.countPosition === 'right') {
    countPositionVar = 'count-right';
  }
  const {
    isViewportAvailable,
    isPreviewDesktop,
    isPreviewTablet,
    isPreviewMobile
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useSelect)(select => {
    const {
      __experimentalGetPreviewDeviceType
    } = select('core/edit-post') ? select('core/edit-post') : false;
    return {
      isViewportAvailable: __experimentalGetPreviewDeviceType ? true : false,
      isPreviewDesktop: __experimentalGetPreviewDeviceType ? 'Desktop' === __experimentalGetPreviewDeviceType() : false,
      isPreviewTablet: __experimentalGetPreviewDeviceType ? 'Tablet' === __experimentalGetPreviewDeviceType() : false,
      isPreviewMobile: __experimentalGetPreviewDeviceType ? 'Mobile' === __experimentalGetPreviewDeviceType() : false
    };
  }, []);
  const isLarger = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__.useViewportMatch)('large', '>=');
  const isLarge = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__.useViewportMatch)('large', '<=');
  const isSmall = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__.useViewportMatch)('small', '>=');
  const isSmaller = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__.useViewportMatch)('small', '<=');
  let isDesktop = isLarger && !isLarge && isSmall && !isSmaller;
  let isTablet = !isLarger && !isLarge && isSmall && !isSmaller;
  let isMobile = !isLarger && !isLarge && !isSmall && !isSmaller;
  if (isViewportAvailable && !isMobile) {
    isDesktop = isPreviewDesktop;
    isTablet = isPreviewTablet;
    isMobile = isPreviewMobile;
  }
  const deviceAttributeMap = {
    desktop: {
      paddingTop: 'linked' === attributes.paddingType ? `${attributes.padding}${attributes.paddingUnit}` : `${attributes.paddingTop}${attributes.paddingUnit}`,
      paddingRight: 'linked' === attributes.paddingType ? `${attributes.padding}${attributes.paddingUnit}` : `${attributes.paddingRight}${attributes.paddingUnit}`,
      paddingBottom: 'linked' === attributes.paddingType ? `${attributes.padding}${attributes.paddingUnit}` : `${attributes.paddingBottom}${attributes.paddingUnit}`,
      paddingLeft: 'linked' === attributes.paddingType ? `${attributes.padding}${attributes.paddingUnit}` : `${attributes.paddingLeft}${attributes.paddingUnit}`,
      marginTop: 'linked' === attributes.marginType ? `${attributes.margin}${attributes.marginUnit}` : `${attributes.marginTop}${attributes.marginUnit}`,
      marginBottom: 'linked' === attributes.marginType ? `${attributes.margin}${attributes.marginUnit}` : `${attributes.marginBottom}${attributes.marginUnit}`,
      marginRight: 'linked' === attributes.marginType ? `${attributes.margin}${attributes.marginUnit}` : `${attributes.marginRight}${attributes.marginUnit}`,
      marginLeft: 'linked' === attributes.marginType ? `${attributes.margin}${attributes.marginUnit}` : `${attributes.marginLeft}${attributes.marginUnit}`,
      pricefontSize: attributes.pricefontSize + attributes.pricefontSizeUnit,
      iconfontSize: attributes.iconfontSize + attributes.iconfontSizeUnit,
      countSize: attributes.countSize + attributes.countSizeUnit,
      countFontSize: attributes.countFontSize + attributes.countFontSizeUnit,
      borderRadius: attributes.borderRadius + attributes.borderRadiusUnit
    },
    tablet: {
      paddingTop: 'linked' === attributes.paddingTypeTablet ? `${attributes.paddingTablet}${attributes.paddingUnit}` : `${attributes.paddingTopTablet}${attributes.paddingUnit}`,
      paddingRight: 'linked' === attributes.paddingTypeTablet ? `${attributes.paddingTablet}${attributes.paddingUnit}` : `${attributes.paddingRightTablet}${attributes.paddingUnit}`,
      paddingBottom: 'linked' === attributes.paddingTypeTablet ? `${attributes.paddingTablet}${attributes.paddingUnit}` : `${attributes.paddingBottomTablet}${attributes.paddingUnit}`,
      paddingLeft: 'linked' === attributes.paddingTypeTablet ? `${attributes.paddingTablet}${attributes.paddingUnit}` : `${attributes.paddingLeftTablet}${attributes.paddingUnit}`,
      marginTop: 'linked' === attributes.marginTypeTablet ? `${attributes.marginTablet}${attributes.marginUnit}` : `${attributes.marginTopTablet}${attributes.marginUnit}`,
      marginBottom: 'linked' === attributes.marginTypeTablet ? `${attributes.marginTablet}${attributes.marginUnit}` : `${attributes.marginBottomTablet}${attributes.marginUnit}`,
      marginRight: 'linked' === attributes.marginTypeTablet ? `${attributes.marginTablet}${attributes.marginUnit}` : `${attributes.marginRightTablet}${attributes.marginUnit}`,
      marginLeft: 'linked' === attributes.marginTypeTablet ? `${attributes.marginTablet}${attributes.marginUnit}` : `${attributes.marginLeftTablet}${attributes.marginUnit}`,
      pricefontSize: attributes.pricefontSizeTablet + attributes.pricefontSizeUnit,
      iconfontSize: attributes.iconfontSizeTablet + attributes.iconfontSizeUnit,
      countSize: attributes.countSizeTablet + attributes.countSizeUnit,
      countFontSize: attributes.countFontSizeTablet + attributes.countFontSizeUnit,
      borderRadius: attributes.borderRadiusTablet + attributes.borderRadiusUnit
    },
    mobile: {
      paddingTop: 'linked' === attributes.paddingTypeMobile ? `${attributes.paddingMobile}${attributes.paddingUnit}` : `${attributes.paddingTopMobile}${attributes.paddingUnit}`,
      paddingRight: 'linked' === attributes.paddingTypeMobile ? `${attributes.paddingMobile}${attributes.paddingUnit}` : `${attributes.paddingRightMobile}${attributes.paddingUnit}`,
      paddingBottom: 'linked' === attributes.paddingTypeMobile ? `${attributes.paddingMobile}${attributes.paddingUnit}` : `${attributes.paddingBottomMobile}${attributes.paddingUnit}`,
      paddingLeft: 'linked' === attributes.paddingTypeMobile ? `${attributes.paddingMobile}${attributes.paddingUnit}` : `${attributes.paddingLeftMobile}${attributes.paddingUnit}`,
      marginTop: 'linked' === attributes.marginTypeMobile ? `${attributes.marginMobile}${attributes.marginUnit}` : `${attributes.marginTopMobile}${attributes.marginUnit}`,
      marginBottom: 'linked' === attributes.marginTypeMobile ? `${attributes.marginMobile}${attributes.marginUnit}` : `${attributes.marginBottomMobile}${attributes.marginUnit}`,
      marginRight: 'linked' === attributes.marginTypeMobile ? `${attributes.marginMobile}${attributes.marginUnit}` : `${attributes.marginRightMobile}${attributes.marginUnit}`,
      marginLeft: 'linked' === attributes.marginTypeMobile ? `${attributes.marginMobile}${attributes.marginUnit}` : `${attributes.marginLeftMobile}${attributes.marginUnit}`,
      pricefontSize: attributes.pricefontSizeMobile + attributes.pricefontSizeUnit,
      iconfontSize: attributes.iconfontSizeMobile + attributes.iconfontSizeUnit,
      countSize: attributes.countSizeMobile + attributes.countSizeUnit,
      countFontSize: attributes.iconFontSizeMobile + attributes.countFontSizeUnit,
      borderRadius: attributes.borderRadiusMobile + attributes.borderRadiusUnit
    }
  };
  const deviceType = isDesktop ? 'desktop' : isTablet ? 'tablet' : 'mobile';
  const PaddingTop = deviceAttributeMap[deviceType].paddingTop;
  const PaddingBottom = deviceAttributeMap[deviceType].paddingBottom;
  const PaddingRight = deviceAttributeMap[deviceType].paddingRight;
  const PaddingLeft = deviceAttributeMap[deviceType].paddingLeft;
  const MarginTop = deviceAttributeMap[deviceType].marginTop;
  const MarginBottom = deviceAttributeMap[deviceType].marginBottom;
  const MarginRight = deviceAttributeMap[deviceType].marginRight;
  const MarginLeft = deviceAttributeMap[deviceType].marginLeft;
  const IconFontSize = deviceAttributeMap[deviceType].iconfontSize;
  const PriceFontSize = deviceAttributeMap[deviceType].pricefontSize;
  const CountSize = deviceAttributeMap[deviceType].countSize;
  const CountFontSize = deviceAttributeMap[deviceType].countFontSize;
  const BorderRadius = deviceAttributeMap[deviceType].borderRadius;
  let taiowcStyle;
  taiowcStyle = {
    '--taiowc-padding-top': PaddingTop,
    '--taiowc-padding-bottom': PaddingBottom,
    '--taiowc-padding-right': PaddingRight,
    '--taiowc-padding-left': PaddingLeft,
    '--taiowc-margin-top': MarginTop,
    '--taiowc-margin-bottom': MarginBottom,
    '--taiowc-margin-right': MarginRight,
    '--taiowc-margin-left': MarginLeft,
    '--taiowc-icon-font-size': IconFontSize,
    '--taiowc-price-font-size': PriceFontSize,
    '--taiowc-count-size': CountSize,
    '--taiowc-count-font-size': CountFontSize,
    '--taiowc-brd-radius': BorderRadius,
    '--taiowc-cartBgClr': attributes.cartBgClr,
    '--taiowc-iconClr': attributes.iconClr,
    '--taiowc-priceClr': attributes.priceClr,
    '--taiowc-countClr': attributes.countClr,
    '--taiowc-countBgClr': attributes.countBgClr
  };
  const omitBy = (object, condition) => Object.fromEntries(Object.entries(object).filter(([key, value]) => !condition(value)));
  const style = omitBy({
    ...taiowcStyle
  }, x => x?.includes?.('undefined'));
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7__.useBlockProps)({
    id: `taiowc-${attributes.uniqueID}`,
    className: 'taiowc-wrapper',
    style
  });
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_settings_js__WEBPACK_IMPORTED_MODULE_9__["default"], {
    attributes: attributes,
    setAttributes: setAttributes
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "th-minicart"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "th-minicart-icon"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(ThiconStyle, {
    cartIconAttr: attributes.cartIcon
  })), attributes.cartPrice === true && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "th-minicart-amt"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, "$00.0")), attributes.cartCount === true && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `th-minicart-count ${countPositionVar}`
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, "00")))));
}

/***/ }),

/***/ "./src/block/taiowc/index.js":
/*!***********************************!*\
  !*** ./src/block/taiowc/index.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/block/taiowc/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./edit */ "./src/block/taiowc/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./block.json */ "./src/block/taiowc/block.json");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__);

/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */

//import save from './save';


// Import Dashicon

const {
  name
} = _block_json__WEBPACK_IMPORTED_MODULE_5__;
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(name, {
  ..._block_json__WEBPACK_IMPORTED_MODULE_5__,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('All In One Woo Cart', 'taiowc'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Fastest All In One Woo Cart plugin for WooCommerce.', 'taiowc'),
  icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__.Dashicon, {
    icon: "cart"
  }),
  edit: _edit__WEBPACK_IMPORTED_MODULE_4__["default"],
  save: () => null
});

/***/ }),

/***/ "./src/block/taiowc/settings.js":
/*!**************************************!*\
  !*** ./src/block/taiowc/settings.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _components_index_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./components/index.js */ "./src/block/taiowc/components/index.js");







/**
* Internal dependencies
*/

const InsSettings = ({
  attributes,
  setAttributes
}) => {
  const adminUrltaiowc = ThBlockDatataiowc.adminUrltaiowc;
  const [tab, setTab] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('setting');
  const getView = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useSelect)(select => {
    const {
      getView
    } = select('taiowc/data');
    const {
      __experimentalGetPreviewDeviceType
    } = select('core/edit-post') ? select('core/edit-post') : false;
    return __experimentalGetPreviewDeviceType ? __experimentalGetPreviewDeviceType() : getView();
  }, []);
  //padding
  const getPaddingType = () => {
    switch (getView) {
      case 'Desktop':
        return attributes.paddingType;
      case 'Tablet':
        return attributes.paddingTypeTablet;
      case 'Mobile':
        return attributes.paddingTypeMobile;
      default:
        return undefined;
    }
  };
  const changePaddingType = value => {
    if ('Desktop' === getView) {
      setAttributes({
        paddingType: value,
        paddingTypeTablet: value,
        paddingTypeMobile: value
      });
    } else if ('Tablet' === getView) {
      setAttributes({
        paddingTypeTablet: value,
        paddingTypeMobile: value
      });
    } else if ('Mobile' === getView) {
      setAttributes({
        paddingTypeMobile: value
      });
    }
  };
  const desktopPaddingType = {
    top: 'paddingTop',
    right: 'paddingRight',
    bottom: 'paddingBottom',
    left: 'paddingLeft'
  };
  const tabletPaddingType = {
    top: 'paddingTopTablet',
    right: 'paddingRightTablet',
    bottom: 'paddingBottomTablet',
    left: 'paddingLeftTablet'
  };
  const mobilePaddingType = {
    top: 'paddingTopMobile',
    right: 'paddingRightMobile',
    bottom: 'paddingBottomMobile',
    left: 'paddingLeftMobile'
  };
  const changePadding = (type, value) => {
    switch (getView) {
      case 'Desktop':
        if ('linked' === attributes.paddingType) {
          setAttributes({
            padding: value,
            paddingTablet: value,
            paddingMobile: value
          });
        } else {
          setAttributes({
            [desktopPaddingType[type]]: value
          });
          setAttributes({
            [desktopPaddingType[type]]: value,
            [tabletPaddingType[type]]: value,
            [mobilePaddingType[type]]: value
          });
        }
        break;
      case 'Tablet':
        if ('linked' === attributes.paddingTypeTablet) {
          setAttributes({
            paddingTablet: value,
            paddingMobile: value
          });
        } else {
          setAttributes({
            [tabletPaddingType[type]]: value,
            [mobilePaddingType[type]]: value
          });
        }
        break;
      case 'Mobile':
        if ('linked' === attributes.paddingTypeMobile) {
          setAttributes({
            paddingMobile: value
          });
        } else {
          setAttributes({
            [mobilePaddingType[type]]: value
          });
        }
        break;
    }
  };
  const getPadding = type => {
    if ('top' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.paddingType ? attributes.padding : attributes.paddingTop;
        case 'Tablet':
          return 'linked' === attributes.paddingTypeTablet ? attributes.paddingTablet : attributes.paddingTopTablet;
        case 'Mobile':
          return 'linked' === attributes.paddingTypeMobile ? attributes.paddingMobile : attributes.paddingTopMobile;
      }
    } else if ('right' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.paddingType ? attributes.padding : attributes.paddingRight;
        case 'Tablet':
          return 'linked' === attributes.paddingTypeTablet ? attributes.paddingTablet : attributes.paddingRightTablet;
        case 'Mobile':
          return 'linked' === attributes.paddingTypeMobile ? attributes.paddingMobile : attributes.paddingRightMobile;
      }
    } else if ('bottom' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.paddingType ? attributes.padding : attributes.paddingBottom;
        case 'Tablet':
          return 'linked' === attributes.paddingTypeTablet ? attributes.paddingTablet : attributes.paddingBottomTablet;
        case 'Mobile':
          return 'linked' === attributes.paddingTypeMobile ? attributes.paddingMobile : attributes.paddingBottomMobile;
      }
    } else if ('left' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.paddingType ? attributes.padding : attributes.paddingLeft;
        case 'Tablet':
          return 'linked' === attributes.paddingTypeTablet ? attributes.paddingTablet : attributes.paddingLeftTablet;
        case 'Mobile':
          return 'linked' === attributes.paddingTypeMobile ? attributes.paddingMobile : attributes.paddingLeftMobile;
      }
    }
    return undefined;
  };
  const [paddingUnit, setpaddingUnit] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('px');
  const maxpaddingUnit = paddingUnit === 'px' ? 1500 : paddingUnit === 'em' ? 50 : paddingUnit === '%' ? 100 : '';
  // margin
  const getMarginType = () => {
    switch (getView) {
      case 'Desktop':
        return attributes.marginType;
      case 'Tablet':
        return attributes.marginTypeTablet;
      case 'Mobile':
        return attributes.marginTypeMobile;
      default:
        return undefined;
    }
  };
  const changeMarginType = value => {
    if ('Desktop' === getView) {
      setAttributes({
        marginType: value,
        marginTypeTablet: value,
        marginTypeMobile: value
      });
    } else if ('Tablet' === getView) {
      setAttributes({
        marginTypeTablet: value,
        marginTypeMobile: value
      });
    } else if ('Mobile' === getView) {
      setAttributes({
        marginTypeMobile: value
      });
    }
  };
  const desktopMarginType = {
    top: 'marginTop',
    right: 'marginRight',
    bottom: 'marginBottom',
    left: 'marginLeft'
  };
  const tabletMarginType = {
    top: 'marginTopTablet',
    right: 'margingRightTablet',
    bottom: 'marginBottomTablet',
    left: 'marginLeftTablet'
  };
  const mobileMarginType = {
    top: 'marginTopMobile',
    right: 'marginRightMobile',
    bottom: 'marginBottomMobile',
    left: 'marginLeftMobile'
  };
  const changeMargin = (type, value) => {
    switch (getView) {
      case 'Desktop':
        if ('linked' === attributes.marginType) {
          setAttributes({
            margin: value,
            marginTablet: value,
            marginMobile: value
          });
        } else {
          setAttributes({
            [desktopMarginType[type]]: value,
            [tabletMarginType[type]]: value,
            [mobileMarginType[type]]: value
          });
        }
        break;
      case 'Tablet':
        if ('linked' === attributes.marginTypeTablet) {
          setAttributes({
            marginTablet: value,
            marginMobile: value
          });
        } else {
          setAttributes({
            [tabletMarginType[type]]: value,
            [mobileMarginType[type]]: value
          });
        }
        break;
      case 'Mobile':
        if ('linked' === attributes.marginTypeMobile) {
          setAttributes({
            marginMobile: value
          });
        } else {
          setAttributes({
            [mobileMarginType[type]]: value
          });
        }
        break;
    }
  };
  const getMargin = type => {
    if ('top' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.marginType ? attributes.margin : attributes.marginTop;
        case 'Tablet':
          return 'linked' === attributes.marginTypeTablet ? attributes.marginTablet : attributes.marginTopTablet;
        case 'Mobile':
          return 'linked' === attributes.marginTypeMobile ? attributes.marginMobile : attributes.marginTopMobile;
      }
    } else if ('right' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.marginType ? attributes.margin : attributes.marginRight;
        case 'Tablet':
          return 'linked' === attributes.marginTypeTablet ? attributes.marginTablet : attributes.marginRightTablet;
        case 'Mobile':
          return 'linked' === attributes.marginTypeMobile ? attributes.marginMobile : attributes.marginRightMobile;
      }
    } else if ('bottom' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.marginType ? attributes.margin : attributes.marginBottom;
        case 'Tablet':
          return 'linked' === attributes.marginTypeTablet ? attributes.marginTablet : attributes.marginBottomTablet;
        case 'Mobile':
          return 'linked' === attributes.marginTypeMobile ? attributes.marginMobile : attributes.marginBottomMobile;
      }
    } else if ('left' == type) {
      switch (getView) {
        case 'Desktop':
          return 'linked' === attributes.marginType ? attributes.margin : attributes.marginLeft;
        case 'Tablet':
          return 'linked' === attributes.marginTypeTablet ? attributes.marginTablet : attributes.marginLeftTablet;
        case 'Mobile':
          return 'linked' === attributes.marginTypeMobile ? attributes.marginMobile : attributes.marginLeftMobile;
      }
    }
    return undefined;
  };
  const [marginUnit, setmarginUnit] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('px');
  const maxmarginUnit = marginUnit === 'px' ? 1500 : marginUnit === 'em' ? 50 : marginUnit === '%' ? 100 : '';

  // icon font size
  const [iconfontSizeUnit, seticonfontSizeUnit] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('px');
  const maxiconfontSizeUnit = iconfontSizeUnit === 'px' ? 150 : iconfontSizeUnit === 'em' ? 10 : iconfontSizeUnit === '%' ? 100 : '';
  const customTooltipiconfontSize = value => `${value}${attributes.iconfontSizeUnit}`;
  const geticonfontSize = () => {
    switch (getView) {
      case 'Desktop':
        return attributes.iconfontSize;
      case 'Tablet':
        return attributes.iconfontSizeTablet;
      case 'Mobile':
        return attributes.iconfontSizeMobile;
      default:
        return undefined;
    }
  };
  const changeiconfontSize = value => {
    if ('Desktop' === getView) {
      setAttributes({
        iconfontSize: value,
        iconfontSizeTablet: value,
        iconfontSizeMobile: value
      });
    } else if ('Tablet' === getView) {
      setAttributes({
        iconfontSizeTablet: value,
        iconfontSizeMobile: value
      });
    } else if ('Mobile' === getView) {
      setAttributes({
        iconfontSizeMobile: value
      });
    }
  };
  // border radius
  const [borderRadiusUnit, setborderRadiusUnit] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('px');
  const maxborderRadiusUnit = borderRadiusUnit === 'px' ? 20 : borderRadiusUnit === 'em' ? 5 : borderRadiusUnit === '%' ? 100 : '';
  const customTooltipborderRadius = value => `${value}${attributes.borderRadiusUnit}`;
  const getborderRadius = () => {
    switch (getView) {
      case 'Desktop':
        return attributes.borderRadius;
      case 'Tablet':
        return attributes.borderRadiusTablet;
      case 'Mobile':
        return attributes.borderRadiusMobile;
      default:
        return undefined;
    }
  };
  const changeborderRadius = value => {
    if ('Desktop' === getView) {
      setAttributes({
        borderRadius: value,
        borderRadiusTablet: value,
        borderRadiusMobile: value
      });
    } else if ('Tablet' === getView) {
      setAttributes({
        borderRadiusTablet: value,
        borderRadiusMobile: value
      });
    } else if ('Mobile' === getView) {
      setAttributes({
        borderRadiusMobile: value
      });
    }
  };
  // price font size
  const [pricefontSizeUnit, setpricefontSizeUnit] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('px');
  const maxpricefontSizeUnit = pricefontSizeUnit === 'px' ? 150 : pricefontSizeUnit === 'em' ? 10 : pricefontSizeUnit === '%' ? 100 : '';
  const customTooltippricefontSize = value => `${value}${attributes.pricefontSizeUnit}`;
  const getpricefontSize = () => {
    switch (getView) {
      case 'Desktop':
        return attributes.pricefontSize;
      case 'Tablet':
        return attributes.pricefontSizeTablet;
      case 'Mobile':
        return attributes.pricefontSizeMobile;
      default:
        return undefined;
    }
  };
  const changepricefontSize = value => {
    if ('Desktop' === getView) {
      setAttributes({
        pricefontSize: value,
        pricefontSizeTablet: value,
        pricefontSizeMobile: value
      });
    } else if ('Tablet' === getView) {
      setAttributes({
        pricefontSizeTablet: value,
        pricefontSizeMobile: value
      });
    } else if ('Mobile' === getView) {
      setAttributes({
        pricefontSizeMobile: value
      });
    }
  };

  // Count size
  const [countSizeUnit, setcountSizeUnit] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('px');
  const maxcountSizeUnit = countSizeUnit === 'px' ? 150 : countSizeUnit === 'em' ? 10 : countSizeUnit === '%' ? 100 : '';
  const customTooltipcountSize = value => `${value}${attributes.countSizeUnit}`;
  const getcountSize = () => {
    switch (getView) {
      case 'Desktop':
        return attributes.countSize;
      case 'Tablet':
        return attributes.countSizeTablet;
      case 'Mobile':
        return attributes.countSizeMobile;
      default:
        return undefined;
    }
  };
  const changecountSize = value => {
    if ('Desktop' === getView) {
      setAttributes({
        countSize: value,
        countSizeTablet: value,
        countSizeMobile: value
      });
    } else if ('Tablet' === getView) {
      setAttributes({
        countSizeTablet: value,
        countSizeMobile: value
      });
    } else if ('Mobile' === getView) {
      setAttributes({
        countSizeMobile: value
      });
    }
  };
  // Count size
  const [countFontSizeUnit, setcountFontSizeUnit] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useState)('px');
  const maxcountFontSizeUnit = countFontSizeUnit === 'px' ? 150 : countFontSizeUnit === 'em' ? 10 : countFontSizeUnit === '%' ? 100 : '';
  const customTooltipcountFontSize = value => `${value}${attributes.countFontSizeUnit}`;
  const getcountFontSize = () => {
    switch (getView) {
      case 'Desktop':
        return attributes.countFontSize;
      case 'Tablet':
        return attributes.countFontSizeTablet;
      case 'Mobile':
        return attributes.countFontSizeMobile;
      default:
        return undefined;
    }
  };
  const changecountFontSize = value => {
    if ('Desktop' === getView) {
      setAttributes({
        countFontSize: value,
        countFontSizeTablet: value,
        countFontSizeMobile: value
      });
    } else if ('Tablet' === getView) {
      setAttributes({
        countFontSizeTablet: value,
        countFontSizeMobile: value
      });
    } else if ('Mobile' === getView) {
      setAttributes({
        countFontSizeMobile: value
      });
    }
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.InsSettingHeader, {
    value: tab,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Setting', 'taiowc'),
      value: 'setting',
      icon: ''
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Style', 'taiowc'),
      value: 'style',
      icon: ''
    }],
    onChange: setTab
  }), 'setting' === tab && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('All In One Woo Cart', 'taiowc'),
    initialOpen: true,
    className: "th-sEARCH-panel"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display Total Price', 'taiowc'),
    checked: attributes.cartPrice,
    onChange: cartPrice => setAttributes({
      cartPrice
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display Product Count', 'taiowc'),
    checked: attributes.cartCount,
    onChange: cartCount => setAttributes({
      cartCount
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Count Position', 'taiowc'),
    value: attributes.countPosition,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Left', 'taiowc'),
      value: 'left'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Right', 'taiowc'),
      value: 'right'
    }],
    onChange: e => setAttributes({
      countPosition: e
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('For the ', 'taiowc'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Advanced Options and Styling', 'taiowc')), (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(' navigate to ', 'taiowc'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: adminUrltaiowc,
    target: "_blank",
    rel: "noopener noreferrer"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Settings', 'taiowc'))))) || 'style' === tab && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('All In One Woo Cart Style', 'taiowc'),
    initialOpen: true,
    className: "th-cart-panel"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ResponsiveControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Padding', 'taiowc')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.UnitChooser, {
    value: attributes.paddingUnit,
    onClick: paddingUnit => {
      setAttributes({
        paddingUnit
      });
      setpaddingUnit(paddingUnit);
    },
    units: ['px', 'em', '%']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.SizingControl, {
    type: getPaddingType(),
    min: 0,
    max: maxpaddingUnit,
    changeType: changePaddingType,
    onChange: changePadding,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Top', 'taiowc'),
      type: 'top',
      value: getPadding('top')
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Right', 'taiowc'),
      type: 'right',
      value: getPadding('right')
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Bottom', 'taiowc'),
      type: 'bottom',
      value: getPadding('bottom')
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Left', 'taiowc'),
      type: 'left',
      value: getPadding('left')
    }]
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ResponsiveControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Margin', 'taiowc')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.UnitChooser, {
    value: attributes.marginUnit,
    onClick: marginUnit => {
      setAttributes({
        marginUnit
      });
      setmarginUnit(marginUnit);
    },
    units: ['px', 'em', '%']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.SizingControl, {
    type: getMarginType(),
    min: 0,
    max: maxmarginUnit,
    changeType: changeMarginType,
    onChange: changeMargin,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Top', 'taiowc'),
      type: 'top',
      value: getMargin('top')
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Right', 'taiowc'),
      type: 'right',
      value: getMargin('right')
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Bottom', 'taiowc'),
      type: 'bottom',
      value: getMargin('bottom')
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Left', 'taiowc'),
      type: 'left',
      value: getMargin('left')
    }]
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ResponsiveControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('border radius', 'taiowc')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.UnitChooser, {
    value: attributes.borderRadiusUnit,
    onClick: borderRadiusUnit => {
      setAttributes({
        borderRadiusUnit
      });
      setborderRadiusUnit(borderRadiusUnit);
    },
    units: ['px', 'em', '%']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    renderTooltipContent: customTooltipborderRadius,
    value: getborderRadius() || '',
    onChange: changeborderRadius,
    step: 0.1,
    min: 0,
    max: maxborderRadiusUnit,
    allowReset: true
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ControlPanelControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Bg Color', 'taiowc'),
    attributes: attributes,
    setAttributes: setAttributes,
    onClick: () => setAttributes({
      bgSet: true
    })
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalColorGradientControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Bg Color', 'taiowc'),
    colorValue: attributes.cartBgClr,
    onColorChange: e => setAttributes({
      cartBgClr: e
    }),
    enableAlpha: false
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ControlPanelControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Icon style', 'taiowc'),
    attributes: attributes,
    setAttributes: setAttributes,
    onClick: () => setAttributes({
      iconSet: true
    })
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalColorGradientControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Color', 'taiowc'),
    colorValue: attributes.iconClr,
    onColorChange: e => setAttributes({
      iconClr: e
    }),
    enableAlpha: true
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ResponsiveControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Font Size', 'taiowc')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.UnitChooser, {
    value: attributes.iconfontSizeUnit,
    onClick: iconfontSizeUnit => {
      setAttributes({
        iconfontSizeUnit
      });
      seticonfontSizeUnit(iconfontSizeUnit);
    },
    units: ['px', 'em', '%']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    renderTooltipContent: customTooltipiconfontSize,
    value: geticonfontSize() || '',
    onChange: changeiconfontSize,
    step: 0.1,
    min: 0,
    max: maxiconfontSizeUnit,
    allowReset: true
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ControlPanelControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Price style', 'taiowc'),
    attributes: attributes,
    setAttributes: setAttributes,
    onClick: () => setAttributes({
      priceSet: true
    })
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalColorGradientControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Color', 'taiowc'),
    colorValue: attributes.priceClr,
    onColorChange: e => setAttributes({
      priceClr: e
    }),
    enableAlpha: true
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ResponsiveControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Font Size', 'taiowc')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.UnitChooser, {
    value: attributes.pricefontSizeUnit,
    onClick: pricefontSizeUnit => {
      setAttributes({
        pricefontSizeUnit
      });
      setpricefontSizeUnit(pricefontSizeUnit);
    },
    units: ['px', 'em', '%']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    renderTooltipContent: customTooltippricefontSize,
    value: getpricefontSize() || '',
    onChange: changepricefontSize,
    step: 0.1,
    min: 0,
    max: maxpricefontSizeUnit,
    allowReset: true
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ControlPanelControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Count style', 'taiowc'),
    attributes: attributes,
    setAttributes: setAttributes,
    onClick: () => setAttributes({
      countSet: true
    })
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalColorGradientControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Color', 'taiowc'),
    colorValue: attributes.countClr,
    onColorChange: e => setAttributes({
      countClr: e
    }),
    enableAlpha: true
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalColorGradientControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('BgColor', 'taiowc'),
    colorValue: attributes.countBgClr,
    onColorChange: e => setAttributes({
      countBgClr: e
    }),
    enableAlpha: true
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ResponsiveControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Count Size', 'taiowc')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.UnitChooser, {
    value: attributes.countSizeUnit,
    onClick: countSizeUnit => {
      setAttributes({
        countSizeUnit
      });
      setcountSizeUnit(countSizeUnit);
    },
    units: ['px', 'em', '%']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    renderTooltipContent: customTooltipcountSize,
    value: getcountSize() || '',
    onChange: changecountSize,
    step: 0.1,
    min: 0,
    max: maxcountSizeUnit,
    allowReset: true
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.ResponsiveControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Count Font Size', 'taiowc')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_index_js__WEBPACK_IMPORTED_MODULE_6__.UnitChooser, {
    value: attributes.countFontSizeUnit,
    onClick: countFontSizeUnit => {
      setAttributes({
        countFontSizeUnit
      });
      setcountFontSizeUnit(countFontSizeUnit);
    },
    units: ['px', 'em', '%']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    renderTooltipContent: customTooltipcountFontSize,
    value: getcountFontSize() || '',
    onChange: changecountFontSize,
    step: 0.1,
    min: 0,
    max: maxcountFontSizeUnit,
    allowReset: true
  }))))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (InsSettings);

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
	Copyright (c) 2018 Jed Watson.
	Licensed under the MIT License (MIT), see
	http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;
	var nativeCodeString = '[native code]';

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString !== Object.prototype.toString && !arg.toString.toString().includes('[native code]')) {
					classes.push(arg.toString());
					continue;
				}

				for (var key in arg) {
					if (hasOwn.call(arg, key) && arg[key]) {
						classes.push(key);
					}
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./node_modules/dompurify/dist/purify.js":
/*!***********************************************!*\
  !*** ./node_modules/dompurify/dist/purify.js ***!
  \***********************************************/
/***/ (function(module) {

/*! @license DOMPurify 3.0.6 | (c) Cure53 and other contributors | Released under the Apache license 2.0 and Mozilla Public License 2.0 | github.com/cure53/DOMPurify/blob/3.0.6/LICENSE */

(function (global, factory) {
   true ? module.exports = factory() :
  0;
})(this, (function () { 'use strict';

  const {
    entries,
    setPrototypeOf,
    isFrozen,
    getPrototypeOf,
    getOwnPropertyDescriptor
  } = Object;
  let {
    freeze,
    seal,
    create
  } = Object; // eslint-disable-line import/no-mutable-exports

  let {
    apply,
    construct
  } = typeof Reflect !== 'undefined' && Reflect;

  if (!freeze) {
    freeze = function freeze(x) {
      return x;
    };
  }

  if (!seal) {
    seal = function seal(x) {
      return x;
    };
  }

  if (!apply) {
    apply = function apply(fun, thisValue, args) {
      return fun.apply(thisValue, args);
    };
  }

  if (!construct) {
    construct = function construct(Func, args) {
      return new Func(...args);
    };
  }

  const arrayForEach = unapply(Array.prototype.forEach);
  const arrayPop = unapply(Array.prototype.pop);
  const arrayPush = unapply(Array.prototype.push);
  const stringToLowerCase = unapply(String.prototype.toLowerCase);
  const stringToString = unapply(String.prototype.toString);
  const stringMatch = unapply(String.prototype.match);
  const stringReplace = unapply(String.prototype.replace);
  const stringIndexOf = unapply(String.prototype.indexOf);
  const stringTrim = unapply(String.prototype.trim);
  const regExpTest = unapply(RegExp.prototype.test);
  const typeErrorCreate = unconstruct(TypeError);
  /**
   * Creates a new function that calls the given function with a specified thisArg and arguments.
   *
   * @param {Function} func - The function to be wrapped and called.
   * @returns {Function} A new function that calls the given function with a specified thisArg and arguments.
   */

  function unapply(func) {
    return function (thisArg) {
      for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
        args[_key - 1] = arguments[_key];
      }

      return apply(func, thisArg, args);
    };
  }
  /**
   * Creates a new function that constructs an instance of the given constructor function with the provided arguments.
   *
   * @param {Function} func - The constructor function to be wrapped and called.
   * @returns {Function} A new function that constructs an instance of the given constructor function with the provided arguments.
   */


  function unconstruct(func) {
    return function () {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      return construct(func, args);
    };
  }
  /**
   * Add properties to a lookup table
   *
   * @param {Object} set - The set to which elements will be added.
   * @param {Array} array - The array containing elements to be added to the set.
   * @param {Function} transformCaseFunc - An optional function to transform the case of each element before adding to the set.
   * @returns {Object} The modified set with added elements.
   */


  function addToSet(set, array) {
    let transformCaseFunc = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : stringToLowerCase;

    if (setPrototypeOf) {
      // Make 'in' and truthy checks like Boolean(set.constructor)
      // independent of any properties defined on Object.prototype.
      // Prevent prototype setters from intercepting set as a this value.
      setPrototypeOf(set, null);
    }

    let l = array.length;

    while (l--) {
      let element = array[l];

      if (typeof element === 'string') {
        const lcElement = transformCaseFunc(element);

        if (lcElement !== element) {
          // Config presets (e.g. tags.js, attrs.js) are immutable.
          if (!isFrozen(array)) {
            array[l] = lcElement;
          }

          element = lcElement;
        }
      }

      set[element] = true;
    }

    return set;
  }
  /**
   * Shallow clone an object
   *
   * @param {Object} object - The object to be cloned.
   * @returns {Object} A new object that copies the original.
   */


  function clone(object) {
    const newObject = create(null);

    for (const [property, value] of entries(object)) {
      if (getOwnPropertyDescriptor(object, property) !== undefined) {
        newObject[property] = value;
      }
    }

    return newObject;
  }
  /**
   * This method automatically checks if the prop is function or getter and behaves accordingly.
   *
   * @param {Object} object - The object to look up the getter function in its prototype chain.
   * @param {String} prop - The property name for which to find the getter function.
   * @returns {Function} The getter function found in the prototype chain or a fallback function.
   */

  function lookupGetter(object, prop) {
    while (object !== null) {
      const desc = getOwnPropertyDescriptor(object, prop);

      if (desc) {
        if (desc.get) {
          return unapply(desc.get);
        }

        if (typeof desc.value === 'function') {
          return unapply(desc.value);
        }
      }

      object = getPrototypeOf(object);
    }

    function fallbackValue(element) {
      console.warn('fallback value for', element);
      return null;
    }

    return fallbackValue;
  }

  const html$1 = freeze(['a', 'abbr', 'acronym', 'address', 'area', 'article', 'aside', 'audio', 'b', 'bdi', 'bdo', 'big', 'blink', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col', 'colgroup', 'content', 'data', 'datalist', 'dd', 'decorator', 'del', 'details', 'dfn', 'dialog', 'dir', 'div', 'dl', 'dt', 'element', 'em', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'img', 'input', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'map', 'mark', 'marquee', 'menu', 'menuitem', 'meter', 'nav', 'nobr', 'ol', 'optgroup', 'option', 'output', 'p', 'picture', 'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'section', 'select', 'shadow', 'small', 'source', 'spacer', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr']); // SVG

  const svg$1 = freeze(['svg', 'a', 'altglyph', 'altglyphdef', 'altglyphitem', 'animatecolor', 'animatemotion', 'animatetransform', 'circle', 'clippath', 'defs', 'desc', 'ellipse', 'filter', 'font', 'g', 'glyph', 'glyphref', 'hkern', 'image', 'line', 'lineargradient', 'marker', 'mask', 'metadata', 'mpath', 'path', 'pattern', 'polygon', 'polyline', 'radialgradient', 'rect', 'stop', 'style', 'switch', 'symbol', 'text', 'textpath', 'title', 'tref', 'tspan', 'view', 'vkern']);
  const svgFilters = freeze(['feBlend', 'feColorMatrix', 'feComponentTransfer', 'feComposite', 'feConvolveMatrix', 'feDiffuseLighting', 'feDisplacementMap', 'feDistantLight', 'feDropShadow', 'feFlood', 'feFuncA', 'feFuncB', 'feFuncG', 'feFuncR', 'feGaussianBlur', 'feImage', 'feMerge', 'feMergeNode', 'feMorphology', 'feOffset', 'fePointLight', 'feSpecularLighting', 'feSpotLight', 'feTile', 'feTurbulence']); // List of SVG elements that are disallowed by default.
  // We still need to know them so that we can do namespace
  // checks properly in case one wants to add them to
  // allow-list.

  const svgDisallowed = freeze(['animate', 'color-profile', 'cursor', 'discard', 'font-face', 'font-face-format', 'font-face-name', 'font-face-src', 'font-face-uri', 'foreignobject', 'hatch', 'hatchpath', 'mesh', 'meshgradient', 'meshpatch', 'meshrow', 'missing-glyph', 'script', 'set', 'solidcolor', 'unknown', 'use']);
  const mathMl$1 = freeze(['math', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mspace', 'msqrt', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover', 'mprescripts']); // Similarly to SVG, we want to know all MathML elements,
  // even those that we disallow by default.

  const mathMlDisallowed = freeze(['maction', 'maligngroup', 'malignmark', 'mlongdiv', 'mscarries', 'mscarry', 'msgroup', 'mstack', 'msline', 'msrow', 'semantics', 'annotation', 'annotation-xml', 'mprescripts', 'none']);
  const text = freeze(['#text']);

  const html = freeze(['accept', 'action', 'align', 'alt', 'autocapitalize', 'autocomplete', 'autopictureinpicture', 'autoplay', 'background', 'bgcolor', 'border', 'capture', 'cellpadding', 'cellspacing', 'checked', 'cite', 'class', 'clear', 'color', 'cols', 'colspan', 'controls', 'controlslist', 'coords', 'crossorigin', 'datetime', 'decoding', 'default', 'dir', 'disabled', 'disablepictureinpicture', 'disableremoteplayback', 'download', 'draggable', 'enctype', 'enterkeyhint', 'face', 'for', 'headers', 'height', 'hidden', 'high', 'href', 'hreflang', 'id', 'inputmode', 'integrity', 'ismap', 'kind', 'label', 'lang', 'list', 'loading', 'loop', 'low', 'max', 'maxlength', 'media', 'method', 'min', 'minlength', 'multiple', 'muted', 'name', 'nonce', 'noshade', 'novalidate', 'nowrap', 'open', 'optimum', 'pattern', 'placeholder', 'playsinline', 'poster', 'preload', 'pubdate', 'radiogroup', 'readonly', 'rel', 'required', 'rev', 'reversed', 'role', 'rows', 'rowspan', 'spellcheck', 'scope', 'selected', 'shape', 'size', 'sizes', 'span', 'srclang', 'start', 'src', 'srcset', 'step', 'style', 'summary', 'tabindex', 'title', 'translate', 'type', 'usemap', 'valign', 'value', 'width', 'xmlns', 'slot']);
  const svg = freeze(['accent-height', 'accumulate', 'additive', 'alignment-baseline', 'ascent', 'attributename', 'attributetype', 'azimuth', 'basefrequency', 'baseline-shift', 'begin', 'bias', 'by', 'class', 'clip', 'clippathunits', 'clip-path', 'clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'cx', 'cy', 'd', 'dx', 'dy', 'diffuseconstant', 'direction', 'display', 'divisor', 'dur', 'edgemode', 'elevation', 'end', 'fill', 'fill-opacity', 'fill-rule', 'filter', 'filterunits', 'flood-color', 'flood-opacity', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'fx', 'fy', 'g1', 'g2', 'glyph-name', 'glyphref', 'gradientunits', 'gradienttransform', 'height', 'href', 'id', 'image-rendering', 'in', 'in2', 'k', 'k1', 'k2', 'k3', 'k4', 'kerning', 'keypoints', 'keysplines', 'keytimes', 'lang', 'lengthadjust', 'letter-spacing', 'kernelmatrix', 'kernelunitlength', 'lighting-color', 'local', 'marker-end', 'marker-mid', 'marker-start', 'markerheight', 'markerunits', 'markerwidth', 'maskcontentunits', 'maskunits', 'max', 'mask', 'media', 'method', 'mode', 'min', 'name', 'numoctaves', 'offset', 'operator', 'opacity', 'order', 'orient', 'orientation', 'origin', 'overflow', 'paint-order', 'path', 'pathlength', 'patterncontentunits', 'patterntransform', 'patternunits', 'points', 'preservealpha', 'preserveaspectratio', 'primitiveunits', 'r', 'rx', 'ry', 'radius', 'refx', 'refy', 'repeatcount', 'repeatdur', 'restart', 'result', 'rotate', 'scale', 'seed', 'shape-rendering', 'specularconstant', 'specularexponent', 'spreadmethod', 'startoffset', 'stddeviation', 'stitchtiles', 'stop-color', 'stop-opacity', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke', 'stroke-width', 'style', 'surfacescale', 'systemlanguage', 'tabindex', 'targetx', 'targety', 'transform', 'transform-origin', 'text-anchor', 'text-decoration', 'text-rendering', 'textlength', 'type', 'u1', 'u2', 'unicode', 'values', 'viewbox', 'visibility', 'version', 'vert-adv-y', 'vert-origin-x', 'vert-origin-y', 'width', 'word-spacing', 'wrap', 'writing-mode', 'xchannelselector', 'ychannelselector', 'x', 'x1', 'x2', 'xmlns', 'y', 'y1', 'y2', 'z', 'zoomandpan']);
  const mathMl = freeze(['accent', 'accentunder', 'align', 'bevelled', 'close', 'columnsalign', 'columnlines', 'columnspan', 'denomalign', 'depth', 'dir', 'display', 'displaystyle', 'encoding', 'fence', 'frame', 'height', 'href', 'id', 'largeop', 'length', 'linethickness', 'lspace', 'lquote', 'mathbackground', 'mathcolor', 'mathsize', 'mathvariant', 'maxsize', 'minsize', 'movablelimits', 'notation', 'numalign', 'open', 'rowalign', 'rowlines', 'rowspacing', 'rowspan', 'rspace', 'rquote', 'scriptlevel', 'scriptminsize', 'scriptsizemultiplier', 'selection', 'separator', 'separators', 'stretchy', 'subscriptshift', 'supscriptshift', 'symmetric', 'voffset', 'width', 'xmlns']);
  const xml = freeze(['xlink:href', 'xml:id', 'xlink:title', 'xml:space', 'xmlns:xlink']);

  const MUSTACHE_EXPR = seal(/\{\{[\w\W]*|[\w\W]*\}\}/gm); // Specify template detection regex for SAFE_FOR_TEMPLATES mode

  const ERB_EXPR = seal(/<%[\w\W]*|[\w\W]*%>/gm);
  const TMPLIT_EXPR = seal(/\${[\w\W]*}/gm);
  const DATA_ATTR = seal(/^data-[\-\w.\u00B7-\uFFFF]/); // eslint-disable-line no-useless-escape

  const ARIA_ATTR = seal(/^aria-[\-\w]+$/); // eslint-disable-line no-useless-escape

  const IS_ALLOWED_URI = seal(/^(?:(?:(?:f|ht)tps?|mailto|tel|callto|sms|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i // eslint-disable-line no-useless-escape
  );
  const IS_SCRIPT_OR_DATA = seal(/^(?:\w+script|data):/i);
  const ATTR_WHITESPACE = seal(/[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g // eslint-disable-line no-control-regex
  );
  const DOCTYPE_NAME = seal(/^html$/i);

  var EXPRESSIONS = /*#__PURE__*/Object.freeze({
    __proto__: null,
    MUSTACHE_EXPR: MUSTACHE_EXPR,
    ERB_EXPR: ERB_EXPR,
    TMPLIT_EXPR: TMPLIT_EXPR,
    DATA_ATTR: DATA_ATTR,
    ARIA_ATTR: ARIA_ATTR,
    IS_ALLOWED_URI: IS_ALLOWED_URI,
    IS_SCRIPT_OR_DATA: IS_SCRIPT_OR_DATA,
    ATTR_WHITESPACE: ATTR_WHITESPACE,
    DOCTYPE_NAME: DOCTYPE_NAME
  });

  const getGlobal = function getGlobal() {
    return typeof window === 'undefined' ? null : window;
  };
  /**
   * Creates a no-op policy for internal use only.
   * Don't export this function outside this module!
   * @param {?TrustedTypePolicyFactory} trustedTypes The policy factory.
   * @param {HTMLScriptElement} purifyHostElement The Script element used to load DOMPurify (to determine policy name suffix).
   * @return {?TrustedTypePolicy} The policy created (or null, if Trusted Types
   * are not supported or creating the policy failed).
   */


  const _createTrustedTypesPolicy = function _createTrustedTypesPolicy(trustedTypes, purifyHostElement) {
    if (typeof trustedTypes !== 'object' || typeof trustedTypes.createPolicy !== 'function') {
      return null;
    } // Allow the callers to control the unique policy name
    // by adding a data-tt-policy-suffix to the script element with the DOMPurify.
    // Policy creation with duplicate names throws in Trusted Types.


    let suffix = null;
    const ATTR_NAME = 'data-tt-policy-suffix';

    if (purifyHostElement && purifyHostElement.hasAttribute(ATTR_NAME)) {
      suffix = purifyHostElement.getAttribute(ATTR_NAME);
    }

    const policyName = 'dompurify' + (suffix ? '#' + suffix : '');

    try {
      return trustedTypes.createPolicy(policyName, {
        createHTML(html) {
          return html;
        },

        createScriptURL(scriptUrl) {
          return scriptUrl;
        }

      });
    } catch (_) {
      // Policy creation failed (most likely another DOMPurify script has
      // already run). Skip creating the policy, as this will only cause errors
      // if TT are enforced.
      console.warn('TrustedTypes policy ' + policyName + ' could not be created.');
      return null;
    }
  };

  function createDOMPurify() {
    let window = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : getGlobal();

    const DOMPurify = root => createDOMPurify(root);
    /**
     * Version label, exposed for easier checks
     * if DOMPurify is up to date or not
     */


    DOMPurify.version = '3.0.6';
    /**
     * Array of elements that DOMPurify removed during sanitation.
     * Empty if nothing was removed.
     */

    DOMPurify.removed = [];

    if (!window || !window.document || window.document.nodeType !== 9) {
      // Not running in a browser, provide a factory function
      // so that you can pass your own Window
      DOMPurify.isSupported = false;
      return DOMPurify;
    }

    let {
      document
    } = window;
    const originalDocument = document;
    const currentScript = originalDocument.currentScript;
    const {
      DocumentFragment,
      HTMLTemplateElement,
      Node,
      Element,
      NodeFilter,
      NamedNodeMap = window.NamedNodeMap || window.MozNamedAttrMap,
      HTMLFormElement,
      DOMParser,
      trustedTypes
    } = window;
    const ElementPrototype = Element.prototype;
    const cloneNode = lookupGetter(ElementPrototype, 'cloneNode');
    const getNextSibling = lookupGetter(ElementPrototype, 'nextSibling');
    const getChildNodes = lookupGetter(ElementPrototype, 'childNodes');
    const getParentNode = lookupGetter(ElementPrototype, 'parentNode'); // As per issue #47, the web-components registry is inherited by a
    // new document created via createHTMLDocument. As per the spec
    // (http://w3c.github.io/webcomponents/spec/custom/#creating-and-passing-registries)
    // a new empty registry is used when creating a template contents owner
    // document, so we use that as our parent document to ensure nothing
    // is inherited.

    if (typeof HTMLTemplateElement === 'function') {
      const template = document.createElement('template');

      if (template.content && template.content.ownerDocument) {
        document = template.content.ownerDocument;
      }
    }

    let trustedTypesPolicy;
    let emptyHTML = '';
    const {
      implementation,
      createNodeIterator,
      createDocumentFragment,
      getElementsByTagName
    } = document;
    const {
      importNode
    } = originalDocument;
    let hooks = {};
    /**
     * Expose whether this browser supports running the full DOMPurify.
     */

    DOMPurify.isSupported = typeof entries === 'function' && typeof getParentNode === 'function' && implementation && implementation.createHTMLDocument !== undefined;
    const {
      MUSTACHE_EXPR,
      ERB_EXPR,
      TMPLIT_EXPR,
      DATA_ATTR,
      ARIA_ATTR,
      IS_SCRIPT_OR_DATA,
      ATTR_WHITESPACE
    } = EXPRESSIONS;
    let {
      IS_ALLOWED_URI: IS_ALLOWED_URI$1
    } = EXPRESSIONS;
    /**
     * We consider the elements and attributes below to be safe. Ideally
     * don't add any new ones but feel free to remove unwanted ones.
     */

    /* allowed element names */

    let ALLOWED_TAGS = null;
    const DEFAULT_ALLOWED_TAGS = addToSet({}, [...html$1, ...svg$1, ...svgFilters, ...mathMl$1, ...text]);
    /* Allowed attribute names */

    let ALLOWED_ATTR = null;
    const DEFAULT_ALLOWED_ATTR = addToSet({}, [...html, ...svg, ...mathMl, ...xml]);
    /*
     * Configure how DOMPUrify should handle custom elements and their attributes as well as customized built-in elements.
     * @property {RegExp|Function|null} tagNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any custom elements)
     * @property {RegExp|Function|null} attributeNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any attributes not on the allow list)
     * @property {boolean} allowCustomizedBuiltInElements allow custom elements derived from built-ins if they pass CUSTOM_ELEMENT_HANDLING.tagNameCheck. Default: `false`.
     */

    let CUSTOM_ELEMENT_HANDLING = Object.seal(create(null, {
      tagNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      attributeNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      allowCustomizedBuiltInElements: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: false
      }
    }));
    /* Explicitly forbidden tags (overrides ALLOWED_TAGS/ADD_TAGS) */

    let FORBID_TAGS = null;
    /* Explicitly forbidden attributes (overrides ALLOWED_ATTR/ADD_ATTR) */

    let FORBID_ATTR = null;
    /* Decide if ARIA attributes are okay */

    let ALLOW_ARIA_ATTR = true;
    /* Decide if custom data attributes are okay */

    let ALLOW_DATA_ATTR = true;
    /* Decide if unknown protocols are okay */

    let ALLOW_UNKNOWN_PROTOCOLS = false;
    /* Decide if self-closing tags in attributes are allowed.
     * Usually removed due to a mXSS issue in jQuery 3.0 */

    let ALLOW_SELF_CLOSE_IN_ATTR = true;
    /* Output should be safe for common template engines.
     * This means, DOMPurify removes data attributes, mustaches and ERB
     */

    let SAFE_FOR_TEMPLATES = false;
    /* Decide if document with <html>... should be returned */

    let WHOLE_DOCUMENT = false;
    /* Track whether config is already set on this instance of DOMPurify. */

    let SET_CONFIG = false;
    /* Decide if all elements (e.g. style, script) must be children of
     * document.body. By default, browsers might move them to document.head */

    let FORCE_BODY = false;
    /* Decide if a DOM `HTMLBodyElement` should be returned, instead of a html
     * string (or a TrustedHTML object if Trusted Types are supported).
     * If `WHOLE_DOCUMENT` is enabled a `HTMLHtmlElement` will be returned instead
     */

    let RETURN_DOM = false;
    /* Decide if a DOM `DocumentFragment` should be returned, instead of a html
     * string  (or a TrustedHTML object if Trusted Types are supported) */

    let RETURN_DOM_FRAGMENT = false;
    /* Try to return a Trusted Type object instead of a string, return a string in
     * case Trusted Types are not supported  */

    let RETURN_TRUSTED_TYPE = false;
    /* Output should be free from DOM clobbering attacks?
     * This sanitizes markups named with colliding, clobberable built-in DOM APIs.
     */

    let SANITIZE_DOM = true;
    /* Achieve full DOM Clobbering protection by isolating the namespace of named
     * properties and JS variables, mitigating attacks that abuse the HTML/DOM spec rules.
     *
     * HTML/DOM spec rules that enable DOM Clobbering:
     *   - Named Access on Window (§7.3.3)
     *   - DOM Tree Accessors (§3.1.5)
     *   - Form Element Parent-Child Relations (§4.10.3)
     *   - Iframe srcdoc / Nested WindowProxies (§4.8.5)
     *   - HTMLCollection (§4.2.10.2)
     *
     * Namespace isolation is implemented by prefixing `id` and `name` attributes
     * with a constant string, i.e., `user-content-`
     */

    let SANITIZE_NAMED_PROPS = false;
    const SANITIZE_NAMED_PROPS_PREFIX = 'user-content-';
    /* Keep element content when removing element? */

    let KEEP_CONTENT = true;
    /* If a `Node` is passed to sanitize(), then performs sanitization in-place instead
     * of importing it into a new Document and returning a sanitized copy */

    let IN_PLACE = false;
    /* Allow usage of profiles like html, svg and mathMl */

    let USE_PROFILES = {};
    /* Tags to ignore content of when KEEP_CONTENT is true */

    let FORBID_CONTENTS = null;
    const DEFAULT_FORBID_CONTENTS = addToSet({}, ['annotation-xml', 'audio', 'colgroup', 'desc', 'foreignobject', 'head', 'iframe', 'math', 'mi', 'mn', 'mo', 'ms', 'mtext', 'noembed', 'noframes', 'noscript', 'plaintext', 'script', 'style', 'svg', 'template', 'thead', 'title', 'video', 'xmp']);
    /* Tags that are safe for data: URIs */

    let DATA_URI_TAGS = null;
    const DEFAULT_DATA_URI_TAGS = addToSet({}, ['audio', 'video', 'img', 'source', 'image', 'track']);
    /* Attributes safe for values like "javascript:" */

    let URI_SAFE_ATTRIBUTES = null;
    const DEFAULT_URI_SAFE_ATTRIBUTES = addToSet({}, ['alt', 'class', 'for', 'id', 'label', 'name', 'pattern', 'placeholder', 'role', 'summary', 'title', 'value', 'style', 'xmlns']);
    const MATHML_NAMESPACE = 'http://www.w3.org/1998/Math/MathML';
    const SVG_NAMESPACE = 'http://www.w3.org/2000/svg';
    const HTML_NAMESPACE = 'http://www.w3.org/1999/xhtml';
    /* Document namespace */

    let NAMESPACE = HTML_NAMESPACE;
    let IS_EMPTY_INPUT = false;
    /* Allowed XHTML+XML namespaces */

    let ALLOWED_NAMESPACES = null;
    const DEFAULT_ALLOWED_NAMESPACES = addToSet({}, [MATHML_NAMESPACE, SVG_NAMESPACE, HTML_NAMESPACE], stringToString);
    /* Parsing of strict XHTML documents */

    let PARSER_MEDIA_TYPE = null;
    const SUPPORTED_PARSER_MEDIA_TYPES = ['application/xhtml+xml', 'text/html'];
    const DEFAULT_PARSER_MEDIA_TYPE = 'text/html';
    let transformCaseFunc = null;
    /* Keep a reference to config to pass to hooks */

    let CONFIG = null;
    /* Ideally, do not touch anything below this line */

    /* ______________________________________________ */

    const formElement = document.createElement('form');

    const isRegexOrFunction = function isRegexOrFunction(testValue) {
      return testValue instanceof RegExp || testValue instanceof Function;
    };
    /**
     * _parseConfig
     *
     * @param  {Object} cfg optional config literal
     */
    // eslint-disable-next-line complexity


    const _parseConfig = function _parseConfig() {
      let cfg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

      if (CONFIG && CONFIG === cfg) {
        return;
      }
      /* Shield configuration object from tampering */


      if (!cfg || typeof cfg !== 'object') {
        cfg = {};
      }
      /* Shield configuration object from prototype pollution */


      cfg = clone(cfg);
      PARSER_MEDIA_TYPE = // eslint-disable-next-line unicorn/prefer-includes
      SUPPORTED_PARSER_MEDIA_TYPES.indexOf(cfg.PARSER_MEDIA_TYPE) === -1 ? PARSER_MEDIA_TYPE = DEFAULT_PARSER_MEDIA_TYPE : PARSER_MEDIA_TYPE = cfg.PARSER_MEDIA_TYPE; // HTML tags and attributes are not case-sensitive, converting to lowercase. Keeping XHTML as is.

      transformCaseFunc = PARSER_MEDIA_TYPE === 'application/xhtml+xml' ? stringToString : stringToLowerCase;
      /* Set configuration parameters */

      ALLOWED_TAGS = 'ALLOWED_TAGS' in cfg ? addToSet({}, cfg.ALLOWED_TAGS, transformCaseFunc) : DEFAULT_ALLOWED_TAGS;
      ALLOWED_ATTR = 'ALLOWED_ATTR' in cfg ? addToSet({}, cfg.ALLOWED_ATTR, transformCaseFunc) : DEFAULT_ALLOWED_ATTR;
      ALLOWED_NAMESPACES = 'ALLOWED_NAMESPACES' in cfg ? addToSet({}, cfg.ALLOWED_NAMESPACES, stringToString) : DEFAULT_ALLOWED_NAMESPACES;
      URI_SAFE_ATTRIBUTES = 'ADD_URI_SAFE_ATTR' in cfg ? addToSet(clone(DEFAULT_URI_SAFE_ATTRIBUTES), // eslint-disable-line indent
      cfg.ADD_URI_SAFE_ATTR, // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_URI_SAFE_ATTRIBUTES;
      DATA_URI_TAGS = 'ADD_DATA_URI_TAGS' in cfg ? addToSet(clone(DEFAULT_DATA_URI_TAGS), // eslint-disable-line indent
      cfg.ADD_DATA_URI_TAGS, // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_DATA_URI_TAGS;
      FORBID_CONTENTS = 'FORBID_CONTENTS' in cfg ? addToSet({}, cfg.FORBID_CONTENTS, transformCaseFunc) : DEFAULT_FORBID_CONTENTS;
      FORBID_TAGS = 'FORBID_TAGS' in cfg ? addToSet({}, cfg.FORBID_TAGS, transformCaseFunc) : {};
      FORBID_ATTR = 'FORBID_ATTR' in cfg ? addToSet({}, cfg.FORBID_ATTR, transformCaseFunc) : {};
      USE_PROFILES = 'USE_PROFILES' in cfg ? cfg.USE_PROFILES : false;
      ALLOW_ARIA_ATTR = cfg.ALLOW_ARIA_ATTR !== false; // Default true

      ALLOW_DATA_ATTR = cfg.ALLOW_DATA_ATTR !== false; // Default true

      ALLOW_UNKNOWN_PROTOCOLS = cfg.ALLOW_UNKNOWN_PROTOCOLS || false; // Default false

      ALLOW_SELF_CLOSE_IN_ATTR = cfg.ALLOW_SELF_CLOSE_IN_ATTR !== false; // Default true

      SAFE_FOR_TEMPLATES = cfg.SAFE_FOR_TEMPLATES || false; // Default false

      WHOLE_DOCUMENT = cfg.WHOLE_DOCUMENT || false; // Default false

      RETURN_DOM = cfg.RETURN_DOM || false; // Default false

      RETURN_DOM_FRAGMENT = cfg.RETURN_DOM_FRAGMENT || false; // Default false

      RETURN_TRUSTED_TYPE = cfg.RETURN_TRUSTED_TYPE || false; // Default false

      FORCE_BODY = cfg.FORCE_BODY || false; // Default false

      SANITIZE_DOM = cfg.SANITIZE_DOM !== false; // Default true

      SANITIZE_NAMED_PROPS = cfg.SANITIZE_NAMED_PROPS || false; // Default false

      KEEP_CONTENT = cfg.KEEP_CONTENT !== false; // Default true

      IN_PLACE = cfg.IN_PLACE || false; // Default false

      IS_ALLOWED_URI$1 = cfg.ALLOWED_URI_REGEXP || IS_ALLOWED_URI;
      NAMESPACE = cfg.NAMESPACE || HTML_NAMESPACE;
      CUSTOM_ELEMENT_HANDLING = cfg.CUSTOM_ELEMENT_HANDLING || {};

      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.tagNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck;
      }

      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.attributeNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck;
      }

      if (cfg.CUSTOM_ELEMENT_HANDLING && typeof cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements === 'boolean') {
        CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements = cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements;
      }

      if (SAFE_FOR_TEMPLATES) {
        ALLOW_DATA_ATTR = false;
      }

      if (RETURN_DOM_FRAGMENT) {
        RETURN_DOM = true;
      }
      /* Parse profile info */


      if (USE_PROFILES) {
        ALLOWED_TAGS = addToSet({}, [...text]);
        ALLOWED_ATTR = [];

        if (USE_PROFILES.html === true) {
          addToSet(ALLOWED_TAGS, html$1);
          addToSet(ALLOWED_ATTR, html);
        }

        if (USE_PROFILES.svg === true) {
          addToSet(ALLOWED_TAGS, svg$1);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }

        if (USE_PROFILES.svgFilters === true) {
          addToSet(ALLOWED_TAGS, svgFilters);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }

        if (USE_PROFILES.mathMl === true) {
          addToSet(ALLOWED_TAGS, mathMl$1);
          addToSet(ALLOWED_ATTR, mathMl);
          addToSet(ALLOWED_ATTR, xml);
        }
      }
      /* Merge configuration parameters */


      if (cfg.ADD_TAGS) {
        if (ALLOWED_TAGS === DEFAULT_ALLOWED_TAGS) {
          ALLOWED_TAGS = clone(ALLOWED_TAGS);
        }

        addToSet(ALLOWED_TAGS, cfg.ADD_TAGS, transformCaseFunc);
      }

      if (cfg.ADD_ATTR) {
        if (ALLOWED_ATTR === DEFAULT_ALLOWED_ATTR) {
          ALLOWED_ATTR = clone(ALLOWED_ATTR);
        }

        addToSet(ALLOWED_ATTR, cfg.ADD_ATTR, transformCaseFunc);
      }

      if (cfg.ADD_URI_SAFE_ATTR) {
        addToSet(URI_SAFE_ATTRIBUTES, cfg.ADD_URI_SAFE_ATTR, transformCaseFunc);
      }

      if (cfg.FORBID_CONTENTS) {
        if (FORBID_CONTENTS === DEFAULT_FORBID_CONTENTS) {
          FORBID_CONTENTS = clone(FORBID_CONTENTS);
        }

        addToSet(FORBID_CONTENTS, cfg.FORBID_CONTENTS, transformCaseFunc);
      }
      /* Add #text in case KEEP_CONTENT is set to true */


      if (KEEP_CONTENT) {
        ALLOWED_TAGS['#text'] = true;
      }
      /* Add html, head and body to ALLOWED_TAGS in case WHOLE_DOCUMENT is true */


      if (WHOLE_DOCUMENT) {
        addToSet(ALLOWED_TAGS, ['html', 'head', 'body']);
      }
      /* Add tbody to ALLOWED_TAGS in case tables are permitted, see #286, #365 */


      if (ALLOWED_TAGS.table) {
        addToSet(ALLOWED_TAGS, ['tbody']);
        delete FORBID_TAGS.tbody;
      }

      if (cfg.TRUSTED_TYPES_POLICY) {
        if (typeof cfg.TRUSTED_TYPES_POLICY.createHTML !== 'function') {
          throw typeErrorCreate('TRUSTED_TYPES_POLICY configuration option must provide a "createHTML" hook.');
        }

        if (typeof cfg.TRUSTED_TYPES_POLICY.createScriptURL !== 'function') {
          throw typeErrorCreate('TRUSTED_TYPES_POLICY configuration option must provide a "createScriptURL" hook.');
        } // Overwrite existing TrustedTypes policy.


        trustedTypesPolicy = cfg.TRUSTED_TYPES_POLICY; // Sign local variables required by `sanitize`.

        emptyHTML = trustedTypesPolicy.createHTML('');
      } else {
        // Uninitialized policy, attempt to initialize the internal dompurify policy.
        if (trustedTypesPolicy === undefined) {
          trustedTypesPolicy = _createTrustedTypesPolicy(trustedTypes, currentScript);
        } // If creating the internal policy succeeded sign internal variables.


        if (trustedTypesPolicy !== null && typeof emptyHTML === 'string') {
          emptyHTML = trustedTypesPolicy.createHTML('');
        }
      } // Prevent further manipulation of configuration.
      // Not available in IE8, Safari 5, etc.


      if (freeze) {
        freeze(cfg);
      }

      CONFIG = cfg;
    };

    const MATHML_TEXT_INTEGRATION_POINTS = addToSet({}, ['mi', 'mo', 'mn', 'ms', 'mtext']);
    const HTML_INTEGRATION_POINTS = addToSet({}, ['foreignobject', 'desc', 'title', 'annotation-xml']); // Certain elements are allowed in both SVG and HTML
    // namespace. We need to specify them explicitly
    // so that they don't get erroneously deleted from
    // HTML namespace.

    const COMMON_SVG_AND_HTML_ELEMENTS = addToSet({}, ['title', 'style', 'font', 'a', 'script']);
    /* Keep track of all possible SVG and MathML tags
     * so that we can perform the namespace checks
     * correctly. */

    const ALL_SVG_TAGS = addToSet({}, svg$1);
    addToSet(ALL_SVG_TAGS, svgFilters);
    addToSet(ALL_SVG_TAGS, svgDisallowed);
    const ALL_MATHML_TAGS = addToSet({}, mathMl$1);
    addToSet(ALL_MATHML_TAGS, mathMlDisallowed);
    /**
     * @param  {Element} element a DOM element whose namespace is being checked
     * @returns {boolean} Return false if the element has a
     *  namespace that a spec-compliant parser would never
     *  return. Return true otherwise.
     */

    const _checkValidNamespace = function _checkValidNamespace(element) {
      let parent = getParentNode(element); // In JSDOM, if we're inside shadow DOM, then parentNode
      // can be null. We just simulate parent in this case.

      if (!parent || !parent.tagName) {
        parent = {
          namespaceURI: NAMESPACE,
          tagName: 'template'
        };
      }

      const tagName = stringToLowerCase(element.tagName);
      const parentTagName = stringToLowerCase(parent.tagName);

      if (!ALLOWED_NAMESPACES[element.namespaceURI]) {
        return false;
      }

      if (element.namespaceURI === SVG_NAMESPACE) {
        // The only way to switch from HTML namespace to SVG
        // is via <svg>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'svg';
        } // The only way to switch from MathML to SVG is via`
        // svg if parent is either <annotation-xml> or MathML
        // text integration points.


        if (parent.namespaceURI === MATHML_NAMESPACE) {
          return tagName === 'svg' && (parentTagName === 'annotation-xml' || MATHML_TEXT_INTEGRATION_POINTS[parentTagName]);
        } // We only allow elements that are defined in SVG
        // spec. All others are disallowed in SVG namespace.


        return Boolean(ALL_SVG_TAGS[tagName]);
      }

      if (element.namespaceURI === MATHML_NAMESPACE) {
        // The only way to switch from HTML namespace to MathML
        // is via <math>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'math';
        } // The only way to switch from SVG to MathML is via
        // <math> and HTML integration points


        if (parent.namespaceURI === SVG_NAMESPACE) {
          return tagName === 'math' && HTML_INTEGRATION_POINTS[parentTagName];
        } // We only allow elements that are defined in MathML
        // spec. All others are disallowed in MathML namespace.


        return Boolean(ALL_MATHML_TAGS[tagName]);
      }

      if (element.namespaceURI === HTML_NAMESPACE) {
        // The only way to switch from SVG to HTML is via
        // HTML integration points, and from MathML to HTML
        // is via MathML text integration points
        if (parent.namespaceURI === SVG_NAMESPACE && !HTML_INTEGRATION_POINTS[parentTagName]) {
          return false;
        }

        if (parent.namespaceURI === MATHML_NAMESPACE && !MATHML_TEXT_INTEGRATION_POINTS[parentTagName]) {
          return false;
        } // We disallow tags that are specific for MathML
        // or SVG and should never appear in HTML namespace


        return !ALL_MATHML_TAGS[tagName] && (COMMON_SVG_AND_HTML_ELEMENTS[tagName] || !ALL_SVG_TAGS[tagName]);
      } // For XHTML and XML documents that support custom namespaces


      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && ALLOWED_NAMESPACES[element.namespaceURI]) {
        return true;
      } // The code should never reach this place (this means
      // that the element somehow got namespace that is not
      // HTML, SVG, MathML or allowed via ALLOWED_NAMESPACES).
      // Return false just in case.


      return false;
    };
    /**
     * _forceRemove
     *
     * @param  {Node} node a DOM node
     */


    const _forceRemove = function _forceRemove(node) {
      arrayPush(DOMPurify.removed, {
        element: node
      });

      try {
        // eslint-disable-next-line unicorn/prefer-dom-node-remove
        node.parentNode.removeChild(node);
      } catch (_) {
        node.remove();
      }
    };
    /**
     * _removeAttribute
     *
     * @param  {String} name an Attribute name
     * @param  {Node} node a DOM node
     */


    const _removeAttribute = function _removeAttribute(name, node) {
      try {
        arrayPush(DOMPurify.removed, {
          attribute: node.getAttributeNode(name),
          from: node
        });
      } catch (_) {
        arrayPush(DOMPurify.removed, {
          attribute: null,
          from: node
        });
      }

      node.removeAttribute(name); // We void attribute values for unremovable "is"" attributes

      if (name === 'is' && !ALLOWED_ATTR[name]) {
        if (RETURN_DOM || RETURN_DOM_FRAGMENT) {
          try {
            _forceRemove(node);
          } catch (_) {}
        } else {
          try {
            node.setAttribute(name, '');
          } catch (_) {}
        }
      }
    };
    /**
     * _initDocument
     *
     * @param  {String} dirty a string of dirty markup
     * @return {Document} a DOM, filled with the dirty markup
     */


    const _initDocument = function _initDocument(dirty) {
      /* Create a HTML document */
      let doc = null;
      let leadingWhitespace = null;

      if (FORCE_BODY) {
        dirty = '<remove></remove>' + dirty;
      } else {
        /* If FORCE_BODY isn't used, leading whitespace needs to be preserved manually */
        const matches = stringMatch(dirty, /^[\r\n\t ]+/);
        leadingWhitespace = matches && matches[0];
      }

      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && NAMESPACE === HTML_NAMESPACE) {
        // Root of XHTML doc must contain xmlns declaration (see https://www.w3.org/TR/xhtml1/normative.html#strict)
        dirty = '<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>' + dirty + '</body></html>';
      }

      const dirtyPayload = trustedTypesPolicy ? trustedTypesPolicy.createHTML(dirty) : dirty;
      /*
       * Use the DOMParser API by default, fallback later if needs be
       * DOMParser not work for svg when has multiple root element.
       */

      if (NAMESPACE === HTML_NAMESPACE) {
        try {
          doc = new DOMParser().parseFromString(dirtyPayload, PARSER_MEDIA_TYPE);
        } catch (_) {}
      }
      /* Use createHTMLDocument in case DOMParser is not available */


      if (!doc || !doc.documentElement) {
        doc = implementation.createDocument(NAMESPACE, 'template', null);

        try {
          doc.documentElement.innerHTML = IS_EMPTY_INPUT ? emptyHTML : dirtyPayload;
        } catch (_) {// Syntax error if dirtyPayload is invalid xml
        }
      }

      const body = doc.body || doc.documentElement;

      if (dirty && leadingWhitespace) {
        body.insertBefore(document.createTextNode(leadingWhitespace), body.childNodes[0] || null);
      }
      /* Work on whole document or just its body */


      if (NAMESPACE === HTML_NAMESPACE) {
        return getElementsByTagName.call(doc, WHOLE_DOCUMENT ? 'html' : 'body')[0];
      }

      return WHOLE_DOCUMENT ? doc.documentElement : body;
    };
    /**
     * Creates a NodeIterator object that you can use to traverse filtered lists of nodes or elements in a document.
     *
     * @param  {Node} root The root element or node to start traversing on.
     * @return {NodeIterator} The created NodeIterator
     */


    const _createNodeIterator = function _createNodeIterator(root) {
      return createNodeIterator.call(root.ownerDocument || root, root, // eslint-disable-next-line no-bitwise
      NodeFilter.SHOW_ELEMENT | NodeFilter.SHOW_COMMENT | NodeFilter.SHOW_TEXT, null);
    };
    /**
     * _isClobbered
     *
     * @param  {Node} elm element to check for clobbering attacks
     * @return {Boolean} true if clobbered, false if safe
     */


    const _isClobbered = function _isClobbered(elm) {
      return elm instanceof HTMLFormElement && (typeof elm.nodeName !== 'string' || typeof elm.textContent !== 'string' || typeof elm.removeChild !== 'function' || !(elm.attributes instanceof NamedNodeMap) || typeof elm.removeAttribute !== 'function' || typeof elm.setAttribute !== 'function' || typeof elm.namespaceURI !== 'string' || typeof elm.insertBefore !== 'function' || typeof elm.hasChildNodes !== 'function');
    };
    /**
     * Checks whether the given object is a DOM node.
     *
     * @param  {Node} object object to check whether it's a DOM node
     * @return {Boolean} true is object is a DOM node
     */


    const _isNode = function _isNode(object) {
      return typeof Node === 'function' && object instanceof Node;
    };
    /**
     * _executeHook
     * Execute user configurable hooks
     *
     * @param  {String} entryPoint  Name of the hook's entry point
     * @param  {Node} currentNode node to work on with the hook
     * @param  {Object} data additional hook parameters
     */


    const _executeHook = function _executeHook(entryPoint, currentNode, data) {
      if (!hooks[entryPoint]) {
        return;
      }

      arrayForEach(hooks[entryPoint], hook => {
        hook.call(DOMPurify, currentNode, data, CONFIG);
      });
    };
    /**
     * _sanitizeElements
     *
     * @protect nodeName
     * @protect textContent
     * @protect removeChild
     *
     * @param   {Node} currentNode to check for permission to exist
     * @return  {Boolean} true if node was killed, false if left alive
     */


    const _sanitizeElements = function _sanitizeElements(currentNode) {
      let content = null;
      /* Execute a hook if present */

      _executeHook('beforeSanitizeElements', currentNode, null);
      /* Check if element is clobbered or can clobber */


      if (_isClobbered(currentNode)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Now let's check the element's type and name */


      const tagName = transformCaseFunc(currentNode.nodeName);
      /* Execute a hook if present */

      _executeHook('uponSanitizeElement', currentNode, {
        tagName,
        allowedTags: ALLOWED_TAGS
      });
      /* Detect mXSS attempts abusing namespace confusion */


      if (currentNode.hasChildNodes() && !_isNode(currentNode.firstElementChild) && regExpTest(/<[/\w]/g, currentNode.innerHTML) && regExpTest(/<[/\w]/g, currentNode.textContent)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Remove element if anything forbids its presence */


      if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
        /* Check if we have a custom element to handle */
        if (!FORBID_TAGS[tagName] && _isBasicCustomElement(tagName)) {
          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, tagName)) {
            return false;
          }

          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(tagName)) {
            return false;
          }
        }
        /* Keep content except for bad-listed elements */


        if (KEEP_CONTENT && !FORBID_CONTENTS[tagName]) {
          const parentNode = getParentNode(currentNode) || currentNode.parentNode;
          const childNodes = getChildNodes(currentNode) || currentNode.childNodes;

          if (childNodes && parentNode) {
            const childCount = childNodes.length;

            for (let i = childCount - 1; i >= 0; --i) {
              parentNode.insertBefore(cloneNode(childNodes[i], true), getNextSibling(currentNode));
            }
          }
        }

        _forceRemove(currentNode);

        return true;
      }
      /* Check whether element has a valid namespace */


      if (currentNode instanceof Element && !_checkValidNamespace(currentNode)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Make sure that older browsers don't get fallback-tag mXSS */


      if ((tagName === 'noscript' || tagName === 'noembed' || tagName === 'noframes') && regExpTest(/<\/no(script|embed|frames)/i, currentNode.innerHTML)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Sanitize element content to be template-safe */


      if (SAFE_FOR_TEMPLATES && currentNode.nodeType === 3) {
        /* Get the element's text content */
        content = currentNode.textContent;
        arrayForEach([MUSTACHE_EXPR, ERB_EXPR, TMPLIT_EXPR], expr => {
          content = stringReplace(content, expr, ' ');
        });

        if (currentNode.textContent !== content) {
          arrayPush(DOMPurify.removed, {
            element: currentNode.cloneNode()
          });
          currentNode.textContent = content;
        }
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeElements', currentNode, null);

      return false;
    };
    /**
     * _isValidAttribute
     *
     * @param  {string} lcTag Lowercase tag name of containing element.
     * @param  {string} lcName Lowercase attribute name.
     * @param  {string} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid, otherwise false.
     */
    // eslint-disable-next-line complexity


    const _isValidAttribute = function _isValidAttribute(lcTag, lcName, value) {
      /* Make sure attribute cannot clobber */
      if (SANITIZE_DOM && (lcName === 'id' || lcName === 'name') && (value in document || value in formElement)) {
        return false;
      }
      /* Allow valid data-* attributes: At least one character after "-"
          (https://html.spec.whatwg.org/multipage/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes)
          XML-compatible (https://html.spec.whatwg.org/multipage/infrastructure.html#xml-compatible and http://www.w3.org/TR/xml/#d0e804)
          We don't need to check the value; it's always URI safe. */


      if (ALLOW_DATA_ATTR && !FORBID_ATTR[lcName] && regExpTest(DATA_ATTR, lcName)) ; else if (ALLOW_ARIA_ATTR && regExpTest(ARIA_ATTR, lcName)) ; else if (!ALLOWED_ATTR[lcName] || FORBID_ATTR[lcName]) {
        if ( // First condition does a very basic check if a) it's basically a valid custom element tagname AND
        // b) if the tagName passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        // and c) if the attribute name passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.attributeNameCheck
        _isBasicCustomElement(lcTag) && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, lcTag) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(lcTag)) && (CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.attributeNameCheck, lcName) || CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.attributeNameCheck(lcName)) || // Alternative, second condition checks if it's an `is`-attribute, AND
        // the value passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        lcName === 'is' && CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, value) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(value))) ; else {
          return false;
        }
        /* Check value is safe. First, is attr inert? If so, is safe */

      } else if (URI_SAFE_ATTRIBUTES[lcName]) ; else if (regExpTest(IS_ALLOWED_URI$1, stringReplace(value, ATTR_WHITESPACE, ''))) ; else if ((lcName === 'src' || lcName === 'xlink:href' || lcName === 'href') && lcTag !== 'script' && stringIndexOf(value, 'data:') === 0 && DATA_URI_TAGS[lcTag]) ; else if (ALLOW_UNKNOWN_PROTOCOLS && !regExpTest(IS_SCRIPT_OR_DATA, stringReplace(value, ATTR_WHITESPACE, ''))) ; else if (value) {
        return false;
      } else ;

      return true;
    };
    /**
     * _isBasicCustomElement
     * checks if at least one dash is included in tagName, and it's not the first char
     * for more sophisticated checking see https://github.com/sindresorhus/validate-element-name
     *
     * @param {string} tagName name of the tag of the node to sanitize
     * @returns {boolean} Returns true if the tag name meets the basic criteria for a custom element, otherwise false.
     */


    const _isBasicCustomElement = function _isBasicCustomElement(tagName) {
      return tagName.indexOf('-') > 0;
    };
    /**
     * _sanitizeAttributes
     *
     * @protect attributes
     * @protect nodeName
     * @protect removeAttribute
     * @protect setAttribute
     *
     * @param  {Node} currentNode to sanitize
     */


    const _sanitizeAttributes = function _sanitizeAttributes(currentNode) {
      /* Execute a hook if present */
      _executeHook('beforeSanitizeAttributes', currentNode, null);

      const {
        attributes
      } = currentNode;
      /* Check if we have attributes; if not we might have a text node */

      if (!attributes) {
        return;
      }

      const hookEvent = {
        attrName: '',
        attrValue: '',
        keepAttr: true,
        allowedAttributes: ALLOWED_ATTR
      };
      let l = attributes.length;
      /* Go backwards over all attributes; safely remove bad ones */

      while (l--) {
        const attr = attributes[l];
        const {
          name,
          namespaceURI,
          value: attrValue
        } = attr;
        const lcName = transformCaseFunc(name);
        let value = name === 'value' ? attrValue : stringTrim(attrValue);
        /* Execute a hook if present */

        hookEvent.attrName = lcName;
        hookEvent.attrValue = value;
        hookEvent.keepAttr = true;
        hookEvent.forceKeepAttr = undefined; // Allows developers to see this is a property they can set

        _executeHook('uponSanitizeAttribute', currentNode, hookEvent);

        value = hookEvent.attrValue;
        /* Did the hooks approve of the attribute? */

        if (hookEvent.forceKeepAttr) {
          continue;
        }
        /* Remove attribute */


        _removeAttribute(name, currentNode);
        /* Did the hooks approve of the attribute? */


        if (!hookEvent.keepAttr) {
          continue;
        }
        /* Work around a security issue in jQuery 3.0 */


        if (!ALLOW_SELF_CLOSE_IN_ATTR && regExpTest(/\/>/i, value)) {
          _removeAttribute(name, currentNode);

          continue;
        }
        /* Sanitize attribute content to be template-safe */


        if (SAFE_FOR_TEMPLATES) {
          arrayForEach([MUSTACHE_EXPR, ERB_EXPR, TMPLIT_EXPR], expr => {
            value = stringReplace(value, expr, ' ');
          });
        }
        /* Is `value` valid for this attribute? */


        const lcTag = transformCaseFunc(currentNode.nodeName);

        if (!_isValidAttribute(lcTag, lcName, value)) {
          continue;
        }
        /* Full DOM Clobbering protection via namespace isolation,
         * Prefix id and name attributes with `user-content-`
         */


        if (SANITIZE_NAMED_PROPS && (lcName === 'id' || lcName === 'name')) {
          // Remove the attribute with this value
          _removeAttribute(name, currentNode); // Prefix the value and later re-create the attribute with the sanitized value


          value = SANITIZE_NAMED_PROPS_PREFIX + value;
        }
        /* Handle attributes that require Trusted Types */


        if (trustedTypesPolicy && typeof trustedTypes === 'object' && typeof trustedTypes.getAttributeType === 'function') {
          if (namespaceURI) ; else {
            switch (trustedTypes.getAttributeType(lcTag, lcName)) {
              case 'TrustedHTML':
                {
                  value = trustedTypesPolicy.createHTML(value);
                  break;
                }

              case 'TrustedScriptURL':
                {
                  value = trustedTypesPolicy.createScriptURL(value);
                  break;
                }
            }
          }
        }
        /* Handle invalid data-* attribute set by try-catching it */


        try {
          if (namespaceURI) {
            currentNode.setAttributeNS(namespaceURI, name, value);
          } else {
            /* Fallback to setAttribute() for browser-unrecognized namespaces e.g. "x-schema". */
            currentNode.setAttribute(name, value);
          }

          arrayPop(DOMPurify.removed);
        } catch (_) {}
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeAttributes', currentNode, null);
    };
    /**
     * _sanitizeShadowDOM
     *
     * @param  {DocumentFragment} fragment to iterate over recursively
     */


    const _sanitizeShadowDOM = function _sanitizeShadowDOM(fragment) {
      let shadowNode = null;

      const shadowIterator = _createNodeIterator(fragment);
      /* Execute a hook if present */


      _executeHook('beforeSanitizeShadowDOM', fragment, null);

      while (shadowNode = shadowIterator.nextNode()) {
        /* Execute a hook if present */
        _executeHook('uponSanitizeShadowNode', shadowNode, null);
        /* Sanitize tags and elements */


        if (_sanitizeElements(shadowNode)) {
          continue;
        }
        /* Deep shadow DOM detected */


        if (shadowNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(shadowNode.content);
        }
        /* Check attributes, sanitize if necessary */


        _sanitizeAttributes(shadowNode);
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeShadowDOM', fragment, null);
    };
    /**
     * Sanitize
     * Public method providing core sanitation functionality
     *
     * @param {String|Node} dirty string or DOM node
     * @param {Object} cfg object
     */
    // eslint-disable-next-line complexity


    DOMPurify.sanitize = function (dirty) {
      let cfg = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      let body = null;
      let importedNode = null;
      let currentNode = null;
      let returnNode = null;
      /* Make sure we have a string to sanitize.
        DO NOT return early, as this will return the wrong type if
        the user has requested a DOM object rather than a string */

      IS_EMPTY_INPUT = !dirty;

      if (IS_EMPTY_INPUT) {
        dirty = '<!-->';
      }
      /* Stringify, in case dirty is an object */


      if (typeof dirty !== 'string' && !_isNode(dirty)) {
        if (typeof dirty.toString === 'function') {
          dirty = dirty.toString();

          if (typeof dirty !== 'string') {
            throw typeErrorCreate('dirty is not a string, aborting');
          }
        } else {
          throw typeErrorCreate('toString is not a function');
        }
      }
      /* Return dirty HTML if DOMPurify cannot run */


      if (!DOMPurify.isSupported) {
        return dirty;
      }
      /* Assign config vars */


      if (!SET_CONFIG) {
        _parseConfig(cfg);
      }
      /* Clean up removed elements */


      DOMPurify.removed = [];
      /* Check if dirty is correctly typed for IN_PLACE */

      if (typeof dirty === 'string') {
        IN_PLACE = false;
      }

      if (IN_PLACE) {
        /* Do some early pre-sanitization to avoid unsafe root nodes */
        if (dirty.nodeName) {
          const tagName = transformCaseFunc(dirty.nodeName);

          if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
            throw typeErrorCreate('root node is forbidden and cannot be sanitized in-place');
          }
        }
      } else if (dirty instanceof Node) {
        /* If dirty is a DOM element, append to an empty document to avoid
           elements being stripped by the parser */
        body = _initDocument('<!---->');
        importedNode = body.ownerDocument.importNode(dirty, true);

        if (importedNode.nodeType === 1 && importedNode.nodeName === 'BODY') {
          /* Node is already a body, use as is */
          body = importedNode;
        } else if (importedNode.nodeName === 'HTML') {
          body = importedNode;
        } else {
          // eslint-disable-next-line unicorn/prefer-dom-node-append
          body.appendChild(importedNode);
        }
      } else {
        /* Exit directly if we have nothing to do */
        if (!RETURN_DOM && !SAFE_FOR_TEMPLATES && !WHOLE_DOCUMENT && // eslint-disable-next-line unicorn/prefer-includes
        dirty.indexOf('<') === -1) {
          return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(dirty) : dirty;
        }
        /* Initialize the document to work on */


        body = _initDocument(dirty);
        /* Check we have a DOM node from the data */

        if (!body) {
          return RETURN_DOM ? null : RETURN_TRUSTED_TYPE ? emptyHTML : '';
        }
      }
      /* Remove first element node (ours) if FORCE_BODY is set */


      if (body && FORCE_BODY) {
        _forceRemove(body.firstChild);
      }
      /* Get node iterator */


      const nodeIterator = _createNodeIterator(IN_PLACE ? dirty : body);
      /* Now start iterating over the created document */


      while (currentNode = nodeIterator.nextNode()) {
        /* Sanitize tags and elements */
        if (_sanitizeElements(currentNode)) {
          continue;
        }
        /* Shadow DOM detected, sanitize it */


        if (currentNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(currentNode.content);
        }
        /* Check attributes, sanitize if necessary */


        _sanitizeAttributes(currentNode);
      }
      /* If we sanitized `dirty` in-place, return it. */


      if (IN_PLACE) {
        return dirty;
      }
      /* Return sanitized string or DOM */


      if (RETURN_DOM) {
        if (RETURN_DOM_FRAGMENT) {
          returnNode = createDocumentFragment.call(body.ownerDocument);

          while (body.firstChild) {
            // eslint-disable-next-line unicorn/prefer-dom-node-append
            returnNode.appendChild(body.firstChild);
          }
        } else {
          returnNode = body;
        }

        if (ALLOWED_ATTR.shadowroot || ALLOWED_ATTR.shadowrootmode) {
          /*
            AdoptNode() is not used because internal state is not reset
            (e.g. the past names map of a HTMLFormElement), this is safe
            in theory but we would rather not risk another attack vector.
            The state that is cloned by importNode() is explicitly defined
            by the specs.
          */
          returnNode = importNode.call(originalDocument, returnNode, true);
        }

        return returnNode;
      }

      let serializedHTML = WHOLE_DOCUMENT ? body.outerHTML : body.innerHTML;
      /* Serialize doctype if allowed */

      if (WHOLE_DOCUMENT && ALLOWED_TAGS['!doctype'] && body.ownerDocument && body.ownerDocument.doctype && body.ownerDocument.doctype.name && regExpTest(DOCTYPE_NAME, body.ownerDocument.doctype.name)) {
        serializedHTML = '<!DOCTYPE ' + body.ownerDocument.doctype.name + '>\n' + serializedHTML;
      }
      /* Sanitize final string template-safe */


      if (SAFE_FOR_TEMPLATES) {
        arrayForEach([MUSTACHE_EXPR, ERB_EXPR, TMPLIT_EXPR], expr => {
          serializedHTML = stringReplace(serializedHTML, expr, ' ');
        });
      }

      return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(serializedHTML) : serializedHTML;
    };
    /**
     * Public method to set the configuration once
     * setConfig
     *
     * @param {Object} cfg configuration object
     */


    DOMPurify.setConfig = function () {
      let cfg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

      _parseConfig(cfg);

      SET_CONFIG = true;
    };
    /**
     * Public method to remove the configuration
     * clearConfig
     *
     */


    DOMPurify.clearConfig = function () {
      CONFIG = null;
      SET_CONFIG = false;
    };
    /**
     * Public method to check if an attribute value is valid.
     * Uses last set config, if any. Otherwise, uses config defaults.
     * isValidAttribute
     *
     * @param  {String} tag Tag name of containing element.
     * @param  {String} attr Attribute name.
     * @param  {String} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid. Otherwise, returns false.
     */


    DOMPurify.isValidAttribute = function (tag, attr, value) {
      /* Initialize shared config vars if necessary. */
      if (!CONFIG) {
        _parseConfig({});
      }

      const lcTag = transformCaseFunc(tag);
      const lcName = transformCaseFunc(attr);
      return _isValidAttribute(lcTag, lcName, value);
    };
    /**
     * AddHook
     * Public method to add DOMPurify hooks
     *
     * @param {String} entryPoint entry point for the hook to add
     * @param {Function} hookFunction function to execute
     */


    DOMPurify.addHook = function (entryPoint, hookFunction) {
      if (typeof hookFunction !== 'function') {
        return;
      }

      hooks[entryPoint] = hooks[entryPoint] || [];
      arrayPush(hooks[entryPoint], hookFunction);
    };
    /**
     * RemoveHook
     * Public method to remove a DOMPurify hook at a given entryPoint
     * (pops it from the stack of hooks if more are present)
     *
     * @param {String} entryPoint entry point for the hook to remove
     * @return {Function} removed(popped) hook
     */


    DOMPurify.removeHook = function (entryPoint) {
      if (hooks[entryPoint]) {
        return arrayPop(hooks[entryPoint]);
      }
    };
    /**
     * RemoveHooks
     * Public method to remove all DOMPurify hooks at a given entryPoint
     *
     * @param  {String} entryPoint entry point for the hooks to remove
     */


    DOMPurify.removeHooks = function (entryPoint) {
      if (hooks[entryPoint]) {
        hooks[entryPoint] = [];
      }
    };
    /**
     * RemoveAllHooks
     * Public method to remove all DOMPurify hooks
     */


    DOMPurify.removeAllHooks = function () {
      hooks = {};
    };

    return DOMPurify;
  }

  var purify = createDOMPurify();

  return purify;

}));
//# sourceMappingURL=purify.js.map


/***/ }),

/***/ "./node_modules/hex-rgba/index.js":
/*!****************************************!*\
  !*** ./node_modules/hex-rgba/index.js ***!
  \****************************************/
/***/ ((module) => {

"use strict";


function hexToRgba(hex, opacity){
  var opacity = opacity || 100;
  var hex = hex.replace('#', '');
  if(hex.length === 6) {
    var r = parseInt(hex.substring(0, 2), 16);
    var g = parseInt(hex.substring(2, 4), 16);
    var b = parseInt(hex.substring(4, 6), 16);
  } else {
    var rd = hex.substring(0, 1) + hex.substring(0, 1);
    var gd = hex.substring(1, 2) + hex.substring(1, 2);
    var bd = hex.substring(2, 3) + hex.substring(2, 3);
    var r = parseInt(rd, 16);
    var g = parseInt(gd, 16);
    var b = parseInt(bd, 16);
  }

  return 'rgba(' + r + ', ' + g + ', ' + b + ', ' + opacity / 100 + ')';
};

module.exports = hexToRgba;

/***/ }),

/***/ "./src/block/taiowc/editor.scss":
/*!**************************************!*\
  !*** ./src/block/taiowc/editor.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/block/taiowc/style.scss":
/*!*************************************!*\
  !*** ./src/block/taiowc/style.scss ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "lodash":
/*!*************************!*\
  !*** external "lodash" ***!
  \*************************/
/***/ ((module) => {

"use strict";
module.exports = window["lodash"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/compose":
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["compose"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/hooks":
/*!*******************************!*\
  !*** external ["wp","hooks"] ***!
  \*******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["hooks"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/primitives":
/*!************************************!*\
  !*** external ["wp","primitives"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["primitives"];

/***/ }),

/***/ "./src/block/taiowc/block.json":
/*!*************************************!*\
  !*** ./src/block/taiowc/block.json ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"taiowc/taiowc","version":"0.1.0","title":"All In One Woo Cart","category":"taiowc","description":"","supports":{"html":false},"textdomain":"taiowc","attributes":{"id":{"type":"string"},"uniqueID":{"type":"string"},"cartStyle":{"type":"string","default":"[taiowc]"},"cartPrice":{"type":"boolean","default":true},"cartCount":{"type":"boolean","default":true},"countPosition":{"type":"string","default":"left"},"marginType":{"type":"string","default":"linked"},"marginTypeTablet":{"type":"string","default":"linked"},"marginTypeMobile":{"type":"string","default":"linked"},"margin":{"type":"number","default":0},"marginUnit":{"type":"string","default":"px"},"marginTablet":{"type":"number"},"marginMobile":{"type":"number"},"marginTop":{"type":"number","default":0},"marginTopTablet":{"type":"number"},"marginTopMobile":{"type":"number"},"marginBottom":{"type":"number","default":0},"marginBottomTablet":{"type":"number"},"marginBottomMobile":{"type":"number"},"marginRight":{"type":"number","default":0},"marginRightTablet":{"type":"number"},"marginRightMobile":{"type":"number"},"marginLeft":{"type":"number","default":0},"marginLeftTablet":{"type":"number"},"marginLeftMobile":{"type":"number"},"paddingType":{"type":"string","default":"linked"},"paddingTypeTablet":{"type":"string","default":"linked"},"paddingTypeMobile":{"type":"string","default":"linked"},"padding":{"type":"number"},"paddingUnit":{"type":"string","default":"px"},"paddingTablet":{"type":"number"},"paddingMobile":{"type":"number"},"paddingTop":{"type":"number","default":0},"paddingTopTablet":{"type":"number"},"paddingTopMobile":{"type":"number"},"paddingRight":{"type":"number","default":0},"paddingRightTablet":{"type":"number"},"paddingRightMobile":{"type":"number"},"paddingBottom":{"type":"number","default":0},"paddingBottomTablet":{"type":"number"},"paddingBottomMobile":{"type":"number"},"paddingLeft":{"type":"number","default":0},"paddingLeftTablet":{"type":"number"},"paddingLeftMobile":{"type":"number"},"bgSet":{"type":"boolean","default":false},"cartBgClr":{"type":"string"},"iconSet":{"type":"boolean","default":false},"iconClr":{"type":"string"},"priceSet":{"type":"boolean","default":false},"priceClr":{"type":"string"},"countSet":{"type":"boolean","default":false},"countClr":{"type":"string"},"countBgClr":{"type":"string"},"iconfontSize":{"type":"number"},"iconfontSizeTablet":{"type":"number"},"iconfontSizeMobile":{"type":"number"},"iconfontSizeUnit":{"type":"string","default":"px"},"pricefontSize":{"type":"number"},"pricefontSizeTablet":{"type":"number"},"pricefontSizeMobile":{"type":"number"},"pricefontSizeUnit":{"type":"string","default":"px"},"countSize":{"type":"number"},"countSizeTablet":{"type":"number"},"countSizeMobile":{"type":"number"},"countSizeUnit":{"type":"string","default":"px"},"countFontSize":{"type":"number"},"countFontSizeTablet":{"type":"number"},"countFontSizeMobile":{"type":"number"},"countFontSizeUnit":{"type":"string","default":"px"},"borderRadius":{"type":"number"},"borderRadiusTablet":{"type":"number"},"borderRadiusMobile":{"type":"number"},"borderRadiusUnit":{"type":"string","default":"px"}}}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"taiowc": 0,
/******/ 			"./style-taiowc": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunktaiowc"] = globalThis["webpackChunktaiowc"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-taiowc"], () => (__webpack_require__("./src/block/taiowc/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=taiowc.js.map