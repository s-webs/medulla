<?php

declare(strict_types=1);

namespace App\MoonShine\Components;

use Closure;
use Illuminate\Contracts\View\View;
use MoonShine\Components\MoonShineComponent;

/**
 * @method static static make()
 */
final class Calendar extends MoonShineComponent
{
    protected string $view = 'livewire.entries-calendar';

    public function __construct()
    {
        //
    }

    /*
     * @return array<string, mixed>
     */
    protected function viewData(): array
    {
        return [];
    }
}
