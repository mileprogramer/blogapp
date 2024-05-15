<div class="card col-3 p-0">
    <div class="card-header">
        <h3>{{ $post["title"] }}</h3>
    </div>
    <div class="card-body">
        <p>{{ substr($post["body"], 0, 40) }}</p>
        <h3>Tags</h3>
        <div>
            @foreach ($post["tags"] as $single_tag)
                <span class="bg-info rounded-pill p-1 text-white">{{ $single_tag["tag_name"] }}</span>
            @endforeach
        </div>
        <h3 class="mt-3">Category</h3>
        <span class="bg-info rounded-pill p-1 text-white">{{ $post["category"]["name_category"] }}</span>
        <hr>
        <em>Author: {{ $post["user"]["username"] }}</em>
    </div>
    <div class="card-footer">
        <a class="btn btn-danger" href="/admin/delete-post/{{ $post["slug"] }}">Delete</a>
        <a class="btn btn-warning" href="/admin/edit-post/{{ $post["slug"] }}">Edit</a>
        <a class="btn btn-primary" href="/admin/edit-post/{{ $post["slug"] }}">See post</a>
    </div>
</div>