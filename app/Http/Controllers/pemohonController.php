<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\pemohon;
use App\Models\User;
use App\Models\mobil;

class pemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobils = Mobil::all();
        $data = ['pemohon']; // Replace with the data you want to send to the view
        
        return view('dashboard', compact('data', 'mobils'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $mobils = Mobil::whereNotIn('id_mobil', function ($query) {
            $query->select('id_mobil')
                ->from('tb_pemohons')
                ->where('status_realisasi', 1);
        })->get();
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string',
            'jabatan' => 'required|string',
            'bagian' => 'required|string',
            'nama_driver' => 'required|string',
            'tgl_penggunaan' => 'required|date',
            'tgl_pengembalian' => 'required|date',
            'jam_penggunaan' => 'required|date_format:H:i',
            'jam_pengembalian' => 'required|date_format:H:i',
            'jenis' => 'required|string',
            'no_polisi' => 'required|string',
            'km_awal' => 'required|integer',
            'tujuan' => 'required|string',
            'estimasi_bbm' => 'required|integer',
            'estimasi_parkir' => 'required|integer',
            'estimasi_tol' => 'required|integer',
            'estimasi_lain_lain' => 'required|integer',
        ]);

        // Hitung total estimasi
        $totalEstimasi = $validatedData['estimasi_bbm'] + $validatedData['estimasi_parkir'] + $validatedData['estimasi_tol'] + $validatedData['estimasi_lain_lain'];

        // Tambahkan total estimasi ke dalam validatedData
        $validatedData['total_estimasi'] = $totalEstimasi;

        // Simpan data pemohon ke dalam database
        $pemohon = Pemohon::create($validatedData);

        // Hubungkan pemohon dengan pengguna yang melakukan input
        $pemohon->user()->associate(Auth::user());
        $pemohon->save();
        
        // Redirect atau lakukan operasi lainnya setelah data berhasil disimpan
        // ...

        return redirect()->back()->with('success', 'Data pemohon berhasil disimpan.');
    }

    public function showForm($id_mobil)
    {
        $mobil = Mobil::find($id_mobil);

        return view('dashboard', ['mobil' => $mobil]);
    }

    public function getNoPolisi(Request $request, $jenisMobilId)
    {
        $mobil = Mobil::where('id', $jenisMobilId)->first();

        return response()->json(['no_polisi' => $mobil->nomor_polisi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
