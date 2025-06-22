<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Color;

class Company extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Company>
     */
    public static $model = \App\Models\Company::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'cvr_number'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Image::make('Logo')
                ->disk('public')
                ->path('logos'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('CVR Number')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Text::make('Billing Email')
                ->sortable()
                ->rules('nullable', 'email', 'max:255'),

            Color::make('Theme')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Textarea::make('Description')
                ->rules('nullable'),

            Boolean::make('White Label Enabled', 'white_label_enabled')
                ->help('When enabled, this company\'s logo will appear in the header instead of the default logo')
                ->showOnIndex(),

            MultiSelect::make('Blacklisted Companies', 'blacklisted_companies')
                ->options(function () {
                    // Get all companies except the current one
                    $currentId = $this->resource?->id;
                    return \App\Models\Company::when($currentId, function ($query) use ($currentId) {
                        return $query->where('id', '!=', $currentId);
                    })->pluck('name', 'id')->toArray();
                })
                ->rules('nullable')
                ->displayUsingLabels()
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    if ($request->filled($requestAttribute)) {
                        $values = $request->input($requestAttribute);
                        
                        if (is_string($values)) {
                            $values = json_decode($values, true);
                        }
                        
                        $model->blacklistedCompanies()->sync($values);
                    }
                })
                ->resolveUsing(function ($value, $model) {
                    return $model->blacklistedCompanies->pluck('id')->toArray();
                }),

            HasMany::make('Users'),
            HasMany::make('Offers'),
        ];
    }

    /**
     * Get the cards available for the resource.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array<int, \Laravel\Nova\Filters\Filter>
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array<int, \Laravel\Nova\Lenses\Lens>
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array<int, \Laravel\Nova\Actions\Action>
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
