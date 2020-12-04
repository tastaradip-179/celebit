<script src="{{asset('web/js/jquery.min.js')}}"></script>
<script src="{{asset('web/js/popper.js')}}"></script>
<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
<script src="{{asset('web/js/flatpickr.js')}}"></script>
<script src="{{asset('web/js/script.js')}}"></script>



<script type="text/javascript">
$( document ).ready(function() {
    $("#upload_time").click(function(){
    	console.log('ss');
    	enableTime: true,
    	dateFormat: "Y-m-d H:i",
  });
});
</script>



