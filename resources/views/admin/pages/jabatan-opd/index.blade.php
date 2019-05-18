@extends('admin.layouts.app')

@section('title') List Jabatan OPD @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a
                    href="{{ route('jabatan-opd.create') }}"
                    class="btn btn-primary"
                    >Create Jabatan OPD</a>
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
                    <th><b>Nama Jabatan OPD</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($jabatanOpds as $key => $jabatanOpd)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $jabatanOpd->nama }}</td>
                    <td>
                        <a
                            href="{{ route('jabatan-opd.edit', ['id' => $jabatanOpd->id]) }}"
                            class="btn btn-info btn-sm"
                            > Edit </a>
                        <form
                            onsubmit="return confirm('Delete this data permanently?')"
                            class="d-inline"
                            action="{{ route('jabatan-opd.destroy', ['id' => $jabatanOpd->id ]) }}"
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