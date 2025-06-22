<?php

namespace App\Nova;

use App\Nova\Actions\LoginAs;
use Laravel\Nova\Auth\PasswordValidationRules;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Laravel\Nova\Fields\BelongsToMany;
use App\Models\Type;
use App\Models\UserType;

class User extends Resource
{
    use PasswordValidationRules;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'first_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field|\Laravel\Nova\Panel|\Laravel\Nova\ResourceTool|\Illuminate\Http\Resources\MergeValue>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Gravatar::make()->maxWidth(50),

            Text::make('First Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:255')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            BelongsTo::make('Company')
                ->sortable()
                ->nullable(),

            Select::make('Role')
                ->options(Role::pluck('name', 'name')->toArray())
                ->rules('required')
                ->displayUsingLabels()
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    // Remove all roles and assign the selected one
                    $model->syncRoles([$request->{$attribute}]);
                })
                ->resolveUsing(function ($value, $model) {
                    // Show the first assigned role
                    return $model->roles->pluck('name')->first();
                }),
            
            MultiSelect::make('Allowed Types', 'user_types')
                ->options(Type::pluck('name', 'id')->toArray())
                ->rules('required')
                ->displayUsingLabels()
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    if ($request->filled($requestAttribute)) {
                        $values = $request->input($requestAttribute);
                        
                        if (is_string($values)) {
                            $values = json_decode($values, true);
                        }
                        
                        $model->types()->sync($values);
                    }
                })
                ->resolveUsing(function ($value, $model) {
                    return $model->types->pluck('id')->toArray();
                }),

            Select::make('Current Type', 'type')
                ->options(function () {
                    return Type::pluck('name', 'id')->toArray();
                })
                ->dependsOn(
                    ['user_types'],
                    function (Select $field, NovaRequest $request, $formData) {
                        if (!empty($formData->user_types)) {
                            $typeIds = is_string($formData->user_types) ? json_decode($formData->user_types, true) : $formData->user_types;
                            if (is_array($typeIds)) {
                                $types = Type::whereIn('id', $typeIds)->pluck('name', 'id')->toArray();
                                $field->options($types);
                            }
                        }
                    }
                )
                ->rules('required')
                ->displayUsingLabels()
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    if ($request->filled($requestAttribute)) {
                        $model->type = $request->input($requestAttribute);
                    }
                })
                ->resolveUsing(function ($value, $model) {
                    return $model->type;
                }),

            Text::make('Company Name', function() {
                return $this->company?->name ?? '-';
            })->onlyOnIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
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
        return [
            LoginAs::make()
                ->canSee(function ($request) {
                    return $request->user()->hasRole('admin');
                })
                ->canRun(function ($request, $user) {
                    return $request->user()->hasRole('admin') 
                        && $request->user()->id !== $user->id;
                }),
        ];
    }

    public static function afterCreate(NovaRequest $request, $model): void
    {
        // $model->sendEmailVerificationNotification();
        $model->forceFill([
            'email_verified_at' => now()
        ])->save();
    }
}
