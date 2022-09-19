@extends('layouts.admin-master')
@section('content')

    <div id="content-wrapper">
        <div id="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1"><!--- col-lg-10 Starts --->

                    <div class="row breadcrumbs">
                        <div class="col-lg-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1><i class="menu-icon fa fa-users"></i> All Users </h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="active"><a href="{{ route('admin.users.create') }}" class="btn btn-success">
                                                <i class="fa fa-plus-circle text-white"></i>
                                                <span class="text-white">Add User</span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card row">
                        <div class="card-body">
                            <h4 class="mb-4"> User Summary <small>All Users ({{ $users->count() ? $users->count() : 0 }})</small> </h4>

                            <div class="row">
                                <div class="text-center border-box col-md-3">

                                    <p> Top Rated Sellers </p>
                                    <h2>0</h2>

                                </div>
                                <div class="text-center border-box col-md-3">

                                    <p> Level Two Sellers </p>
                                    <h2>0</h2>

                                </div>


                                <div class="text-center border-box col-md-3">

                                    <p> Level One Sellers </p>
                                    <h2>0</h2>

                                </div>

                                <div class="text-center col-md-3">

                                    <p> New Users </p>
                                    <h2>{{ $latest }}</h2>

                                </div>
                            </div>

                            <table id="usersTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#SR</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>
                                                <div class="dropdown"><!--- dropdown Starts --->

                                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions</button>


                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fa fa-info-circle"></i> User's Details</a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fa fa-envelope"></i> Verify Seller Email</a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fa fa-sign-in"></i> Login As {{ $user->username }}</a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fa fa-money"></i> Change Seller Balance</a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fa fa-ban"></i> Block / Ban User</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
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
            $('#usersTable').DataTable({

                "columnDefs": [
                    { "width": "8%", "targets": 0 },
                    { "width": "15%", "targets": 1 },
                    { "width": "15%", "targets": 2 },
                    { "width": "25%", "targets": 3 },
                    { "width": "22%", "targets": 4 },
                    { "width": "15%", "className": "text-center", "targets": 5 },
                ]
            });
        } );
    </script>
@endsection
