<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $query = Prestasi::with('alumni');

        if ($request->jurusan) {
            $query->whereHas('alumni', function ($q) use ($request) {
                $q->where('jurusan', $request->jurusan);
            });
        }

        if ($request->angkatan) {
            $query->whereHas('alumni', function ($q) use ($request) {
                $q->where('angkatan', $request->angkatan);
            });
        }
        if ($id) {
            $query->where('alumni_id', $id);
        }
        $prestasi = $query->get();
        return view('Prestasi.Prestasi', [
            'title' => 'Detail Prestasi',
            'prestasi' => $prestasi,
            'angkatan' => Alumni::select('angkatan')->distinct()->get(),
            'jurusan' => Alumni::select('jurusan')->distinct()->get(),

        ]);
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'grade' => 'required|integer'
        ]);
        Prestasi::create([
            'alumni_id' => $request->alumni_id,
            'prestasi' => $request->nama_prestasi,
            'grade' => $request->grade,
        ]);
        return redirect()->back();
    }
}
