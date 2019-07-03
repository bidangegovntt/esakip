@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Upload Perjanjina Kinerja
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Perjanjian Kinerja</a></li>
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
                    action="{{ route('perjanjianKinerja2.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">
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
                            <label>File :</label>
                            <input class="form-control" type="file" id="file" name="file">
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