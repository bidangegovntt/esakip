@extends('admin.layouts.app')

@section('title') List Pejabat OPD @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Pejabat OPD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pejabat OPD</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12"> 
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <a
                    href="{{ route('pejabat-opd.create') }}"
                    class="btn btn-info"
                    ><i class="fa fa-plus"></i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-stripped">
                        <thead style="background-color: #428bca;">
                            <tr>
                                <th style="color: #ffffff; text-align: center;"><b>No</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Nama OPD</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Nama Pejabat</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Jabatan</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pejabatOpds as $key => $pejabatOpd)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td>{{ $pejabatOpd->data_opd->nama }}</td>
                                <td>{{ $pejabatOpd->nama }}</td>
                                <td>{{ $pejabatOpd->data_jabatan->nama }}</td>
                                <td style="width: 100px;">
                                    <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                                            <a
                                            href="{{ route('pejabat-opd.edit', ['id' => $pejabatOpd->id]) }}"
                                            class="btn btn-info btn-sm btn-block"
                                            > <i class="fa fa-edit"></i> </a>
                                    </div>
                                    <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                                        <form
                                            onsubmit="return confirm('Delete this data permanently?')"
                                            action="{{ route('pejabat-opd.destroy', ['id' => $pejabatOpd->id ]) }}"
                                            method="POST">
                                            @csrf
                                            <input
                                                type="hidden"
                                                name="_method"
                                                value="DELETE">
                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm btn-block">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    {{-- {{$books->appends(Request::all())->links()}} --}}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection