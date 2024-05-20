<div class="widget widget_popular_posts"><!-- widget  -->
    <h4 class="widget-title">Popular Posts</h4>
    <ul>
        @foreach ($popular_posts as $post)
            <li class="single-popular-post-item"><!-- single popular post item -->
                <div class="thumb">
                    <img src="{{ asset("img/popular-post/01.jpg")}}" alt="popular post image">
                </div>
                <div class="content">
                    <span class="time">{{ $post->date }}</span>
                    <h4 class="title"><a href="/blog/single-post/{{ $post->slug }}/">{{ $post->title }}</a></h4>
                </div>
            </li><!-- //. single popular post item -->
        @endforeach
    </ul>
</div>
