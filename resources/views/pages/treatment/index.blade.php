@extends('layout.master')
@section('content')
    @include('components.breadcrumbs', ['title' => 'Подход к лечению', 'image' => '/images/clinic_05.png'])

    <section class="project-area pt-125 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tpprosolution pb-30 wow fadeInUp" data-wow-delay=".2s">
                        <p>
                            Диагноз аутизм – это синдром, который не лечится. С ним просто нужно наблюдаться у психиатра
                            и учиться жить. В то же время, органические поражения мозга лечит неврология, и успешно.
                        </p>
                        <p>
                            Вполне возможно, что диагноз аутизм, РАС, ЗПРР и прочие «страшные» диагнозы, которые были
                            поставлены вашему ребенку, были поставлены ему не совсем верно и не имеют отношения к
                            психиатрии. Все они могут быть связаны с формированием мозга на любом этапе беременности,
                            родов или неонатального периода, что и привело к задержке развития. Все эти проблемы
                            относятся к органическо-резидаульному поражению ЦНС и лечить их нужно не у психиатра, а у
                            невролога. Диагностика у высококлассного специалиста, проведенная как можно раньше, точно
                            назовет проблему. Это и есть постановка дифференциального диагноза – основа основ
                            диагностики. И если это не аутизм, то пролеченная неврология может вернуть здоровье малышу.
                            Именно невролог сможет стабилизировать органику и «снять» диагноз
                        </p>
                        <p>
                            На точной, доступной диагностике и постановке дифференциального диагноза и построен
                            авторский метод Александры Максимовой.
                        </p>
                        <p>
                            В клинике Medulla, Александра Максимова лично, по предварительной записи, проводит первичный
                            прием в ходе которого собирает тщательный анамнез и исследует пациента на
                            нейроэнергокартографе. По итогам приема для каждого пациента составляется индивидуальный
                            протокол, включающий маршрут реабилитации и рекомендации по фармацевтической терапии.
                            Протокол обычно рассчитан на длительный срок до 4х месяцев. Для приезжих пациентов в клинике
                            предлагается интенсивный комплексный курс длительностью 21 день. Все время прохождения
                            протокола на связи остаются личные ассистенты Александры Максимовой, готовые ответить на
                            любые возникшие вопросы или откорректировать маршрут в зависимости от промежуточных
                            результатов.
                        </p>
                        <p>
                            Клиника предлагает все необходимые опции для диагностики и лечения, ориентируясь именно на
                            специфику пациентов с неврологическим профилем заболеваний (как правило, коды диагнозов F и
                            G по МКБ). Мы создали все условия, чтобы такие пациенты могли найти весь спектр услуг и
                            специалистов в «одном окне».
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project-area pt-125 pb-35">
        <div class="container">
            @foreach($services as $item)
                <div class="row" style="margin-bottom: 80px;">
                    <div class="col-lg-7 col-md-7">
                        <div class="tpprosolution wow fadeInUp" data-wow-delay=".2s">
                            <h5 class="tpproject-title">{{$item->name}}</h5>
                        </div>
                        <div class=" wow fadeInUp" data-wow-delay=".2s"
                             style="padding: 0 5px; margin-top: 20px;">
                            {!! $item->description !!}
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="wow fadeInUp" data-wow-delay=".2s">
                            <img src="/{{$item->image}}" alt="projrct-thumb" style="width: 100%; border-radius: 15px">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
