@extends('layouts.app')

@section('style')

<style>
    .spasi{
        margin-top: 5%;
        margin-left: 20%;
        margin-right: 10%;
        margin-bottom: 10%;
    }

    .spasi2{
        padding-top: 60px;
    }

    .spasi3{
        padding-top: 10%;
        padding-left: 20%;
        padding-right: 8%;
        padding-bottom: 10%;
    }
    #change {
        height: 15rem;
        width: 20rem;
        color: black;
        background: white;
    }

    #change:hover{
        color: white;
        background: #FFD733;
    }
    #change1 {
        height: 15rem;
        width: 27rem;
        color: black;
        background: white;
    }

    #change1:hover{
        color: white;
        background: #FFD733;
    }
    .border {
        border: 1px;
    }
</style>

@endsection

@section('content')

<section>
    <div class="spasi">
        <div class="col-md-12">
            <center>
                <div id="change" class="col-md-3">
                    <a href="{{ url('c/sakip/rencana-strategi') }}">
                        <img src="{{ asset('template/images/iconbox/icon1.png') }}" alt="">
                        <h5>Rencana Strategi</h5>
                    </a>
                </div>
        
                <div id="change" class="col-md-3">
                    <a href="{{ url('c/sakip/rencana-program') }}">
                        <img src="{{ asset('template/images/iconbox/icon2.png') }}" alt="">
                        <h5>Rencana Program dan Kegiatan</h5>
                    </a>
                </div>
        
                <div id="change" class="col-md-3">
                    <a href="{{ url('c/sakip/indikator-kinerja-utama') }}">
                        <img src="{{ asset('template/images/iconbox/icon3.png') }}" alt="">
                        <h5>Indikator Kinerja Utama</h5>
                    </a>
                </div>
        
                <div id="change" class="col-md-3">
                    <a href="{{ url('c/sakip/perjanjian-kinerja2') }}">
                        <img src="{{ asset('template/images/iconbox/icon4.png') }}" alt="">
                        <h5>Perjanjian Kinerja</h5>
                    </a>
                </div>
            </center>
        </div>

        <div class="spasi3"></div>
            
        <div class="col-md-12">
            <center>
                <div id="change" class="col-md-4">
                    <a href="{{ url('c/sakip/realisasi-kinerja') }}">
                        <img src="{{ asset('template/images/iconbox/icon5.png') }}" alt="">
                        <h5>Realisasi Kinerja</h5>
                    </a>
                </div>
                
                <div id="change" class="col-md-4">
                    <a href="{{ url('c/sakip/rpjmd') }}">
                        <img src="{{ asset('template/images/iconbox/icon6.png') }}" alt="">
                        <h5>RPJMD</h5>
                    </a>
                </div>
        
                <div id="change" class="col-md-4">
                    <a href="{{ url('c/sakip/lakip') }}">
                        <img src="{{ asset('template/images/iconbox/icon7.png') }}" alt="">
                        <h5>LAKIP</h5>
                    </a>
                </div>
            </center>
        </div>
    </div>
    <div class="spasi2"></div>
</section>

@endsection