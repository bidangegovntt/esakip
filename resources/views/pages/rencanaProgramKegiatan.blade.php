@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h5 class="section-heading text-uppercase">Rencana Program dan Kegiatan</h5>
            <h3 class="section-subheading text-muted"></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" class="form-control" id="tahun_awal" placeholder="Mulai">
            </div>
        </div>
        <div class="col-sm-4">
            <label>Sampai</label>
            <input type="text" class="form-control" id="tahun_akhir" placeholder="Selesai" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>Tahun</label>
            <input type="text" class="form-control" id="tahun" placeholder="tahun">
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
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Program</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Anggaran Program</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Indikator Program</th>
                        <th style="color: #ffffff; text-align: center; font-size: 12px;">Target Program</th>
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
            var tahun_awal = $('#tahun_awal').val();
            var opd = $('#opd').children("option:selected").val();

            showData(tahun, tahun_awal, opd);
        });

        $('#tahun_awal').keyup(function() {
            $('#tahun_akhir').val(parseInt($('#tahun_awal').val()) + 4);
        });

        function showData(data_tahun, data_tahun_awal, data_opd) {
            var tahun = data_tahun;
            var tahun_awal = data_tahun_awal;
            var opd = data_opd;

            $.ajax({
                url: 'rencana-program/cari',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun: tahun,
                    tahun_awal: tahun_awal,
                    opd: opd
                },
                success: function(response) {
                    // console.log(response.data);
                    $.each(response.data, function(i, value){
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.data_sasaran.deskripsi + "</td>";
                            tr += "<td>" + value.data_indikator_kinerja.deskripsi + "</td>";
                            tr +=   "<td>" + value.data_indikator_kinerja.target_kinerja + "</td>";

                        // var indikator = '';
                        
                        $.each(value.data_indikator_kinerja.data_indikator, function(i, value_indikator) {
                            // if(indikator == value_indikator.indikator_kinerja_id) {
                            //     tr += "<td></td>";
                            // } else {
                            //     tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                            // }                          
                            // tr += "<td>" + value_indikator.indikator_kinerja_id + "</td>";
                            tr += "<td>" + value_indikator.program + "</td>";
                            tr += "<td>" + value_indikator.anggaran_program + "</td>";
                            tr += "<td>" + value_indikator.indikator_program + "</td>";
                            tr += "<td>" + value_indikator.target_program + "</td>";
                            
                            var isLastElement = i == value.data_indikator_kinerja.data_indikator.length -1;

                            if (isLastElement) {
                                
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