@extends('theme')
@section('title','Edit')
@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data</h5>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- General Form Elements -->
                    <form action="{{ route('update-data', $realisasi->id_realisasi) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="id_pemohon" class="col-sm-2 col-form-label">ID Pemohon</label>
                            <div class="col-sm-10">
                            <select name="id_pemohon" id="id_pemohon" class="form-control" required>
                                <option value="" disabled>Pilih Pemohon</option>
                                @foreach ($pemohons as $pemohon)
                                    @if ((auth()->user()->role === 'super-admin' || auth()->user()->id === $pemohon->user_id) && ($pemohon->realisasi->isEmpty() || $pemohon->id_pemohon == $realisasi->id_pemohon))
                                        <option value="{{ $pemohon->id_pemohon }}" {{ $realisasi->id_pemohon == $pemohon->id_pemohon ? 'selected' : '' }}>{{ $pemohon->nama_pemohon }}</option>
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
                                <input type="text" class="form-control" name="realisasi_tujuan" value="{{ $realisasi->realisasi_tujuan }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_pulang" value="{{ $realisasi->tgl_pulang }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTime" class="col-sm-2 col-form-label">Jam Pengembalian</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="jam_pulang" value="{{ $realisasi->jam_pulang }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">KM Akhir</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">KM</span>
                                    <input type="number" class="form-control" name="km_akhir" value="{{ $realisasi->km_akhir }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Biaya BBM</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_bbm" name="biaya_bbm" value="{{ $realisasi->biaya_bbm }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Biaya Parkir</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_parkir" name="biaya_parkir" value="{{ $realisasi->biaya_parkir }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Biaya Tol</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_tol" name="biaya_tol" value="{{ $realisasi->biaya_tol }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Biaya Lain Lain</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" onchange="calculateTotalBiaya()" id="biaya_lain_lain" name="biaya_lain_lain" value="{{ $realisasi->biaya_lain_lain }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Total Realisasi Biaya</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" name="total_realisasi" id="total_biaya" readonly value="{{ $realisasi->total_realisasi }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Catatan Perjalanan</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <textarea class="form-control" name="catatan" placeholder="catatan" id="catatan" style="height: 100px;">{{ $realisasi->catatan }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('cetak') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
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
