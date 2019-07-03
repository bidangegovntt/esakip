@extends('admin.layouts.app')

@section('title') List Berita @endsection

@section('content')

<section class="content-header">
    <h1>
        Berita
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12"> 
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="box">
                {{-- <form
                    action="{{ route('berita.index') }}"
                    >
                    <div class="input-group">
                        <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
                        <div class="input-group-append">
                            <input type="submit" value="Filter" class="btn btn-primary">
                        </div>
                    </div>
                </form> --}}
                <div class="box-header header-button-hide">
                    <a
                        href="{{ route('berita.create') }}"
                        class="btn btn-primary"
                        >Create berita</a>
                </div>

                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <div class="box-body">
                    <table class="table table-bordered table-stripped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center;"><b>No</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Judul</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Deskripsi</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Link</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Gambar</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beritas as $key => $berita)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }}</td>
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
                                        onsubmit="return confirm('Delete this data permanently?')"
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
        </div>
    </div>
</div>

@endsection