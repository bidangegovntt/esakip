@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h5 class="section-heading text-uppercase">LAKIP</h5>
            <h3 class="section-subheading text-muted"></h3>
        </div>
    </div>
    <form action="{{ url('/c/sakip/lakip/cari') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" class="form-control" name="tahun" value="@if( ! empty($data['tahun'])){{$data['tahun']}}@endif">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>OPD</label>
                <select class="form-control" name="opd">
                    <option value="">--Pilih OPD--</option>
                    @foreach ($opds as $opd)
                    <option value="{{ $opd->id }}" @if( ! empty($data['opd']) && $data['opd'] == $opd->id) selected @endif>{{ $opd->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-8">
                <button
                    type="submit"
                    class="btn btn-info btn-cari"
                    ><i class="fa fa-search"></i> Cari</a>
            </div>
        </div>
    </form>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: #428bca;" id="thead">
                    <tr>
                        <th style="color: #ffffff; text-align: center;">No</th>
                        <th style="color: #ffffff; text-align: center;">Tahun</th>
                        <th style="color: #ffffff; text-align: center;">OPD</th>
                        <th style="color: #ffffff; text-align: center;">LAKIP</th>
                    </tr>
                </thead>
                <tbody id="tabeldata">
                    @foreach ($lakips as $key => $lakip)
                    <tr>
                        <td style="text-align: center;">{{ $key + 1 }}</td>
                        <td>{{ $lakip->tahun }}</td>
                        <td>{{ $lakip->data_opd->nama }}</td>
                        <td style="text-align: center;"><a href="{{ asset('file/' . $lakip->file) }}" class="btn btn-success"><i class="fa fa-download"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection