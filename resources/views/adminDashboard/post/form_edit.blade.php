<form class="form-horizontal" action="/admin/add-tag" method ="POST">
    @csrf
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li class="d-inline">{{ $error}}</li>
                @endforeach
                <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}" alt=""
                    style="width: 30px; margin-top: -6px;">
            </div>
        @endif

        @if (isset($output["success"]))
            <div class="alert alert-success">
                <p class="d-inline">{{ $output["success"] }}</p>
                <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}" alt=""
                    style="width: 30px; margin-top: -6px;">
            </div>
        @elseif(isset($output["return_tag"]))
            <div class="alert alert-warning">
                <p class="d-inline">{{$output["return_tag"]}}</p>
                <a href="/admin/return-tag/{{ $output["tag_name"] }}" class="btn btn-primary">Return Tag {{$output["tag_name"]}}</a>
                <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}" alt=""
                    style="width: 30px; margin-top: -6px;">
            </div>
        @endif
        <h4 class="card-title">Fill the form to add new Post</h4>
        <em>When you type the tags or category search result will pop up click on the tags and category you want and then press button add</em>
        <div class="alert alert-danger d-none"></div>
        <div class="alert alert-success d-none"></div>
        <div class="form-group row">
            <input type="hidden" id="post-id" value="{{ $post["id"] }}">
            <label for="fname" class="col-sm-3 text-start control-label col-form-label">Title</label>
            <div class="col-sm-9">
                <input id="title" name="title" value="{{$post["title"]}}" type="text" class="form-control"
                    placeholder="Insert the name for the tag" required />
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" id="postId" value="">
            <label for="fname" class="col-sm-3 text-start control-label col-form-label">Slug</label>
            <div class="col-sm-9">
                <input id="slug" value="{{$post["slug"]}}" name="slug" type="text" class="form-control"
                    placeholder="Insert the name for the tag" required />
                <em>Do not use capital letter. Just lower letters and numbers</em></br>
                <em>If your slug has more words. Do not use space insted use "-"</em>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-start control-label col-form-label">Text of post</label>
            <div class="col-sm-9">
                <textarea id="body" class="form-control" name="body" id="" cols="30" rows="10" placeholder="Type the text for the post">{{ $post["body"] }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-start control-label col-form-label">Add tags</label>
            <div id="tags-selected" class="col-9 mt-3 d-flex gap-3"></div>
            <div class="col-sm-9 d-flex position-relative">
                <input id="tagsInput" type="search" data-active="tags" class="form-control" placeholder="Start typing tags" />
                <div id="tags-result" class="searched-result"></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-start control-label col-form-label">Add category</label>
            <div id="category-selected" class="col-9 mt-3"></div>
            <div class="col-sm-9 d-flex position-relative">
                <input id="categoryInput" type="search" data-active="category" class="form-control" placeholder="Start typing category" />
                <div id="category-result" class="searched-result"></div>
            </div>

        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button id="addPostBtn" type="submit" class="btn btn-primary">
                Edit
            </button>
        </div>
    </div>
</form>
