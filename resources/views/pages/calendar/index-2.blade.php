<!DOCTYPE html>
<html>
<head>
    <!-- Place favicon.ico in the root directory -->
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="/images/logo_small_ico.svg"
    />
    <title>Reception | Medulla - Клиника инновационной нейрореабилитации </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/@fullcalendar/core/main.css' rel='stylesheet'/>
    <link href='https://unpkg.com/@fullcalendar/daygrid/main.css' rel='stylesheet'/>
    <link href='https://unpkg.com/@fullcalendar/timegrid/main.css' rel='stylesheet'/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- Toasts -->
<div aria-live="polite" aria-atomic="true" style="position: absolute; top: 20px; right: 20px; z-index: 99">
    <div id="toast-container" style="">
        <!-- Всплывающие уведомления будут добавлены сюда через JavaScript -->
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Записать пациента</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Врач</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{$doctor->speciality}} | {{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-date" class="col-form-label">Дата</label>
                        <input type="date" class="form-control" id="recipient-date">
                    </div>
                    <div class="form-group">
                        <label for="recipient-time" class="col-form-label">Время</label>
                        <select class="custom-select" id="recipient-time">
                            <!-- Доступные часы будут добавлены через JavaScript -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Полное имя пациента</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-phone" class="col-form-label">Номер телефона</label>
                        <input type="text" class="form-control" id="recipient-phone">
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="recipient-email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button id="add-entry" type="button" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Редактировать запись</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="editInputGroupSelect01">Врач</label>
                        </div>
                        <select class="custom-select" id="editInputGroupSelect01">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{$doctor->speciality}} | {{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-recipient-date" class="col-form-label">Дата</label>
                        <input type="date" class="form-control" id="edit-recipient-date">
                    </div>
                    <div class="form-group">
                        <label for="edit-recipient-time" class="col-form-label">Время</label>
                        <select class="custom-select" id="edit-recipient-time">
                            <!-- Доступные часы будут добавлены через JavaScript -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-recipient-name" class="col-form-label">Полное имя пациента</label>
                        <input type="text" class="form-control" id="edit-recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="edit-recipient-phone" class="col-form-label">Номер телефона</label>
                        <input type="text" class="form-control" id="edit-recipient-phone">
                    </div>
                    <div class="form-group">
                        <label for="edit-recipient-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="edit-recipient-email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete-appointment">Удалить</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="edit-appointment">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="padding: 20px;">
    <div class="row">
        <div class="col">
            <div id='calendar'></div>
        </div>
        <div class="col-2">
            <div>
                <a href="/crm" type="button" class="btn btn-outline-info">Вернуться в панель</a>
            </div>
            <div style="margin-top: 20px">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                    Записать пациента
                </button>
            </div>

            <div style="margin-top: 20px">
                <h5>Последние записи</h5>
                <ul id="recent-entries" class="list-group">
                    <!-- Последние записи будут добавлены через JavaScript -->
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
