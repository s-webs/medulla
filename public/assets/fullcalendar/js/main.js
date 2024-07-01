let activeInactiveWeekends = true;
$(document).ready(function () {
    // Установка CSRF токена для всех AJAX запросов
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $("#calendar").fullCalendar({
        locale: "ru",
        timezone: "local",
        nextDayThreshold: "09:00:00",
        allDaySlot: true,
        displayEventTime: true,
        displayEventEnd: true,
        firstDay: 1,
        weekNumbers: false,
        selectable: true,
        weekNumberCalculation: "ISO",
        eventLimit: true,
        views: {
            month: { eventLimit: 12 },
        },
        eventLimitClick: "week",
        navLinks: true,
        defaultDate: new Date(),
        timeFormat: "HH:mm",
        defaultTimedEventDuration: "00:15:00",
        editable: true,
        minTime: "09:00:00",
        maxTime: "17:30:00",
        slotLabelFormat: "HH:mm",
        weekends: true,
        nowIndicator: true,
        dayPopoverFormat: "MM/DD dddd",
        longPressDelay: 0,
        eventLongPressDelay: 0,
        selectLongPressDelay: 0,
        header: {
            left: "today, prevYear, nextYear, viewWeekends",
            center: "prev, title, next",
            right: "month, agendaWeek, agendaDay, listWeek",
        },
        views: {
            month: {
                columnFormat: "dddd",
            },
            agendaWeek: {
                columnFormat: "M/D ddd",
                titleFormat: "YYYY год M месяц D числа",
                eventLimit: false,
            },
            agendaDay: {
                columnFormat: "dddd",
                eventLimit: false,
            },
            listWeek: {
                columnFormat: "",
            },
        },
        customButtons: {
            //주말 숨기기 & 보이기 버튼
            viewWeekends: {
                text: "Выходные",
                click: function () {
                    activeInactiveWeekends
                        ? (activeInactiveWeekends = false)
                        : (activeInactiveWeekends = true)
                    $("#calendar").fullCalendar("option", {
                        weekends: activeInactiveWeekends,
                    })
                },
            },
        },

        eventRender: function (event, element, view) {
            console.log('Рендеринг события:', event);
            element.find('.fc-title').html(event.name + '<br>' + moment(event.start).format("HH:mm") + ' - ' + moment(event.end).format("HH:mm"));
            element.popover({
                title: $("<div />", {
                    class: "popoverTitleCalendar",
                    text: event.name,
                }).css({
                    background: event.backgroundColor,
                    color: event.textColor,
                }),
                content: $("<div />", {
                    class: "popoverInfoCalendar",
                })
                    .append("<p><strong>Пациент:</strong> " + event.name + "</p>")
                    .append(
                        "<p><strong>Время:</strong> " + getDisplayEventDate(event) + "</p>"
                    )
                    .append(
                        '<div class="popoverDescCalendar"><strong>Описание:</strong> ' +
                        event.description +
                        "</div>"
                    ),
                delay: {
                    show: "800",
                    hide: "50",
                },
                trigger: "hover",
                placement: "top",
                html: true,
                container: "body",
            });
        },

        events: function (start, end, timezone, callback) {
            $.ajax({
                type: "get",
                url: "/entries",
                success: function (response) {
                    console.log('События, полученные с сервера:', response);

                    var fixedDate = response.map(function (event) {
                        event.start = moment(event.time_start, 'YYYY-MM-DDTHH:mm:ss').toISOString();
                        event.end = moment(event.time_end, 'YYYY-MM-DDTHH:mm:ss').toISOString();
                        return event;
                    });

                    console.log('События после обработки:', fixedDate);
                    callback(fixedDate);
                    console.log('События переданы в callback');
                },
                error: function (xhr, status, error) {
                    console.error('Ошибка при получении событий:', error);
                }
            });
        },

        eventAfterAllRender: function (view) {
            if (view.name == "month") $(".fc-content").css("height", "auto");
        },

        eventResize: function (event, delta, revertFunc, jsEvent, ui, view) {
            $(".popover.fade.top").remove();

            var newDates = calDateWhenResize(event);

            $.ajax({
                type: "get",
                url: "",
                data: {},
                success: function (response) {
                    alert("Изменено: " + newDates.startDate + " ~ " + newDates.endDate);
                },
            });
        },

        eventDragStart: function (event, jsEvent, ui, view) {
            draggedEventIsAllDay = event.allDay;
        },

        eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
            $(".popover.fade.top").remove();

            if (view.type === "agendaWeek" || view.type === "agendaDay") {
                if (draggedEventIsAllDay !== event.allDay) {
                    alert("Невозможно изменить событие с целодневного на обычное и наоборот при перетаскивании.");
                    location.reload();
                    return false;
                }
            }

            var newDates = calDateWhenDragnDrop(event);

            $.ajax({
                type: "get",
                url: "",
                data: {},
                success: function (response) {
                    alert("Изменено: " + newDates.startDate + " ~ " + newDates.endDate);
                },
            });
        },

        select: function (startDate, endDate, jsEvent, view) {
            $('#edit-start').val(moment(startDate).format('YYYY-MM-DD'));
            $('#eventModal').modal('show');

            var doctorId = $('#doctor-id').val();
            fetchAvailableTimes(doctorId, moment(startDate).format('YYYY-MM-DD'));

            $('#save-event').off('click').on('click', function () {
                var doctorId = $('#doctor-id').val();
                var selectedTime = $('#time-select').val();
                var start = moment($('#edit-start').val() + 'T' + selectedTime, 'YYYY-MM-DDTHH:mm');

                $.ajax({
                    type: 'GET',
                    url: '/doctors/' + doctorId,
                    success: function (doctor) {
                        var receptionTime = doctor.reception_time;
                        var end = start.clone().add(receptionTime, 'minutes');

                        var eventData = {
                            doctor_id: doctorId,
                            name: $('#name').val(),
                            phone: $('#phone').val(),
                            email: $('#email').val(),
                            start: start.format('YYYY-MM-DDTHH:mm:ss'),
                            end: end.format('YYYY-MM-DDTHH:mm:ss'),
                            status: 'recorder'
                        };

                        $('#calendar').fullCalendar('renderEvent', eventData, true);

                        $.ajax({
                            type: 'POST',
                            url: '/entries',
                            data: {
                                doctor_id: eventData.doctor_id,
                                name: eventData.name,
                                phone: eventData.phone,
                                email: eventData.email,
                                date: start.format('YYYY-MM-DDTHH:mm:ss'),
                                time_start: start.format('YYYY-MM-DDTHH:mm:ss'),
                                time_end: end.format('YYYY-MM-DDTHH:mm:ss'),
                                status: eventData.status,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                console.log('Событие успешно создано:', response);
                                $('#eventModal').modal('hide');
                            },
                            error: function (error) {
                                console.error('Ошибка при создании события:', error);
                            }
                        });
                    },
                    error: function (error) {
                        console.error('Ошибка при получении данных доктора:', error);
                    }
                });
            });

            $('#calendar').fullCalendar('unselect');
        },

        eventClick: function (event, jsEvent, view) {
            $('#editEventModal').modal('show');

            $('#edit-doctor-id').val(event.doctor_id);
            $('#edit-name').val(event.name);
            $('#edit-phone').val(event.phone);
            $('#edit-email').val(event.email);
            $('#edit-start-date').val(moment(event.start).format('YYYY-MM-DD'));
            fetchAvailableTimes(event.doctor_id, moment(event.start).format('YYYY-MM-DD'), event.start);

            $('#update-event').off('click').on('click', function () {
                var doctorId = $('#edit-doctor-id').val();
                var selectedTime = $('#edit-time-select').val();
                var start = moment($('#edit-start-date').val() + 'T' + selectedTime, 'YYYY-MM-DDTHH:mm');

                $.ajax({
                    type: 'GET',
                    url: '/doctors/' + doctorId,
                    success: function (doctor) {
                        var receptionTime = doctor.reception_time;
                        var end = start.clone().add(receptionTime, 'minutes');

                        event.doctor_id = doctorId;
                        event.name = $('#edit-name').val();
                        event.phone = $('#edit-phone').val();
                        event.email = $('#edit-email').val();
                        event.start = start.format('YYYY-MM-DDTHH:mm:ss');
                        event.end = end.format('YYYY-MM-DDTHH:mm:ss');

                        $('#calendar').fullCalendar('updateEvent', event);

                        $.ajax({
                            type: 'PUT',
                            url: '/entries/' + event.id,
                            data: {
                                doctor_id: event.doctor_id,
                                name: event.name,
                                phone: event.phone,
                                email: event.email,
                                date: start.format('YYYY-MM-DDTHH:mm:ss'),
                                time_start: start.format('YYYY-MM-DDTHH:mm:ss'),
                                time_end: end.format('YYYY-MM-DDTHH:mm:ss'),
                                status: event.status,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                console.log('Событие успешно обновлено:', response);
                                $('#editEventModal').modal('hide');
                            },
                            error: function (error) {
                                console.error('Ошибка при обновлении события:', error);
                            }
                        });
                    },
                    error: function (error) {
                        console.error('Ошибка при получении данных доктора:', error);
                    }
                });
            });
        },

        dayClick: function (date, jsEvent, view) {
            $('#edit-start').val(date.format('YYYY-MM-DD'));
            $('#eventModal').modal('show');

            var doctorId = $('#doctor-id').val();
            fetchAvailableTimes(doctorId, date.format('YYYY-MM-DD'));
        }
    });

    function fetchAvailableTimes(doctorId, selectedDate, selectedTime = null) {
        $.ajax({
            url: '/get-available-times',
            type: 'GET',
            data: {
                doctor_id: doctorId,
                date: selectedDate
            },
            success: function (response) {
                var times = response.available_times;
                var $timeSelect = selectedTime ? $('#edit-time-select') : $('#time-select');
                $timeSelect.empty();
                times.forEach(function (time) {
                    $timeSelect.append('<option value="' + time + '">' + time + '</option>');
                });
                if (selectedTime) {
                    $timeSelect.val(moment(selectedTime).format('HH:mm'));
                }
            },
            error: function (xhr, status, error) {
                console.error('Ошибка при получении доступного времени:', error);
            }
        });
    }

    function getDisplayEventDate(event) {
        var displayEventDate;

        if (!event.allDay) {
            var startTimeEventInfo = moment(event.start).format("HH:mm");
            var endTimeEventInfo = moment(event.end).format("HH:mm");
            displayEventDate = startTimeEventInfo + " - " + endTimeEventInfo;
        } else {
            displayEventDate = "Весь день";
        }

        return displayEventDate;
    }

    function calDateWhenResize(event) {
        var newDates = {
            startDate: "",
            endDate: "",
        };

        if (event.allDay) {
            newDates.startDate = moment(event.start._d).format("YYYY-MM-DD");
            newDates.endDate = moment(event.end._d).subtract(1, "days").format("YYYY-MM-DD");
        } else {
            newDates.startDate = moment(event.start._d).format("YYYY-MM-DD HH:mm");
            newDates.endDate = moment(event.end._d).format("YYYY-MM-DD HH:mm");
        }

        return newDates;
    }

    function calDateWhenDragnDrop(event) {
        var newDates = {
            startDate: "",
            endDate: "",
        };

        if (!event.end) {
            event.end = event.start;
        }

        if (event.allDay && event.end === event.start) {
            newDates.startDate = moment(event.start._d).format("YYYY-MM-DD");
            newDates.endDate = newDates.startDate;
        } else if (event.allDay && event.end !== null) {
            newDates.startDate = moment(event.start._d).format("YYYY-MM-DD");
            newDates.endDate = moment(event.end._d).subtract(1, "days").format("YYYY-MM-DD");
        } else {
            newDates.startDate = moment(event.start._d).format("YYYY-MM-DD HH:mm");
            newDates.endDate = moment(event.end._d).format("YYYY-MM-DD HH:mm");
        }

        return newDates;
    }
});
