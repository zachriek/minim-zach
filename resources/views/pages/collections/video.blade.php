@extends('layouts.app')

@section('title', 'Collections')

@push('my-navbar')
	<!-- My Navbar -->
	<section class="my-navbar" id="my-navbar">
		<nav class="navbar fixed-top navbar-light bg-white shadow-sm p-3">
		  <div class="container-fluid">
		  	<a class="navbar-brand fw-bold" href="{{ route('home') }}" data-aos="fade-down" data-aos-duration="800">
		  		<span>minim</span>
		  	</a>

		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" data-aos="fade-left" data-aos-duration="800">
		      <i class="bi bi-text-right fs-3"></i>
		    </button>

		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		      	<li class="nav-item mt-3">
		      		<a href="{{ Auth::user()->roles == 'ADMIN' ? route('admin-dashboard') : route('collections-photo') }}" class="btn-profile" data-aos="fade-right" data-aos-duration="800">
				  		<img src="{{ Storage::url('assets/img_profile/'.Auth::user()->image) }}" alt="image" width="40" class="rounded-circle">
				  	</a>
		        	<a href="{{ Auth::user()->roles == 'ADMIN' ? route('admin-dashboard') : route('collections-photo') }}" class="text-decoration-none text-dark px-2" style="font-weight: 600;">{{ Auth::user()->name }}</a>
		        </li>
		        <li class="nav-item mt-3">
		          <a class="nav-link" aria-current="page" href="{{ route('home') }}">Back to Home</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</section>
	<!-- End of My Navbar -->
@endpush

@section('content')
	<!-- Section All Collections -->
  	<section class="section-all-collections mb-5">
  		<div class="container">
  			<div class="row justify-content-center" data-aos="fade-down" data-aos-duration="800">
  				<div class="col-11 col-sm-12">
  					<h1 class="d-inline">Collections</h1>
  					<p class="d-inline px-1 text-muted fw-bold" style="font-size: .8rem; text-transform: uppercase;">-{{ $type }}</p>
  				</div>
  			</div>

  			<div class="row mt-5">
  				@foreach($items as $item)
		  			<div class="col-sm-6 col-lg-4 mb-5">
		  				<video class="img-thumbnail img-photo-gallery" controls>
			                <source src="{{ Storage::url('assets/gallery/videos/'.$item->video) }}" type="video/mp4">
			            </video>
		  			</div>
	  			@endforeach
	  		</div>

	  		@empty($items)
	            <div class="alert alert-dark">
	              Data not found!
	            </div>
	        @endempty

	        {{ $items->links() }}
  		</div>
  	</section>
  	<!-- End of All Collections -->
@endsection

@push('addon-script')
	<!-- Custom JS -->
    <script>
    	const allCollectionsVideo = document.querySelectorAll('.section-all-collections .img-thumbnail');

    	allCollectionsVideo.forEach((video, i) => {
    		video.dataset.fancybox = 'collections';
    		video.dataset.aos = 'fade-down';
				video.dataset.aosDelay = i * 100;
				video.dataset.aosDuration = '800';
    	});

    	AOS.init();

    	AOS.init({
    		once: true
    	});
    </script>
@endpush