@extends('layouts')
@section('title', 'Tambah postingan')
@section('content')
<div class="card m-3">
    <div class="card-body">
        <form action="{{route('admin.post.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Judul postingan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
            </div>
            <div class="form-group">
                <label for="">Pilih kategory</label>
                <select name="category" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->judul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status">
              </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>


@endsection
