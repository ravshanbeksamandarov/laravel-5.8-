@extends('layouts/admin')

@section('content')


<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                {{$post->title}} - ko'rish
            </h6>
        </div>
        <div class="card-body">
            <h3>{{$post->title}}</h3>
            <br>
            <p>{{$post->img}}</p>
            <b>Qisqacha:</b>
            <p>
                {{$post->short}}
            </p>
            <b>Maqola:</b>
            <p>
                {{$post->content}}
            </p>
            <b>Yaratilgan vaqti:</b>
            <p>
            {{$post->created_at->format('H:i d/m/Y')}}
            </p>
        </div>
    </div>
</div>

@endsection
