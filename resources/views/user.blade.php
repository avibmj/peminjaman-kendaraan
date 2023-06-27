@extends('theme')
@section('title','user')
@section('content')
<div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table with stripped rows</h5>

              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @php
                $counter = 1;
                @endphp
                @foreach ($data as $user)
                <tbody>
                  <tr>
                    <th>{{ $counter }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        @if ($user->status === 'nonaktif')
                            <a href="{{ route('user.activate', ['id' => $user->id]) }}" class="btn btn-secondary">Activate</a>
                        @else
                            <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="btn btn-danger">Disable</a>
                        @endif
   
                    </td>
                  </tr>
                </tbody>
                @php
                $counter++;
                @endphp
                @endforeach
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
</div>
@endsection
