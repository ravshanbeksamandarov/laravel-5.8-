@extends('layouts/admin')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                Yangiliklar
            <a class="btn btn-sm btn-info float-right" href="{{ route('admin.buys.create') }}">Yangilik qo'shish</a>
            </h6>
        </div>
        <div class="card-body">
                @include('admin.alerts.main')
            <table class="table table-bordered">
                <thead>
                    <th>Rasm</th>
                    <th>Nomi</th>
                    <th>Narxi</th>
                    <th width="200px">Amallar</th>
                </thead>

                <tbody>
                    @foreach ($buys as $buy)
                    <tr>
                        <td>
                        <img class="img img-thumbnail" width="90px" src="/storage/{{ $buy->thumb }}" alt="{{ $buy->name }}">
                        </td>
                        <td>{{$buy->name}}</td>
                        <td>{{$buy->money}}</td>
                        <td>
                            <a class="btn text-white btn-success btn-sm float-left" href="{{ route('admin.buys.show', $buy->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-sm btn-primary float-left" href="{{ route('admin.buys.edit', $buy->id)}}">
                                <i class="fa fa-edit"></i></a>

                            <form method="POST" action="{{route('admin.buys.destroy', $buy->id)}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="blog-pagination justify-content-center d-flex">
                {!! $links !!}
            </div>
        </div>
    </div>
</div>

@endsection
