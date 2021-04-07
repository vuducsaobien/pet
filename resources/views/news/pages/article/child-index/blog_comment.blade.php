<!-- Blog Comment -->
@php
use App\Helpers\Template;
@endphp

<div class="blog-comment-wrapper mt-55">
    <h4 class="blog-dec-title">{{$itemComment->count()>0? $itemComment->count() ." Comments":"" }}</h4>

    @forelse($itemComment as $i)
    <div class="single-comment-wrapper mt-35" style="margin-left: {{$i->depth*125}}px">
        <div class="blog-comment-img">
            <img src="{{ asset('images/avatar/comment.jpg') }}" alt="">
        </div>
        <div class="blog-comment-content">
            <h4>{{$i->name}}</h4>
            <span>{{Template::showDatetimeFrontend($i->created,'long_time')}}</span>
            <p>{{$i->message}}</p>
            <div class="blog-details-btn">
                <a href="#" class="reply" data-field="{{$i->id}}">Reply</a>
            </div>
        </div>
    </div>
    @empty
        <p>chua co binh luan nao</p>
    @endforelse
    {{--<div class="ml-125">
    <form action="{{route('article/postComment')}}" method="post">
        @csrf
        @method('post')
            <div class="col-md-9">
                <div class="leave-form">
                    <input type="text" placeholder="Name" name="name" value="{{old('name')}}">
                    <span class="color-red">{{$errors->first('name')}}</span>
                </div>
            </div>
            <div class="col-md-9">
                <div class="text-leave">
                    <textarea placeholder="Message" name="message" rows="10" cols="20">{{old('message')}}</textarea>
                    <span class="color-red">{{$errors->first('message')}}</span>
                    <input type="hidden" name="article_id" value="{{$item->id}}">
                    <input type="hidden" name="parent_id" value="">

                    <input type="submit" value="SEND MASSAGE">
                </div>
            </div>
    </form>
    </div>--}}
</div>

@section('script2')
<script>


    $(function() {
         $(".reply").click(function(e){
                parent_id=$(this).data('field');
                console.log(parent_id);
                

               $(this).parent().parent().parent().after('<div class="ml-125">' +
                   '<form action="{{route('article/postComment')}}" method="post">' +
                   '@csrf' +
                   '@method('post')' +
                   '<div class="col-md-9"> <div class="leave-form"> <input type="text" placeholder="Name" name="name" value="{{old('name')}}"> <span class="color-red">{{$errors->first('name')}}</span> </div> </div>' +
                   '<div class="col-md-9"><div class="text-leave"><textarea placeholder="Message" name="message" rows="10" cols="20">{{old('message')}}</textarea><span class="color-red">{{$errors->first('message')}}</span><input type="hidden" name="article_id" value="{{$item->id}}"><input type="hidden" name="parent_id" value="'+parent_id+'"><input type="submit" value="SEND MASSAGE"></div></div></form></div></div>' +
                   '</div>')
             e.preventDefault();

         });
    });
</script>
@stop
