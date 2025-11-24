<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request; // Pastikan model sudah dibuat

class MataKuliahController extends Controller
{
    // Menampilkan semua matakuliah
    public function index()
    {
        $matakuliah = MataKuliah::all();

        return view('matakuliah', compact('matakuliah'));
    }

    // Menampilkan form input matakuliah
    public function input()
    {
        $dosen = Dosen::all(); // ambil semua dosen

        return view('input_matakuliah', compact('dosen'));
    }

    // Menyimpan matakuliah baru
    public function simpan(Request $request)
    {
        $request->validate([
            'nama_mk' => 'required|string|max:255',
            'id_mk' => 'required|string|max:50|unique:matakuliah,id_mk',
            'sks' => 'required|integer|min:1',
        ]);

        MataKuliah::create([
            'nama_mk' => $request->nama_mk,
            'id_mk' => $request->id_mk,
            'sks' => $request->sks,
            'NIP' => $request->NIP,
        ]);

        return redirect('/matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    // Menampilkan form edit matakuliah
    public function edit($id)
    {
        $dosen = Dosen::all();
        $matakuliah = MataKuliah::findOrFail($id);

        return view('edit_matakuliah', compact('matakuliah', 'dosen'));
    }

    // Mengupdate data matakuliah
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mk' => 'required|string|max:255',
            'id_mk' => 'required|string|max:50|unique:matakuliah,id_mk,'.$id.',id_mk',
            'sks' => 'required|integer|min:1',
        ]);

        $matakuliah = MataKuliah::where('id_mk', $id)->firstOrFail();
        $matakuliah->update([
            'nama_mk' => $request->nama_mk,
            'id_mk' => $request->id_mk,
            'sks' => $request->sks,
        ]);

        return redirect('/matakuliah')->with('success', 'Mata kuliah berhasil diupdate');
    }

    // Menghapus matakuliah
    public function hapus($id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        $matakuliah->delete();

        return redirect('/matakuliah')->with('success', 'Mata kuliah berhasil dihapus');
    }
}
