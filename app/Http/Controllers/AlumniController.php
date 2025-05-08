<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jurusan;
use App\Models\Angkatan;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        return view('Home', ['title' => 'Home Page']);
    }

    public function Alumni()
    {
        $angkatans = Angkatan::all();
        $jurusans = Jurusan::all();
        $Alumni = Alumni::all();
        return view('Alumni', ['title' => 'Alumni Page', 'alumni' => $Alumni, 'angkatan' => $angkatans, 'jurusan' => $jurusans]);
    }
    public function Tambah(Request $request)
    {
        Alumni::create([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan,
            'angkatan_id' => $request->angkatan,
        ]);
        return redirect()->route('Alumni.Alumni');
    }
    public function hapus($id)
    {
        Alumni::findOrFail($id)->delete();
        return redirect()->route('Alumni.Alumni');
    }
    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan,
            'angkatan_id' => $request->angkatan,
        ]);
        return redirect()->route('products.index');
    }
}
