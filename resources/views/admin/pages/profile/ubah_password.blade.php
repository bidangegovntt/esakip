@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ubah Password
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ubah Password</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="row">
            @if(session('status'))
                <div class="col-md-8 col-md-offset-2">                        
                    <div class="form-group col-sm-12">
                        <p>Password berhasil di ubah, silahkan logout dan login kembali dengan password yang baru</p>
                        <a href="{{ route('logout') }}"  class="btn btn-default btn-flat"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <form action="{{ route('profile.ubah_password_store', ['id' => Auth::user()->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-md-4 col-md-offset-4">                        
                        <div class="form-group col-sm-12">
                            <label for="password">Masukkan Password Baru</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="password_ulangi">Ulangi Password Baru</label>
                            <input type="text" class="form-control" name="password_ulangi">
                        </div>                
                        <div class="form-group col-sm-12">
                            <button class="btn btn-primary btn-block">Ubah</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</section>

@endsection