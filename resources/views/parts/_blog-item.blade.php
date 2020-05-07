<div class="col-md-12 d-flex ftco-animate">
    {{-- d-md-flex --}}
    <div class="blog-entry align-self-stretch d-md-flex">
        <p class="block-20" style="background-image:
            url(/storage/{{$post->thumb}});">
        </p>
        <div class="text d-block pl-md-4">
            <div class="meta mb-3">
                <div>
                    <a href="#">{{$post->created_at->format('d.M.Y')}}</a>
                </div>
            {{-- <div><a href="#">{{$post->created_at->format('M')}}</a></div>
            <div><a href="#">{{$post->created_at->format('Y')}}</a></div> --}}
                    <div>
                    <a class="btn btn-sm btn-primary" href="#">
                        <i class="icon-eye"></i>
                        {{$post->views}}
                    </a>
                    </div>


            <h3 class="heading">
                {{ $post->translate('title') }}
            </h3>
            <p>
                {{ $post->translate('short') }}
            </p>
            <p>
                <a href="{{ route('Blog-single', $post->translate('slug')) }}" class="btn btn-primary py-2 px-3">Read more</a>
            </p>

            {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
            </div>
        </div>
    </div>
</div>
