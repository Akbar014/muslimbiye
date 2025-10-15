@extends('mail.layout.mail')
@section('title', 'Muslim Biye - Confirm Your OTP')
@section('content')
    Greetings From MuslimBie,<br/>
    Here is your Code.<br/>
    <div class="otp">
      {{$data['otp']}}
    </div><br/>
    Validity: 5 Minute
@endsection