<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{


    public function Alumni(Request $request)
    {
        $query = Alumni::query();
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->jurusan);
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }

        $Alumni = $query->get();
        return view('Alumni.Alumni', [
            'title' => 'Data Alumni',
            'alumni' => $Alumni,
            'angkatan' => Alumni::select('angkatan')->distinct()->get(),
            'jurusan' => Alumni::select('jurusan')->distinct()->get(),
        ]);
    }
    public function Tambah(Request $request)
    {
        Alumni::create([
            'Nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
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
            'Nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
        ]);
        return redirect()->route('Alumni.Alumni');
    }
}
