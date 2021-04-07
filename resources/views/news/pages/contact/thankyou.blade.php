@extends('news.main')
@section('content')

    <div class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                @if(session('news_notify'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>{{ session('news_notify') }}</strong>
                    </div>
                @endif
                <img width="1100px" src="{{asset('images/avatar/thankyou.png')}}" alt="">
            </div>
        </div>
    </div>

@endsection

