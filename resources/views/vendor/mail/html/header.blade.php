<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://cdn-icons.flaticon.com/png/512/3592/premium/3592863.png?token=exp=1652422745~hmac=7de883fbe97f7b2b46ef8f2fdc54f487" class="logo" alt="Laravel Logo">

{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
