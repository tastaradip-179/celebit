@extends('web.common.master')

@section('content')
<div id="celebrity_list"></div> 
@endsection

@section('page-js')
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
                            $('#celebrity_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                
                $(document).on('click', 'li', function(){
                  
                    var value = $(this).text();
                    $('#celebrity').val(value);
                    $('#celebrity_list').html("");
                });
            });
        </script>

@endsection