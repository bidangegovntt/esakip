@extends('admin.layouts.app')

@section('title') List User @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a
                    href="{{ route('users.create') }}"
                    class="btn btn-primary"
                    >Create User</a>
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
                    <th><b>NIP</b></th>
                    <th><b>Nama</b></th>
                    <th><b>OPD</b></th>
                    <th><b>Jabatan</b></th>
                    <th><b>Status</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->nip }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->data_opd->nama }}</td>
                    <td>{{ $user->data_jabatan_opd->nama }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                        <a
                            href="{{ route('users.edit', ['id' => $user->id]) }}"
                            class="btn btn-info btn-sm"
                            > Edit </a>
                        <form
                            onsubmit="return confirm('Delete this data permanently?')"
                            class="d-inline"
                            action="{{ route('users.destroy', ['id' => $user->id ]) }}"
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