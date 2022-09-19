@extends('layouts.master')
@section('main_content')

    <!--End header Area-->
    <div class="container-fluid cr-gig-box">

        @include('gigs.tabs')

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
								<script>
								$(function() {
									$('#btnAddtoList').click(function(){
										var newDiv = $('<div class="form-group requirements">	<p class="mb-1">Add a question</p><textarea name="buyer_instruction" placeholder="" rows="4" class="form-control" spellcheck="false"></textarea></div><div class="form-group "><p class="" >Get it in the form of </p><select name="req_options" class="form-control" id = "ddlPassport" onchange = "ShowHideDiv()"><option value="1"  >Free text</option><option value="2" >Multiple choice</option><option value="3" >Attachments</option></select></div>');
									  //newDiv.style.background = "#000";
									   $('#add-div').append(newDiv);
									  // $('#btnAddtoList').hide();
									});
								});
								</script>
								<button type="button" class="btn btn-primary" style="border-radius:0px;" id="btnAddtoList"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New Question</button>
								<br></br>
								<div id="add-div">
								
								</div>
								<?php
								$requirements = DB::table('service_requirements')
											   ->where('service_id',Request::segment(4))
											   ->first();
								?>
                                <div class="form-group requirements">
                                    <p class="mb-1">Add a question</p>
                                    <textarea name="buyer_instruction" placeholder="" rows="4" class="form-control" spellcheck="false">{{@$requirements->buyer_instruction}}</textarea>
                                </div>
                                @error('buyer_instruction')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group ">
                                    <p class="" >Get it in the form of </p>

                                    <select name="req_options" class="form-control" id = "ddlPassport" onchange = "ShowHideDiv()">
										<option value="1" <?php if (@$requirements->req_options == '1') echo ' selected="selected"'; ?> >Free text</option>
										<option value="2" <?php if (@$requirements->req_options == '2') echo ' selected="selected"'; ?>>Multiple choice</option>
										<option value="3" <?php if (@$requirements->req_options == '3') echo ' selected="selected"'; ?>>Attachments</option>
                                    </select>

                                </div>
								<script type="text/javascript">
									function ShowHideDiv() {
										var ddlPassport = document.getElementById("ddlPassport");
										var dvPassport = document.getElementById("dvPassport");
										dvPassport.style.display = ddlPassport.value == "2" ? "block" : "none";
									}
								</script>
                                @error('req_options')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
								<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
								<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
								@if(@$requirements->req_options==2)
								<div class="form-group " id="dvPassport" style="display: block">
								@else
								<div class="form-group " id="dvPassport" style="display: none">	
								@endif
								<div class="container">
									<div class="row" style="margin-left:-30px;">
										<div class="col-md-12">
											<div data-role="dynamic-fields">
												@if(@$requirements->req_options==2)
												<?php
												$options = DB::table('service_requirements_options')
																->where('service_id',Request::segment(4))
																->get();
												?>
												@foreach($options as $dataoption)
												<div class="form-inline">
													<div class="form-group">
														<label class="sr-only" for="field-name">Field Name</label>
														<input type="text" name="option_data[]" value="{{$dataoption->option_name}}" class="form-control" id="field-name" placeholder="Add Option">
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
														<input type="text" name="option_data[]" class="form-control" id="field-name" placeholder="Add Option">
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
								
                                <div class="form-group mb-0"><!--- form-group Starts --->

                                    <a href="#" class="btn btn-secondary float-left back-to-desc">Back</a>

                                    <button class="lime-btn learn_btn float-right" type="submit">
                                        Save &amp; Continue
                                    </button>

                                </div><!--- form-group Starts --->

                            </form><!--- form Ends -->

                        </div>

                    </div>
                </div>
            </div>


        </section>
    </div>

@endsection

