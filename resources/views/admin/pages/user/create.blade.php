@extends('admin.layouts.app')

@section('title') Create User @endsection

@section('content')

<div class="col-md-8">

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <form
        enctype="multipart/form-data"
        class="bg-white shadow-sm p-3"
        action="{{ route('users.store') }}"
        method="POST">
        @csrf

        <label>NIP</label><br>
        <input
            type="text"
            class="form-control {{ $errors->first('nip') ? "is-invalid" : "" }}" 
            value="{{ old('nip') }}"
            name="nip"
            placeholder="NIP"/>
        <div class="invalid-feedback">
            {{ $errors->first('nip') }}
        </div>
        <br>

        <label>Nama</label><br>
        <input
            type="text"
            class="form-control {{ $errors->first('name') ? "is-invalid" : "" }}" 
            value="{{old('name')}}"
            name="name"
            placeholder="Name"/>
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label>Nama OPD</label><br>
        <select class="form-control {{ $errors->first('opd_id') ? "is-invalid" : "" }}" name="opd_id" id="opd_id">
            <option value="" selected>--Pilih OPD--</option>
            @foreach ($opds as $opd)
                <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            {{ $errors->first('opd_id') }}
        </div>
        <br>

        <label>Jabatan</label><br>
        <select class="form-control {{ $errors->first('jabatan_id') ? "is-invalid" : "" }}" name="jabatan_id" id="jabatan_id">
            <option value="">--Pilih Jabatan--</option>
            @foreach ($jabatan_opds as $jabatan)
                <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            {{ $errors->first('jabatan_id') }}
        </div>
        <br>

        <label>Email</label><br>
        <input
            type="text"
            class="form-control {{ $errors->first('email') ? "is-invalid" : "" }}" 
            value="{{old('email')}}"
            name="email"
            placeholder="Email"/>
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
        <br>

        <label>Password</label><br>
        <input
            type="text"
            class="form-control {{ $errors->first('password') ? "is-invalid" : "" }}" 
            value="{{old('password')}}"
            name="password"
            placeholder="Password"/>
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        <br>

        <label>Roles</label><br>
        <select class="form-control" name="roles" id="roles">
            <option value="user">User</option>
            <option value="administrator">Administrator</option>
        </select>
        <br>

        <label>Status</label><br>
        <select class="form-control" name="status" id="status">
            <option value="ACTIVE">Active</option>
            <option value="INACTIVE">Inactive</option>
        </select>
        <br>
        
        <input
            type="submit"
            class="btn btn-primary"
            value="Save"/>
    </form>
</div>

@endsection