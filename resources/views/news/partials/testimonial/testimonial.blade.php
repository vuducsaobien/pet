<div class="testimonial-text-slider text-center">
    @foreach($itemsTestimonial as $item)
    <div class="sin-testiText">
        <p>{{$item->content}}</p>
    </div>
    @endforeach
</div>

<div class="testimonial-image-slider text-center">
    @foreach($itemsTestimonial as $item)
    <div class="sin-testiImage">
        <img src="{{ asset($item->thumb) }}" alt="">
        <h3>{{$item->name}}</h3>
        <h5>{{$item->job}}</h5>
    </div>
    @endforeach
</div>

<div class="testimonial-shap">
    <img src="{{ asset('news/images/icon-img/testi-shap.png') }}" alt="">
</div>
