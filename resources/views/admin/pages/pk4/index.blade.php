@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage PK IV
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">PK IV</a></li>
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
                            <label for="tahun_awal" class="col-sm-2 control-label">Tahun</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="tahun_awal" placeholder="Tahun">
                            </div>
                        </div>
                    </div>
                    <div class="box-header header-opd-hide">
                        <div class="form-group form-horizontal">
                            <label for="opd" class="col-sm-2 control-label">OPD</label>
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
                    <div class="box-header header-opd-hide">
                        <div class="form-group form-horizontal">
                            <label for="bidang" class="col-sm-2 control-label">Bidang</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="bidang">
                                    <option value="">--Pilih Bidang--</option>
                                    @foreach ($bidangs as $bidang)
                                        <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-header header-opd-hide">
                        <div class="form-group form-horizontal">
                            <label for="subbidang" class="col-sm-2 control-label">Sub Bidang</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="subbidang">
                                    <option value="">--Pilih Sub Bidang--</option>
                                    @foreach ($subbidangs as $subbidang)
                                        <option value="{{ $subbidang->id }}">{{ $subbidang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                <!-- /.box-header -->
                <hr>
                <div class="box-header header-button-hide">
                    <a
                        href="#"
                        class="btn btn-info btn-cari"
                        ><i class="fa fa-search"></i> Cari</a>
                    <a
                        href="#"
                        class="btn btn-info btn-cetak"
                        ><i class="fa fa-file-pdf-o"></i> Cetak</a>
                    <a
                        href="#"
                        class="btn btn-info btn-tambah"
                        ><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <button id="showAfterPrint">Load</button>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center;">No</th>
                                <th style="color: #ffffff; text-align: center;">Kegiatan</th>
                                <th style="color: #ffffff; text-align: center;">Indikator Kegiatan</th>
                                <th style="color: #ffffff; text-align: center;">Target</th>
                                <th style="color: #ffffff; text-align: center;">Sasaran Kegiatan</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data PK IV</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tahun_awal" class="col-sm-3 control-label">Tahun Awal</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="input-tahun-awal" placeholder="Tahun Awal" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opd" class="col-sm-3 control-label">OPD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-opd-text" placeholder="OPD" disabled>
                            <input type="hidden" class="form-control" id="input-opd-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bidang" class="col-sm-3 control-label">Bidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-bidang-text" placeholder="Bidang" disabled>
                            <input type="hidden" class="form-control" id="input-bidang-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subbidang" class="col-sm-3 control-label">SubBidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-subbidang-text" placeholder="SubBidang" disabled>
                            <input type="hidden" class="form-control" id="input-subbidang-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan" class="col-sm-3 control-label">Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-kegiatan" placeholder="Kegiatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="indikator" class="col-sm-3 control-label">Indikator Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-indikator" placeholder="Indikator">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target" class="col-sm-3 control-label">Target</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-target" placeholder="Target">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sasaran" class="col-sm-3 control-label">Sasaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-sasaran" placeholder="Sasaran">
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

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal form-edit">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data PK IV</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="edit-id">
                    <div class="form-group">
                        <label for="tahun_awal" class="col-sm-3 control-label">Tahun Awal</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="edit-tahun-awal" placeholder="Tahun Awal" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opd" class="col-sm-3 control-label">OPD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-opd-text" placeholder="OPD" disabled>
                            <input type="hidden" class="form-control" id="edit-opd-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bidang" class="col-sm-3 control-label">Bidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-bidang-text" placeholder="Bidang" disabled>
                            <input type="hidden" class="form-control" id="edit-bidang-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subbidang" class="col-sm-3 control-label">SubBidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-subbidang-text" placeholder="SubBidang" disabled>
                            <input type="hidden" class="form-control" id="edit-subbidang-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan" class="col-sm-3 control-label">Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-kegiatan-text" placeholder="Kegiatan">
                            <input type="hidden" class="form-control" id="edit-kegiatan-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="indikator" class="col-sm-3 control-label">Indikator Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-indikator-text" placeholder="Indikator">
                            <input type="hidden" class="form-control" id="edit-indikator-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target" class="col-sm-3 control-label">Target</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="edit-target" placeholder="Target"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sasaran" class="col-sm-3 control-label">Sasaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-sasaran" placeholder="Sasaran">
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

<!-- Modal Tambah Indikator -->
<div class="modal fade" id="modalIndikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal form-indikator">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Indikator PK IV</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="edit-id">
                    <div class="form-group">
                        <label for="tahun_awal" class="col-sm-3 control-label">Tahun Awal</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="edit-tahun-awal" placeholder="Tahun Awal" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opd" class="col-sm-3 control-label">OPD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-opd-text" placeholder="OPD" disabled>
                            <input type="hidden" class="form-control" id="edit-opd-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bidang" class="col-sm-3 control-label">Bidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-bidang-text" placeholder="Bidang" disabled>
                            <input type="hidden" class="form-control" id="edit-bidang-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subbidang" class="col-sm-3 control-label">SubBidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-subbidang-text" placeholder="SubBidang" disabled>
                            <input type="hidden" class="form-control" id="edit-subbidang-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan" class="col-sm-3 control-label">Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-kegiatan-text" placeholder="Kegiatan">
                            <input type="hidden" class="form-control" id="edit-kegiatan-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="indikator" class="col-sm-3 control-label">Indikator Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-indikator-text" placeholder="Indikator">
                            <input type="hidden" class="form-control" id="edit-indikator-id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target" class="col-sm-3 control-label">Target</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="edit-target" placeholder="Target"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sasaran" class="col-sm-3 control-label">Sasaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-sasaran" placeholder="Sasaran">
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

            var tahun_awal = $('#tahun_awal').val();
            var opd = $('#opd').children("option:selected").val();
            var bidang = $('#bidang').children("option:selected").val();
            var subbidang = $('#subbidang').children("option:selected").val();

            showData(tahun_awal, opd, bidang, subbidang);
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

        function showData(data_tahun_awal, data_opd, bidang, subbidang) {
            var tahun_awal = data_tahun_awal;
            var opd = data_opd;
            var bidang = bidang;
            var subbidang = subbidang;

            $.ajax({
                url: 'cariPk4',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun_awal: tahun_awal,
                    opd: opd,
                    bidang: bidang,
                    subbidang: subbidang
                },
                success: function(response) {
                    // console.log(response);
                    $.each(response.data, function(i, value){
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.deskripsi + "</td>";

                        var indikator = '';
                        
                        $.each(value.data_layout, function(i, value_layout) {
                            if(indikator == value_layout.indikator_id) {
                                tr += "<td></td>";
                            } else {
                                tr += "<td>" + value_layout.data_indikator.deskripsi + "</td>";
                            }                          
                            
                            tr += "<td>" + value_layout.target + "</td>";
                            tr += "<td>" + value_layout.sasaran + "</td>";
                            
                            var isLastElement = i == value.data_layout.length -1;

                            if (isLastElement) {
                                tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_layout.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                                            "</div>" +
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_layout.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr>";
                                // tr +=   "<tr id=\"trLast\">" +
                                //             "<td></td>" +
                                //             "<td></td>" +
                                //             "<td></td>" +
                                //             "<td></td>" +
                                //             "<td><button class=\"btn btn-success btn-indikator\" style=\"padding: 3px 8px 3px 8px;\" data-id=\"" + value_layout.id + "\"><i class=\"fa fa-plus\"></i></button></td>" +
                                //             "<td colspan=\"6\"></td>" +
                                //         "</tr>";
                            } else {
                                tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_layout.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                                            "</div>" +
                                            "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                                "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_layout.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                            "</div>" +
                                        "</td>";
                                tr +=   "</tr><td></td><td></td>";
                            }

                            indikator = value_layout.program_id;
                        });

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }

        // modal create show
        $('#modalCreate').on('show.bs.modal', function() {

            $('#tabeldata').empty();

            var tahun_awal = $('#tahun_awal').val();
            var opd_text = $('#opd').children("option:selected").text();
            var opd_id = $('#opd').children("option:selected").val();
            var bidang_text = $('#bidang').children("option:selected").text();
            var bidang_id = $('#bidang').children("option:selected").val();
            var subbidang_text = $('#subbidang').children("option:selected").text();
            var subbidang_id = $('#subbidang').children("option:selected").val();

            $('#input-tahun-awal').val(tahun_awal);
            $('#input-opd-text').val(opd_text);
            $('#input-opd-id').val(opd_id);
            $('#input-bidang-text').val(bidang_text);
            $('#input-bidang-id').val(bidang_id);
            $('#input-subbidang-text').val(subbidang_text);
            $('#input-subbidang-id').val(subbidang_id);
        });

        // simpan data renstra
        $('.form-create').on('submit', function(e) {
            e.preventDefault();
            var tahun_awal = $('#input-tahun-awal').val();
            var opd_id = $('#input-opd-id').val();
            var bidang_id = $('#input-bidang-id').val();
            var subbidang_id = $('#input-subbidang-id').val();
            var kegiatan = $('#input-kegiatan').val();
            var indikator = $('#input-indikator').val();
            var target = $('#input-target').val();
            var sasaran = $('#input-sasaran').val();
            
            $.ajax({
                url: 'pk4',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun_awal: tahun_awal,
                    opd_id: opd_id,
                    bidang_id: bidang_id,
                    subbidang_id: subbidang_id,
                    kegiatan: kegiatan,
                    indikator: indikator,
                    target: target,
                    sasaran: sasaran
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success) {
                        $('#modalCreate').modal('hide');
                        kegiatan = $('#input-kegiatan').val("");
                        indikator = $('#input-indikator').val("");
                        target = $('#input-target').val("");
                        sasaran = $('#input-sasaran').val("");
                    }
                    var tahun_awal = $('#tahun_awal').val();
                    var opd = $('#opd').children("option:selected").val();
                    var bidang = $('#bidang').children("option:selected").val();
                    var subbidang = $('#subbidang').children("option:selected").val();

                    showData(tahun_awal, opd, bidang, subbidang);
                }
            });
        });

        // Edit Data
        $("#tabeldata").on('click', '.btn-edit', function() {
            $('#tabeldata').empty();

            var id = $(this).data('id');
            
            $.ajax({
                    url: '{{ URL::route('pk4.edit', 'id') }}',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                        },
                    success: function(response) {
                        // console.log(response.renstra);
                        $('#modalEdit').modal();
                        $('#edit-tahun-awal').val(response.data.data_kegiatan.data_pk4.tahun);
                        $('#edit-id').val(response.data.id);
                        $('#edit-opd-text').val(response.data.data_kegiatan.data_pk4.data_opd.nama);
                        $('#edit-opd-id').val(response.data.data_kegiatan.data_pk4.opd_id);
                        $('#edit-bidang-text').val(response.data.data_kegiatan.data_pk4.data_bidang.nama);
                        $('#edit-bidang-id').val(response.data.data_kegiatan.data_pk4.bidang_id);
                        $('#edit-subbidang-text').val(response.data.data_kegiatan.data_pk4.data_subbidang.nama);
                        $('#edit-subbidang-id').val(response.data.data_kegiatan.data_pk4.subbidang_id);
                        $('#edit-kegiatan-text').val(response.data.data_kegiatan.deskripsi);
                        $('#edit-kegiatan-id').val(response.data.kegiatan_id);
                        $('#edit-indikator-text').val(response.data.data_indikator.deskripsi);
                        $('#edit-indikator-id').val(response.data.indikator_id);
                        $('#edit-target').val(response.data.target);
                        $('#edit-sasaran').val(response.data.sasaran);
                    }
            });
            var tahun_awal = $('#tahun_awal').val();
            var opd = $('#opd').children("option:selected").val();
            var bidang = $('#bidang').children("option:selected").val();
            var subbidang = $('#subbidang').children("option:selected").val();

            showData(tahun_awal, opd, bidang, subbidang);
        });

        // update data
        $('.form-edit').on('submit', function(e) {
            e.preventDefault();
            $('#tabeldata').empty();

            var id = $('#edit-id').val();
            var subbidang_id = $('#edit-subbidang-id').val();
            var kegiatan_text = $('#edit-kegiatan-text').val();
            var kegiatan_id = $('#edit-kegiatan-id').val();
            var indikator_text = $('#edit-indikator-text').val();
            var indikator_id = $('#edit-indikator-id').val();
            var target = $('#edit-target').val();
            var sasaran = $('#edit-sasaran').val();

            $.ajax({
                url: '{{ URL::route('pk4.update', 'id') }}',
                type: 'PUT',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    kegiatan_text: kegiatan_text,
                    kegiatan_id: kegiatan_id,
                    indikator_text: indikator_text,
                    indikator_id: indikator_id,
                    target: target,
                    sasaran: sasaran
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success) {
                        $('#modalEdit').modal('hide');
                        kegiatan = $('#edit-kegiatan').val("");
                        indikator = $('#edit-indikator').val("");
                        target = $('#edit-target').val("");
                        sasaran = $('#edit-sasaran').val("");
                    }
                    var tahun_awal = $('#tahun_awal').val();
                    var opd = $('#opd').children("option:selected").val();
                    var bidang = $('#bidang').children("option:selected").val();
                    var subbidang = $('#subbidang').children("option:selected").val();

                    showData(tahun_awal, opd, bidang, subbidang);
                }
            });
        });

        // delete data
        $("#tabeldata").on('click', '.btn-delete', function() {
            $('#tabeldata').empty();
            
            var id = $(this).data('id');
            if (confirm("Yakin akan menghapus?")) {
                $.ajax({
                    url: 'hapusPk4',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(response) {
                        var tahun_awal = $('#tahun_awal').val();
                        var opd = $('#opd').children("option:selected").val();
                        var bidang = $('#bidang').children("option:selected").val();
                        var subbidang = $('#subbidang').children("option:selected").val();

                        showData(tahun_awal, opd, bidang, subbidang);
                    }
                });
            } else {
                var tahun_awal = $('#tahun_awal').val();
                var opd = $('#opd').children("option:selected").val();
                var bidang = $('#bidang').children("option:selected").val();
                var subbidang = $('#subbidang').children("option:selected").val();

                showData(tahun_awal, opd, bidang, subbidang);
            }            
        });
    });
</script>

@endsection