parcelRequire=function(e,r,t,n){var i,o="function"==typeof parcelRequire&&parcelRequire,u="function"==typeof require&&require;function f(t,n){if(!r[t]){if(!e[t]){var i="function"==typeof parcelRequire&&parcelRequire;if(!n&&i)return i(t,!0);if(o)return o(t,!0);if(u&&"string"==typeof t)return u(t);var c=new Error("Cannot find module '"+t+"'");throw c.code="MODULE_NOT_FOUND",c}p.resolve=function(r){return e[t][1][r]||r},p.cache={};var l=r[t]=new f.Module(t);e[t][0].call(l.exports,p,l,l.exports,this)}return r[t].exports;function p(e){return f(p.resolve(e))}}f.isParcelRequire=!0,f.Module=function(e){this.id=e,this.bundle=f,this.exports={}},f.modules=e,f.cache=r,f.parent=o,f.register=function(r,t){e[r]=[function(e,r){r.exports=t},{}]};for(var c=0;c<t.length;c++)try{f(t[c])}catch(e){i||(i=e)}if(t.length){var l=f(t[t.length-1]);"object"==typeof exports&&"undefined"!=typeof module?module.exports=l:"function"==typeof define&&define.amd?define(function(){return l}):n&&(this[n]=l)}if(parcelRequire=f,i)throw i;return f}({"rcfm":[function(require,module,exports) {
"use strict";Object.defineProperty(exports,"__esModule",{value:!0}),exports.messages=exports.chats=void 0;var e=[{id:1,chatId:1,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",message:"Все спасибо, договорились",messageCount:3},{id:2,chatId:2,icon:"https://i.pinimg.com/236x/3a/1a/44/3a1a449385ed7958127a30ee4965fc33--final-fantasy-xv-anime-cosplay.jpg?nii=t",name:"Иван Иванов",message:"Привет, я бы хотел обсудиь с тобой одно дело. Интересует ?",messageCount:1},{id:3,chatId:3,icon:"https://i01.fotocdn.net/s128/697c1056cbeddc9f/gallery_s/2895056403.jpg",name:"Дадзай Осаму",message:"Да спасибо, я всем доволен",messageCount:0}];exports.chats=e;var c=[{id:1,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",messages:[{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:1,icon:"https://i.pinimg.com/736x/35/b0/31/35b03135ce7a9791e9406170a20fd1c3.jpg",name:"Saber",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Привет!"},{userId:1,icon:"https://i.pinimg.com/736x/35/b0/31/35b03135ce7a9791e9406170a20fd1c3.jpg",name:"Saber",text:"Привет!"},{userId:2,icon:"https://i.pinimg.com/736x/e7/7d/9c/e77d9cac7c1f915ba67bcb6534563630.jpg",name:"Илья Алпатов",text:"Все спасибо, договорились"}]},{id:2,icon:"https://i.pinimg.com/236x/3a/1a/44/3a1a449385ed7958127a30ee4965fc33--final-fantasy-xv-anime-cosplay.jpg?nii=t",name:"Иван Иванов",messages:[{userId:2,icon:"https://i.pinimg.com/236x/3a/1a/44/3a1a449385ed7958127a30ee4965fc33--final-fantasy-xv-anime-cosplay.jpg?nii=t",name:"Иван Иванов",text:"Привет, я бы хотел обсудиь с тобой одно дело. Интересует ?"}]},{id:3,icon:"https://i01.fotocdn.net/s128/697c1056cbeddc9f/gallery_s/2895056403.jpg",name:"Дадзай Осаму",messages:[{userId:2,icon:"https://i01.fotocdn.net/s128/697c1056cbeddc9f/gallery_s/2895056403.jpg",name:"Дадзай Осаму",text:"Да спасибо, я всем доволен"}]}];exports.messages=c;
},{}],"QI9O":[function(require,module,exports) {
"use strict";Object.defineProperty(exports,"__esModule",{value:!0}),exports.getMessagesByChatId=exports.getChats=exports.fetchComment=void 0;var e=require("./data/chats"),t=function(e){return new Promise(function(t,n){var s={icon:"https://i.pinimg.com/736x/35/b0/31/35b03135ce7a9791e9406170a20fd1c3.jpg",name:"Saber",link:"https://www.pinterest.ru/pin/112027109474781346/",text:e};setTimeout(function(){t(s)},400)})};exports.fetchComment=t;var n=function(){return new Promise(function(t,n){setTimeout(function(){t(e.chats)},800)})};exports.getChats=n;var s=function(t){return new Promise(function(n,s){var r=e.messages.find(function(e){return e.id==t})||[];setTimeout(function(){n(r)})})};exports.getMessagesByChatId=s;
},{"./data/chats":"rcfm"}],"D8nB":[function(require,module,exports) {
"use strict";var t=require("./services/chat"),a=$("#chat-form"),e=$(".chat-content"),c=a.children("#chat-input"),n=a.children("#chat-submit"),i=$("#chat-body__list"),s=$("#chat-body"),o=$("#chat-sidebar"),d=$("#chat-preloader "),r=$("#chat-header"),l=$("#btn-sidebar");function h(t){c.prop("disabled",t),n.prop("disabled",t)}function m(a){var e=o.children("[data-chatid]"),c=o.children('[data-chatid="'.concat(a,'"]'));c&&($(".chat-messanger-preloader").fadeOut(),e.removeClass("active"),c.addClass("active"),c.children(".chat-item__body").children(".chat-item__message-count").fadeOut(),(0,t.getMessagesByChatId)(a).then(function(t){i.html(" "),console.log(i),v(t.icon,t.name),g(t.messages)}))}function v(t,a){var e=$("#chat-img"),c=$("#chat-title");e.attr("src",t),c.text(a)}function u(t,a,e,c,n){var i=document.createElement("div");return i.classList.add("chat-sidebar__item"),i.classList.add("chat-item"),i.dataset.chatid=t,i.innerHTML='\n    <div class="chat-item__image ibg"> <img src="'.concat(a,'" alt="cosplayer"></div>\n    <div class="chat-item__body">\n        <div class="chat-item__title">').concat(e,'</div>\n        <div class="chat-item__message">').concat(c,"</div>\n        ").concat(n?'<div class="chat-item__message-count">'.concat(n,"</div>"):"","\n    </div>\n  "),i}function g(t){var a=t.map(function(t){return f(t.icon,t.name,t.link,t.text)});i.append(a),s.scrollTop(i.height())}function _(t,a,e,c){var n=f(t,a,e,c);i.append(n),s.scrollTop(i.height())}function f(t,a,e,c){var n=document.createElement("div");return n.classList.add("message"),n.innerHTML='\n          <a class="message__img ibg" href="'.concat(e,'"> <img src="').concat(t,'" alt="cosplayer"></a>\n          <div class="message__content"> <a class="message__name" href="').concat(e,'">').concat(a,'</a>\n          <div class="message__text">').concat(c,"</div>\n    "),n}(0,t.getChats)().then(function(t){var a=t.map(function(t){return u(t.chatId,t.icon,t.name,t.message,t.messageCount)});o.append(a),d.remove()}),a.on("submit",function(a){a.preventDefault();var e=c.val();e.trim()&&(h(!0),(0,t.fetchComment)(e).then(function(t){h(!1),c.val(""),_(t.icon,t.name,t.link,t.text)}))}),l.on("click",function(){}),o.on("click",function(t){var a=$(t.target);a&&a.data("chatid")&&m(a.data("chatid"))}),o.on("click",".chat-item",function(){e.removeClass("active")}),l.on("click",function(){e.addClass("active")});
},{"./services/chat":"QI9O"}]},{},["D8nB"], null)
//# sourceMappingURL=/chat.a5e31bfa.js.map