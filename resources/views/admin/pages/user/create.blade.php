@extends('admin.layouts.app')

@section('title') Create User @endsection

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
        action="{{ route('users.store') }}"
        method="POST">
        @csrf
        <label>Username</label><br>
        <input
            type="text"
            class="form-control {{$errors->first('username') ? "is-invalid" : ""}}" 
            value="{{old('username')}}"
            name="username"
            placeholder="Username"/>
        <div class="invalid-feedback">
            {{$errors->first('username')}}
        </div>
        <br>
        <label>Email</label><br>
        <input
            type="text"
            class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" 
            value="{{old('email')}}"
            name="email"
            placeholder="Email"/>
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
        <br>
        <label>Password</label><br>
        <input
            type="text"
            class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" 
            value="{{old('password')}}"
            name="password"
            placeholder="Password"/>
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
        <br>
        <label>Roles</label><br>
            <select class="form-control" name="categories[]" id="categories">
                <option>1</option>
                <option>2</option>
            </select>
        <br>
        <label>Status</label><br>
            <select class="form-control" name="categories[]" id="categories">
                <option>1</option>
                <option>2</option>
            </select>
        <br>
        <input
            type="submit"
            class="btn btn-primary"
            value="Save"/>
    </form>
</div>

@endsection