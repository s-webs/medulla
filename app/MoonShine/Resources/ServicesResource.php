<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

use MoonShine\Fields\Image;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Services>
 */
class ServicesResource extends ModelResource
{
    protected string $model = Service::class;

    protected string $title = 'Услуги';

    protected bool $createInModal = true;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'name')->required(),
                Image::make('Изображение', 'image'),
                Select::make('Тип услуги', 'type')
                    ->options([
                        'diagnostic' => 'Диагностика',
                        'therapy' => 'Лечение',
                    ]),
                Textarea::make('Краткое описание', 'short_description'),
                TinyMce::make('Описание', 'description'),
                Slug::make('Slug', 'slug')
                    ->from('name')
            ]),
        ];
    }

    /**
     * @param Services $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
