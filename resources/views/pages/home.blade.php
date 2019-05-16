@extends('layouts.app')

@section('content')

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
        <div class="col-md-3 text-center animate fadeInLeft" data-wow-delay="0.5s"> 
          <a href="#."> 
            <img class="img-responsive" src="{{ asset('template/images/instagram/img-1.jpeg') }}" alt="Intro Image"> 
          </a> 
        </div>
        <!-- Intro Text -->
        <div class="col-md-9">
          <div class="heading-block no-margin">
            <h5 class="margin-bottom-30 animate fadeInDown" data-wow-delay="0.5s">Tentang E - SAKIP</h5>
          </div>
          <p class="animate fadeIn" data-wow-delay="0.5s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>                
          <a href="#." class="btn btn-large dark-border font-normal margin-top-80 letter-space-1 animate fadeInUp" data-wow-delay="0.5s">Selengkapnya</a> 
        </div>
      </div>
    </div>
  </section>
    
  <!-- Blog -->
  <section class="blog padding-top-80">
    <div class="container">
      <div class="heading-block text-center animate fadeInUp" data-wow-delay="0.4s">
        <h3>Latest Blog</h3>
        <div class="divider divider-short divider-center">
          <img class="i-div" src="{{ asset('template/images/divider/hammers.png') }}" alt="Divider Icon Image">
        </div>
        <span>Tell Your Story</span> 
      </div>
    </div>          
    <!-- Blog -->
    <div class="container-fluid">   
      <!-- Blog Row -->
      <div class="posts posts-list list-style-1 row  margin-bottom-80"> 
        <!-- Blog -->
        <div class="entry col-lg-6 no-padding animate fadeInLeft" data-wow-delay="0.4s">
          <div class="entry-image"> 
            <a href="#."> 
              <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> 
            </a> 
          </div>
          <div class="entry-body"> <span class="entry-category">Branding design</span>
            <h4 class="entry-title">
              <a href="#.">Leeds Juicery</a>
            </h4>
            <p class="entry-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
            <a href="#." class="more-link">Read More <i class="fa  fa-long-arrow-right"></i></a> 
          </div>
        </div>
          
        <!-- Blog -->
        <div class="entry col-lg-6 no-padding animate fadeInRight" data-wow-delay="0.4s">
          <div class="entry-image"> 
            <a href="#."> 
              <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> 
            </a> 
          </div>
          <div class="entry-body"> <span class="entry-category">Motion Graphic</span>
            <h4 class="entry-title">
              <a href="#.">Hello Itaewon Project</a>
            </h4>
            <p class="entry-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
            <a href="#." class="more-link">Read More <i class="fa fa-long-arrow-right"></i></a> 
          </div>
        </div>
          
        <!-- Blog -->
        <div class="entry entry-image-right col-lg-6 no-padding animate fadeInRight" data-wow-delay="0.4s">
          <div class="entry-image"> 
            <a href="#."> 
              <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> 
            </a> 
          </div>
          <div class="entry-body"> <span class="entry-category">Lookbook seasonal</span>
            <h4 class="entry-title">
              <a href="#.">Brooklyn</a>
            </h4>
            <p class="entry-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
            <a href="#." class="more-link">Read More <i class="fa fa-long-arrow-right"></i></a> 
          </div>
        </div>
          
        <!-- Blog -->
        <div class="entry entry-image-right col-lg-6 no-padding animate fadeInLeft" data-wow-delay="0.4s">
          <div class="entry-image"> 
            <a href="#."> 
              <img class="responsive-img" src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="Blog Thumbnail Image"> 
            </a> 
          </div>
          <div class="entry-body"> 
            <span class="entry-category">Photography</span>
            <h4 class="entry-title">
              <a href="#.">Maxi Dress</a>
            </h4>
            <p class="entry-content">
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore 
            </p>
            <a href="#." class="more-link">Read More <i class="fa fa-long-arrow-right"></i></a> 
          </div>
        </div>
      </div>
    </div>
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
        <li> 
          <a href="#.."> 
            <img  height="120" width="120"class="img-responsive" src="{{ asset('template/images/partners/1a.png') }}" alt="Our Partner Logo Image"> 
          </a> 
        </li>    
        <li> 
          <a href="#.."> 
            <img  height="120" width="120" class="img-responsive" src="{{ asset('template/images/partners/1b.png') }}" alt="Our Partner Logo Image"> 
          </a> 
        </li>    
        <li> 
          <a href="#.."> 
            <img  height="120" width="120" class="img-responsive" src="{{ asset('template/images/partners/1c.png') }}" alt="Our Partner Logo Image"> 
          </a> 
        </li>    
        <li> 
          <a href="#.."> 
            <img  height="120" width="120" class="img-responsive" src="{{ asset('template/images/partners/1d.png') }}" alt="Our Partner Logo Image"> 
          </a> 
        </li>
      </ul>            
    </div>
  </section>
</div>
<!-- End Content -->

@endsection