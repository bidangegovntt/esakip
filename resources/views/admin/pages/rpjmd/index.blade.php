@extends('admin.layouts.app')

@section('title') List RPJMD @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage RPJMD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RPJMD</a></li>
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
                <div class="box-header">
                    <div class="form-group form-horizontal">
                        <label for="tahun" class="col-sm-1 control-label">Tahun</label>
                        <div class="col-sm-2">
                            <input type="email" class="form-control" id="tahun" placeholder="Mulai">
                        </div>
                        <label for="sampai" class="col-sm-1 control-label">Sampai</label>
                        <div class="col-sm-2">
                            <input type="email" class="form-control" id="sampai" placeholder="Selesai">
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <hr>
                <div class="box-header">
                    <a
                        href="{{ route('bidang.create') }}"
                        class="btn btn-info"
                        ><i class="fa fa-search"></i> Cari</a>
                    <a
                        href="{{ route('bidang.create') }}"
                        class="btn btn-info"
                        ><i class="fa fa-file-pdf-o"></i> Cetak</a>
                    <a
                        href="{{ route('bidang.create') }}"
                        class="btn btn-info"
                        ><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead style="background-color: #428bca;">
                            <tr>
                                <th style="color: #ffffff; text-align: center;" rowspan="2"><b>No</b></th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2"><b>Tujuan</b></th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2"><b>Sasaran</b></th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2"><b>Indikator Kinerja</b></th>
                                <th style="color: #ffffff; text-align: center;" colspan="5"><b>Target</b></th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2"><b>Action</b></th>
                            </tr>                            
                            <tr>
                                <th style="color: #ffffff; text-align: center;"><b>Target</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Target</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Target</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Target</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Target</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($bidangs as $key => $bidang)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td>{{ $bidang->nama }}</td>
                                <td style="width: 100px;">
                                    <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                                            <a
                                            href="{{ route('bidang.edit', ['id' => $bidang->id]) }}"
                                            class="btn btn-info btn-sm btn-block"
                                            > <i class="fa fa-edit"></i> </a>
                                    </div>
                                    <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                                        <form
                                            onsubmit="return confirm('Delete this data permanently?')"
                                            action="{{ route('bidang.destroy', ['id' => $bidang->id ]) }}"
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
                            @endforeach --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    {{-- {{$books->appends(Request::all())->links()}} --}}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection