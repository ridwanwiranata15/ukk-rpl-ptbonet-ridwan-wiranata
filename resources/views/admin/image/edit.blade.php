@extends('layouts')
@section('title', 'Ubah Foto')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.image.update', $image->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="exampleInputEmail1">Posisi</label>
                    <select name="post" id="">
                        @foreach ($galleries as $item)
                            <option value="{{$item->id}}" name="post">{{$item->position}}</option>
                        @endforeach
                     </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Tambahkan Foto</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">judul</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{$image->title}}">
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
@endsection
