<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function store(Request $request, $albumId)
    {
        $request->validate([
            'photo' => 'required|image|max:2048' // Validasi: wajib diisi, harus gambar, maksimal 2MB
        ]);

        $fileName = time() . '.' . $request->photo->extension(); // Beri nama file unik
        $request->photo->move(public_path('uploads'), $fileName); // Simpan ke folder `uploads`

        Photo::create([
            'album_id' => $albumId,
            'photo' => $fileName
        ]);

        return redirect()->route('albums.show', $albumId);
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        unlink(public_path('uploads/' . $photo->photo)); // Hapus file dari penyimpanan
        $photo->delete(); // Hapus dari database
        return back();
    }
}