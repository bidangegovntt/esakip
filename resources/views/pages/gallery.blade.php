@extends('layouts.app')

@section('style')
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('template/css/agency.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="bg-light" id="team">
    <div class="container">        
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-sm-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('img/gallery/' . $gallery->gambar) }}" alt="">
                        <h6>{{ $gallery->keterangan }}</h6>
                        <p class="text-muted">{{ $gallery->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('script')
    
@endsection