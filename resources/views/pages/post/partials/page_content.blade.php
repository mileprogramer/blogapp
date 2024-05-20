<div class="page-content-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @include('pages.post.layout.single_post', ["post"=>$post])
            </div>
            <div class="col-lg-4">
                @include('pages.layouts.sidebar', ["categories"=>$categories])
            </div>
        </div>
    </div>
</div>