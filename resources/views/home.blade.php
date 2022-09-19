@extends('layouts.master')
@section('main_content')
    <!--Main Slider-->
	        <style>
		.carousel-inner{
			overflow: hidden !important;
		}
		.carousel-caption{
			text-align: right !important;

		}
        .carousel-caption h3{
            color: #fff;
        }
        .carousel-caption h3 small{
            font-size: 12px;
                color: #fff;
                font-weight: bold;
        }
        .carousel-caption p{
            font-size: 13px;
            margin-top: 10px;
			line-height: 17px;
            color: #fff;
        }
        </style>
    <section id="home">
        <div id="bootstrap-touch-slider" class="bs-slider">


                <div class="img-wrapper">
                    <!-- Slide Background -->
                      <img src="{{asset('image/hands-people-woman-working.jpg')}}"  alt="Bootstrap Touch Slider" class="slide-image" />
                    <div class="bs-slider-overlay"></div>
                </div>



            <!-- End of Wrapper For Slides -->
            <div class="slider_content">
                <div class="container">
                    <div class="row" style="height: 100vh; ">
                        <div class="col-sm-7 col-header-text lr-padding" style="padding-top: 240px;">
                            <h1>Find The Perfect  <br/>Services For Your  Business</h1>
                            <br />
                            <div>
                                <form class="mailchimp" method="post" novalidate="">
                                    <div class="input-group  subcribes custom-width">
                                        <input type="email" name="EMAIL" class="form-control memail" placeholder="Type Anything to search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-submit base-color custom-mg" type="submit">Search </button>
                                        </span>
                                    </div>
                                    <br />
                                    <div >
                                    <span class="btn-link btn btn-sm" style="color: #fff;font-size: 14px;">Popular Tags</span>
                                    <span class="btn-white btn btn-sm">Video</span>
                                    <span class="btn-white btn btn-sm">Graphics</span>
                                    <span class="btn-white btn btn-sm">Logo</span>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col-md-5  right-padding">
                           <div class="mkau carousel slide carousel-fadein" style="vertical-align: bottom;"  data-ride="carousel" data-interval="3000">
                                <div class="carousel-inner">
									<div class="carousel-item active">
                                        <img src="{{asset('image/lancer3.png')}}" alt="Chania">
                                        <div class="carousel-caption">
                                            <h3>Donald <br /><small>Software Engineer</small></h3>
                                            <p><i class="fa fa-quote-left" style="color: #FF9100;" aria-hidden="true"></i> Lorem ipsum dolor sit amet. <i class="fa fa-quote-right" style="color: #FF9100;"  aria-hidden="true"></i></p>
                                        </div>
                                    </div>
									<div class="carousel-item">
                                        <img src="{{asset('image/lancer2.png')}}" alt="Chania">
                                        <div class="carousel-caption">
                                            <h3>Laurel <br /><small>Freelance writer</small></h3>
                                            <p><i class="fa fa-quote-left" style="color: #FF9100;" aria-hidden="true"></i> Lorem ipsum dolor sit amet. <i class="fa fa-quote-right" style="color: #FF9100;"  aria-hidden="true"></i></p>
                                        </div>
                                    </div>
                                   <div class="carousel-item">
                                        <img src="{{asset('image/lancer4.png')}}" alt="Chania">
                                        <div class="carousel-caption">
                                            <h3>Ausborn <br /><small>Graphics Designer</small></h3>
                                            <p><i class="fa fa-quote-left" style="color: #FF9100;" aria-hidden="true"></i> Lorem ipsum dolor sit amet. <i class="fa fa-quote-right" style="color: #FF9100;"  aria-hidden="true"></i></p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Start overview area -->
    <section class="overview_area_70" id="features">
        <div class="container">
        <div class="sec_title_five sec_five">
            <h2>Work Categroy</h2>
            <div class="br"></div>
        </div>
            <div class="row">
				<?php 
				$client_details = DB::table( 'sub_categories as bc' )			                    
			                    ->where( "sub_c_home", "=", 1 )
			                    ->get();
				?>
				@foreach($client_details as $row)
                <div class="col-sm-2">
                    <div class="overview_item">
                        <img src="{{asset('public/logo/'.$row->sub_c_image)}}" alt="" height="50px" />
                        <h2 class="title">{{$row->sub_c_name}}</h2>
                    </div>
                </div>
				@endforeach
                <!--div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/android.png')}}" alt="" height="50px" />
                        <h2 class="title">Web Research</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/website-design-symbol.png')}}" alt="" height="50px" />
                        <h2 class="title">Web Designing</h2>

                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                       <img src="{{asset('icon/html5.png')}}" alt="" height="50px" />
                        <h2 class="title">Html Design</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/wp.svg')}}" alt="" height="50px" />
                        <h2 class="title">Wordpress</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                       <img src="{{asset('icon/html5.png')}}" alt="" height="50px" />
                        <h2 class="title">Html Design</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/apple.png')}}" alt="" height="50px" />
                        <h2 class="title">App Development</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                        <img src="{{asset('icon/idea.png')}}" alt="" height="50px" />
                        <h2 class="title">Android</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/android.png')}}" alt="" height="50px" />
                        <h2 class="title">Web Research</h2>
                    </div>
                </div>
                 <div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/apple.png')}}" alt="" height="50px" />
                        <h2 class="title">App Development</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/website-design-symbol.png')}}" alt="" height="50px" />
                        <h2 class="title">Web Designing</h2>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="overview_item">
                      <img src="{{asset('icon/wp.svg')}}" alt="" height="50px" />
                        <h2 class="title">Wordpress</h2>
                    </div>
                </div-->
            </div>
            <br /><br /><br />
        </div>
    </section>
    <!--End overview area -->
<section style="background: #f3f3f3; padding-bottom: 43px;">
    <div class="container">
        <div class="cl_slider">
            <div class="clients-lg-slider owl-carousel">
                <div class="item">
                   <a href="#"><img src="{{asset('image/clients-logo/logo5.png')}}" alt=""></a>
                </div>
                <div class="item">
                   <a href="#"><img src="{{asset('image/clients-logo/logo6.png')}}" alt=""></a>
                </div>

                <div class="item">
                   <a href="#"><img src="{{asset('image/clients-logo/logo8.png')}}" alt=""></a>
                </div>
                <div class="item">
                   <a href="#"><img src="{{asset('image/clients-logo/logo5.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

{{--<section class="team_area best_freelancer" id="team" style="margin-bottom: 29px !important;">--}}
{{--    <div class="container">--}}
{{--        <div class="sec_title_five sec_five">--}}
{{--            <div><h2>Popular Gigs</h2></div> <a href="" class="pull-right banner_btn btn-getnow  " style="margin-top: -42px !important;">View All</a>--}}
{{--            <div class="br"></div>--}}
{{--        </div>--}}
{{--        <span class="clearfix"></span>--}}
{{--     --}}
{{--       --}}

{{--            <div class="cl_slider gig-slider">--}}
{{--            <div class="clients-lg-slider owl-carousel">--}}
{{--                <div class="item">--}}
{{--                    <div class="team_member gigbox">--}}
{{--                    <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                    <div class="content text-left">--}}
{{--                        <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                        <div class="seller-info">--}}
{{--                            <span>weperfectionist</span>--}}
{{--                            <p class="orange">Top Rated Seller</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                   <div class="team_member gigbox">--}}
{{--                    <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                    <div class="content text-left">--}}
{{--                        <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                        <div class="seller-info">--}}
{{--                            <span>weperfectionist</span>--}}
{{--                            <p class="orange">Top Rated Seller</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}

{{--                <div class="item">--}}
{{--                     <div class="team_member gigbox">--}}
{{--                    <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                    <div class="content text-left">--}}
{{--                        <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                        <div class="seller-info">--}}
{{--                            <span>weperfectionist</span>--}}
{{--                            <p class="orange">Top Rated Seller</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                   <div class="team_member gigbox">--}}
{{--                    <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                    <div class="content text-left">--}}
{{--                        <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                        <div class="seller-info">--}}
{{--                            <span>weperfectionist</span>--}}
{{--                            <p class="orange">Top Rated Seller</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--      --}}
{{--    </div>--}}
{{--</section>--}}

<section class="home-features">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 pro-banner ">
<img src="{{asset('image/slider1.jpg')}}" alt="member">
<h3 class="hero-title" style="color:#212121;">Explore the marketplace</h3>
         </div>

        </div>
    </div>
</section>
<section class="features_area_six features_area_seven" id="features">
    <div class="container">
        <div class="row">
          <div class="col-sm-5  features_content_two">
                <div class="sec_title_five sec_five">
                <span>Let freelancers discover you</span>
                    <h2>Post projects quickly,receive responses even quicker.</h2>
                    <div class="br"></div>
                </div>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="#" class="btn learn_btn">Browse Jobs</a>
            </div>
            <div class="col-sm-7 f_img text-right">
                <img class="features_img_fist" src="{{asset('image/home-6/phone-m3.png')}}" alt="featured">
                <img class="features_img" src="{{asset('image/home-6/app-screen.png')}}" alt="">
            </div>

        </div>
    </div>
</section>

<!--team area-->
    <section class="team_area guide_to_work" id="team">
        <div class="container">
            <div class="section_title color_w">
                <h2>Guide to work with Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit donec tempus pellentesque dui vel tristique purus justo vestibulum eget lectus non gravida ultrices</p>
            </div>
            <div class="row m0 team-carousel owl-carousel">
                <div class="team_member">
                    <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr/logged_out_homepage_perseus/apps/1440-create-website.0fe083f.jpg" alt="member">
                    <div class="content text-left">
                        <h2>Create a Website</h2>
                        <p>Nullam dictum sapien vitae lorem ultr varius. Nulla volutpat nisl augue Proin vehicula mauris.</p>
                    </div>
                </div>
                <div class="team_member">
                    <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr/logged_out_homepage_perseus/apps/1440-digital-marketing.46ef134.jpg" alt="member">
                    <div class="content">
                        <h2>Grow With Digital Marketing</h2>
                        <p>Nullam dictum sapien vitae lorem ultr varius. Nulla volutpat nisl augue Proin vehicula mauris.</p>
                    </div>
                </div>
                <div class="team_member">
                    <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr/logged_out_homepage_perseus/apps/1440-create-website.0fe083f.jpg" alt="member">
                    <div class="content text-left">
                        <h2>Create a Website</h2>
                        <p>Nullam dictum sapien vitae lorem ultr varius. Nulla volutpat nisl augue Proin vehicula mauris.</p>

                    </div>
                </div>
                <div class="team_member">
                    <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr/logged_out_homepage_perseus/apps/1440-digital-marketing.46ef134.jpg" alt="member">
                    <div class="content">
                        <h2>Grow With Digital Marketing</h2>
                        <p>Nullam dictum sapien vitae lorem ultr varius. Nulla volutpat nisl augue Proin vehicula mauris.</p>
                    </div>
                </div>
                <div class="team_member">
                    <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr/logged_out_homepage_perseus/apps/1440-strong-brand.64effa5.jpg" alt="member">
                    <div class="content">
                        <h2>Build a Strong Brand</h2>
                        <p>Nullam dictum sapien vitae lorem ultr varius. Nulla volutpat nisl augue Proin vehicula mauris.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--testimonial_area-->
    <section class="testimonial_area_two testimonial_area_six" id="testimonial">
        <div class="container">
            <div class="sec_title_five text-center">
                <h2>Best Client's Review</h2>
                <div class="br"></div>
            </div>
            <div class="row">
                <div id="test_c_six" class="testimonial_carousel_two owl-carousel">
                    <div class="item">
                        <div class="testimonial_item">
                            <div class="icon">
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus.</p>
                            <div class="media">
                                <div class="media-left">
                                    <img class="img-circle" src="{{asset('image/689-85x85.jpg')}}" alt="test">
                                </div>
                                <div class="media-body">
                                    <h2>John Wilson</h2>
                                    <h6>Director @ LenrikMedia</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_item">
                            <div class="icon">
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <p>polash Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus.</p>
                            <div class="media">
                                <div class="media-left">
                                    <img class="img-circle" src="{{asset('image/689-85x85.jpg')}}" alt="test">
                                </div>
                                <div class="media-body">
                                    <h2>Sayedullah Kabed</h2>
                                    <h6>CEO & Co-founder</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_item">
                            <div class="icon">
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            <div class="media">
                                <div class="media-left">
                                    <img class="img-circle" src="{{asset('image/689-85x85.jpg')}}" alt="test">
                                </div>
                                <div class="media-body">
                                    <h2>Toni Roberts</h2>
                                    <h6>Director @ LenrikMedia</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial_area-->

    <!-- start faq area -->
    <section class="faq-area-2" id="faq">
        <div class="container">
            <div class="sec_title_five text-center">
                <h2>Faq</h2>
                <div class="br"></div>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut <br>fugit, sed consequuntur magni dolores ratione voluptatem sequi nesciunt.</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="panel-group faq-inner-accordion faq_accordian_two" id="accordion" role="tablist">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="btn-accordion" aria-expanded="true" role="button">
                                        <i class="ti-plus plus"></i><i class="ti-minus minus"></i>Aspernatur remaining essentially unchanged?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in" aria-expanded="true" role="tabpanel">
                                <div class="panel-body">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="btn-accordion collapsed" aria-expanded="false">
                                        <i class="ti-plus plus"></i><i class="ti-minus minus"></i>Voluptatem quia voluptas sit aspernatur?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" aria-expanded="false" role="tabpanel">
                                <div class="panel-body">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="btn-accordion collapsed" aria-expanded="false">
                                        <i class="ti-plus plus"></i><i class="ti-minus minus"></i>Combined with a handful sentence structures?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" aria-expanded="false" role="tabpanel">
                                <div class="panel-body">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="btn-accordion collapsed" aria-expanded="false">
                                        <i class="ti-plus plus"></i><i class="ti-minus minus"></i>Many desktop publishing web page?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" aria-expanded="false" role="tabpanel">
                                <div class="panel-body">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="faq-img">
                        <img class="img-responsive" src="https://npm-assets.fiverrcdn.com/assets/@fiverr/logged_out_homepage_perseus/apps/ipadX1.810cb55.gif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End faq area -->
	<script>
$(document).ready(function(){


    $(".home-navbar").css("background", "transparent");
});
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;


  if (currentScrollPos > 20) {

    document.getElementById("scroll-nav-wrapper").style.display = "block";
  } else {
    document.getElementById("scroll-nav-wrapper").style.display = "none";
  }
}
</script>
@endsection


