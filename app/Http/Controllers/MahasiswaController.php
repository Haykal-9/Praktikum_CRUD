<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MahasiswaController extends Controller
{
    function index()
    {
        $data_mhs = Mahasiswa::all();
        return view('mahasiswa', ['mhs' => $data_mhs]);
    }

    function input()
    {
    $data_prodi = Prodi::all(); // ambil semua data prodi
    return view('input_mahasiswa', compact('data_prodi'));
    }



    function simpan(Request $x)
    {
        $namaFile = null;

        if($x->hasFile('foto')){
            $file = $x->file('foto');
            $namaFile = $x->file('foto')->getClientOriginalName();
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $x->file('foto')->move(public_path('uploads/'), $namaFile);
        }

        Mahasiswa::create(
            [
                'NIM' => $x->nim,
                'nama' => $x->nama,
                'email' => $x->email,
                'id_prodi' => $x->prodi,
                'foto' => $namaFile
            ]
        );
        return redirect('/mahasiswa');
    }

    function hapus(Request $x, $NIM)
    {
        $data_mhs = Mahasiswa::findOrFail($NIM);

        if($data_mhs->foto){
            $path = public_path('uploads/'.$data_mhs->foto);
            if (File::exists($path)){
                File::delete($path);
            }
        }
        $data_mhs->delete();

        return redirect('/mahasiswa');
    }

    function edit($NIM)
    {
        $data_mhs = Mahasiswa::findOrFail($NIM);
        $data_prodi = Prodi::all();
        return view('/edit_mahasiswa', compact('data_mhs', 'data_prodi'));
    }

    function update(request $a)
    {
        $data_mhs = Mahasiswa::findOrFail($a->nim);

        if($a->hasFile('foto')){
            if($data_mhs->foto){
                $oldPath = public_path('uploads/'.$data_mhs->foto);
                if (File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }

            $file = $a->file('foto');
            $namaFile = time().'.'.$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $namaFile);
            $data_mhs->foto = $namaFile;
        }
        else {
            $namaFile = $data_mhs->foto;
        }
        $data_mhs->update(
            [
                'NIM' => $a->nim,
                'nama' => $a->nama,
                'email' => $a->email,
                'id_prodi' => $a->prodi,
                'foto' => $namaFile
            ]
        );

        return redirect('/mahasiswa');
    }
}


