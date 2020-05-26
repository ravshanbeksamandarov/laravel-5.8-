@extends('layouts/admin')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                {{$buy->name}} - ko'rish
            </h6>
        </div>
        <div class="card-body">
        <table class="table table-striped">
            <tr>
                <td class="font-weight-bold">Rasm</td>
                <td><img src="{{ '/storage/'.$buy->thumb }}" alt="{{ $buy->name }}"></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Nomi</td>
                <td>{{$buy->name}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Narxi</td>
                <td>{{$buy->money}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Sana</td>
                <td>{{$buy->created_at->format('H:i d/m/Y')}}</td>
            </tr>
        </table>
        </div>
    </div>
</div>

@endsection
