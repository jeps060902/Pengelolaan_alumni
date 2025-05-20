<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Http\Resources\AlumniResource;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{


    public function index(Request $request)
    {
        $query = Alumni::query();
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->jurusan);
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }
        $Alumni = $query->get();
        return new AlumniResource(true, 'List Data Alumni', $Alumni);
        // return view('Alumni.Alumni', [
        //     'title' => 'Data Alumni',
        //     'alumni' => $Alumni,
        //     'angkatan' => Alumni::select('angkatan')->distinct()->get(),
        //     'jurusan' => Alumni::select('jurusan')->distinct()->get(),
        // ]);
    }
    public function Store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:100',
            'angkatan' => 'required|integer|min:2000|max:' . (date('Y') + 5),
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Simpan data jika validasi lolos
        $alumni = Alumni::create([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
        ]);

        return new AlumniResource(true, 'Alumni Berhasil Ditambahkan', $alumni);
    }
    public function hapus($id)
    {
        Alumni::findOrFail($id)->delete();
        return redirect()->route('Alumni.Alumni');
    }
    public function show($id)
<<<<<<< HEAD
    {
        $alumni = Alumni::findOrFail($id);
        return new AlumniResource(true, 'Detail data alumni', $alumni);
    }
    public function update(Request $request, $id)
=======
>>>>>>> 10e11a895d6e9c6f2b2a652f6bbb2c183eac2694
    {
        $alumni = Alumni::findOrFail($id);
        return new AlumniResource(true, 'Alumni Berhasil kirim', $alumni);
    }
    public function update(Request $request, $id)
    {
        $alumni = Alumni::find($id);

        if (!$alumni) {
            return response()->json(['message' => 'Data alumni tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:100',
            'angkatan' => 'required|integer|min:2000|max:' . (date('Y') + 5),
        ]);
<<<<<<< HEAD
=======

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $alumni->update([
            'nama' => $request->input('nama'), // bukan $request->Nama
            'jurusan' => $request->input('jurusan'),
            'angkatan' => $request->input('angkatan'),
        ]);
>>>>>>> 10e11a895d6e9c6f2b2a652f6bbb2c183eac2694
        return new AlumniResource(true, 'Alumni Berhasil diedit', $alumni);
    }
}
