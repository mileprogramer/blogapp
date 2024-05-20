<div class="single-post-details-item"><!-- blog single content -->
    <div class="thumb">
        <img src="{{asset("img/blog/blog-details.jpg")}}" alt="blog image">
    </div>
    <div class="entry-content">
        <ul class="post-meta">
            <li><a href="#"><i class="far fa-calendar-alt"></i> {{ $post->date }} </a></li>
            <li><a href="#"><i class="far fa-user"></i> {{ $post->user["username"] }} </a></li>
            <li class="cat"><i class="fas fa-tags"></i>
                @foreach ($post->tags as $tag)
                    <a href="#">{{$tag["tag_name"]}}</a> 
                @endforeach
            </li>
        </ul>
        <h4 class="title">{{ $post->title }}</h4>
        <p>{{ $post->body }}</p>
    </div>
    <div class="entry-footer"><!-- entry footer -->
        <div class="left">
            <ul class="tags">
                <li class="title">Tags: </li>
                <li>
                    @foreach ($post->tags as $tag)
                        <a href="#">{{$tag["tag_name"]}}</a> 
                    @endforeach
                </li>
            </ul>
        </div>
        <div class="right">
            <ul class="social-share">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </div><!-- //. entry footer -->
</div> 