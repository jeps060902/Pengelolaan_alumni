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
        $angkatanFilter = $request->query('angkatan');
        $jurusanFilter = $request->query('jurusan');
        $angkatan = Alumni::select('angkatan');
        $jurusan = Alumni::select('jurusan');
        if ($jurusanFilter) {
            $query->whereHas('alumni', function ($q) use ($jurusanFilter) {
                $q->where('jurusan', $jurusanFilter);
            });
        }

        if ($angkatanFilter) {
            $query->whereHas('alumni', function ($q) use ($angkatanFilter) {
                $q->where('angkatan', $angkatanFilter);
            });
        }
        if ($id) {
            $query->where('alumni_id', $id);
        }
        $prestasi = $query->get();

        $alumniQuery = Alumni::query();
        if ($jurusanFilter) {
            $alumniQuery->where('jurusan', $jurusanFilter);
        }
        if ($angkatanFilter) {
            $alumniQuery->where('angkatan', $angkatanFilter);
        }
        $alumni = $alumniQuery->get();

        return view('Prestasi.Prestasi', [
            'title' => 'Detail Prestasi',
            'prestasi' => $prestasi,
            'angkatan' => $angkatan->distinct()->get(),
            'jurusan' => $jurusan->distinct()->get(),
            'angkatan1' => $angkatanFilter,
            'jurusan1' => $jurusanFilter,
            'alumni' => $alumni,
            'id' => $id,
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
    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->update([
            'prestasi' => $request->nama_prestasi,
            'grade' => $request->grade,
        ]);
        return redirect()->route('Prestasi.Prestasi');
    }
    public function hapus($id)
    {
        Prestasi::findOrFail($id)->delete();
        return redirect()->route('Prestasi.Prestasi');
    }
}
