@extends('layouts/admin')

@section('content')

<div class="col-lg-8">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                Profilni tahrirlash
            </h6>
        </div>
            <div class="card-body">
                @include('admin.alerts.main')
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Ism <span class="text-danger">*</span></label>
                    <input class="form-control" name="name" id="name" required value="{{ old('name', $user->name) }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Manzil <span class="text-danger">*</span></label>
                        <input class="form-control" name="email" type="email" id="email" required value="{{ old('email', $user->email) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                    
                </form>
            </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">
                Parolni tahrirlash
            </h6>
        </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="password">Yangi parol <span class="text-danger">*</span></label>
                        <input class="form-control" name="password" type="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Yangi parolni tasdiqlang <span class="text-danger">*</span></label>
                            <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-danger">O'zgartirish</button>
                    </form>
            </div>
    </div>
</div>

@endsection
