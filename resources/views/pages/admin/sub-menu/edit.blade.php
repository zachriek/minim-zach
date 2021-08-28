@extends('layouts/admin')

@section('title', 'Edit Submenu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Submenu</h1>
        </div>

        <!-- Card -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('sub-menu.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="menu_id">Menu</label>
                        <select name="menu_id" id="menu_id" required class="form-control @error('menu_id') is-invalid @enderror">
                            <option value="{{ $item->menu_id }}">{{ $item->menu->menu }} (SELECTED)</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->menu }}</option>
                            @endforeach
                        </select>
                        @error('menu_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Submenu</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Submenu" value="{{ (old('title')) ? old('title') : $item->title }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" placeholder="Icon" value="{{ (old('icon')) ? old('icon') : $item->icon }}" required>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url" placeholder="Url" value="{{ (old('url')) ? old('url') : $item->url }}" required>
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_active">Active?</label>
                        <select name="is_active" id="is_active" required class="form-control @error('is_active') is-invalid @enderror">
                            <option value="{{ $item->is_active }}">{{ $item->is_active == 1 ? 'Active' : 'Inactive' }} (SELECTED)</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('is_active')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark btn-block">Edit</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection