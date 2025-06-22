<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $first_name = '';
    
    public string $last_name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public $company;

    public $invitation;

    public function mount()
    {
        if (!request()->has('token') || !$this->isValidToken(request()->token)) {
            abort(403, 'Invalid or missing registration token');
        }

        // Get the invitation and set the company
        $this->invitation = \DB::table('user_invitations')
            ->where('token', request()->token)
            ->whereNull('accepted_at')
            // ->where('expires_at', '>', now())
            ->first();

        if (!$this->invitation) {
            abort(403, 'Invalid or expired registration token');
        }

        $this->company = \App\Models\Company::find($this->invitation->company_id);
        if (!$this->company) {
            abort(403, 'Company not found for this invitation');
        }
    }

    private function isValidToken($token): bool
    {
        
        return \DB::table('user_invitations')
            ->where('token', $token)
            ->whereNull('accepted_at')
            // ->where('expires_at', '>', now())
            ->exists();
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['company_id'] = $this->company->id;
        $validated['type'] = 1;

        $user = User::create($validated);

        // Assign manager role if invitation type is 'user'
        if ($this->invitation->type === 'user') {
            $user->assignRole('manager');
        } else {
            $user->assignRole('user');
        }

        // Mark invitation as accepted
        \DB::table('user_invitations')
            ->where('token', request()->token)
            ->update(['accepted_at' => now()]);

        event(new Registered($user));
        Auth::login($user);
        
        $this->redirect(route('verification.notice', absolute: false), navigate: false);
    }
}
