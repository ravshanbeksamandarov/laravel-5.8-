@extends('layouts/admin')

@section('content')


<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                Maqola qo'shish
            </h6>
        </div>
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
        @endif
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.store') }}">
              @csrf
                <div class="form-group">
                    <label for="">Sarlavha</label>
                    <input class="form-control" name="title" type="text">
                </div>
                <div class="form-group">
                    <label for="">Qisqacha</label>
                    <input class="form-control" name="short" type="text">
                </div>
                <div class="form-group">
                    <label for="">Maqola</label>
                    <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Rasmni tanlang</label> <br>
                        <input type="file" name="img">
                </div>
                <button type="submit" class="btn btn-success">Saqlash</button>
            </form>
        </div>
    </div>
</div>

@endsection
