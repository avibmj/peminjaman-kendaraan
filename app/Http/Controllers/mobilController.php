<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;

class mobilController extends Controller
{
    public function index()
    {
        $mobils = mobil::all();

        return view('mobil.index', compact('mobils'));
    }

    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_mobil' => 'required',
            'nomor_polisi' => 'required',
        ]);

        Mobil::create([
            'jenis_mobil' => $request->jenis_mobil,
            'nomor_polisi' => $request->nomor_polisi,
        ]);

        return redirect()->route('mobil')->with('success', 'Data mobil berhasil disimpan.');
    }

    public function edit($id_mobil)
    {
        $mobil = Mobil::findOrFail($id_mobil);

        return view('mobil.edit', compact('mobil'));
    }

    public function update(Request $request, $id_mobil)
    {
        $request->validate([
            'jenis_mobil' => 'required',
            'nomor_polisi' => 'required',
        ]);

        $mobil = Mobil::findOrFail($id_mobil);
        $mobil->jenis_mobil = $request->jenis_mobil;
        $mobil->nomor_polisi = $request->nomor_polisi;
        $mobil->save();

        return redirect()->route('mobil')->with('success', 'Data mobil berhasil diperbarui.');
    }

    public function destroy($id_mobil)
    {
        $mobil = Mobil::findOrFail($id_mobil);
        $mobil->delete();

        return redirect()->route('mobil')->with('success', 'Data mobil berhasil dihapus.');
    }

}
