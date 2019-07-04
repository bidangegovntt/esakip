@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Realisasi Anggaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Realisasi Anggaran</a></li>
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
                    {{-- <button id="showAfterPrint">Load</button> --}}
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Program</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Kegiatan</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Indikator Kegiatan</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Target</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Satuan</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Capaian</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Hasil</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Anggaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Persentase</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;" id="action">Action</th>
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
                    <div class="form-group">
                        <label for="target-kinerja" class="col-sm-3 control-label">Target Kinerja</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-target-kinerja" placeholder="target kinerja">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="program" class="col-sm-3 control-label">Program</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-program" placeholder="Program">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="program-anggaran" class="col-sm-3 control-label">Program Anggaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-program-anggaran" placeholder="Program Anggaran">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="capaian" class="col-sm-3 control-label">Capaian</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-capaian" placeholder="capaian">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hasil" class="col-sm-3 control-label">Hasil</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-hasil" placeholder="hasil">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="anggaran" class="col-sm-3 control-label">Anggaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-anggaran" placeholder="anggaran">
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
                url: 'cariRealisasiAnggaran',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun: tahun,
                    opd: opd
                },
                success: function(response) {
                    // console.log(response);
                    $.each(response.data, function(i, value){
                        // console.log(value);
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.program +
                                        " <button class=\"btn btn-success btn-indikator\" style=\"padding: 3px 8px 3px 8px;\" data-id=\"" + value.id + "\"><i class=\"fa fa-plus\"></i></button>" +
                                    "</td>";
                            tr += "<td>" + value.kegiatan + "</td>";
                            tr += "<td>" + value.indikator_kegiatan + "</td>";
                            tr += "<td>" + value.target + "</td>";
                            tr += "<td>" + value.satuan + "</td>";

                        // var indikator = '';
                        
                        $.each(value.data_realisasi_anggaran, function(i, value_detail) {
                            tr += "<td>" + value_detail.capaian + "</td>";
                            tr += "<td>" + value_detail.hasil + "</td>";
                            tr += "<td>" + value_detail.anggaran + "</td>";
                            tr += "<td>" + value_detail.persentase + " %</td>";
                                
                            var isLastElement = i == value.data_realisasi_anggaran.length -1;

                            if (isLastElement) {
                                tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                            // "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            //     "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_detail.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                                            // "</div>" +
                                            "<div class =\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_detail.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr>";
                            } else {
                                tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                            // "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            //     "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_detail.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                                            // "</div>" +
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_detail.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr>" +
                                            "<td></td>" +
                                            "<td></td>" +
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
                url: 'tambahIndikatorRealisasiAnggaran',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id:id
                },
                success: function(response) {
                    // console.log(response.data);
                    $('#modalIndikator').modal();
                    $('#modalIndikator #edit-indikator-kinerja').val(response.data.data_layout.data_indikator_kinerja.deskripsi);
                    $('#modalIndikator #edit-indikator-kinerja-id').val(response.data.id);
                    $('#modalIndikator #edit-target-kinerja').val(response.data.data_layout.data_indikator_kinerja.target_kinerja);
                    $('#modalIndikator #edit-program').val(response.data.program);
                    $('#modalIndikator #edit-program-anggaran').val(response.data.anggaran);
                    $('#modalIndikator #edit-id').val(response.data.id);
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
            var program_anggaran = $('#edit-program-anggaran').val();
            var indikator_kinerja_id = $('#modalIndikator #edit-indikator-kinerja-id').val();
            var capaian = $('#edit-capaian').val();
            var hasil = $('#edit-hasil').val();
            var anggaran = $('#edit-anggaran').val();
            
            $.ajax({
                url: 'masukkanIndikatorRealisasiAnggaran',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    program_anggaran: program_anggaran,
                    indikator_kinerja_id: indikator_kinerja_id,
                    capaian: capaian,
                    hasil: hasil,
                    anggaran: anggaran
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success) {
                        $('#modalIndikator').modal('hide');
                        program = $('#edit-program').val("");
                        kegiatan = $('#edit-kegiatan').val("");
                        indikator_kegiatan = $('#edit-indikator-kegiatan').val("");
                        capaian = $('#edit-capaian').val("");
                        hasil = $('#edit-hasil').val("");
                        anggaran = $('#edit-anggaran').val("");
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
                    url: 'hapusRealisasiAnggaran',
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