@extends('admin.layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Target
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Target</a></li>
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
                    <a href="#" class="btn btn-primary btn-tambah"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                <!-- /.box-header -->
                <hr>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">No</th>
                                <th style="color: #ffffff; text-align: center; font-size: 12px;">Deskripsi</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Target</h5>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input-nama">
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

<!-- Modal Create -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal form-edit">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Target</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="edit-id">
                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-nama" placeholder="nama">
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

        $('.btn-tambah').on('click', function() {
            $('#modalCreate').modal();
        });

        showData();

        function showData() {
            $('#tabeldata').empty();

            $.ajax({
                url: 'tampilTarget',
                type: 'GET',
                success: function(response) {
                    // console.log(response);
                    $.each(response.data, function(i, value){
                        // console.log(value);
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.nama + "</td>";
                            tr += "<td style=\"width: 90px;\" id=\"tdAction\">" + 
                                        "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            "<button class=\"btn btn-info btn-sm btn-block btn-edit\" data-id=\"" + value.id + "\"><i class=\"fa fa-edit\"></i></button>" +
                                        "</div>" +
                                        "<div class=\"col-xs-6\" style=\"padding-right: 5px; padding-left: 0;\">" +
                                            "<button class=\"btn btn-danger btn-sm btn-block btn-delete\" data-id=\"" + value.id + "\"><i class=\"fa fa-trash\"></i></button>" +
                                        "</div>" +
                                    "</td>";
                            tr +=   "</tr>";

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }

        // modal create show
        $('#modalCreate').on('show.bs.modal');

        // simpan data renstra
        $('.form-create').on('submit', function(e) {
            e.preventDefault();
            var nama = $('#input-nama').val();
            
            $.ajax({
                url: 'target',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    nama: nama
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success) {
                        $('#modalCreate').modal('hide');                        
                        nama = $('#input-nama').val("");
                    }

                    showData();
                }
            });
        });

        // Edit Data
        $("#tabeldata").on('click', '.btn-edit', function() {

            var id = $(this).data('id');
            
            $.ajax({
                    url: '{{ URL::route('target.edit', 'id') }}',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                        },
                    success: function(response) {
                        // console.log(response.renstra);
                        $('#modalEdit').modal();
                        $('#edit-id').val(response.data.id);
                        $('#edit-nama').val(response.data.nama);
                    }
            });
        });

        // update data
        $('.form-edit').on('submit', function(e) {
            e.preventDefault();

            var id = $('#edit-id').val();
            var nama = $('#edit-nama').val();

            $.ajax({
                url: '{{ URL::route('target.update', 'id') }}',
                type: 'PUT',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    nama: nama
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success) {
                        $('#modalEdit').modal('hide');
                        nama = $('#input-nama').val("");
                    }

                    showData();
                }
            });
        });

        

        // delete data
        $("#tabeldata").on('click', '.btn-delete', function() {
            $('#tabeldata').empty();
            
            var id = $(this).data('id');
            if (confirm("Yakin akan menghapus?")) {
                $.ajax({
                    url: 'hapusTarget',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(response) {
                        showData();
                    }
                });
            } else {                
                showData();
            }            
        });
    });
</script>

@endsection