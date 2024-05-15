<form class="form-horizontal" action="/admin/add-tag/" method ="POST">
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
        <h4 class="card-title">Fill the form to add new Tag</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name of tag</label>
            <div class="col-sm-9">
                <input name="tag_name" type="text" class="form-control" id="fname"
                    placeholder="Insert the name for the tag" required />
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</form>
