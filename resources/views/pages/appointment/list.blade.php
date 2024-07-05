<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Ваши записи | Medulla - Клиника инновационной нейрореабилитации</title>
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
        width: 33.3%;
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

    .radio-content {
        font-size: 12px;
        color: #666;
        margin-top: 10px;
    }

    .radio-content p {
        border-bottom: 0.5px solid #acacac;
        margin: 0 0 2px 0;
    }
</style>

<!-- partial:index.partial.html -->
<!-- MultiStep Form -->
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
                <li class="active">Введите ваш email</li>
                <li>Получение талонов</li>
                <li>Вернуться на сайт</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Введите ваш Email</h2>
                <input type="text" name="email" id="email" placeholder="Введите ваш email" style="margin-top: 20px;"/>

                <input type="button" name="next" class="next action-button" value="Далее"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Список талонов</h2>

                <div class="list-group" id="appointments-list"
                     style="margin-top: 20px; text-align: start; height: 300px; overflow-y: scroll">
                    <!-- Записи будут добавлены здесь -->
                </div>
                <div class="no-appointments-message" style="display: none;">
                    <p>По данному email записи не найдены</p>
                </div>

                <input type="button" name="previous" class="previous action-button-previous" value="Назад"/>
                <input type="button" name="next" class="next action-button" value="Далее"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Возврат на сайт</h2>
                <div style="height: 40px;"></div>
                <a href="{{route('home')}}" class="next action-button">Вернуться на сайт</a>
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
        var current_fs, next_fs, previous_fs; // fieldsets
        var left, opacity, scale; // fieldset properties which we will animate
        var animating; // flag to prevent quick multi-click glitches

        function showNextFieldset() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            // Activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            // Show the next fieldset
            next_fs.show();
            // Hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    // As the opacity of current_fs reduces to 0 - stored in "now"
                    // 1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    // 2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    // 3. increase opacity of next_fs to 1 as it moves in
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
                // This comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        }

        $(".next").click(function () {
            if ($(this).parent().find("input[name='email']").length) {
                var email = $("input[name='email']").val();
                if (!email) {
                    alert("Введите email");
                    return false;
                }
                fetchAppointments(email);
            } else {
                showNextFieldset.call(this);
            }
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            // De-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            // Show the previous fieldset
            previous_fs.show();
            // Hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    // As the opacity of current_fs reduces to 0 - stored in "now"
                    // 1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    // 2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    // 3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                easing: 'easeInOutBack'
            });
        });

        function fetchAppointments(email) {
            $.ajax({
                url: '/user-appointments/' + encodeURIComponent(email),
                method: 'GET',
                success: function (response) {
                    var appointmentsList = $("#appointments-list");
                    var noAppointmentsMessage = $(".no-appointments-message");

                    appointmentsList.empty();
                    noAppointmentsMessage.hide();

                    if (response.length > 0) {
                        response.forEach(function (appointment) {
                            var item = '<a href="' + appointment.pdf + '" class="list-group-item">' +
                                'Врач: ' + appointment.doctor_name + '<br>' +
                                'Дата: ' + appointment.start + '<br>' +
                                'Пациент: ' + appointment.name +
                                '</a>';
                            appointmentsList.append(item);
                        });
                    } else {
                        noAppointmentsMessage.show();
                    }

                    showNextFieldset.call($("input[name='next']")[0]);
                },
                error: function () {
                    alert('Ошибка при получении записей.');
                }
            });
        }

        function getQueryParam(param) {
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        var emailParam = getQueryParam('email');
        if (emailParam) {
            $("input[name='email']").val(emailParam);
            fetchAppointments(emailParam);
        }
    });
</script>
</body>
</html>
