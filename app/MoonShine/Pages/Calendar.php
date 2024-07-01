<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class Calendar extends Page
{

    protected array $assets = [
        '/vendor/fullcalendar/css/fullcalendar.min.css',
        '/vendor/fullcalendar/css/bootstrap.min.css',
        '/vendor/fullcalendar/css/select2.min.css',
        '/vendor/fullcalendar/css/bootstrap-datetimepicker.min.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:400,500,600',
        'https://fonts.googleapis.com/icon?family=Material+Icons'
    ];

    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Календарь';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
    {
        return [
            \App\MoonShine\Components\Calendar::make()
        ];
    }
}
