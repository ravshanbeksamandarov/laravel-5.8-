@extends('layouts/admin')

@section('content')


<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                Maqolalar
            <a class="btn btn-sm btn-info float-right" href="{{ route('posts.create') }}">Yangilik qo'shish</a>
            </h6>
        </div>
        <div class="card-body">
            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
            <table class="table table-bordered">
                <thead>
                    <th>Sarlavha</th>
                    <th width="300px">Amallar</th>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('posts.edit',['id' => $post->id])}}">O'zgartirish</a>

                            <form method="POST" action="{{route('posts.destroy', ['id' => $post->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">O'chirish</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
