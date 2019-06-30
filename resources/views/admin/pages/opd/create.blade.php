@extends('admin.layouts.app')

@section('title') Create OPD @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Data OPD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">OPD</li>
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
                <form
                    class="bg-white shadow-sm p-3"
                    action="{{ route('opd.store') }}"
                    method="POST">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('nama') ? "is-invalid" : "" }}" 
                                value="{{ old('nama') }}"
                                name="nama"
                                placeholder="Nama"/>
                            <div class="invalid-feedback">
                                {{$errors->first('nama')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Save"/>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
        </div>
    </div>
</section>

@endsection