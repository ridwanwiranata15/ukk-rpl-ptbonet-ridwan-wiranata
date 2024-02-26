@extends('layouts')
@section('title', 'Data Galeri')
@section('content')
    <div class="card m-2">
        <div class="card-body">
            @if (session('alert'))
            <div class="alert alert-danger">
                {{session('alert')}}
            </div>

        @endif
            <a href="{{route('admin.gallery.create')}}" class="btn btn-success m2">
                Tambah Gallery
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul postingan</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->post->judul}}</td>
                        <td>{{$item->position}}</td>
                        <td>{{$item->status}}</td>
                        <td class="d-flex">
                            <a href="{{route('admin.gallery.edit', $item->id)}}" class="mr-2">
                                <button type="submit" class="btn btn-warning ">Edit</button>
                            </a>
                            <form action="{{route('admin.gallery.delete', $item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau di hapus')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
