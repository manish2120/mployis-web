
@extends('frontend.layouts.app')
@section('title', 'Home')
<!--begin::Main-->
@section('content')
<div class="d-flex flex-column flex-root">
	<!--begin::Header Section-->
	<div class="mb-0" id="home">
		@if(session('status'))
		<div class="alert alert-success fw-bold fs-5">
			{{ session('status') }}
		</div>
		@endif
		<!--begin::Wrapper-->
		<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
			
			<!--begin::Landing hero-->
			<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
				<!--begin::Heading-->
				<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
					<!--begin::Title-->
					<h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Unlock Exceptional Career Solutions
					<br />with
					<span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
						<span id="kt_landing_hero_text">MPLOYIS</span>
					</span></h1>
					<!--end::Title-->
					<!--begin::Action-->
					<a href="" class="btn btn-primary">Sign-up now</a>
				</div>

					<!--end::Action-->
				<!--end::Heading-->
				<!--begin::Clients-->
				{{-- <div class="d-flex flex-center flex-wrap position-relative px-5">
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
						<img src="{{url('frontend/assets/media/svg/brand-logos/fujifilm.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
						<img src="{{url('frontend/assets/media/svg/brand-logos/vodafone.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
						<img src="{{url('frontend/assets/media/svg/brand-logos/kpmg.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
						<img src="{{url('frontend/assets/media/svg/brand-logos/nasa.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
						<img src="{{url('frontend/assets/media/svg/brand-logos/aspnetzero.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="AON - Empower Results">
						<img src="{{url('frontend/assets/media/svg/brand-logos/aon.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
						<img src="{{url('frontend/assets/media/svg/brand-logos/hp-3.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
					<!--begin::Client-->
					<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
						<img src="{{url('frontend/assets/media/svg/brand-logos/truman.svg')}}" class="mh-30px mh-lg-40px" alt="" />
					</div>
					<!--end::Client-->
				</div> --}}
				<!--end::Clients-->
			</div>
			<!--end::Landing hero-->

			<!--begin::Scrolltop-->
			<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
				<span class="svg-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
						<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</div>
			<!--end::Scrolltop-->
		</div>

<!--begin::How It Works Section-->
		<!--begin::Container-->
		<div class="container">
			<!--begin::Heading-->
			<div class="text-center mb-17">
				<!--begin::Title-->
				<h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">"Connecting Talent with Opportunity"</h3>
				<!--end::Title-->
				<!--begin::Text-->
				<div class="fs-5 text-muted fw-bold">Mployis bridges the gap between job seekers and employers, helping you find </br> the perfect fit for your career.</div>
				<!--end::Text-->
			</div>
			<!--end::Heading-->
			<!--begin::Row-->
			<div class="row w-100 gy-10 mb-md-20">
				<!--begin::Col-->
				<div class="col-md-4 px-5">
					<!--begin::Story-->
					<div class="text-center mb-10 mb-md-0">
						<!--begin::Illustration-->
						<img src="{{url('frontend/assets/media/illustrations/sketchy-1/2.png')}}" class="mh-125px mb-9" alt="" />
						<!--end::Illustration-->
						<!--begin::Heading-->
						<div class="d-flex flex-center mb-5">
							<!--begin::Badge-->
							<span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">1</span>
							<!--end::Badge-->
							<!--begin::Title-->
							<div class="fs-5 fs-lg-3 fw-bolder text-dark">Sign Up</div>
							<!--end::Title-->
						</div>
						<!--end::Heading-->
						<!--begin::Description-->
						<div class="fw-bold fs-6 fs-lg-4 text-muted">Create a free account in minutes</br> and unlock access to thousands of job opportunities.</div>
						<!--end::Description-->
					</div>
					<!--end::Story-->
				</div>
				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-md-4 px-5">
					<!--begin::Story-->
					<div class="text-center mb-10 mb-md-0">
						<!--begin::Illustration-->
						<img src="{{url('frontend/assets/media/illustrations/sketchy-1/8.png')}}" class="mh-125px mb-9" alt="" />
						<!--end::Illustration-->
						<!--begin::Heading-->
						<div class="d-flex flex-center mb-5">
							<!--begin::Badge-->
							<span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span>
							<!--end::Badge-->
							<!--begin::Title-->
							<div class="fs-5 fs-lg-3 fw-bolder text-dark">Fill Out Your Information</div>
							<!--end::Title-->
						</div>
						<!--end::Heading-->
						<!--begin::Description-->
						<div class="fw-bold fs-6 fs-lg-4 text-muted">Complete your profile with key details </br> to receive personalized job recommendations that fit your skills.</div>
						<!--end::Description-->
					</div>
					<!--end::Story-->
				</div>
				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-md-4 px-5">
					<!--begin::Story-->
					<div class="text-center mb-10 mb-md-0">
						<!--begin::Illustration-->
						<img src="{{url('frontend/assets/media/illustrations/sketchy-1/12.png')}}" class="mh-125px mb-9" alt="" />
						<!--end::Illustration-->
						<!--begin::Heading-->
						<div class="d-flex flex-center mb-5">
							<!--begin::Badge-->
							<span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span>
							<!--end::Badge-->
							<!--begin::Title-->
							<div class="fs-5 fs-lg-3 fw-bolder text-dark">Find Suitable Jobs</div>
							<!--end::Title-->
						</div>
						<!--end::Heading-->
						<!--begin::Description-->
						<div class="fw-bold fs-6 fs-lg-4 text-muted">Discover jobs tailored to your qualifications </br> and apply with ease through our intuitive platform.</div>
						<!--end::Description-->
					</div>
					<!--end::Story-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Row-->
			<!--begin::Product slider-->
			<div class="tns tns-default">
				<!--begin::Slider-->
				<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
					<!--begin::Item-->
					<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
						<img src="{{url('frontend/assets/media/product-demos/sign-up.png')}}" class="card-rounded shadow mw-100" alt="" />
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
						<img src="{{url('frontend/assets/media/product-demos/user-pro.png')}}" class="card-rounded shadow mw-100" alt="" />
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
						<img src="{{url('frontend/assets/media/product-demos/pricing.png')}}" class="card-rounded shadow mw-100" alt="" />
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
						<img src="{{url('frontend/assets/media/product-demos/job-board.png')}}" class="card-rounded shadow mw-100" alt="" />
					</div>
					<!--end::Item-->
				</div>
				<!--end::Slider-->
				<!--begin::Slider button-->
				<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
					<span class="svg-icon svg-icon-3x">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</button>
				<!--end::Slider button-->
				<!--begin::Slider button-->
				<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
					<span class="svg-icon svg-icon-3x">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</button>
				<!--end::Slider button-->
			</div>
			<!--end::Product slider-->
		</div>
		<!--end::Container-->
	</div>
</div>
@endsection
       
<!--end::How It Works Section-->
<!--end::Main-->