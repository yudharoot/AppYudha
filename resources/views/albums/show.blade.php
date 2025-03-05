@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{ $album->name }}</h2>
    <img src="{{ asset('folder-icon.png') }}" class="img-fluid mb-3" alt="Folder">
    <h3>Upload Foto</h3>
    <form action="{{ route('photos.store', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo" required>
        <button type="submit" class="btn btn-success">Upload</button>
    </form>
    <h3 class="mt-4">Foto dalam Album</h3>
    <div class="row">
        @foreach($album->photos as $photo)
            <div class="col-md-3">
                <img src="{{ asset('uploads/' . $photo->photo) }}" class="img-fluid" alt="Foto">
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus Foto</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection    