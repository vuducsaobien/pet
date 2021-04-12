@php
    use App\Helpers\Template;
    // echo '<pre style="color:red";>$items Blade === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

@forelse($items as $item)

    <div class="col-lg-6 col-md-6">

        <div class="blog-wrapper mb-30 gray-bg">

            <div class="blog-img hover-effect">
                <a href="{{ $item['link'] }}"><img alt="" src="{{ asset($item['thumb']) }}" ></a>
            </div>

            <div class="blog-content">
                <div class="blog-meta">
                    <ul>
                        <li>Nguồn: <span>{{$item['title']}}</span></li>
                        <li>{{ Template::showDatetimeFrontend( $item['pubDate'], 'long_time', 'no') }}</li>
                    </ul>
                </div>
                <h4><a href="{{ $item['link'] }}">{{$item['name']}}</a></h4>
            </div>

        </div>
    </div>

@empty
    <p>chua co bai viet nao</p>
@endforelse