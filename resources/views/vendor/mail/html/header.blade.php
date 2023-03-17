<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('images/assets/img/logo_alterada.png')}}" class="logo" alt="Avico Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
