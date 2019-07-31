@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Capaian
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Capaian</a></li>
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
                <hr>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Rencana Program</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi Program</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Rencana Kegiatan</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi Kegiatan</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Rencana Anggaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi Anggaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Capaian</th>
                            </tr>
                        </thead>
                        <tbody id="tabeldata">

                        </tbody>
                    </table>
                    <br><br>
                    <!-- Donut chart -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Donut Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="donut-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                    <br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Sasaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Indikator</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Target</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Capaian</th>
                            </tr>
                        </thead>
                        <tbody id="tabeldata2">

                        </tbody>
                    </table>
                    <br><br>
                    <!-- Donut chart -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Donut Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="donut-chart2" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

<!-- FLOT CHARTS -->
<script src="{{ asset('adminlte/bower_components/Flot/jquery.flot.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('adminlte/bower_components/Flot/jquery.flot.resize.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('adminlte/bower_components/Flot/jquery.flot.pie.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('adminlte/bower_components/Flot/jquery.flot.categories.js') }}"></script>

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.btn-tambah').on('click', function() {
            $('#modalCreate').modal();
        });

        showData();

        function showData() {
            $('#tabeldata').empty();

            $.ajax({
                url: 'tampilCapaian2',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $.each(response.data, function(i, value){
                        // console.log(value);
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.data_rencana_ppk.program + "</td>";
                            tr += "<td>" + value.data_realisasi_ppk.program + "</td>";
                            tr += "<td>" + value.data_rencana_ppk.kegiatan + "</td>";
                            tr += "<td>" + value.data_realisasi_ppk.kegiatan + "</td>";
                            tr += "<td>" + value.data_rencana_ppk.anggaran + "</td>";
                            tr += "<td>" + value.data_realisasi_ppk.anggaran + "</td>";
                            tr += "<td>" + value.capaian + " %</td>";
                            tr +=   "</tr>";

                        $('#tabeldata').append(tr);
                    });
                        
                    var donutData = response.chartppk
                    $.plot('#donut-chart', donutData, {
                        series: {
                        pie: {
                            show       : true,
                            radius     : 1,
                            innerRadius: 0.5,
                            label      : {
                                show     : true,
                                radius   : 2 / 3,
                                formatter: labelFormatter,
                                threshold: 0.1
                            }

                        }
                        },
                        legend: {
                        show: false
                        }
                    });

                    $.each(response.rk, function(i, value){
                        // console.log(value);
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.data_realisasi_kinerja.data_sasaran.nama + "</td>";
                            tr += "<td>" + value.data_realisasi_kinerja.data_indikator.nama + "</td>";
                            tr += "<td>" + value.data_realisasi_kinerja.target + "</td>";
                            tr += "<td>" + value.data_realisasi_kinerja.realisasi + "</td>";
                            tr += "<td>" + value.capaian + " %</td>";
                            tr +=   "</tr>";

                        $('#tabeldata2').append(tr);
                    });

                    var donutData2 = response.chartrk
                    $.plot('#donut-chart2', donutData2, {
                        series: {
                        pie: {
                            show       : true,
                            radius     : 1,
                            innerRadius: 0.5,
                            label      : {
                            show     : true,
                            radius   : 2 / 3,
                            formatter: labelFormatter,
                            threshold: 0.1
                            }

                        }
                        },
                        legend: {
                        show: false
                        }
                    })
                            }
                        });
                    }

        /*
        * DONUT CHART
        * -----------
        */

        

        
        /*
        * END DONUT CHART
        */

        /*
        * Custom Label formatter
        * ----------------------
        */
        function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
            + label
            + '<br>'
            + '<span style="color: #3c8dbc">' + Math.round(series.percent) + '</span></div>'
        }
    });
</script>

@endsection