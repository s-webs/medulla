<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\BlogResource;
use App\MoonShine\Resources\DoctorsResource;
use App\MoonShine\Resources\GalleryResource;
use App\MoonShine\Resources\PlanResource;
use App\MoonShine\Resources\ReviewResource;
use App\MoonShine\Resources\ServicesResource;
use App\MoonShine\Resources\SettingResource;
use App\MoonShine\Resources\TeamResource;
use MoonShine\Menu\MenuDivider;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuItem::make('Вернуться на главную', '/')
                ->blank(),
            MenuDivider::make(),
            MenuItem::make('Команда', new TeamResource()),
            MenuItem::make('Галерея', new GalleryResource()),
            MenuItem::make('Услуги', new ServicesResource()),
            MenuItem::make('Отзывы', new ReviewResource()),
            MenuItem::make('Блог', new BlogResource()),
            MenuItem::make('Тарифы', new PlanResource()),
            MenuDivider::make(),
            MenuItem::make('Врачи для записи', new DoctorsResource()),
            MenuItem::make('Календарь записей', '/calendar')->blank(),
            MenuDivider::make(),
            MenuItem::make(
                static fn() => __('moonshine::ui.resource.admins_title'),
                new MoonShineUserResource()
            ),
            MenuItem::make('Настройки', new SettingResource())
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
