<div class="sidebar widget-area"><!-- widget area -->

    @include('pages.layouts.search', ["errors"=>$errors, "searched"=>$isSearched])

    @include('pages.layouts.categories', ["categories"=>$categories])

    @include('pages.layouts.popular_post', ["popular_posts"=>$popular_posts])

    @include('pages.layouts.tags', ["tags"=>$tags])
</div>