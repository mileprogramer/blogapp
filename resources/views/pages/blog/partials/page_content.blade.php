<div class="page-content-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @include('pages.blog.layouts.single_blog_grid', ["posts"=>$posts])
                    {{ $posts->links() }}
{{--                     <div class="col-lg-12">
                        <div class="blog-pagination margin-top-10"><!-- blog pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                            <i class="fas fa-chevron-right"></i>
                                    </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- //. blog pagination -->
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4">
                @include('pages.layouts.sidebar', [
                    "posts"=>$posts,
                    "isSearched"=>$isSearched,
                    "tags"=>$tags ,
                    "categories"=>$categories, 
                    "popular_posts"=>$popular_posts
                ])
            </div>
        </div>
    </div>
</div>