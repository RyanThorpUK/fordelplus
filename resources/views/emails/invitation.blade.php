@component('mail::message')
# You've Been Invited!

You have been invited to join FordelPlus. Click the button below to create your account.

@component('mail::button', ['url' => $url])
Create Account
@endcomponent

This invitation link will expire on {{ $expiresAt }}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent 