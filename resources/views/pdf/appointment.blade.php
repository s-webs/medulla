@extends('layout.pdf')
@section('title', 'PDF')
@section('content')
    <div class="p-8">
        <div class="text-center">
            <p class="font-bold text-lg">Талон на запись к врачу № ID</p>
        </div>

        <div class="mt-12 border p-8">
            <p class="mb-8"><strong>Время и дата приема:</strong> {{$entry->start}}</p>
            <p class="mb-8"><strong>Кабинет:</strong> {{$entry->doctor->cabinet}}</p>
            <p class="mb-8"><strong>Врач ({{$entry->doctor->speciality}}):</strong> {{$entry->doctor->name}}</p>
            <p class="mb-8"><strong>Пациент:</strong> {{$entry->name}}</p>
            <div class="mt-12">{{$qrCode}}</div>
        </div>
    </div>
@endsection
