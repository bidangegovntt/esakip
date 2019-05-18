@extends('layouts.app')

@section('content')

    <!-- Content -->
    <div id="content"> 
        <section class="sub-banner">
            <div class="container">
                <div class="position-center-center">
                    <h2>Berita</h2>
                </div>
            </div>
        </section>
    </div>

    <section class="blog split-post padding-top-80 padding-bottom-80"> 
        <!-- TITTLE -->
        <div class="container">   
            @foreach ($beritas as $berita)          
                <!-- BLOG POST -->
                <article class="blog-post marin-top-80 animate fadeInUp" data-wow-delay="0.4s">
                    <div class="row">             
                        <!-- BLOG POST Image -->
                        <div class="col-md-5">
                            <div class="post-img">
                                    <img src="{{ asset('img/berita/' . $berita->gambar) }}" alt="">
                            </div>
                        </div>
                        <!-- BLOG POST CONTENT -->
                        <div class="col-md-7"> 
                            
                            <a href="{{ $berita->link }}" target="_blank" class="tittle-post">
                                {{ $berita->judul }}
                            </a>
                            <p>{{ $berita->deskripsi }}</p>
                            <a 
                                href="{{ $berita->link }}" 
                                target="_blank"
                                class="btn gray-border margin-top-20 text-normal">READMORE</a>  
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        {{ $beritas->links() }}
    </section>
@endsection