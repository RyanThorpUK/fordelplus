<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
{{ $greeting }}
@else
@if ($level === 'error')
@lang('Whoops!')
@else
@lang('Hej'),
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Med venlig hilsen,')<br>
Team FordelPlus
@endif
</x-mail::message>
