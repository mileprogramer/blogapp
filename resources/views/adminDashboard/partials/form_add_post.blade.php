<form class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Fill the form to add new Post</h4>
        <div class="form-group row">
            <label for="fname"
                class="col-sm-3 text-end control-label col-form-label">Title</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname"
                    placeholder="Insert the title for the post" />
            </div>
        </div>
        <div class="form-group row">
            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Choose
                tags for the post</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-2">
                        <span class="p-3">Sports</span>
                        <input type="checkbox" value="Nesto" />
                    </div>
                    <div class="col-2">
                        <span class="p-3">Sports</span>
                        <input type="checkbox" value="Nesto" />
                    </div>
                    <div class="col-2">
                        <span class="p-3">Sports</span>
                        <input type="checkbox" value="Nesto" />
                    </div>
                    <div class="col-2">
                        <span class="p-3">Sports</span>
                        <input type="checkbox" value="Nesto" />
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="email1"
                class="col-sm-3 text-end control-label col-form-label">Choose
                category</label>
            <div class="col-sm-9">
                <span class="p-3">Sport</span><input type="radio" name="category">
                <span class="p-3">Sport</span><input type="radio" name="category">
                <span class="p-3">Sport</span><input type="radio" name="category">
                <span class="p-3">Sport</span><input type="radio" name="category">
                <span class="p-3">Sport</span><input type="radio" name="category">
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1"
                class="col-sm-3 text-end control-label col-form-label">Message</label>
            <div class="col-sm-9">
                <textarea class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="button" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</form>