@extends('mail.minty')
@section('content')

<p>Dear {{$data['customer']->fullname}},</p>
<p>Your request has been sent successfully to your favorite personality. You will be notified soon if your request got accepted.</p>

@endsection