@extends('web.common.master')

@section('content')
<section class="request">
	<div class="container">
		<div class="request-container">
			<div class="row header">
				<img src="{{ $file_path_view.$celebrity->profileImage() }}" alt="dp" class="img-mini" />
				<h4>New Request for {{$celebrity->name}}</h4>
			</div>
		</div>
	</div>
</section>
@endsection