@extends('layouts')
@section('title', 'Data kategori')
@section('content')
    <div class="card m-2">
        <a href="{{route('admin.category.create')}}">
            <button type="submit" class="btn btn-success m-3">
                Tambah kategori
            </button>
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
                        <th>Judul kategory</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->judul}}</td>
                            <td class="d-flex">
                               <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-warning">
                                    Edit
                                </a>
                                <form action="{{route('admin.category.delete', $category->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau di hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
