@extends('layouts.admin-master')
@section('title', 'Limelancer | Sub Category Manage')

@section('content')
    <div id="content-wrapper">
        <div id="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1"><!--- col-lg-10 Starts --->

                    <div class="row breadcrumbs">
                        <div class="col-lg-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1><i class="menu-icon fa fa-bars"></i> All SubCategories </h1>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="active"><a href="{{ route('admin.subcategories.create') }}" class="btn btn-success">
                                                <i class="fa fa-plus-circle text-white"></i>
                                                <span class="text-white">Add SubCategory</span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="card row">
                        <div class="card-body">
                            <h4 class="mb-4"> SubCategory Summary <small>All SubCategories</small> </h4>

                            <table id="categoryTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#SR</th>
                                    <th>Main Category</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($subcategories as $key => $subcategory)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $subcategory->parent->name }}</td>
                                        <td>{{ $subcategory->sub_c_name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions</button>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.subcategories.edit', $subcategory->id)}}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('deleteSubC').submit();">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>

                                                        <form id="deleteSubC" action="{{ route('admin.subcategories.destroy', $subcategory->id)}}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </li>
                                                </ul>
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
            $('#categoryTable').DataTable({
                "columnDefs": [
                    { "width": "8%", "targets": 0 },
                    { "width": "35%", "targets": 1 },
                    { "width": "25%", "targets": 2 },
                    { "width": "10%", "className": "text-center", "targets": 3 },
                ]
            });
        } );
    </script>
@endsection

