@extends('layouts.admin-master')
@section('title', 'Limelancer | Category Manage')

@section('content')
    <div id="content-wrapper">
        <div id="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1"><!--- col-lg-10 Starts --->
                    <div class="row breadcrumbs">
                        <div class="col-lg-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1><i class="menu-icon fa fa-bars"></i> {{ isset($role) ? 'Update' : 'Add' }} Category </h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="active"><a href="{{ route('admin.categories.index') }}" class="btn btn-success">
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
                        <div class="card-body">
                            <form action="{{ route('admin.categories.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 control-label"> Category Name : </label>

                                    <div class="col-md-6">

                                        <input type="text"
                                               name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               autofocus
                                        >

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                </div>

                               

                                <div class="form-group row">
                                    <label class="col-md-3 control-label"> Is Featured : </label>
                                    <div class="col-md-6">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               name="is_featured"
                                               value="1"
                                        >
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
