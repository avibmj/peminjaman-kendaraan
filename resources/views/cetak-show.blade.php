@extends('theme')
@section('title', 'Detail Realisasi')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Pemohon</h5>
        <table class="table">
            <tbody>
                <tr>
                    <td>Nama Pemohon</td>
                    <td>{{ $realisasi->pemohon->nama_pemohon }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>{{ $realisasi->pemohon->jabatan }}</td>
                </tr>
                <tr>
                    <td>Bagian</td>
                    <td>{{ $realisasi->pemohon->bagian }}</td>
                </tr>
                <tr>
                    <td>Nama Driver</td>
                    <td>{{ $realisasi->pemohon->nama_driver }}</td>
                </tr>
                <tr>
                    <td>Tanggal Penggunaan</td>
                    <td>{{ $realisasi->pemohon->tgl_penggunaan }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pengembalian</td>
                    <td>{{ $realisasi->pemohon->tgl_pengembalian }}</td>
                </tr>
                <tr>
                    <td>Jam Penggunaan</td>
                    <td>{{ $realisasi->pemohon->jam_penggunaan }}</td>
                </tr>
                <tr>
                    <td>Jam Pengembalian</td>
                    <td>{{ $realisasi->pemohon->jam_pengembalian }}</td>
                </tr>
                <tr>
                    <td>Jenis Kendaraan</td>
                    <td>{{ $realisasi->pemohon->jenis }}</td>
                </tr>
                <tr>
                    <td>No Polisi</td>
                    <td>{{ $realisasi->pemohon->no_polisi }}</td>
                </tr>
                <tr>
                    <td>KM Awal</td>
                    <td>{{ $realisasi->pemohon->km_awal }}</td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>{{ $realisasi->pemohon->tujuan }}</td>
                </tr>
                <tr>
                    <td>Estimsi BBM</td>
                    <td>{{ $realisasi->pemohon->estimasi_bbm }}</td>
                </tr>
                <tr>
                    <td>Estimsi Parkir</td>
                    <td>{{ $realisasi->pemohon->estimasi_parkir }}</td>
                </tr>
                <tr>
                    <td>Estimsi Tol</td>
                    <td>{{ $realisasi->pemohon->estimasi_tol }}</td>
                </tr>
                <tr>
                    <td>Estimsi Lain Lain</td>
                    <td>{{ $realisasi->pemohon->estimasi_lain_lain }}</td>
                </tr>
                <tr>
                    <td>Total Estimasi</td>
                    <td>{{ $realisasi->pemohon->total_estimasi }}</td>
                </tr>
            </tbody>
        </table> 
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Realisasi</h5>
        <table class="table">
            <tbody>
                <tr>
                    <td>Realisasi Tujuan</td>
                    <td>{{ $realisasi->realisasi_tujuan }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pulang</td>
                    <td>{{ $realisasi->tgl_pulang }}</td>
                </tr>
                <tr>
                    <td>Jam Pulang</td>
                    <td>{{ $realisasi->jam_pulang }}</td>
                </tr>
                <tr>
                    <td>KM Akhit</td>
                    <td>{{ $realisasi->km_akhir }}</td>
                </tr>
                <tr>
                    <td>Biaya BBM</td>
                    <td>{{ $realisasi->biaya_bbm }}</td>
                </tr>
                <tr>
                    <td>Biaya Parkir</td>
                    <td>{{ $realisasi->biaya_parkir }}</td>
                </tr>
                <tr>
                    <td>Biaya Tol</td>
                    <td>{{ $realisasi->biaya_tol }}</td>
                </tr>
                <tr>
                    <td>Biaya Lain Lain</td>
                    <td>{{ $realisasi->biaya_lain_lain }}</td>
                </tr>
                <tr>
                    <td>Total Realisasi</td>
                    <td>{{ $realisasi->total_realisasi}}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>{{ $realisasi->catatan }}</td>
                </tr>
            </tbody>
        </table> 
    </div>
</div>
<a href="{{ route('cetak') }}" class="btn btn-primary ml-auto">Kembali</a>
<a class="btn btn-success" href="javascript:void(0);" onclick="printPageArea('printableArea')">Print</a>

<div id="printableArea">
@include('print-preview') 
</div>

<script>
    function printPageArea(areaID) {
        var printContent = document.getElementById(areaID).innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    }

    printPageArea('elementID')
</script>

<style>
    #printableArea {
        display: none;
        width: 210mm;
        height: 297mm;
        margin: 0 auto;
    }
</style>

@endsection
