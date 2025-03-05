@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Albums</h2>
    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
          <input type="text" name="name" placeholder="Nama Album" required>
        <button type="submit">Tambah Album</button>
    </form>
    <div class="row">
        @foreach($albums as $album)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('folder-icon.png') }}" class="card-img-top" alt="Folder">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <a href="{{ route('albums.show', $album->id) }}" class="btn btn-primary">Lihat Album</a>
                        <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus Album</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection