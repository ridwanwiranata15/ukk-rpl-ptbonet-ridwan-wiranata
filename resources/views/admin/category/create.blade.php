@extends('layouts')
@section('title', 'Tambah kategori')
@section('content')
<div class="card m-3">
    <div class="card-body">
        <form action="{{route('admin.category.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Judul kategori</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>


@endsection
