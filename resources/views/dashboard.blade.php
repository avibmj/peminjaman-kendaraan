@extends('theme')
@section('title','Permohonan')
@section('content')
<div class="pagetitle">
      <h1>Pemohon</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Form Pemohon</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pemohon</h5>
              @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
              <!-- General Form Elements -->
              <form action="{{ route('pemohon.create') }}" method="post"> 
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pemohon" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jabatan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bagian</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bagian" required>
                  </div>
                </div>
                <br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Driver</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_driver" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal penggunaan</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" name="tgl_penggunaan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_pengembalian" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Jam Penggunaan</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="jam_penggunaan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Jam Pengembalian</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="jam_pengembalian" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jenis/Type Kendaraan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nomor Polisi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_polisi" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">KM Awal</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">KM</span>
                        <input type="number" class="form-control" name="km_awal" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tujuan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tujuan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Estimasi BBM</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" name="estimasi_bbm" id="estimasi_bbm" onchange="calculateTotalEstimasi()" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Estimasi Parkir</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" name="estimasi_parkir" id="estimasi_parkir" onchange="calculateTotalEstimasi()" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Estimasi Tol</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" name="estimasi_tol" id="estimasi_tol" onchange="calculateTotalEstimasi()" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Estimasi Lain Lain</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" name="estimasi_lain_lain" id="estimasi_lain_lain" onchange="calculateTotalEstimasi()" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Total Estimasi Biaya</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-text">RP</span>
                      <input type="number" class="form-control" name="total_estimasi" id="total_estimasi" readonly>
                    </div>
                  </div>
                </div>

                <br>
                <div class="row mb-3">
                <span><b>Keterangan: Pemohon Minimal Level Koordinator/Team Leader</b></span>
                </div>
                <div style="float: right;">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>

              </form><!-- End General Form Elements -->
              

            </div>
          </div>

        </div>

      </div>
    </section>
    <script>
        function calculateTotalEstimasi() {
            var estimasi_bbm = parseInt(document.getElementById('estimasi_bbm').value) || 0;
            var estimasi_parkir = parseInt(document.getElementById('estimasi_parkir').value) || 0;
            var estimasi_tol = parseInt(document.getElementById('estimasi_tol').value) || 0;
            var estimasi_lain_lain = parseInt(document.getElementById('estimasi_lain_lain').value) || 0;

            var total_estimasi = estimasi_bbm + estimasi_parkir + estimasi_tol + estimasi_lain_lain;

            document.getElementById('total_estimasi').value = total_estimasi;
        }
    </script>

@endsection