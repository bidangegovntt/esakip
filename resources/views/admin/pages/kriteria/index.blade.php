@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kriteria
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kriteria</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12"> 
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    {{-- <button id="showAfterPrint">Load</button> --}}
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">OPD</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Program</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Program Anggaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi Anggaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Persentase</th>
                            </tr>
                        </thead>
                        <tbody id="tabeldata">
                            @if ($rencanaAnggarans->isEmpty())
                                <tr>
                                    <td colspan="6" style="text-align: center;">Tidak Ada</td>
                                </tr>                
                            @else            
                                @foreach ($rencanaAnggarans as $key => $rencanaAnggaran)
                                <tr>
                                    <td style="text-align: center;">{{ $key + 1 }}</td>
                                    <td>{{ $rencanaAnggaran->data_layout->data_rencana_anggaran->data_opd->nama }}</td>
                                    <td>{{ $rencanaAnggaran->program }}</td>
                                    <td style="text-align: right;">{{ $rencanaAnggaran->anggaran }}</td>
                                    @foreach ($rencanaAnggaran->data_realisasi_anggaran as $item)
                                        <td style="text-align: right;">{{ $item->anggaran }}</td>
                                        <td style="text-align: center;">{{ $item->persentase }} %</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')


@endsection