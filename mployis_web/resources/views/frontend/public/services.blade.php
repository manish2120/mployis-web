@extends('frontend.layouts.app')
@push('custom_styles')
<style>
   /* ICON LIST */
   ul.i-list {
      padding-left: 0;
      list-style: none;
   }
   .icon i.fa {
      color: white !important;
   }


   ul.i-list .list-title {
      display: inline-block;
      position: absolute;
   }

   ul.i-list li {
      padding: 2px 0px;
   }

   ul.i-list i.fa {
      margin-right: 7px;
   }

   ul.i-list .list-item {
      margin-top: 3px;
      display: inline-block;
   }

   ul.i-list.filled i.fa {
      color: white;
      font-size: 9px;
      padding: 5px;
      border-radius: 50%;
   }

   ul.e-icon-list.filled li {
      padding: 2px 0px;
      line-height: 24px;
   }

   ul.i-list.underline li {
      padding: 6px 0px;
      border-bottom: 1px solid #eee;
   }

   ul.i-list.medium li {
      padding-bottom: 25px;
      position: relative;
   }

   ul.i-list.medium .icon {
      margin-right: 25px;
      color: white;
      font-size: 25px;
      text-align: center;
      line-height: 68px;
      width: 68px;
      height: 68px;
      border-radius: 50%;
      box-shadow: 0 5px 16px rgba(0,0,0,.28);
      position: relative;
      z-index: 1;
      /*background-image: url(../img/crease.svg) !important;
      -moz-background-size: 100% 100% !important;
      background-size: 100% 100% !important;
      background-position: center center !important;*/
   }

   ul.i-list.medium .icon i.fa {
      margin: 0;
   }

   ul.i-list.medium.bordered .icon {
      background: white;
      color: inherit;
      border: 2px solid #8fc135;
      font-size: 26px;
      color: #8fc135;
      position: relative;
      z-index: 1;
      box-shadow: 0 8px 22px rgba(0,0,0,.28);
   }

   ul.i-list.medium .list-item {
      text-transform: uppercase;
   }

   ul.i-list.large .icon {
      margin-right: 30px;
      background: #d0d0d0;
      color: white;
      font-size: 30px;
      text-align: center;
      line-height: 80px;
      width: 80px;
      height: 80px;
      border-radius: 50%;
      box-shadow: 0 8px 22px rgba(0,0,0,.28);
   }

   ul.i-list.large .icon i.fa {
      margin: 0;
   }

   ul.i-list.large.bordered .icon {
      background: inherit;
      color: inherit;
      border: 2px solid #8fc135;
      font-size: 30px;
      color: #8fc135;
   }

   ul.i-list.large .list-item {
      text-transform: uppercase;
   }

   ul.i-list .icon {
      float: left;
   }

   ul.i-list.right {
      text-align: right;
   }

   ul.i-list.right .icon {
      float: right;
   }

   ul.i-list.right .icon {
      float: right;
      margin-right: 0;
      margin-left: 25px;
   }

   ul.i-list.large.right .icon {
      float: right;
      margin-right: 0;
      margin-left: 30px;
   }

   ul.i-list.large li {
      margin-bottom: 25px;
   }

   ul.i-list .icon-content {
      overflow: hidden;
   }

   ul.i-list .icon-content .title {
      margin-top: 5px;
      margin-bottom: 10px;
   }

   .left-line .iconlist-timeline {
      left: auto;
      right: 35px;
   }

   .iconlist-timeline {
      position: absolute;
      top: 1%;
      left: 32px;
      width: 1px;
      height: 99%;
      border-right-width: 1px;
      border-right-style: dashed;
      height: 100%;
      border-color: #ccc;
   }
   .icon{
         background-color: #0cb4ce;
   }
   .separator, .testimonial-two, .exp-separator-inner {
      border-color: #0cb4ce;
   }
   .exp-separator {
      border-color: #0cb4ce;
      border-top-width: 2px;
      margin-top: 10px;
      margin-bottom: 2px;
      width: 100%;
      max-width: 55px;
      border-top-style: solid;
      height: auto;
      clear: both;
      position: relative;
      z-index: 11;
   }
   .section-sub-title {
      font-size: 18px;
      margin-bottom: 20px;
      font-weight: 400;
      font-family: Poppins;
   }
   .section-title {
      font-size: 32px;
      font-weight: 600;
      margin-top: 0.45em;
      margin-bottom: 0.35em;
      color: #303133;
      font-family: Poppins;
      letter-spacing: -0.02em;
   }
   .pb-20 {
      padding-bottom: 20px !important;
   }
   .text-center {
      text-align: center!important;
   }
   .center-separator .exp-separator-inner, .center-separator.exp-separator {
      margin-left: auto;
      margin-right: auto;
   }

   .text-white {
   color: #4e4b4b !important;
   }
</style>
@endpush
@section('title', 'Services')
@section('content')
		<!--begin::Main-->
		
   <!--begin::Wrapper-->
   {{-- <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)"> --}}
   
<div class="flex flex-column flex-root">
   <div class="mb-0" id="home">
      <!--begin::Wrapper-->
      <section class="section-big main-color">
         <div class="container">
            <div class="row">
               <div class="col-md-12 pb-20 text-center"> 
                  <h2 class="section-title mb-10"><span> Our <strong class="primary-color"></strong> Services </span></h2>
                  <p class="section-sub-title">
                  "At Mployis, we offer a comprehensive range of services to support both job seekers and employers.&amp;   Whether you're looking to find your next career opportunity or searching for the ideal candidate, our platform provides personalized job matching, easy application management, and advanced recruitment tools to help you achieve your goals efficiently and effectively." 
                  </p>
                  <div class="exp-separator center-separator">
                     <div class="exp-separator-inner">
                     </div>
                  </div>
      
               </div>
            </div>
      
            <div class="row">
               <div class="col-md-4">
                  <ul class="i-list medium">
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa fa-desktop" style="font-size: 2rem"></i> </div>
      
                        <div class="icon-content">
                           <h3 class="title text-white">High-level specialists working</h3>
                           <p class="sub-title">
                           Here you can find high-level specialists working in the financial and IT sector. Mployis allows you to run cheap, optimized ads on Mployis to hire people for internships.
                           </p>
                        </div>
                        <div class="iconlist-timeline"></div>
                     </li>
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa-solid fa-building-user" style="color: #ffffff; font-size: 2rem;"></i> </div>
      
                        <div class="icon-content">
                           <h3 class="title text-white">Best job posting portals in India</h3>
                           <p>
                           Mployis, one of the best job posting portals in India, allows you to post jobs quickly and within no time. With Mployis, you can access top talent in more than 20 countries, including India. It provides you with the best and most highly-qualified talent at your fingertips. 
                           </p>
                        </div>
                        <div class="iconlist-timeline"></div>
                     </li>
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa fa-paper-plane" style="font-size: 2rem"></i> </div>
      
                        <div class="icon-content">
                           <h3 class="title text-white">For Interns or student employees</h3>
                           <p>
                           It is undoubtedly the best website if you are looking for interns or student employees. If you are hiring people for a typical student job then you can go for Mployis without giving it a second thought as this is the place where you get verified people.
                           </p>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="col-md-4">
                  <ul class="i-list medium">
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa-regular fa-gem" style="color: #ffffff; font-size: 2rem;"></i> </div>
                        <div class="icon-content">
                           <h3 class="title text-white">Endless Possibilites</h3>
                           <p class="sub-title">
                           It contains data from millions of company reviews, approval reviews, interview reviews, salary reports, and more.
                           </p>
                        </div>
                        <div class="iconlist-timeline"></div>
                     </li>
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa fa-recycle" style="font-size: 2rem"></i> </div>
                        <div class="icon-content">
                           <h3 class="title text-white">Free Lifetime Updates</h3>
                           <p>
                           Free online job postings are very easy. Just fill out a form that is not that complicated and anyone with basic computer skills can do it.
                           </p>
                        </div>
                        <div class="iconlist-timeline"></div>
                     </li>
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa fa-check" style="font-size: 2rem"></i> </div>
                        <div class="icon-content">
                           <h3 class="title text-white">Job seekers worldwide</h3>
                           <p>
                           With over 5,000 companies using the recruitment platform to simplify their recruitment process, it is becoming a popular choice among job seekers worldwide, including in India. 
                           </p>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="col-md-4">
                  <ul class="i-list medium">
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa-solid fa-sitemap" style="color: #ffffff; font-size: 2rem"></i> </div>
                        <div class="icon-content">
                           <h3 class="title text-white"> Best job websites in India</h3>
                           <p class="sub-title">
                           Mployis is among the best job portals in India. This is also a great site for startups and small businesses looking to hire new graduates or experienced mid-level employees.
                           To receive applications from people searching for jobs through this site, you must provide an address or email ID.
                           </p>
                        </div>
                        <div class="iconlist-timeline"></div>
                     </li>
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa-brands fa-uikit" style="color: #ffffff; font-size: 2rem"></i> </div>
                        <div class="icon-content">
                           <h3 class="title text-white">Great user experience</h3>
                           <p>
                           With a clean website design and great user experience, Mployis helps you publish your job posting and find the most skilled candidates for your company.
                           </p>
                        </div>
                        <div class="iconlist-timeline"></div>
                     </li>
                     <li class="i-list-item">
                        <div class="icon"> <i class="fa-solid fa-heart" style="color: #ffffff; font-size: 2rem"></i> </div>
                        <div class="icon-content">
                           <h3 class="title text-white">Crafted With Love</h3>
                           <p>
                           The  Ministry of Labor and Employment claims that this, one of the best job portals in India, will offer job matching services in a significantly transparent and user-friendly manner.
                           </p>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>

      <!--begin::Scrolltop-->
      <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
         <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
         <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
               <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
               <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
            </svg>
         </span>
         <!--end::Svg Icon-->
      </div>
      <!--end::Scrolltop-->
   </div>
</div>
</div>
   <!--end::Main-->
   @endsection
   @push('scripts')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   @endpush