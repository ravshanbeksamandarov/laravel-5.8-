<aside class="sidebar-box">
    <form method="GET" action="{{ route('search') }}" class="search-form">
        <div class="form-group">
            <span class="icon ion-ios-search"></span>
            <input placeholder="Qidiruv..." value="{{ request()->get('key') }}" type="text" class="form-control" name="key" />
        </div>
        <button class="btn btn-primary w-100"
        type="submit">Search</button>
    </form>
</aside>
{{-- <div class="col-lg-4 sidebar ftco-animate"> --}}

    <div class="sidebar-box ftco-animate">
            <h3 class="heading">Categories</h3>
        <ul class="categories">
            <li><a href="#">Shoes <span>(12)</span></a></li>
            <li><a href="#">Men's Shoes <span>(22)</span></a></li>
            <li><a href="#">Women's <span>(37)</span></a></li>
            <li><a href="#">Accessories <span>(42)</span></a></li>
            <li><a href="#">Sports <span>(14)</span></a></li>
            <li><a href="#">Lifestyle <span>(140)</span></a></li>
        </ul>
    </div>

{{-- </div> --}}


