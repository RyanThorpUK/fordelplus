<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class OfferCategory extends Resource
{
    public static $model = \App\Models\OfferCategory::class;

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

            BelongsTo::make('Parent', 'parent', OfferCategory::class)
                ->nullable(),

            HasMany::make('Children', 'children', OfferCategory::class),
        ];
    }
} 