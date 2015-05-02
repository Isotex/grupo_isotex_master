/* top-lang */
(function ($) {
	"use strict";

	$.fn.topLang = function () {

		return this.each(function () {
			var langList = $(this).find('.top-lang-list'),
				currentLang = $(this).find('.top-lang-current'),
				that = this,
				langListHeight = langList.height();

			langList.css({height: 0, display: 'none'});


			currentLang.click(function() {
				currentLang.addClass('active');
				langList.css({display: 'block'});
				langList.animate({height: langListHeight}, 200);
			});

			$(document).mouseup(function (e)
			{
				if ($(that).has(e.target).length === 0)
				{
					langList.animate({height: 0}, 200, function() {
						langList.css({display: 'none'});
						currentLang.removeClass('active');

					});
				}
			});
		});
	};
})(jQuery);
/*
*
* hoverIntent
*
*/
(function($) {
	"use strict";
    $.fn.hoverIntent = function(handlerIn,handlerOut,selector) {

        // default configuration values
        var cfg = {
            interval: 100,
            sensitivity: 7,
            timeout: 0
        };

        if ( typeof handlerIn === "object" ) {
            cfg = $.extend(cfg, handlerIn );
        } else if ($.isFunction(handlerOut)) {
            cfg = $.extend(cfg, { over: handlerIn, out: handlerOut, selector: selector } );
        } else {
            cfg = $.extend(cfg, { over: handlerIn, out: handlerIn, selector: handlerOut } );
        }

        // instantiate variables
        // cX, cY = current X and Y position of mouse, updated by mousemove event
        // pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
        var cX, cY, pX, pY;

        // A private function for getting mouse position
        var track = function(ev) {
            cX = ev.pageX;
            cY = ev.pageY;
        };

        // A private function for comparing current and previous mouse position
        var compare = function(ev,ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            // compare mouse positions to see if they've crossed the threshold
            if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
                $(ob).off("mousemove.hoverIntent",track);
                // set hoverIntent state to true (so mouseOut can be called)
                ob.hoverIntent_s = 1;
                return cfg.over.apply(ob,[ev]);
            } else {
                // set previous coordinates for next time
                pX = cX; pY = cY;
                // use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
                ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
            }
        };

        // A private function for delaying the mouseOut function
        var delay = function(ev,ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            ob.hoverIntent_s = 0;
            return cfg.out.apply(ob,[ev]);
        };

        // A private function for handling mouse 'hovering'
        var handleHover = function(e) {
            // copy objects to be passed into t (required for event object to be passed in IE)
            var ev = jQuery.extend({},e);
            var ob = this;

            // cancel hoverIntent timer if it exists
            if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

            // if e.type == "mouseenter"
            if (e.type == "mouseenter") {
                // set "previous" X and Y position based on initial entry point
                pX = ev.pageX; pY = ev.pageY;
                // update "current" X and Y position based on mousemove
                $(ob).on("mousemove.hoverIntent",track);
                // start polling interval (self-calling timeout) to compare mouse coordinates over time
                if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

                // else e.type == "mouseleave"
            } else {
                // unbind expensive mousemove event
                $(ob).off("mousemove.hoverIntent",track);
                // if hoverIntent state is true, then call the mouseOut function after the specified delay
                if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
            }
        };

        // listen for mouseenter and mouseleave
        return this.on({'mouseenter.hoverIntent':handleHover,'mouseleave.hoverIntent':handleHover}, cfg.selector);
    };
})(jQuery);

/*
 *
 * jQuery Easing
 *
 */
jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend(jQuery.easing, {
    def: 'easeOutQuad',
    swing: function (x, t, b, c, d) {
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d)
    },
    easeInQuad: function (x, t, b, c, d) {
        return c * (t /= d) * t + b
    },
    easeOutQuad: function (x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b
    },
    easeInOutQuad: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t + b;
        return -c / 2 * ((--t) * (t - 2) - 1) + b
    },
    easeInCubic: function (x, t, b, c, d) {
        return c * (t /= d) * t * t + b
    },
    easeOutCubic: function (x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t + 1) + b
    },
    easeInOutCubic: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b
    },
    easeInQuart: function (x, t, b, c, d) {
        return c * (t /= d) * t * t * t + b
    },
    easeOutQuart: function (x, t, b, c, d) {
        return -c * ((t = t / d - 1) * t * t * t - 1) + b
    },
    easeInOutQuart: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b
    },
    easeInQuint: function (x, t, b, c, d) {
        return c * (t /= d) * t * t * t * t + b
    },
    easeOutQuint: function (x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t * t * t + 1) + b
    },
    easeInOutQuint: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t * t * t + 2) + b
    },
    easeInSine: function (x, t, b, c, d) {
        return -c * Math.cos(t / d * (Math.PI / 2)) + c + b
    },
    easeOutSine: function (x, t, b, c, d) {
        return c * Math.sin(t / d * (Math.PI / 2)) + b
    },
    easeInOutSine: function (x, t, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b
    },
    easeInExpo: function (x, t, b, c, d) {
        return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b
    },
    easeOutExpo: function (x, t, b, c, d) {
        return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b
    },
    easeInOutExpo: function (x, t, b, c, d) {
        if (t == 0) return b;
        if (t == d) return b + c;
        if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
        return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b
    },
    easeInCirc: function (x, t, b, c, d) {
        return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b
    },
    easeOutCirc: function (x, t, b, c, d) {
        return c * Math.sqrt(1 - (t = t / d - 1) * t) + b
    },
    easeInOutCirc: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
        return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b
    },
    easeInElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b
    },
    easeOutElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b
    },
    easeInOutElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d / 2) == 2) return b + c;
        if (!p) p = d * (.3 * 1.5);
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a); if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
        return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b
    },
    easeInBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * (t /= d) * t * ((s + 1) * t - s) + b
    },
    easeOutBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b
    },
    easeInOutBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
        return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b
    },
    easeInBounce: function (x, t, b, c, d) {
        return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b
    },
    easeOutBounce: function (x, t, b, c, d) {
        if ((t /= d) < (1 / 2.75)) {
            return c * (7.5625 * t * t) + b
        } else if (t < (2 / 2.75)) {
            return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b
        } else if (t < (2.5 / 2.75)) {
            return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b
        } else {
            return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b
        }
    },
    easeInOutBounce: function (x, t, b, c, d) {
        if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
        return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b
    }
});

/*
 *
 * jQuery Superfish
 *
 */
(function (e) {
	"use strict";
    e.fn.superfish = function (t) {
        var n = e.fn.superfish,
            r = n.c,
            i = e(['<span class="', r.arrowClass, '"> <i class="fa-chevron-down"></i> </span>'].join("")),
            s = function () {
                var t = e(this),
                    n = u(t);
                clearTimeout(n.sfTimer);
                t.showSuperfishUl().siblings().hideSuperfishUl()
            }, o = function () {
                var t = e(this),
                    r = u(t),
                    i = n.op;
                clearTimeout(r.sfTimer);
                r.sfTimer = setTimeout(function () {
                    i.retainPath = e.inArray(t[0], i.$path) > -1;
                    t.hideSuperfishUl();
                    if (i.$path.length && t.parents(["li.", i.hoverClass].join("")).length < 1) {
                        s.call(i.$path)
                    }
                }, i.delay)
            }, u = function (e) {
                var t = e.parents(["ul.", r.menuClass, ":first"].join(""))[0];
                n.op = n.o[t.serial];
                return t
            }, a = function (e) {
                e.addClass(r.anchorClass).append(i.clone())
            };
        return this.each(function () {
            var i = this.serial = n.o.length;
            var u = e.extend({}, n.defaults, t);
            u.$path = e("li." + u.pathClass, this).slice(0, u.pathLevels).each(function () {
                e(this).addClass([u.hoverClass, r.bcClass].join(" ")).filter("li:has(ul)").removeClass(u.pathClass)
            });
            n.o[i] = n.op = u;
            e("li:has(ul)", this)[e.fn.hoverIntent && !u.disableHI ? "hoverIntent" : "hover"](s, o).each(function () {
                if (u.autoArrows) a(e(">a:first-child", this))
            }).not("." + r.bcClass).hideSuperfishUl();
            var f = e("a", this);
            f.each(function (e) {
                var t = f.eq(e).parents("li");
                f.eq(e).focus(function () {
                    s.call(t)
                }).blur(function () {
                    o.call(t)
                })
            });
            u.onInit.call(this)
        }).each(function () {
            var t = [r.menuClass];
            if (n.op.dropShadows && !(e.browser.msie && e.browser.version < 7)) t.push(r.shadowClass);
            e(this).addClass(t.join(" "))
        })
    };
    var t = e.fn.superfish;
    t.o = [];
    t.op = {};
    t.IE7fix = function () {
        var n = t.op;
        if (e.browser.msie && e.browser.version > 6 && n.dropShadows && n.animation.opacity != undefined) this.toggleClass(t.c.shadowClass + "-off")
    };
    t.c = {
        bcClass: "sf-breadcrumb",
        menuClass: "sf-js-enabled",
        anchorClass: "sf-with-ul",
        arrowClass: "sf-sub-indicator",
        shadowClass: "sf-shadow"
    };
    t.defaults = {
        hoverClass: "sfHover",
        pathClass: "overideThisToUse",
        pathLevels: 1,
        delay: 800,
        animation: {
            opacity: "show"
        },
        speed: "normal",
        autoArrows: true,
        dropShadows: true,
        disableHI: false,
        onInit: function () {},
        onBeforeShow: function () {},
        onShow: function () {},
        onHide: function () {}
    };
    e.fn.extend({
        hideSuperfishUl: function () {
            var n = t.op,
                r = n.retainPath === true ? n.$path : "";
            n.retainPath = false;
            var i = e(["li.", n.hoverClass].join(""), this).add(this).not(r).removeClass(n.hoverClass).find(">ul").hide().css("visibility", "hidden");
            n.onHide.call(i);
            return this
        },
        showSuperfishUl: function () {
            var e = t.op,
                n = t.c.shadowClass + "-off",
                r = this.addClass(e.hoverClass).find(">ul:hidden").css("visibility", "visible");
            t.IE7fix.call(r);
            e.onBeforeShow.call(r);
            r.animate(e.animation, e.speed, function () {
                t.IE7fix.call(r);
                e.onShow.call(r)
            });
            return this
        }
    })
})(jQuery);

/*
 *
 * jQuery Tipsy
 *
 */
(function (e) {
	"use strict";
    function t(e) {
        if (e.attr("title") || typeof e.attr("original-title") != "string") {
            e.attr("original-title", e.attr("title") || "").removeAttr("title")
        }
    }

    function n(n, r) {
        this.$element = e(n);
        this.options = r;
        this.enabled = true;
        t(this.$element)
    }
    n.prototype = {
        show: function () {
            var t = this.getTitle();
            if (t && this.enabled) {
                var n = this.tip();
                n.find(".tipsy-inner")[this.options.html ? "html" : "text"](t);
                n[0].className = "tipsy";
                n.remove().css({
                    top: 0,
                    left: 0,
                    visibility: "hidden",
                    display: "block"
                }).appendTo(document.body);
                var r = e.extend({}, this.$element.offset(), {
                    width: this.$element[0].offsetWidth,
                    height: this.$element[0].offsetHeight
                });
                var i = n[0].offsetWidth,
                    s = n[0].offsetHeight;
                var o = typeof this.options.gravity == "function" ? this.options.gravity.call(this.$element[0]) : this.options.gravity;
                var u;
                switch (o.charAt(0)) {
                case "n":
                    u = {
                        top: r.top + r.height + this.options.offset,
                        left: r.left + r.width / 2 - i / 2
                    };
                    break;
                case "s":
                    u = {
                        top: r.top - s - this.options.offset,
                        left: r.left + r.width / 2 - i / 2
                    };
                    break;
                case "e":
                    u = {
                        top: r.top + r.height / 2 - s / 2,
                        left: r.left - i - this.options.offset
                    };
                    break;
                case "w":
                    u = {
                        top: r.top + r.height / 2 - s / 2,
                        left: r.left + r.width + this.options.offset
                    };
                    break
                }
                if (o.length == 2) {
                    if (o.charAt(1) == "w") {
                        u.left = r.left + r.width / 2 - 15
                    } else {
                        u.left = r.left + r.width / 2 - i + 15
                    }
                }
                n.css(u).addClass("tipsy-" + o);
                if (this.options.fade) {
                    n.stop().css({
                        opacity: 0,
                        display: "block",
                        visibility: "visible"
                    }).animate({
                        opacity: this.options.opacity
                    })
                } else {
                    n.css({
                        visibility: "visible",
                        opacity: this.options.opacity
                    })
                }
            }
        },
        hide: function () {
            if (this.options.fade) {
                this.tip().stop().fadeOut(function () {
                    e(this).remove()
                })
            } else {
                this.tip().remove()
            }
        },
        getTitle: function () {
            var e, n = this.$element,
                r = this.options;
            t(n);
            var e, r = this.options;
            if (typeof r.title == "string") {
                e = n.attr(r.title == "title" ? "original-title" : r.title)
            } else if (typeof r.title == "function") {
                e = r.title.call(n[0])
            }
            e = ("" + e).replace(/(^\s*|\s*$)/, "");
            return e || r.fallback
        },
        tip: function () {
            if (!this.$tip) {
                this.$tip = e('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"/></div>')
            }
            return this.$tip
        },
        validate: function () {
            if (!this.$element[0].parentNode) {
                this.hide();
                this.$element = null;
                this.options = null
            }
        },
        enable: function () {
            this.enabled = true
        },
        disable: function () {
            this.enabled = false
        },
        toggleEnabled: function () {
            this.enabled = !this.enabled
        }
    };
    e.fn.tipsy = function (t) {
        function r(r) {
            var i = e.data(r, "tipsy");
            if (!i) {
                i = new n(r, e.fn.tipsy.elementOptions(r, t));
                e.data(r, "tipsy", i)
            }
            return i
        }

        function i() {
            var e = r(this);
            e.hoverState = "in";
            if (t.delayIn == 0) {
                e.show()
            } else {
                setTimeout(function () {
                    if (e.hoverState == "in") e.show()
                }, t.delayIn)
            }
        }

        function s() {
            var e = r(this);
            e.hoverState = "out";
            if (t.delayOut == 0) {
                e.hide()
            } else {
                setTimeout(function () {
                    if (e.hoverState == "out") e.hide()
                }, t.delayOut)
            }
        }
        if (t === true) {
            return this.data("tipsy")
        } else if (typeof t == "string") {
            return this.data("tipsy")[t]()
        }
        t = e.extend({}, e.fn.tipsy.defaults, t);
        if (!t.live) this.each(function () {
            r(this)
        });
        if (t.trigger != "manual") {
            var o = t.live ? "live" : "bind",
                u = t.trigger == "hover" ? "mouseenter" : "focus",
                a = t.trigger == "hover" ? "mouseleave" : "blur";
            this[o](u, i)[o](a, s)
        }
        return this
    };
    e.fn.tipsy.defaults = {
        delayIn: 0,
        delayOut: 0,
        fade: false,
        fallback: "",
        gravity: "n",
        html: false,
        live: false,
        offset: 0,
        opacity: 1,
        title: "title",
        trigger: "hover"
    };
    e.fn.tipsy.elementOptions = function (t, n) {
        return e.metadata ? e.extend({}, n, e(t).metadata()) : n
    };
    e.fn.tipsy.autoNS = function () {
        return e(this).offset().top > e(document).scrollTop() + e(window).height() / 2 ? "s" : "n"
    };
    e.fn.tipsy.autoWE = function () {
        return e(this).offset().left > e(document).scrollLeft() + e(window).width() / 2 ? "e" : "w"
    }
})(jQuery);


/*
 *
 * SmoothScroll
 *
 */
(function () {
    function c() {
        var e = false;
        if (e) {
            N("keydown", y)
        }
        if (t.keyboardSupport && !e) {
            T("keydown", y)
        }
    }

    function h() {
        if (!document.body) return;
        var e = document.body;
        var i = document.documentElement;
        var a = window.innerHeight;
        var f = e.scrollHeight;
        o = document.compatMode.indexOf("CSS") >= 0 ? i : e;
        u = e;
        c();
        s = true;
        if (top != self) {
            r = true
        } else if (f > a && (e.offsetHeight <= a || i.offsetHeight <= a)) {
            i.style.height = "auto";
           
            if (o.offsetHeight <= a) {
                var l = document.createElement("div");
                l.style.clear = "both";
                e.appendChild(l)
            }
        }
        if (!t.fixedBackground && !n) {
            e.style.backgroundAttachment = "scroll";
            i.style.backgroundAttachment = "scroll"
        }
    }

    function m(e, n, r, i) {
        i || (i = 1e3);
        k(n, r);
        if (t.accelerationMax != 1) {
            var s = +(new Date);
            var o = s - v;
            if (o < t.accelerationDelta) {
                var u = (1 + 30 / o) / 2;
                if (u > 1) {
                    u = Math.min(u, t.accelerationMax);
                    n *= u;
                    r *= u
                }
            }
            v = +(new Date)
        }
        p.push({
            x: n,
            y: r,
            lastX: n < 0 ? .99 : -.99,
            lastY: r < 0 ? .99 : -.99,
            start: +(new Date)
        });
        if (d) {
            return
        }
        var a = e === document.body;
        var f = function (s) {
            var o = +(new Date);
            var u = 0;
            var l = 0;
            for (var c = 0; c < p.length; c++) {
                var h = p[c];
                var v = o - h.start;
                var m = v >= t.animationTime;
                var g = m ? 1 : v / t.animationTime;
                if (t.pulseAlgorithm) {
                    g = D(g)
                }
                var y = h.x * g - h.lastX >> 0;
                var b = h.y * g - h.lastY >> 0;
                u += y;
                l += b;
                h.lastX += y;
                h.lastY += b;
                if (m) {
                    p.splice(c, 1);
                    c--
                }
            }
            if (a) {
                window.scrollBy(u, l)
            } else {
                if (u) e.scrollLeft += u;
                if (l) e.scrollTop += l
            } if (!n && !r) {
                p = []
            }
            if (p.length) {
                M(f, e, i / t.frameRate + 1)
            } else {
                d = false
            }
        };
        M(f, e, 0);
        d = true
    }

    function g(e) {
        if (!s) {
            h()
        }
        var n = e.target;
        var r = x(n);
        if (!r || e.defaultPrevented || C(u, "embed") || C(n, "embed") && /\.pdf/i.test(n.src)) {
            return true
        }
        var i = e.wheelDeltaX || 0;
        var o = e.wheelDeltaY || 0;
        if (!i && !o) {
            o = e.wheelDelta || 0
        }
        if (!t.touchpadSupport && A(o)) {
            return true
        }
        if (Math.abs(i) > 1.2) {
            i *= t.stepSize / 120
        }
        if (Math.abs(o) > 1.2) {
            o *= t.stepSize / 120
        }
        m(r, -i, -o);
        e.preventDefault()
    }

    function y(e) {
        var n = e.target;
        var r = e.ctrlKey || e.altKey || e.metaKey || e.shiftKey && e.keyCode !== l.spacebar;
        if (/input|textarea|select|embed/i.test(n.nodeName) || n.isContentEditable || e.defaultPrevented || r) {
            return true
        }
        if (C(n, "button") && e.keyCode === l.spacebar) {
            return true
        }
        var i, s = 0,
            o = 0;
        var a = x(u);
        var f = a.clientHeight;
        if (a == document.body) {
            f = window.innerHeight
        }
        switch (e.keyCode) {
        case l.up:
            o = -t.arrowScroll;
            break;
        case l.down:
            o = t.arrowScroll;
            break;
        case l.spacebar:
            i = e.shiftKey ? 1 : -1;
            o = -i * f * .9;
            break;
        case l.pageup:
            o = -f * .9;
            break;
        case l.pagedown:
            o = f * .9;
            break;
        case l.home:
            o = -a.scrollTop;
            break;
        case l.end:
            var c = a.scrollHeight - a.scrollTop - f;
            o = c > 0 ? c + 10 : 0;
            break;
        case l.left:
            s = -t.arrowScroll;
            break;
        case l.right:
            s = t.arrowScroll;
            break;
        default:
            return true
        }
        m(a, s, o);
        e.preventDefault()
    }

    function b(e) {
        u = e.target
    }

    function S(e, t) {
        for (var n = e.length; n--;) w[E(e[n])] = t;
        return t
    }

    function x(e) {
        var t = [];
        var n = o.scrollHeight;
        do {
            var i = w[E(e)];
            if (i) {
                return S(t, i)
            }
            t.push(e);
            if (n === e.scrollHeight) {
                if (!r || o.clientHeight + 10 < n) {
                    return S(t, document.body)
                }
            } else if (e.clientHeight + 10 < e.scrollHeight) {
                overflow = getComputedStyle(e, "").getPropertyValue("overflow-y");
                if (overflow === "scroll" || overflow === "auto") {
                    return S(t, e)
                }
            }
        } while (e = e.parentNode)
    }

    function T(e, t, n) {
        window.addEventListener(e, t, n || false)
    }

    function N(e, t, n) {
        window.removeEventListener(e, t, n || false)
    }

    function C(e, t) {
        return (e.nodeName || "").toLowerCase() === t.toLowerCase()
    }

    function k(e, t) {
        e = e > 0 ? 1 : -1;
        t = t > 0 ? 1 : -1;
        if (i.x !== e || i.y !== t) {
            i.x = e;
            i.y = t;
            p = [];
            v = 0
        }
    }

    function A(e) {
        if (!e) return;
        e = Math.abs(e);
        f.push(e);
        f.shift();
        clearTimeout(L);
        var t = f[0] == f[1] && f[1] == f[2];
        var n = O(f[0], 120) && O(f[1], 120) && O(f[2], 120);
        return !(t || n)
    }

    function O(e, t) {
        return Math.floor(e / t) == e / t
    }

    function _(e) {
        var n, r, i;
        e = e * t.pulseScale;
        if (e < 1) {
            n = e - (1 - Math.exp(-e))
        } else {
            r = Math.exp(-1);
            e -= 1;
            i = 1 - Math.exp(-e);
            n = r + i * (1 - r)
        }
        return n * t.pulseNormalize
    }

    function D(e) {
        if (e >= 1) return 1;
        if (e <= 0) return 0;
        if (t.pulseNormalize == 1) {
            t.pulseNormalize /= _(1)
        }
        return _(e)
    }
    var e = {
        frameRate: 150,
        animationTime: 400,
        stepSize: 120,
        pulseAlgorithm: true,
        pulseScale: 8,
        pulseNormalize: 1,
        accelerationDelta: 20,
        accelerationMax: 1,
        keyboardSupport: true,
        arrowScroll: 50,
        touchpadSupport: true,
        fixedBackground: true,
        excluded: ""
    };
    var t = e;
    var n = false;
    var r = false;
    var i = {
        x: 0,
        y: 0
    };
    var s = false;
    var o = document.documentElement;
    var u;
    var a;
    var f = [120, 120, 120];
    var l = {
        left: 37,
        up: 38,
        right: 39,
        down: 40,
        spacebar: 32,
        pageup: 33,
        pagedown: 34,
        end: 35,
        home: 36
    };
    var t = e;
    var p = [];
    var d = false;
    var v = +(new Date);
    var w = {};
    setInterval(function () {
        w = {}
    }, 10 * 1e3);
    var E = function () {
        var e = 0;
        return function (t) {
            return t.uniqueID || (t.uniqueID = e++)
        }
    }();
    var L;
    var M = function () {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || function (e, t, n) {
            window.setTimeout(e, n || 1e3 / 60)
        }
    }();
    var P = /chrome/i.test(window.navigator.userAgent);
    var H = "onmousewheel" in document;
    if (H && P) {
        T("mousedown", b);
        T("mousewheel", g);
        T("load", h)
    }
})();

/*!
 * Retina.js v1.3.0
 *
 * Copyright 2014 Imulus, LLC
 * Released under the MIT license
 *
 * Retina.js is an open source script that makes it easy to serve
 * high-resolution images to devices with retina displays.
 */
!function(){function a(){}function b(a){return f.retinaImageSuffix+a}function c(a,c){if(this.path=a||"","undefined"!=typeof c&&null!==c)this.at_2x_path=c,this.perform_check=!1;else{if(void 0!==document.createElement){var d=document.createElement("a");d.href=this.path,d.pathname=d.pathname.replace(g,b),this.at_2x_path=d.href}else{var e=this.path.split("?");e[0]=e[0].replace(g,b),this.at_2x_path=e.join("?")}this.perform_check=!0}}function d(a){this.el=a,this.path=new c(this.el.getAttribute("src"),this.el.getAttribute("data-at2x"));var b=this;this.path.check_2x_variant(function(a){a&&b.swap()})}var e="undefined"==typeof exports?window:exports,f={retinaImageSuffix:"@2x",check_mime_type:!0,force_original_dimensions:!0};e.Retina=a,a.configure=function(a){null===a&&(a={});for(var b in a)a.hasOwnProperty(b)&&(f[b]=a[b])},a.init=function(a){null===a&&(a=e);var b=a.onload||function(){};a.onload=function(){var a,c,e=document.getElementsByTagName("img"),f=[];for(a=0;a<e.length;a+=1)c=e[a],c.getAttributeNode("data-no-retina")||f.push(new d(c));b()}},a.isRetina=function(){var a="(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx)";return e.devicePixelRatio>1?!0:e.matchMedia&&e.matchMedia(a).matches?!0:!1};var g=/\.\w+$/;e.RetinaImagePath=c,c.confirmed_paths=[],c.prototype.is_external=function(){return!(!this.path.match(/^https?\:/i)||this.path.match("//"+document.domain))},c.prototype.check_2x_variant=function(a){var b,d=this;return this.is_external()?a(!1):this.perform_check||"undefined"==typeof this.at_2x_path||null===this.at_2x_path?this.at_2x_path in c.confirmed_paths?a(!0):(b=new XMLHttpRequest,b.open("HEAD",this.at_2x_path),b.onreadystatechange=function(){if(4!==b.readyState)return a(!1);if(b.status>=200&&b.status<=399){if(f.check_mime_type){var e=b.getResponseHeader("Content-Type");if(null===e||!e.match(/^image/i))return a(!1)}return c.confirmed_paths.push(d.at_2x_path),a(!0)}return a(!1)},b.send(),void 0):a(!0)},e.RetinaImage=d,d.prototype.swap=function(a){function b(){c.el.complete?(f.force_original_dimensions&&(c.el.setAttribute("width",c.el.offsetWidth),c.el.setAttribute("height",c.el.offsetHeight)),c.el.setAttribute("src",a)):setTimeout(b,5)}"undefined"==typeof a&&(a=this.path.at_2x_path);var c=this;b()},a.isRetina()&&a.init(e)}();

/*
 *
 * jQuery Waypoints - v2.0.4
 *
 */
(function(){"use strict"; var t=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++){if(e in this&&this[e]===t)return e}return-1},e=[].slice;(function(t,e){if(typeof define==="function"&&define.amd){return define("waypoints",["jquery"],function(n){return e(n,t)})}else{return e(t.jQuery,t)}})(this,function(n,r){var i,o,l,s,f,u,c,a,h,d,p,y,v,w,g,m;i=n(r);a=t.call(r,"ontouchstart")>=0;s={horizontal:{},vertical:{}};f=1;c={};u="waypoints-context-id";p="resize.waypoints";y="scroll.waypoints";v=1;w="waypoints-waypoint-ids";g="waypoint";m="waypoints";o=function(){function t(t){var e=this;this.$element=t;this.element=t[0];this.didResize=false;this.didScroll=false;this.id="context"+f++;this.oldScroll={x:t.scrollLeft(),y:t.scrollTop()};this.waypoints={horizontal:{},vertical:{}};this.element[u]=this.id;c[this.id]=this;t.bind(y,function(){var t;if(!(e.didScroll||a)){e.didScroll=true;t=function(){e.doScroll();return e.didScroll=false};return r.setTimeout(t,n[m].settings.scrollThrottle)}});t.bind(p,function(){var t;if(!e.didResize){e.didResize=true;t=function(){n[m]("refresh");return e.didResize=false};return r.setTimeout(t,n[m].settings.resizeThrottle)}})}t.prototype.doScroll=function(){var t,e=this;t={horizontal:{newScroll:this.$element.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.$element.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};if(a&&(!t.vertical.oldScroll||!t.vertical.newScroll)){n[m]("refresh")}n.each(t,function(t,r){var i,o,l;l=[];o=r.newScroll>r.oldScroll;i=o?r.forward:r.backward;n.each(e.waypoints[t],function(t,e){var n,i;if(r.oldScroll<(n=e.offset)&&n<=r.newScroll){return l.push(e)}else if(r.newScroll<(i=e.offset)&&i<=r.oldScroll){return l.push(e)}});l.sort(function(t,e){return t.offset-e.offset});if(!o){l.reverse()}return n.each(l,function(t,e){if(e.options.continuous||t===l.length-1){return e.trigger([i])}})});return this.oldScroll={x:t.horizontal.newScroll,y:t.vertical.newScroll}};t.prototype.refresh=function(){var t,e,r,i=this;r=n.isWindow(this.element);e=this.$element.offset();this.doScroll();t={horizontal:{contextOffset:r?0:e.left,contextScroll:r?0:this.oldScroll.x,contextDimension:this.$element.width(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:r?0:e.top,contextScroll:r?0:this.oldScroll.y,contextDimension:r?n[m]("viewportHeight"):this.$element.height(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};return n.each(t,function(t,e){return n.each(i.waypoints[t],function(t,r){var i,o,l,s,f;i=r.options.offset;l=r.offset;o=n.isWindow(r.element)?0:r.$element.offset()[e.offsetProp];if(n.isFunction(i)){i=i.apply(r.element)}else if(typeof i==="string"){i=parseFloat(i);if(r.options.offset.indexOf("%")>-1){i=Math.ceil(e.contextDimension*i/100)}}r.offset=o-e.contextOffset+e.contextScroll-i;if(r.options.onlyOnScroll&&l!=null||!r.enabled){return}if(l!==null&&l<(s=e.oldScroll)&&s<=r.offset){return r.trigger([e.backward])}else if(l!==null&&l>(f=e.oldScroll)&&f>=r.offset){return r.trigger([e.forward])}else if(l===null&&e.oldScroll>=r.offset){return r.trigger([e.forward])}})})};t.prototype.checkEmpty=function(){if(n.isEmptyObject(this.waypoints.horizontal)&&n.isEmptyObject(this.waypoints.vertical)){this.$element.unbind([p,y].join(" "));return delete c[this.id]}};return t}();l=function(){function t(t,e,r){var i,o;r=n.extend({},n.fn[g].defaults,r);if(r.offset==="bottom-in-view"){r.offset=function(){var t;t=n[m]("viewportHeight");if(!n.isWindow(e.element)){t=e.$element.height()}return t-n(this).outerHeight()}}this.$element=t;this.element=t[0];this.axis=r.horizontal?"horizontal":"vertical";this.callback=r.handler;this.context=e;this.enabled=r.enabled;this.id="waypoints"+v++;this.offset=null;this.options=r;e.waypoints[this.axis][this.id]=this;s[this.axis][this.id]=this;i=(o=this.element[w])!=null?o:[];i.push(this.id);this.element[w]=i}t.prototype.trigger=function(t){if(!this.enabled){return}if(this.callback!=null){this.callback.apply(this.element,t)}if(this.options.triggerOnce){return this.destroy()}};t.prototype.disable=function(){return this.enabled=false};t.prototype.enable=function(){this.context.refresh();return this.enabled=true};t.prototype.destroy=function(){delete s[this.axis][this.id];delete this.context.waypoints[this.axis][this.id];return this.context.checkEmpty()};t.getWaypointsByElement=function(t){var e,r;r=t[w];if(!r){return[]}e=n.extend({},s.horizontal,s.vertical);return n.map(r,function(t){return e[t]})};return t}();d={init:function(t,e){var r;if(e==null){e={}}if((r=e.handler)==null){e.handler=t}this.each(function(){var t,r,i,s;t=n(this);i=(s=e.context)!=null?s:n.fn[g].defaults.context;if(!n.isWindow(i)){i=t.closest(i)}i=n(i);r=c[i[0][u]];if(!r){r=new o(i)}return new l(t,r,e)});n[m]("refresh");return this},disable:function(){return d._invoke.call(this,"disable")},enable:function(){return d._invoke.call(this,"enable")},destroy:function(){return d._invoke.call(this,"destroy")},prev:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e>0){return t.push(n[e-1])}})},next:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e<n.length-1){return t.push(n[e+1])}})},_traverse:function(t,e,i){var o,l;if(t==null){t="vertical"}if(e==null){e=r}l=h.aggregate(e);o=[];this.each(function(){var e;e=n.inArray(this,l[t]);return i(o,e,l[t])});return this.pushStack(o)},_invoke:function(t){this.each(function(){var e;e=l.getWaypointsByElement(this);return n.each(e,function(e,n){n[t]();return true})});return this}};n.fn[g]=function(){var t,r;r=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(d[r]){return d[r].apply(this,t)}else if(n.isFunction(r)){return d.init.apply(this,arguments)}else if(n.isPlainObject(r)){return d.init.apply(this,[null,r])}else if(!r){return n.error("jQuery Waypoints needs a callback function or handler option.")}else{return n.error("The "+r+" method does not exist in jQuery Waypoints.")}};n.fn[g].defaults={context:r,continuous:true,enabled:true,horizontal:false,offset:0,triggerOnce:false};h={refresh:function(){return n.each(c,function(t,e){return e.refresh()})},viewportHeight:function(){var t;return(t=r.innerHeight)!=null?t:i.height()},aggregate:function(t){var e,r,i;e=s;if(t){e=(i=c[n(t)[0][u]])!=null?i.waypoints:void 0}if(!e){return[]}r={horizontal:[],vertical:[]};n.each(r,function(t,i){n.each(e[t],function(t,e){return i.push(e)});i.sort(function(t,e){return t.offset-e.offset});r[t]=n.map(i,function(t){return t.element});return r[t]=n.unique(r[t])});return r},above:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset<=t.oldScroll.y})},below:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset>t.oldScroll.y})},left:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset<=t.oldScroll.x})},right:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset>t.oldScroll.x})},enable:function(){return h._invoke("enable")},disable:function(){return h._invoke("disable")},destroy:function(){return h._invoke("destroy")},extendFn:function(t,e){return d[t]=e},_invoke:function(t){var e;e=n.extend({},s.vertical,s.horizontal);return n.each(e,function(e,n){n[t]();return true})},_filter:function(t,e,r){var i,o;i=c[n(t)[0][u]];if(!i){return[]}o=[];n.each(i.waypoints[e],function(t,e){if(r(i,e)){return o.push(e)}});o.sort(function(t,e){return t.offset-e.offset});return n.map(o,function(t){return t.element})}};n[m]=function(){var t,n;n=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(h[n]){return h[n].apply(null,t)}else{return h.aggregate.call(null,n)}};n[m].settings={resizeThrottle:100,scrollThrottle:30};return i.load(function(){return n[m]("refresh")})})}).call(this);
