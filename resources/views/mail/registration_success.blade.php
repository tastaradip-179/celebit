@extends('mail.minty')
@section('content')

<p>Dear {{$data['customer']->fullname}},</p>
<p>You've registered successfully. Now you can send request to your favorite personality and make your day special.</p>

@endsection