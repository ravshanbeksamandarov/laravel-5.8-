@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                Xabarlar
            </h6>
        </div>
        <div class="card-body">
                @include('admin.alerts.main')
            <table class="table table-bordered">
                <thead>
                    <th>Nomi</th>
                    <th>Mavzu</th>
                    <th>Vaqti</th>
                    <th>Holati</th>
                    <th width="200px">Amallar</th>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->subject}}</td>
                        <td>{{$item->created_at->format('H:i d/m/Y')}}</td>
                        <td>{{$item->status ? 'O`qilgan' : 'O`qilmagan'}}</td>
                        <td>
                            <a class="btn btn-sm btn-primary text-white float-left" href="{{ route('admin.feedbacks.show', $item->id) }}"><i class="fa fa-eye"></i></a>
                            <form action="{{ route('admin.feedbacks.delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="blog-pagination justify-content-center d-flex">
                {{ $links }}
            </div>
        </div>
    </div>
</div>
@endsection
