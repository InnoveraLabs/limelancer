@extends('layouts.admin-master')

@section('title', 'Limelancer | Roles Manage')

@section('content')

    <div id="content-wrapper">
        <div id="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">

                    <div class="row breadcrumbs">
                        <div class="col-lg-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1><i class="menu-icon fa fa-users"></i> All Roles </h1>
                                </div>
                            </div>
                        </div>

                        @can('admin.roles.create')
                            <div class="col-sm-8">
                                <div class="page-header float-right">
                                    <div class="page-title">
                                        <ol class="breadcrumb text-right">
                                            <li class="active"><a href="{{ route('admin.roles.create') }}" class="btn btn-success">
                                                    <i class="fa fa-plus-circle text-white"></i>
                                                    <span class="text-white">Add Role</span>
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>



                    <div class="card row">
                        <div class="card-body">
                            <h4 class="mb-4"> Roles Summary <small>All Roles ({{ $totalRole ? $totalRole : 0 }})</small> </h4>

                            <table id="rolesTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#SR</th>
                                    <th>Role Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @if($role->permissions->count())
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge badge-pill badge-info">{{ $permission->name }}</span>

                                                @endforeach
                                            @else
                                                <span class="badge badge-pill badge-secondary">No Permissions found</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info btn-sm d-inline"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-sm d-inline"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#rolesTable').DataTable({

                "columnDefs": [
                    { "width": "4%", "targets": 0 },
                    { "width": "15%", "targets": 1 },
                    { "width": "45%", "targets": 2 },
                    { "width": "15%", "className": "text-center", "targets": 3 },
                ]
            });
        } );
    </script>
@endsection
