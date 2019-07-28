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
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

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
                    // console.log(response);
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
                            tr += "<td>" + value.capaian + "</td>";
                            tr +=   "</tr>";

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }
    });
</script>

@endsection