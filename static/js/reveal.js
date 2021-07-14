!function(){"use strict";function c(b){return"undefined"==typeof this||Object.getPrototypeOf(this)!==c.prototype?new c(b):(a=this,a.version="3.3.1",a.tools=new z,a.isSupported()?(a.tools.extend(a.defaults,b||{}),d(a.defaults),a.store={elements:{},containers:[]},a.sequences={},a.history=[],a.uid=0,a.initialized=!1):"undefined"!=typeof console&&null!==console&&console.log("ScrollReveal is not supported in this browser."),a)}function d(b){if(b&&b.container){if("string"==typeof b.container)return window.document.documentElement.querySelector(b.container);if(a.tools.isNode(b.container))return b.container;console.log('ScrollReveal: invalid container "'+b.container+'" provided.'),console.log("ScrollReveal: falling back to default container.")}return a.defaults.container}function e(b,c){return"string"==typeof b?Array.prototype.slice.call(c.querySelectorAll(b)):a.tools.isNode(b)?[b]:a.tools.isNodeList(b)?Array.prototype.slice.call(b):[]}function f(){return++a.uid}function g(b,c,d){c.container&&(c.container=d),b.config?b.config=a.tools.extendClone(b.config,c):b.config=a.tools.extendClone(a.defaults,c),"top"===b.config.origin||"bottom"===b.config.origin?b.config.axis="Y":b.config.axis="X"}function h(a){var b=window.getComputedStyle(a.domEl);a.styles||(a.styles={transition:{},transform:{},computed:{}},a.styles.inline=a.domEl.getAttribute("style")||"",a.styles.inline+="; visibility: visible; ",a.styles.computed.opacity=b.opacity,b.transition&&"all 0s ease 0s"!==b.transition?a.styles.computed.transition=b.transition+", ":a.styles.computed.transition=""),a.styles.transition.instant=i(a,0),a.styles.transition.delayed=i(a,a.config.delay),a.styles.transform.initial=" -webkit-transform:",a.styles.transform.target=" -webkit-transform:",j(a),a.styles.transform.initial+="transform:",a.styles.transform.target+="transform:",j(a)}function i(a,b){var c=a.config;return"-webkit-transition: "+a.styles.computed.transition+"-webkit-transform "+c.duration/1e3+"s "+c.easing+" "+b/1e3+"s, opacity "+c.duration/1e3+"s "+c.easing+" "+b/1e3+"s; transition: "+a.styles.computed.transition+"transform "+c.duration/1e3+"s "+c.easing+" "+b/1e3+"s, opacity "+c.duration/1e3+"s "+c.easing+" "+b/1e3+"s; "}function j(a){var c,b=a.config,d=a.styles.transform;c="top"===b.origin||"left"===b.origin?/^-/.test(b.distance)?b.distance.substr(1):"-"+b.distance:b.distance,parseInt(b.distance)&&(d.initial+=" translate"+b.axis+"("+c+")",d.target+=" translate"+b.axis+"(0)"),b.scale&&(d.initial+=" scale("+b.scale+")",d.target+=" scale(1)"),b.rotate.x&&(d.initial+=" rotateX("+b.rotate.x+"deg)",d.target+=" rotateX(0)"),b.rotate.y&&(d.initial+=" rotateY("+b.rotate.y+"deg)",d.target+=" rotateY(0)"),b.rotate.z&&(d.initial+=" rotateZ("+b.rotate.z+"deg)",d.target+=" rotateZ(0)"),d.initial+="; opacity: "+b.opacity+";",d.target+="; opacity: "+a.styles.computed.opacity+";"}function k(b){var c=b.config.container;c&&a.store.containers.indexOf(c)===-1&&a.store.containers.push(b.config.container),a.store.elements[b.id]=b}function l(b,c,d){var e={target:b,config:c,interval:d};a.history.push(e)}function m(){if(a.isSupported()){p();for(var b=0;b<a.store.containers.length;b++)a.store.containers[b].addEventListener("scroll",n),a.store.containers[b].addEventListener("resize",n);a.initialized||(window.addEventListener("scroll",n),window.addEventListener("resize",n),a.initialized=!0)}return a}function n(){b(p)}function o(){var b,c,d,e;a.tools.forOwn(a.sequences,function(f){e=a.sequences[f],b=!1;for(var g=0;g<e.elemIds.length;g++)d=e.elemIds[g],c=a.store.elements[d],y(c)&&!b&&(b=!0);e.active=b})}function p(){var b,c;o(),a.tools.forOwn(a.store.elements,function(d){c=a.store.elements[d],b=t(c),s(c)?(c.config.beforeReveal(c.domEl),b?c.domEl.setAttribute("style",c.styles.inline+c.styles.transform.target+c.styles.transition.delayed):c.domEl.setAttribute("style",c.styles.inline+c.styles.transform.target+c.styles.transition.instant),r("reveal",c,b),c.revealing=!0,c.seen=!0,c.sequence&&q(c,b)):u(c)&&(c.config.beforeReset(c.domEl),c.domEl.setAttribute("style",c.styles.inline+c.styles.transform.initial+c.styles.transition.instant),r("reset",c),c.revealing=!1)})}function q(b,c){var d=0,e=0,f=a.sequences[b.sequence.id];f.blocked=!0,c&&"onload"===b.config.useDelay&&(e=b.config.delay),b.sequence.timer&&(d=Math.abs(b.sequence.timer.started-new Date),window.clearTimeout(b.sequence.timer)),b.sequence.timer={started:new Date},b.sequence.timer.clock=window.setTimeout(function(){f.blocked=!1,b.sequence.timer=null,n()},Math.abs(f.interval)+e-d)}function r(a,b,c){var d=0,e=0,f="after";switch(a){case"reveal":e=b.config.duration,c&&(e+=b.config.delay),f+="Reveal";break;case"reset":e=b.config.duration,f+="Reset"}b.timer&&(d=Math.abs(b.timer.started-new Date),window.clearTimeout(b.timer.clock)),b.timer={started:new Date},b.timer.clock=window.setTimeout(function(){b.config[f](b.domEl),b.timer=null},e-d)}function s(b){if(b.sequence){var c=a.sequences[b.sequence.id];return c.active&&!c.blocked&&!b.revealing&&!b.disabled}return y(b)&&!b.revealing&&!b.disabled}function t(b){var c=b.config.useDelay;return"always"===c||"onload"===c&&!a.initialized||"once"===c&&!b.seen}function u(b){if(b.sequence){var c=a.sequences[b.sequence.id];return!c.active&&b.config.reset&&b.revealing&&!b.disabled}return!y(b)&&b.config.reset&&b.revealing&&!b.disabled}function v(a){return{width:a.clientWidth,height:a.clientHeight}}function w(a){if(a&&a!==window.document.documentElement){var b=x(a);return{x:a.scrollLeft+b.left,y:a.scrollTop+b.top}}return{x:window.pageXOffset,y:window.pageYOffset}}function x(a){var b=0,c=0,d=a.offsetHeight,e=a.offsetWidth;do isNaN(a.offsetTop)||(b+=a.offsetTop),isNaN(a.offsetLeft)||(c+=a.offsetLeft),a=a.offsetParent;while(a);return{top:b,left:c,height:d,width:e}}function y(a){function l(){var b=h+f*e,l=i+g*e,m=j-f*e,n=k-g*e,o=d.y+a.config.viewOffset.top,p=d.x+a.config.viewOffset.left,q=d.y-a.config.viewOffset.bottom+c.height,r=d.x-a.config.viewOffset.right+c.width;return b<q&&m>o&&l>p&&n<r}function m(){return"fixed"===window.getComputedStyle(a.domEl).position}var b=x(a.domEl),c=v(a.config.container),d=w(a.config.container),e=a.config.viewFactor,f=b.height,g=b.width,h=b.top,i=b.left,j=h+f,k=i+g;return l()||m()}function z(){}var a,b;c.prototype.defaults={origin:"bottom",distance:"20px",duration:500,delay:0,rotate:{x:0,y:0,z:0},opacity:0,scale:.9,easing:"cubic-bezier(0.6, 0.2, 0.1, 1)",container:window.document.documentElement,mobile:!0,reset:!1,useDelay:"always",viewFactor:.2,viewOffset:{top:0,right:0,bottom:0,left:0},beforeReveal:function(a){},beforeReset:function(a){},afterReveal:function(a){},afterReset:function(a){}},c.prototype.isSupported=function(){var a=document.documentElement.style;return"WebkitTransition"in a&&"WebkitTransform"in a||"transition"in a&&"transform"in a},c.prototype.reveal=function(b,c,i,j){var n,o,p,q,r,s;if(void 0!==c&&"number"==typeof c?(i=c,c={}):void 0!==c&&null!==c||(c={}),n=d(c),o=e(b,n),!o.length)return console.log('ScrollReveal: reveal on "'+b+'" failed, no elements found.'),a;i&&"number"==typeof i&&(s=f(),r=a.sequences[s]={id:s,interval:i,elemIds:[],active:!1});for(var t=0;t<o.length;t++)q=o[t].getAttribute("data-sr-id"),q?p=a.store.elements[q]:(p={id:f(),domEl:o[t],seen:!1,revealing:!1},p.domEl.setAttribute("data-sr-id",p.id)),r&&(p.sequence={id:r.id,index:r.elemIds.length},r.elemIds.push(p.id)),g(p,c,n),h(p),k(p),a.tools.isMobile()&&!p.config.mobile||!a.isSupported()?(p.domEl.setAttribute("style",p.styles.inline),p.disabled=!0):p.revealing||p.domEl.setAttribute("style",p.styles.inline+p.styles.transform.initial);return!j&&a.isSupported()&&(l(b,c,i),a.initTimeout&&window.clearTimeout(a.initTimeout),a.initTimeout=window.setTimeout(m,0)),a},c.prototype.sync=function(){if(a.history.length&&a.isSupported()){for(var b=0;b<a.history.length;b++){var c=a.history[b];a.reveal(c.target,c.config,c.interval,!0)}m()}else console.log("ScrollReveal: sync failed, no reveals found.");return a},z.prototype.isObject=function(a){return null!==a&&"object"==typeof a&&a.constructor===Object},z.prototype.isNode=function(a){return"object"==typeof window.Node?a instanceof window.Node:a&&"object"==typeof a&&"number"==typeof a.nodeType&&"string"==typeof a.nodeName},z.prototype.isNodeList=function(a){var b=Object.prototype.toString.call(a),c=/^\[object (HTMLCollection|NodeList|Object)\]$/;return"object"==typeof window.NodeList?a instanceof window.NodeList:a&&"object"==typeof a&&c.test(b)&&"number"==typeof a.length&&(0===a.length||this.isNode(a[0]))},z.prototype.forOwn=function(a,b){if(!this.isObject(a))throw new TypeError('Expected "object", but received "'+typeof a+'".');for(var c in a)a.hasOwnProperty(c)&&b(c)},z.prototype.extend=function(a,b){return this.forOwn(b,function(c){this.isObject(b[c])?(a[c]&&this.isObject(a[c])||(a[c]={}),this.extend(a[c],b[c])):a[c]=b[c]}.bind(this)),a},z.prototype.extendClone=function(a,b){return this.extend(this.extend({},a),b)},z.prototype.isMobile=function(){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)},b=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(a){window.setTimeout(a,1e3/60)},"function"==typeof define&&"object"==typeof define.amd&&define.amd?define(function(){return c}):"undefined"!=typeof module&&module.exports?module.exports=c:window.ScrollReveal=c}();
