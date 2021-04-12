<!-- Blog Content -->
@php
    use App\Helpers\Template;
@endphp

<div class="single-blog-wrapper">
    {{-- <div class="blog-img mb-30">
        <img src="{{ asset($item['thumb']) }}" alt="">
    </div> --}}

    <div class="blog-details-content">
        {{-- <h2>{{ $item['name'] }}</h2> --}}
        <div class="blog-meta">
            <h4 style="color: blue">Câu Hỏi Thường Gặp về Marten</h4>
        </div>
    </div>
    @php
        // echo '<pre style="color:red";>$item === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called Detail Recruiment</h3>';die;
    @endphp

    @foreach($items as $key => $value)
        <div style="max-width: 850px">
            <b>{{ $key + 1 .'/ ' . $value['name'] }}</b>
            {!! $value['content'] !!}
        </div>
    @endforeach

    {{-- <div class="blog-dec-tags-social">
        <div class="blog-dec-tags">
            <ul>
                <li><a href="#">Dog</a></li>
                <li><a href="#">Cat</a></li>
                <li><a href="#">Fish</a></li>
            </ul>
        </div>
    </div> --}}

</div>