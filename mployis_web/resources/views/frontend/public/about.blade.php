@extends('frontend.layouts.app')
@section('title', 'About Us')
@section('content')

<!--begin::Main-->
        <!--begin::How It Works Section-->
        <!--start-->
        <div class="post flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::About card-->
                <div class="card">

                    <!--begin::Body-->
                    <div class="card-body p-lg-17">
                        <!--begin::About-->
                        <div class="mb-18">

                            <!--begin::Wrapper-->
                            <div class="mb-10">
                                <!--begin::Top-->
                                <div class="text-center mb-15">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-dark mb-5">About Us</h3>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fs-5 text-muted fw-bold">At Mployis, we empower job seekers and
                                        employers by providing 
                                    </br>
                                        seamless connections and tailored career
                                        opportunities.
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Overlay-->
                                <div class="overlay">
                                    <!--begin::Image-->
                                    <img class="w-100 card-rounded"
                                        src="{{ asset('frontend/assets/media/stock/1600x800/img-1.jpg') }}"
                                        alt="" />
                                    <!--end::Image-->
                                    <!--begin::Links-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <a href="{{ url('/pricing') }}" class="btn btn-primary">Pricing</a>
                                        {{-- <a href="../../demo1/dist/pages/careers/apply.html" class="btn btn-light-primary ms-3">Join Us</a> --}}
                                    </div>
                                    <!--end::Links-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Description-->
                            <div class="fs-5 fw-bold text-gray-600">
                                <!--begin::Text-->
                                <p class="mb-8">At Mployis, we are committed to bridging the gap between job seekers
                                    and employers. Our platform is designed to make job searching and hiring more
                                    efficient, creating a space where talent meets opportunity.

                                    <!--end::Text-->
                                    <!--begin::Text-->
                                <p class="mb-8">For job seekers, we offer personalized job recommendations, easy
                                    application processes, and real-time notifications about new opportunities.
                                    Employers benefit from advanced recruitment tools, allowing them to find and engage
                                    with top talent in a seamless manner.</p>
                                <!--end::Text-->
                                <!--begin::Text-->
                                <p class="mb-8">At Mployis, we connect job seekers with opportunities tailored to
                                    their skills and ambitions. Our platform streamlines the job search process,
                                    offering personalized recommendations and easy applications. Employers can
                                    efficiently find top talent using advanced recruitment tools. Together, we shape the
                                    future of careers and hiring.</p>
                                <!--end::Text-->
                                <!--begin::Text-->
                                <p class="mb-17">Our mission is to create a platform that simplifies the hiring process
                                    while empowering individuals to reach their career goals. By fostering meaningful
                                    connections between job seekers and employers, Mployis aims to shape the future of
                                    employment with integrity, innovation, and excellence.</p>
                                <!--end::Text-->
                            </div>
                            <!--end::Description-->

                        </div>
                        <!--end::About-->

                        <!--begin::Statistics-->
                        <div class="card bg-light mb-18">
                            <!--begin::Body-->
                            <div class="card-body py-15">
                                <!--begin::Wrapper-->
                                <div class="flex flex-center">
                                    <!--begin::Items-->
                                    <div class="flex justify-content-between mb-10 mx-auto w-xl-900px">
                                        <!--begin::Item-->
                                        <div class="octagon flex flex-center h-200px w-200px bg-body mx-2">
                                            <!--begin::Content-->
                                            <div class="text-center">
                                                <!--begin::Symbol-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                <span class="svg-icon svg-icon-2tx svg-icon-primary inline-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect x="2" y="2" width="9" height="9" rx="2"
                                                            fill="currentColor" />
                                                        <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                                            rx="2" fill="currentColor" />
                                                        <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                                            rx="2" fill="currentColor" />
                                                        <rect opacity="0.3" x="2" y="13" width="9"
                                                            height="9" rx="2" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Symbol-->
                                                <!--begin::Text-->
                                                <div class="mt-1">
                                                    <!--begin::Animation-->
                                                    <div
                                                        class="fs-lg-2hx fs-2x fw-bolder text-gray-800 flex align-items-center">
                                                        <div class="min-w-70px" data-kt-countup="true"
                                                            data-kt-countup-value="700">0</div>+
                                                    </div>
                                                    <!--end::Animation-->
                                                    <!--begin::Label-->
                                                    <span class="text-gray-600 fw-bold fs-5 lh-0">Businesses</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="octagon flex flex-center h-200px w-200px bg-body mx-2">
                                            <!--begin::Content-->
                                            <div class="text-center">
                                                <!--begin::Symbol-->
                                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                                <span class="svg-icon svg-icon-2tx svg-icon-success inline-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Symbol-->
                                                <!--begin::Text-->
                                                <div class="mt-1">
                                                    <!--begin::Animation-->
                                                    <div
                                                        class="fs-lg-2hx fs-2x fw-bolder text-gray-800 flex align-items-center">
                                                        <div class="min-w-50px" data-kt-countup="true"
                                                            data-kt-countup-value="80">0</div>K+
                                                    </div>
                                                    <!--end::Animation-->
                                                    <!--begin::Label-->
                                                    <span class="text-gray-600 fw-bold fs-5 lh-0">Quick Reports</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="octagon flex flex-center h-200px w-200px bg-body mx-2">
                                            <!--begin::Content-->
                                            <div class="text-center">
                                                <!--begin::Symbol-->
                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                <span class="svg-icon svg-icon-2tx svg-icon-info inline-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Symbol-->
                                                <!--begin::Text-->
                                                <div class="mt-1">
                                                    <!--begin::Animation-->
                                                    <div
                                                        class="fs-lg-2hx fs-2x fw-bolder text-gray-800 flex align-items-center">
                                                        <div class="min-w-50px" data-kt-countup="true"
                                                            data-kt-countup-value="35">0</div>M+
                                                    </div>
                                                    <!--end::Animation-->
                                                    <!--begin::Label-->
                                                    <span class="text-gray-600 fw-bold fs-5 lh-0">Payments</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Testimonial-->
                                <div class="fs-2 fw-bold text-muted text-center mb-3">
                                    <span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic,
                                    you’ll write about it in a
                                    <br />
                                    <span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
                                    <span class="fs-1 lh-1 text-gray-700">“</span>
                                </div>
                                <!--end::Testimonial-->
                                <!--begin::Author-->
                                <div class="fs-2 fw-bold text-muted text-center">
                                    <b>Marcus Levy</b>
                                </div>
                                <!--end::Author-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Section-->
                        <div class="mb-16">
                            <!--begin::Top-->
                            <div class="text-center mb-12">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-5">Publications</h3>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fs-5 text-muted fw-bold">Our publications showcase industry insights,
                                    career tips, and hiring trends
                                    </br>
                                    to help job seekers and employers make informed decisions</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Publications post-->
                                    <div class="card-xl-stretch me-md-6">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales"
                                            href="{{ url('frontend/src/media/stock/600x400/img-73.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url('{{ url('frontend/assets/media/stock/600x400/img-73.jpg') }}')">
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Overlay-->
                                        <!--begin::Body-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">Admin
                                                Panel - How To Started the Dashboard Tutorial</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 mb-5">We’ve been
                                                focused on making a the from also not been afraid to and step away been
                                                focused create eye</div>
                                            <!--end::Text-->
                                            <!--begin::Content-->
                                            <div class="fs-6 fw-bolder">
                                                <!--begin::Author-->
                                                <a href="../../demo1/dist/apps/projects/users.html"
                                                    class="text-gray-700 text-hover-primary">Manish Chavan</a>
                                                <!--end::Author-->
                                                <!--begin::Date-->
                                                <span class="text-muted">on Mar 21 2021</span>
                                                <!--end::Date-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Publications post-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Publications post-->
                                    <div class="card-xl-stretch mx-md-3">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales"
                                            href="{{ url('frontend/src/media/stock/600x400/img-74.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url('{{ url('frontend/assets/media/stock/600x400/img-80.jpg') }}')">
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Overlay-->
                                        <!--begin::Body-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href=""
                                                class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">Admin
                                                Panel - How To Started the Dashboard Tutorial</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 mb-5">We’ve been
                                                focused on making the from v4 to v5 but we have also not been afraid to
                                                step away been focused</div>
                                            <!--end::Text-->
                                            <!--begin::Content-->
                                            <div class="fs-6 fw-bolder">
                                                <!--begin::Author-->
                                                <a href="" class="text-gray-700 text-hover-primary">Utkarsh
                                                    Gauguwal</a>
                                                <!--end::Author-->
                                                <!--begin::Date-->
                                                <span class="text-muted">on Apr 14 2021</span>
                                                <!--end::Date-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Publications post-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Publications post-->
                                    <div class="card-xl-stretch ms-md-6">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales"
                                            href="{{ url('frontend/src/media/stock/600x400/img-47.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url('{{ url('frontend/assets/media/stock/600x400/img-79.jpg') }}')">
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Overlay-->
                                        <!--begin::Body-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href=""
                                                class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">Admin
                                                Panel - How To Started the Dashboard Tutorial</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 mb-5">We’ve been
                                                focused on making the from v4 to v5 but we’ve also not been afraid to
                                                step away been focused</div>
                                            <!--end::Text-->
                                            <!--begin::Content-->
                                            <div class="fs-6 fw-bolder">
                                                <!--begin::Author-->
                                                <a href="" class="text-gray-700 text-hover-primary">Vinayak
                                                    Kambale</a>
                                                <!--end::Author-->
                                                <!--begin::Date-->
                                                <span class="text-muted">on May 14 2021</span>
                                                <!--end::Date-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Publications post-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Team-->
                        <div class="mb-18">
                            <!--begin::Heading-->
                            <div class="text-center mb-12">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-5">Our Great Team</h3>
                                <!--end::Title-->
                                <!--begin::Sub-title-->
                                <div class="fs-5 text-muted fw-bold">It’s no doubt that when a development takes longer
                                    to complete, additional costs to
                                    <br />integrate and test each extra feature creeps up and haunts most of us.
                                </div>
                                <!--end::Sub-title=-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Slider-->
                            <div class="tns tns-default mb-10">
                                <!--begin::Wrapper-->
                                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false"
                                    data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000"
                                    data-tns-controls="true" data-tns-nav="false" data-tns-items="1"
                                    data-tns-center="false" data-tns-dots="false"
                                    data-tns-prev-button="#kt_team_slider_prev"
                                    data-tns-next-button="#kt_team_slider_next"
                                    data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
                                    <!--begin::Item-->
                                    <div class="text-center">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{ url('frontend/assets/media/avatars/300-1.jpg') }}')">
                                        </div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <b class="fs-2">Paul Miles</b>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-bold mt-1">Development Lead</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{ url('frontend/assets/media/avatars/300-2.jpg') }}')">
                                        </div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <b class="fs-2">Melisa Marcus</b>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-bold mt-1">Creative Director</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{ url('frontend/assets/media/avatars/300-5.jpg') }}')">
                                        </div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <b class="fs-2">David Nilson</b>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-bold mt-1">Python Expert</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{ url('frontend/assets/media/avatars/300-20.jpg') }}')">
                                        </div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <b class="fs-2">Anne Clarc</b>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-bold mt-1">Project Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{ url('frontend/assets/media/avatars/300-23.jpg') }}')">
                                        </div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <b class="fs-2">Ricky Hunt</b>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-bold mt-1">Art Director</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{ url('frontend/assets/media/avatars/300-12.jpg') }}')">
                                        </div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <b class="fs-2">Alice Wayde</b>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-bold mt-1">Marketing Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{ url('frontend/assets/media/avatars/300-9.jpg') }}')">
                                        </div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <b class="fs-2">Carles Puyol</b>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-bold mt-1">QA Managers</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Button-->
                                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Slider-->
                        </div>
                        <!--end::Team-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::About card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
        <!--end::Testimonials Section-->


        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                        transform="rotate(90 13 6)" fill="currentColor" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Scrolltop-->
    </div>
<!--end::Main-->

@endsection
