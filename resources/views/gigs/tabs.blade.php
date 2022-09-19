<header class="lime-header">
	<div class="row max-width-container">

		<div class="col-md-10 offset-md-1">

			<nav id="tabs">
				<div class="breadcrumb flat mb-0 nav" style="justify-content:center;" role="tablist">
					<a class="nav-link {{ request()->is('seller/services/gigs_overview*') ? 'active' : '' }}" href="@if($service->id) {{ route('user.overview_edit', $service->id) }} @else {{ route('user.create_gig') }} @endif">Overview</a>
					<?php
					 $FirstData =  DB::table('services')
								 ->where('id',$service->id) 
								 ->get();
					if(count($FirstData)>0){	 
					?>
					<a class="nav-link {{ request()->is('seller/services/gigs_pricing*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="@if($service->id) {{ route('user.pricing_edit', $service->id) }} @else {{ 'javascript:void(0);' }} @endif">Pricing</a>
					<?php } else { ?>
					<a class="nav-link {{ request()->is('seller/services/gigs_pricing*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="#">Pricing</a>
					<?php } ?>
					<?php
					 $SecondData =  DB::table('service_pricings')
								 ->where('service_id',$service->id) 
								 ->get();
					if(count($SecondData)>0){	 
					?>
					<a class="nav-link {{ request()->is('seller/services/gigs_description*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="@if($service->id) {{ route('user.description_edit', $service->id) }} @else {{ 'javascript:void(0);' }} @endif">Description &amp; FAQ</a>
					<?php } else { ?>
					<a class="nav-link {{ request()->is('seller/services/gigs_description*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="#">Description &amp; FAQ</a>
					<?php } ?>
					<?php
					 $ThirdData =  DB::table('service_descriptions')
								 ->where('service_id',$service->id) 
								 ->get();
					if(count($ThirdData)>0){	 
					?>
					<a class="nav-link {{ request()->is('seller/services/gigs_requirement*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="@if($service->id) {{ route('user.requirement_edit', $service->id) }} @else {{ 'javascript:void(0);' }} @endif">Requirements</a>
					<?php } else { ?>
					<a class="nav-link {{ request()->is('seller/services/gigs_requirement*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="#">Requirements</a>
					<?php } ?>
					<?php
					 $FourthData =  DB::table('service_requirements')
								 ->where('service_id',$service->id) 
								 ->get();
					if(count($FourthData)>0){	 
					?>
                    <a class="nav-link {{ request()->is('seller/services/gigs_gallery*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="@if($service->id) {{ route('user.gallery_edit', $service->id) }} @else {{ 'javascript:void(0);' }} @endif">Gallery</a>
                    <?php } else { ?>
					<a class="nav-link {{ request()->is('seller/services/gigs_gallery*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="#">Gallery</a>
					<?php } ?>
					<?php
					 $FifthData =  DB::table('service_galleries')
								 ->where('service_id',$service->id) 
								 ->get();
					if(count($FifthData)>0){	 
					?>
					<a class="nav-link {{ request()->is('seller/services/gigs_publish*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="@if($service->id) {{ route('user.publish_edit', $service->id) }} @else {{ 'javascript:void(0);' }} @endif">Publish</a>
                     <?php } else { ?>
					 <a class="nav-link {{ request()->is('seller/services/gigs_publish*') ? 'active' : '' }}@if(!$service->id) {{ 'course-id-empty' }} @endif" href="#">Publish</a>
					 <?php } ?>
					<span class="gig-save-wrapper"><a class="gig-save">Save</a></span>
				</div>
              
			</nav>

		</div>
	</div>
</header>
