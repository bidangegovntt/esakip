@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Realisasi Kinerja
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Realisasi Kinerja</a></li>
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
                <div class="box-header header-tahun-hide">
                    <div class="form-group form-horizontal">
                        <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="tahun" name="tahun" value="@if( ! empty($data['tahun'])){{$data['tahun']}}@endif">
                        </div>
                    </div>
                </div>
                <div class="box-header header-opd-hide">
                    <div class="form-group form-horizontal">
                        <label for="opd" class="col-sm-2 control-label">OPD</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="opd" name="opd">
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
                        class="btn btn-info btn-cetak"
                        name="btn_cetak"
                        value="btn_cetak"
                        ><i class="fa fa-file-pdf-o"></i> Cetak</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Sasaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Indikator Kinerja</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Target Kinerja</th>
                                {{-- <th style="color: #ffffff; text-align: center; font-size: 12px;">Keterangan</th> --}}
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi</th>
                                <th style="color: #ffffff; text-align: center;" id="action">Action</th>
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

<!-- Modal Tambah Indikator -->
<div class="modal fade" id="modalIndikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal form-indikator">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Indikator</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="edit-id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Indikator Kinerja</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-indikator-kinerja" placeholder="Indikator Kinerja">
                            <input type="hidden" class="form-control" id="edit-indikator-kinerja-id">
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="tw" class="col-sm-3 control-label">Tw</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-tw" placeholder="Tw">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target" class="col-sm-3 control-label">Target</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-target" placeholder="target">
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-3 control-label">Realisasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-keterangan" placeholder="Realisasi">
                        </div>
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

        $('.btn-cari').on('click', function(e) {
            e.preventDefault();
            $('#tabeldata').empty();

            var tahun = $('#tahun').val();
            var opd = $('#opd').children("option:selected").val();

            showData(tahun, opd);
        });

        $('#showAfterPrint').hide();
        $('#showAfterPrint').on('click', function() {
            location.reload();
        });

        $('.btn-cetak').on('click', function(e) {
            e.preventDefault();
            $('.header-tahun-hide').hide();
            $('.header-opd-hide').hide();
            $('.header-button-hide').hide();
            $('table #trLast').hide();
            $('table .btn-indikator').hide();
            $('table #action').hide();
            $('table #tdAction').hide();
            $('hr').hide();
            
            window.print();

            $('#showAfterPrint').show();
        });

        $('#tahun_awal').keyup(function() {
            $('#tahun_akhir').val(parseInt($('#tahun_awal').val()) + 4);
        });

        $('.btn-tambah').on('click', function() {
            $('#modalCreate').modal();
        });

        $('.btn-secondary').on('click', function() {
            showData();
        });

        // showData();

        function showData(data_tahun, data_opd) {
            var tahun = data_tahun;
            var opd = data_opd;

            $.ajax({
                url: 'cariRealisasiKinerja',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun: tahun,
                    opd: opd
                },
                success: function(response) {
                    // console.log(response);
                    $.each(response.data, function(i, value){
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.data_sasaran.deskripsi + "</td>";
                            tr += "<td>" + value.data_indikator_kinerja.deskripsi + "</td>";
                            tr +=   "<td>" + value.data_indikator_kinerja.target_kinerja + "<br><br>" +
                                        "<button class=\"btn btn-success btn-indikator\" style=\"padding: 3px 8px 3px 8px;\" data-id=\"" + value.id + "\"><i class=\"fa fa-plus\"></i></button>" +
                                    "</td>";

                        // var indikator = '';
                        
                        $.each(value.data_realisasi_kinerja, function(i, value_indikator) {
                            // if(indikator == value_indikator.indikator_kinerja_id) {
                            //     tr += "<td></td>";
                            // } else {
                            //     tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                            // }                          
                            // tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                            // tr += "<td>" + value_indikator.tw + "</td>";
                            // tr += "<td>" + value_indikator.target + "</td>";
                            tr += "<td>" + value_indikator.keterangan + "</td>";
                            
                            var isLastElement = i == value.data_realisasi_kinerja.length -1;

                            if (isLastElement) {
                                tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                            // "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            //     "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                                            // "</div>" +
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr>";
                            } else {
                                tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                            // "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            //     "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                                            // "</div>" +
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr>" +
                                            "<td></td>" +
                                            "<td></td>" +
                                            "<td></td>" +
                                            "<td></td>";
                            }

                            // indikator = value_indikator.indikator_kinerja_id;
                        });

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }

        // tambah indikator
        $('#tabeldata').on('click', '.btn-indikator', function() {
            $('#tabeldata').empty();

            var id = $(this).data('id');

            $.ajax({
                url: 'tambahIndikatorRealisasiKinerja',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id:id
                },
                success: function(response) {
                    // console.log(response.data);
                    $('#modalIndikator').modal();
                    $('#modalIndikator #edit-indikator-kinerja').val(response.data.data_indikator_kinerja.deskripsi);
                    $('#modalIndikator #edit-indikator-kinerja-id').val(response.data.indikator_id);
                }
            });
            var tahun = $('#tahun').val();
            var opd = $('#opd').children("option:selected").val();

            showData(tahun, opd);
        });

        // simpan data indikator
        $('.form-indikator').on('submit', function(e) {
            e.preventDefault();
            $('#tabeldata').empty();

            var id = $('#modalIndikator #edit-id').val();
            var indikator_kinerja_id = $('#modalIndikator #edit-indikator-kinerja-id').val();
            // var tw = $('#modalIndikator #edit-tw').val();
            // var target = $('#modalIndikator #edit-target').val();
            var keterangan = $('#modalIndikator #edit-keterangan').val();
            
            $.ajax({
                url: 'masukkanIndikatorRealisasiKinerja',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    indikator_kinerja_id: indikator_kinerja_id,
                    // tw: tw,
                    // target: target,
                    keterangan: keterangan
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success) {
                        $('#modalIndikator').modal('hide');
                        // tw = $('#modalIndikator #edit-tw').val("");
                        // target = $('#modalIndikator #edit-target').val("");
                        keterangan = $('#modalIndikator #edit-keterangan').val("");
                    }
                    var tahun = $('#tahun').val();
                    var opd = $('#opd').children("option:selected").val();

                    showData(tahun, opd);
                }
            });
        });

        // delete data
        $("#tabeldata").on('click', '.btn-delete', function() {
            $('#tabeldata').empty();
            
            var id = $(this).data('id');
            if (confirm("Yakin akan menghapus?")) {
                $.ajax({
                    url: 'hapusRealisasiKinerja',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(response) {
                        var tahun = $('#tahun').val();
                        var opd = $('#opd').children("option:selected").val();

                        showData(tahun, opd);
                    }
                });
            } else {
                var tahun = $('#tahun').val();
                var opd = $('#opd').children("option:selected").val();

                showData(tahun, opd);
            }            
        });
    });
</script>

@endsection