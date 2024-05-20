<div class="sidebar widget-area"><!-- widget area -->

    <div class="widget widget_search"><!-- widget  -->
        <h4 class="widget-title">Search</h4>
        <form action="blog.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button class="submit-btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div><!-- //. widget -->

    @include('pages.layouts.categories', ["categories"=>$categories])

    @include('pages.layouts.popular_post', ["popular_posts"=>$popular_posts])

    @include('pages.layouts.tags', ["tags"=>$tags])
</div>