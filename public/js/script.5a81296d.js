parcelRequire=function(e,r,t,n){var i,o="function"==typeof parcelRequire&&parcelRequire,u="function"==typeof require&&require;function f(t,n){if(!r[t]){if(!e[t]){var i="function"==typeof parcelRequire&&parcelRequire;if(!n&&i)return i(t,!0);if(o)return o(t,!0);if(u&&"string"==typeof t)return u(t);var c=new Error("Cannot find module '"+t+"'");throw c.code="MODULE_NOT_FOUND",c}p.resolve=function(r){return e[t][1][r]||r},p.cache={};var l=r[t]=new f.Module(t);e[t][0].call(l.exports,p,l,l.exports,this)}return r[t].exports;function p(e){return f(p.resolve(e))}}f.isParcelRequire=!0,f.Module=function(e){this.id=e,this.bundle=f,this.exports={}},f.modules=e,f.cache=r,f.parent=o,f.register=function(r,t){e[r]=[function(e,r){r.exports=t},{}]};for(var c=0;c<t.length;c++)try{f(t[c])}catch(e){i||(i=e)}if(t.length){var l=f(t[t.length-1]);"object"==typeof exports&&"undefined"!=typeof module?module.exports=l:"function"==typeof define&&define.amd?define(function(){return l}):n&&(this[n]=l)}if(parcelRequire=f,i)throw i;return f}({"iAAF":[function(require,module,exports) {
        module.exports="/slider-arrow.2c114611.svg";
    },{}],"PnOg":[function(require,module,exports) {
        module.exports="/slider-arrow-prev.3865e0a9.svg";
    },{}],"HfbA":[function(require,module,exports) {
        module.exports="/cosplayer-arrow.45e1cef2.svg";
    },{}],"hQWJ":[function(require,module,exports) {
        "use strict";var e=i(require("../assets//icons/slider-arrow.svg")),t=i(require("../assets//icons/slider-arrow-prev.svg")),s=i(require("../assets//icons/cosplayer-arrow.svg"));function i(e){return e&&e.__esModule?e:{default:e}}$("#pro-accounts-slider").slick({slidesToShow:3,slidesToScroll:3,prevArrow:'<button class="slick-prev"><img src="'.concat(t.default,'"/></button>'),nextArrow:'<button class="slick-next"><img src="'.concat(e.default,'"/></button>'),responsive:[{breakpoint:1200,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:560,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".timeline-item").hover(function(){$(".timeline-item").children(".timeline-item__body").removeClass("active"),$(this).children(".timeline-item__body").addClass("active")});var n=".input-field__input-wrapper",o=".input-field__input";$(o).on("focus",function(){$(this).parent(n).addClass("focus")}),$(o).on("blur",function(){$(this).parent(n).removeClass("focus")}),$(".input-field__hint").on("click",function(){var e=$(this).parent(".input-field__hints").parent();e.children(o).val($(this).text()),e.removeClass("focus")}),$("#header-menu").on("click",function(e){var t=$(e.target);(t.parent("[data-close]").length||t.attr("data-close"))&&$(this).removeClass("open")}),$("#menu-open-btn").on("click",function(){$("#header-menu").toggleClass("open")}),$(".tab__close-btn").on("click",function(e){$(this).parent(".tab__header").parent(".tab").toggleClass("open")}),$(".tabs-header .tab-button").on("click",function(e){var t=$(this).attr("data-tab");$(".tabs-body .c-tab").removeClass("open"),$(".tabs-header .tab-button").removeClass("active"),$(this).addClass("active"),$(t).addClass("open")});
    },{"../assets//icons/slider-arrow.svg":"iAAF","../assets//icons/slider-arrow-prev.svg":"PnOg","../assets//icons/cosplayer-arrow.svg":"HfbA"}]},{},["hQWJ"], null)
//# sourceMappingURL=/script.105eb6a9.js.map
