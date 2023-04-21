@component('mail::message')
# Hi {{$message->user}}

{{$message->body}}

OMH Company (Pvt) Ltd,<br>
No. 650, Galle Road, <br>
Colombo 04, Sri Lanka.<br>
![MOH]({{ asset('images/main_logo.png') }})
@endcomponent
