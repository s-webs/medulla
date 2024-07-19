<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    * {
        font-family: 'dejavu sans', serif !important;
    }
</style>
<div>
    <img src="{{public_path('/images/kolontitul.png')}}" alt="" style="width: 100%">
</div>
<div style="border: 1px solid #000; padding: 20px; margin-top: 40px;">
    <div>
        <p style="text-align: center; font-size: 24px;">Талон на запись к врачу
            № {{$entry->id}}</p>
    </div>

    <div class="mt-12 border p-8">
        <p class="mb-8"><strong>Тариф:</strong> {{$entry->plan}}</p>
        <p class="mb-8"><strong>Время и дата приема:</strong> {{$entry->start}}</p>
        <p class="mb-8"><strong>Кабинет:</strong> {{$entry->doctor->cabinet}}</p>
        <p class="mb-8"><strong>Врач ({{$entry->doctor->speciality}}):</strong> {{$entry->doctor->name}}</p>
        <p class="mb-8"><strong>Пациент:</strong> {{$entry->name}}</p>

        <div class="mt-12" style="margin-top: 50px;">
            <img src="data:image/png;base64, {!! $qrCode !!}" alt="qrCode">
        </div>
    </div>
</div>
</body>
</html>
