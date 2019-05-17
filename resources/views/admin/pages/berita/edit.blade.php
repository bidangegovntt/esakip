@extends('admin.layouts.app')

@section('title') Edit Berita @endsection

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
        action="{{ route('berita.update', ['id' => $berita->id]) }}"
        method="POST">
        @method('PUT')
        @csrf
        <label>Judul</label><br>
        <input
            type="text"
            class="form-control {{$errors->first('judul') ? "is-invalid" : ""}}"
            value="{{ old('judul') ? old('judul') : $berita->judul }}"
            name="judul"
            placeholder="Judul berita"/>
        <div class="invalid-feedback">
            {{ $errors->first('judul') }}
        </div>
        <br>
        <label>Deskripsi</label><br>
        <textarea 
            name="deskripsi" 
            id="deskripsi" 
            class="form-control {{ $errors->first('deskripsi') ? "is-invalid" : "" }} " 
            placeholder="Deskripsi berita">{{ old('deskripsi') ? old('deskripsi') : $berita->deskripsi }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('deskripsi') }}
            </div>
        <br>
        <label>Link</label><br>
        <input
            type="text"
            class="form-control {{$errors->first('link') ? "is-invalid" : ""}}" 
            value="{{ old('link') ? old('link') : $berita->link}}"
            name="link"
            placeholder="Link berita"/>
        <div class="invalid-feedback">
            {{$errors->first('link')}}
        </div>
        <br>
        @if($berita->gambar)
            <img src="{{asset('img/berita/' . $berita->gambar)}}" width="96px"/>
        @endif
        <br><br>
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
    </form>
</div>

@endsection