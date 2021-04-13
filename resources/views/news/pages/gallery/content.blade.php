@forelse($images as $image)
    <div class="col-lg-6 col-md-12">
        <div class="blog-wrapper mb-30 gray-bg">

            <div class="blog-img hover-effect">
                <a href="{{ asset(config('zvn.path.gallery') . $image->getFilename()) }}" data-fancybox="gallery">
                    <img style="width: 100%;" src="{{ asset(config('zvn.path.gallery') . $image->getFilename()) }}" 
                    alt="{{ $image->getFilename() }}" />
                </a>
            </div>

        </div>
    </div>

@empty
    <p>chua co bai viet nao</p>
@endforelse