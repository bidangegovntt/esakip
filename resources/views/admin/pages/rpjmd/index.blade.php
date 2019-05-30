@extends('admin.layouts.app')

@section('title') List RPJMD @endsection

@section('style')
    
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage RPJMD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RPJMD</a></li>
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
                <div class="box-header">
                    <div class="form-group form-horizontal">
                        <label for="tahun" class="col-sm-1 control-label">Tahun</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="tahun" placeholder="Mulai">
                        </div>
                        <label for="sampai" class="col-sm-1 control-label">Sampai</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="sampai" placeholder="Selesai" disabled>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <hr>
                <div class="box-header">
                    <a
                        href="#"
                        class="btn btn-info btn-cari"
                        ><i class="fa fa-search"></i> Cari</a>
                    <a
                        href="{{ route('bidang.create') }}"
                        class="btn btn-info"
                        ><i class="fa fa-file-pdf-o"></i> Cetak</a>
                    <a
                        href="#"
                        class="btn btn-info btn-tambah"
                        ><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;">
                            <tr>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Tujuan</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Sasaran</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Indikator Kinerja</th>
                                <th style="color: #ffffff; text-align: center; border-bottom: solid #fff 0px; border-right: solid #fff 0px;" colspan="5">Target</th>
                                <th style="color: #ffffff; text-align: center; border-left: solid #fff 1px;" rowspan="2">Action</th>
                            </tr>
                            <tr id="target">
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
                                <th style="color: #ffffff; text-align: center;">Tahun</th>
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


<!-- DataTables -->
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
    
    $(document).ready(function() {
        $('#tahun').keyup(function() {
            $('#sampai').val(parseInt($('#tahun').val()) + 4);
        });

        $('.btn-tambah').click(function(e) {
            if ( $('#tahun').val() == '' ) {
                alert('kolom tahun belum diisi');
            }
            else {
                e.preventDefault();
                window.location.href = 'rpjmd/create/?tahun=' + $('#tahun').val() + '&sampai=' + $('#sampai').val();
            }
        });

        $('.btn-cari').click(function() {
            $('#target').empty();
            if ( $('#tahun').val() == '' ) {
                alert('kolom tahun belum diisi');
            }
            else {
                for(i = $('#tahun').val(); i <= $('#sampai').val(); i++) {
                    $('#target').append(
                        "<th style=\"color: #ffffff; text-align: center;\">" + i + "</th>"
                    );
                }

                $.get("{{ URL::to('input/rpjmd/show') }}", function(data) {
                    // console.log(data);
                    $('#tabeldata').empty().html(data);

                    
                });
            }
        });
    });
</script>
    
@endsection