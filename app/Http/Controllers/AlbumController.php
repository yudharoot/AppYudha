<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->get(); // Ambil semua album, urutkan dari yang terbaru
        return view('albums.index', compact('albums')); // Tampilkan ke view
    }

    public function show($id)
    {
        $album = Album::with('photos')->findOrFail($id); // Ambil album beserta foto-foto dalamnya
        return view('albums.show', compact('album'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required' // Nama album wajib diisi
        ]);

        Album::create([
            'name' => $request->name,
            'cover' => 'folder-icon.png' // Gunakan icon folder sebagai default cover
        ]);

        return redirect()->route('albums.index');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete(); // Hapus album
        return redirect()->route('albums.index');
    }
}