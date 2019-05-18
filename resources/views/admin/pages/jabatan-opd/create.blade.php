@extends('admin.layouts.app')

@section('title') Create Jabatan OPD @endsection

@section('content')

<div class="col-md-8">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
    <form
        enctype="multipart/form-data"
        class="bg-white shadow-sm p-3"
        action="{{ route('jabatan-opd.store') }}"
        method="POST">
        @csrf
        <label>Nama Jabatan OPD</label><br>
        <input
            type="text"
            class="form-control {{$errors->first('nama') ? "is-invalid" : ""}}" 
            value="{{old('nama')}}"
            name="nama"
            placeholder="Nama"/>
        <div class="invalid-feedback">
            {{$errors->first('nama')}}
        </div>
        <br>
        <input
            type="submit"
            class="btn btn-primary"
            value="Save"/>
    </form>
</div>

@endsection