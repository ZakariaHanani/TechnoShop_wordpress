/**
 * Front-end Scripts.
 *
 * Scripts for Front-end pages.
 *
 * @since 1.0.0
 *
 * @package Fusion
 */

//Button collapse text toggle
jQuery(document).ready(function() {
	var buttonCollapseToggles = jQuery('a[data-toggle="collapse"][data-label-show][data-label-hide]');
	buttonCollapseToggles.each(function() {
		var button = jQuery(this);
		if (button.children().length == 0) {
			var target = button.attr('href');
			var targetObject = jQuery(target);
			var labelShow = button.attr('data-label-show');
			var labelHide = button.attr('data-label-hide');
			targetObject.on('show.bs.collapse', function () {
				button.text(labelHide);
			});
			targetObject.on('hide.bs.collapse', function () {
				button.text(labelShow);
			});
		}
	});
});

//set images
jQuery(window).on('load.fusion', function() {
	var size = jQuery('body').attr('data-view');
	ADimageSwap(size);
});


/**
 * Tabs
 */

//set resize event on tab change
jQuery(document).ready(function() {
	var tabShowInterval;
	jQuery('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
		tabShowInterval = setInterval(function(){
			jQuery(window).trigger('resize');
		},10);
	});
	jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		setTimeout(function(){
			clearInterval(tabShowInterval);
		}, 1000);
	});
});

//deep linking
jQuery(window).on('load.fusion', function() {
	var targetID = window.location.hash
	var targetTabTrigger = jQuery('a[data-toggle="tab"][href="'+ targetID +'"]');
	if (targetTabTrigger.length > 0) {
		var offset = fsnTabsGetOffset(targetTabTrigger);
		setTimeout(function() {
			jQuery(window).scrollTop(offset);
		}, 100);
		targetTabTrigger.trigger('click');
	}
});

//control tabs from WordPress menus
jQuery(document).ready(function() {
	jQuery('body').on('click.fusion', '.menu-item-type-custom > a', function(e) {
		if (e.target.hash != '') {
			var targetTabTrigger = jQuery('a[data-toggle="tab"][href="'+ e.target.hash +'"]');
			if (targetTabTrigger.length > 0) {
				e.preventDefault();
				var offset = fsnTabsGetOffset(targetTabTrigger);
				jQuery(window).scrollTop(offset);
				targetTabTrigger.trigger('click');
				//update hash
				if (Modernizr.history) {
					history.replaceState(null, null, e.target.hash);
				}
				//collapse mobile nav menu
				var mobileNavMenu = jQuery(e.target).closest('.navbar-collapse');
				if (mobileNavMenu.length > 0 && mobileNavMenu.is('.in')) {
					mobileNavMenu.collapse('hide');
				}
			}
		}
	});
});

function fsnTabsGetOffset(targetTabTrigger) {
	if (jQuery('body').hasClass('admin-bar') && jQuery(window).width() >= 768) {
		var offset = targetTabTrigger.offset().top - 132;
	} else {
		var offset = targetTabTrigger.offset().top - 100;
	}
	if (jQuery(window).width() >= 768 && jQuery('.locking-menu').length > 0) {
		offset = offset - 80;
	}
	return offset;
}


/**
* Modals
*/

//Set focus on modal when shown
jQuery(document).ready(function() {
  var modals = jQuery('.modal');
  modals.each(function() {
    var modal = jQuery(this);
    modal.on('shown.bs.modal', function () {
      jQuery(this).find('.modal-dialog .close').focus();
    })
  });
});

/**
 * JavaScript Media Queries
 */

//initialize enquire.js and necessary polyfills
jQuery(document).ready(function() {
	/* MediaMatch v.2.0.2 - Testing css media queries in Javascript. Authors & copyright (c) 2013: WebLinc, David Knight. */
	if (!Modernizr.matchmedia) {
		window.matchMedia||(window.matchMedia=function(c){var a=c.document,w=a.documentElement,l=[],t=0,x="",h={},G=/\s*(only|not)?\s*(screen|print|[a-z\-]+)\s*(and)?\s*/i,H=/^\s*\(\s*(-[a-z]+-)?(min-|max-)?([a-z\-]+)\s*(:?\s*([0-9]+(\.[0-9]+)?|portrait|landscape)(px|em|dppx|dpcm|rem|%|in|cm|mm|ex|pt|pc|\/([0-9]+(\.[0-9]+)?))?)?\s*\)\s*$/,y=0,A=function(b){var z=-1!==b.indexOf(",")&&b.split(",")||[b],e=z.length-1,j=e,g=null,d=null,c="",a=0,l=!1,m="",f="",g=null,d=0,f=null,k="",p="",q="",n="",r="",k=!1;if(""===
		b)return!0;do{g=z[j-e];l=!1;if(d=g.match(G))c=d[0],a=d.index;if(!d||-1===g.substring(0,a).indexOf("(")&&(a||!d[3]&&c!==d.input))k=!1;else{f=g;l="not"===d[1];a||(m=d[2],f=g.substring(c.length));k=m===x||"all"===m||""===m;g=-1!==f.indexOf(" and ")&&f.split(" and ")||[f];d=g.length-1;if(k&&0<=d&&""!==f){do{f=g[d].match(H);if(!f||!h[f[3]]){k=!1;break}k=f[2];n=p=f[5];q=f[7];r=h[f[3]];q&&(n="px"===q?Number(p):"em"===q||"rem"===q?16*p:f[8]?(p/f[8]).toFixed(2):"dppx"===q?96*p:"dpcm"===q?0.3937*p:Number(p));
		k="min-"===k&&n?r>=n:"max-"===k&&n?r<=n:n?r===n:!!r;if(!k)break}while(d--)}if(k)break}}while(e--);return l?!k:k},B=function(){var b=c.innerWidth||w.clientWidth,a=c.innerHeight||w.clientHeight,e=c.screen.width,j=c.screen.height,g=c.screen.colorDepth,d=c.devicePixelRatio;h.width=b;h.height=a;h["aspect-ratio"]=(b/a).toFixed(2);h["device-width"]=e;h["device-height"]=j;h["device-aspect-ratio"]=(e/j).toFixed(2);h.color=g;h["color-index"]=Math.pow(2,g);h.orientation=a>=b?"portrait":"landscape";h.resolution=
		d&&96*d||c.screen.deviceXDPI||96;h["device-pixel-ratio"]=d||1},C=function(){clearTimeout(y);y=setTimeout(function(){var b=null,a=t-1,e=a,j=!1;if(0<=a){B();do if(b=l[e-a])if((j=A(b.mql.media))&&!b.mql.matches||!j&&b.mql.matches)if(b.mql.matches=j,b.listeners)for(var j=0,g=b.listeners.length;j<g;j++)b.listeners[j]&&b.listeners[j].call(c,b.mql);while(a--)}},10)},D=a.getElementsByTagName("head")[0],a=a.createElement("style"),E=null,u="screen print speech projection handheld tv braille embossed tty".split(" "),
		m=0,I=u.length,s="#mediamatchjs { position: relative; z-index: 0; }",v="",F=c.addEventListener||(v="on")&&c.attachEvent;a.type="text/css";a.id="mediamatchjs";D.appendChild(a);for(E=c.getComputedStyle&&c.getComputedStyle(a)||a.currentStyle;m<I;m++)s+="@media "+u[m]+" { #mediamatchjs { position: relative; z-index: "+m+" } }";a.styleSheet?a.styleSheet.cssText=s:a.textContent=s;x=u[1*E.zIndex||0];D.removeChild(a);B();F(v+"resize",C);F(v+"orientationchange",C);return function(a){var c=t,e={matches:!1,
		media:a,addListener:function(a){l[c].listeners||(l[c].listeners=[]);a&&l[c].listeners.push(a)},removeListener:function(a){var b=l[c],d=0,e=0;if(b)for(e=b.listeners.length;d<e;d++)b.listeners[d]===a&&b.listeners.splice(d,1)}};if(""===a)return e.matches=!0,e;e.matches=A(a);t=l.push({mql:e,listeners:null});return e}}(window));
	}
	fsnInitEnquireJS();
});

function fsnInitEnquireJS() {
if (typeof enquire != 'function') {
/*!
 * enquire.js v2.1.0 - Awesome Media Queries in JavaScript
 * Copyright (c) 2013 Nick Williams - http://wicky.nillia.ms/enquire.js
 * License: MIT (http://www.opensource.org/licenses/mit-license.php)
 */

(function(t,i,n){var e=i.matchMedia;"undefined"!=typeof module&&module.exports?module.exports=n(e):"function"==typeof define&&define.amd?define(function(){return i[t]=n(e)}):i[t]=n(e)})("enquire",this,function(t){"use strict";function i(t,i){var n,e=0,s=t.length;for(e;s>e&&(n=i(t[e],e),n!==!1);e++);}function n(t){return"[object Array]"===Object.prototype.toString.apply(t)}function e(t){return"function"==typeof t}function s(t){this.options=t,!t.deferSetup&&this.setup()}function o(i,n){this.query=i,this.isUnconditional=n,this.handlers=[],this.mql=t(i);var e=this;this.listener=function(t){e.mql=t,e.assess()},this.mql.addListener(this.listener)}function r(){if(!t)throw Error("matchMedia not present, legacy browsers require a polyfill");this.queries={},this.browserIsIncapable=!t("only all").matches}return s.prototype={setup:function(){this.options.setup&&this.options.setup(),this.initialised=!0},on:function(){!this.initialised&&this.setup(),this.options.match&&this.options.match()},off:function(){this.options.unmatch&&this.options.unmatch()},destroy:function(){this.options.destroy?this.options.destroy():this.off()},equals:function(t){return this.options===t||this.options.match===t}},o.prototype={addHandler:function(t){var i=new s(t);this.handlers.push(i),this.matches()&&i.on()},removeHandler:function(t){var n=this.handlers;i(n,function(i,e){return i.equals(t)?(i.destroy(),!n.splice(e,1)):void 0})},matches:function(){return this.mql.matches||this.isUnconditional},clear:function(){i(this.handlers,function(t){t.destroy()}),this.mql.removeListener(this.listener),this.handlers.length=0},assess:function(){var t=this.matches()?"on":"off";i(this.handlers,function(i){i[t]()})}},r.prototype={register:function(t,s,r){var h=this.queries,u=r&&this.browserIsIncapable;return h[t]||(h[t]=new o(t,u)),e(s)&&(s={match:s}),n(s)||(s=[s]),i(s,function(i){h[t].addHandler(i)}),this},unregister:function(t,i){var n=this.queries[t];return n&&(i?n.removeHandler(i):(n.clear(),delete this.queries[t])),this}},new r});

}

	//desktop version
	enquire.register("screen and (min-width: 768px)", {
		match : function() {
			//desktop functions go here
			setViewport('desktop');
		},
		unmatch : function() {
			//mobile functions go here
			setViewport('mobile');
		}
	});

}

//add body attribute hook
function setViewport(size) {
	jQuery('body').attr('data-view',size);
	ADimageSwap(size);
}

//update images
function ADimageSwap(size) {
	//create json object
	var $images = jQuery('.ad-dynamic-image');
	$images.each(function() {
		var image = jQuery(this);
		var imageData = image.data('image-json');
		switch(size) {
			case 'mobile':
				var imageSrc = imageData.mobile_src;
				var imageWidth = imageData.mobile_width;
				var imageHeight = imageData.mobile_height;
				break;
			case 'desktop':
				var imageSrc = imageData.desktop_src;
				var imageWidth = imageData.desktop_width;
				var imageHeight = imageData.desktop_height;
				break;
		}
		image.attr('src', imageSrc);
		image.attr('width', imageWidth);
		image.attr('height', imageHeight);
		jQuery(window).imagesLoaded(function() {
			jQuery('body').trigger('imagesSwapped.fsn');
		});
	});
}
