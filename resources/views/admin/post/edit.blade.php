@extends('layouts')
@section('title', 'Ubah postingan')
@section('content')
<div class="card m-3">
    <div class="card-body">
        <form action="{{route('admin.post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
              <label for="exampleInputEmail1">Judul postingan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="">Pilih kategory</label>
                <select name="category" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount" value="{{$post->amount}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status" value="{{$post->status}}">
              </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>


@endsection
