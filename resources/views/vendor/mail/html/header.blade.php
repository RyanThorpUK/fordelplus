@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://fordelplus.dk/wp-content/uploads/2024/12/fordelplus_logo.png" class="logo" alt="FordelPlus Logo" width="294" height="42">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
