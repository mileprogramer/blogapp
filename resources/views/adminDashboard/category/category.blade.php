<div class="card col-3 p-0">
    <div class="card-header"><h3>{{ $category["name_category"] }}</h3></div>
    <div class="card-footer">
        <a class="btn btn-danger" href="/admin/category/delete/{{ strtolower($category["name_category"]) }}">Delete</a>
        <a class="btn btn-warning" href="/admin/category/edit/{{ strtolower($category["name_category"]) }}">Edit</a>
    </div>
</div>