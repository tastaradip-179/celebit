@include('sweet::alert')

<!-- CORE JS FRAMEWORK - START --> 
<script src="{{asset('backend/assets/js/jquery-3.4.1.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/js/popper.min.js')}}" type="text/javascript"></script> 
<!-- <script src="assets/js/jquery.easing.min.js')}}" type="text/javascript"></script>  -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>  

<script src="{{asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/plugins/viewport/viewportchecker.js')}}" type="text/javascript"></script>  
<!-- CORE JS FRAMEWORK - END --> 

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
{{-- <script src="{{asset('backend/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js')}}" type="text/javascript"></script> <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script><script src="assets/js/mus-dashboard.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->  --}}

<!-- CORE TEMPLATE JS - START --> 
<script src="{{asset('backend/assets/js/scripts.js')}}" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 

<!-- Sidebar Graph - START --> 
<script src="{{asset('backend/assets/plugins/sparkline-chart/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/js/chart-sparkline.js')}}" type="text/javascript"></script>
<!-- Sidebar Graph - END --> 

<script type="text/javascript">
	@if($errors->any())
        @foreach($errors->all() as $error)
        	$(document).ready(function() {
        		swal({
        		      text: "{!! $error !!}",
        		      title: "Error",
        		      icon: "error"
        		  });
        	});
        @endforeach
    @endif
	
</script>
<script type="text/javascript">
    function alertFunction(action,id){
        Swal.fire({
            title: "Are you sure to "+action+"?",
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        .then((willDelete) => {
            console.log(willDelete);
          if (willDelete.value) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            setTimeout(function(){
                document.getElementById(action+id).submit();
            },1000)

          }
        });
    }
</script>