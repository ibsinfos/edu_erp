!function (c) {
    c.randomID = function (c, t) {
        c = c || 10, t = t || "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for (var e = "", n = 0; n < c; n++) {
            var o = Math.floor(Math.random() * t.length);
            e += t.substring(o, o + 1)
        }
        return e
    }, c.isValidSelector = function (t) {
        try {
            c(t)
        } catch (e) {
            return!1
        }
        return!0
    }, c(document).ready(function () {
        c(".scrollToTop").click(function () {
            return c("html, body").animate({scrollTop: 0}, 300), !1
        }), c(document).on("click", ".classToggle", function () {
            var t = c(this), e = c(t.data("target")), n = t.data("class");
            e.hasClass(n) ? e.removeClass(n) : e.addClass(n)
        }), c(document).on("click", ".checkAll", function () {
            var t = c(this), e = c(t.data("target"));
            e.prop("checked", !0)
        }), c(document).on("click", ".checkNone", function () {
            var t = c(this), e = c(t.data("target"));
            e.prop("checked", !1)
        }), c(document).on("change", ".checkToggle", function () {
            var t = c(this), e = c(t.data("target"));
            t.is(":checked") ? e.prop("checked", !0) : e.prop("checked", !1)
        })
    })
}(jQuery);