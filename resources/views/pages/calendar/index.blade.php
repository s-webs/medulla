<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/vendor/fullcalendar/css/fullcalendar.min.css"/>
    <link rel="stylesheet" href="/vendor/fullcalendar/css/bootstrap.min.css">
    <link rel="stylesheet" href='/vendor/fullcalendar/css/select2.min.css'/>
    <link rel="stylesheet" href='/vendor/fullcalendar/css/bootstrap-datetimepicker.min.css'/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/assets/fullcalendar/css/main.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div id="wrapper">
        <div id="loading"></div>
        <div id="calendar"></div>
    </div>

    <!-- Modal для создания записи -->
    <div class="modal fade" tabindex="-1" role="dialog" id="eventModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Создать запись</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="doctor-id">Доктор</label>
                            <select class="inputModal" type="text" name="doctor-id" id="doctor-id">
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="name">Имя</label>
                            <input class="inputModal" type="text" name="name" id="name" required="required"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="phone">Телефон</label>
                            <input class="inputModal" type="text" name="phone" id="phone" required="required"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="email">Email</label>
                            <input class="inputModal" type="email" name="email" id="email"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="edit-start">Дата приема</label>
                            <input class="inputModal" type="text" name="edit-start" id="edit-start" readonly/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="time-select">Время приема</label>
                            <select class="inputModal" name="time-select" id="time-select">
                                <!-- Здесь будет заполняться список доступного времени -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary" id="save-event">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal для редактирования записи -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editEventModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Редактировать запись</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="edit-doctor-id">Доктор</label>
                            <select class="inputModal" type="text" name="edit-doctor-id" id="edit-doctor-id">
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="edit-name">Имя</label>
                            <input class="inputModal" type="text" name="edit-name" id="edit-name" required="required"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="edit-phone">Телефон</label>
                            <input class="inputModal" type="text" name="edit-phone" id="edit-phone" required="required"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="edit-email">Email</label>
                            <input class="inputModal" type="email" name="edit-email" id="edit-email"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="edit-start-date">Дата приема</label>
                            <input class="inputModal" type="text" name="edit-start-date" id="edit-start-date" readonly/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="edit-time-select">Время приема</label>
                            <select class="inputModal" name="edit-time-select" id="edit-time-select">
                                <!-- Здесь будет заполняться список доступного времени -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary" id="update-event">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/vendor/fullcalendar/js/jquery.min.js"></script>
<script src="/vendor/fullcalendar/js/bootstrap.min.js"></script>
<script src="/vendor/fullcalendar/js/moment.min.js"></script>
<script src="/vendor/fullcalendar/js/fullcalendar.min.js"></script>
<script src="/vendor/fullcalendar/js/ru.js"></script>
<script src="/vendor/fullcalendar/js/select2.min.js"></script>
<script src="/vendor/fullcalendar/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/fullcalendar/js/main.js"></script>
<script src="/assets/fullcalendar/js/addEvent.js"></script>
<script src="/assets/fullcalendar/js/editEvent.js"></script>
<script src="/assets/fullcalendar/js/etcSetting.js"></script>
</body>
</html>
