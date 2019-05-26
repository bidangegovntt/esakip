@extends('admin.layouts.app')

@section('title') List User @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">users</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12"> 
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <a
                    href="{{ route('users.create') }}"
                    class="btn btn-info"
                    ><i class="fa fa-plus"></i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead style="background-color: #428bca;">
                            <tr>
                                <th style="color: #ffffff; text-align: center;"><b>No</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Username</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Password</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Level</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>OPD</b></th>
                                <th style="color: #ffffff; text-align: center;"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ str_limit($user->password, 10, '.....') }}</td>
                                <td>{{ $user->roles }}</td>
                                <td>{{ $user->data_opd->nama }}</td>
                                <td style="width: 150px;">
                                    <div class="col-xs-4" style="padding-right: 5px; padding-left: 0;">
                                        <a
                                            href="{{ route('users.edit', ['id' => $user->id]) }}"
                                            class="btn btn-info btn-sm btn-block"><i class="fa fa-edit"></i> </a>
                                    </div>
                                    <div class="col-xs-4" style="padding-right: 5px; padding-left: 0;">
                                        <form
                                            onsubmit="return confirm('Delete this data permanently?')"
                                            action="{{ route('users.destroy', ['id' => $user->id ]) }}"
                                            method="POST">
                                            @csrf
                                            <input
                                                type="hidden"
                                                name="_method"
                                                value="DELETE">
                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm btn-block">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>                                        
                                    </div>
                                    <div class="col-xs-4" style="padding-right: 5px; padding-left: 0;">
                                        <a
                                            href="{{ route('users.privilege', ['id' => $user->id]) }}"
                                            class="btn btn-success btn-sm btn-block"><i class="fa fa-lock"></i></a>
                                    </div>
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
</section>
@endsection