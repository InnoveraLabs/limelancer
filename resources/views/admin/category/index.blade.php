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
                                <h1><i class="menu-icon fa fa-bars"></i> All Categories </h1>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active"><a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus-circle text-white"></i>
                                        <span class="text-white">Add Category</span>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card row">
                <div class="card-body">
                    <h4 class="mb-4"> Category Summary <small>All Categories</small> </h4>

                    <table id="categoryTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#SR</th>
                                <th>Category</th>
                                <th>Featured</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($categories as $key => $category)
                        <tbody>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->is_featured == 1)
                                    <span class="badge badge-pill badge-info">Featured</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Not Featured</span>
                                    @endif

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions</button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.categories.edit', $category->id)}}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('deleteC').submit();">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>

                                                <form id="deleteC" action="{{ route('admin.categories.destroy', $category->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach

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

