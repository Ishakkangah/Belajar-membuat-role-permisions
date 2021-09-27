@extends('Dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fw-bold fs-3">
    DAPTAR MAHASISWA
</div>

<div class="row">
    <div class="col-md-10">
        <div>
            <p class="fw-bold  mb-0">All user : {{ $all_users->count() }}</p>
        </div>
        <table class="table table-hover">
            <thead>
              <tr class="fw-bold bg-secondary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">action</th>
                <th scope="col">status</th>
              </tr>
            </thead>
            <tbody class="table table-sm">
                @foreach ($users as $key => $user)
                <tr class="text-secondary">
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="{{ route('user.show', $user->name) }}" class="badge bg-success"><span data-feather="eye"></span></a>
                    </td>
                    @foreach ($user->roles as $role)
                        <td class="badge bg-danger sho text-light text-wrap my-2" style="width: 4rem">{{ $role->name }}</td> 
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="small">{{ $users->links() }}</div>
    </div>
</div>
@endsection