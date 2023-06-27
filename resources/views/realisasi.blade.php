@extends('theme')
@section('title','Realisasi')
@section('content')
<div class="pagetitle">
      <h1>Realisasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Form Realisasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Realisasi</h5>
              @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
              <!-- General Form Elements -->
              <form action="{{ route('realisasi.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                  <label for="id_pemohon" class="col-sm-2 col-form-label">ID Pemohon</label>
                  <div class="col-sm-10">
                      <select name="id_pemohon" id="id_pemohon" class="form-control" required>
                          <option value="" disabled selected>Pilih Pemohon</option>
                          @foreach ($pemohonList as $pemohon)
                              @if(auth()->user()->role === 'super-admin' || $pemohon->user_id === auth()->user()->id)
                                  <option value="{{ $pemohon->id_pemohon }}">{{ $pemohon->nama_pemohon }}</option>
                              @endif
                          @endforeach
                      </select>
                      @error('id_pemohon')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
              </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tujuan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="realisasi_tujuan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_pulang" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Jam Pengembalian</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="jam_pulang" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">KM Akhir</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">KM</span>
                        <input type="number" class="form-control" name="km_akhir" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Biaya BBM</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_bbm" name="biaya_bbm" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Biaya Parkir</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_parkir" name="biaya_parkir" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Biaya Tol</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_tol" name="biaya_tol" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Biaya Lain Lain</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_lain_lain" name="biaya_lain_lain" required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Total Realisasi Biaya</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="number" class="form-control" name="total_realisasi" id="total_biaya" readonly required>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Catatan Perjalanan</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                      <textarea class="form-control" name="catatan" placeholder="catatan" id="floatingTextarea" style="height: 100px;"></textarea>
                      </div>
                  </div>
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
        function calculateTotalBiaya() {
            var biaya_bbm = parseInt(document.getElementById('biaya_bbm').value) || 0;
            var biaya_parkir = parseInt(document.getElementById('biaya_parkir').value) || 0;
            var biaya_tol = parseInt(document.getElementById('biaya_tol').value) || 0;
            var biaya_lain_lain = parseInt(document.getElementById('biaya_lain_lain').value) || 0;

            var total_biaya = biaya_bbm + biaya_parkir + biaya_tol + biaya_lain_lain;

            document.getElementById('total_biaya').value = total_biaya;
        }
    </script>
@endsection
