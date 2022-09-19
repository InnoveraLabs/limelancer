@extends('layouts.master')
@section('main_content')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!--End header Area-->
<div class="container-fluid cr-gig-box">

	@include('gigs.tabs')
	
	<section class="container mt-5 mb-5">

		<div class="row"><!--- row Starts --->
			<div class="col-md-10 offset-md-1">
				<div class="tab-content card card-body"><!--- tab-content Starts --->

					<div class="tab-pane fade show active" id="overview">
						<form action="{{ route('user.store_gig') }}" method="POST" class="proposal-form">
							@csrf

							<div class="form-group row"><!--- form-group row Starts --->
								<div class="col-md-3">Proposal Title</div>
								<div class="col-md-9">
									<textarea name="title" maxlength="80" rows="2" required="" placeholder="I Will" class="form-control" spellcheck="false"></textarea>
									
									<div class="title-footer">
										<span class="title-status-msg alert gig-upcrate-validation-error">
											
										</span>
										<span class="chars-count"><em>0</em> / 80 max</span>
									</div>
								</div>
							</div><!--- form-group row Ends --->

							<div class="form-group row"><!--- form-group row Starts --->
								<div class="col-md-3"> Category </div>
								<div class="col-md-9">
									<select name="category_id" id="category_id" class="form-control mb-3" required="">
										<option value="" class="hidden"> Select A Category </option>

										@foreach($categories as $category)
										<option value="{{ $category->id }}" class="hidden"> {{ $category->name }}</option>
										@endforeach
									</select>
									<small class="form-text text-danger"></small>

								</div>
							</div><!--- form-group row Ends --->


							<div class="form-group row"><!--- form-group row Starts --->
								<div class="col-md-3">Search Tags</div>
								<div class="col-md-9">
									<input type="text" name="tags" class="form-control mb-3" data-role="tagsinput">

								</div>
							</div><!--- form-group row Ends --->
							<div class="form-group text-right mb-0"><!--- form-group Starts --->
								<a href="{{ route('user.profile')}}" class="btn btn-secondary">Cancel</a>
								<button class="btn btn-success" type="submit" >Save &amp; Continue</button> 
							</div><!--- form-group Starts --->

						</form><!--- form Ends -->
					</div>

					<!--pricing-->
					<div class="tab-pane fade" id="pricing">
						<h5 class="font-weight-normal float-left">Pricing</h5>
						<div class="float-right switch-box">
							<span class="text">3 packages</span>
							<label class="switch">
								<input type="checkbox" id="on" class="pricing">
								<span class="slider"></span>
							</label>
						</div>

						<div class="clearfix"></div>

						<hr class="mt-0">

						<div class="form-group row proposal-price justify-content-center" style="display: none;">
							<div class="col-md-7">
								<div class="input-group">
									<span class="input-group-addon font-weight-bold">
									$&nbsp;</span>
									<input type="number" class="form-control" form="pricing-form" name="proposal_price" min="0" value="">
								</div>
								<small>If you want to use packages, you need to set this field value to 0. </small>
							</div>
						</div>

						<div class="packages" style="">
							<table class="table table-bordered packages" style="position:relative;">
								<thead>
									<tr>
										<th></th>
										<th>Basic</th>
										<th>Standard</th>
										<th>Premium</th>
									</tr>
								</thead>
								<tbody>
									<form action="#" method="post" class="pricing-form" id="pricing-form"></form>
									<input type="hidden" name="proposal_packages[1][package_id]" form="pricing-form" value="0">
									<input type="hidden" name="proposal_packages[2][package_id]" form="pricing-form" value="">
									<input type="hidden" name="proposal_packages[3][package_id]" form="pricing-form" value="">

									<tr>
										<td></td>
										<td class="p-0"><textarea maxlength="100" name="proposal_packages[1][description]" class="form-control" placeholder="Description"></textarea></td>
										<td class="p-0"><textarea maxlength="100" name="proposal_packages[2][description]" class="form-control" placeholder="Description"></textarea></td>
										<td class="p-0"><textarea maxlength="100" name="proposal_packages[3][description]" class="form-control" placeholder="Description"></textarea></td>
									</tr>

									<tr class="delivery-time">
										<td></td>
										<td class="p-0">
											<select name="proposal_packages[1][delivery_time]" class="form-control">
												<option value="1">1 Day</option><option value="2">2 Days</option><option value="3">3 Days</option><option value="4">4 Days</option><option value="5">5 Days</option><option value="6">6 Days</option><option value="7">7 Days</option>			</select>
											</td>
											<td class="p-0">
												<select name="proposal_packages[2][delivery_time]" form="pricing-form" class="form-control">
													<option value="1">1 Day</option><option value="2">2 Days</option><option value="3">3 Days</option><option value="4">4 Days</option><option value="5">5 Days</option><option value="6">6 Days</option><option value="7">7 Days</option>			</select></td>
													<td class="p-0">
														<select name="proposal_packages[3][delivery_time]" form="pricing-form" class="form-control">
															<option value="1">1 Day</option><option value="2">2 Days</option><option value="3">3 Days</option><option value="4">4 Days</option><option value="5">5 Days</option><option value="6">6 Days</option><option value="7">7 Days</option>			</select>
														</td>
													</tr>

													<tr>
														<td></td>
														<td class="p-0">
															<select name="proposal_packages[1][revisions]" form="pricing-form" class="form-control">
																<option value="0" selected="">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>			</select>
															</td>
															<td class="p-0">
																<select name="proposal_packages[2][revisions]" form="pricing-form" class="form-control">
																	<option value="0" selected="">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>			</select>
																</td>
																<td class="p-0">
																	<select name="proposal_packages[3][revisions]" form="pricing-form" class="form-control">
																		<option value="0" selected="">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>			</select>
																	</td>
																</tr>

																<tr>
																	<td>Price</td>
																	<td class="p-0">
			<!-- <select name="" class="form-control">
				<option value='5'selected>&#036;5</option><option value='10'>&#036;10</option><option value='15'>&#036;15</option><option value='20'>&#036;20</option><option value='25'>&#036;25</option><option value='50'>&#036;50</option><option value='60'>&#036;60</option><option value='70'>&#036;70</option><option value='80'>&#036;80</option><option value='90'>&#036;90</option><option value='100'>&#036;100</option>			</select> -->
				<input type="number" min="5" required="" name="proposal_packages[1][price]" form="pricing-form" value="5" class="form-control">
			</td>
			<td class="p-0">
			<!-- <select name="proposal_packages[2][price]" class="form-control">
				<option value='5'>&#036;5</option><option value='10'>&#036;10</option><option value='15'>&#036;15</option><option value='20'>&#036;20</option><option value='25'>&#036;25</option><option value='50'>&#036;50</option><option value='60'>&#036;60</option><option value='70'>&#036;70</option><option value='80'>&#036;80</option><option value='90'>&#036;90</option><option value='100'>&#036;100</option>			</select> -->
				<input type="number" min="5" required="" name="proposal_packages[2][price]" form="pricing-form" value="" class="form-control">
			</td>
			<td class="p-0">
			<!-- <select name="proposal_packages[3][price]" class="form-control">
			<option value='5'>&#036;5</option><option value='10'>&#036;10</option><option value='15'>&#036;15</option><option value='20'>&#036;20</option><option value='25'>&#036;25</option><option value='50'>&#036;50</option><option value='60'>&#036;60</option><option value='70'>&#036;70</option><option value='80'>&#036;80</option><option value='90'>&#036;90</option><option value='100'>&#036;100</option>  
		</select> -->
		<input type="number" min="5" required="" name="proposal_packages[3][price]" form="pricing-form" value="" class="form-control">
		<div id="info">
			<b><span>Unlock your potential<br>revenue with all 3 Packages</span></b>
			<div class="try-btn-wrapper">
				<button class="fit-button fit-button-color-blue fit-button-fill-full fit-button-size-medium co-white bg-co-blue-700">Try Now</button>
			</div><a href="#!" class="learn-more-link">Learn more</a></div>
			
		</td>
	</tr>

</tbody>

</table>



</div>


<div class="card rounded-0">
	<div class="card-body bg-light pt-3 pb-0">
		<h6 class="font-weight-normal">Add extra services</h6>
		<a data-toggle="collapse" href="#insert-extra" class="small text-success collapsed" aria-expanded="false">+ Add Gig Extra</a>
		<div class="tabs accordion mt-2" id="allTabs"><!--- All Tabs Starts --->
			<div class="tab">
				<!-- tab rounded Starts -->
				<div class="tab-body rounded border-1 p-3 pb-0 collapse" id="insert-extra" data-parent="#allTabs" style="">
					<form action="#" method="post" class="add-extra">
						<div class="form-group">
							<input type="text" name="name" placeholder="Title" class="form-control form-control-sm" required="">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<input type="text" name="name" placeholder="Description" class="form-control form-control-sm" required="">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<div class="input-group input-group-sm">
								<!--- input-group Starts --->
								<span class="attr for-extra">For an extra </span>
								<div class="fit-input-wrapper price-stepper fit-input-icon-start">
									<div class="fit-input-inner-wrapper"><input class="fit-input" type="number" step="5" min="5" max="500" value=""></div>
								</div><span class="for-extra"> $ </span><span class="for-additional">&nbsp;and an additional</span>
								<select name="extra1" form="pricing-form" class="form-control">
									<option value="0" selected="">Select</option>
									<option value="0" selected="">1 Day</option>
									<option value="0" selected="">2 Days</option>
								</select>
								<small class="form-text text-danger"></small>
								<!--- input-group Ends --->
							</div>
							<div class="form-group mb-0">
								<button type="submit" class="btn btn-success btn-sm float-right">Insert</button>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
				<!-- tab rounded Ends -->

			</div><!--- All Tabs Ends --->
		</div>
	</div>

	<div class="form-group mt-4 mb-0"><!--- form-group Starts --->
		<a href="#" class="btn btn-secondary float-left back-to-overview">Back</a>
		<input class="btn btn-success float-right" type="submit" form="pricing-form" value="Save &amp; Continue">
	</div><!--- form-group Starts --->

</div>
</div>

<!--description and faq-->
<div class="tab-pane fade" id="description">
	<h5 class="font-weight-normal">Description</h5>
	<hr>
	<p class="small mb-2"> Project Details </p>

	<form action="#" method="post" class="proposal-form" id="form1"><!--- form Starts -->
		<div class="form-group">
			<textarea rows="7" name="proposal_desc" placeholder="Write your description" class="form-control proposal-desc" style="display: none;"></textarea>
			<div class="note-editor note-frame card"><div class="note-dropzone">  <div class="note-dropzone-message"></div>
		</div>
		<div class="note-toolbar-wrapper" style="height: 78.5667px;">
			<div class="note-toolbar card-header" style="position: relative; top: 0px; width: 100%;">
				<div class="note-btn-group btn-group note-style"><div class="note-btn-group btn-group">
					<button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Style"><i class="note-icon-magic"></i></button><div class="dropdown-menu dropdown-style"><a class="dropdown-item" href="#" data-value="p"><p>Normal</p></a><a class="dropdown-item" href="#" data-value="blockquote"><blockquote class="blockquote">Blockquote</blockquote></a><a class="dropdown-item" href="#" data-value="pre"><pre>Code</pre></a><a class="dropdown-item" href="#" data-value="h1"><h1>Header 1</h1></a><a class="dropdown-item" href="#" data-value="h2"><h2>Header 2</h2></a><a class="dropdown-item" href="#" data-value="h3"><h3>Header 3</h3></a><a class="dropdown-item" href="#" data-value="h4"><h4>Header 4</h4></a><a class="dropdown-item" href="#" data-value="h5"><h5>Header 5</h5></a><a class="dropdown-item" href="#" data-value="h6"><h6>Header 6</h6></a></div></div></div><div class="note-btn-group btn-group note-font"><button type="button" class="note-btn btn btn-light btn-sm note-btn-bold" tabindex="-1" title="" data-original-title="Bold (CTRL+B)"><i class="note-icon-bold"></i></button><button type="button" class="note-btn btn btn-light btn-sm note-btn-underline" tabindex="-1" title="" data-original-title="Underline (CTRL+U)"><i class="note-icon-underline"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Remove Font Style (CTRL+\)"><i class="note-icon-eraser"></i></button></div><div class="note-btn-group btn-group note-fontname"><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Font Family"><span class="note-current-fontname" style="font-family: sans-serif;">sans-serif</span></button><div class="dropdown-menu note-check dropdown-fontname"><a class="dropdown-item" href="#" data-value="Arial"><i class="note-icon-menu-check"></i> <span style="font-family: 'Arial'">Arial</span></a><a class="dropdown-item" href="#" data-value="Arial Black"><i class="note-icon-menu-check"></i> <span style="font-family: 'Arial Black'">Arial Black</span></a><a class="dropdown-item" href="#" data-value="Comic Sans MS"><i class="note-icon-menu-check"></i> <span style="font-family: 'Comic Sans MS'">Comic Sans MS</span></a><a class="dropdown-item" href="#" data-value="Courier New"><i class="note-icon-menu-check"></i> <span style="font-family: 'Courier New'">Courier New</span></a><a class="dropdown-item" href="#" data-value="Helvetica Neue"><i class="note-icon-menu-check"></i> <span style="font-family: 'Helvetica Neue'">Helvetica Neue</span></a><a class="dropdown-item" href="#" data-value="Helvetica"><i class="note-icon-menu-check"></i> <span style="font-family: 'Helvetica'">Helvetica</span></a><a class="dropdown-item" href="#" data-value="Impact"><i class="note-icon-menu-check"></i> <span style="font-family: 'Impact'">Impact</span></a><a class="dropdown-item" href="#" data-value="Tahoma"><i class="note-icon-menu-check"></i> <span style="font-family: 'Tahoma'">Tahoma</span></a><a class="dropdown-item" href="#" data-value="Times New Roman"><i class="note-icon-menu-check"></i> <span style="font-family: 'Times New Roman'">Times New Roman</span></a><a class="dropdown-item" href="#" data-value="Verdana"><i class="note-icon-menu-check"></i> <span style="font-family: 'Verdana'">Verdana</span></a></div></div></div><div class="note-btn-group btn-group note-color"><div class="note-btn-group btn-group note-color"><button type="button" class="note-btn btn btn-light btn-sm note-current-color-button" tabindex="-1" title="" data-original-title="Recent Color" data-backcolor="#FFFF00"><i class="note-icon-font note-recent-color" style="background-color: rgb(255, 255, 0);"></i></button><button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="More Color"></button><div class="dropdown-menu"><div class="note-palette">  <div class="note-palette-title">Background Color</div>  <div>    <button type="button" class="note-color-reset btn btn-light" data-event="backColor" data-value="inherit">Transparent    </button>  </div>  <div class="note-holder" data-event="backColor"><div class="note-color-palette"><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#000000" data-event="backColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242" data-event="backColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363" data-event="backColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94" data-event="backColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE" data-event="backColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF" data-event="backColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7" data-event="backColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#FF0000" data-event="backColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00" data-event="backColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00" data-event="backColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00" data-event="backColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF" data-event="backColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF" data-event="backColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF" data-event="backColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF" data-event="backColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#F7C6CE" data-event="backColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE" data-event="backColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6" data-event="backColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6" data-event="backColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7" data-event="backColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7" data-event="backColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7" data-event="backColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE" data-event="backColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E79C9C" data-event="backColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C" data-event="backColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C" data-event="backColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5" data-event="backColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE" data-event="backColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF" data-event="backColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6" data-event="backColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD" data-event="backColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E76363" data-event="backColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B" data-event="backColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663" data-event="backColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B" data-event="backColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD" data-event="backColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE" data-event="backColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6" data-event="backColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5" data-event="backColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#CE0000" data-event="backColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439" data-event="backColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631" data-event="backColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A" data-event="backColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C" data-event="backColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6" data-event="backColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5" data-event="backColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B" data-event="backColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#9C0000" data-event="backColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308" data-event="backColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400" data-event="backColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21" data-event="backColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A" data-event="backColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294" data-event="backColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873" data-event="backColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842" data-event="backColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#630000" data-event="backColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900" data-event="backColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300" data-event="backColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218" data-event="backColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139" data-event="backColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163" data-event="backColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A" data-event="backColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031" data-event="backColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div></div><div class="note-palette">  <div class="note-palette-title">Foreground Color</div>  <div>    <button type="button" class="note-color-reset btn btn-light" data-event="removeFormat" data-value="foreColor">Reset to default    </button>  </div>  <div class="note-holder" data-event="foreColor"><div class="note-color-palette"><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#000000" data-event="foreColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242" data-event="foreColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363" data-event="foreColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94" data-event="foreColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE" data-event="foreColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF" data-event="foreColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7" data-event="foreColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#FF0000" data-event="foreColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00" data-event="foreColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00" data-event="foreColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00" data-event="foreColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF" data-event="foreColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF" data-event="foreColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF" data-event="foreColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF" data-event="foreColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#F7C6CE" data-event="foreColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE" data-event="foreColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6" data-event="foreColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6" data-event="foreColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7" data-event="foreColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7" data-event="foreColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7" data-event="foreColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE" data-event="foreColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E79C9C" data-event="foreColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C" data-event="foreColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C" data-event="foreColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5" data-event="foreColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE" data-event="foreColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF" data-event="foreColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6" data-event="foreColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD" data-event="foreColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E76363" data-event="foreColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B" data-event="foreColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663" data-event="foreColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B" data-event="foreColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD" data-event="foreColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE" data-event="foreColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6" data-event="foreColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5" data-event="foreColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#CE0000" data-event="foreColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439" data-event="foreColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631" data-event="foreColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A" data-event="foreColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C" data-event="foreColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6" data-event="foreColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5" data-event="foreColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B" data-event="foreColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#9C0000" data-event="foreColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308" data-event="foreColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400" data-event="foreColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21" data-event="foreColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A" data-event="foreColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294" data-event="foreColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873" data-event="foreColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842" data-event="foreColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#630000" data-event="foreColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900" data-event="foreColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300" data-event="foreColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218" data-event="foreColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139" data-event="foreColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163" data-event="foreColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A" data-event="foreColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031" data-event="foreColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div></div></div></div></div><div class="note-btn-group btn-group note-para"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Unordered list (CTRL+SHIFT+NUM7)"><i class="note-icon-unorderedlist"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Ordered list (CTRL+SHIFT+NUM8)"><i class="note-icon-orderedlist"></i></button><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Paragraph"><i class="note-icon-align-left"></i></button><div class="dropdown-menu"><div class="note-btn-group btn-group note-align"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Align left (CTRL+SHIFT+L)"><i class="note-icon-align-left"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Align center (CTRL+SHIFT+E)"><i class="note-icon-align-center"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Align right (CTRL+SHIFT+R)"><i class="note-icon-align-right"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Justify full (CTRL+SHIFT+J)"><i class="note-icon-align-justify"></i></button></div><div class="note-btn-group btn-group note-list"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Outdent (CTRL+[)"><i class="note-icon-align-outdent"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Indent (CTRL+])"><i class="note-icon-align-indent"></i></button></div></div></div></div><div class="note-btn-group btn-group note-table"><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Table"><i class="note-icon-table"></i></button><div class="dropdown-menu note-table"><div class="note-dimension-picker">  <div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1" style="width: 10em; height: 10em;"></div>  <div class="note-dimension-picker-highlighted"></div>  <div class="note-dimension-picker-unhighlighted"></div></div><div class="note-dimension-display">1 x 1</div></div></div></div><div class="note-btn-group btn-group note-insert"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Link (CTRL+K)"><i class="note-icon-link"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Picture"><i class="note-icon-picture"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Video"><i class="note-icon-video"></i></button></div><div class="note-btn-group btn-group note-view"><button type="button" class="note-btn btn btn-light btn-sm btn-fullscreen" tabindex="-1"><i class="note-icon-arrows-alt"></i></button><button type="button" class="note-btn btn btn-light btn-sm btn-codeview" tabindex="-1"><i class="note-icon-code"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1"><i class="note-icon-question"></i></button></div></div></div><div class="note-editing-area">

						<div class="note-handle">
							<div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><textarea class="note-codable"></textarea><div class="note-editable card-block" style="height: 200px;" contenteditable="true"><p><br></p></div></div><div class="note-statusbar">  <div class="note-resizebar">    <div class="note-icon-bar"></div>    <div class="note-icon-bar"></div>    <div class="note-icon-bar"></div>  </div></div><div class="modal link-dialog" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <h4 class="modal-title">Insert Link</h4>      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>    </div>    <div class="modal-body"><div class="form-group note-form-group"><label class="note-form-label">Text to display</label><input class="note-link-text form-control note-form-control  note-input" type="text"></div><div class="form-group note-form-group"><label class="note-form-label">To what URL should this link go?</label><input class="note-link-url form-control note-form-control note-input" type="text" value="http://"></div><label class="custom-control custom-checkbox" for="sn-checkbox-open-in-new-window"> <input type="checkbox" class="custom-control-input" id="sn-checkbox-open-in-new-window" checked=""> <span class="custom-control-indicator"></span> <span class="custom-control-description">Open in new window</span></label></div>    <div class="modal-footer"><button type="submit" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" disabled="">Insert Link</button></div>  </div></div></div><div class="modal" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <h4 class="modal-title">Insert Image</h4>      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>    </div>    <div class="modal-body"><div class="form-group note-form-group note-group-select-from-files"><label class="note-form-label">Select from files</label><input class="note-image-input note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple"></div><div class="form-group note-group-image-url" style="overflow:auto;"><label class="note-form-label">Image URL</label><input class="note-image-url form-control note-form-control note-input  col-md-12" type="text"></div></div>    <div class="modal-footer"><button type="submit" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" disabled="">Insert Image</button></div>  </div></div></div><div class="modal" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <h4 class="modal-title">Insert Video</h4>      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>    </div>    <div class="modal-body"><div class="form-group note-form-group row-fluid"><label class="note-form-label">Video URL <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input class="note-video-url form-control note-form-control note-input" type="text"></div></div>    <div class="modal-footer"><button type="submit" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" disabled="">Insert Video</button></div>  </div></div></div><div class="modal" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <h4 class="modal-title">Help</h4>      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>    </div>    <div class="modal-body" style="max-height: 300px; overflow: scroll;"><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert Paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Undoes the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Redoes the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Set a bold style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Set a italic style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Set a underline style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Set a strikethrough style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Clean a style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Set left align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set center align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Set right align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Set full align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Toggle unordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Toggle ordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Outdent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Indent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Change current block's format as a paragraph(P tag)</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Change current block's format as H1</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Change current block's format as H2</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Change current block's format as H3</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Change current block's format as H4</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Change current block's format as H5</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Change current block's format as H6</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Insert horizontal rule</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Show Link Dialog</span></div>    <div class="modal-footer"><p class="text-center"><a href="http://summernote.org/" target="_blank">Summernote 0.8.9</a> · <a href="https://github.com/summernote/summernote" target="_blank">Project</a> · <a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a></p></div>  </div></div></div></div>
							<small class="form-text text-danger"></small>
						</div>
					</form><!--- form Ends -->

					<hr class="mt-0">
					<h5 class="font-weight-normal"> Frequently Asked Questions  <small class="float-right"><a data-toggle="collapse" href="#insert-faq" class="text-success">+ Add Faq</a></small></h5>
					<hr>
					<div class="tabs accordion mt-2" id="faqTabs"><!--- All Tabs Starts --->

						<div class="tab"><!-- tab rounded Starts -->

							<div class="tab-body rounded border-1 p-3 pb-0 collapse" id="insert-faq" data-parent="#faqTabs">

								<form action="" method="post" class="add-faq">

									<div class="form-group mb-2">

										<input type="text" name="title" placeholder="Faq Title" class="form-control form-control-sm" required="">

									</div>

									<div class="form-group mb-2">

										<textarea name="content" rows="3" placeholder="Faq Content" class="form-control form-control-sm"></textarea>

									</div>

									<div class="form-group mb-0">

										<button type="submit" class="btn btn-success btn-sm float-right">Insert</button>

										<div class="clearfix"></div>

									</div>

								</form>	

							</div>

						</div><!-- tab rounded Ends -->
					</div><!--- All Tabs Ends --->

					<div class="form-group mb-0"><!--- form-group Starts --->
						<a href="#" class="btn btn-secondary float-left backButton">Back</a>
						<input class="btn btn-success float-right" type="submit" form="form1" value="Save &amp; Continue">
					</div><!--- form-group Starts --->

				</div>
				<div class="tab-pane fade" id="requirements">
					<form action="#" method="post" class="proposal-form"><!--- form Starts -->

						<h5 class="font-weight-normal">



							<span class="float-left">

								Get all the information you need from buyers to get started<br>

								<small class="text-muted">Add questions to help buyers provide you with exactly what you need to start working on their order.</small>

							</span>

							<div class="clearfix"></div>

						</h5>

						<hr>

						<div class="form-group requirements">
							<p class="mb-1">Add a question <span class="float-right"><input type="checkbox" checked=""> Required </span></p>

							<textarea name="buyer_instruction" placeholder="" rows="4" class="form-control" spellcheck="false"></textarea>
							<p class="" >Get it in the form of <select name="req-options" form="" class="form-control">
								<option value="0" selected="">Free text</option>
								<option value="0" selected="">Multiple choice</option>
								<option value="0" selected="">Attachments</option>
							</select></p>
						</div>


						<div class="form-group mb-0"><!--- form-group Starts --->

							<a href="#" class="btn btn-secondary float-left back-to-desc">Back</a>

							<input class="btn btn-success float-right" type="submit" value="Save &amp; Continue">

						</div><!--- form-group Starts --->

					</form><!--- form Ends -->

				</div>

				<!--gallery-->
				<div class="tab-pane fade" id="gallery">
					<h5 class="font-weight-normal">Build Your Gig Gallery</h5>
					<h6 class="font-weight-normal">Add memorable content to your gallery to set yourself apart from competitors.</h6>

					<hr>

					<p class="text-right mb-0">
						<span class="float-left">Gig Photos </span>
						<small class="text-muted" style="font-size: 78%;">Upload Photos that describe or related to your Gig.your image size must be 700 x 390 pixels.</small>
					</p>

					<form action="" class="proposal-form" id="gallery_form"><!--- form Starts --->
						<div class="row gallery"><!--- row gallery Starts --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic add-pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse Image</span>
									<input type="hidden" name="proposal_img1" value="">
								</div>
							</div><!--- col-md-3 Ends --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse Image</span>
									<input type="hidden" name="proposal_img2" value="">
								</div>
							</div><!--- col-md-3 Ends --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse Image</span>
									<input type="hidden" name="proposal_img2" value="">
								</div>
							</div><!--- col-md-3 Ends --->

						</div><!--- row gallery Ends --->
						<hr>
						<p class="text-right mb-0">
							<span class="float-left">Add Videoadd_proposal_video</span>
							<small class="text-muted" style="font-size: 78%;">Please choose a video shorter than 75 seconds and smaller than 50MB</small>
						</p>
						<div class="row gallery"><!--- row gallery Starts --->
							<div class="col-md-12"><!--- col-md-3 Starts --->
								<div class="pic add-video">
									<span class="chose"><i class="fa fa-video-camera fa-2x mb-2"></i><br>Add Video</span>
									<input type="hidden" name="proposal_video" value="" id="v_file"> 
								</div>
							</div><!--- col-md-3 Ends --->
						</div><!--- row gallery Ends --->

						<hr>
						<p class="text-right mb-0">
							<span class="float-left">Gig Audio</span>
							<small class="text-muted" style="font-size: 78%;">Complement your video with additional audio samples showcasing your talent.</small>
						</p>
						<div class="row gallery"><!--- row gallery Starts --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic add-pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse audio</span>
									<input type="hidden" name="proposal_img1" value="">
								</div>
							</div><!--- col-md-3 Ends --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse audio</span>
									<input type="hidden" name="proposal_img2" value="">
								</div>
							</div><!--- col-md-3 Ends --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse audio</span>
									<input type="hidden" name="proposal_img2" value="">
								</div>
							</div><!--- col-md-3 Ends --->
						</div><!--- row gallery Ends --->
						<hr>
						<p class="text-right mb-0">
							<span class="float-left">Gig PDFs</span>
							<small class="text-muted" style="font-size: 78%;">We only recommend adding a PDF file if it further clarifies the service you will be providing.</small>
						</p>
						<div class="row gallery"><!--- row gallery Starts --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse PDF</span>
									<input type="hidden" name="proposal_img2" value="">
								</div>
							</div><!--- col-md-3 Ends --->
							<div class="col-md-3"><!--- col-md-3 Starts --->
								<div class="pic">
									<i class="fa fa-picture-o fa-2x mb-2"></i><br> <span>Browse PDF</span>
									<input type="hidden" name="proposal_img2" value="">
								</div>
							</div><!--- col-md-3 Ends --->
						</div><!--- row gallery Ends --->
					</form><!--- form Ends --->

					<div class="mb-5"></div>

					<div class="form-group mb-0"><!--- form-group Starts --->

						<a href="#" class="btn btn-secondary float-left back-to-req">Back</a>

						<input class="btn btn-success float-right" type="submit" form="gallery_form" value="Save &amp; Continue">
						<a href="" id="previewProposal" class="btn btn-success float-right mr-3 d-none">Preview</a>

					</div><!--- form-group Starts --->

				</div>

				<!--publish-->
				<div class="tab-pane" id="publish">

					<h1><img style="position:relative; top:-5px;">  Alomost there!</h1>
					<h3 class="gig-edit-sec-sttl">Let's publish your Gig and get <br> some buyers rolling in.</h3>

					<form action="" method="post">

						<div class="form-group mb-0 mt-3"><!--- form-group Starts --->
							<a href="#" class="btn btn-secondary back-to-gallery">Back</a>
							<input class="btn btn-success" type="submit" name="submit_proposal" value="Publish gig">

						</div><!--- form-group Starts --->
					</form>

				</div>
			</div><!--tab-content-->
		</div><!--- row Ends --->

	</section>
	<script>
		$(document).ready(function(){
			$('#on').on('change',function(){

				if(this.checked){

					$("#info").hide();
				}
				else{
					$("#info").show();	
				}
			});

			$('#section_title_counter').text('80');
		});

	</script>

</div>

@endsection

