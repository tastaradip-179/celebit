@extends('backend.common.master')
@section('page-css')
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<link href="{{asset('backend/assets/plugins/uikit/css/uikit.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/uikit/css/components/nestable.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

@endsection
@section('content')
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}} List</h1>
                </div>
                {!! backurl() !!}
            </div>
            
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0">
            <div class="col-xl-12">
                <section class="box ">
                    <div class="content-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div id="celebritySerial" class="row uk-nestable" data-uk-nestable="{maxDepth:1}">
                                    @foreach($celebrities as $celebrity)
                                    <li class="col-xl-6 col-md-12 col-lg-6 col-lg-12 " data-item="{{$celebrity->id}}">
                                        <div class="uk-nestable-item" >
                                            <div class="team-member col">
                                                <div class="row margin-0">
                                                    <div class="team-img col-xl-4 col-lg-4 col-md-4 col-4">
                                                        <a href="{{route($route.'show', $celebrity->username)}}">
                                                            <div class="thumb">
                                                                <img class="img-fluid" src="{{ $file_path.$celebrity->profileImage() }}" alt="Thumbnail">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="team-info col-xl-8 col-lg-8 col-md-8 col-8 ">
                                                        <h4 class="font-weight-bold"><a href="{{route($route.'show', $celebrity->username)}}">{{$celebrity->name}}</a></h4>
                                                        <span class='team-member-edit'>
                                                            <a class="text-danger" title="View" href="{{ route('admin.celebrity.package',['celebrity' => $celebrity->username]) }}">
                                                                <i class='fa fa-info-circle icon-xs icon-rounded icon-info'></i>
                                                            </a>
                                                            <a title="Edit" href="{{ route($route.'edit', [$celebrity->username]) }}">
                                                                <i class='fa fa-pencil icon-xs icon-rounded icon-primary'></i>
                                                            </a>
                                                            <a onclick="alertFunction('Delete', {{$celebrity->id}});" title="Delete"  href="javascript:void(0)"> 
                                                                <i class='fa fa-trash-o icon-xs  icon-rounded icon-danger'></i>
                                                            </a>
                                                            <form id="Delete{{$celebrity->id}}" action="{{ route($route.'destroy', [$celebrity->username]) }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                            </form>

                                                            <div class="uk-nestable-handle"></div>
                                                            <div data-nestable-action="toggle"></div>
                                                        </span>
                                                        <span>{{$celebrity->designation}}<br>
                                                        <small>Phone:</small> {{$celebrity->mobile}}<br>
                                                        <small>Email:</small> {{$celebrity->email}}</span><br>
                                                        {!! $celebrity->AllTags() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection

@section('page-js')
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="{{asset('backend/assets/plugins/uikit/js/uikit.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/uikit/js/components/nestable.min.js')}}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<script type="text/javascript">
    $("#celebritySerial").on('stop.uk.nestable', function(ev) {
        var serialized = $(this).data('nestable').serialize();
        //     str = '';
        $.ajax({
            url: '{{route('admin.data.serialize')}}',
            method: 'get',
            data: {data: serialized, sort: 'celebrities'},
            success:function(response){
                if (response == 'success') {
                    toastr["warning"]("Change successfully save!");
                }
                console.log(response);
            }
        })
    });
</script>
@endsection