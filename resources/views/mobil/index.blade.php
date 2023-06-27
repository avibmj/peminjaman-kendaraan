@extends('theme')
@section('title', 'Mobil')
@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <h5 class="card-title">Table with stripped rows</h5>
        </div>
        <div class="col-lg-6 text-end pt-3">
          <a href="{{ route('mobil.create')}}" class="btn btn-primary">create</a>
        </div>
      </div>
      <!-- tampilan success -->
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <!-- Table with stripped rows -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">jenis</th>
            <th scope="col">Nomor Polisi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $counter = 1;
          @endphp
          @foreach($mobils as $mobil)
          <tr>
              <th scope="row">{{ $counter }}</th>
              <td>{{ $mobil->jenis_mobil }}</td>
              <td>{{ $mobil->nomor_polisi }}</td>
              <td>
                <a href="{{ route('mobil.destroy', ['id_mobil' => $mobil->id_mobil]) }}" class="btn btn-danger">Delete</a>
                <a href="{{ route('mobil.edit', ['id_mobil' => $mobil->id_mobil]) }}" class="btn btn-warning">Edit</a>
            </td>
          </tr>
          @php
          $counter++;
          @endphp
          @endforeach
          @if($counter === 1)
              <tr>
                  <td colspan="6">Tidak ada data mobil.</td>
              </tr>
          @endif
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
</div>
@endsection
