@extends('admin.layouts.app')

@section('title') Edit Rencana Strategi @endsection

@section('content')

<div class="col-md-8">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
    <form
        class="bg-white shadow-sm p-3"
        action="{{ route('rencana-strategi.update', ['id' => $rencana_strategi->id]) }}"
        method="POST">
        @method('PUT')
        @csrf

        <label>OPD</label><br>
        <select class="form-control {{ $errors->first('opd_id') ? "is-invalid" : "" }}" name="opd_id" id="opd_id">
            <option value="" selected>--Pilih OPD--</option>
            @foreach ($opds as $opd)
                <option {{ $opd->id == $rencana_strategi->opd_id ? 'selected' : '' }} value="{{ $opd->id }}">{{ $opd->nama }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            {{ $errors->first('opd_id') }}
        </div>
        <br>

        <label>Tahun</label><br>
        <input
            type="text"
            class="form-control {{ $errors->first('tahun') ? "is-invalid" : "" }}"
            value="{{ old('tahun') ? old('tahun') : $rencana_strategi->tahun }}"
            name="tahun"
            placeholder="Tahun"/>
        <div class="invalid-feedback">
            {{ $errors->first('tahun') }}
        </div>
        <br>

        <label>Tujuan</label><br>
        <textarea 
            name="tujuan" 
            id="tujuan" 
            class="form-control {{ $errors->first('tujuan') ? "is-invalid" : "" }} " 
            placeholder="Tujuan">{{ old('tujuan') ? old('tujuan') : $rencana_strategi->tujuan }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('tujuan') }}
            </div>
        <br>

        <label>Sasaran</label><br>
        <textarea 
            name="sasaran" 
            id="sasaran" 
            class="form-control {{ $errors->first('sasaran') ? "is-invalid" : "" }} " 
            placeholder="Sasaran">{{ old('sasaran') ? old('sasaran') : $rencana_strategi->sasaran }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('sasaran') }}
            </div>
        <br>

        <label>Indikator Kinerja</label><br>
        <textarea 
            name="indikator_kinerja" 
            id="indikator_kinerja" 
            class="form-control {{ $errors->first('indikator_kinerja') ? "is-invalid" : "" }} " 
            placeholder="Indikator Kinerja">{{ old('indikator_kinerja') ? old('indikator_kinerja') : $rencana_strategi->indikator_kinerja }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('indikator_kinerja') }}
            </div>
        <br>

        <label>Target Awal</label><br>
        <textarea 
            name="awal" 
            id="awal" 
            class="form-control {{ $errors->first('awal') ? "is-invalid" : "" }} " 
            placeholder="Target Awal">{{ old('awal') ? old('awal') : $rencana_strategi->awal }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('awal') }}
            </div>
        <br>

        <label>Perubahan</label><br>
        <textarea 
            name="perubahan" 
            id="perubahan" 
            class="form-control {{ $errors->first('perubahan') ? "is-invalid" : "" }} " 
            placeholder="Perubahan">{{ old('perubahan') ? old('perubahan') : $rencana_strategi->perubahan }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('perubahan') }}
            </div>
        <br>

        <input
            type="submit"
            class="btn btn-primary"
            value="Save"/>
    </form>
</div>

@endsection