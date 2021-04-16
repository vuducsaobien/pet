@extends('admin.main')
@section('content')
    @include('admin.templates.zvn_notify')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                @include('admin.pages.youtube.form')
            </div>
        </div>
    </div>

    @if( $items !== null && $items !== '')
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Video from Youtube Playlist</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            @foreach($items as $key => $value)    
                                <iframe width="390" height="315" 
                                    src="{{ 'https://www.youtube.com/embed/' . $value }}">
                                </iframe>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
 

@endsection