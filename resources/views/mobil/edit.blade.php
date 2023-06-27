@extends('theme')
@section('title', 'Mobil')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Mobil</h5>

        <!-- Horizontal Form -->
        <form action="{{ route('mobil.update', $mobil->id_mobil) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Mobil</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" name="jenis_mobil" value="{{ $mobil->jenis_mobil }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Polisi</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" name="nomor_polisi" value="{{ $mobil->nomor_polisi }}">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('mobil') }}" class="btn btn-secondary">cencel</a>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>

@endsection