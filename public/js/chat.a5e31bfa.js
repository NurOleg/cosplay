// modules are defined as an array
// [ module function, map of requires ]
//
// map of requires is short require name -> numeric require
//
// anything defined in a previous bundle is accessed via the
// orig method which is the require for previous bundles
parcelRequire = (function (modules, cache, entry, globalName) {
    // Save the require from previous bundle to this closure if any
    var previousRequire = typeof parcelRequire === 'function' && parcelRequire;
    var nodeRequire = typeof require === 'function' && require;

    function newRequire(name, jumped) {
        if (!cache[name]) {
            if (!modules[name]) {
                // if we cannot find the module within our internal map or
                // cache jump to the current global require ie. the last bundle
                // that was added to the page.
                var currentRequire = typeof parcelRequire === 'function' && parcelRequire;
                if (!jumped && currentRequire) {
                    return currentRequire(name, true);
                }

                // If there are other bundles on this page the require from the
                // previous one is saved to 'previousRequire'. Repeat this as
                // many times as there are bundles until the module is found or
                // we exhaust the require chain.
                if (previousRequire) {
                    return previousRequire(name, true);
                }

                // Try the node require function if it exists.
                if (nodeRequire && typeof name === 'string') {
                    return nodeRequire(name);
                }

                var err = new Error('Cannot find module \'' + name + '\'');
                err.code = 'MODULE_NOT_FOUND';
                throw err;
            }

            localRequire.resolve = resolve;
            localRequire.cache = {};

            var module = cache[name] = new newRequire.Module(name);

            modules[name][0].call(module.exports, localRequire, module, module.exports, this);
        }

        return cache[name].exports;

        function localRequire(x){
            return newRequire(localRequire.resolve(x));
        }

        function resolve(x){
            return modules[name][1][x] || x;
        }
    }

    function Module(moduleName) {
        this.id = moduleName;
        this.bundle = newRequire;
        this.exports = {};
    }

    newRequire.isParcelRequire = true;
    newRequire.Module = Module;
    newRequire.modules = modules;
    newRequire.cache = cache;
    newRequire.parent = previousRequire;
    newRequire.register = function (id, exports) {
        modules[id] = [function (require, module) {
            module.exports = exports;
        }, {}];
    };

    var error;
    for (var i = 0; i < entry.length; i++) {
        try {
            newRequire(entry[i]);
        } catch (e) {
            // Save first error but execute all entries
            if (!error) {
                error = e;
            }
        }
    }

    if (entry.length) {
        // Expose entry point to Node, AMD or browser globals
        // Based on https://github.com/ForbesLindesay/umd/blob/master/template.js
        var mainExports = newRequire(entry[entry.length - 1]);

        // CommonJS
        if (typeof exports === "object" && typeof module !== "undefined") {
            module.exports = mainExports;

            // RequireJS
        } else if (typeof define === "function" && define.amd) {
            define(function () {
                return mainExports;
            });

            // <script>
        } else if (globalName) {
            this[globalName] = mainExports;
        }
    }

    // Override the current require with this new one
    parcelRequire = newRequire;

    if (error) {
        // throw error from earlier, _after updating parcelRequire_
        throw error;
    }

    return newRequire;
})({"../assets/image/no-photo.jpg":[function(require,module,exports) {
        module.exports = "/no-photo.02bc0e46.jpg";
    },{}],"../script/services/constants/index.js":[function(require,module,exports) {
        "use strict";

        Object.defineProperty(exports, "__esModule", {
            value: true
        });
        exports.REQUEST_TIME = exports.defaultLink = exports.DEV_MODE = exports.TEST_COOKIE_SESSION = exports.API_URL = void 0;
        var DEV_MODE = true;
        exports.DEV_MODE = DEV_MODE;
        var API_URL = "http://127.0.0.1:8000/personal/api/chats";
        exports.API_URL = API_URL;
        var TEST_COOKIE_SESSION = "\neyJpdiI6IlVSU29tWk8veHA3RUg0eldUN1Axd0E9PSIsInZhbHVlIjoiYzE5Y0J3cWNkSjNhYVFqRjhxS0pNSE5XWWhQREhSVkNVWWoxRTB4UEtMRzJtMWhUVEorNzkzem1vR25SMjZNVlN4citHdFNYc0t1QjRMOHZ2RlRMam5LcWFyVDVkajJxNkJNWEc4L1UrVkFhSTNsSG1HOUZNSFhidTBoemxjZ1kiLCJtYWMiOiIxZTVhODkxNTgxZmYzYTVkNDIyZTAxZWIzNGViZTYxYjk3MmM5MzBkMzYzMjM0ODMyNWNhZDBiMTFjMjg3M2NhIn0%3D";
        exports.TEST_COOKIE_SESSION = TEST_COOKIE_SESSION;
        var REQUEST_TIME = 3 * 1000;
        exports.REQUEST_TIME = REQUEST_TIME;
        var defaultLink = "google.com";
        exports.defaultLink = defaultLink;
    },{}],"../script/services/data/chatsData.js":[function(require,module,exports) {
        "use strict";

        Object.defineProperty(exports, "__esModule", {
            value: true
        });
        exports.currentChat = exports.chats = void 0;
        var chats = {
            chats: [{
                id: "40426aaf-fed9-45bc-8df3-490ee0d7f399",
                customer_id: 4,
                executant_id: 2,
                created_at: "2021-07-08T09:43:21.000000Z",
                updated_at: "2021-07-08T09:43:21.000000Z",
                executant_unreaded_messages_count: 46,
                customer_unreaded_messages_count: 0,
                user: {
                    id: 6,
                    email: "iliarazni@gmail.com",
                    name: "Влад Первый",
                    phone: "+79313417955",
                    password: "$2y$10$NYTobhiojTvjCSy8PTg2detJwexf5SvbTKpGVT3i9Pvb9PsX3ney6",
                    organization: "Моя организация",
                    country: "Россия",
                    description: "аваавааывывывы",
                    created_at: "2021-07-04T11:53:49.000000Z",
                    updated_at: "2021-07-04T11:56:47.000000Z",
                    remember_token: null,
                    city_id: 3,
                    image: {
                        id: 24,
                        path: null,
                        order: 1,
                        imageable_type: "App\\Models\\Customer",
                        imageable_id: 4,
                        created_at: "2021-07-04T11:57:29.000000Z",
                        updated_at: "2021-07-04T11:57:29.000000Z"
                    }
                },
                messages: [{
                    id: 21,
                    customer_id: 4,
                    executant_id: null,
                    message: "Привет!",
                    created_at: "2021-07-08T09:43:21.000000Z",
                    updated_at: "2021-07-08T09:43:21.000000Z",
                    chat_id: "40426aaf-fed9-45bc-8df3-490ee0d7f398"
                }]
            }, {
                id: "40426aaf-fed9-45bc-8df3-490ee0d7f398",
                customer_id: 4,
                executant_id: 2,
                created_at: "2021-07-08T09:43:21.000000Z",
                updated_at: "2021-07-08T09:43:21.000000Z",
                executant_unreaded_messages_count: 1,
                customer_unreaded_messages_count: 0,
                user: {
                    id: 4,
                    email: "iliarazni@gmail.com",
                    name: "Влад Второй",
                    phone: "+79313417955",
                    password: "$2y$10$NYTobhiojTvjCSy8PTg2detJwexf5SvbTKpGVT3i9Pvb9PsX3ney6",
                    organization: "Моя организация",
                    country: "Россия",
                    description: "аваавааывывывы",
                    created_at: "2021-07-04T11:53:49.000000Z",
                    updated_at: "2021-07-04T11:56:47.000000Z",
                    remember_token: null,
                    city_id: 3,
                    image: {
                        id: 24,
                        path: "https://pbs.twimg.com/media/E1jEQaqX0AQlTx4.jpg",
                        order: 1,
                        imageable_type: "App\\Models\\Customer",
                        imageable_id: 4,
                        created_at: "2021-07-04T11:57:29.000000Z",
                        updated_at: "2021-07-04T11:57:29.000000Z"
                    }
                },
                messages: [{
                    id: 21,
                    customer_id: 4,
                    executant_id: null,
                    message: "Ну как, договорились ?",
                    created_at: "2021-07-08T09:43:21.000000Z",
                    updated_at: "2021-07-08T09:43:21.000000Z",
                    chat_id: "40426aaf-fed9-45bc-8df3-490ee0d7f398"
                }, {
                    id: 21,
                    customer_id: 2,
                    executant_id: null,
                    message: "Думаю да",
                    created_at: "2021-07-08T09:43:21.000000Z",
                    updated_at: "2021-07-08T09:43:21.000000Z",
                    chat_id: "40426aaf-fed9-45bc-8df3-490ee0d7f398"
                }]
            }],
            currentUser: {
                id: 2,
                email: "admin@admin.ru",
                fullname: "Тестовый тест",
                phone: "89313417959",
                password: "$2y$10$FAdFze1EOV0xzOgKJngF7eP0Lf9VCAiwsCQlGCjGGAlEsOYk70ZfK",
                sex: "male",
                nickname: "супер1",
                nickname_eng: "super1",
                country: "Россия",
                description: "dfvdfdsfds",
                is_pro: 0,
                pro_until: null,
                created_at: "2021-05-16T21:34:04.000000Z",
                updated_at: "2021-07-04T19:02:36.000000Z",
                remember_token: null,
                youtube: null,
                vk: "https://vk.com/valya",
                twitter: null,
                instagram: null,
                facebook: null,
                city_id: 2,
                image: {
                    id: 16,
                    path: "/executant/2/1-32.jpeg",
                    order: 1,
                    imageable_type: "App\\Models\\Executant",
                    imageable_id: 2,
                    created_at: "2021-06-24T11:50:45.000000Z",
                    updated_at: "2021-06-24T11:50:45.000000Z"
                }
            }
        };
        exports.chats = chats;
        var currentChat = {
            chat: {
                id: "00a6a707-162d-4e36-bc52-240aabc91823",
                customer_id: 2,
                executant_id: 3,
                created_at: "2021-06-12T09:37:31.000000Z",
                updated_at: "2021-07-08T06:34:37.000000Z",
                executant_unreaded_messages_count: 0,
                customer_unreaded_messages_count: 0,
                user: {
                    id: 2,
                    email: "alfakot@yandex.ru",
                    name: null,
                    phone: null,
                    password: "$2y$10$/wElk.rFwYwZ8TKyMHKc3uH0aq498htV0kNNiFHNWDdTvUNQvn55C",
                    organization: null,
                    country: null,
                    description: null,
                    created_at: "2021-06-12T09:29:21.000000Z",
                    updated_at: "2021-06-12T09:29:21.000000Z",
                    remember_token: null,
                    city_id: 2,
                    image: null
                },
                messages: []
            },
            currentUser: {
                id: 3,
                email: "iliaraznichev@gmail.com",
                fullname: "Иван Петров",
                phone: "+7999999-99-99",
                password: "$2y$10$PnTlGrGYrvdzHuDYdpAQ2upWsfcCf/YISrGAaHMIPYhRwhL/t9CUG",
                sex: "male",
                nickname: "супер",
                nickname_eng: "super",
                country: "Россия",
                description: "Современное общество сложно назвать расистским. Времена, когда людей ущемляли в правах из-за цвета кожи или разреза глаз   Современное общество сложно назвать расистским. \r\nВремена, когда людей ущемляли в правах из-за цвета кожи или разреза глаз",
                is_pro: 0,
                pro_until: null,
                created_at: "2021-05-17T10:02:47.000000Z",
                updated_at: "2021-07-04T15:58:11.000000Z",
                remember_token: null,
                youtube: null,
                vk: "https://httpshttpssvk.com/feed",
                twitter: "https://httpshttpssvk.com/feed",
                instagram: "https://httpshttpssvk.com/feed",
                facebook: "https://httpshttpssvk.com/feed",
                city_id: 2,
                image: {
                    id: 14,
                    path: "/executant/3/poi-.jpg",
                    order: 1,
                    imageable_type: "App\\Models\\Executant",
                    imageable_id: 3,
                    created_at: "2021-06-23T11:40:08.000000Z",
                    updated_at: "2021-06-23T11:40:08.000000Z"
                }
            }
        };
        exports.currentChat = currentChat;
    },{}],"../script/services/chatServices.js":[function(require,module,exports) {
        "use strict";

        Object.defineProperty(exports, "__esModule", {
            value: true
        });
        exports.sendMessage = exports.fetchAllChats = void 0;

        var _constants = require("./constants");

        var _chatsData = require("./data/chatsData");

        var fetchAllChats = function fetchAllChats() {
            // return fetch(`${API_URL}`)
            //   .then((res) => res.json())
            //   .then((data) => {
            //     console.log(data);
            //     return data;
            //   });
            return new Promise(function (res) {
                setTimeout(function () {
                    res(_chatsData.chats);
                }, 500);
            });
        };

        exports.fetchAllChats = fetchAllChats;

        var fetchCurrentChat = function fetchCurrentChat() {
            return new Promise(function (res) {});
        }; // TODO: переписать функционал суда


        var sendMessage = function sendMessage(chatId, message) {// return fetch(`${API_URL}/chats/${chatId}`).then((res) => res.json());
        };

        exports.sendMessage = sendMessage;
    },{"./constants":"../script/services/constants/index.js","./data/chatsData":"../script/services/data/chatsData.js"}],"../script/chat.js":[function(require,module,exports) {
        "use strict";

        var _noPhoto = _interopRequireDefault(require("../assets/image/no-photo.jpg"));

        var _chatServices = require("./services/chatServices");

        var _constants = require("./services/constants");

        function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

        function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

        function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

        function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

        function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

        function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

        function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

// DEV MODE
        if (_constants.DEV_MODE) {
            document.cookie = _constants.TEST_COOKIE_SESSION;
        } // -DEV MODE


        var chatsSidebar = document.querySelector(".chat-sidebar");
        var chatsContainer = document.querySelector("#chats-container");
        var messagesContainer = document.querySelector("#messages-container");
        var scrollMessageBtn = document.querySelector("#scroll-to-message");
        var chatInput = document.querySelector("#chat-input");
        var chatForm = document.querySelector("#chat-form");
        var submitButton = document.querySelector("#form-submit");
        var headerMenu = document.querySelector("#chat-menu-btn");
        var isPermissionSend = false;
        var chatId = null;
        var currentUser = null;
        var currentExecutant = null;
        var chats = [];
        var currentChat = null; // LISTENNER

        headerMenu.addEventListener("click", function () {
            return chatsSidebar.classList.add("open");
        });
        chatForm.addEventListener("submit", submitForm);
        chatInput.addEventListener("input", function (e) {
            return setPermissionSend(e.target.value);
        }); // scrollMessageBtn.addEventListener("click", goBottomMessages);
// messagesContainer.addEventListener("scroll", (e) => {
//   const { scrollTop, scrollHeight, offsetHeight } = e.target;
//   scrollMessageBtn.hidden = scrollTop + offsetHeight == scrollHeight;
// });
// - LISTENNER

        (0, _chatServices.fetchAllChats)().then(function (data) {
            currentUser = data.currentUser;
            chats = data.chats;
            renderChats();
        });
        setInterval(function () {
            (0, _chatServices.fetchAllChats)().then(function (data) {
                currentUser = data.currentUser;
                chats = data.chats;
                renderChats();

                if (currentChat) {
                    console.log(currentChat);
                    setActiveChat(currentChat.id, currentChat.user);
                }

                goBottomMessages();
            });
        }, _constants.REQUEST_TIME); // FUNCTIONS

        function addMessage(isUser, text, user) {
            var message = document.createElement("div");
            message.classList.add("message");
            isUser ? message.classList.add("message--user") : false;
            message.innerHTML = "\n    <a>\n  ";
        }

        function submitForm(e) {
            e.preventDefault();
            var message = chatInput.value;
            if (!isPermissionSend) return;
            sendMessage(currentChat.id, message);
            clearForm();
        }

        function renderChats() {
            var chatItems = chats.map(function (chat) {
                var user = chat.user;
                var messages = chat.messages;
                var chatContainer = document.createElement("div");
                chatContainer.classList.add("chat-sidebar-item");
                chatContainer.classList.add("chat-sidebar__item");
                chatContainer.dataset.id = chat.id;
                chatContainer.innerHTML = "\n    <div class=\"chat-sidebar-item__message-item\">".concat(chat.executant_unreaded_messages_count, "</div>\n    <div class=\"chat-sidebar-item__image\"><img src=\"").concat(user.image.path || _noPhoto.default, "\" alt=\"customer image\"></div>\n    <div class=\"chat-sidebar-item__body\">\n      <div class=\"chat-sidebar-item__name\">").concat(user.name, "</div>\n      <div class=\"chat-sidebar-item__company\">").concat(user.organization || user.nickname, "</div>\n      <div class=\"chat-sidebar-item__message\">").concat(messages[messages.length - 1].message, "</div>\n    </div>\n    ");
                chatContainer.addEventListener("click", function () {
                    chatItems.forEach(function (chat) {
                        return chat.classList.remove("active");
                    });
                    chatsSidebar.classList.remove("open");
                    chatContainer.classList.add("active");
                    setActiveChat(chat.id, user);
                });
                return chatContainer;
            });
            chatsContainer.innerHTML = "";
            chatsContainer.append.apply(chatsContainer, _toConsumableArray(chatItems));
        }

        function setActiveChat(chatId, executant) {
            currentExecutant = executant;
            var candidate = chats.find(function (chat) {
                return chat.id == chatId;
            });
            if (!candidate) return;
            currentChat = candidate;
            var messages = currentChat.messages;
            var messagesItems = messages.map(function (message) {
                var messageContainer = document.createElement("div");
                messageContainer.classList.add("message");
                if (message.customer_id === currentUser.id) messageContainer.classList.add("message--user");
                var messageContent = message.customer_id === currentUser.id ? currentUser : currentExecutant; // TODO: добавить ссылки на прифиль
                // TODO: Стандатизировать  вывод имени

                messageContainer.innerHTML = "\n      <div class=\"message__column\">\n        <a class=\"message__icon ibg\" href=\"".concat(messageContent.href, "\"> <img src=\"").concat(messageContent.image.path || _noPhoto.default, "\" alt=\"user photo\"></a>\n      </div>\n      <div class=\"message__content\"> <a class=\"message__name\" href=\"#\">").concat(messageContent.fullname || messageContent.name, "</a>\n        <div class=\"message__text\">").concat(message.message, "</div>\n      </div>\n    ");
                return messageContainer;
            });
            messagesContainer.innerHTML = "";
            messagesContainer.append.apply(messagesContainer, _toConsumableArray(messagesItems));
        } // - FUNCTIONS
// helpers


        function goBottomMessages() {
            var scrollTop = messagesContainer.scrollTop,
                scrollHeight = messagesContainer.scrollHeight,
                offsetHeight = messagesContainer.offsetHeight; // scrollMessageBtn.hidden = scrollTop + offsetHeight == scrollHeight;

            if (scrollTop + offsetHeight > scrollHeight - 100) messagesContainer.scrollTop = messagesContainer.scrollHeight;
            console.log("пизда");
        }

        function clearForm() {
            chatInput.value = "";
            setPermissionSend(false);
        }

        function setPermissionSend(permisson) {
            if (permisson) {
                isPermissionSend = true;
                submitButton.classList.add("active");
                return;
            }

            isPermissionSend = false;
            submitButton.classList.remove("active");
        } // TODO: удалить от суда функционал


        var sendMessage = function sendMessage(chatId, message) {
            // return fetch(`${API_URL}/chats/${chatId}`).then((res) => res.json());
            chats = chats.map(function (chat) {
                console.log(chatId, chat.id);
                if (chat.id != chatId) return chat;
                chat.messages.push({
                    message: message,
                    customer_id: currentUser.id
                });
                return chat;
            });
        };
    },{"../assets/image/no-photo.jpg":"../assets/image/no-photo.jpg","./services/chatServices":"../script/services/chatServices.js","./services/constants":"../script/services/constants/index.js"}],"../../../../../../../usr/local/lib/node_modules/parcel-bundler/src/builtins/hmr-runtime.js":[function(require,module,exports) {
        var global = arguments[3];
        var OVERLAY_ID = '__parcel__error__overlay__';
        var OldModule = module.bundle.Module;

        function Module(moduleName) {
            OldModule.call(this, moduleName);
            this.hot = {
                data: module.bundle.hotData,
                _acceptCallbacks: [],
                _disposeCallbacks: [],
                accept: function (fn) {
                    this._acceptCallbacks.push(fn || function () {});
                },
                dispose: function (fn) {
                    this._disposeCallbacks.push(fn);
                }
            };
            module.bundle.hotData = null;
        }

        module.bundle.Module = Module;
        var checkedAssets, assetsToAccept;
        var parent = module.bundle.parent;

        if ((!parent || !parent.isParcelRequire) && typeof WebSocket !== 'undefined') {
            var hostname = "" || location.hostname;
            var protocol = location.protocol === 'https:' ? 'wss' : 'ws';
            var ws = new WebSocket(protocol + '://' + hostname + ':' + "52706" + '/');

            ws.onmessage = function (event) {
                checkedAssets = {};
                assetsToAccept = [];
                var data = JSON.parse(event.data);

                if (data.type === 'update') {
                    var handled = false;
                    data.assets.forEach(function (asset) {
                        if (!asset.isNew) {
                            var didAccept = hmrAcceptCheck(global.parcelRequire, asset.id);

                            if (didAccept) {
                                handled = true;
                            }
                        }
                    }); // Enable HMR for CSS by default.

                    handled = handled || data.assets.every(function (asset) {
                        return asset.type === 'css' && asset.generated.js;
                    });

                    if (handled) {
                        console.clear();
                        data.assets.forEach(function (asset) {
                            hmrApply(global.parcelRequire, asset);
                        });
                        assetsToAccept.forEach(function (v) {
                            hmrAcceptRun(v[0], v[1]);
                        });
                    } else if (location.reload) {
                        // `location` global exists in a web worker context but lacks `.reload()` function.
                        location.reload();
                    }
                }

                if (data.type === 'reload') {
                    ws.close();

                    ws.onclose = function () {
                        location.reload();
                    };
                }

                if (data.type === 'error-resolved') {
                    console.log('[parcel] ✨ Error resolved');
                    removeErrorOverlay();
                }

                if (data.type === 'error') {
                    console.error('[parcel] 🚨  ' + data.error.message + '\n' + data.error.stack);
                    removeErrorOverlay();
                    var overlay = createErrorOverlay(data);
                    document.body.appendChild(overlay);
                }
            };
        }

        function removeErrorOverlay() {
            var overlay = document.getElementById(OVERLAY_ID);

            if (overlay) {
                overlay.remove();
            }
        }

        function createErrorOverlay(data) {
            var overlay = document.createElement('div');
            overlay.id = OVERLAY_ID; // html encode message and stack trace

            var message = document.createElement('div');
            var stackTrace = document.createElement('pre');
            message.innerText = data.error.message;
            stackTrace.innerText = data.error.stack;
            overlay.innerHTML = '<div style="background: black; font-size: 16px; color: white; position: fixed; height: 100%; width: 100%; top: 0px; left: 0px; padding: 30px; opacity: 0.85; font-family: Menlo, Consolas, monospace; z-index: 9999;">' + '<span style="background: red; padding: 2px 4px; border-radius: 2px;">ERROR</span>' + '<span style="top: 2px; margin-left: 5px; position: relative;">🚨</span>' + '<div style="font-size: 18px; font-weight: bold; margin-top: 20px;">' + message.innerHTML + '</div>' + '<pre>' + stackTrace.innerHTML + '</pre>' + '</div>';
            return overlay;
        }

        function getParents(bundle, id) {
            var modules = bundle.modules;

            if (!modules) {
                return [];
            }

            var parents = [];
            var k, d, dep;

            for (k in modules) {
                for (d in modules[k][1]) {
                    dep = modules[k][1][d];

                    if (dep === id || Array.isArray(dep) && dep[dep.length - 1] === id) {
                        parents.push(k);
                    }
                }
            }

            if (bundle.parent) {
                parents = parents.concat(getParents(bundle.parent, id));
            }

            return parents;
        }

        function hmrApply(bundle, asset) {
            var modules = bundle.modules;

            if (!modules) {
                return;
            }

            if (modules[asset.id] || !bundle.parent) {
                var fn = new Function('require', 'module', 'exports', asset.generated.js);
                asset.isNew = !modules[asset.id];
                modules[asset.id] = [fn, asset.deps];
            } else if (bundle.parent) {
                hmrApply(bundle.parent, asset);
            }
        }

        function hmrAcceptCheck(bundle, id) {
            var modules = bundle.modules;

            if (!modules) {
                return;
            }

            if (!modules[id] && bundle.parent) {
                return hmrAcceptCheck(bundle.parent, id);
            }

            if (checkedAssets[id]) {
                return;
            }

            checkedAssets[id] = true;
            var cached = bundle.cache[id];
            assetsToAccept.push([bundle, id]);

            if (cached && cached.hot && cached.hot._acceptCallbacks.length) {
                return true;
            }

            return getParents(global.parcelRequire, id).some(function (id) {
                return hmrAcceptCheck(global.parcelRequire, id);
            });
        }

        function hmrAcceptRun(bundle, id) {
            var cached = bundle.cache[id];
            bundle.hotData = {};

            if (cached) {
                cached.hot.data = bundle.hotData;
            }

            if (cached && cached.hot && cached.hot._disposeCallbacks.length) {
                cached.hot._disposeCallbacks.forEach(function (cb) {
                    cb(bundle.hotData);
                });
            }

            delete bundle.cache[id];
            bundle(id);
            cached = bundle.cache[id];

            if (cached && cached.hot && cached.hot._acceptCallbacks.length) {
                cached.hot._acceptCallbacks.forEach(function (cb) {
                    cb();
                });

                return true;
            }
        }
    },{}]},{},["../../../../../../../usr/local/lib/node_modules/parcel-bundler/src/builtins/hmr-runtime.js","../script/chat.js"], null)
//# sourceMappingURL=/chat.87a89f8d.js.map
