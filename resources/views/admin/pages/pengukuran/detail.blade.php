@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        OPD: <span>{{ $opd }}</span> -> Tahun: <span>{{ $tahun }}</span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Detail</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12"> 
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center;">No</th>
                                <th style="color: #ffffff; text-align: center;">Sasaran Strategis</th>
                                <th style="color: #ffffff; text-align: center;">Indikator Kinerja</th>
                                <th style="color: #ffffff; text-align: center;">Satuan</th>
                                <th style="color: #ffffff; text-align: center;">Target</th>
                                <th style="color: #ffffff; text-align: center;">Realisasi</th>
                                <th style="color: #ffffff; text-align: center;">Capaian</th>
                                <th style="color: #ffffff; text-align: center;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="tabeldata">
                            @foreach ($capaians as $key => $capaian)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td>{{ $capaian->sasaran }}</td>
                                <td>{{ $capaian->iku }}</td>
                                <td>{{ $capaian->satuan }}</td>
                                <td>{{ $capaian->target }}</td>
                                <td>{{ $capaian->realisasi }}</td>
                                <td>{{ $capaian->capaian }}</td>
                                <td>{{ $capaian->triwulan }}</td>
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