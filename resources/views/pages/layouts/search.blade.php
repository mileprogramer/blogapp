<div class="widget widget_search"><!-- widget  -->
    <h4 class="widget-title">Search</h4>
    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($isSearched)
        <a href="/blog" class="btn btn-danger">Reset search</a>
    @endif
    @php
        $searchedParam = "";
        if(isset($_GET["search-term"])){
            $searchedParam = $_GET["search-term"];
        }
    @endphp
    <form action="/blog/search" class="search-form mt-3">
        <div class="form-group">
            <input name="search-term" value="{{$searchedParam}}" type="text" class="form-control" placeholder="Search">
        </div>
        <button class="submit-btn" type="submit"><i class="fas fa-search"></i></button>
    </form>
</div><!-- //. widget -->