<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class LoginAs extends Action
{
    use Queueable;

    public $showOnIndex = true;
    public $showOnDetail = true;
    public $onlyOnDetail = false;

    public function handle(ActionFields $fields, $model)
    {
        if (!auth()->user()->hasRole('admin')) {
            return Action::danger('You do not have permission to login as other users.');
        }

        // Store the current admin's ID in the session
        session(['admin_user_id' => auth()->id()]);
        
        // Login as the selected user
        Auth::login($model);

        // Redirect to the dashboard
        return Action::redirect('/dashboard');
    }

    public function name()
    {
        return __('Login As User');
    }
} 