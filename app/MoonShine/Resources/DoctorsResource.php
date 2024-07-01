<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Doctor>
 */
class DoctorsResource extends ModelResource
{
    protected string $model = Doctor::class;

    protected string $title = 'Специалисты';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = true;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Фио специалиста', 'name'),
                Text::make('Специальность', 'speciality'),
                Select::make('Страна', 'country')
                    ->options([
                        'qazaqstan' => 'Казахстан',
                        'russia' => 'Россия'
                    ]),
                Text::make('Город', 'city'),
                Text::make('Кабинет специалиста', 'cabinet'),
                Number::make('Продолжительность приема (в минутах)', 'reception_time'),
                Switcher::make('Активен ли специалист для записи', 'active')
                    ->default(true)
            ]),
        ];
    }

    /**
     * @param Doctors $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
