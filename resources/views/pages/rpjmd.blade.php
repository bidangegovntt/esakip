@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h5 class="section-heading text-uppercase">RPJMD</h5>
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
    <br><br>
    <div class="row">
        <div class="col-sm-8">
            <a
                href="#"
                class="btn btn-info btn-cari"
                ><i class="fa fa-search"></i> Cari</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: #428bca;" id="thead">
                    <tr>
                        <th style="color: #ffffff; text-align: center;" rowspan="2">No</th>
                        <th style="color: #ffffff; text-align: center;" rowspan="2">Tujuan</th>
                        <th style="color: #ffffff; text-align: center;" rowspan="2">Sasaran</th>
                        <th style="color: #ffffff; text-align: center;" rowspan="2">Indikator Kinerja</th>
                        <th style="color: #ffffff; text-align: center; border-bottom: solid #fff 0px; border-right: solid #fff 0px;" colspan="5">Target</th>
                    </tr>
                    <tr id="head-target">
                        
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

            var tahun_awal = $('#tahun_awal').val();
            var tahun_akhir = $('#tahun_akhir').val();

            showData(tahun_awal, tahun_akhir);
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
            $('#head-target').empty();
            $('#tahun_akhir').val(parseInt($('#tahun_awal').val()) + 4);
            var tahun = $('#tahun_awal').val();

            if(tahun == null) {
                tahun = 1;
            }
            var head_target = [];
            for(i = 0; i < 5; i++) {
                var th = parseInt(tahun) + parseInt(i);
                head_target +=   "<th style=\"color: #ffffff; text-align: center;\">" + th + "</th>";
            }
            $('#head-target').append(head_target);
        });

        $('.btn-tambah').on('click', function() {
            $('#modalCreate').modal();
        });

        $('.btn-secondary').on('click', function() {
            var tahun_awal = $('#tahun_awal').val();
            var tahun_akhir = $('#tahun_akhir').val();
            var opd = $('#opd').children("option:selected").val();

            showData(tahun_awal, tahun_akhir);
        });

        function showData(data_tahun_awal, data_tahun_akhir) {
            var tahun_awal = data_tahun_awal;
            var tahun_akhir = data_tahun_akhir;

            $.ajax({
                url: 'rpjmd/cari',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun_awal: tahun_awal,
                    tahun_akhir: tahun_akhir
                },
                success: function(response) {
                    // console.log(response);                    
                    $.each(response.data, function(i, value){
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.deskripsi + "</td>";

                        var sasaran = '';
                        
                        $.each(value.data_layout, function(i, value_layout) {
                            // console.log(value_layout.id); 
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
                                
                            } else {
                                for(a = 0; a < value_layout.data_target.length; a++) {
                                    var b = value_layout.data_target[a];
                                    tr += "<td>" + b.nilai + "</td>";
                                }
                                
                                tr +=   "</tr><td></td><td></td>";
                            }

                            sasaran = value_layout.sasaran_id;
                        });

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }
    });
</script>
@endsection