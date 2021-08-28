@extends('layouts/admin')

@section('title', 'Menu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mb-3 mb-sm-0">Menu</h1>
            <a href="{{ route('menu.create') }}" class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add Menu
            </a>
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
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td class="align-middle">{{ $item->id }}</td>
                                <td class="align-middle">{{ $item->menu }}</td>
                                <td class="align-middle">{{ $item->roles }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-sm btn-outline-dark mr-2">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <form action="{{ route('menu.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-dark">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data not found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{ $items->links() }}

    </div>
    <!-- /.container-fluid -->
@endsection