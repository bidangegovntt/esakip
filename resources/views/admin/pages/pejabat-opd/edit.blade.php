@extends('admin.layouts.app')

@section('title') Edit Pejabat OPD @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Data Pejabat OPD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">Pejabat OPD</li>
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
                <form
                    enctype="multipart/form-data"
                    class="bg-white shadow-sm p-3"
                    action="{{ route('pejabat-opd.update', ['id' => $pejabatOpd->id]) }}"
                    method="POST">
                    @method('PUT')
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label>NIP</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('nip') ? "is-invalid" : "" }}" 
                                value="{{ old('nip') ? old('nip') : $pejabatOpd->nip }}"
                                name="nip"
                                placeholder="NIP"
                                autofocus />
                            <div class="invalid-feedback">
                                {{ $errors->first('nip') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama Pejabat</label><br>
                            <input
                                type="text"
                                class="form-control {{$errors->first('nama') ? "is-invalid" : ""}}"
                                value="{{ old('nama') ? old('nama') : $pejabatOpd->nama }}"
                                name="nama"
                                placeholder="Nama OPD"/>
                            <div class="invalid-feedback">
                                {{ $errors->first('nama') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama OPD</label><br>
                            <select class="form-control {{ $errors->first('opd_id') ? "is-invalid" : "" }}" name="opd_id" id="opd_id">
                                <option value="" selected>--Pilih OPD--</option>
                                @foreach ($opds as $opd)
                                    <option {{ $opd->id == $pejabatOpd->opd_id ? 'selected' : '' }} value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('opd_id') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label><br>
                            <select class="form-control {{ $errors->first('jabatan_id') ? "is-invalid" : "" }}" name="jabatan_id" id="jabatan_id">
                                <option value="" selected>--Pilih Jabatan--</option>
                                @foreach ($jabatans as $jabatan)
                                    <option {{ $jabatan->id == $pejabatOpd->jabatan_id ? 'selected' : '' }} value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jabatan_id') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('email') ? "is-invalid" : "" }}" 
                                value="{{ old('email') ? old('email') : $pejabatOpd->email }}"
                                name="email"
                                placeholder="Email" />
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('no_telp') ? "is-invalid" : "" }}" 
                                value="{{ old('no_telp') ? old('no_telp') : $pejabatOpd->no_telp }}"
                                name="no_telp"
                                placeholder="Nomor Telepon"
                                autofocus />
                            <div class="invalid-feedback">
                                {{ $errors->first('no_telp') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('alamat') ? "is-invalid" : "" }}" 
                                value="{{ old('alamat') ? old('alamat') : $pejabatOpd->alamat }}"
                                name="alamat"
                                placeholder="Alamat"
                                autofocus />
                            <div class="invalid-feedback">
                                {{ $errors->first('alamat') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Save"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection