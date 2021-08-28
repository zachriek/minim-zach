@extends('layouts/admin')

@section('title', 'Add Video')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Video</h1>
        </div>

        <!-- Card -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <video class="img-thumbnail img-preview img-photo-gallery mb-2" controls>
                        <source src="" type="video/mp4">
                    </video>

                    <div class="form-group">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('video') is-invalid @enderror" id="video" name="video" onchange="previewVideo()">
                            <label class="custom-file-label" for="video">Choose video</label>
                            @error('video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="">Select Type</option>
                            <option value="popular">Popular</option>
                            <option value="not_popular">Not Popular</option>
                        </select>
                        @error('type')
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

@push('addon-script')
    <!-- Custom JS -->
    <script>
        function previewVideo() {
            const video = document.querySelector('#video');
            const videoLabel = document.querySelector('.custom-file-label');
            const videoPreview = document.querySelector('.img-preview');

            videoLabel.textContent = video.files[0].name;

            const fileVideo = new FileReader();
            fileVideo.readAsDataURL(video.files[0]);

            fileVideo.onload = function(e) {
                videoPreview.src = e.target.result;
            }
        }
    </script>
@endpush