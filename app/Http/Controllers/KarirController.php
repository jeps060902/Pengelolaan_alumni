<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use Illuminate\Http\Request;
use App\Http\Resources\AlumniResource;
use Illuminate\Support\Facades\Validator;

class KarirController extends Controller
{
    public function index()
    {
        $karir = Karir::with('alumni')->get();
        return new AlumniResource(true, 'Karir Berhasil Ditambahkan', $karir);
    }
    public function show($id)
    {
        $karir = Karir::with('alumni')->where('alumni_id', $id)->get();

        // Jika ingin cek apakah alumni ada (opsional)
        if ($karir->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Karir untuk alumni dengan id ' . $id . ' tidak ditemukan',
                'data' => []
            ], 404);
        }

        // Kirim response menggunakan AlumniResource
        return new AlumniResource(true, 'Karir Berhasil Ditampilkan untuk Alumni ID ' . $id, $karir);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tempat' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'status' => 'required|string',
            'tahun_mulai' => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_selesai' => 'integer|min:1900|max:' . date('Y'),
        ]);

        $validator->after(function ($validator) use ($request) {
            if ($request->tahun_mulai > $request->tahun_selesai) {
                $validator->errors()->add('tahun_mulai', 'Tahun mulai tidak boleh lebih besar dari tahun selesai.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $karir = Karir::create([
            'alumni_id' => $request->alumni_id,
            'tempat' => $request->tempat,
            'posisi' => $request->posisi,
            'status' => $request->status,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
        ]);
        return new AlumniResource(true, 'Prestasi Berhasil Ditambahkan', $karir);
    }
}
