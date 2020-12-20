@extends('backend.common.master')

@section('page-css')
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
            <div class="col-xl-6">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">All the {{$title}}s </h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                            	<tr>
                            		<td class="text-center">{{$tag->name}}</td>
                                    <td class="text-center">{{$tag->type}}</td>
                            		<td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="" title="edit"><i class="fa fa-pencil icon-info icon-square icon-square-o"></i></a>     
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="" title="delete"><i class="fa fa-trash icon-danger icon-square icon-square-o"></i></a>   
                                    </td>
                            	</tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="col-xl-6">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Add {{$title}}</h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <form id="form" method="post" action="{{route($route.'store')}}" style="width: 100%;">
                              {{csrf_field()}}
                            <div class="form-group">
                                  <label class="form-label" for="name">Tag name</label>
                                  <div class="controls">
                                        <input type="text" class="form-control" id="name" name="name" >
                                  </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="type">Select Types</label>
                                  <div class="controls">
                                        <select class="form-control select2" name="type">
                                              <option value="celebrities">Celebrities</option>
                                              <option value="packages">Packages</option>
                                        </select>
                                  </div>
                            </div>
                            <div class="form-group float-right ">
                                <button type="submit" class="btn btn-success">Create</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>

                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>


@endsection

@section('page-js')

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<script type="text/javascript">
      $(document).ready(function() {
          $('.select2').select2({
            placeholder: "Select tags or type and enter",
            tags: true,
            tokenSeparators: [',', ' ']
          });
      });
</script>

@endsection