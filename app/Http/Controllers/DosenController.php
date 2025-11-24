<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DosenController extends Controller
{
    public function index()
    {
        $data_dosen = Dosen::all();
        return view('dosen', ['dosen' => $data_dosen]);
    }

    public function input()
    {
        return view('input_dosen');
    }

    public function simpan(Request $a)
    {

        $namaFile = null;

        if($a->hasFile('foto')){
            $file = $a->file('foto');
            $namaFile = $a->file('foto')->getClientOriginalName();
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $a->file('foto')->move(public_path('uploads/'), $namaFile);
        }

        Dosen::create(
            [
                'NIP' => $a->NIP,
                'nama' => $a->nama,
                'email' => $a->email,
                'foto' => $namaFile
            ]
        );
        return redirect('/dosen');
    }

    function hapus(Request $a, $NIP)
    {
        $data_dosen = Dosen::findOrFail($NIP);
        if($data_dosen->foto){
            $path = public_path('uploads/'.$data_dosen->foto);
            if (File::exists($path)){
                File::delete($path);
            }
        }
        $data_dosen->delete();

        return redirect('/dosen');
    }

    function edit($NIP)
    {
        $data_dosen = Dosen::findOrFail($NIP);
        return view('edit_dosen', compact('data_dosen'));
    }

    function update(Request $a)
    {
        $data_dosen = Dosen::findOrFail($a->NIP);

        if($a->hasFile('foto')){
                $oldPath = public_path('uploads/'.$data_dosen->foto);
                if (File::exists($oldPath)){
                    File::delete($oldPath);
                }
            $file = $a->file('foto');
            $namaFile = time().'.'.$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $namaFile);
            $data_dosen->foto = $namaFile;
            }else{
                $namaFile = $data_dosen->foto;
            }
            $data_dosen->update([
                'NIP' => $a->NIP,
                'nama' => $a->nama,
                'email'=> $a->email,
                'foto'=> $namaFile
            ]);
        return redirect('/dosen');
    }
}
