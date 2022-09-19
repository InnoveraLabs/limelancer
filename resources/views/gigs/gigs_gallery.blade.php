@extends('layouts.master')

@section('main_content')

    <!--End header Area-->
    <div class="container-fluid cr-gig-box">

        @include('gigs.tabs')
		<?php $service_id = Request::segment(4); ?>	
        <section class="container mt-5 mb-5">

            <div class="row"><!--- row Starts --->
                <div class="col-md-10 offset-md-1">
                    <div class="tab-content card card-body"><!--- tab-content Starts --->
                        <div class="tab-pane active" id="gallery">
                            <h5 class="font-weight-normal">Build Your Gig Gallery</h5>
                            <h6 class="font-weight-normal">Add memorable content to your gallery to set yourself apart from competitors.</h6>

                            @if ($errors->any())
                            <div class="message-disclaimer">
                                <span class="fit-icon icn-info" style="width: 16px; height: 16px;">
                                    <i class="fa fa-info-circle"></i>
                                </span>
                                <p class="text-container">
                                    <strong class="note">Note</strong><strong>:</strong>Upload At least One Photo To continue...</p>
                            </div>
                            @endif

                            <hr>

                            <p class="text-right mb-0">
                                <span class="float-left">Gig Photos </span>
                                <small class="text-muted" style="font-size: 78%;">Upload Photos that describe or related to your Gig.your image size must be 700 x 390 pixels.</small>
                            </p>

                            <form action="{{ route('user.gallery_store') }}" class="proposal-form" id="gallery_form" enctype="multipart/form-data" method="POST"><!--- form Starts --->
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <div class="row gallery"><!--- row gallery Starts --->
                                    <div class="col-md-3"><!--- col-md-3 Starts --->
										<script>
											function readURLONE(input) {
												if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function (e) {
														$('#picture_one')
															.attr('src', e.target.result)
															.width(160)
															.height(90);
															$("#photo_one").hide();
															$("#text_one").hide();
													};
													reader.readAsDataURL(input.files[0]);
												}
											}
											
											function readURLTWO(input) {
												if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function (e) {
														$('#picture_two')
															.attr('src', e.target.result)
															.width(160)
															.height(90);
															$("#photo_two").hide();
															$("#text_two").hide();
													};
													reader.readAsDataURL(input.files[0]);
												}
											}
											function readURLTHREE(input) {
												if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function (e) {
														$('#picture_three')
															.attr('src', e.target.result)
															.width(160)
															.height(90);
															$("#photo_three").hide();
															$("#text_three").hide();
													};
													reader.readAsDataURL(input.files[0]);
												}
											}
										</script>
										<style>
											.image-upload > input
											{
												display: none;
											}

											.image-upload img
											{										
												cursor: pointer;	
												background-color: #fff;											
												
											}
											
											
										</style>				
										<?php 
										$one = DB::table('service_galleries')
												->where('service_id',Request::segment(4))
												->where('file_type',1)
												->where('file_number',1)
												->first();
										$two = DB::table('service_galleries')
												->where('service_id',Request::segment(4))
												->where('file_type',1)
												->where('file_number',2)
												->first();
										$three = DB::table('service_galleries')
												->where('service_id',Request::segment(4))
												->where('file_type',1)
												->where('file_number',3)
												->first();
												
										?>	
                                        @if(empty($one->featured_image))
                                        <div class="pic image-upload">
											<label for="file-input">
											<img id="picture_one" class="img-thumbnail" src="" ><i class="fa fa-picture-o fa-2x mb-2" id="photo_one" style="margin-left:-15px;"></i><br> <span id="text_one">Browse Image</span></img>
                                             
											</label>
											<input onchange="readURLONE(this);" id="file-input" name="service_image_one" type="file" accept="image/jpeg,image/png"/>
                                            
                                        </div>
                                        @else
                                        <div class="pic image-upload">
											<label for="file-input">
											<img id="picture_one" class="img-thumbnail" src="{{ asset('/service/') }}/{{$one->featured_image}}" >
										     @if(empty($one->featured_image))
											 <i class="fa fa-picture-o fa-2x mb-2" id="photo_one" style="margin-left:-15px;"></i><br> <span id="text_one">Browse Image</span></img>
                                             @endif
											</label>
											<input onchange="readURLONE(this);" id="file-input" name="service_image_one" type="file" accept="image/jpeg,image/png"/>
                                            
                                        </div>
										<a href="{{ route('user.galary_remove', $one->featured_image) }}"><i class="fa fa-trash" ></i></a>
                                        @endif
                                    </div><!--- col-md-3 Ends --->
                                    <div class="col-md-3"><!--- col-md-3 Starts --->
										@if(empty($two->featured_image))
                                        <div class="pic image-upload">
											<label for="file-inputs">
											<img id="picture_two" class="img-thumbnail" src="" ><i class="fa fa-picture-o fa-2x mb-2" id="photo_two" style="margin-left:-15px;"></i><br> <span id="text_two">Browse Image</span></img>
                                             
											</label>
											<input onchange="readURLTWO(this);" id="file-inputs" name="service_image_two" type="file" accept="image/jpeg,image/png"/>
                                            
                                        </div>										
										@else
											<div class="pic image-upload">
											<label for="file-inputs">
											<img id="picture_two" class="img-thumbnail" src="{{ asset('/service/') }}/{{$two->featured_image}}" >
											 @if(empty($two->featured_image))
											<i class="fa fa-picture-o fa-2x mb-2" id="photo_two" style="margin-left:-15px;"></i><br> <span id="text_two">Browse Image</span></img>
                                              @endif
											</label>
											<input onchange="readURLTWO(this);" id="file-inputs" name="service_image_two" type="file" accept="image/jpeg,image/png"/>                                            
                                        </div>
										<a href="{{ route('user.galary_remove', $two->featured_image) }}"><i class="fa fa-trash" ></i></a>	
                                        @endif
                                    </div><!--- col-md-3 Ends --->
                                    <div class="col-md-3"><!--- col-md-3 Starts --->
										@if(empty($three->featured_image))
                                        <div class="pic image-upload">
											<label for="file-inputn">
											<img id="picture_three" class="img-thumbnail" src="" ><i class="fa fa-picture-o fa-2x mb-2" id="photo_three" style="margin-left:-15px;"></i><br> <span id="text_three">Browse Image</span></img>
                                             
											</label>
											<input onchange="readURLTHREE(this);" id="file-inputn" name="service_image_three" type="file" accept="image/jpeg,image/png"/>                                            
                                        </div>
										@else
											<div class="pic image-upload">
											<label for="file-inputn">
											<img id="picture_three" class="img-thumbnail" src="{{ asset('/service/') }}/{{$three->featured_image}}" >
											  @if(empty(@$three->featured_image))
											  <i class="fa fa-picture-o fa-2x mb-2" id="photo_three" style="margin-left:-15px;"></i><br> <span id="text_three">Browse Image</span></img>
                                             @endif
											</label>
											<input onchange="readURLTHREE(this);" id="file-inputn" name="service_image_three" type="file"  accept="image/jpeg,image/png"/>                                            
                                        </div>
										<a href="{{ route('user.galary_remove', $three->featured_image) }}"><i class="fa fa-trash" ></i></a>										
                                        @endif	
                                    </div><!--- col-md-3 Ends --->

                                </div><!--- row gallery Ends --->
                                <hr>
                                <p class="text-right mb-0">
                                    <span class="float-left">Add Videoadd_proposal_video</span>
                                    <small class="text-muted" style="font-size: 78%;">Please choose a video shorter than 75 seconds and smaller than 50MB</small>
                                </p>
								<script>
								function readURLFOUR(input) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();

										reader.onload = function (e) {
											$('#picture_four')
												.attr('src', e.target.result)
												.width(160)
												.height(90);
												$("#photo_four").hide();
												$("#text_four").hide();
										};
										reader.readAsDataURL(input.files[0]);
									}
								}
								
								$(document).on("change", ".file_multi_video", function(evt) {
								  document.getElementById("video_data").style.display = "block";	
								  var $source = $('#video_here');
								  $source[0].src = URL.createObjectURL(this.files[0]);
								  $source.parent()[0].load();
								});
								</script>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <div class="row gallery"><!--- row gallery Starts --->
                                    <div class="col-md-12"><!--- col-md-3 Starts --->
										<div class="pic image-upload">
											<label for="file-inputv">
											<img id="picture_three" class="img-thumbnail" src="" >
											<i class="fa fa-video-camera fa-2x mb-2" id="photo_four" style="margin-left:-15px;"></i><br> 
											<span id="text_four">Add Video</span></img>                                             
											</label>
											<input onchange="readURLFOUR(this);" class="file_multi_video" id="file-inputv" name="proposal_vedio[]" type="file" accept="video/*" /> 
											<video width="400" controls id="video_data" style="display:none;margin-left: 220px;margin-top: -45px;">
											  <source src="mov_bbb.mp4" id="video_here" >
												Your browser does not support HTML5 video.
											</video>		
                                        </div>
										
                                    </div><!--- col-md-3 Ends --->
                                </div><!--- row gallery Ends --->
								
                                <!--hr>
                                <p class="text-right mb-0">
                                    <span class="float-left">Gig Audio</span>
                                    <small class="text-muted" style="font-size: 78%;">Complement your video with additional audio samples showcasing your talent.</small>
                                </p>
                                <div class="row gallery"><!--- row gallery Starts --->
                                    <!--div class="col-md-3"><!--- col-md-3 Starts --->
                                        <!--div class="pic add-pic">
                                            <i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse audio</span>
                                            <input type="hidden" name="proposal_img1" value="">
                                        </div>
                                    </div><!--- col-md-3 Ends --->
                                    <!--div class="col-md-3"><!--- col-md-3 Starts --->
                                        <!--div class="pic">
                                            <i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse audio</span>
                                            <input type="hidden" name="proposal_img2" value="">
                                        </div>
                                    </div><!--- col-md-3 Ends --->
                                    <!--div class="col-md-3"><!--- col-md-3 Starts --->
                                        <!--div class="pic">
                                            <i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse audio</span>
                                            <input type="hidden" name="proposal_img2" value="">
                                        </div>
                                    </div><!--- col-md-3 Ends --->
                                <!--/div><!--- row gallery Ends ---> 
                                <hr>
                                <p class="text-right mb-0">
                                    <span class="float-left">Gig PDFs</span>
                                    <small class="text-muted" style="font-size: 78%;">We only recommend adding a PDF file if it further clarifies the service you will be providing.</small>
                                </p>
								<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
										<script type="text/javascript">
											function PreviewImage() {
												$("#bro").hide();
												pdffile=document.getElementById("uploadPDF").files[0];
												pdffile_url=URL.createObjectURL(pdffile);
												document.getElementById("viewer").width = "180";
												document.getElementById("viewer").height = "100";												
												$('#viewer').attr('src',pdffile_url);
											}
											
											function PreviewImage2() {
												$("#bro2").hide();
												pdffile=document.getElementById("uploadPDF2").files[0];
												pdffile_url=URL.createObjectURL(pdffile);
												document.getElementById("viewer2").width = "180";
												document.getElementById("viewer2").height = "100";											
												$('#viewer2').attr('src',pdffile_url);
											}
										</script>
								<?php
								$five = DB::table('service_galleries')
												->where('service_id',Request::segment(4))
												->where('file_type',3)
												->where('file_number',1)
												->first();
								$six = DB::table('service_galleries')
												->where('service_id',Request::segment(4))
												->where('file_type',3)
												->where('file_number',2)
												->first();
											
								?>	
                                <div class="row gallery"><!--- row gallery Starts --->
                                    <div class="col-md-3"><!--- col-md-3 Starts --->
										@if(empty($five->featured_image))
										<div class="pic image-upload">
											<label for="uploadPDF">
											<iframe id="viewer"  frameborder="0" scrolling="no" width="0" height="0" ></iframe>
											<div id="bro"><i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse PDF</span></div>	
											</label>
											<input id="uploadPDF" type="file" name="proposal_pdf1" onchange="PreviewImage();" accept="application/pdf"/>                                             
                                        </div>
										@else
										<div class="pic image-upload">
											<label for="uploadPDF">
											<iframe id="viewer" src="{{ asset('/service/') }}/{{$five->featured_image}}" frameborder="0" scrolling="no" width="180" height="100" ></iframe>
											
											<div id="bro" ><i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Change PDF</span></div>	
											</label>
											<input id="uploadPDF" type="file" name="proposal_pdf1" onchange="PreviewImage();" accept="application/pdf"/>                                             
                                        </div>
										<a href="{{ route('user.galary_remove', $five->featured_image) }}"><i class="fa fa-trash" ></i></a>
										@endif	
                                    </div><!--- col-md-3 Ends --->
                                    <div class="col-md-3"><!--- col-md-3 Starts --->
										@if(empty($six->featured_image))
                                       <div class="pic image-upload">
											<label for="uploadPDF2">
											<iframe id="viewer2" frameborder="0" scrolling="no" width="0" height="0" ></iframe>
											<div id="bro2"><i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse PDF</span></div>	
											</label>
											<input id="uploadPDF2" type="file" name="proposal_pdf2" onchange="PreviewImage2();" accept="application/pdf"/>                                             
                                        </div>
										@else	
												
										<div class="pic image-upload">
											
											<label for="uploadPDF2">											
											<iframe id="viewer2" frameborder="0" src="{{ asset('/service/') }}/{{$six->featured_image}}" scrolling="no" width="180" height="100" ></iframe>
											
											<div id="bro2">
											
											<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Change PDF</span>
											
											</div>	
											
											</label>
											<input id="uploadPDF2" type="file" name="proposal_pdf2" onchange="PreviewImage2();" accept="application/pdf"/>                                             
                                        
										</div>
										<a href="{{ route('user.galary_remove', $six->featured_image) }}"><i class="fa fa-trash" ></i></a>
										@endif
                                    </div><!--- col-md-3 Ends --->
                                </div><!--- row gallery Ends --->

                            <div class="mb-5"></div>

                            <div class="form-group mb-0"><!--- form-group Starts --->

                                <a href="#" class="lime-btn lime-btn-secondary float-left back-to-req">Back</a>

                                <button class="lime-btn learn_btn float-right" type="submit" form="gallery_form">Save &amp; Continue</button>
                                <a href="" id="previewProposal" class="btn btn-success float-right mr-3 d-none">Preview</a>
                            </div><!--- form-group Starts --->


                            </form><!--- form Ends --->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('gigs.includes.imageinsertModal')

@endsection
@section('scripts')
   
    @endsection



