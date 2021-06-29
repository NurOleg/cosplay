parcelRequire = function (e, r, t, n) {
    var i, o = "function" == typeof parcelRequire && parcelRequire, u = "function" == typeof require && require;

    function f(t, n) {
        if (!r[t]) {
            if (!e[t]) {
                var i = "function" == typeof parcelRequire && parcelRequire;
                if (!n && i) return i(t, !0);
                if (o) return o(t, !0);
                if (u && "string" == typeof t) return u(t);
                var c = new Error("Cannot find module '" + t + "'");
                throw c.code = "MODULE_NOT_FOUND", c
            }
            p.resolve = function (r) {
                return e[t][1][r] || r
            }, p.cache = {};
            var l = r[t] = new f.Module(t);
            e[t][0].call(l.exports, p, l, l.exports, this)
        }
        return r[t].exports;

        function p(e) {
            return f(p.resolve(e))
        }
    }

    f.isParcelRequire = !0, f.Module = function (e) {
        this.id = e, this.bundle = f, this.exports = {}
    }, f.modules = e, f.cache = r, f.parent = o, f.register = function (r, t) {
        e[r] = [function (e, r) {
            r.exports = t
        }, {}]
    };
    for (var c = 0; c < t.length; c++) try {
        f(t[c])
    } catch (e) {
        i || (i = e)
    }
    if (t.length) {
        var l = f(t[t.length - 1]);
        "object" == typeof exports && "undefined" != typeof module ? module.exports = l : "function" == typeof define && define.amd ? define(function () {
            return l
        }) : n && (this[n] = l)
    }
    if (parcelRequire = f, i) throw i;
    return f
}({
    "EZEI": [function (require, module, exports) {
        "use strict";
        Object.defineProperty(exports, "__esModule", {value: !0}), exports.getVariables = void 0;
        var e = function (e, t) {
            return new Promise(function (n, r) {
                fetch("https://cosplay.promo/filter?".concat(e, "=").concat(t)).then(function (e) {
                    return e.json()
                }).then(function (e) {
                    return n(e)
                })
            })
        };
        exports.getVariables = e;
    }, {}], "Tehx": [function (require, module, exports) {
        "use strict";
        var a = require("./services/getVariables"), n = 3, t = [];
        $("input[data-associated]").on("input", function () {
            if (!($(this).val().length < n)) {
                var e = $(this), o = e.attr("data-name"), r = e.val(), i = e.parent().children("datalist"),
                    l = $(e.attr("data-associated")), c = $(e.attr("data-secret")), u = t.find(function (a) {
                        return a.id == r
                    });
                console.log(o, r), u ? (l.val(u.name_eng), console.log(l), c.val(u.code), "ru" == e.attr("data-leng") ? (e.val(u.name_ru), l.val(u.name_eng)) : (e.val(u.name_eng), l.val(u.name_ru))) : (l.val(""), c.val("")), (0, a.getVariables)(o, r).then(function (a) {
                    t = a, i.html(a.map(function (a) {
                        return '<option value="'.concat(a.name_ru, '"></option>\n            <option value="').concat(a.name_eng, '"></option>')
                    }))
                })
            }
        });
    }, {"./services/getVariables": "EZEI"}]
}, {}, ["Tehx"], null)
//# sourceMappingURL=/add-customer.30af895f.js.map
