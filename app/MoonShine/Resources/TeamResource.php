<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

use MoonShine\Fields\Image;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Team>
 */
class TeamResource extends ModelResource
{
    protected string $model = Team::class;

    protected string $title = 'Команда';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    public function redirectAfterSave(): string
    {
        return '/crm/resource/team-resource/index-page';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Image::make('Фотография', 'image')
                    ->dir('team')
                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'webp', 'svg', 'webp']),
                Text::make('Полное имя', 'name'),
                Text::make('Специальность (Должность)', 'speciality'),
                Select::make('Страна', 'country')
                    ->options([
                        'Казахстан' => 'Казахстан',
                        'Россия' => 'Россия'
                    ]),
                Text::make('Город', 'city'),
            ]),
        ];
    }

    /**
     * @param Team $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
