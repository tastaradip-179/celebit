@extends('backend.common.master')


@section('content')

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">Dashboard</h1>                            </div>


            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row margin-0">
            <div class="col-xl-6">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">New Registrations</h2>
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
                                    <th style="width:60%">Name</th>
                                    <th style="width:30%">Profile Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Harry P.</td>
                                    <td><span class="playlist_song2">...</span></td>
                                </tr>
                                <tr>

                                    <td>Will Mark</td>
                                    <td><span class="playlist_song3">...</span></td>
                                </tr>
                                <tr>

                                    <td>Jason D.</td>
                                    <td><span class="playlist_song4">...</span></td>
                                </tr>

                                <tr>

                                    <td>Nik P.</td>
                                    <td><span class="playlist_song6">...</span></td>
                                </tr>
                                <tr>

                                    <td>Kate Wilson</td>
                                    <td><span class="playlist_song7">...</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section></div>

            <div class="col-xl-6">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Trending Playlist</h2>
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
                                    <th style="width:60%">Name</th>
                                    <th style="width:30%">Trending</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Harry P.</td>
                                    <td><span class="playlist_song2">...</span></td>
                                </tr>
                                <tr>

                                    <td>Will Mark</td>
                                    <td><span class="playlist_song3">...</span></td>
                                </tr>
                                <tr>

                                    <td>Jason D.</td>
                                    <td><span class="playlist_song4">...</span></td>
                                </tr>

                                <tr>

                                    <td>Nik P.</td>
                                    <td><span class="playlist_song6">...</span></td>
                                </tr>
                                <tr>

                                    <td>Kate Wilson</td>
                                    <td><span class="playlist_song7">...</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section></div>
        </div>


    </section>
</section>
<!-- END CONTENT -->

@endsection