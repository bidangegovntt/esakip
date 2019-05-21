@extends('admin.layouts.app')

@section('title') List Rencana Strategi @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a
                    href="{{ route('rencana-strategi.create') }}"
                    class="btn btn-primary"
                    >Create Rencana Strategi</a>
            </div>
        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>No</b></th>
                    <th><b>OPD</b></th>
                    <th><b>Tahun</b></th>
                    <th><b>Tujuan</b></th>
                    <th><b>Sasaran</b></th>
                    <th><b>Indikato Kinerja</b></th>
                    <th><b>Awal</b></th>
                    <th><b>Perubahan</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($rencana_strategis as $key => $rencana_strategi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $rencana_strategi->data_opd->nama }}</td>
                    <td>{{ $rencana_strategi->tahun }}</td>
                    <td>{{ $rencana_strategi->tujuan }}</td>
                    <td>{{ $rencana_strategi->sasaran }}</td>
                    <td>{{ $rencana_strategi->indikator_kinerja }}</td>
                    <td>{{ $rencana_strategi->awal }}</td>
                    <td>{{ $rencana_strategi->perubahan }}</td>
                    <td class="text-center">
                        <a
                            href="{{ route('rencana-strategi.edit', ['id' => $rencana_strategi->id]) }}"
                            class="btn btn-info btn-sm"
                            > Edit </a>
                        <form
                            onsubmit="return confirm('Delete this data permanently?')"
                            class="d-inline"
                            action="{{ route('rencana-strategi.destroy', ['id' => $rencana_strategi->id ]) }}"
                            method="POST">
                            @csrf
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE">
                            <input
                                type="submit"
                                value="Delete"
                                class="btn btn-danger btn-sm">
                        </form>
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
@endsection