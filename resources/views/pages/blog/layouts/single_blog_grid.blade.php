@foreach ($posts as $post)
    <div class="col-lg-6 col-md-6">
        <div class="single-blog-grid-item">
            <div class="thumb">
                <img src="{{ asset("img/blog/01.jpg") }}" alt="blog images">
            </div>
            <div class="content">
                <ul class="post-meta">
                    <li><a href="#"> {{ $post->date }} </a></li>
                    <li><a href="#">By {{ $post->user->username }}</a></li>
                </ul>
                <h4 class="title"><a href="#">{{ $post->title }}</a></h4>
                <a href="/blog/single-post/{{ $post->slug }}" class="readmore">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
@endforeach
