@extends('layouts/admin')

@section('title', 'My Profile')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-dark">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Card -->
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="align-middle">
                                <img src="{{ Storage::url('assets/img_profile/'.$item->image) }}" alt="Image" width="150" class="img-thumbnail img-photo-gallery bg-light border-0">
                            </td>
                            <td class="align-middle">{{ $item->name }}</td>
                            <td class="align-middle">{{ $item->email }}</td>
                            <td class="align-middle">
                                <form action="{{ route('profile-edit', $item->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-dark">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection