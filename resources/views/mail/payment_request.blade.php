@extends('mail.minty')
@section('content')

<p>Dear {{$data['customer']->fullname}},</p>
<p>Your request has been approved. Please click the link below to pay. Please note, we will not make your video if you don't pay.</p>

@endsection