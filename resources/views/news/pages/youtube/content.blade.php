@forelse($items as $item)
    <div class="col-lg-6 col-md-12">
        <div class="blog-wrapper mb-30 gray-bg">

            <iframe width="450" height="315" 
                src="{{ 'https://www.youtube.com/embed/' . $item }}">
            </iframe>

        </div>
    </div>

@empty
    <p>chua co Videos nao</p>
@endforelse