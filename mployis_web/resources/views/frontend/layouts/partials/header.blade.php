{{-- <style>
    .landing-header {
        position: fixed;
        /* Keeps header at the top */
        top: 0;
        width: 100%;
        background-color: #13263C;
        /* Background color for header */
        transition: transform 0.3s ease-in-out;
        /* Smooth transition */
        z-index: 1000;
        /* Ensure header is above other elements */
    }

    .landing-header.hidden {
        transform: translateY(-100%);
        /* Hide header */
    }

    .menu {
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* Space between logo and menu items */
    }

    /* Mobile menu styles */
    .menu-items {
        display: flex;
        flex-direction: row;
        /* Horizontal layout for desktop */
        gap: 1rem;
        /* Space between menu items */
    }

    .menu-toggle {
        display: none;
        /* Hide hamburger icon by default */
        flex-direction: column;
        cursor: pointer;
        align-items: flex-end;
    }

    .bar {
        width: 30px;
        height: 3px;
        background-color: white;
        margin: 3px 0;
        /* Space between bars */
    }

    .icon {
        cursor: pointer;
        margin-right: 50px;
        line-height: 60px
    }

    .icon span {
        background: #f00;
        padding: 7px;
        border-radius: 50%;
        color: #fff;
        vertical-align: top;
        margin-left: -25px
    }

    .icon img {
        display: inline-block;
        width: 26px;
        margin-top: 4px
    }

    .icon:hover {
        opacity: .7
    }

    .logo {
        flex: 1;
        margin-left: 50px;
        color: #eee;
        font-size: 20px;
        font-family: monospace
    }

    .notifications {
        width: 300px;
        height: 0px;
        opacity: 0;
        position: absolute;
        top: 63px;
        right: 150px;
        border-radius: 5px 0px 5px 5px;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .notifications h2 {
        font-size: 14px;
        padding: 10px;
        border-bottom: 1px solid #eee;
        color: #999
    }

    .notifications h2 span {
        color: #f00
    }

    .notifications-item {
        display: flex;
        border-bottom: 1px solid #eee;
        padding: 6px 9px;
        margin-bottom: 0px;
        cursor: pointer
    }

    .notifications-item:hover {
        background-color: #eee
    }

    .notifications-item img {
        display: block;
        width: 50px;
        height: 50px;
        margin-right: 9px;
        border-radius: 50%;
        margin-top: 2px
    }

    .notifications-item .text h4 {
        color: #777;
        font-size: 16px;
        margin-top: 3px
    }

    .notifications-item .text p {
        color: #aaa;
        font-size: 12px
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .menu-items {
            display: none;
            /* Hide menu items by default on mobile */
            flex-direction: column;
            /* Stack menu items vertically */
            position: absolute;
            top: 60px;
            /* Adjust based on header height */
            left: 0;
            width: 100%;
            background-color: #13263C;
            /* Match header background */
            padding: 1rem 0;
            /* Add padding */
            z-index: 999;
            /* Ensure menu is above other elements */
        }

        .menu-items.active {
            display: flex;
            /* Show menu items when active */
        }

        .menu-toggle {
            display: flex;
            /* Show hamburger icon on mobile */
        }

        .logo-default {
            height: 50px;
            /* Adjust logo height */
        }

        .logo-sticky {
            height: 40px;
            /* Adjust sticky logo height */
        }
    }
</style> --}}

<!--begin::Header-->
<div class="landing-header min-h-[100px]">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Wrapper-->
        <div class="menu">
            <!--begin::Logo-->
            <div class="d-flex align-items-center flex-equal">
                <a href="{{route('home')}}">
                    <img alt="Logo" src="{{ asset('frontend/assets/media/logos/Mployis.png') }}" class="logo-default h-45px h-lg-60px" />
                    <img alt="Logo" src="{{ asset('frontend/assets/media/logos/Mployis.png') }}" class="logo-sticky h-20px h-lg-75px" />
                </a>
            </div>
            <!--end::Logo-->
            <!--begin::Mobile menu toggle-->
            <div class="menu-toggle" id="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <!--end::Mobile menu toggle-->
            <!--begin::Menu wrapper-->
            <div class="menu-items menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold align-items-center" id="menu-items">
                <div class="menu-item">
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ route('home') }}">Home</a>
                </div>
                <div class="menu-item">
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ url('/about-us') }}">About</a>
                </div>
                <div class="menu-item">
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ url('/pricing') }}">Pricing</a>
                </div>
                <div class="menu-item dropdown">
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 dropdown-toggle" href="" id="jobBoardsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jobs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="jobBoardsDropdown">
                        <li><a class="dropdown-item" href="{{ route('auth.account.company.job-board') }}">Job Board</a></li>
                        <li><a class="dropdown-item" href="{{ route('auth.account.company.company-list') }}">Company List</a></li>
                    </ul>
                </div>
                <div class="menu-item">
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ url('/services') }}">Services</a>
                </div>
                <div class="menu-item">
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ url('contact-us') }}">Contact</a>
                </div>

                <div class="menu-item dropdown">
                    <div class="menu-link nav-link py-3 px-4 px-xxl-6 dropdown-toggle" href="#" id="jobBoardsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='far fa-bell fs-1'></i>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="jobBoardsDropdown" style="min-width: 20rem;">
                        <li>
                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20 flex-column" style="padding:10px">
                            @if(!Auth::guard('candidate')->check())
                                <p>Looks like you're not logged in. Please sign in to check your notification.</p>
                                <a href="{{ route('account.candidate-sign-in') }}">Sign In</a>
                            @elseif(Auth::guard('candidate')->check())
                            <p>You don't have any notifications at this moment.</p>
                            {{-- @elseif(Auth::guard('candidate')->check() && ) --}}
                            @endif
                            {{-- <!--begin::Icon-->
                            <img alt="" class="w-30px me-3" src="{{ asset('frontend/assets/media/svg/files/pdf.svg') }}">
                            <!--end::Icon-->
                            <!--begin::Info-->
                            <div class="ms-1 fw-bold">
                                <span class="fw-bolder fs-5 mb-0">Dark Mode</span><br>
                                <span class="fw-bold fs-base text-muted">Dark Mode Setup for Layout &amp; Components</span>
                            </div>
                            <!--begin::Info--> --}}
                        </div>
                        </li>
                        <li>
                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20" style="padding:10px">
                            <!--begin::Icon-->
                            {{-- <img alt="" class="w-30px me-3" src="{{ asset('frontend/assets/media/svg/files/pdf.svg') }}">
                            <!--end::Icon-->
                            <!--begin::Info-->
                            <div class="ms-1 fw-bold">
                                <span class="fw-bolder fs-5 mb-0">Dark Mode</span>
                                <span class="fw-bold fs-base text-muted">Dark Mode Setup for Layout &amp; Components</span>
                            </div> --}}
                            <!--begin::Info-->
                        </div>
                        </li>
                    </ul>
                </div>

                    {{-- ------------------------------- --}}

                    {{-- <div class="icon bg-transparent mx-auto px-3" id="bell">
                    <i class='far fa-bell fs-1'></i>
                </div> --}}

                <a href="" class="notifications" id="box">

                    {{-- Keep comment for now --}}
                    {{-- <h2>Notifications - <span>{{ isset($userNotifications) && $userNotifications->isNotEmpty() ? count($userNotifications) : 0 }}</span></h2> <!-- Display the count of notifications --> --}}
                    {{-- Keep comment for now --}}
                    
                    <div class="notifications-item"> 
                        <img src="https://i.imgur.com/uIgDDDd.jpg" alt="img">
                        <div class="text">
                            <h4></h4>
                
                            {{-- @if(isset($userNotifications) && !empty($userNotifications)) <!-- Check if userNotifications is set and not empty -->
                            @foreach ($userNotifications as $message)
                                <p>
                                    {{ $message['status'] === 'Approved' ? 'Your application is approved!' : 
                                       ($message['status'] === 'Rejected' ? 'Your application is not approved!' : 'No more updates available.') }}
                                </p>
                            @endforeach
                        @elseif(!auth()->check())
                            <p>Login to see your notifications!</p>
                        @else
                            <p>No messages</p>
                        @endif --}}
                        
                        </div>
                    </div>
                </a>
                 
                  {{-- --------------------------------- --}}
                 
                    {{-- <div class="notifications-item"> <img src="https://i.imgur.com/uIgDDDd.jpg" alt="img">
                        <div class="text">
                            <h4>Samso aliao</h4>
                            <p>Samso Nagaro Like your home work</p>
                        </div>
                    </div>
                    <div class="notifications-item"> <img
                            src="https://img.icons8.com/flat_round/64/000000/vote-badge.png" alt="img">
                        <div class="text">
                            <h4>John Silvester</h4>
                            <p>+20 vista badge earned</p>
                        </div>
                    </div> --}}
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Toolbar-->
            <div class="flex-equal text-end ms-1">
                <div class="dropdown">

                    <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        User Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                      
                            @if(!Auth::guard('candidate')->check() && !Auth::guard('company')->check())
                            <li><a class="dropdown-item" href="{{ route('account.candidate-sign-in') }}">Sign in</a></li>
                            @endif
                            
                            @if(Auth::guard('candidate')->check())
                            <li><a class="dropdown-item" href="{{ route('account.candidate.profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="">Applications Status</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('auth.candidate-sign-out') }}">Sign Out</a></li>
                            @elseif(Auth::guard('company')->check())
                            <li><a class="dropdown-item" href="{{ route('auth.account.company.profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.account.company.post-job-form') }}">Post a Job</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.account.company.posted-jobs') }}">Posted Jobs</a></li>
                            <li><a class="dropdown-item" href="#">Applications Status</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('auth.company-sign-out') }}">Sign Out</a></li>
                            @endif
                    </ul>
                </div>
            </div>
            
            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menuItems = document.getElementById('menu-items');

    // Toggle the menu items on hamburger icon click
    menuToggle.addEventListener('click', () => {
        menuItems.classList.toggle('active');
    });

    // Hide the menu when clicking outside of it
    window.addEventListener('click', (event) => {
        if (!menuToggle.contains(event.target) && !menuItems.contains(event.target)) {
            menuItems.classList.remove('active');
        }
    });

    let lastScrollTop = 0;
    const header = document.querySelector('.landing-header');

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (currentScroll > lastScrollTop) {
            header.classList.add('hidden'); // Scrolling down
        } else {
            header.classList.remove('hidden'); // Scrolling up
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
    });
</script>

<script>
    $(document).ready(function() {
        let down = false;

        $('#bell').click(function(e) {

            var color = $(this).text();
            if (down) {

                $('#box').css('height', '0px');
                $('#box').css('opacity', '0');
                down = false;
            } else {

                $('#box').css('height', 'auto');
                $('#box').css('opacity', '1');
                down = true;
            }

        });

    });
</script>