@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        LAKIP
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">LAKIP</a></li>
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
                <form action="{{ url('/input/lakip/proses') }}" method="POST">
                    @csrf
                    <div class="box-header header-tahun-hide">
                        <div class="form-group form-horizontal">
                            <label for="tahun_awal" class="col-sm-2 control-label">Tahun</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="tahun" value="@if( ! empty($data['tahun'])){{$data['tahun']}}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="box-header header-opd-hide">
                        <div class="form-group form-horizontal">
                            <label for="opd" class="col-sm-2 control-label">OPD</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="opd">
                                    <option value="">--Pilih OPD--</option>
                                    @foreach ($opds as $opd)
                                        <option value="{{ $opd->id }}" @if( ! empty($data['opd']) && $data['opd'] == $opd->id) selected @endif>{{ $opd->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <hr>
                    <div class="box-header header-button-hide">
                        <button
                            class="btn btn-info btn-cari"
                            name="btn_cari"
                            value="btn_cari"
                            ><i class="fa fa-search"></i> Cari</button>
                        <button
                            class="btn btn-info btn-tambah"
                            name="btn_upload"
                            value="btn_upload"
                            ><i class="fa fa-upload"></i> Upload</button>
                    </div>
                </form>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center;">No</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">OPD</th>
                                <th style="color: #ffffff; text-align: center;">LAKIP</th>
                                <th style="color: #ffffff; text-align: center;" id="action">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tabeldata">
                            @foreach ($lakips as $key => $lakip)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td>{{ $lakip->tahun }}</td>
                                <td>{{ $lakip->data_opd->nama }}</td>
                                <td style="text-align: center;"><a href="{{ asset('file/' . $lakip->file) }}" class="btn btn-success"><i class="fa fa-download"></i></a></td>
                                <td style="text-align: center;">
                                    <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                                        <form
                                            onsubmit="return confirm('Delete this data permanently?')"
                                            action="{{ route('lakip.destroy', ['id' => $lakip->id ]) }}"
                                            method="POST">
                                            @csrf
                                            <input
                                                type="hidden"
                                                name="_method"
                                                value="DELETE">
                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm btn-block">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection