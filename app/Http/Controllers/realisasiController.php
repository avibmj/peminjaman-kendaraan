<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisasi;
use App\Models\Pemohon;

class RealisasiController extends Controller
{
    public function index()
    {
        $data = Realisasi::all();
        
        return view('realisasi', compact('data'));
    }

    public function create()
    {
        $pemohonList = Pemohon::whereNotIn('id_pemohon', function ($query) {
            $query->select('id_pemohon')
                  ->from('tb_realisasis');
        })->get();

        return view('realisasi', compact('pemohonList'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'realisasi_tujuan' => 'required|string',
            'tgl_pulang' => 'required|date',
            'jam_pulang' => 'required|date_format:H:i',
            'km_akhir' => 'required|integer',
            'biaya_bbm' => 'required|integer',
            'biaya_parkir' => 'required|integer',
            'biaya_tol' => 'required|integer',
            'biaya_lain_lain' => 'required|integer',
            'total_realisasi' => 'required|integer',
            'catatan' => 'nullable|string',
            'id_pemohon' => 'required|unique:tb_realisasis',
        ]);

        $realisasi = Realisasi::create($validatedData);
        $realisasi->id_pemohon = $request->id_pemohon;
        $realisasi->save();

        return redirect()->route('realisasi.create')->with('success', 'Data realisasi berhasil disimpan.');
    }
}
