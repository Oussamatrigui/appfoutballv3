<x-mail::message>
# hey admin
<ul>
<li>{{$name}}</li>
<li>{{$email}}</li>
</ul>
<x-mail::panel>
    {{$msg}}
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
