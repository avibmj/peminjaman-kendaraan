<style>
    .print table {
        font-size: 12px;
        height: 10px;
    }

    .print table td {
        padding-top: 0;
        padding-bottom: 0;
    }


    .ttd table {
        border: 1px solid;
        font-size: 10px;
        border-collapse: collapse;
    }

    .ttd td,th {
        border: 1px solid;
        font-size: 10px;
        border-collapse: collapse;
    }

    .print h6 {
        font-size: 10px;
    }

    .print p {
        font-size: 12px;
    }

    header.kotak-garis-tepi {
    border: 1px solid black; /* Garis tepi berwarna hitam dengan ketebalan 1px */
    padding-left: 10px;
    padding-right: 10px;
    }

    section.kotak-garis-tepi {
    border: 1px solid black; /* Garis tepi berwarna hitam dengan ketebalan 1px */
    padding-left: 10px;
    padding-right: 10px;
    }

</style>
<header class="kotak-garis-tepi">
    <div class="row col-md-12 align-items-center pt-2 pb-2">
        <div class="col-md-3 d-flex align-items-center">
            <img style="height: 75px; padding-right: 100px;" src="{{ asset('download.jpg') }}" alt="Logo" class="mr-3">
            <div class="ml-3 text-center">
                <h3 class="align-self-center mb-2"><b>BANK Arto Moro</b></h3>
                <h5 class="align-self-center mb-0"><b>Form Request Kendaraan Operasional</b></h5>
            </div>
        </div>
    </div>
</header>
<section class="kotak-garis-tepi">
<div class="print pt-3">
    <table class="table">
        <tbody>
        <tr>
            <td>Nama Pemohon </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->nama_pemohon }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Jabatan </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->jabatan }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Bagian </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->bagian }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Nama Driver </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->nama_driver }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Tanggal Penggunaan </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->tgl_penggunaan }}</td>
            <td>s/d</td>
            <td>{{ $realisasi->pemohon->tgl_pengembalian }}</td>
        </tr>
        <tr>
            <td>Jam Penggunaan </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->jam_penggunaan }}</td>
            <td>s/d</td>
            <td>{{ $realisasi->pemohon->jam_pengembalian }}</td>
        </tr>
        <tr>
            <td>Jenis Kendaraan </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->jenis }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>No Polisi </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->no_polisi }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>KM Awal </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->km_awal }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Tujuan </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->tujuan }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Estimsi BBM </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->estimasi_bbm }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Estimsi Parkir </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->estimasi_parkir }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Estimsi Tol </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->estimasi_tol }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Estimsi Lain Lain </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->estimasi_lain_lain }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total Estimasi </td>
            <td>:</td>
            <td>{{ $realisasi->pemohon->total_estimasi }}</td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <h6><b>Keterangan: Pemohon minimal level koordinator/team leader</b></h6>
    <hr>
    <p class="text-center"><b>REALISASI PERJALANAN</b></p>
    <hr>
    <table class="table pb-3">
        <tbody>
        <tr>
            <td>Realisasi Tujuan</td>
            <td>:</td>
            <td>{{ $realisasi->realisasi_tujuan }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Tanggal Pulang</td><td>:</td>
            <td>{{ $realisasi->tgl_pulang }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Jam Pulang</td><td>:</td>
            <td>{{ $realisasi->jam_pulang }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>KM Akhit</td><td>:</td>
            <td>{{ $realisasi->km_akhir }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Biaya BBM</td><td>:</td>
            <td>{{ $realisasi->biaya_bbm }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Biaya Parkir</td><td>:</td>
            <td>{{ $realisasi->biaya_parkir }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Biaya Tol</td><td>:</td>
            <td>{{ $realisasi->biaya_tol }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Biaya Lain Lain</td><td>:</td>
            <td>{{ $realisasi->biaya_lain_lain }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total Realisasi</td><td>:</td>
            <td>{{ $realisasi->total_realisasi}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Catatan</td><td>:</td>
            <td>{{ $realisasi->catatan }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <?php
    use Carbon\Carbon;

    $tgl_pulang = $realisasi->tgl_pulang; // Tanggal yang ingin diformat

    \Carbon\Carbon::setLocale('id'); // Mengatur lokal bahasa menjadi bahasa Indonesia

    $hari = \Carbon\Carbon::parse($tgl_pulang)->isoFormat('dddd'); // Mendapatkan nama hari dalam bahasa Indonesia

    ?>
    <br>
    <h6>Semarang, <?php echo $hari . ', ' . \Carbon\Carbon::parse($tgl_pulang)->isoFormat('D MMMM YYYY'); ?></h6>
    <br>
</div>

<div class="ttd">
    <table class="table text-center">
    <tbody>
        <tr>
        <th>Dibuat Oleh</th>
        <th>Diperiksa Oleh</th>
        <th>Disetujui Oleh</th>
        <th>Diketahui Oleh</th>
        </tr>
        <tr>
        <td style="width: 30px; height: 50px;"></td>
        <td style="width: 30px; height: 50px;"></td>
        <td style="width: 30px; height: 50px;"></td>
        <td style="width: 30px; height: 50px;"></td>
        </tr>
        <tr>
        <th>Pemohon</th>
        <th>Admin Umum</th>
        <th>Kasi Umum</th>
        <th>Kabag. SDM,UMUM & Pengembangan</th>
        </tr>
    </tbody>
    </table>
</div>
</section>