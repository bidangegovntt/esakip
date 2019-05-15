{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}
<!doctype html>
<html class="no-js" lang="en">
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
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="M_Adnan">
<!-- Document Title -->
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
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
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
         <div class="logo"> <a href="index.php"><img src="{{ asset('template/images/logo2.png') }}" height="50px" width="180px" alt=""></a> </div>
        
        <!-- Nav -->
        <nav>
          <ul id="ownmenu" class="ownmenu">

            <li class="active"><a href="index.php">HOME</a></li>
            <li><a href="sakip.php">SAKIP</a></li>
            <li><a href="about.php">Tentang SAKIP</a></li>
            <li><a href="news.php">BERITA</a></li>
            <li><a href="gallery.php">GALLERY</a></li>
            <li><a href="login.php">LOGIN</a></li>
            <!--======= SEARCH ICON =========-->
            <li>
             <div class="wrap">
               <div class="search">
                  <input type="text" class="searchTerm" placeholder="Search..?">
                  <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                 </button>
               </div>
            </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- End Header --> 
  
  <!--======= HOME MAIN SLIDER =========-->
  <section class="home-slider">
    <div class="tp-banner-container">
      <div class="tp-banner-fix">
        <ul>
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7"> 
            <!-- MAIN IMAGE --> 
            <img src="{{ asset('template/images/sliders/7/img-1.jpeg') }}" alt="home7_slider2" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
            
            <!-- LAYER NR. 1 -->
            <div class="tp-caption text36black skewfromright tp-resizeme" data-x="center" data-hoffset="250" data-y="center" data-voffset="-90" data-speed="500" data-start="700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: normal;">E-SAKIP PURBALINGGA </div>
            
            <!-- LAYER -->
            <div class="tp-caption skewfromleft tp-resizeme" data-x="left" data-hoffset="-50" data-y="bottom" data-voffset="0" data-speed="500" data-start="700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: normal;"><img src="{{ asset('template/images\sliders\7\cc.jpg') }}"></div>
            
            <!-- LAYER NR. 2 -->
            <div class="tp-caption skewfromright tp-resizeme" data-x="center" data-hoffset="-55" data-y="center" data-voffset="0" data-speed="500" data-start="900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6; white-space: normal;"><a href="sakip.php" class="btn btn-med btn-color">GO TO SAKIP</a> </div>
          </li>
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7"> 
            <!-- MAIN IMAGE --> 
            <img src="{{ asset('template/images/sliders/7/img-1.jpeg') }}" alt="home7_slider1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
            
            <!-- LAYER NR. 1 -->
            <div class="tp-caption skewfromrightshort" data-x="right" data-hoffset="-50" data-y="center" data-voffset="0" data-speed="500" data-start="1200" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5;"><img src="{{ asset('template/images\sliders\7\dd.jpg') }}" alt=""> </div>
            
            <!-- LAYER NR. 2 -->
            <div class="tp-caption text36black skewfromright tp-resizeme" data-x="0" data-y="center" data-voffset="-160" data-speed="500" data-start="1300" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">Purbalingga Kota Perwira</div>
            
            <!-- LAYER NR. 3 -->
            <div class="tp-caption skewfromrightshort" data-x="0" data-y="center" data-voffset="-70" data-speed="400" data-start="1700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 7;"><img src="{{ asset('template/images\sliders\7\icon_tick.png') }}" alt=""> </div>
            
            <!-- LAYER NR. 4 -->
            <div class="tp-caption text12black skewfromrightshort tp-resizeme" data-x="40" data-y="center" data-voffset="-70" data-speed="400" data-start="1800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">Bersih </div>
            
            <!-- LAYER NR. 5 -->
            <div class="tp-caption skewfromrightshort" data-x="0" data-y="center" data-voffset="-20" data-speed="400" data-start="2000" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 9;"><img src="{{ asset('template/images\sliders\7\icon_tick.png') }}" alt=""> </div>
            
            <!-- LAYER NR. 6 -->
            <div class="tp-caption text12black skewfromrightshort tp-resizeme" data-x="40" data-y="center" data-voffset="-20" data-speed="400" data-start="2100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;">Aman </div>
            
            <!-- LAYER NR. 7 -->
            <div class="tp-caption skewfromrightshort" data-x="0" data-y="center" data-voffset="30" data-speed="400" data-start="2300" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;"><img src="{{ asset('template/images\sliders\7\icon_tick.png') }}" alt=""> </div>
            
            <!-- LAYER NR. 8 -->
            <div class="tp-caption text12black skewfromrightshort tp-resizeme" data-x="40" data-y="center" data-voffset="30" data-speed="400" data-start="2400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;">Nyaman </div>
            
            
          </li>
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7"> 
            <!-- MAIN IMAGE --> 
            <img src="{{ asset('template/images/sliders/7/img-1.jpeg') }}" alt="home7_slider3" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
            
            <!-- LAYER NR. 1 -->
            <div class="tp-caption text36black sft tp-resizeme" data-x="center" data-hoffset="0" data-y="100" data-speed="500" data-start="1000" data-easing="Power3.easeInOut" data-splitin="words" data-splitout="none" data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">E-SAKIP Purbalingga </div>
            
            <!-- LAYER NR. 2 -->
            <div class="tp-caption font-crimson font-italic skewfromrightshort tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="-165" data-speed="500" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6; font-size:24px; max-width: auto; max-height: auto; white-space: nowrap;">Dapatkan Informasi Data Terpercaya Dan Terkini </div>
            
            <!-- LAYER NR. 3 -->
            <div class="tp-caption font-italic text-center font-crimson font-16px skewfromright tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="-110" data-speed="1000" data-start="1800" data-easing="Power3.easeInOut" data-splitin="lines" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 7; max-width: 990px; max-height: 48px; white-space: normal;">Website Resmi SAKIP Purbalingga </div>
           
           <!-- LAYER NR. 3 -->
            <div class="tp-caption  sfb tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="300" data-speed="400" data-start="2600" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 13;"> <img src="{{ asset('template/images/sliders/7/ee.jpg') }}" alt=""> </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Welcome -->
    <section class="welcome padding-top-80">
      <div class="container">
        <div class="row"> 
          
          <!-- Intro Image -->
          <div class="col-md-3 text-center animate fadeInLeft" data-wow-delay="0.5s"> <a href="#."> <img class="img-responsive" src="{{ asset('template/images/instagram/img-1.jpeg') }}" alt="Intro Image"> </a> </div>
          
          <!-- Intro Text -->
          <div class="col-md-9">
            <div class="heading-block no-margin">
              <h5 class="margin-bottom-30 animate fadeInDown" data-wow-delay="0.5s">Tentang E - SAKIP</h5>
            </div>
            <p class="animate fadeIn" data-wow-delay="0.5s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
            
            <a href="#." class="btn btn-large dark-border font-normal margin-top-80 letter-space-1 animate fadeInUp" data-wow-delay="0.5s">Selengkapnya</a> </div>
        </div>
      </div>
    </section>
    
    <!-- Blog -->
    <section class="blog padding-top-80">
      <div class="container">
        <div class="heading-block text-center animate fadeInUp" data-wow-delay="0.4s">
          <h3>Latest Blog</h3>
          <div class="divider divider-short divider-center"><img class="i-div" src="{{ asset('template/images/divider/hammers.png') }}" alt="Divider Icon Image"></div>
          <span>Tell Your Story</span> </div>
      </div>
      
      <!-- Blog -->
      <div class="container-fluid"> 
        
        <!-- Blog Row -->
        <div class="posts posts-list list-style-1 row  margin-bottom-80"> 
          
          <!-- Blog -->
          <div class="entry col-lg-6 no-padding animate fadeInLeft" data-wow-delay="0.4s">
            <div class="entry-image"> <a href="#."> <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> </a> </div>
            <div class="entry-body"> <span class="entry-category">Branding design</span>
              <h4 class="entry-title"><a href="#.">Leeds Juicery</a></h4>
              <p class="entry-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
              <a href="#." class="more-link">Read More <i class="fa  fa-long-arrow-right"></i></a> </div>
          </div>
          
          <!-- Blog -->
          <div class="entry col-lg-6 no-padding animate fadeInRight" data-wow-delay="0.4s">
            <div class="entry-image"> <a href="#."> <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> </a> </div>
            <div class="entry-body"> <span class="entry-category">Motion Graphic</span>
              <h4 class="entry-title"><a href="#.">Hello Itaewon Project</a></h4>
              <p class="entry-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
              <a href="#." class="more-link">Read More <i class="fa fa-long-arrow-right"></i></a> </div>
          </div>
          
          <!-- Blog -->
          <div class="entry entry-image-right col-lg-6 no-padding animate fadeInRight" data-wow-delay="0.4s">
            <div class="entry-image"> <a href="#."> <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> </a> </div>
            <div class="entry-body"> <span class="entry-category">Lookbook seasonal</span>
              <h4 class="entry-title"><a href="#.">Brooklyn</a></h4>
              <p class="entry-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
              <a href="#." class="more-link">Read More <i class="fa fa-long-arrow-right"></i></a> </div>
          </div>
          
          <!-- Blog -->
          <div class="entry entry-image-right col-lg-6 no-padding animate fadeInLeft" data-wow-delay="0.4s">
            <div class="entry-image"> <a href="#."> <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> </a> </div>
            <div class="entry-body"> <span class="entry-category">Photography</span>
              <h4 class="entry-title"><a href="#.">Maxi Dress</a></h4>
              <p class="entry-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
              <a href="#." class="more-link">Read More <i class="fa fa-long-arrow-right"></i></a> </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Contact Us -->
    <section class="contact">
      <center><h4>My Google Maps Demo</h4></center>
    <!--The div element for the map -->
    {{-- <div id="map"></div> --}}
    <script>
    </script>
    


    </section>
    
    <!-- Parthner -->
    <section class="section-home section-parthner padding-top-80 padding-bottom-80">
      <div class="container"> 
        <!-- Main Heading -->
        <div class="heading-block text-center animate fadeInUp" data-wow-delay="0.4s">
          <h3>Our Partner</h3>
          <div class="divider divider-short divider-center"><img class="i-div" src="{{ asset('template/images/divider/hammers.png') }}" alt="Divider Icon Image"></div> 
        </div>
        <!-- Pathner Images -->
        <ul class="animate fadeInUp" data-wow-delay="0.4s">
          <li> <a href="#.."> <img  height="120" width="120"class="img-responsive" src="{{ asset('template/images/partners/1a.png') }}" alt="Our Partner Logo Image"> </a> </li>

          <li> <a href="#.."> <img  height="120" width="120" class="img-responsive" src="{{ asset('template/images/partners/1b.png') }}" alt="Our Partner Logo Image"> </a> </li>

          <li> <a href="#.."> <img  height="120" width="120" class="img-responsive" src="{{ asset('template/images/partners/1c.png') }}" alt="Our Partner Logo Image"> </a> </li>

          <li> <a href="#.."> <img  height="120" width="120" class="img-responsive" src="{{ asset('template/images/partners/1d.png') }}" alt="Our Partner Logo Image"> </a> </li>
        </ul>
        
      </div>
    </section>
  </div>
  <!-- End Content --> 
  
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
                    <img height="80" width="280" class="footer-logo" src="{{ asset('template/images/logo2.png') }}" alt=""> </div>
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
<script>
document.addEventListener("mousewheel", this.mousewheel.bind(this), { passive: false });
</script>
</body>
</html>
