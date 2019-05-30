@extends('admin.layouts.app')

@section('title') Edit RPJMD @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Data RPJMD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RPJMD</a></li>
        <li class="active">Edit</li>
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
                    action="{{ route('rpjmd.update', ['id' => $rpjmd->id]) }}"
                    method="POST">
                    @method('PUT')
                    @csrf

                    <div class="box-body">
                        <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Tahun Awal</label>
                            <div class="col-sm-2">
                                <input
                                    type="text"
                                    class="form-control {{ $errors->first('tahun_awal') ? "is-invalid" : "" }}" 
                                    value="{{ old('tahun_awal') ? old('tahun_awal') : $rpjmd->tahun_awal }}"
                                    placeholder="Tahun_awal"
                                    disabled />
                                    <div class="invalid-feedback">
                                        {{$errors->first('tahun_awal')}}
                                    </div>
                            </div>
                            <label class="col-sm-2 control-label">Tahun Akhir</label>
                            <div class="col-sm-2">
                                <input
                                    type="text"
                                    class="form-control {{ $errors->first('tahun_akhir') ? "is-invalid" : "" }}" 
                                    value="{{ old('tahun_akhir') ? old('tahun_akhir') : $rpjmd->tahun_akhir }}"
                                    placeholder="tahun_akhir"
                                    disabled />
                                    <div class="invalid-feedback">
                                        {{$errors->first('tahun_akhir')}}
                                    </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Tujuan</label>
                            <div class="col-sm-8">
                                <textarea
                                    class="form-control {{ $errors->first('tujuan') ? "is-invalid" : "" }}"
                                    name="tujuan"
                                    placeholder="Tujuan.....">{{ old('tujuan') ? old('tujuan') : $rpjmd->tujuan }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('tujuan')}}
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Sasaran</label>
                            <div class="col-sm-8">
                                <textarea
                                    class="form-control {{ $errors->first('sasaran') ? "is-invalid" : "" }}" 
                                    name="sasaran"
                                    placeholder="Sasaran.....">{{ old('sasaran') ? old('sasaran') : $rpjmd->sasaran }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('sasaran')}}
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Indikator Kinerja</label>
                            <div class="col-sm-8">
                                <textarea
                                    class="form-control {{ $errors->first('indikator_kinerja') ? "is-invalid" : "" }}"
                                    name="indikator_kinerja"
                                    placeholder="Indikator_kinerja Kinerja.....">{{ old('indikator_kinerja') ? old('indikator_kinerja') : $rpjmd->indikator_kinerja }}</textarea>
                                <div class="invalid-feedback">
                                    {{ $errors->first('indikator_kinerja') }}
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        @foreach ($rpjmd_targets as $rpjmd_target)
                            <div class="form-group form-horizontal">
                                <label class="col-sm-2 control-label">Target {{ $rpjmd_target->tahun }}</label>
                                <div class="col-sm-3">
                                    <input
                                        type="number"
                                        class="form-control {{ $errors->first('target') ? "is-invalid" : "" }}" 
                                        value="{{ old('target') ? old('target') : $rpjmd_target->nilai }}"
                                        name="target[]"
                                        placeholder="0"/>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('target') }}
                                    </div>
                                    <input
                                        type="hidden"
                                        class="form-control {{ $errors->first('tahun') ? "is-invalid" : "" }}" 
                                        value="{{ $rpjmd_target->tahun }}"
                                        name="tahun[]"
                                        placeholder="0"/>
                                </div>
                                <div class="col-sm-2 control-label" style="text-align: left;">%</div>
                            </div>
                            <br><br>
                        @endforeach
                        <br>
                        <div class="form-group form-horizontal">
                            <div class="col-sm-2">
                                <input
                                    type="submit"
                                    class="btn btn-primary"
                                    value="Save"/>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
    {{-- <script>
        $(document).ready(function() {
            var getdata = new URLSearchParams(window.location.search)
            var getvalue = getdata.get('data');
            console.log(getvalue);
        });
    </script> --}}
@endsection