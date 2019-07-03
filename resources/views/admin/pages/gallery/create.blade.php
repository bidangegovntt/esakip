@extends('admin.layouts.app')

@section('title') Create Gallery @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Data Gallery
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">Gallery</li>
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
                    action="{{ route('gallery.store') }}"
                    method="POST">
                    @csrf

                    <div class="box-body">
                        <label>Title</label><br>
                        <input
                            type="text"
                            class="form-control {{$errors->first('title') ? "is-invalid" : ""}}" 
                            value="{{old('title')}}"
                            name="title"
                            placeholder="Title"/>
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                        </div>
                        <br>
                        <label>Keterangan</label><br>
                        <textarea 
                            name="keterangan" 
                            id="keterangan" 
                            class="form-control {{$errors->first('keterangan') ? "is-invalid" : ""}} " 
                            placeholder="Keterangan">{{old('keterangan')}}</textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('keterangan')}}
                            </div>
                        <br>
                        <br>
                        <label>Gambar</label>
                        <input
                            type="file"
                            class="form-control {{$errors->first('gambar') ? "is-invalid" : ""}}"
                            name="gambar"/>
                        <div class="invalid-feedback">
                            {{$errors->first('gambar')}}
                        </div>
                        <br>
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Save"/>
                    </div>
                </form>
        </div>
    </div>
</div>
</section>

@endsection