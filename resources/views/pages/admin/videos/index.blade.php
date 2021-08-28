@extends('layouts/admin')

@section('title', 'Videos')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mb-3 mb-sm-0">Videos</h1>
            <a href="{{ route('videos.create') }}" class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add Video
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

        @empty($items)
            <div class="alert alert-dark">
              Data not found!
            </div>
        @endempty

        <div class="row p-0 p-sm-4">
          @foreach ($items as $item)
          <div class="col-sm-6 col-lg-4 mb-5 pb-5">
            <video class="img-thumbnail img-photo-gallery" controls>
                <source src="{{ Storage::url('assets/gallery/videos/'.$item->video) }}" type="video/mp4">
            </video>

            <a href="{{ route('videos.edit', $item->id) }}" class="btn btn-sm btn-outline-dark mt-1 ml-2"><i class="fas fa-fw fa-edit"></i>Edit</a>

            <form action="{{ route('videos.destroy', $item->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-outline-dark mt-1 ml-2">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>
          </div>
          @endforeach
        </div>

        <div class="row p-1 p-sm-4">
            <div class="col">
               {{ $items->links() }} 
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->
@endsection