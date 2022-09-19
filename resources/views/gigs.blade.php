@extends('layouts.master')
@section('main_content')


	<div class="cat-menu">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Graphics & Design</a></li>
						<li><a href="#">Digital Marketing</a></li>
						<li><a href="#">Fun & Lifestyle </a></li>
						<li><a href="#">Business</a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Writing & Translation <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
						</li>

						<li><a href="#">Programming & Tech</a></li>
						<li><a href="#"> Video & Animation</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Writing & Translation <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
					  </li>
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
	</div>

		<section class="team_area best_freelancer"  style="padding-top: 50px" >
            <div class="container">
                <div class="main-search">
                    <form class="mailchimp" method="post" novalidate="">
                        <div class="input-group  subcribes custom-width">
                            <input type="email" name="EMAIL" class="form-control memail" placeholder="Type Anything to search...">
                            <span class="input-group-btn">
                            <button class="btn btn-submit base-color custom-mg" type="submit">Search </button>
                        </span>
                        </div>
                        <div class="tagbox">
                            <span class="btn-link btn btn-sm" style="color: #666;font-size: 13px;">Popular Search:</span>
                            <span class="btn-default btn btn-sm">Video /</span>
                            <span class="btn-default btn btn-sm">Graphics /</span>
                            <span class="btn-default btn btn-sm">Logo /</span>
                            <a href="" class="adv-sch pull-right">Advance Search</a>
                        </div>
                    </form>
                </div>

				<div class="sec_title_five sec_five">
					<div><h2>Popular Gigs</h2></div>
					<div class="br"></div>
				</div>
				<span class="clearfix"></span>

                <div class="row m0 team-carousel owl-carousel">
                    <div class="team_member">
                        <img src="{{asset('front_assets/image/logo_design.png')}}" alt="member">
						<div class="content text-left">
                            <img class="img-circle img-thumbnail" src="{{asset('front_assets/image/logo_design.png')}}" alt="test">
                            <div class="seller-info">
								<span>Zannat</span>
								<p class="orange">Top Rated Seller</p>
                            </div>
                            <div class="gig-title">
								<a href="{{URL::to('/')}}/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>
                            </div>
                            <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>
                        </div>
                        <div class="gig-footer dis-flex">
							<a href="{{URL::to('/')}}/gig_detail/2"><i class="fa  fa-heart-o"></i></a>
							<span class="pull-right">Starting <b>$5</b></span>
                        </div>
                    </div>
                    <div class="team_member">
                        <img src="{{asset('front_assets/image/logo_design.png')}}" alt="member">
						<div class="content text-left">
                            <img class="img-circle img-thumbnail" src="{{asset('front_assets/image/logo_design.png')}}" alt="test">
                            <div class="seller-info">
								<span>Zakiah</span>
								<p class="orange">Top Rated Seller</p>
                            </div>
                            <div class="gig-title">
								<a href="{{URL::to('/')}}/gig_detail/1">I will create eye catching 2d animation or cartoon explainer.</a>
                            </div>
                            <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>
                        </div>
                        <div class="gig-footer dis-flex">
							<a href="{{URL::to('/')}}/gig_detail/1"><i class="fa  fa-heart-o"></i></a>
							<span class="pull-right">Starting <b>$5</b></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gig-box">
				<div class="container">
					<div class="row">
                       <div class="col-md-12">
                        <div class="sec_title_five sec_five mb0">
                            <div><h2>Main Gig List</h2></div>
                            <div class="br"></div>
                        </div>
                        <span class="clearfix"></span>
                       </div>

					   <?php for($i=1; $i<=20; $i++) { ?>
						<div class="col-md-3">
							 <div class="team_member gigbox">
								<img src="{{asset('front_assets/image/logo_design.png')}}" alt="member">
								<div class="content text-left">
									<img class="img-circle img-thumbnail" src="{{asset('front_assets/image/logo_design.png')}}" alt="test">
									<div class="seller-info">
										<span>GIGS - <?php echo $i;  ?></span>
										<p class="orange">Top Rated Seller</p>
									</div>
									<div class="gig-title">
										<a href="{{URL::to('/')}}/gig_detail/<?php echo $i;?>">I will create eye catching 2d animation or cartoon explainer.</a>
									</div>
									<div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>
								</div>
								<div class="gig-footer dis-flex">
									<a href="{{URL::to('/')}}/gig_detail/<?php echo $i;?>"><i class="fa  fa-heart-o"></i></a>
									<span class="pull-right">Starting <b>$5</b></span>
								</div>
							</div>
						</div>
					   <?php } ?>
                    </div>
                </div>
            </div>



			<div class="banner-box" style="background: url({{asset('front_assets/image/hands-people-woman-working.jpg')}});">
				<section class="more_text_area" style="padding-top: 70px;">
					<div class="container">
						<div class="more_content">
							<h3 style="color: #fff;">Take a look in our   Our Service   and discover perfect service  for  your  company.</h3>
						</div>
						<a href="#" class="btn more_btn">Explore More</a>
					   <br /> <br /> <br />
					</div>
				</section>
            </div>

            <div class="gig-box recent">
				<div class="container">
					<div class="row">
                       <div class="col-md-12">
                        <div class="sec_title_five sec_five mb0">
                            <div><h2>Recent View Gigs List</h2></div>
                            <div class="br"></div>
                            </div>
                            <span class="clearfix"></span>
                       </div>
						<div class="col-md-3">
							<div class="team_member gigbox">
								<img src="{{asset('front_assets/image/logo_design.png')}}" alt="member">
								<div class="content text-left">
									<img class="img-circle img-thumbnail" src="https://via.placeholder.com/40" alt="test">
									<div class="seller-info">
									<span>weperfectionist</span>
									<p class="orange">Top Rated Seller</p>
									</div>
									<div class="gig-title">
										<a href="{{URL::to('/')}}/gig_detail/1"> I will create eye catching 2d animation or cartoon explainer.</a>
									</div>
									<div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>
								</div>
								<div class="gig-footer dis-flex">
								<a href="{{URL::to('/')}}/gig_detail/1"><i class="fa  fa-heart-o"></i></a>
								<span class="pull-right">Starting <b>$5</b></span>
								</div>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </section>


@endsection
