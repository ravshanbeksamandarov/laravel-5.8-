@extends('layouts.app', ['title' => "Qidiruv"])

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Qidiruv</span></p>
            <h1 class="mb-0 bread">Qidiruv</h1>
          </div>
        </div>
      </div>
</div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 order-lg-last ftco-animate">
			<div class="row">
            @if (!count($results))
                <div style="margin-right: 20px" class="alert alert-primary w-100">
                    Sizning "{{ request()->get('key') }}" so'rovinggiz bo'yicha hech nima topilmadi.
                </div>
            @endif
            @foreach ( $results as $post )
                @include('parts._blog-item', ['post' => $post])
            @endforeach

					<div style="margin-left:150px" class="blog-pagination justify-content-center d-flex">
						{{ $links }}
					</div>
		    </div>
          </div> <!-- .col-md-8 -->
          @include('parts._sidebar')
        </div>

      </div>
    </section>

@endsection
