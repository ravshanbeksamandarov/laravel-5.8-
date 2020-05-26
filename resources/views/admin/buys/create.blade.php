@extends('layouts/admin')

@section('content')


<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                Yangilik qo'shish
            </h6>
        </div>
        <div class="card-body">
            @include('admin.alerts.main')
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.buys.store') }}">
              @csrf
                    <div class="form-group">
                        <label for="">Nomi</label>
                        <input value="{{old('name')}}" class="form-control" name="name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Narxi</label>
                        <input value="{{old('money')}}" class="form-control" name="money" type="number">
                    </div>
                    <div class="form-group">
                        <label for="">Rasm</label>
                        <input class="form-control" name="image" type="file">
                    </div>

                    <button type="submit" class="btn btn-success">Saqlash</button>
            </form>
        </div>
    </div>
</div>

@endsection

@include('admin.components.editor')
