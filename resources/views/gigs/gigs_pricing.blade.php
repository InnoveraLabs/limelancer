@extends('layouts.master')
@section('main_content')


    <!--End header Area-->
    <div class="container-fluid cr-gig-box">

        @include('gigs.tabs')

        <section class="create-gig-box container mb-5">

            <div class="row"><!--- row Starts --->
                <div class="col-md-10 offset-md-1">

                    <div class="tab-content card card-body"><!--- tab-content Starts --->

                        @if ($errors->any())
                            <div class="alert alert-primary" role="alert">
                                <i class="fa fa-info-circle"></i> Please Fill at least one Package information with Description, Delivery Days and Price.

                            </div>
                        @endif

                        <div class="tab-pane active" id="pricing">
                            <div class="gig-box-title-wrapper">
                                <h5 class="font-weight-normal float-left">Scope &amp; Pricing</h5>
                                <div class="float-right switch-box">
                                    <span class="text">3 packages</span>
                                    <label class="switch">
                                        @if($service->pricing->count() == "0" )
                                            <input type="checkbox" id="on" class="pricing">
                                        @else
                                            <input type="checkbox" id="on" class="pricing" checked="">
                                        @endif
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <hr class="mt-5 mb-5">

                            <form action="{{ route('user.pricing')}}" method="POST" class="pricing-form" id="pricing-form">
                                @csrf
                                <div class="packages" style="">
                                    <table class="table table-bordered packages" style="position: relative;">
                                        <thead>
                                            <tr>
                                                <th>Package Name</th>
												<?php $i=0; ?>
                                                @foreach($packages as $package)
                                                    <th>{{ $package->name }}
													 <input type="text"  name="package_name[]" form="pricing-form" value="{{ $pricing[$i]->package_name ?? ''}}" class="form-control" placeholder="Name YOur Package"/>
													</th>
												<?php $i=$i+1; ?>			
                                                @endforeach

                                            </tr>
                                        </thead>
                                        <tbody>

                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        @foreach($packages as $package)											
                                            <input type="hidden" name="package_id[]" id="package_id_{{ $package->id }}" value="{{ $package->id }}" />
                                        @endforeach

                                        <tr>
                                            <td>Description</td>

                                            <td class="p-0">
                                                <textarea maxlength="100" name="description[0]" rows="6" class="form-control" placeholder="Description">{{ $pricing[0]->description ?? '' }}</textarea>
                                            </td>
                                            <td class="p-0">
                                                <textarea maxlength="100" name="description[1]" rows="6" class="form-control deleteData" placeholder="Description">{{ $pricing[1]->description ?? ''}}</textarea>
                                            </td>
                                            <td class="p-0">
                                                <textarea maxlength="100" name="description[2]" rows="6" class="form-control deleteData" placeholder="Description">{{ $pricing[2]->description ?? ''}}</textarea>
                                            </td>
                                        </tr>
										<tr>
                                            <td>Include Source / Content</td>
                                            <td >
												<input type="hidden" class="form-control" name="is_source[0]" value="0">
												<input type="checkbox" class="form-control" name="is_source[0]" value="1" <?php if(@$pricing[0]->is_source==1) { echo  "checked"; } ?>>
                                            </td>
                                            <td >
												<input type="hidden" class="form-control" name="is_source[1]" value="0">
												<input type="checkbox" class="form-control" name="is_source[1]" value="1" <?php if(@$pricing[1]->is_source==1) {  echo "checked"; } ?>>
                                            </td>
                                            <td >
												<input type="hidden" class="form-control" name="is_source[2]" value="0">
                                                <input type="checkbox" class="form-control" name="is_source[2]" value="1" <?php if(@$pricing[2]->is_source==1) { echo  "checked"; } ?>>
                                            </td>
                                        </tr>
                                        <tr class="delivery-time">
                                            <td>Delivery Days</td>
                                            <td class="p-0">
                                                <select name="delivery_date[]" class="form-control">
                                                    @foreach($days as $key => $day)
                                                        <option value="{{ $day }}"
                                                                @if(isset($pricing[0]->delivery_date) && $pricing[0]->delivery_date == $day) selected
                                                            @endif>{{ $day }} days</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="p-0">
                                                <select name="delivery_date[]" form="pricing-form" class="form-control">
                                                    @foreach($days as $day)
                                                        <option value="{{ $day }}"
                                                                @if(isset($pricing[1]->delivery_date) && $pricing[1]->delivery_date == $day) selected
                                                            @endif>{{ $day }} days</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="p-0">
                                                <select name="delivery_date[]" form="pricing-form" class="form-control">
                                                    @foreach($days as $day)
                                                        <option value="{{ $day }}"
                                                                @if(isset($pricing[2]->delivery_date) && $pricing[2]->delivery_date == $day) selected
                                                            @endif>{{ $day }} days</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Revisions</td>
                                            <td class="p-0">
                                                <select name="revisions[]" form="pricing-form" class="form-control">
                                                    @foreach($revisions as $revision)
                                                        <option value="{{ $revision }}" @if($revision == @$pricing[0]->revisions) selected @endif>{{ $revision }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="p-0">
                                                <select name="revisions[]" form="pricing-form" class="form-control">
                                                    @foreach($revisions as $revision)
                                                        <option value="{{ $revision }}"
                                                                @if($revision == @$pricing[1]->revisions)
                                                                selected
                                                            @endif
                                                        >{{ $revision }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="p-0">
                                                <select name="revisions[]" form="pricing-form" class="form-control">
                                                    @foreach($revisions as $revision)
                                                        <option value="{{ $revision }}"
                                                                @if($revision == @$pricing[2]->revisions)
                                                                selected
                                                            @endif
                                                        >{{ $revision }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Price</td>
                                            <td class="p-0">
                                                <input type="number" min="5" name="price[]" form="pricing-form" value="{{ $pricing[0]->price ?? 0}}" class="form-control" />
                                            </td>
                                            <td class="p-0">
                                                <input type="number" name="price[]" form="pricing-form" value="{{ $pricing[1]->price ?? 0}}" class="form-control" />
                                            </td>
                                            <td class="p-0">
                                                <input type="number" name="price[]" form="pricing-form" value="{{ $pricing[2]->price ?? 0}}" class="form-control" />
                                                <div id="info">
                                                    <div class="info-wrapper">
                                                        <b>
                                                            <span>
                                                            Unlock your potential<br />
                                                            revenue with all 3 Packages
                                                            </span>
                                                        </b>
                                                        <div class="try-btn-wrapper" style="margin-top: 10px;">
                                                            <button class="lime-btn try-btn" id="show">Try Now</button>
                                                        </div>
                                                        <a href="#!" class="learn-more-link">Learn more</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
								<?php 
								$sv_id = Request::segment(4) ;
								$extra = DB::table('service_extras') 
										 ->where('service_id',$sv_id)  
										 ->get();
										 
								?>	
                                <div class="extra-pricing-factors-section mb-4">

                                    <header>Add Extra services</header>

                                    <div class="extra-border">
                                        <ul class="custom-extras-container" id="custom-extras-container">

                                            <li class="add-extra-row" id="add_more">
                                                <span class="fit-icon" style="width: 16px; height: 16px; fill: rgb(74, 115, 232);">
                                                <svg width="12" height="16" viewBox="0 0 12 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.5 7H7V2.5C7 2.22375 6.77625 2 6.5 2H5.5C5.22375 2 5 2.22375 5 2.5V7H0.5C0.22375 7 0 7.22375 0 7.5V8.5C0 8.77625 0.22375 9 0.5 9H5V13.5C5 13.7762 5.22375 14 5.5 14H6.5C6.77625 14 7 13.7762 7 13.5V9H11.5C11.7762 9 12 8.77625 12 8.5V7.5C12 7.22375 11.7762 7 11.5 7Z"
                                                    >
                                                    </path>
                                                </svg>
                                                </span>
                                                Add Gig Extra
                                            </li>
											<li className="custom-extra-row" id="custom-extra-row">
										<ul className="extra-values" id="extra-values">
										<?php if (count($extra)>0){ ?>
										@foreach( $extra as $row )
										<li >
											<label className="fit-checkbox extra-active fit-checkbox-color-white fit-checkbox-shape-square"
												   id="fit-checkbox extra-active fit-checkbox-color-white fit-checkbox-shape-square">
												<input type="checkbox" checked="" />
												<span className="checkmark-box" id="checkmark-box">
													<span className="fit-icon check-icon" style="width: 10px; height: 10px;" id="fit-icon check-icon">
														<svg width="11" height="9" viewBox="0 0 11 9" xmlns="http://www.w3.org/2000/svg">
															<path
																d="M3.64489 8.10164L0.158292 4.61504C-0.0511769 4.40557 -0.0511769 4.06594 0.158292 3.85645L0.916858 3.09786C1.12633 2.88837 1.46598 2.88837 1.67545 3.09786L4.02419 5.44658L9.05493 0.41586C9.2644 0.206391 9.60405 0.206391 9.81352 0.41586L10.5721 1.17445C10.7816 1.38392 10.7816 1.72355 10.5721 1.93303L4.40348 8.10166C4.19399 8.31113 3.85436 8.31113 3.64489 8.10164V8.10164Z"
															></path>
														</svg>
													</span>
												</span>
											</label>
											<span className="attr" id="attr">Title</span>
											<div className="fit-input-wrapper title-input fit-input-icon-start" id="fit-input-wrapper title-input fit-input-icon-start">
												<div className="fit-input-inner-wrapper" id="fit-input-inner-wrapper">
													<input className="fit-input" id="fit-input" type="text" name="extra_title[]" placeholder="Title your extra service" maxlength="20" minlength="3" value="{{$row->extra_title}}" /></div>
											</div>
											<i>&nbsp;0 / 20 max</i>
										</li>
										<li>
											<span className="attr" id="attr">Description</span>
											<div className="description-container" id="description-container">
												<span className="i-will" id="i-will"></span>
												<div className="fit-input-wrapper description-input fit-input-icon-start" id="fit-input-wrapper description-input fit-input-icon-start">
													<div className="fit-input-inner-wrapper" id="fit-input-inner-wrapper">
														<input className="fit-input" id="fit-input" type="text" name="extra_desc[]" placeholder="Describe your offering" value="{{$row->extra_desc}}" style="width: 80%;" ></div>
												</div>
											</div>
										</li>
										<li>
											<span className="attr for-extra" id="attr for-extra">For an extra &nbsp;&nbsp;</span>
											<div className="fit-input-wrapper price-stepper fit-input-icon-start" id="fit-input-wrapper price-stepper fit-input-icon-start">
												<div className="fit-input-inner-wrapper" id="fit-input-inner-wrapper">
													<input className="fit-input" id="fit-input" type="number" name="extra_price[]" step="5" min="5" max="1000" value="{{$row->extra_price}}" /></div>
											</div>
											<span className="for-extra" id="for-extra">&nbsp;$</span>
											<span className="for-additional" id="for-additional">and an additional</span>
											<select name="fast_delivery[]" id="duration-dropdown" className="form-control" style="width: 16%;">
												<option value="">Select</option>
												<option value="1" <?php if($row->fast_delivery==1){ echo 'selected'; } ?>>1 Days</option>
												<option value="2" <?php if($row->fast_delivery==2){ echo 'selected'; } ?>>2 Days</option>
												<option value="3" <?php if($row->fast_delivery==3){ echo 'selected'; } ?>>3 Days</option>
												<option value="4" <?php if($row->fast_delivery==4){ echo 'selected'; } ?>>4 Days</option>
												<option value="5" <?php if($row->fast_delivery==5){ echo 'selected'; } ?>>5 Days</option>
												<option value="6" <?php if($row->fast_delivery==6){ echo 'selected'; } ?>>6 Days</option>
												<option value="7" <?php if($row->fast_delivery==7){ echo 'selected'; } ?>>7 Days</option>
												<option value="8" <?php if($row->fast_delivery==8){ echo 'selected'; } ?>>8 Days</option>
												<option value="9" <?php if($row->fast_delivery==9){ echo 'selected'; } ?>>9 Days</option>
												<option value="10" <?php if($row->fast_delivery==10){ echo 'selected'; } ?>>10 Days</option>
												<option value="11" <?php if($row->fast_delivery==11){ echo 'selected'; } ?>>11 Days</option>
												<option value="12" <?php if($row->fast_delivery==12){ echo 'selected'; } ?>>12 Days</option>
												<option value="13" <?php if($row->fast_delivery==13){ echo 'selected'; } ?>>13 Days</option>
												<option value="14" <?php if($row->fast_delivery==14){ echo 'selected'; } ?>>14 Days</option>

											</select>
										</li>
										
										@endforeach
										<?php } ?>
										
										</ul>
										</li>
										
                                        </ul>
                                    </div>
									
                                </div>

                                <div class="form-group gig-btn-group"><!--- form-group Starts --->
                                    <a href="{{ route('user.profile')}}" class="lime-btn lime-btn-secondary">Cancel</a>
                                    <button class="lime-btn learn_btn" type="submit" >Save &amp; Continue</button>
                                </div>

                        </div>

                        </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>


@endsection

@section('scripts')

    @if($service->pricing !== "0" && $service->pricing->count() > 1)
        <script>
            $('#info').hide();
        </script>
    @else
        <script>
            $('#info').show();
        </script>
    @endif

    <script>
	
$(document).ready(function(){
  $("#show").click(function(){
	var packageId3 = $('#package_id_2').val(2);
    var packageId2 = $('#package_id_3').val(3);
	$("#on").prop("checked", true);
    $("#info").hide();
  });
  
});
	
	
	
        $(document).ready(function(){
            if ($('#on').prop('checked') == false){

                var packageId3 = $('#package_id_2').val(0);
                var packageId2 = $('#package_id_3').val(0);

            }

            $('#on').on('change',function(){

                if(this.checked){
                    var packageId3 = $('#package_id_2').val(2);
                    var packageId2 = $('#package_id_3').val(3);
                    $("#info").hide();
                }
                else{
                    var packageId3 = $('#package_id_2').val(0);
                    var packageId2 = $('#package_id_3').val(0);

                    $("#info").show();
                }
            });
            //
            // if ($('#on').prop('checked') == false){
            //     // $('#submit').on(function (){
            //     //     var values = $("input[name='description[]']")
            //     //         .map(function(){return $(this).val();}).get();
            //     // })
            //
            // } else {
            //     $('#submit').on(function () {
            //
            //     })
            // }

            var max_fields_limit      = 4; //set limit for maximum input fields
            var x = 0; //initialize counter for text box
            $('#add_more').click(function(e){

                //click event on add more fields button having class add_more_button
                e.preventDefault();
                if(x < max_fields_limit){ //check conditions
                    x++; //counter increment
                    getElements();

                }
            });

            function getElements(){
                var div = $('#custom-extras-container');
                // Getting elements from server and saving the in the variable data
                $.get( "{{ asset('jsonData/form.html') }}", function(response) {
                    div.append($(response));
                });
            }


        });


    </script>
@endsection


