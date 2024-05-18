<div class="card col-3 p-0">
    <div class="card-header"><h3>{{ $category["name_category"] }}</h3></div>
    <div class="card-footer">
        <a class="btn btn-danger" href="/admin/delete-category/{{ $category["name_category"] }}">Delete</a>
        <a class="btn btn-warning" href="/admin/edit-category/{{ $category["slug"] }}">Edit</a>
    </div>
</div>