@extends('news.main')

@section('content')
    <div class="section-category">
        @include('news.block.breadcrumb', ['item' => ['name' => 'Thư viện hình ảnh']])
        <!-- Content Container -->
        <div class="content_container container_category">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    @foreach ($images as $image)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                            <a href="{{ asset(config('zvn.path.gallery') . $image->getFilename()) }}" data-fancybox="gallery">
                                <img style="width: 100%;" src="{{ asset(config('zvn.path.gallery') . $image->getFilename()) }}" alt="{{ $image->getFilename() }}" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection