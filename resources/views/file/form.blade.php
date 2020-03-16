{{-- @if (session()->has('success'))
    <h4>{{session()->get('success')}}</h4>
@endif
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $$error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" enctype="multipart/form-data" action="{{ route('file.store') }}">
    @csrf
    @method('post')
    <label for="">
        Faylni tanlang
        <input type="file" name="picture">
    </label>
    <button type="submit">Saqlash</button>
</form> --}}
