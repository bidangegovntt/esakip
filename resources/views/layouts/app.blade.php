<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>E-SAKIP Purbalingga</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('template/images/favicon.png') }}" type="image/x-icon">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('template/images/favicon.png') }}" type="image/x-icon"> 

    <!-- FontsOnline -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- StyleSheets -->
    <link rel="stylesheet" href="{{ asset('template/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap\bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/rs-plugin/css/settings.css') }}" media="screen">

    <!-- COLORS -->
    <link rel="stylesheet" id="color" href="{{ asset('template/css/default.css') }}">

    <!-- JavaScripts -->
    <script src="{{ asset('template/js/vendors/modernizr.js') }}"></script>

    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
        
        body{
          background: #f2f2f2;
          font-family: 'Open Sans', sans-serif;
        }        
        .search {
          width: 100%;
          position: absolute;
        }        
        .searchTerm {
          float: right;
          width: 100%;
          border: 1px solid #e68a00;
          padding: 5px;
          height: 40px;
          border-radius: 5px;
          outline: none;
          color: #e68a00;
        }        
        .searchTerm:focus{
          color: #e68a00;
        }
        .searchButton {
          position: absolute;  
          right: 0px;
          width: 40px;
          height: 40px;
          border: 1px solid #e68a00;
          background: #e68a00;
          text-align: center;
          color: #fff;
          border-radius: 5px;
          cursor: pointer;
          font-size: 20px;
        }        
        /*Resize the wrap to see the search bar change!*/
        .wrap{
          width: 20%;
          position: absolute;
          top:15%;
          left: 90%;
          transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <!-- LOADER ===========================================-->
    <div id="loader">
      <div class="loader">
        <div class="position-center-center"> <img src="{{ asset('template/images/logo-dark2.png') }}" height="80" width="80" alt="">
          <p class="font-crimson text-center">Please Wait...</p>
          <div class="loading">
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
          </div>
        </div>
      </div>
    </div>
      
    <!-- Page Wrapper -->
    <div id="wrap">         
      <!-- Header -->
      <header class="header coporate-header">
        <div class="sticky">
          <div class="container">
            <div class="logo"> 
              <a href="index.php">
                <img src="{{ asset('template/images/logo2.png') }}" height="50px" width="180px" alt="">
              </a> 
            </div>   

            <!-- Nav -->
            @include('layouts.nav')

          </div>
        </div>
      </header>
      <!-- End Header --> 

      @yield('content') 
        
      <!-- Footer -->
      <footer id="footer">
        <div class="footer-wrapper">               
          <!-- Footer Top -->
          <div class="footer-top">
            <div class="footer-top-wrapper">
              <div class="container">
                <div class="row"> 
                  <!-- About Block -->
                  <div class="col-md-4">
                    <div class="block block-about">
                      <h3 class="block-title no-underline"><span class="text-primary">E-SAKIP Kabupaten Purbalingga</span></h3>
                      <div class="block-content">
                        <p>Sistem Akuntabilitas Kinerja Instansi Pemerintah yang selanjutnya disingkat SAKIP, adalah rangkaian sistematik dari berbagai aktivitas, alat, dan prosedur yang dirancang untuk tujuan penetapan dan pengukuran, pengumpulan data, pengklasifikasian, pengikhtisaran, dan pelaporan kinerja pada instansi pemerintah, dalam rangka pertanggungjawaban dan peningkatan kinerja instansi pemerintah.</p>
                        <img height="80" width="280" class="footer-logo" src="{{ asset('template/images/logo2.png') }}" alt=""> 
                      </div>
                    </div>
                  </div>
                  <!-- End About Block --> 
                        
                  <!-- Footer Links Block -->
                  <div class="col-md-2">
                    <div class="block block-links">
                      <h3 class="block-title"><span>Info</span></h3>
                      <div class="block-content">
                        <ul>
                            <li><a href="sakip.php">E-SAKIP</a></li>
                            <li><a href="about.php">Tentang E-SAKIP</a></li>
                            <li><a href="#.">Privacy Policy</a></li>
                            <li><a href="news.php">News</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="login.php">login</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- End Footer Links Block --> 
                        
                  <!-- Twitter Widget Block -->
                  <div class="col-md-3">
                    <div class="block block-twitter-widget">
                        <h3 class="block-title"><span>Twitter</span></h3>
                        <div class="block-content">
                          <div class="twitter-item">
                              <div class="twitter-content"> Looking for an awesome CREATIVE WordPress Theme? Esquise was updated and optimized to run even better. Find it here: <a href="http://t.co/0WWEMQEQ48" target="_blank">http://t.co/0WWEMQEQ48</a> </div>
                              <div class="twitter-context"> <i class="fa fa-twitter"></i><span class="twitter-date">01 day ago</span> </div>
                          </div>
                        <div class="twitter-item">
                            <div class="twitter-content"> It is a long established fact that a reader will be distracted by the readable . Find it here: <a href="http://t.co/0WWEMQEQ48" target="_blank">http://t.co/0WWEMQEQ48</a> </div>
                              <div class="twitter-context"> <i class="fa fa-twitter"></i><span class="twitter-date">02 days ago</span> </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <!-- End Twitter Widget Block --> 
                        
                  <!-- Instagram Widget Block -->
                  <div class="col-md-3">
                    <div class="block block-instagram-widget">
                        <h3 class="block-title"><span>Instagram</span></h3>
                        <ul>
                        {{-- <li> <a href="#.."> <img src="{{ asset('template/images\footer\footer_instagram_01.png') }}" alt=""> <span class="overlay"><i class="fa fa-search"></i></span> </a> </li>
                        <li> <a href="#.."> <img src="{{ asset('template/images\footer\footer_instagram_02.png') }}" alt=""> <span class="overlay"><i class="fa fa-search"></i></span> </a> </li>
                        <li> <a href="#.."> <img src="{{ asset('template/images\footer\footer_instagram_03.png') }}" alt=""> <span class="overlay"><i class="fa fa-search"></i></span> </a> </li>
                        <li> <a href="#.."> <img src="{{ asset('template/images\footer\footer_instagram_04.png') }}" alt=""> <span class="overlay"><i class="fa fa-search"></i></span> </a> </li>
                        <li> <a href="#.."> <img src="{{ asset('template/images\footer\footer_instagram_05.png') }}" alt=""> <span class="overlay"><i class="fa fa-search"></i></span> </a> </li>
                        <li> <a href="#.."> <img src="{{ asset('template/images\footer\footer_instagram_06.png') }}" alt=""> <span class="overlay"><i class="fa fa-search"></i></span> </a> </li> --}}
                        </ul>
                    </div>
                  </div>
                  <!-- End Instagram Widget Block --> 
                        
                </div>
              </div>
            </div>
          </div>
          <!-- End Footer Top --> 
            
          <!-- Footer Bottom -->
          <div class="footer-bottom">
            <div class="footer-bottom-wrapper">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 copyright">
                    <p>&copy; 2019 - Design IT Telkom Purwokerto.</p>
                  </div>
                  <div class="col-md-6 social-links">
                    <ul class="right">
                        <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#."><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#."><i class="fa fa-behance"></i></a></li>
                        <li><a href="#."><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#."><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Footer Bottom --> 
        </div>
      </footer>
      <!-- End Footer --> 
        
      <!-- GO TO TOP --> 
      <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
      <!-- GO TO TOP End --> 
    </div>
    <!-- End Page Wrapper --> 
      
    <!-- JavaScripts --> 
    <script src="{{ asset('template/js/vendors/jquery/jquery.min.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/wow.min.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/own-menu.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/flexslider/jquery.flexslider-min.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/jquery.countTo.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/jquery.isotope.min.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/jquery.bxslider.min.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/owl.carousel.min.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/jquery.sticky.js') }}"></script> 
    <script src="{{ asset('template/js/vendors/color-switcher.js') }}"></script>
    
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
    <script type="text/javascript" src="{{ asset('template/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('template/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
    <script src="{{ asset('template/js/zap.js') }}"></script>
  </body>
</html>
