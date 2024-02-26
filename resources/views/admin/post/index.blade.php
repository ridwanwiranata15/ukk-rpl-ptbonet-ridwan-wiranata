@extends('layouts')
@section('title', 'Data Postingan')
@section('content')
<div class="card m-2">
    <a href="{{route('admin.post.create')}}" class="m-2">
        <button type="submit" class="btn btn-success">Tambah</button>
    </a>
    <div class="card-body">
        @if (session('alert'))
            <div class="alert alert-danger">
                {{session('alert')}}
            </div>

        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Postingan</th>
                    <th>Jenis kategori</th>
                    <th>Isi konten</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->judul}}</td>
                    <td>{{$post->kategori->judul}}</td>
                    <td>{{$post->isi}}</td>
                    <td>{{$post->status}}</td>
                    <td>
                        <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('admin.post.delete', $post->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
