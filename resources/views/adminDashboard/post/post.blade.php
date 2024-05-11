<div class="card col-3 p-0">
    <div class="card-header">
        <h3>{{ $post["title"] }}</h3>
    </div>
    <div class="card-body">
        <p>{{ substr($post["body"], 0, 40) }}</p>
        <em>Author: {{ $post["author"] }}</em>
    </div>
    <div class="card-footer">
        <button class="btn btn-danger">
            <a href="/admin/post/{{ $post["slug"] }}"></a>Delete
        </button>
        <button class="btn btn-warning">
            <a href="/admin/post/{{ $post["slug"] }}"></a>Edit
        </button>
    </div>
</div>