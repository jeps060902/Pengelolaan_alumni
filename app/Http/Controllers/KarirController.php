<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use App\Models\Alumni;
use Illuminate\Http\Request;

class KarirController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $query = Karir::with('alumni');
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
        $karir = $query->get();

        $alumniQuery = Alumni::query();
        if ($jurusanFilter) {
            $alumniQuery->where('jurusan', $jurusanFilter);
        }
        if ($angkatanFilter) {
            $alumniQuery->where('angkatan', $angkatanFilter);
        }
        $alumni = $alumniQuery->get();

        return view('Karir.Karir', [
            'title' => 'Detail Karir',
            'karir' => $karir,
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

        Karir::create([
            'alumni_id' => $request->alumni_id,
            'tempat' => $request->nama_tempat,
            'posisi' => $request->nama_posisi,
            'status' => $request->Status,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
        ]);
        return redirect()->back();
    }
}
