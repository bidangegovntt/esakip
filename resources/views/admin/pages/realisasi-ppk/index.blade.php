@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Realisasi PPK
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Realisasi PPK</a></li>
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
                        class="btn btn-info btn-tambah"
                        name="btn_tambah"
                        value="btn_tambah"
                        ><i class="fa fa-plus"></i> Tambah</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{-- <button id="showAfterPrint">Load</button> --}}
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Sasaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Indikator</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Target</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Program</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Kegiatan</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Anggaran</th>
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

<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal form-create">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data PPK</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tahun" class="col-sm-3 control-label">Tahun</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="input-tahun" placeholder="Tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opd" class="col-sm-3 control-label">OPD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-opd-text" placeholder="OPD">
                            <input type="hidden" class="form-control" id="input-opd-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sasaran" class="col-sm-3 control-label">Sasaran</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="input-sasaran" name="sasaran">
                                <option value="">--Pilih Sasaran--</option>
                                @foreach ($sasarans as $sasaran)
                                    <option value="{{ $sasaran->id }}">{{ $sasaran->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="indikator" class="col-sm-3 control-label">Indikator</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="input-indikator" name="indikator">
                                <option value="">--Pilih indikator--</option>
                                @foreach ($indikators as $indikator)
                                    <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target" class="col-sm-3 control-label">Target</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="input-target" name="target">
                                <option value="">--Pilih target--</option>
                                @foreach ($targets as $target)
                                    <option value="{{ $target->id }}">{{ $target->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="program" class="col-sm-3 control-label">Program</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-program" placeholder="program">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan" class="col-sm-3 control-label">Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-kegiatan" placeholder="kegiatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="anggaran" class="col-sm-3 control-label">Anggaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-anggaran" placeholder="anggaran">
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

        // $('#showAfterPrint').hide();
        // $('#showAfterPrint').on('click', function() {
        //     location.reload();
        // });

        // $('.btn-cetak').on('click', function(e) {
        //     e.preventDefault();
        //     $('.header-tahun-hide').hide();
        //     $('.header-opd-hide').hide();
        //     $('.header-button-hide').hide();
        //     $('table #trLast').hide();
        //     $('table .btn-indikator').hide();
        //     $('table #action').hide();
        //     $('table #tdAction').hide();
        //     $('hr').hide();
            
        //     window.print();

        //     $('#showAfterPrint').show();
        // });

        // $('#tahun_awal').keyup(function() {
        //     $('#tahun_akhir').val(parseInt($('#tahun_awal').val()) + 4);
        // });

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
                url: 'cariRealisasiPpk',
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
                            tr += "<td>" + value.data_sasaran.nama + "</td>";
                            tr += "<td>" + value.data_indikator.nama + "</td>";
                            tr += "<td>" + value.data_target.nama + "</td>";
                            tr += "<td>" + value.program + " %</td>";
                            tr += "<td>" + value.kegiatan + "</td>";
                            tr += "<td>" + value.anggaran + "</td>";
                            tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                        "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                        "</div>" +
                                    "</td>";

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }

        // modal create show
        $('#modalCreate').on('show.bs.modal', function() {

            $('#tabeldata').empty();

            var tahun = $('#tahun').val();
            var opd_text = $('#opd').children("option:selected").text();
            var opd_id = $('#opd').children("option:selected").val();

            $('#input-tahun').val(tahun);
            $('#input-opd-text').val(opd_text);
            $('#input-opd-id').val(opd_id);
        });

        // simpan data renstra
        $('.form-create').on('submit', function(e) {
            e.preventDefault();
            var tahun = $('#input-tahun').val();
            var opd_id = $('#input-opd-id').val();
            var sasaran_id = $('#input-sasaran').val();
            var indikator_id = $('#input-indikator').val();
            var target_id = $('#input-target').val();
            var program = $('#input-program').val();
            var kegiatan = $('#input-kegiatan').val();
            var anggaran = $('#input-anggaran').val();
            
            $.ajax({
                url: 'realisasiPpk',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun: tahun,
                    opd_id: opd_id,
                    sasaran_id: sasaran_id,
                    indikator_id: indikator_id,
                    target_id: target_id,
                    program: program,
                    kegiatan: kegiatan,
                    anggaran: anggaran
                },
                success: function(response) {
                    console.log(response);
                    if(response.success) {
                        $('#modalCreate').modal('hide');
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
                    url: 'hapusRealisasiPpk',
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