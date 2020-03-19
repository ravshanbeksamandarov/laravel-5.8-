@extends('layouts/app', ['title' => "Blog"])

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>News</span></p>
            <h1 class="mb-0 bread">News</h1>
          </div>
        </div>
      </div>
</div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 order-lg-last ftco-animate">
						<div class="row">
							@foreach ( $posts as $post )
							<div class="col-md-12 d-flex ftco-animate">
								{{-- d-md-flex --}}
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <p class="block-20" style="background-image: url(/storage/{{$post->thumb}});">
					  </p>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
						  <div><a href="#">{{$post->created_at->format('d.M.Y')}}</a></div>
						  {{-- <div><a href="#">{{$post->created_at->format('M')}}</a></div>
						  <div><a href="#">{{$post->created_at->format('Y')}}</a></div> --}}
						  <div>
							  <a class="btn btn-sm btn-primary" href="#"><i class="icon-eye"></i>{{$post->views}}</a>
						  </div>


						  <h3 class="heading">{{ $post->title }}</h3>
						  <p>{{ $post->short }}</p>
						  <p><a href="{{ route('Blog-single', $post->id) }}" class="btn btn-primary py-2 px-3">Read more</a></p>

						  {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
						  </div>
					</div>
				</div>
			</div>
					@endforeach

					<div style="margin-left:150px" class="blog-pagination justify-content-center d-flex">
						{{ $links }}
					</div>
		          		</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
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
            <div class="sidebar-box ftco-animate">
                <h3 class="heading">Recent Blog</h3>
                @foreach ($mosts as $most)

                <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(/storage/{{ $most->thumb }});"></a>
                    <div class="text">
                        <h3 class="heading-1">
                        <a href="{{ route('Blog-single', $most->id) }}">
                        <h5>{{ $most->title }}</h5>
                            </a>
                        </h3>
                        <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> {{ $most->created_at->format('H:i d/m/Y') }} </a></div>
                            <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> {{ $most->views }}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
          </div>
        </div>
      </div>
    </section>

@endsection
