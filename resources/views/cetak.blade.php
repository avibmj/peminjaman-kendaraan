@extends('theme')
@section('title','Cetak')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Table</h5>
        <table id="example" class="table dataTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    @if(auth()->user()->role === 'super-admin')
                    <th scope="col">Username</th>
                    @endif
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Tgl Penggunaan</th>
                    <th scope="col">Tgl Pengembalian</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
                @endphp
                @if($realisasis->count() > 0)
                    @foreach($realisasis as $realisasi)
                        @if(auth()->user()->role === 'super-admin' || $realisasi->pemohon->user_id === auth()->user()->id)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            @if(auth()->user()->role === 'super-admin')
                            <td>{{ $realisasi->pemohon->user->name }}</td>
                            @endif
                            <td>{{ $realisasi->pemohon->nama_pemohon }}</td>
                            <td>{{ $realisasi->pemohon->jabatan }}</td>
                            <td>{{ $realisasi->pemohon->tgl_penggunaan }}</td>
                            <td>{{ $realisasi->tgl_pulang }}</td>
                            <td>
                                <a href="{{ route('edit-data', ['id_realisasi' => $realisasi->id_realisasi]) }}"
                                    class="btn btn-warning">edit</a>
                                    @if(auth()->user()->role === 'super-admin')
                                <a href="{{ route('destroy', ['id_realisasi' => $realisasi->id_realisasi]) }}"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    class="btn btn-danger">hapus</a>
                                    @endif
                                <a href="{{ route('cetak-show', ['id_realisasi' => $realisasi->id_realisasi]) }}"
                                    class="btn btn-success">lihat</a>
                            </td>
                        </tr>
                        @php
                        $counter++;
                        @endphp
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Tidak ada data yang cocok dengan filter yang dipilih.</td>
                    </tr>
                @endif
            </tbody>

        </table>
        <a href="{{ route('export-data') }}" class="btn btn-primary">Ekspor Excel</a>
        <!-- Akhir Tabel dengan baris yang dikurangi -->
    </div>
</div>

@if(auth()->user()->role === 'super-admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Yang Belum Di Realisasikan</h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Tanggal Penggunaan</th>
                        <th scope="col">Jam Penggunaan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach($pemohonList as $pemohon)
                    <tr>
                        <th scope="row">{{ $counter }}</th>
                        <td>{{ $pemohon->user->name ?? 'N/A' }}</td>
                        <td>{{ $pemohon->nama_pemohon }}</td>
                        <td>{{ $pemohon->jabatan }}</td>
                        <td>{{ $pemohon->tgl_penggunaan }}</td>
                        <td>{{ $pemohon->jam_penggunaan }}</td>
                    </tr>
                    @php
                    $counter++;
                    @endphp
                    @endforeach
                    @if($counter === 1)
                        <tr>
                            <td colspan="6">Tidak ada data yang belum di realisasikan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- End Table with hoverable rows -->
        </div>
    </div>
@endif

@endsection

