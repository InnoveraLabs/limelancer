@extends('layouts.admin-master')

@section('title', 'Limelancer | Users Manage')

@section('content')

    <div id="content-wrapper">
        <div id="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row breadcrumbs">
                        <div class="col-lg-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1><i class="menu-icon fa fa-users"></i> Add New User</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="active"><a href="{{ route('admin.users.index') }}" class="btn btn-success">
                                                <i class="fa fa-step-backward text-white"></i>
                                                <span class="text-white">Back To list</span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card row">

                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                {{--Name section--}}
                                <div class="form-group row">
                                    <label for="" class="col-md-3 control-label">Name :</label>
                                    <div class="col-md-6">

                                        <input type="text"
                                               name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               autofocus
                                               value="{{ old('name') }}"
                                               placeholder="Name"
                                        >

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--user name section--}}
                                <div class="form-group row">
                                    <label for="" class="col-md-3 control-label">Username :</label>
                                    <div class="col-md-6">

                                        <input type="text"
                                               name="username"
                                               class="form-control @error('name') is-invalid @enderror"
                                               autofocus
                                               value="{{ old('username') }}"
                                               placeholder="Username"
                                        >

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--            Email section                    --}}
                                <div class="form-group row">
                                    <label for="" class="col-md-3 control-label">E-mail Address :</label>
                                    <div class="col-md-6">

                                        <input type="email"
                                               name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               autofocus
                                               value="{{ old('email') }}"
                                               placeholder="E-mail Address"
                                        >

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--    Password section    --}}
                                <div class="form-group row">
                                    <label for="" class="col-md-3 control-label">Password :</label>
                                    <div class="col-md-6">

                                        <input type="password"
                                               name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               autofocus
                                               value=""
                                               placeholder="Password"
                                        >

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--    Password Confirm section    --}}
                                <div class="form-group row">
                                    <label for="" class="col-md-3 control-label">Password Confirmation :</label>
                                    <div class="col-md-6">

                                        <input type="password"
                                               name="password_confirmation"
                                               id="password-confirmed"
                                               class="form-control"
                                               autofocus
                                               value=""
                                               placeholder="Password Confirmation"
                                        >
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="confirmed" class="col-md-3 control-label">Confirmed</label>
                                    <div class="col-md-6">
                                        <label class="switch switch-label switch-pill switch-primary">
                                            <input type="checkbox" name="confirmed" id="confirmed" value="1" checked="checked" class="switch-input">
                                            <span data-checked="yes" data-unchecked="no" class="switch-slider">
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-3 control-label">Assign role</label>
                                    <div class="col-md-6">
                                        <select name="role_id" id="role" class="form-control">
                                            <option value="">Select Role</option>

                                            @foreach($roles as $key => $role)
                                                <option value="{{ $key }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
