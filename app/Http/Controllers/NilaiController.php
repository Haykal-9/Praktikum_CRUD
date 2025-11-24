<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['mahasiswa', 'mataKuliah'])->get();
        return view('nilai', ['nilai' => $nilai]);
    }


    public function input()
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        return view('input_nilai', [
            'mahasiswa' => $mahasiswa,
            'matakuliah' => $matakuliah
        ]);
    }


    public function simpan(Request $request)
    {
        $request->validate([
            'NIM' => 'required',
            'id_mk' => 'required',
            'nilai' => 'required|numeric',
            'berkas' => 'nullable|file|mimes:pdf|max:5120'
        ]);

        $namaFile = null;
        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $namaFile);
        }

        $nilai = new Nilai();
        $nilai->NIM = $request->NIM;
        $nilai->id_mk = $request->id_mk;
        $nilai->nilai = $request->nilai;
        $nilai->berkas = $namaFile;
        $nilai->save();

        return redirect('/nilai');
    }


    public function edit($id)
    {
        $nilai = Nilai::find($id);
        if (!$nilai) {
            return redirect('/nilai')->with('error', 'Data tidak ditemukan');
        }

        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        return view('edit_nilai', [
            'nilai' => $nilai,
            'mahasiswa' => $mahasiswa,
            'matakuliah' => $matakuliah
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'NIM' => 'required',
            'id_mk' => 'required',
            'nilai' => 'required|numeric',
            'berkas' => 'nullable|file|mimes:pdf|max:5120'
        ]);

        $nilai = Nilai::find($id);
        if (!$nilai) {
            return redirect('/nilai')->with('error', 'Data tidak ditemukan');
        }

        if ($request->hasFile('berkas')) {
            if ($nilai->berkas) {
                $oldPath = public_path('uploads/' . $nilai->berkas);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file = $request->file('berkas');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $namaFile);
            $nilai->berkas = $namaFile;
        }

        $nilai->NIM = $request->NIM;
        $nilai->id_mk = $request->id_mk;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect('/nilai');
    }

    public function hapus($id)
    {
        $nilai = Nilai::find($id);
        if (!$nilai) {
            return redirect('/nilai')->with('error', 'Data tidak ditemukan');
        }

        if ($nilai->berkas) {
            $path = public_path('uploads/' . $nilai->berkas);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $nilai->delete();

        return redirect('/nilai');
    }
}