@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h5 class="section-heading text-uppercase">Realisasi Kinerja</h5>
            <h3 class="section-subheading text-muted"></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" class="form-control" id="tahun" placeholder="Tahun">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>OPD</label>
            <select class="form-control" id="opd">
                <option value="">--Pilih OPD--</option>
                @foreach ($opds as $opd)
                    <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-8">
            <a
                href="#"
                class="btn btn-info btn-cari"
                ><i class="fa fa-search"></i> Cari</a>
            {{-- <a
                href="#"
                class="btn btn-info btn-cetak"
                ><i class="fa fa-file-pdf-o"></i> Cetak</a> --}}
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: #428bca;" id="thead">
                    <tr>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Sasaran</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Indikator Kinerja</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Target Kinerja</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Tw</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Target</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Keterangan</th>
                    </tr>
                </thead>
                <tbody id="tabeldata">

                </tbody>
            </table>
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
                url: 'realisasi-kinerja/cari',
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
                            tr +=   "<td>" + value.data_indikator_kinerja.target_kinerja + "</td>";

                        // var indikator = '';
                        
                        $.each(value.data_realisasi_kinerja, function(i, value_indikator) {
                            // if(indikator == value_indikator.indikator_kinerja_id) {
                            //     tr += "<td></td>";
                            // } else {
                            //     tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                            // }                          
                            // tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                            tr += "<td>" + value_indikator.tw + "</td>";
                            tr += "<td>" + value_indikator.target + "</td>";
                            tr += "<td>" + value_indikator.keterangan + "</td>";
                            
                            var isLastElement = i == value.data_realisasi_kinerja.length -1;

                            if (isLastElement) {
                                
                                tr +=   "</tr>";
                            } else {
                                
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
    });
</script>
@endsection