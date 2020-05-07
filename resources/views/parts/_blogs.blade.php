<div class="sidebar-box ftco-animate">
    <h3 CLASS="heading">Categories</h3>
  <ul class="categories">
    <li><a href="#">Bags <span>(12)</span></a></li>
    <li><a href="#">Shoes <span>(22)</span></a></li>
    <li><a href="#">Dress <span>(37)</span></a></li>
    <li><a href="#">Accessories <span>(42)</span></a></li>
    <li><a href="#">Makeup <span>(14)</span></a></li>
    <li><a href="#">Beauty <span>(140)</span></a></li>
  </ul>
</div>
<div class="sidebar-box ftco-animate">
  <h3 CLASS="heading">Recent Blog</h3>
  @foreach ($most_posts as $post)
    <div class="block-21 mb-4 d-flex">
        <a class="blog-img mr-4" style="background-image: url(/storage/{{ $post->thumb }});"></a>
        <div class="text">
        <h5 class="heading-1">
            <a href="{{route('Blog-single', $post->id)}}">
                <h5>{{ $post->translate('title') }}</h5>
            </a>
        </h5>
            <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> {{ $post->created_at->format('H:i d/m/Y') }}</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
            <div><a href="#"><span class="icon-eye"></span> {{ $post->views }}</a></div>
            </div>
        </div>
    </div>

  @endforeach
</div>
