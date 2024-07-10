<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Plan>
 */
class PlanResource extends ModelResource
{
    protected string $model = Plan::class;

    protected string $title = 'Тарифы';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = true;

    public function redirectAfterSave(): string
    {
        return '/crm/resource/plan-resource/index-page';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'name'),
                TinyMce::make('Описание', 'description')
                    ->hideOnIndex(),
                Number::make('Позиция', 'order'),
                Switcher::make('Выделить', 'highlight')->default(false),
                Switcher::make('Активен', 'active')
                    ->default(true),

            ]),
        ];
    }

    /**
     * @param Plan $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
