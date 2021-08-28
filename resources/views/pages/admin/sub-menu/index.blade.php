@extends('layouts/admin')

@section('title', 'Submenu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mb-3 mb-sm-0">Submenu</h1>
            <a href="{{ route('sub-menu.create') }}" class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add Submenu
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
                            <th>Submenu</th>
                            <th>Icon</th>
                            <th>Url</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td class="align-middle">{{ $item->id }}</td>
                                <td class="align-middle">{{ $item->menu->menu }}</td>
                                <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle">{{ $item->icon }}</td>
                                <td class="align-middle">{{ $item->url }}</td>
                                <td class="align-middle">{{ $item->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('sub-menu.edit', $item->id) }}" class="btn btn-sm btn-outline-dark mr-2">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <form action="{{ route('sub-menu.destroy', $item->id) }}" method="post" class="d-inline">
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