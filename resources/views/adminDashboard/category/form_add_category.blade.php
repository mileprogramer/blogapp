<form class="form-horizontal" action="add-category" method ="POST">
    @csrf
    <div class="card-body">
        @if (isset($output["success"]))
            <div class="alert alert-success">
                <p class="d-inline">{{ $output["success"] }}</p>
                <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}" alt=""
                    style="width: 30px; margin-top: -6px;">
            </div>
        @elseif(isset($output["mistake"]))

            <div class="alert alert-danger">
                <p class="d-inline">{{$output["mistake"]}}</p>
                <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}" alt=""
                    style="width: 30px; margin-top: -6px;">
            </div>

        @elseif(isset($output["return_category"]))
            <div class="alert alert-warning">
                <p class="d-inline">{{$output["return_category"]}}</p>
                <a href="/admin/category/return/{{ strtolower($output["name_category"]) }}" class="btn btn-primary">Return Category {{$output["name_category"]}}</a>
                <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}" alt=""
                    style="width: 30px; margin-top: -6px;">
            </div>
        @endif
        <h4 class="card-title">Fill the form to add new Category</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name of category</label>
            <div class="col-sm-9">
                <input name="name_category" type="text" class="form-control" id="fname"
                    placeholder="Insert the name for the category" required />
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
