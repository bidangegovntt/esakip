@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Perencanaan Program dan Kegiatan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">PPK</a></li>
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
                    class="bg-white shadow-sm p-3"
                    action="{{ route('ppk.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label>Tahun Awal</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('tahun_awal') ? "is-invalid" : "" }}" 
                                value="{{ $data['tahun_awal'] }}"
                                name="tahun_awal"
                                placeholder="tahun_awal"/>
                            <div class="invalid-feedback">
                                {{$errors->first('tahun_awal')}}
                            </div>
                            <label>Tahun Akhir</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('tahun_akhir') ? "is-invalid" : "" }}" 
                                value="{{ $data['tahun_akhir'] }}"
                                name="tahun_akhir"
                                placeholder="tahun_akhir"/>
                            <div class="invalid-feedback">
                                {{$errors->first('tahun_akhir')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('tahun') ? "is-invalid" : "" }}" 
                                value="{{ $data['tahun'] }}"
                                name="tahun"
                                placeholder="tahun"/>
                            <div class="invalid-feedback">
                                {{$errors->first('tahun')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>OPD</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('opd') ? "is-invalid" : "" }}" 
                                value="{{ $data['opd'] }}"
                                name="opd"
                                placeholder="opd"/>
                            <div class="invalid-feedback">
                                {{$errors->first('opd')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sasaran</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('sasaran') ? "is-invalid" : "" }}" 
                                value="{{ $data['sasaran'] }}"
                                name="sasaran"
                                placeholder="sasaran"/>
                            <div class="invalid-feedback">
                                {{$errors->first('sasaran')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Indikator Kinerja</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('indikator_kinerja') ? "is-invalid" : "" }}" 
                                value="{{ $data['indikator_kinerja'] }}"
                                name="indikator_kinerja"
                                placeholder="indikator_kinerja"/>
                            <div class="invalid-feedback">
                                {{$errors->first('indikator_kinerja')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Target Kinerja</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('target_kinerja') ? "is-invalid" : "" }}" 
                                value="{{ $data['target_kinerja'] }}"
                                name="target_kinerja"
                                placeholder="target_kinerja"/>
                            <div class="invalid-feedback">
                                {{$errors->first('target_kinerja')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Program</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('program') ? "is-invalid" : "" }}" 
                                value="{{ $data['program'] }}"
                                name="program"
                                placeholder="program"/>
                            <div class="invalid-feedback">
                                {{$errors->first('program')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pagu Anggaran</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('pagu_anggaran') ? "is-invalid" : "" }}" 
                                value="{{ $data['pagu_anggaran'] }}"
                                name="pagu_anggaran"
                                placeholder="pagu_anggaran"/>
                            <div class="invalid-feedback">
                                {{$errors->first('pagu_anggaran')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Save"/>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
        </div>
    </div>
</section>

@endsection