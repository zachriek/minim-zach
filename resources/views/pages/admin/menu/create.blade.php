@extends('layouts/admin')

@section('title', 'Add Menu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Menu</h1>
        </div>

        <!-- Card -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('menu.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" class="form-control @error('menu') is-invalid @enderror" name="menu" id="menu" placeholder="Menu" value="{{ old('menu') }}">
                        @error('menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <select name="roles" id="roles" required class="form-control @error('roles') is-invalid @enderror">
                            <option value="">Select Roles</option>
                            <option value="USER">USER</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>
                        @error('roles')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark btn-block">Save</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection