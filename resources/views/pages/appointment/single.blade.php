<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Запись на приём | Medulla - Клиника инновационной нейрореабилитации</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo_small_ico.svg"/>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<style>
    /*custom font*/
    @import url(https://fonts.googleapis.com/css?family=Montserrat);

    /*basic reset*/
    * {
        margin: 0;
        padding: 0;
    }

    html {
        height: 100%;
        background: #3d4671; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #3d4671, #202c4c); /* Chrome 10-25, Safari 5.1-6 */
    }

    body {
        font-family: montserrat, arial, verdana;
        background: transparent;
    }

    /*form styles*/
    #msform {
        text-align: center;
        position: relative;
        margin-top: 30px;
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
        padding: 20px 30px;
        box-sizing: border-box;
        width: 80%;
        margin: 0 10%;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    /*inputs*/
    #msform input, #msform textarea {
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 13px;
    }

    #msform textarea {
        resize: vertical;
        min-height: 50px
    }

    #msform select {
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 13px;
    }

    #msform input:focus, #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #ee0979;
        outline-width: 0;
        transition: All 0.5s ease-in;
        -webkit-transition: All 0.5s ease-in;
        -moz-transition: All 0.5s ease-in;
        -o-transition: All 0.5s ease-in;
    }

    /*buttons*/
    #msform .action-button {
        width: 100px;
        background: #ee0979;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 25px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button:hover, #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
    }

    #msform .action-button-previous {
        width: 100px;
        background: #C5C5F1;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 25px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button-previous:hover, #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
    }

    /*headings*/
    .fs-title {
        font-size: 18px;
        text-transform: uppercase;
        color: #2C3E50;
        margin-bottom: 10px;
        letter-spacing: 2px;
        font-weight: bold;
    }

    .fs-subtitle {
        font-weight: normal;
        font-size: 13px;
        color: #666;
        margin-bottom: 20px;
    }

    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        /*CSS counters to number the steps*/
        counter-reset: step;
    }

    #progressbar li {
        list-style-type: none;
        color: white;
        text-transform: uppercase;
        font-size: 9px;
        width: 20%;
        float: left;
        position: relative;
        letter-spacing: 1px;
    }

    #progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 24px;
        height: 24px;
        line-height: 26px;
        display: block;
        font-size: 12px;
        color: #333;
        background: white;
        border-radius: 25px;
        margin: 0 auto 10px auto;
    }

    /*progressbar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: white;
        position: absolute;
        left: -50%;
        top: 9px;
        z-index: -1; /*put it behind the numbers*/
    }

    #progressbar li:first-child:after {
        /*connector not needed before the first step*/
        content: none;
    }

    /*marking active/completed steps green*/
    /*The number of the step and the connector before it = green*/
    #progressbar li.active:before, #progressbar li.active:after {
        background: #ee0979;
        color: white;
    }

    /* Not relevant to this form */
    .dme_link {
        margin-top: 30px;
        text-align: center;
    }

    .dme_link a {
        background: #FFF;
        font-weight: bold;
        color: #ee0979;
        border: 0 none;
        border-radius: 25px;
        cursor: pointer;
        padding: 5px 25px;
        font-size: 12px;
    }

    .dme_link a:hover, .dme_link a:focus {
        background: #C5C5F1;
        text-decoration: none;
    }

    .radio-block {
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 10px;
        text-align: start;
        padding: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: border-color 0.3s ease;
    }

    .radio-block:hover {
        border-color: #ee0979;
    }

    .radio-block input[type="radio"] {
        display: none;
    }

    .radio-block label {
        display: block;
        cursor: pointer;
        font-size: 16px;
        color: #333;
    }

    .radio-block input[type="radio"]:checked + label {
        border-color: #ee0979;
        color: #ee0979;
    }

    .radio-block.selected {
        border-color: #ee0979;
        color: #ee0979;
    }

    .radio-content {
        font-size: 12px;
        color: #666;
        margin-top: 10px;
    }

    .radio-content p {
        border-bottom: 0.5px solid #acacac;
        margin: 0 0 2px 0;
    }

    .radio-content ol li, .radio-content ul li {
        list-style: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="padding: 20px 0; text-align: center">
            <a href="{{route('home')}}"><img src="/images/medulla_logo_hor_left_white.svg" style="width: 250px;"
                                             alt="logo"></a>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Выбор тарифа</li>
                <li>Основная информация</li>
                <li>Дата и время приема</li>
                <li>Подтверждение</li>
                <li>Успешно</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <div>
                    <h2 class="fs-title">Выбор тарифа</h2>
                    <h3 class="fs-subtitle">Выберите подходящий для вас тариф</h3>
                </div>

                @foreach($plans as $plan)
                    <div class="radio-block">
                        <input type="radio" id="{{$plan->id}}" name="tarif" value="{{$plan->name}}">
                        <label for="{{$plan->id}}">
                            <strong>{{$plan->name}}</strong>
                            <div class="radio-content">
                                {!! $plan->description !!}
                            </div>
                        </label>
                    </div>
                @endforeach
                <br>
                <input type="button" name="next" class="next action-button" value="Далее"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Основная информаиця</h2>
                <h3 class="fs-subtitle">Заполните ваши данные</h3>

                <label for="fname">Полное имя</label>
                <input type="text" name="name" placeholder="Полное имя"/>

                <label for="fname">Телефон</label>
                <input type="text" name="phone" placeholder="Телефон"/>

                <label for="fname">Email</label>
                <input type="email" name="email" placeholder="Email"/>

                <input type="button" name="previous" class="previous action-button-previous" value="Назад"/>
                <input type="button" name="next" class="next action-button" value="Далее"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Дата и время приема</h2>
                <h3 class="fs-subtitle">Выберите специалиста, дату и доступное время для записи</h3>

                <label for="doctor">Выберите специалиста</label>
                <select id="doctor" name="doctor">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->speciality }} - {{ $doctor->name }}</option>
                    @endforeach
                </select>

                <label for="date">Выберите дату</label>
                <input type="date" id="date" name="date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>

                <label for="time">Выберите время</label>
                <select id="time" name="time">
                    <!-- Доступные часы будут добавлены через JavaScript -->
                </select>

                <input type="button" name="previous" class="previous action-button-previous" value="Назад"/>
                <input type="button" name="next" class="next action-button" value="Далее"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Подтверждение</h2>
                <h3 class="fs-subtitle">Убедитесь, что ввели корректные данные</h3>

                <input type="button" name="previous" class="previous action-button-previous" value="Назад"/>
                <input type="submit" name="submit" class="submit action-button" value="Подтвердить"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Успешно</h2>
                <h3 class="fs-subtitle">Ваша запись успешно произведена!</h3>
                <p id="countdown">3</p>
            </fieldset>
        </form>
        <!-- link to designify.me code snippets -->
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->
<!-- partial -->
<br><br><br>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {

        document.querySelectorAll('.radio-block input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.radio-block').forEach(block => block.classList.remove('selected'));
                if (radio.checked) {
                    radio.parentElement.classList.add('selected');
                }

                // Если выбран тариф с id = 2, установить врача с id = 8 и заблокировать выбор
                if (radio.id === '3') {
                    $('#doctor').val('8').prop('disabled', true);
                } else {
                    $('#doctor').prop('disabled', false);
                }
            });
        });

        // Обработчик изменения состояния радиокнопок
        $('input[name="tarif"]').change(function () {
            // Если выбрана одна из радиокнопок, активировать кнопку "Далее"
            if ($('input[name="tarif"]:checked').length > 0) {
                $('input[name="next"]').prop('disabled', false);
            } else {
                $('input[name="next"]').prop('disabled', true);
            }
        });

        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            // Проверка, выбран ли тариф
            if ($('input[name="tarif"]:checked').length === 0) {
                alert("Выберите тариф");
                return false;
            }

            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({'left': left, 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        // Добавление обработчиков для получения доступного времени
        $('#doctor, #date').on('change', function () {
            const doctorId = $('#doctor').val();
            const date = $('#date').val();

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
                        const timeSelect = $('#time');
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
        });

        // Обработчик отправки формы
        $('#msform').on('submit', function (e) {
            e.preventDefault();
            const doctorId = $('#doctor').val();
            const date = $('#date').val();
            const time = $('#time').val();
            const name = $('input[name="name"]').val();
            const phone = $('input[name="phone"]').val();
            const email = $('input[name="email"]').val();
            const status = 'scheduled';
            const start = `${date} ${time}:00`; // Формируем полное время начала

            // Показать спиннер
            const submitButton = $('input[name="submit"]');
            submitButton.prop('disabled', true);
            submitButton.val('Подождите...').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');

            $.ajax({
                url: '/entries',
                method: 'POST',
                data: {
                    doctor_id: doctorId,
                    name: name,
                    phone: phone,
                    email: email,
                    start: start,
                    status: status,
                },
                success: function (response) {
                    const pdfUrl = response.pdf; // URL к PDF из ответа сервера
                    window.open(pdfUrl, '_blank'); // Открыть PDF в новой вкладке
                    current_fs = $('fieldset:visible');
                    next_fs = current_fs.next();

                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    next_fs.show();
                    current_fs.animate({opacity: 0}, {
                        step: function (now, mx) {
                            scale = 1 - (1 - now) * 0.2;
                            left = (now * 50) + "%";
                            opacity = 1 - now;
                            current_fs.css({
                                'transform': 'scale(' + scale + ')',
                                'position': 'absolute'
                            });
                            next_fs.css({'left': left, 'opacity': opacity});
                        },
                        duration: 800,
                        complete: function () {
                            current_fs.hide();
                            animating = false;
                            // Запуск обратного отсчета
                            var countdown = 3;
                            var countdownInterval = setInterval(function () {
                                countdown--;
                                $('#countdown').text(countdown);
                                if (countdown <= 0) {
                                    clearInterval(countdownInterval);
                                    window.location.href = "{{ route('home') }}";
                                }
                            }, 1000);
                        },
                        easing: 'easeInOutBack'
                    });
                },
                error: function () {
                    alert('Ошибка при добавлении записи.');
                    // Вернуть исходное состояние кнопки
                    submitButton.prop('disabled', false);
                    submitButton.val('Подтвердить').find('.spinner-border').remove();
                }
            });
        });
    });
</script>
</body>
</html>
