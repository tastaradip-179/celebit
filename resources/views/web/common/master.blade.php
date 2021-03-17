
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Celebrity App</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="icon" href="{{asset('web/images/Favicon.png')}}">
@include('web.common.includes.style')

@yield('page-css')

</head>


<body>
	<div class="wrapper hp_1">

		@include('web.common.header')

		@include('web.common.sidebar')

        @include('web.common.search')

		@yield('content')


		@include('web.common.footer')

	</div><!--wrapper end-->

	@include('web.common.includes.script')

	@yield('page-js')
	<script type="text/javascript">
		function openLoginModal(){
		    $('#elegantLoginModalForm').modal();
		} 
	</script>

</body>

</html>