<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

use Laravel\Nova\Http\Requests\NovaRequest;

class Type extends Resource
{
    public static $model = \App\Models\Type::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'slug'
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255'),

        ];
    }
} 