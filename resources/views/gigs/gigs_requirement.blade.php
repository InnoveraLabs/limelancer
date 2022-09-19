@extends('layouts.master')
@section('main_content')

    <!--End header Area-->
    <div class="container-fluid cr-gig-box">

        @include('gigs.tabs')
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <section class="container mt-5 mb-5">

            <div class="row"><!--- row Starts --->
                <div class="col-md-10 offset-md-1">
                    <div class="tab-content card card-body"><!--- tab-content Starts --->
                        <div class="tab-pane active" id="requirements">
                            <form action="{{ route('user.requirement_store') }}" method="POST" class="proposal-form"><!--- form Starts -->
                            @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <h5 class="font-weight-normal">

                                <span class="float-left">

                                Get all the information you need from buyers to get started<br>

                                <small class="text-muted">Add questions to help buyers provide you with exactly what you need to start working on their order.</small>

                                </span>

                                    <div class="clearfix"></div>

                                </h5>

                                <hr>
								<style>
									.dropdown-content {
									  display: none;
									  position: absolute;
									  background-color: #f1f1f1;
									  min-width: 160px;
									  overflow: auto;
									  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
									  z-index: 1;
									}

									.dropdown-content a {
									  color: black;
									  padding: 12px 16px;
									  text-decoration: none;
									  display: block;
									}

									.dropdown a:hover {background-color: #ddd;}

									.show {display: block;}
									</style>
								<script>
									/* When the user clicks on the button, 
									toggle between hiding and showing the dropdown content */
									function yFunction(data) {
									  document.getElementById("myDropdown"+data).classList.toggle("show");
									}

									// Close the dropdown if the user clicks outside of it
									window.onclick = function(event) {
									  if (!event.target.matches('.dropbtn')) {
										var dropdowns = document.getElementsByClassName("dropdown-content");
										var i;
										for (i = 0; i < dropdowns.length; i++) {
										  var openDropdown = dropdowns[i];
										  if (openDropdown.classList.contains('show')) {
											openDropdown.classList.remove('show');
										  }
										}
									  }
									}									
									function popFunction(data) {		  
										$("#myModal"+data).modal();		
									}
								</script>
								<?php 
								 $reqData =  DB::table('service_requirements')
											 ->where('service_id',Request::segment(4)) 
											 ->orderBy('id', 'ASC')
											 ->get();
								?>
								@foreach($reqData as $rowdata)	
								<div style="padding: 10px;box-shadow: 1px 1px 1px 1px #dbdad7;">
									<div class="dropdown" style="float:right;">
									  <i class="fa fa-ellipsis-h dropbtn" onclick="yFunction(<?php echo $rowdata->id; ?>)" aria-hidden="true"></i>									 
									  <div id="myDropdown<?php echo $rowdata->id; ?>" class="dropdown-content">
										<a onclick="popFunction(<?php echo $rowdata->id; ?>)" id="myBtn<?php echo $rowdata->id; ?>">Edit</a>
										<a href="{{ route('user.req_remove', $rowdata->id) }}">Remove</a>
									  </div>
									</div>
									@if($rowdata->req_options==1)
									<p style="font-size:70%"><i class="fa fa-text-width" aria-hidden="true" ></i>&nbsp;&nbsp;&nbsp;&nbsp;FREE TEXT</p>
									@endif
									@if($rowdata->req_options==2)
									<p style="font-size:70%"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;MULTIPLE CHOICE</p>
									@endif
									@if($rowdata->req_options==3)
									<p style="font-size:70%"><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;ATTACHMENT</p>
									@endif
									<p style="color:black;">{{$rowdata->buyer_instruction}} </p>
								</div>								
								<br>
								<div class="modal fade" id="myModal<?php echo $rowdata->id; ?>" role="dialog">
								<div class="modal-dialog">    
								  <!-- Modal content-->
								  <div class="modal-content">
								  
									<div class="modal-header">								  
									 <button type="button" class="close" data-dismiss="modal" >&times;</button>  
									</div>
									<div class="modal-body">
									<div class="form-group requirements">	
										<p class="mb-1">Edit a question</p>
										<textarea name="buyer_instruction{{ $rowdata->id }}" id="edit_ins" placeholder="" rows="4" class="form-control" spellcheck="false">{{$rowdata->buyer_instruction}}</textarea>
									</div>
									<script type="text/javascript">
										function ShowHideDiv2(data) {
											var dvPassport6 = document.getElementById("dvPassport6");
											if(data ==2){			
												$('#dvPassport6').show();
												$('#dvPassport7').show();	
												
											} else if (data ==3)  {	
											
												$('#dvPassport7').hide();	
												$('#dvPassport6').hide();
												
											} else if (data ==1)  {
												
												$('#dvPassport7').hide();	
												$('#dvPassport6').hide();
												
											}
										}
									</script>
									<div class="form-group ">
										<p class="" >Get it in the form of </p>
										<select name="req_options{{ $rowdata->id }}" class="form-control" id = "ddlPassport6" onchange = "ShowHideDiv2(this.value)">
											<option value="1" <?php if($rowdata->req_options==1){ echo "selected";} ?> >Free text</option>
											<option value="2" <?php if($rowdata->req_options==2){ echo "selected";} ?> >Multiple choice</option>
											<option value="3" <?php if($rowdata->req_options==3){ echo "selected";} ?> >Attachments</option>
										</select>
									</div>
									<input type="hidden" id="custId" name="custId{{ $rowdata->id }}" value="{{ $rowdata->id }}">									
								@if(@$rowdata->req_options==2)
								<div class="form-group " id="dvPassport6" style="display: block">
								@else
								<div class="form-group " id="dvPassport7" style="display: none">	
								@endif
								<div class="container">
									<div class="row"  style="margin-left:-30px;">
										<div class="col-md-12">
											<div data-role="dynamic-fields" >
												@if(@$rowdata->req_options==2)
												<?php
												$options = DB::table('service_requirements_options')
																->where('requirement_id',$rowdata->id)
																->get();
												?>
												
												@foreach($options as $dataoption)
												<div class="form-inline" >
													<div class="form-group">
														<label class="sr-only" for="field-name">Field Name</label>
														<input type="text" id="option_datap" name="option_datap{{ $rowdata->id }}[]" value="{{$dataoption->option_name}}" class="form-control" id="field-name" placeholder="Add Option">
													</div>
													
													<button class="btn btn-danger" data-role="remove" style="margin-top: -20px;">
														<span class="glyphicon glyphicon-remove"><i class="fa fa-times" aria-hidden="true"></i></span>
													</button>
													<button class="btn btn-primary" data-role="add" style="margin-top: -20px;">
														<span class="glyphicon glyphicon-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
													</button>
												</div>  <!-- /div.form-inline -->
												@endforeach												
												@else
												<div class="form-inline">
													<div class="form-group">
														<label class="sr-only" for="field-name">Field Name</label>
														<input type="text" name="option_datak{{ $rowdata->id }}[]" class="form-control" id="field-name" placeholder="Add Option">
													</div>
													
													<button class="btn btn-danger" data-role="remove" style="margin-top: -20px;">
														<span class="glyphicon glyphicon-remove"><i class="fa fa-times" aria-hidden="true"></i></span>
													</button>
													<button class="btn btn-primary" data-role="add" style="margin-top: -20px;">
														<span class="glyphicon glyphicon-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
													</button>
												</div>  <!-- /div.form-inline -->
												@endif		
											</div>  <!-- /div[data-role="dynamic-fields"] -->
										</div>  <!-- /div.col-md-12 -->
									</div>  <!-- /div.row -->
								</div>
								</div>	
									</div>
									<div class="modal-footer">
									  <button type="submit" class="btn btn-success" >Update</button> 
									  <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
									</div>
								  </div>
								  
								</div>
								</div>
								@endforeach
								<script type="text/javascript">
									
									function ShowHideDiv() {
										var ddlPassport3 = document.getElementById("ddlPassport3");
										var dvPassport3 = document.getElementById("dvPassport3");
										dvPassport3.style.display = ddlPassport3.value == "2" ? "block" : "none";
									}
								</script>
								<script>
								$(function() {
									$('#btnAddtoList').click(function(){
										var newDiv = $('<div class="form-group requirements">	<p class="mb-1">Add a question</p><textarea name="buyer_instruction" placeholder="" rows="4" class="form-control" spellcheck="false"></textarea></div><div class="form-group "><p class="" >Get it in the form of </p><select name="req_options" class="form-control" id = "ddlPassport3" onchange = "ShowHideDiv()"><option value="1"  >Free text</option><option value="2" >Multiple choice</option><option value="3" >Attachments</option></select></div><div class="form-group " id="dvPassport3" style="display: none"><div class="container"><div class="row" style="margin-left:-30px;"><div class="col-md-12"><div data-role="dynamic-fields"><div class="form-inline"><div class="form-group"><label class="sr-only" for="field-name">Field Name</label><input type="text" name="option_data[]" class="form-control" id="field-name" placeholder="Add Option"></div><button class="btn btn-danger" data-role="remove" style="margin-top: -20px;"><span class="glyphicon glyphicon-remove"><i class="fa fa-times" aria-hidden="true"></i></span></button><button class="btn btn-primary" data-role="add" style="margin-top: -20px;"><span class="glyphicon glyphicon-plus"><i class="fa fa-plus" aria-hidden="true"></i></span></button></div></div></div></div></div></div>');
									  //newDiv.style.background = "#000";
									   $('#add-div').append(newDiv);
									  $('#myButton').show();
									});
								});
								</script>
								<button type="button" class="btn btn-primary" style="border-radius:0px;" id="btnAddtoList"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New Question</button>
								<br></br>
								<div id="add-div">
								
								</div>
								
								<style>
								[data-role="dynamic-fields"] > .form-inline + .form-inline {
										margin-top: 0.5em;
									}

									[data-role="dynamic-fields"] > .form-inline [data-role="add"] {
										display: none;
									}

									[data-role="dynamic-fields"] > .form-inline:last-child [data-role="add"] {
										display: inline-block;
									}

									[data-role="dynamic-fields"] > .form-inline:last-child [data-role="remove"] {
										display: none;
									}
								</style>
								<script>
								$(function() {
									// Remove button click
									$(document).on(
										'click',
										'[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
										function(e) {
											e.preventDefault();
											$(this).closest('.form-inline').remove();
										}
									);
									// Add button click
									$(document).on(
										'click',
										'[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
										function(e) {
											e.preventDefault();
											var container = $(this).closest('[data-role="dynamic-fields"]');
											new_field_group = container.children().filter('.form-inline:first-child').clone();
											new_field_group.find('input').each(function(){
												$(this).val('');
											});
											container.append(new_field_group);
										}
									);
								});
								</script>
								
								
								
                                <div class="form-group mb-0"><!--- form-group Starts --->
									<button class="btn btn-success"  type="submit" id="myButton" style="display:none;">Add Question</button>
                                    
                                </div><!--- form-group Starts --->
								
                            </form><!--- form Ends -->
								<br>	
                                <div class="form-group mb-0"><!--- form-group Starts --->
									 <a href="#" class="btn btn-secondary float-left back-to-desc">Back</a>
									<?php 
									$FinalData =  DB::table('service_requirements')
												   ->where('service_id',@$service->id) 
												   ->get();
									if(count($FinalData)>0){			   
								    ?>                                  
									<a href="{{ route('user.gallery_edit', $service->id) }}" class="lime-btn learn_btn float-righ" style="float:right;"> Save &amp; Continue</a>
									<?php } else { ?>
								    <a href="#" class="lime-btn learn_btn float-righ" style="float:right;"> Save &amp; Continue</a>
									<?php } ?>	
                                </div>
                        </div>

                    </div>
                </div>
            </div>


        </section>
    </div>

@endsection

