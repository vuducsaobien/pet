@php
    use App\Helpers\Template;

    $comment = $items['comment'];    
@endphp

@if (count($comment))
    @foreach($comment as $key => $value)
        @php
            $rating = $value['star'];
            $message = $value['message'];
            $xhtmlRating = Template::showRating($rating);
        @endphp
        <div class="sin-rattings">
            <div class="star-author-all">
                <div class="product-rating f-left">
                    {!! $xhtmlRating !!}
                    <span>({{ $value['star'] }})</span>
                </div>
                <div class="ratting-author f-right">
                    <h3>{{ $value['name'] }}</h3>
                    <span>12:24</span>
                    <span>{{ $value['created'] }}</span>
                </div>
            </div>
            <p>{{ $message }}</p>
        </div>
    @endforeach
@endif