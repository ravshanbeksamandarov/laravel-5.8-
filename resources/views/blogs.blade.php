@extends('layouts/app', ['title' => 'Blog single'])

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>News</span></p>
            <h1 class="mb-0 bread">Single News</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
              <img src="/storage/{{ $post->img }}" alt="" class="img-fluid">

              <h4 class="mb-3">{{$post->title}}</h4>

              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span>  {{ $post->created_at }}</a></div>
                <div><a href="#"><span class="icon-user"></span> Admin</a></div>
                <div><a href="#"><span class="icon-eye"></span> {{ $post->views }}</a></div>
                </div>
                <h5> {{ $post->short }}</h5>
                <h5>{{ $post->content }} </h5>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            {{-- <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div> --}}
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
                            <h5>{{ $post->title }}</h5>
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
          </div>
        </div>
      </div>
    </section>

@endsection
