<div class="posts">
    <div class="row" id="posts-content">
        @foreach ($items as $item)
            @php
                $name = $item['name'];
                $thumb = $item['thumb'];
                $link = $item['link'];
                $date = $item['pubDate'];
                $description = $item['description']
            @endphp
            <div class="col-lg-6">
                <div class="post_item post_v_small d-flex flex-column align-items-start justify-content-start">
                    <div class="post_image"><img src="{{ $thumb }}" alt="{{ $name }}" class="img-fluid w-100"></div>
                    <div class="post_content">
                        <div class="post_title"><a href="{{ $link }}" target="_blank">{{ $name }}</a></div>
                        <div class="post_info d-flex flex-row align-items-center justify-content-start">
                            <div class="post_date"><a href="#">{{ $date }}</a></div>
                        </div>
                        <div class="post_text">
                            <p>{!! $description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>