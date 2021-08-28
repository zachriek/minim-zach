@extends('layouts/admin')

@section('title', 'Edit Photo')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Photo</h1>
        </div>

        <!-- Card -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('photos.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <img src="{{ Storage::url('assets/gallery/photos/'.$item->image) }}" alt="Image" width="150" class="img-thumbnail img-preview mb-2 border-0">

                    <div class="form-group">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImg()">
                            <label class="custom-file-label" for="image">Choose image</label>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="{{ $item->type }}">{{ $item->type == 'popular' ? 'Popular' : 'Not Popular' }} (SELECTED)</option>
                            <option value="popular">Popular</option>
                            <option value="">Not Popular</option>
                        </select>
                        @error('type')
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

@push('addon-script')
    <!-- Custom JS -->
    <script>
        function previewImg() {
            const image = document.querySelector('#image');
            const imageLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            imageLabel.textContent = image.files[0].name;

            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);

            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
@endpush