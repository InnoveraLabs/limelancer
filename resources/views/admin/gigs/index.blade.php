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
                                    <h1><i class="menu-icon fa fa-users"></i> All Gigs </h1>
                                </div>
                            </div>
                        </div>


                    </div>



                    <div class="card row">
                        <div class="card-body">
{{--                            <h4 class="mb-4"> Roles Summary <small>All Roles ({{ $totalRole ? $totalRole : 0 }})</small> </h4>--}}

                            <table id="rolesTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#SR</th>
                                    <th>Gig Image</th>
                                    <th>Gig Title</th>
                                    <th>Gig Seller</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $key => $service)
                                    <th>{{ $key+1 }}</th>
                                    <th>
                                        <img src="/storage/{{ $service->galleries->featured_image }}" alt="" width="90" height="80">
                                    </th>
                                    <th>{{ $service->title }}</th>
                                    <th>{{ $service->user->name }}</th>
                                    <th>
                                        <div class="dropdown"><!--- dropdown Starts --->

                                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions</button>


                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-info-circle"></i> User's Details</a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-envelope"></i> Approved Service</a>
                                                </li>


                                            </ul>
                                        </div>
                                    </th>
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
                    { "width": "15%", "className": "text-center", "targets": 4 },
                ]
            });
        } );
    </script>
@endsection
