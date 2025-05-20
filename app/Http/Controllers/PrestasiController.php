<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Resources\AlumniResource;
use Illuminate\Support\Facades\Validator;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::with('alumni');
        $query = Prestasi::query();
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->jurusan);
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }
        $Prestasi = $query->get();
        return new AlumniResource(true, 'List Data Prestasi', $Prestasi);
        // $angkatanFilter = $request->query('angkatan');
        // $jurusanFilter = $request->query('jurusan');
        // $angkatan = Alumni::select('angkatan');
        // $jurusan = Alumni::select('jurusan');
        // if ($jurusanFilter) {
        //     $query->whereHas('alumni', function ($q) use ($jurusanFilter) {
        //         $q->where('jurusan', $jurusanFilter);
        //     });
        // }

        // if ($angkatanFilter) {
        //     $query->whereHas('alumni', function ($q) use ($angkatanFilter) {
        //         $q->where('angkatan', $angkatanFilter);
        //     });
        // }
        // if ($id) {
        //     $query->where('alumni_id', $id);
        // }
        // $prestasi = $query->get();

        // $alumniQuery = Alumni::query();
        // if ($jurusanFilter) {
        //     $alumniQuery->where('jurusan', $jurusanFilter);
        // }
        // if ($angkatanFilter) {
        //     $alumniQuery->where('angkatan', $angkatanFilter);
        // }
        // $alumni = $alumniQuery->get();

        // return view('Prestasi.Prestasi', [
        //     'title' => 'Detail Prestasi',
        //     'prestasi' => $prestasi,
        //     'angkatan' => $angkatan->distinct()->get(),
        //     'jurusan' => $jurusan->distinct()->get(),
        //     'angkatan1' => $angkatanFilter,
        //     'jurusan1' => $jurusanFilter,
        //     'alumni' => $alumni,
        //     'id' => $id,
        // ]);
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_prestasi' => 'required|string|max:255',
            'grade' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'errors' => $validator->errors()
            ], 422);
        }


        $prestasi = Prestasi::create([
            'alumni_id' => $request->alumni_id,
            'prestasi' => $request->nama_prestasi,
            'grade' => $request->grade,
        ]);
        return new AlumniResource(true, 'Alumni Berhasil Ditambahkan', $prestasi);
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
