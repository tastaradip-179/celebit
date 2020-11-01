@extends('backend.common.master')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/dropify.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')


<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}} List</h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>



        <div class="row margin-0">
            <div class="col-xl-12">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">All The Celebrities</h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <div class="row"><div class="col-lg-12">
                                <div class="row margin-0">

                                  @foreach($celebrities as $celebrity)
                                    <div class="col-xl-2 col-md-4 col-lg-4 col-6 music_genre">
                                        <div class="team-member ">
                                         
                                          @foreach($celebrity->images as $image)
                                            <div class="thumb">
                                                <img class="img-fluid" src="{{ asset( '/storage/celebrities/'.$image->url ) }}" alt="Thumbnail">
                                            </div>
                                          @endforeach
                                          
                                            <div class="team-info ">
                                                <h4>
                                                    <a href="mus-album-view.html">{{$celebrity->name}}</a>
                                                </h4>
                                                <span><a href="mus-artist-profile.html">{{$celebrity->designation}}</a></span>    
                                            </div>
                                            <div class="action">
                                                
                                                <form id="delete-{{$celebrity->username}}" action="{{ route($route.'destroy', [$celebrity->username]) }}" method="POST" style="display: inline;">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                                <a class="btn btn-defualt" href="{{ route($route.'edit', [$celebrity->username]) }}">Edit</a>
                                            </div>
                                        </div>
                                    </div>

                                  @endforeach  


                                </div></div></div>

                    </div>
                </section>
              </div>
            </div>

    </section>
</section>


@endsection