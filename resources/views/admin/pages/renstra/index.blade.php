@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage RENSTRA
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RENSTRA</a></li>
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
                            <label for="tahun_awal" class="col-sm-1 control-label">Tahun</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="tahun_awal" placeholder="Mulai">
                            </div>
                            <label for="tahun_akhir" class="col-sm-1 control-label">Sampai</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="tahun_akhir" placeholder="Selesai" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="form-group form-horizontal">
                            <label for="opd" class="col-sm-1 control-label">OPD</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="opd">
                                    <option value="">--Pilih OPD--</option>
                                    @foreach ($opds as $opd)
                                        <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                <!-- /.box-header -->
                <hr>
                <div class="box-header">
                    <a
                        href="#"
                        class="btn btn-info btn-cari"
                        ><i class="fa fa-search"></i> Cari</a>
                    <a
                        href="{{ route('bidang.create') }}"
                        class="btn btn-info"
                        ><i class="fa fa-file-pdf-o"></i> Cetak</a>
                    <a
                        href="#"
                        class="btn btn-info btn-tambah"
                        ><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;">
                            <tr>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">No</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Tujuan</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Sasaran</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Indikator Kinerja</th>
                                <th style="color: #ffffff; text-align: center; border-bottom: solid #fff 0px; border-right: solid #fff 0px;" colspan="5">Target</th>
                                <th style="color: #ffffff; text-align: center; border-left: solid #fff 1px;" rowspan="2">Action</th>
                            </tr>
                            <tr id="target">
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                            </tr>
                        </thead>
                        <tbody id="tabeldata">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal form-create">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data RENSTRA</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tahun_awal" class="col-sm-3 control-label">Tahun Awal</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="input-tahun-awal" placeholder="Tahun Awal">
                        </div>
                        <label for="tahun_akhir" class="col-sm-3 control-label">Tahun Akhir</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="input-tahun-akhir" placeholder="Tahun Akhir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opd" class="col-sm-3 control-label">OPD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-opd-text" placeholder="OPD">
                            <input type="hidden" class="form-control" id="input-opd-id" placeholder="OPD">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tujuan" class="col-sm-3 control-label">Tujuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-tujuan" placeholder="Tujuan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sasaran" class="col-sm-3 control-label">Sasaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-sasaran" placeholder="Sasaran">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="indikator" class="col-sm-3 control-label">Indikator</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-indikator" placeholder="Indikator">
                        </div>
                    </div>
                    <div id="input-target">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#tahun_awal').keyup(function() {
            $('#tahun_akhir').val(parseInt($('#tahun_awal').val()) + 4);
        });

        $('.btn-tambah').on('click', function() {
            $('#modalCreate').modal();
        });

        // modal create show
        $('#modalCreate').on('show.bs.modal', function() {
            var tahun_awal = $('#tahun_awal').val();
            var tahun_akhir = $('#tahun_akhir').val();
            var opd_text = $('#opd').children("option:selected").text();
            var opd_id = $('#opd').children("option:selected").val();

            $('#input-tahun-awal').val(tahun_awal);
            $('#input-tahun-akhir').val(tahun_akhir);
            $('#input-opd-text').val(opd_text);
            $('#input-opd-id').val(opd_id);

            $('#input-target').append().empty();

            for(i = tahun_awal; i <= tahun_akhir; i++) {
                $('#input-target').append("<div class=form-group form-horizontal><label for=indikator class=col-sm-3 control-label style=\"text-align: right;\">" + i + "</label><div class=col-sm-9><input type=number class=form-control id=input-target placeholder=0></div></div>");
            }
        });

        showData();

        function showData() {
            $.ajax({
                url: 'getDataRenstra',
                type: 'GET',
                dataType: 'json',
                success: function(response) {                    
                    $.each(response.data, function(i, value){
                        console.log(value);
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.deskripsi + "</td>";

                        var sasaran = '';
                        
                        $.each(value.data_layout, function(i, value_layout) {
                            // console.log("sas"); 
                            if(sasaran == value_layout.sasaran_id) {
                                tr += "<td></td>";
                            } else {
                                tr += "<td>" + value_layout.data_sasaran.deskripsi + "</td>";
                            }                          
                            
                            tr += "<td>" + value_layout.data_indikator.deskripsi + "</td>";
                            
                            var isLastElement = i == value.data_layout.length -1;

                            if (isLastElement) {                                
                                for(a = 0; a < value_layout.data_target.length; a++) {
                                    var b = value_layout.data_target[a];
                                    tr += "<td>" + b.nilai + "</td>";
                                }
                                tr +=   "<td style=\"width: 90px;\">" + 
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-info btn-sm btn-block\"><i class=\"fa fa-edit\"></i></button>" +
                                            "</div>" +
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr>";
                                tr +=   "<tr>" +
                                            "<td></td>" +
                                            "<td><button class=\"btn btn-success\" style=\"padding: 3px 8px 3px 8px;\"><i class=\"fa fa-plus\"></i></button></td>" +
                                            "<td><button class=\"btn btn-success\" style=\"padding: 3px 8px 3px 8px;\"><i class=\"fa fa-plus\"></i></button></td>" +
                                            "<td><button class=\"btn btn-success\" style=\"padding: 3px 8px 3px 8px;\"><i class=\"fa fa-plus\"></i></button></td>" +
                                        "</tr>";
                            } else {
                                for(a = 0; a < value_layout.data_target.length; a++) {
                                    var b = value_layout.data_target[a];
                                    tr += "<td>" + b.nilai + "</td>";
                                }
                                tr +=   "<td style=\"width: 90px;\">" + 
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-info btn-sm btn-block\"><i class=\"fa fa-edit\"></i></button>" +
                                            "</div>" +
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr><td></td><td></td>";
                            }

                            sasaran = value_layout.sasaran_id;
                        });

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }

        // simpan data renstra
        $('.form-create').on('submit', function(e) {
            e.preventDefault();
            var tahun_awal = $('#input-tahun-awal').val();
            var tahun_akhir = $('#input-tahun-akhir').val();
            var opd_id = $('#input-opd-id').val();
            var tujuan = $('#input-tujuan').val();
            var sasaran = $('#input-sasaran').val();
            var indikator = $('#input-indikator').val();

            $.ajax({
                url: 'renstra',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun_awal: tahun_awal,
                    tahun_akhir: tahun_akhir,
                    opd_id: opd_id,
                    tujuan: tujuan,
                    sasaran: sasaran,
                    indikator: indikator
                },
                success: function(response) {
                    console.log(response.success);
                    if(response.success) {
                        $('#modalCreate').modal('hide');
                    }
                }
            });
        });
    });
</script>

@endsection