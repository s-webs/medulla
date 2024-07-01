!(function (e, t) {
	"object" == typeof exports && "object" == typeof module
		? (module.exports = t(require("moment"), require("fullcalendar")))
		: "function" == typeof define && define.amd
		? define(["moment", "fullcalendar"], t)
		: "object" == typeof exports
		? t(require("moment"), require("fullcalendar"))
		: t(e.moment, e.FullCalendar)
})("undefined" != typeof self ? self : this, function (e, t) {
	return (function (e) {
		function t(r) {
			if (n[r]) return n[r].exports
			var o = (n[r] = { i: r, l: !1, exports: {} })
			return e[r].call(o.exports, o, o.exports, t), (o.l = !0), o.exports
		}
		var n = {}
		return (
			(t.m = e),
			(t.c = n),
			(t.d = function (e, n, r) {
				t.o(e, n) ||
					Object.defineProperty(e, n, {
						configurable: !1,
						enumerable: !0,
						get: r,
					})
			}),
			(t.n = function (e) {
				var n =
					e && e.__esModule
						? function () {
								return e.default
						  }
						: function () {
								return e
						  }
				return t.d(n, "a", n), n
			}),
			(t.o = function (e, t) {
				return Object.prototype.hasOwnProperty.call(e, t)
			}),
			(t.p = ""),
			t((t.s = 151))
		)
	})({
		0: function (t, n) {
			t.exports = e
		},
		1: function (e, n) {
			e.exports = t
		},
		151: function (e, t, n) {
			Object.defineProperty(t, "__esModule", { value: !0 }), n(152)
			var r = n(1)
			r.datepickerLocale("ru", "ru", {
				closeText: "Закрыть",
				prevText: "Пред",
				nextText: "След",
				currentText: "Сегодня",
				monthNames: [
					"Январь",
					"Февраль",
					"Март",
					"Апрель",
					"Май",
					"Июнь",
					"Июль",
					"Август",
					"Сентябрь",
					"Октябрь",
					"Ноябрь",
					"Декабрь",
				],
				monthNamesShort: [
					"Январь",
					"Февраль",
					"Март",
					"Апрель",
					"Май",
					"Июнь",
					"Июль",
					"Август",
					"Сентябрь",
					"Октябрь",
					"Ноябрь",
					"Декабрь",
				],
				dayNames: [
					"Воскресенье",
					"Понедельник",
					"Вторник",
					"Среда",
					"Четверг",
					"Пятница",
					"Суббота",
				],
				dayNamesShort: ["ВС", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"],
				dayNamesMin: ["ВС", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"],
				weekHeader: "주",
				dateFormat: "yy. m. d.",
				firstDay: 0,
				isRTL: !1,
				showMonthAfterYear: !0,
				yearSuffix: "",
			}),
				r.locale("ru", {
					buttonText: {
						month: "месяц",
						week: "неделя",
						day: "день",
						list: "список",
					},
					allDayText: "Все дни",
					eventLimitText: "개",
					noEventsMessage: "Нет записей",
				})
		},
		152: function (e, t, n) {
			!(function (e, t) {
				t(n(0))
			})(0, function (e) {
				return e.defineLocale("ru", {
					months:
						"ЯНВАРЬ_ФЕВРАЛЬ_МАРТ_АПРЕЛЬ_МАЙ_ИЮНЬ_ИЮЛЬ_АВГУСТ_СЕНТЯБРЬ_ОКТЯБРЬ_НОЯБРЬ_ДЕКАБРЬ".split(
							"_"
						),
					monthsShort: "Янв_Фев_Мар_Апр_Май_Июн_Июл_Авг_Сен_Окт_Ноя_Дек".split(
						"_"
					),
					weekdays:
						"Воскресенье_Понедельник_Вторник_Среда_Четверг_Пятница_Суббота".split(
							"_"
						),
					weekdaysShort: "ВС_ПН_ВТ_СР_ЧТ_ПТ_СБ".split("_"),
					weekdaysMin: "ВС_ПН_ВТ_СР_ЧТ_ПТ_CБ".split("_"),
					longDateFormat: {
						LT: "A h:mm",
						LTS: "A h:mm:ss",
						L: "YYYY.MM.DD.",
						LL: "YYYY MMMM D",
						LLL: "YYYY MMMM D A h:mm",
						LLLL: "YYYY MMMM D dddd A h:mm",
						l: "YYYY.MM.DD.",
						ll: "YYYY MMMM D",
						lll: "YYYY MMMM D A h:mm",
						llll: "YYYY MMMM D dddd A h:mm",
					},
					calendar: {
						sameDay: "Сегодня LT",
						nextDay: "Завтра LT",
						nextWeek: "dddd LT",
						lastDay: "Вчера LT",
						lastWeek: "Прошлая неделя dddd LT",
						sameElse: "L",
					},
					relativeTime: {
						future: "%s После",
						past: "%s До",
						s: "Несколько секунд",
						ss: "%d секунд",
						m: "1 минут",
						mm: "%d минут",
						h: "Один час",
						hh: "%d Время",
						d: "День",
						dd: "%d",
						M: "Один месяц",
						MM: "%d месяц",
						y: "일 год",
						yy: "%d год",
					},
					dayOfMonthOrdinalParse: /\d{1,2}(День|Месяц|Год)/,
					ordinal: function (e, t) {
						switch (t) {
							case "d":
							case "D":
							case "DDD":
								return e
							case "M":
								return e
							case "w":
							case "W":
								return e
							default:
								return e
						}
					},
					meridiemParse: /AM|PM/,
					isPM: function (e) {
						return "PM" === e
					},
					meridiem: function (e, t, n) {
						return e < 12 ? "АМ" : "PM"
					},
				})
			})
		},
	})
})
