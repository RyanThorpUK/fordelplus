<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Http\Requests\NovaRequest;

class Offer extends Resource
{
    public static $model = \App\Models\Offer::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'offer_code'
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            
            Text::make('Company Name', function() {
                return $this->company->name;
            })->onlyOnIndex(),
            
            BelongsTo::make('Company'),

            Image::make('Image')
                ->disk('public')
                ->path('offer-images'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Date::make('Start Date')
                ->rules('required'),

            Date::make('End Date')
                ->rules('required'),

            Select::make('User Type')
                ->options([
                    'b2b' => 'B2B',
                    'b2c' => 'B2C',
                ])
                ->rules('required'),

            Select::make('Offer Type')
                ->options([
                    'discount-code' => 'Discount Code',
                    'contact-form' => 'Contact Form',
                ])
                ->rules('required'),

            Text::make('Offer Code')
                ->rules('required_if:offer_type,discount-code'),

            Text::make('Offer Link')
                ->rules('required_if:offer_type,discount-code', 'url'),

            Textarea::make('Description')
                ->rules('required'),

            BelongsTo::make('Company'),
            BelongsTo::make('Category', 'category', OfferCategory::class),
        ];
    }
} 