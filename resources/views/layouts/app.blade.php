<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Job Seeker Portal')</title>

   <!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
              <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">

</head>
<body>


    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                {{-- <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="index.html">Home</a></li>
                                        </ul>
                                    </nav>
                                </div>           --}}
                                <!-- Header-btn -->
 @auth('web')

                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{ route('jobseeker.change.password.form') }}" class="btn head-btn1">Change Password</a>
                                    
                                </div>

                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{ route('jobseeker.editProfile') }}" class="btn head-btn1">Edit Profile</a>
                                </div>

                                   <div class="header-btn d-none f-right d-lg-block">

                                    <form action="{{ route('jobseeker.logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn head-btn1">
        Log Out
    </button>
</form>
                                  
                                </div>

 @elseif(auth('admin')->check())
  <a href="#" class="btn head-btn1">Admin Dashboard</a>

   <div class="header-btn d-none f-right d-lg-block">

                                    <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn head-btn1">
        Log Out
    </button>
</form>
                                  
                                </div>


    @else
<div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{ route('jobseeker.register') }}" class="btn head-btn2">Register</a>
                                    <a href="{{ route('jobseeker.login') }}" class="btn head-btn2">Login</a>

                                    <a href="{{ route('admin.login') }}" class="btn head-btn2">Admin Login</a>
                                </div>
    @endauth

                                
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>


{{-- ===================== NAVBAR ===================== --}}
{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand nav-brand" href="/">
            Job Seeker Portal
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto">

                @auth('web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobseeker.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('jobseeker.logout') }}">
                            @csrf
                            <button class="btn btn-danger btn-sm ms-2">Logout</button>
                        </form>
                    </li>

                @elseif(auth('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="btn btn-danger btn-sm ms-2">Logout</button>
                        </form>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobseeker.login') }}">Job Seeker Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobseeker.register') }}">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Admin Login</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav> --}}

{{-- ===================== MAIN CONTENT ===================== --}}
<main class="container py-5">

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Page Content --}}
    @yield('content')

</main>

{{-- ===================== FOOTER ===================== --}}
   <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                  
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                           

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                           
                        </div>
                    </div>
                   
                </div>
               <!--  -->
             
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-10 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;  All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://rjgithub123.github.io/robin_portfolio/" target="_blank">| Robin Joseph</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-2">
                             <div class="footer-social f-right">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

  <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <script src="./assets/js/price_rangs.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>
