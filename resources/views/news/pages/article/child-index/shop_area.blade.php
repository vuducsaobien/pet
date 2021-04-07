<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">

            <div class="col-lg-9 col-md-8">
                <div class="blog-details-wrapper res-mrg-top">

                    @include('news.pages.article.child-index.blog_content')
                    @include('news.pages.article.child-index.blog_comment')
                    @include('news.pages.article.child-index.blog_reply')
                    
                </div>
            </div>

            <!-- shop-sidebar -->
            <div class="col-lg-3 col-md-4">
                <div class="shop-sidebar blog-mrg">

                    @include('news.partials.sidebar.search')
                    @include('news.partials.sidebar.brand')
                    @include('news.partials.sidebar.product')
                    @include('news.partials.sidebar.recent_blog')

                </div>
            </div>
            
        </div>
    </div>
</div>
