@extends('layouts.admin-master')

@section('title', 'Limelancer | Roles Manage')
@section('content')

    <div id="content-wrapper">
        <div id="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1"><!--- col-lg-10 Starts --->

                    <div class="row breadcrumbs">
                        <div class="col-lg-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1><i class="menu-icon fa fa-users"></i> {{ isset($role) ? 'Update' : 'Add New' }} Role </h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="active"><a href="{{ route('admin.roles.index') }}" class="btn btn-success">
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
                        <form action="{{ isset($role) ?
                                        route('admin.roles.update', $role->id):
                                        route('admin.roles.store') }}"
                              method="POST">
                            @csrf
                            @if(isset($role))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group row"><!--- form-group row Starts --->

                                    <label class="col-md-3 control-label"> Role Name : </label>

                                    <div class="col-md-6">

                                        <input type="text"
                                               name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               autofocus
                                               value="{{ $role->name ?? '' }}"
                                        >

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                </div>

                                <div class="text-center mb-4">
                                    <strong>Manage Permissions for role</strong>

                                    @error('permissions')
                                    <p class="p-2">
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="select-all"
                                        >
                                        <label for="select-all"
                                               class="custom-control-label">Select All</label>

                                    </div>

                                </div>

                                @forelse($modules->chunk(2) as $key => $chunks)
                                    <div class="form-row">
                                        @foreach($chunks as $key => $module)
                                            <div class="col-md-6">
                                                <h5 class="module-title">Module : <strong>{{ $module->name }}</strong></h5>
                                                @foreach($module->permissions as $key => $permission)
                                                    <div class="mb-3 ml-4">
                                                        <div class="custom-control custom-checkbox mb-2">
                                                            <input type="checkbox"
                                                                   class="custom-control-input"
                                                                   id="permission-{{$permission->id}}"
                                                                   name="permissions[]"
                                                                   value="{{ $permission->id }}"
                                                            @isset($role)
                                                                @foreach($role->permissions as $epermission)
                                                                    {{ $permission->id == $epermission->id ? 'checked' : '' }}
                                                                    @endforeach
                                                                @endisset
                                                            >
                                                            <label for="permission-{{$permission->id}}"
                                                                   class="custom-control-label">{{ $permission->name }}</label>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @empty
                                    <div class="row">
                                        <div class="col text-center">
                                            <strong>Module Not found</strong>
                                        </div>
                                    </div>
                                @endforelse

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-plus-circle"></i>
                                            {{ isset($role) ? 'Update' : 'Create' }}
                                        </button>
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

@section('scripts')
    <script>
        $('#select-all').click(function (e){
            if (this.checked){
                $(':checkbox').each(function () {
                    this.checked = true;

                })
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;

                })
            }
        })

    </script>
@endsection
