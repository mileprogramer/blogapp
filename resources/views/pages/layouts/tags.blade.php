<div class="widget widget_tag_cloud">
    <h4 class="widget-title">Tags</h4>
    <div class="tagcloud">
        @foreach ($tags as $tag) 
            <a href="/blog/tag/{{$tag->slug}}">{{ $tag->tag_name }}</a>
        @endforeach
    </div>
</div>