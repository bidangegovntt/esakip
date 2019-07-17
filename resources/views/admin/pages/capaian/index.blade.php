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
                <div class="box-header header-tahun-hide">
                    <div class="form-group form-horizontal">
                        <label for="tahun_awal" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="tahun_awal" name="tahun_awal" value="@if( ! empty($data['tahun_awal'])){{$data['tahun_awal']}}@endif">
                        </div>
                        <label for="tahun_akhir" class="col-sm-1 control-label">Sampai</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="tahun_akhir" name="tahun_akhir" value="@if( ! empty($data['tahun_akhir'])){{$data['tahun_akhir']}}@endif">
                        </div>
                    </div>
                </div>
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
                    {{-- <button
                        class="btn btn-info btn-cetak"
                        name="btn_cetak"
                        value="btn_cetak"
                        ><i class="fa fa-file-pdf-o"></i> Cetak</button> --}}
                    <button
                        class="btn btn-info btn-tambah"
                        name="btn_tambah"
                        value="btn_tambah"
                        ><i class="fa fa-plus"></i> Tambah</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <button id="showAfterPrint">Load</button>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Sasaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">IKU</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Satuan</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Target</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Rencana Anggaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Realisasi Anggaran</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Capaian</th>
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
                            <input type="text" class="form-control" id="input-sasaran" placeholder="Sasaran">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="iku" class="col-sm-3 control-label">IKU</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-iku" placeholder="iku">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="satuan" class="col-sm-3 control-label">Satuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-satuan" placeholder="Satuan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target" class="col-sm-3 control-label">Target</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-target" placeholder="Target">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="realisasi" class="col-sm-3 control-label">realisasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-realisasi" placeholder="realisasi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rencana-anggaran" class="col-sm-3 control-label">rencana anggaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-rencana-anggaran" placeholder="rencana-anggaran">
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
                        <label for="program" class="col-sm-3 control-label">Program</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-program" placeholder="Program">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="program-anggaran" class="col-sm-3 control-label">Program Anggaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-anggaran-program" placeholder="Program Anggaran">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="indikator-program" class="col-sm-3 control-label">Indikator Program</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-indikator-program" placeholder="Indikator Program">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target-program" class="col-sm-3 control-label">Target Program</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-target-program" placeholder="Target Program">
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
            var tahun_awal = $('#tahun_awal').val();
            var opd = $('#opd').children("option:selected").val();

            showData(tahun, tahun_awal, opd);
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

        function showData(data_tahun, data_tahun_awal, data_opd) {
            var tahun_awal = data_tahun_awal;
            var tahun = data_tahun;
            var opd = data_opd;

            $.ajax({
                url: 'cariCapaian',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun_awal: tahun_awal,
                    tahun: tahun,
                    opd: opd
                },
                success: function(response) {
                    // console.log(response);
                    $.each(response.data, function(i, value){
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.sasaran + "</td>";
                            tr += "<td>" + value.iku + "</td>";
                            tr += "<td>" + value.satuan + "</td>";
                            tr += "<td>" + value.target + " %</td>";
                            tr += "<td>" + value.realisasi + " %</td>";
                            tr += "<td>" + value.rencana_anggaran + "</td>";
                            tr += "<td>" + value.realisasi_anggaran + "</td>";
                            tr += "<td>" + value.capaian + " %</td>";
                            tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                        "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                        "</div>" +
                                    "</td>";
                            // tr +=   "<td>" + value.data_indikator_kinerja.target_kinerja + "<br><br>" +
                            //             "<button class=\"btn btn-success btn-indikator\" style=\"padding: 3px 8px 3px 8px;\" data-id=\"" + value.id + "\"><i class=\"fa fa-plus\"></i></button>" +
                            //         "</td>";

                        // var indikator = '';
                        
                        // $.each(value.data_indikator_kinerja.data_indikator, function(i, value_indikator) {
                        //     // if(indikator == value_indikator.indikator_kinerja_id) {
                        //     //     tr += "<td></td>";
                        //     // } else {
                        //     //     tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                        //     // }                          
                        //     // tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                        //     tr += "<td>" + value_indikator.program + "</td>";
                        //     tr += "<td>" + value_indikator.anggaran_program + "</td>";
                        //     tr += "<td>" + value_indikator.indikator_program + "</td>";
                        //     tr += "<td>" + value_indikator.target_program + "</td>";
                            
                        //     var isLastElement = i == value.data_indikator_kinerja.data_indikator.length -1;

                        //     if (isLastElement) {
                        //         tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                        //                     // "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                        //                     //     "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                        //                     // "</div>" +
                        //                     "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                        //                         "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                        //                     "</div>" +
                        //                 "</td>";
                        //         tr +=   "</tr>";
                        //         tr +=   "<tr id=\"trLast\">" +
                        //                     "<td></td>" +
                        //                     "<td></td>" +
                        //                     "<td></td>" +
                        //                     "<td colspan=\"6\"></td>" +
                        //                 "</tr>";
                        //     } else {
                        //         tr +=   "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                        //                     // "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                        //                     //     "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                        //                     // "</div>" +
                        //                     "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                        //                         "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value_indikator.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                        //                     "</div>" +
                        //                 "</td>";
                        //         tr +=   "</tr>" +
                        //                     "<td></td>" +
                        //                     "<td></td>" +
                        //                     "<td></td>" +
                        //                     "<td></td>";
                        //     }

                            // indikator = value_indikator.indikator_kinerja_id;
                        // });

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }

        // modal create show
        $('#modalCreate').on('show.bs.modal', function() {

            $('#tabeldata').empty();

            var tahun = $('#tahun').val();
            var tahun_awal = $('#tahun_awal').val();
            var tahun_akhir = $('#tahun_akhir').val();
            var opd_text = $('#opd').children("option:selected").text();
            var opd_id = $('#opd').children("option:selected").val();

            $('#input-tahun').val(tahun);
            $('#input-tahun-awal').val(tahun_awal);
            $('#input-tahun-akhir').val(tahun_akhir);
            $('#input-opd-text').val(opd_text);
            $('#input-opd-id').val(opd_id);
        });

        // simpan data renstra
        $('.form-create').on('submit', function(e) {
            e.preventDefault();
            var tahun = $('#input-tahun').val();
            var tahun_awal = $('#input-tahun-awal').val();
            var tahun_akhir = $('#input-tahun-akhir').val();
            var opd_id = $('#input-opd-id').val();
            var sasaran = $('#input-sasaran').val();
            var iku = $('#input-iku').val();
            var satuan = $('#input-satuan').val();
            var target = $('#input-target').val();
            var realisasi = $('#input-realisasi').val();
            var rencana_anggaran = $('#input-rencana-anggaran').val();
            
            $.ajax({
                url: 'capaian',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun: tahun,
                    tahun_awal: tahun_awal,
                    tahun_akhir: tahun_akhir,
                    opd_id: opd_id,
                    sasaran: sasaran,
                    iku: iku,
                    satuan: satuan,
                    target: target,
                    realisasi: realisasi,
                    rencana_anggaran: rencana_anggaran
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success) {
                        $('#modalCreate').modal('hide');
                        sasaran = $('#input-sasaran').val("");
                        iku = $('#input-iku').val();
                        target = $('#input-target').val("");
                        capaian = $('#input-capaian').val("");
                    }
                    var tahun = $('#tahun').val();
                    var tahun_awal = $('#tahun_awal').val();
                    var opd = $('#opd').children("option:selected").val();

                    showData(tahun, tahun_awal, opd);
                }
            });
        });

        // tambah indikator
        // $('#tabeldata').on('click', '.btn-indikator', function() {
        //     $('#tabeldata').empty();

        //     var id = $(this).data('id');

        //     $.ajax({
        //         url: 'tambahIndikatorPpk',
        //         type: 'GET',
        //         data: {
        //             _token: CSRF_TOKEN,
        //             id:id
        //         },
        //         success: function(response) {
        //             // console.log(response.data);
        //             $('#modalIndikator').modal();
        //             $('#modalIndikator #edit-indikator-kinerja').val(response.data.deskripsi);
        //             $('#modalIndikator #edit-indikator-kinerja-id').val(response.data.id);
        //         }
        //     });
        //     var tahun = $('#tahun').val();
        //     var tahun_awal = $('#tahun_awal').val();
        //     var opd = $('#opd').children("option:selected").val();

        //     showData(tahun, tahun_awal, opd);
        // });

        // // simpan data indikator
        // $('.form-indikator').on('submit', function(e) {
        //     e.preventDefault();
        //     $('#tabeldata').empty();

        //     var id = $('#modalIndikator #edit-id').val();
        //     var indikator_kinerja_id = $('#modalIndikator #edit-indikator-kinerja-id').val();
        //     var program = $('#modalIndikator #edit-program').val();
        //     var anggaran_program = $('#modalIndikator #edit-anggaran-program').val();
        //     var indikator_program = $('#modalIndikator #edit-indikator-program').val();
        //     var target_program = $('#modalIndikator #edit-target-program').val();
            
        //     $.ajax({
        //         url: 'masukkanIndikatorPpk',
        //         type: 'POST',
        //         data: {
        //             _token: CSRF_TOKEN,
        //             indikator_kinerja_id: indikator_kinerja_id,
        //             program: program,
        //             anggaran_program: anggaran_program,
        //             indikator_program: indikator_program,
        //             target_program: target_program
        //         },
        //         success: function(response) {
        //             // console.log(response);
        //             if(response.success) {
        //                 $('#modalIndikator').modal('hide');
        //                 program = $('#modalIndikator #edit-program').val("");
        //                 anggaran_program = $('#modalIndikator #edit-anggaran-program').val("");
        //                 indikator_program = $('#modalIndikator #edit-indikator-program').val("");
        //                 target_program = $('#modalIndikator #edit-target-program').val("");
        //             }
        //             var tahun = $('#tahun').val();
        //             var tahun_awal = $('#tahun_awal').val();
        //             var opd = $('#opd').children("option:selected").val();

        //             showData(tahun, tahun_awal, opd);
        //         }
        //     });
        // });

        // delete data
        $("#tabeldata").on('click', '.btn-delete', function() {
            $('#tabeldata').empty();
            
            var id = $(this).data('id');
            if (confirm("Yakin akan menghapus?")) {
                $.ajax({
                    url: 'hapusCapaian',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(response) {
                        var tahun = $('#tahun').val();
                        var tahun_awal = $('#tahun_awal').val();
                        var opd = $('#opd').children("option:selected").val();

                        showData(tahun, tahun_awal, opd);
                    }
                });
            } else {
                var tahun = $('#tahun').val();
                var tahun_awal = $('#tahun_awal').val();
                var opd = $('#opd').children("option:selected").val();

                showData(tahun, tahun_awal, opd);
            }            
        });
    });
</script>

@endsection