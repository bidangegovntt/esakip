@extends('admin.layouts.app')

@section('title') Create User @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Data Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">Create</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="box">
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('users.store') }}"
                    method="POST">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama</label><br>
                            <input type="text" class="form-control {{ $errors->first('name') ? "is-invalid" : "" }}"
                                value="{{ old('name') }}" name="name" placeholder="Nama" />
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label><br>
                            <input type="text" class="form-control {{ $errors->first('password') ? "is-invalid" : "" }}"
                                value="{{ old('password') }}" name="password" placeholder="Password" />
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Level</label><br>
                            <select class="form-control" name="roles" id="roles">
                                <option value="" selected>--Pilih Level--</option>
                                <option value="admin">Admin</option>
                                <option value="monitoring tingkat pusat">Monitoring Tingkat Pusat</option>
                                <option value="monitoring tingkat unit">Monitoring Tingkat Unit</option>
                                <option value="unit kerja">Unit Kerja</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('roles') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama OPD</label><br>
                            <select class="form-control {{ $errors->first('opd_id') ? "is-invalid" : "" }}"
                                name="opd_id" id="opd_id">
                                <option value="" selected>--Pilih OPD--</option>
                                @foreach ($opds as $opd)
                                <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('opd_id') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Save" />
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
        </div>
    </div>
</section>

@endsection