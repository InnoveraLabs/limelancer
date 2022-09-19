@extends('admin.master')
@section('main_content')
        <!-- Page style DataTables -->
<style>
    .hoverInfo {
        position: absolute;
        margin-left: 30px;
        display: none;
    }

    .title:hover .hoverInfo {
        display: block;
    }
</style>
	
    <div class="box box-info">
        &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 150%;color:blue;">JOB TITLE : {{$post->post_title}}</span>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
               <table class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Applicant Photo</th>
                    <th>Applicant Name</th>
                    <th>Father's Name</th>
                    <!--th>Mother's Name</th-->
                    <th>Gender</th>
                    <!--th>Date of Birth</th-->
                    <!--th>Religion</th-->
					<th>Email</th>
					<th>Mobile No</th>
					<!--th>NID</th-->
					<!--th>Blood Group</th-->
					<!--th>Marital Status</th-->
					<th>Present Address</th>
					<th>Action</th>
                </tr>
                </thead>
                 <tbody>
				 @foreach($all_applicant as $row)
				 <?php 
					$new_str = substr($row->photo, 17);
					$main_str = "public/uploads/cv/".$new_str;
				 ?>
				 
				 <tr class="title">
				 <td> <img  style="height: 50px;width: 80px;"  src="<?php echo asset("{$main_str}")?>"></td>
				 <td>{{$row->applicant_name_en}}</td>
				 <td>{{$row->father_name}}</td>
				 <!--td>{{$row->mother_name}}</td-->
				 <td>{{$row->gender}}</td>
				 <!--td>{{$row->date_of_birth}}</td-->
				 <!--td>{{$row->religion}}</td-->
				 <td>{{$row->email}}</td>
				 <td>{{$row->mobile}}</td>
				 <!--td>{{$row->nid}}</td>
				 <!--td>{{$row->blood_group}}</td-->
				 <!--td>{{$row->marital_status}}</td-->
				 <td>{{$row->present_address}}</td>
				 <td><a href="{{"/admin/cv-view/$row->cv_id" }}"><button type="button" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> View CV</button></a></td>
				 </tr>
				 @endforeach
				 </tbody>
            </table>
        </div>
        
        <!-- /.box-body -->
    </div>


@endsection
