@extends('layouts')
@section('title', 'Ubah gallery')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.gallery.update', $gallery->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
              <label for="exampleInputEmail1">Judul postingan</label>
             <select name="post" id="">
                @foreach ($posts as $item)
                    <option value="{{$item->id}}" name="post">{{$item->title}}</option>
                @endforeach
             </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Posisi</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="position" value="{{$gallery->position}}">
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status" value="{{$gallery->status}}">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>
@endsection
