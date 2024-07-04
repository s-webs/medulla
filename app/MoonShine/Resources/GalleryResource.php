<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;

use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Gallery>
 */
class GalleryResource extends ModelResource
{
    protected string $model = Gallery::class;

    protected string $title = 'Галерея';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    public function redirectAfterSave(): string
    {
        return '/crm/resource/gallery-resource/index-page';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название фото', 'name'),
                Image::make('Изображение', 'image')
                    ->dir('gallery')
                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'webp', 'svg', 'webp']),
            ]),
        ];
    }

    /**
     * @param Gallery $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
