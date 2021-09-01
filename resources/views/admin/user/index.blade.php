@extends('layouts.main')
@section('content')

    <div class="row">
      <div class="col-12">
        <div class="x_panel">
          <div class="x_content">

            <table class="table table-sm">
              <caption>List of users</caption>
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Depan</th>
                  <th scope="col">Nama Belakang</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data_user as $user)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                      <form action="{{ route('admin_user.edit', ['id' => $user->id, 'role' => $user->role]) }}" class="d-inline-block" method="POST">
                        @csrf
                        @method('PUT')
                        
                        @if ($user->role == 'user')
                          <button class="btn btn-info btn-sm" type="submit">Jadikan Admin</button>
                        @endif
                      </form>
                    </td>
                  </tr>

                  @php
                      $no++;
                  @endphp
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>



@endsection

@section('script')

@endsection

@section('style')

@endsection