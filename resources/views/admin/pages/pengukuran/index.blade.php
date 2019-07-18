@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pengukuran
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengukuran</a></li>
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
                <div class="box-header header-opd-hide">
                    <div class="form-group form-horizontal">
                        <label for="opd" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="tahun" name="tahun">
                                <option value="">--Pilih Tahun--</option>
                                @for ($i = $tahun_awal; $i < $tahun_akhir; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                                {{-- @foreach ($tahuns as $tahun)
                                    <option value="{{ $tahun->id }}" @if( ! empty($data['tahun']) && $data['tahun'] == $tahun->id) selected @endif>{{ $tahun->nama }}</option>
                                @endforeach --}}
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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Tahun: <span id="showTahun"></span></p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Nama OPD</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Capaian Kinerja <span id="showTahunHead"></span></th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Jumlah Indikator</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Tidak Tercapai</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Kurang Tercapai</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Tercapai</th>
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

        $('.btn-cari').on('click', function(e) {
            e.preventDefault();
            $('#tabeldata').empty();
            $('#showTahun').empty();
            $('#showTahunHead').empty();

            $('#showTahun').append($('#tahun').val());
            $('#showTahunHead').append($('#tahun').val());

            var tahun = $('#tahun').val();

            showData(tahun);
        });

        function showData(data_tahun) {
            var tahun = data_tahun;

            $.ajax({
                url: 'cariPengukuran',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tahun: tahun
                },
                success: function(response) {
                    console.log(response);
                    var opd = '';
                    var hitung=0;
                    var total=0;
                    $.each(response.data, function(i, value){
                        var tr = "<tr></tr>";
                            if(opd == value.opd_id) {
                                tr += "<td></td>";
                            } else {
                                tr += "<td>" + value.data_opd.nama + "</td>";
                            }  
                            total=total+parseInt(value.jumlah_indikator);

                            tr += "<td>" + value.triwulan + "</td>";
                            tr += "<td>" + value.jumlah_indikator + "</td>";
                            tr += "<td>" + value.tidak_tercapai + "</td>";
                            tr += "<td>" + value.kurang_tercapai + "</td>";
                            tr += "<td>" + value.tercapai + "</td>";

                            if(value.opd_id && value.triwulan == 'Triwulan 4') {
                                tr +=   "<tr id=\"trLast\">" +
                                            "<td colspan=\"6\" style=\"text-align: center;\"><a href={{ url('input/pengukuran/detail') }}/" + value.opd_id +"/" + value.tahun + " class=\"btn btn-success btn-indikator\" style=\"padding: 3px 8px 3px 8px;\" data-id=\"" + value.opd_id + "\">Detail</a></td>" +
                                        "</tr>";
                            }

                            opd = value.opd_id;
                            hitung++;

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }
    });
</script>

@endsection