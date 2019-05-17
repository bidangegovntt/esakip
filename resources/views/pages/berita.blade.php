@extends('layouts.app')

@section('content')

    <!-- Content -->
    <div id="content"> 
        <section class="sub-banner">
        <div class="container">
            <div class="position-center-center">
                <h2>Berita SAKIP</h2>
            </div>
        </div>
        </section>
    </div>

    <section class="blog split-post padding-top-80 padding-bottom-80"> 
        <!-- TITTLE -->
        <div class="container">             
            <!-- BLOG POST -->
            <article class="blog-post animate fadeInUp" data-wow-delay="0.4s">
                <div class="row">             
                    <!-- BLOG POST Image -->
                    <div class="col-md-5">
                        <div class="post-img">
                                <img src="{{ asset('template/images/blog/1/img-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <!-- BLOG POST CONTENT -->
                    <div class="col-md-7"> 
                        <a 
                            href="https://purbalingganews.net/621-pns-mendapat-sk-kenaikan-pangkat/" 
                            class="tittle-post">621 PNS Mendapatkan SK Kenaikan Pangkat </a>
                        <p>Kepala Badan Kepegawaian Pendidikan dan Pelatihan daerah (BKPPD) Purbalingga Heriyanto SPd MSi mengatakan kenaikan pangkat ini diberikan kepada seorang PNS yang telah memenuhi syarat-syarat dan ketentuan sesuai dengan peraturan perundang-undangan.</p>
                        <a 
                            href="https://purbalingganews.net/621-pns-mendapat-sk-kenaikan-pangkat/" 
                            class="btn gray-border margin-top-20 text-normal">READMORE</a> 
                    </div>
                </div>
            </article> 
        </div>
    </section>
@endsection