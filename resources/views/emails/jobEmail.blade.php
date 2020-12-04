@component('mail::message')

Hi {{ $data['friend_name'] }},<br><br>

{{ $data['your_name'] }}({{ $data['your_email'] }}) has referred this job.

@component('mail::button', ['url' => $data['jobUrl']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
