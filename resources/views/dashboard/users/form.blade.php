@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h3>Users Data</h3>
            </div>

            <div class="col-4 text-right">
                <button class="btn btn-sm text-secondary" data-toggle="modal" data-target="#deleteModal">
                    <i class="fas fa-trash"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- Form Update data user -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="post" action="{{ url('dashboard/user/update/'.$user->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group mb-0">
                        <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<!-- membuat delete -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete</h5>
            </div>

            <div class="modal-body">
                <p>Anda yakin ingin menghapus user {{ $user->name  }}</p>
            </div>

            <div class="modal-footer">
                <form action="{{url('dashboard/user/delete/'.$user->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection