<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return view('prodi', ['prodi' => $prodi]);
    }

    public function input()
    {
        return view('input_prodi');
    }

    public function simpan(Request $request)
{
    $request->validate([
        'id_prodi' => 'required',
        'nama_prodi' => 'required',
        'fakultas' => 'required',
    ]);

    $prodi = new Prodi();
    $prodi->id_prodi = $request->id_prodi;
    $prodi->nama_prodi = $request->nama_prodi;
    $prodi->fakultas = $request->fakultas;
    $prodi->save();

    return redirect('/prodi')->with('success', 'Data prodi berhasil disimpan');
}


public function edit($id)
{
    $prodi = Prodi::findOrFail($id);
    return view('edit_prodi', compact('prodi'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'id_prodi' => 'required',
        'nama_prodi' => 'required',
        'fakultas' => 'required',
    ]);

    $prodi = Prodi::findOrFail($id);
    $prodi->update([
        'id_prodi' => $request->id_prodi,
        'nama_prodi' => $request->nama_prodi,
        'fakultas' => $request->fakultas,
    ]);

    return redirect('/prodi')->with('success', 'Data prodi berhasil diperbarui');
}


    public function hapus($id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();

        return redirect('/prodi');
    }
}