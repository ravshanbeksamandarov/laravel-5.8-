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
                        @include('parts._blog-item', ['post' => $post])
					@endforeach

					<div style="margin-left:150px" class="blog-pagination justify-content-center d-flex">
						{{ $links }}
					</div>
		        </div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
              @include('parts._sidebar')

            <div class="sidebar-box ftco-animate">
                <h3 class="heading">Recent Blog</h3>
                @foreach ($mosts as $most)

                <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(/storage/{{ $most->thumb }});"></a>
                    <div class="text">
                        <h3 class="heading-1">
                        <a href="{{ route('Blog-single', $most->translate('slug')) }}">
                        <h5>{{ $most->translate('title') }}</h5>
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
