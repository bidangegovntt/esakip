@extends('admin.layouts.app')

@section('title') List Gallery @endsection

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
                <div class="box-header header-button-hide">
                    <a
                    href="{{ route('gallery.create') }}"
                    class="btn btn-primary"
                    >Create Gallery</a>
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
                                <th style="color: #ffffff; text-align: center;"><b>Title</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Keterangan</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Gambar</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $key => $gallery)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $gallery->title }}</td>
                                <td>{{ $gallery->keterangan }}</td>
                                <td>
                                    @if($gallery->gambar)
                                        <img src="{{ asset('img/gallery/' . $gallery->gambar) }}" width="96px"/>
                                    @endif
                                </td>
                                <td>
                                    <a
                                        href="{{ route('gallery.edit', ['id' => $gallery->id]) }}"
                                        class="btn btn-info btn-sm"
                                        > Edit </a>
                                    <form
                                        onsubmit="return confirm('Delete this data permanently?')"
                                        class="d-inline"
                                        action="{{ route('gallery.destroy', ['id' => $gallery->id ]) }}"
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