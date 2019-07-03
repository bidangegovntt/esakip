@extends('admin.layouts.app')

@section('title') Create Berita @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Data Bidang
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">Bidang</li>
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
                    action="{{ route('berita.store') }}"
                    method="POST">
                    @csrf

                    <div class="box-body">
                        <label>Judul</label><br>
                        <input
                            type="text"
                            class="form-control {{$errors->first('judul') ? "is-invalid" : ""}}" 
                            value="{{old('judul')}}"
                            name="judul"
                            placeholder="Judul berita"/>
                        <div class="invalid-feedback">
                            {{$errors->first('judul')}}
                        </div>
                        <br>
                        <label>Deskripsi</label><br>
                        <textarea 
                            name="deskripsi" 
                            id="deskripsi" 
                            class="form-control {{$errors->first('deskripsi') ? "is-invalid" : ""}} " 
                            placeholder="Deskripsi berita">{{old('deskripsi')}}</textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('deskripsi')}}
                            </div>
                        <br>
                        <label>Link</label><br>
                        <input
                            type="text"
                            class="form-control {{$errors->first('link') ? "is-invalid" : ""}}" 
                            value="{{old('link')}}"
                            name="link"
                            placeholder="Link berita"/>
                        <div class="invalid-feedback">
                            {{$errors->first('link')}}
                        </div>
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