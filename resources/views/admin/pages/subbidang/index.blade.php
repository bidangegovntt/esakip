@extends('admin.layouts.app')

@section('title') List Subbidang @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Subbidang
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Subbidang</a></li>
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
                    <a
                    href="{{ route('subbidang.create') }}"
                    class="btn btn-info"
                    ><i class="fa fa-plus"></i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead style="background-color: #428bca;">
                            <tr>
                                <th style="color: #ffffff; text-align: center;"><b>No</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Nama Subbidang</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subbidangs as $key => $subbidang)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td>{{ $subbidang->nama }}</td>
                                <td style="width: 100px;">
                                    <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                                            <a
                                            href="{{ route('subbidang.edit', ['id' => $subbidang->id]) }}"
                                            class="btn btn-info btn-sm btn-block"
                                            > <i class="fa fa-edit"></i> </a>
                                    </div>
                                    <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                                        <form
                                            onsubmit="return confirm('Delete this data permanently?')"
                                            action="{{ route('subbidang.destroy', ['id' => $subbidang->id ]) }}"
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