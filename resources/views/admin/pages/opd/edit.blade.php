@extends('admin.layouts.app')

@section('title') Edit OPD @endsection

@section('content')

<section class="content-header">
    <h1>
        Edit Data OPD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">OPD</a></li>
        <li class="active">Edit</li>
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
                    enctype="multipart/form-data"
                    class="bg-white shadow-sm p-3"
                    action="{{ route('opd.update', ['id' => $opd->id]) }}"
                    method="POST">
                    @method('PUT')
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama</label><br>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('nama') ? "is-invalid" : "" }}"
                                value="{{ old('nama') ? old('nama') : $opd->nama }}"
                                name="nama"
                                placeholder="Nama"/>
                            <div class="invalid-feedback">
                                {{ $errors->first('nama') }}
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