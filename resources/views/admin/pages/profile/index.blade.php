@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="row">
            <form action="{{ route('profile.update', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="col-md-12">
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group text-center">
                        @if (Auth::user()->roles == 'admin')
                            <img src="{{ asset('adminlte/dist/img/profile/profile.png') }}" style="max-width: 200px;" class="img-circle" alt="User Image">
                        @else
                            <img src="{{ asset('adminlte/dist/img/profile/' . $user->avatar) }}" style="max-width: 200px;" class="img-circle" alt="User Image">
                        @endif 
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
                    </div>

                    @if (!Auth::user()->roles == 'admin')
                        <div class="form-group col-sm-12">
                            <label for="avatar">Ganti Foto</label>
                            <input type="file" class="form-control" name="avatar" value="{{ Auth::user()->avatar }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <a href="{{ route('profile.ubah_password') }}">Ubah Password</a>
                        </div>
                    @endif
            
                    <div class="form-group col-sm-12">
                        <button class="btn btn-primary btn-block">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection