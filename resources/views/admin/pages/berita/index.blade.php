@extends('admin.layouts.app')

@section('title') List Berita @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <form
                    action="{{ route('berita.index') }}"
                    >
                    <div class="input-group">
                        <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
                        <div class="input-group-append">
                            <input type="submit" value="Filter" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr class="my-3">
        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a
                    href="{{ route('berita.create') }}"
                    class="btn btn-primary"
                    >Create book</a>
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
                    <th><b>Judul</b></th>
                    <th><b>Deskripsi</b></th>
                    <th><b>Link</b></th>
                    <th><b>Gambar</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $key => $berita)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $berita->judul }}</td>
                    <td>{{ $berita->deskripsi }}</td>
                    <td>{{ $berita->link }}</td>
                    <td>
                        @if($berita->gambar)
                            <img src="{{ asset('img/berita/' . $berita->gambar) }}" width="96px"/>
                        @endif
                    </td>
                    <td>
                        <a
                            href="{{ route('berita.edit', ['id' => $berita->id]) }}"
                            class="btn btn-info btn-sm"
                            > Edit </a>
                        <form
                            onsubmit="return confirm('Delete this user permanently?')"
                            class="d-inline"
                            action="{{ route('berita.destroy', ['id' => $berita->id ]) }}"
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