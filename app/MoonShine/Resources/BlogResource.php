<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Image;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Article>
 */
class BlogResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Блог';

    public function redirectAfterSave(): string
    {
        return '/crm/resource/blog-resource/index-page';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Image::make('Изображение', 'image')
                    ->dir('team')
                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'webp', 'svg', 'webp']),
                Text::make('Заголовок', 'title'),
                TinyMce::make('Контент', 'text')
                    ->hideOnIndex(),
                Slug::make('Slug', 'slug')
                    ->from('title')
                    ->hideOnIndex(),
            ]),
        ];
    }

    /**
     * @param Blog $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
