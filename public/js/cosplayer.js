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
    "HfbA": [function (require, module, exports) {
        module.exports = "/images/cosplayer-arrow.45e1cef2.svg";
    }, {}], "yg4b": [function (require, module, exports) {
        "use strict";
        var e = a(require("/images/cosplayer-arrow.45e1cef2.svg"));

        function a(e) {
            return e && e.__esModule ? e : {default: e}
        }

        function s(a) {
            $(".cosplayer-shape-tab").removeClass("active"), $(".cosplayer-services__row").fadeOut(), $('.cosplayer-shape-tab[href="'.concat(a, '"]')).addClass("active"), $(".cosplayer-shape-item").fadeOut(), $(".cosplayer-shape-item").removeClass("open"), $('.cosplayer-shape-item[data-name="'.concat(a, '"]')).fadeIn("linear", function () {
                $(this).find(".cosplayer-shape-slider").not(".slick-initialized").slick({
                    infinite: !1,
                    prevArrow: '<button class="slick-prev"><img src="'.concat(e.default, '"/></button>'),
                    nextArrow: '<button class="slick-next"><img src="'.concat(e.default, '"/></button>')
                })
            }), $('.cosplayer-services__row[data-name="'.concat(a, '"]')).addClass("open").fadeIn("linear").css("display", "flex")
        }

        function t() {
            var e = document.location.hash;
            e && s(e)
        }

        t(), $(".cosplayer-shape-tab").on("click", function (e) {
            s($(this).attr("href"))
        }), $(".cosplayer-shape-item.open").fadeIn("linear", function () {
            $(this).find(".cosplayer-shape-slider").not(".slick-initialized").slick({
                infinite: !1,
                prevArrow: '<button class="slick-prev"><img src="'.concat(e.default, '"/></button>'),
                nextArrow: '<button class="slick-next"><img src="'.concat(e.default, '"/></button>')
            })
        });
    }, {"/images/cosplayer-arrow.45e1cef2.svg": "HfbA"}]
}, {}, ["yg4b"], null)
//# sourceMappingURL=/cosplayer.1355877c.js.map
