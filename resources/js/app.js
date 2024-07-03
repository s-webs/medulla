import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle';
import 'popper.js/dist/popper.min';
import {Calendar} from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import ruLocale from '@fullcalendar/core/locales/ru';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showToast(message, type) {
    const toastId = `toast-${Date.now()}`;
    const toastHtml = `
        <div id="${toastId}" class="alert alert-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="">
            <div class="toast-body">
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                ${message}
                <p></p>
            </div>
        </div>`;
    $('#toast-container').append(toastHtml);
    $(`#${toastId}`).toast('show').on('hidden.bs.toast', function () {
        $(this).remove();
    });
}

function loadRecentEntries() {
    $.ajax({
        url: '/recent-entries',
        method: 'GET',
        success: function (response) {
            const recentEntriesList = $('#recent-entries');
            recentEntriesList.empty();
            response.forEach(function (entry) {
                recentEntriesList.append(`<li class="list-group-item" style="font-size: 0.8rem;"><strong>${entry.start}4</strong> <br/> Врач: ${entry.doctor_name} <br> Пациент: ${entry.name}</li>`);
            });
        },
        error: function () {
            alert('Ошибка при загрузке последних записей.');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        locale: ruLocale,
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridDay',
        slotMinTime: '09:00:00',
        slotMaxTime: '20:00:00',
        slotDuration: '00:15:00',
        slotLabelInterval: '00:15:00',
        timeZone: 'Asia/Almaty',
        selectable: true,
        editable: false,
        eventStartEditable: false,
        eventDurationEditable: false,
        allDaySlot: false,
        events: '/entries',
        eventDidMount: function (info) {
            info.el.style.backgroundColor = info.event.extendedProps.doctor.color;
        },
        eventContent: function (info) {
            const startTime = info.event.start.toISOString().split('T')[1].slice(0, 5);
            const endTime = info.event.end.toISOString().split('T')[1].slice(0, 5);
            const patientName = info.event.extendedProps.name;
            const doctorName = info.event.extendedProps.doctor.name;
            const doctorSpeciality = info.event.extendedProps.doctor.speciality;
            if (info.view.type === 'timeGridDay') {
                return {
                    html: `<div style="">${doctorSpeciality} - ${doctorName} | Пациент: ${patientName} | ${startTime} - ${endTime}</div>`
                };
            } else {
                return {
                    html: `<div>${startTime} - ${endTime}</div>`
                };
            }
        },
        dateClick: function (info) {
            // Обработка клика на дату для создания новой записи
            $('#exampleModal').modal('show');
            $('#exampleModal').find('form')[0].reset(); // Очистить форму
            $('#recipient-time').empty(); // Очистить список доступных времен
        },
        eventClick: function (info) {
            // Обработка клика на событие для редактирования
            const event = info.event;
            $('#editModal').modal('show');
            $('#editModal').data('eventId', event.id);
            $('#editInputGroupSelect01').val(event.extendedProps.doctor_id);
            $('#edit-recipient-name').val(event.extendedProps.name);
            $('#edit-recipient-phone').val(event.extendedProps.phone);
            $('#edit-recipient-email').val(event.extendedProps.email);
            $('#edit-recipient-date').val(event.start.toISOString().split('T')[0]);
            loadAvailableTimes(event.extendedProps.doctor_id, event.start.toISOString().split('T')[0], '#edit-recipient-time');
            $('#edit-recipient-time').val(event.start.toISOString().split('T')[1].slice(0, 5));
        },
        slotLabelFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        }
    });

    calendar.render();

    function loadAvailableTimes(doctorId, date, timeSelectId) {
        if (doctorId && date) {
            $.ajax({
                url: '/get-available-times',
                method: 'GET',
                data: {
                    doctor_id: doctorId,
                    date: date
                },
                success: function (response) {
                    const availableTimes = response.available_times;
                    const timeSelect = $(timeSelectId);
                    timeSelect.empty();
                    availableTimes.forEach(function (time) {
                        timeSelect.append(new Option(time, time));
                    });
                },
                error: function () {
                    alert('Ошибка при получении доступных часов.');
                }
            });
        }
    }

    $('#inputGroupSelect01').on('change', function () {
        $('#recipient-date').val(''); // Сбросить дату
        $('#recipient-time').empty(); // Очистить список доступных времен
    });

    $('#editInputGroupSelect01').on('change', function () {
        $('#edit-recipient-date').val(''); // Сбросить дату
        $('#edit-recipient-time').empty(); // Очистить список доступных времен
    });

    $('#recipient-date').on('change', function () {
        const doctorId = $('#inputGroupSelect01').val();
        const date = $(this).val();
        loadAvailableTimes(doctorId, date, '#recipient-time');
    });

    $('#edit-recipient-date').on('change', function () {
        const doctorId = $('#editInputGroupSelect01').val();
        const date = $(this).val();
        loadAvailableTimes(doctorId, date, '#edit-recipient-time');
    });

    // Обработчик для кнопки "Добавить" в модальном окне
    $('#add-entry').on('click', function () {
        const doctorId = $('#inputGroupSelect01').val();
        const date = $('#recipient-date').val();
        const time = $('#recipient-time').val();
        const name = $('#recipient-name').val();
        const phone = $('#recipient-phone').val();
        const email = $('#recipient-email').val();
        const status = 'scheduled';
        const start = `${date} ${time}:00`; // Формируем полное время начала

        $.ajax({
            url: '/entries',
            method: 'POST',
            data: {
                doctor_id: doctorId,
                name: name,
                phone: phone,
                email: email,
                start: start,
                // end будет рассчитан на сервере
                status: status,
            },
            success: function () {
                $('#exampleModal').modal('hide'); // Закрыть модальное окно
                $('#exampleModal').find('form')[0].reset(); // Очистить форму
                $('#recipient-time').empty(); // Очистить список доступных времен
                calendar.refetchEvents();
                showToast('Запись успешно добавлена', 'Успех');
                loadRecentEntries(); // Обновить список последних записей
            },
            error: function () {
                alert('Ошибка при добавлении записи.');
            }
        });
    });

    // Обработчик для кнопки "Сохранить изменения" в модальном окне редактирования
    $('#edit-appointment').on('click', function () {
        const eventId = $('#editModal').data('eventId');
        const doctorId = $('#editInputGroupSelect01').val();
        const date = $('#edit-recipient-date').val();
        const time = $('#edit-recipient-time').val();
        const name = $('#edit-recipient-name').val();
        const phone = $('#edit-recipient-phone').val();
        const email = $('#edit-recipient-email').val();
        const start = `${date} ${time}:00`; // Формируем полное время начала

        $.ajax({
            url: `/entries/${eventId}`,
            method: 'PUT',
            data: {
                doctor_id: doctorId,
                name: name,
                phone: phone,
                email: email,
                start: start,
                // end будет рассчитан на сервере
            },
            success: function () {
                $('#editModal').modal('hide'); // Закрыть модальное окно
                $('#editModal').find('form')[0].reset(); // Очистить форму
                calendar.refetchEvents(); // Обновить события календаря
                showToast('Запись успешно обновлена', 'Успех');
                loadRecentEntries(); // Обновить список последних записей
            },
            error: function () {
                alert('Ошибка при редактировании записи.');
            }
        });
    });

    // Обработчик для кнопки "Удалить" в модальном окне редактирования
    $('#delete-appointment').on('click', function () {
        const eventId = $('#editModal').data('eventId');

        $.ajax({
            url: `/entries/${eventId}`,
            method: 'DELETE',
            success: function () {
                $('#editModal').modal('hide'); // Закрыть модальное окно
                $('#editModal').find('form')[0].reset(); // Очистить форму
                calendar.refetchEvents(); // Обновить события календаря
                showToast('Запись успешно удалена', 'Успех');
                loadRecentEntries(); // Обновить список последних записей
            },
            error: function () {
                alert('Ошибка при удалении записи.');
            }
        });
    });

    // Загрузка последних записей при загрузке страницы
    loadRecentEntries();

    // Установка минимальной даты для выбора даты (не позволяя выбирать прошедшие даты)
    const today = new Date().toISOString().split('T')[0];
    $('#recipient-date').attr('min', today);
    $('#edit-recipient-date').attr('min', today);
});
