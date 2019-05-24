@extends('admin.layouts.app')

@section('title') Create Pejabat Subbidang @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Data Pejabat Subbidang
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pejabat Subbidang</a></li>
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
                <form
                    enctype="multipart/form-data"
                    class="bg-white shadow-sm p-3"
                    action="{{ route('pejabat-subbidang.store') }}"
                    method="POST">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label>NIP</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('nip') ? "is-invalid" : "" }}" 
                                value="{{ old('nip') }}"
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
                                class="form-control {{ $errors->first('nama') ? "is-invalid" : "" }}" 
                                value="{{ old('nama') }}"
                                name="nama"
                                placeholder="Nama"
                                autofocus />
                            <div class="invalid-feedback">
                                {{ $errors->first('nama') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama OPD</label><br>
                            <select class="form-control {{ $errors->first('opd_id') ? "is-invalid" : "" }}" name="opd_id" id="opd_id">
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
                            <label>Bidang</label><br>
                            <select class="form-control {{ $errors->first('bidang_id') ? "is-invalid" : "" }}" name="bidang_id" id="bidang_id">
                                <option value="" selected>--Pilih bidang--</option>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('bidang_id') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Subbidang</label><br>
                            <select class="form-control {{ $errors->first('subbidang_id') ? "is-invalid" : "" }}" name="subbidang_id" id="subbidang_id">
                                <option value="" selected>--Pilih subbidang--</option>
                                @foreach ($subbidangs as $subbidang)
                                    <option value="{{ $subbidang->id }}">{{ $subbidang->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('subbidang_id') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label><br>
                            <select class="form-control {{ $errors->first('jabatan_id') ? "is-invalid" : "" }}" name="jabatan_id" id="jabatan_id">
                                <option value="" selected>--Pilih Jabatan--</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jabatan_id') }}
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