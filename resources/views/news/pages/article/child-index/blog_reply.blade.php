<!-- Blog Reply -->
@section('css')
    <style>
        .color-red{
            color: red;
        }
    </style>
@stop
<div class="blog-reply-wrapper mt-50">
    <h4 class="blog-dec-title">post a comment</h4>
    <form action="{{route('article/postComment')}}" method="post">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-md-12">
                <div class="leave-form">
                    <input type="text" placeholder="Name" name="name" value="{{old('name')}}">
                    <span class="color-red">{{$errors->first('name')}}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="text-leave">
                    <textarea placeholder="Massage" name="message">{{old('message')}}</textarea>
                    <span class="color-red">{{$errors->first('message')}}</span>
                    <input type="hidden" name="article_id" value="{{$item->id}}">

                    <input type="submit" value="SEND MASSAGE">
                </div>
            </div>
        </div>
    </form>
</div>
