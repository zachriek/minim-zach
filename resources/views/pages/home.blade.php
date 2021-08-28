@extends('layouts/app')

@section('title', 'Home')

@push('my-navbar')
	<!-- My Navbar -->
	<section class="my-navbar" id="my-navbar">
	  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm p-3" data-aos="fade-down" data-aos-duration="800">
	    <div class="container-fluid">
	      <a class="navbar-brand fw-bold" href="#home" data-aos="fade-down" data-aos-duration="800">
	      	<span>minim</span>
	      </a>

	      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" data-aos="fade-left" data-aos-duration="800">
	        <i class="bi bi-text-right fs-3"></i>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarNav">
	        <ul class="navbar-nav px-lg-5">
	          @auth
	          <li class="nav-item mt-3 d-block d-lg-none">
	          	<a href="{{ Auth::user()->roles == 'ADMIN' ? route('admin-dashboard') : route('profile-user-index') }}" class="btn-profile" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
			      <img src="{{ Storage::url('assets/img_profile/'.Auth::user()->image) }}" alt="image" width="40" class="rounded-circle">
			    </a>
	          </li>
	          @endauth

	          <li class="nav-item mt-3 px-lg-1 mt-lg-0">
	            <a class="nav-link active" aria-current="page" href="#home">Home</a>
	          </li>
	          <li class="nav-item px-lg-1">
	            <a class="nav-link" href="#popular">Popular</a>
	          </li>
	          <li class="nav-item px-lg-1">
	            <a class="nav-link" href="#collections">Collections</a>
	          </li>
	          <li class="nav-item px-lg-1">
	            <a class="nav-link" href="#contact">Contact Us</a>
	          </li>
	        </ul>

	        @auth
	        <ul class="navbar-nav ms-lg-auto">
	          <li class="nav-item mt-3 mt-lg-0 d-none d-lg-block">
	          	<a href="{{ Auth::user()->roles == 'ADMIN' ? route('admin-dashboard') : route('profile-user-index') }}" class="btn-profile" data-aos="fade-right" data-aos-duration="800">
			      <img src="{{ Storage::url('assets/img_profile/'.Auth::user()->image) }}" alt="image" width="40" class="rounded-circle">
			    </a>
	          </li>
	        </ul>
	        @endauth

	        @guest
	        <form class="form ms-lg-auto">
	          <button class="btn btn-dark my-2" type="button" data-aos="fade-left" data-aos-duration="800"
	            onclick="event.preventDefault(); location.href = '{{  url('login') }}';">
	            Login
	          </button>
	        </form>
	        @endguest
	      </div>
	    </div>
	  </nav>
	</section>
	<!-- End of My Navbar -->
@endpush

@section('content')
	<div class="section-welcome" data-aos="fade" data-aos-duration="1000"></div>
	<!-- Section Carousel -->
	<section class="section-carousel">
		<!-- <div class="carousel" id="myCarousel" data-aos="fade-down" data-aos-duration="800" data-aos-delay="500"></div> -->
		<div class="container">
			<div class="row justify-content-center welcome" data-aos="fade-down" data-aos-duration="800">
				<div class="col-11 col-md-8 col-lg-6 text-center">
					<h1>Welcome</h1>
					<p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Unde itaque tenetur labore, ratione eum, voluptatum ut tempora. Architecto eum corporis eligendi deleniti ipsam asperiores! Reiciendis accusantium, nisi quae explicabo recusandae?</p>

					@guest
					<a href="{{ route('register') }}" class="btn btn-dark">Get Started</a>
					@endguest

					@auth
					<a href="#collections" class="btn btn-dark">Get Started</a>
					@endauth
				</div>
			</div>
		</div>
	</section>
	<!-- End of Section Carousel -->


	<!-- Section Popular -->
	<section class="section-popular" id="popular">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-sm-12" data-aos="fade-down" data-aos-duration="800">
					<h1 class="d-inline">Popular</h1>
					<p class="d-inline px-1 text-muted fw-bold" style="font-size: .8rem;">-PHOTO</p>
				</div>
			</div>

			<div class="row justify-content-center mt-5">
				@foreach($photos as $photo)
				<div class="col-11 col-sm-6 col-lg-4 mb-5">
					<img src="{{ Storage::url('assets/gallery/photos/'.$photo->image) }}" class="img-thumbnail" alt="image">
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- End of Section Popular -->


	<!-- Section Collections -->
	<section class="section-collections" id="collections">
		<div class="container">
			<div class="row justify-content-center" data-aos="fade-down" data-aos-duration="800">
				<div class="col-11 col-md-12">
					<h1 class="d-inline">Collections</h1>
					<p class="d-inline px-1 text-muted fw-bold" style="font-size: .8rem;">-GALLERY</p>
				</div>
			</div>

			<div class="row mt-5 justify-content-center">
				<div class="col-11 col-md-6 col-lg-4 mb-5">
					<img src="{{ Storage::url('assets/gallery/photos/'.$photos[0]->image) }}" class="img-thumbnail" alt="image">
				</div>
				<div class="col-11 col-md-6 mb-5 ms-md-auto" data-aos="fade-right" data-aos-duration="800">
					<h2>Lorem ipsum dolor sit amet.</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet blanditiis in beatae alias nostrum laboriosam maiores nihil possimus voluptatibus. Iure.</p>
					<a href="{{ route('collections-photo') }}" class="btn-collections">See photo collections</a>
				</div>
			</div>

			<div class="row mt-5 justify-content-center" data-aos="fade-right" data-aos-duration="800">
				<div class="col-11 col-md-6 col-lg-4 mb-5">
					<img src="{{ Storage::url('assets/gallery/photos/'.$photos[1]->image) }}" class="img-thumbnail" alt="image">
				</div>
				<div class="col-11 col-md-6 mb-5 ms-md-auto">
					<h2>Lorem ipsum dolor sit amet.</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet blanditiis in beatae alias nostrum laboriosam maiores nihil possimus voluptatibus. Iure.</p>
					<a href="{{ route('collections-video') }}" class="btn-collections">See video collections</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Section Collections -->


	<!-- Section Contact -->
	<section class="section-contact" id="contact">
		<div class="container">
			<div class="row justify-content-center" data-aos="fade-right" data-aos-duration="800">
				<div class="col-11 col-md-4 mb-3">
					<h1>Contact Us</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus vel alias accusamus laborum perferendis debitis temporibus aut aperiam maxime fugiat!</p>
				</div>
				<div class="col-11 col-md-6 ms-md-auto">
					<div class="row justify-content-center" data-aos="fade-right" data-aos-duration="800">
						<form action="" name="zach-contact-form">
							<div class="col-12 col-sm-10 col-lg-8">
								<div class="mb-3">
								  <input type="text" class="form-control" name="nama" id="nama" placeholder="Name" required>
								</div>
							</div>
							<div class="col-12 col-sm-10 col-lg-8">
								<div class="mb-3">
								  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
								</div>
							</div>
							<div class="col-12 col-sm-10 col-lg-8">
								<div class="mb-3">
								  <textarea class="form-control" name="pesan" id="pesan" placeholder="Message" style="height: 100px;" required></textarea>
								</div>
							</div>
							<div class="col-4">
								<button class="btn btn-dark send-button" type="submit">Send</button>
								<button class="btn btn-dark loading-button d-none" type="button" disabled>
								  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								  Loading...
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Section Contact -->
@endsection

@push('addon-script')
	<!-- Sweet ALert -->
	<script src="frontend/libraries/sweetalert/sweetalert2.all.js"></script>
	<!-- Custom JS -->
	<script>
		const navLink = document.querySelectorAll('.nav-link');

		navLink.forEach(nav => nav.addEventListener('click', function() {
			navLink.forEach(nav => nav.classList.remove('active'));
			nav.classList.add('active');
		}));

		const popularImg = document.querySelectorAll('.section-popular .img-thumbnail');

		popularImg.forEach((img, i) => {
			img.dataset.fancybox = 'popular';
			img.dataset.aos = 'fade-down';
			img.dataset.aosDelay = i * 100;
			img.dataset.aosDuration = '800';
		});

		const collectionsImg = document.querySelectorAll('.section-collections .img-thumbnail');

		collectionsImg.forEach((img, i) => {
			img.dataset.fancybox = 'collections';
			img.dataset.aos = 'fade-right';
			img.dataset.aosDelay = i * 100;
			img.dataset.aosDuration = '800';
		});

		const navItems = document.querySelectorAll('.nav-item');

		navItems.forEach((nav, i) => {
			nav.dataset.aos = 'fade-down';
			nav.dataset.aosDuration = '800';
			nav.dataset.aosDelay = i * 50 + 200;
		});

		const scriptURL = 'https://script.google.com/macros/s/AKfycbw5SrPQEBQ5jm2d0e4ryWdiqd_FUYrVpBuDI1Lw8_tfiRTZcb0yExQmzPJCD-LAfRGMFA/exec';
		const form = document.forms['zach-contact-form'];
		const sendButton = document.querySelector('.send-button');
		const loadingButton = document.querySelector('.loading-button');

		form.addEventListener('submit', e => {
			e.preventDefault();
			sendButton.classList.toggle('d-none');
			loadingButton.classList.toggle('d-none');
			fetch(scriptURL, { method: 'POST', body: new FormData(form)})
			  .then(response => {
			  	sendButton.classList.toggle('d-none');
				loadingButton.classList.toggle('d-none');
				Swal.fire({
				  icon: 'success',
				  title: 'Berhasil!',
				  text: 'Pesan anda sudah kami terima 😊'
				});
				form.reset();
			  	console.log('Success!', response)
			  })
			  .catch(error => console.error('Error!', error.message))
		});

		// const myCarousel = new Carousel(document.querySelector("#myCarousel"), {
		//   slides: [
		//     { html: `<img src="{{ Storage::url('assets/gallery/photos/'.$photos[0]->image) }}" class="d-block" alt="image" data-fancybox="carousel" width="600">` },
		//     { html: `<img src="{{ Storage::url('assets/gallery/photos/'.$photos[1]->image) }}" class="d-block" alt="image" data-fancybox="carousel" width="600">` },
		//     { html: `<img src="{{ Storage::url('assets/gallery/photos/'.$photos[2]->image) }}" class="d-block" alt="image" data-fancybox="carousel" width="600">` }
		//   ],
		//   center: false
		// });

		AOS.init();

		AOS.init({
			once: true
		});
	</script>
@endpush