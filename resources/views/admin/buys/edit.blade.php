@extends('layouts/admin' , ['title' => "O'zgartirish"])

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                {{$buy->name}} ni o'zgartirish
            </h6>
        </div>
        <div class="card-body">
                @include('admin.alerts.main')
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.buys.update', $buy->id) }}">
              @csrf
              @method('PUT')
                <div class="form-group">
                    <label for="">Nomi</label>
                    <input value="{{$buy->name}}" class="form-control" name="name" type="text">
                </div>
                <div class="form-group">
                    <label for="">Narxi</label>
                    <input value="{{$buy->money}}" class="form-control" name="money" type="number">
                </div>
                <div class="form-group">
                    <label for="">Rasm</label>
                    <input class="form-control" name="image" type="file">
                </div>
                <div class="form-group">
                    <img src="/storage/{{$buy->image}}" width="200px" class="img img-thumbnail" alt="">
                </div>
                <button type="submit" class="btn btn-success">O'zgartirish</button>
            </form>
        </div>
    </div>
</div>

@endsection
