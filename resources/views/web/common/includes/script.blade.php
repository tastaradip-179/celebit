<script type="text/javascript" src="{{asset('web/js/jquery.min.js')}}"></script>
<!-- <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js"></script>	 -->
<script type="text/javascript" src="{{asset('web/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/flatpickr.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/script.js')}}"></script>
<!-- mdb -->
<script type="text/javascript" src="{{asset('web/plugins/mdb/js/mdb.min.js')}}"></script>

<!-- auto play on hover -->
<script type="text/javascript" src="{{asset('web/plugins/hoverPlay/jquery.hoverplay.js')}}"></script>




<!-- 🚨 Our custom JavaScript  -->
<script type="text/javascript" src="{{asset('web/plugins/mode/mode.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function () {
	    $('.celeb-anchor')
	        .mouseover(function () {
	        	$(this).find("#celeb-img").hide(); 
	         	$(this).find("#celeb-video").show();   	        	  
	    })
	        .mouseout(function () {
	            $(this).find("#celeb-video").hide();   
	        	$(this).find("#celeb-img").show();  
	    });
});
</script>

<script type="text/javascript">
    $(document).ready(function () {
    	$('#celebrity_filter_list').html("");

        $('#celebrity').on('keyup',function() {
            var query = $(this).val(); 

            $.ajax({
               
                url:"{{ route('web.search.live') }}",
          
                type:"GET",
               
                data:{'celebrity': query},
               
                success:function (data) {
                    document.getElementById("filtered_celebrities").style.display = "block";   

                    $('#celebrity_filter_list').html(data);

                    $('#celebrity_filter_list .celeb-anchor')
                        .mouseover(function () {
                            $(this).find("#celeb-img").hide(); 
                            $(this).find("#celeb-video").show();                  
                    })
                        .mouseout(function () {
                            $(this).find("#celeb-video").hide();   
                            $(this).find("#celeb-img").show();  
                    });

                    if($(location).attr("href") == "{!! route('web.home') !!}/"){
                        document.getElementById("banner-section").style.display = "none"; 
                        document.getElementById("more_items_sec").style.display = "none";
                    }    
                    else{
                        document.getElementById("celebrity-profile").style.display = "none"; 
                        document.getElementById("reviews").style.display = "none"; 
                        document.getElementById("vds-main").style.display = "none";  
                    }                    
                }

            })

            // end of ajax call
        });

    });
</script>



 




