<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Pemohon;
use App\Models\Realisasi;
use Carbon\Carbon;

class printController extends Controller
{
    public function index()
    {
        $realisasis = Realisasi::all();
        $pemohons = Pemohon::all();

        $pemohonList = Pemohon::whereDoesntHave('realisasi')->get();

        return view('cetak', compact('realisasis', 'pemohons', 'pemohonList'));
    }


    // ...
    public function cetak(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Buat instance Carbon untuk bulan dan tahun yang dipilih
        $date = Carbon::create($tahun, $bulan, 1);

        // Dapatkan tanggal awal dan akhir dari bulan yang dipilih
        $startOfMonth = $date->startOfMonth();
        $endOfMonth = $date->endOfMonth();

        // Query data realisasi dalam rentang bulan dan tahun yang dipilih
        $realisasis = Realisasi::whereBetween('tgl_pulang', [$startOfMonth, $endOfMonth])->get();

        return view('cetak', ['realisasis' => $realisasis, 'bulan' => $bulan, 'tahun' => $tahun]);
    }

    public function exportData()
    {
        // Buat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();

        // Buat objek Worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set header kolom
        $worksheet->setCellValue('A1', 'NO.');
        $worksheet->setCellValue('B1', 'NAMA DRIVER');
        $worksheet->setCellValue('C1', 'NAMA USER');
        $worksheet->setCellValue('D1', 'NOPOL KENDARAAN');
        $worksheet->setCellValue('E1', 'JENIS/TYPE UNIT');
        $worksheet->setCellValue('F1', 'TANGGAL PERGI');
        $worksheet->setCellValue('G1', 'JAM PERGI');
        $worksheet->setCellValue('H1', 'TANGGAL KEMBALI');
        $worksheet->setCellValue('I1', 'JAM KEMBALI');
        $worksheet->setCellValue('J1', 'KM AWAL');
        $worksheet->setCellValue('K1', 'KM AKHIR');
        $worksheet->setCellValue('L1', 'TUJUAN');
        $worksheet->setCellValue('M1', 'BBM');
        $worksheet->setCellValue('N1', 'TOL');
        $worksheet->setCellValue('O1', 'PARKIR');
        $worksheet->setCellValue('P1', 'LAIN-LAIN');
        $worksheet->setCellValue('Q1', 'TOTAL BIAYA');
    
        // Ambil data dari model Realisasi
        $realisasis = Realisasi::all();
    
        // Set data dari model Realisasi ke dalam worksheet
        $row = 2;
        $no = 1;
        foreach ($realisasis as $realisasi) {
            if (auth()->user()->role === 'super-admin' || auth()->user()->id === $realisasi->pemohon->user_id) {
                $worksheet->setCellValue('A' . $row, $no++);
                $worksheet->setCellValue('B' . $row, $realisasi->pemohon->nama_driver);
                $worksheet->setCellValue('C' . $row, $realisasi->pemohon->nama_pemohon);
                $worksheet->setCellValue('D' . $row, $realisasi->pemohon->no_polisi);
                $worksheet->setCellValue('E' . $row, $realisasi->pemohon->jenis);
                $worksheet->setCellValue('F' . $row, $realisasi->pemohon->tgl_penggunaan);
                $worksheet->setCellValue('G' . $row, $realisasi->pemohon->jam_penggunaan);
                $worksheet->setCellValue('H' . $row, $realisasi->tgl_pulang);
                $worksheet->setCellValue('I' . $row, $realisasi->jam_pulang);
                $worksheet->setCellValue('J' . $row, $realisasi->pemohon->km_awal);
                $worksheet->setCellValue('K' . $row, $realisasi->km_akhir);
                $worksheet->setCellValue('L' . $row, $realisasi->realisasi_tujuan);
                $worksheet->setCellValue('M' . $row, $realisasi->biaya_bbm);
                $worksheet->setCellValue('N' . $row, $realisasi->biaya_tol);
                $worksheet->setCellValue('O' . $row, $realisasi->biaya_parkir);
                $worksheet->setCellValue('P' . $row, $realisasi->biaya_lain_lain);
                $worksheet->setCellValue('Q' . $row, $realisasi->total_realisasi);
    
                $worksheet->getStyle('J' . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $worksheet->getStyle('K' . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $worksheet->getStyle('M' . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $worksheet->getStyle('N' . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $worksheet->getStyle('O' . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $worksheet->getStyle('P' . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $worksheet->getStyle('Q' . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
    
                $row++;
            }
        }
    
        // Buat objek Writer untuk menulis ke file XLSX
        $writer = new Xlsx($spreadsheet);
    
        // Tentukan nama file yang akan dihasilkan
        $filename = 'export_data.xlsx';
    
        // Simpan file XLSX ke dalam storage/app/public
        $writer->save(storage_path('app/public/' . $filename));
    
        // Atur URL file yang akan di-download
        $fileUrl = asset('storage/' . $filename);
    
        // Redirect user to the file download URL
        return redirect($fileUrl);
    }

    public function show($id_realisasi)
    {
        $realisasi = Realisasi::with('pemohon')->findOrFail($id_realisasi);

        return view('cetak-show', compact('realisasi'));
    }

    public function edit($id_realisasi)
    {
        $realisasi = Realisasi::with('pemohon')->findOrFail($id_realisasi);
        $pemohons = Pemohon::all();

        return view('edit-data', compact('realisasi', 'pemohons'));
    }

    public function update(Request $request, $id_realisasi)
    {
        $request->validate([
            'nama_driver' => 'required',
            'nama_pemohon' => 'required',
            'no_polisi' => 'required',
            'realisasi_tujuan' => 'required',
            'tgl_pulang' => 'required|date',
            'jam_pulang' => 'required',
            'km_akhir' => 'required|numeric',
            'biaya_bbm' => 'required|numeric',
            'biaya_parkir' => 'required|numeric',
            'biaya_tol' => 'required|numeric',
            'biaya_lain_lain' => 'required|numeric',
            'total_realisasi' => 'required|numeric',
            'catatan' => 'nullable',
        ]);

        $realisasi = Realisasi::findOrFail($id_realisasi);

        $realisasi->update([
            'realisasi_tujuan' => $request->input('realisasi_tujuan'),
            'tgl_pulang' => $request->input('tgl_pulang'),
            'jam_pulang' => $request->input('jam_pulang'),
            'km_akhir' => $request->input('km_akhir'),
            'biaya_bbm' => $request->input('biaya_bbm'),
            'biaya_parkir' => $request->input('biaya_parkir'),
            'biaya_tol' => $request->input('biaya_tol'),
            'biaya_lain_lain' => $request->input('biaya_lain_lain'),
            'total_realisasi' => $request->input('total_realisasi'),
            'catatan' => $request->input('catatan'),
        ]);

        $pemohon = Pemohon::findOrFail($realisasi->id_pemohon);

        $pemohon->update([
            'nama_pemohon' => $request->input('nama_pemohon'),
            'jabatan' => $request->input('jabatan'),
            'bagian' => $request->input('bagian'),
            'nama_driver' => $request->input('nama_driver'),
            'tgl_penggunaan' => $request->input('tgl_penggunaan'),
            'tgl_pengembalian' => $request->input('tgl_pengembalian'),
            'jam_penggunaan' => $request->input('jam_penggunaan'),
            'jam_pengembalian' => $request->input('jam_pengembalian'),
            'jenis' => $request->input('jenis'),
            'no_polisi' => $request->input('no_polisi'),
            'km_awal' => $request->input('km_awal'),
            'tujuan' => $request->input('tujuan'),
            'estimasi_bbm' => $request->input('estimasi_bbm'),
            'estimasi_parkir' => $request->input('estimasi_parkir'),
            'estimasi_tol' => $request->input('estimasi_tol'),
            'estimasi_lain_lain' => $request->input('estimasi_lain_lain'),
            'total_estimasi' => $request->input('total_estimasi'),
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id_realisasi)
    {
        $realisasi = Realisasi::findOrFail($id_realisasi);
        
        // Hapus pemohon terkait
        $id_pemohon = $realisasi->id_pemohon;
        Pemohon::where('id_pemohon', $id_pemohon)->delete();

        // Hapus realisasi
        $realisasi->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

}
