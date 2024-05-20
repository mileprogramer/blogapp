<div class="widget widget_categories"><!-- widget  -->
    <h4 class="widget-title">Categories</h4>
    <ul>
        @foreach ($categories as $category)
            <li class="cat-item"><a href="#">{{ $category->name_category }}</a></li>
        @endforeach
    </ul>
</div>