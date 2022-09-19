@extends('layouts.master')
@section('main_content')

    <header class="lime-header gig-detail-header">
        <div class="max-width-container">
            <div class="gig-detail-links">
                <ul class="nav nav-tabs">
                    <li class="gig-link">
                        <a class="selected" href="#gig-overview">Overview</a>
                    </li>
                    <li class="gig-link">
                        <a class="" href="#gig-description">Description</a>
                    </li>
                    <li class="gig-link">
                        <a class="" href="#gig-about-seller">About The Seller</a>
                    </li>
                    {{--                    @dd($serviceDetails->pricing != null)--}}
                    @if($serviceDetails->pricing != null && $serviceDetails->pricing->count() > 1)
                        <li class="gig-link">
                            <a class="" href="#gig-compare-packages">Compare Packages</a>
                        </li>
                    @elseif($serviceDetails->pricing != null && $serviceDetails->pricing->count() == 1)
                        <li class="gig-link">
                            <a class="" href="#gig-order-details">Order Details</a>
                        </li>
                    @endif
                    {{--                    <li class="gig-link">--}}
                    {{--                        <a class="" href="#gig-reviews">Reviews</a>--}}
                    {{--                    </li>--}}

                    @if($serviceDetails->user->id == @auth()->user()->id)
                        <li class="gig-link">
                            <a class="" href="{{ route('user.overview_edit', $serviceDetails->id) }}"><i class="fa fa-pencil"></i> Edit Gig</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </header>
    <section class="gig-details">
        <div class="max-width-container">
            <div class="row gig-details-row">
                <div class="col-md-7">
                    <div id="gig-overview" class="gig-sub-section">
                        <div class="gig-dtails gig-top">
                            <div class="breadcum"><a href="">{{ $serviceDetails->category->name }}</a> > <a href="">{{ $serviceDetails->subcategory->sub_c_name }} </a></div>
                            <div class="t-title">
                                <h1>I will {{ $serviceDetails->title }}</h1>
                            </div>
                            <div class="t-subtitle">
                                <div class="user-thumb-wrapper">
                                    <img src="{{ $serviceDetails->user->avatar }}" alt="" class="img-circle img-thumbnail img-responsive"/>
                                </div>
                                <div class="uname"><a href="">{{ $serviceDetails->user->name }}</a></div>
                                {{--                                <span><span class="small-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 4.4 </span><b>(20)</b></span>--}}
                            </div>
							
							 <div id="product-slider"  class="carousel slide" data-ride="carousel" align="center">
                                <div class="carousel-inner">
                                    @foreach($serviceDetails->galleries as $key => $gallery)
                                        <div class="carousel-item @if($key == 0) active @endif">
											@if( $gallery->file_type==1)
                                            <img src="{{ asset('/public/service/') }}/{{ $gallery->featured_image }}">
											@elseif( $gallery->file_type==3)
											<iframe id="viewer" src="{{ asset('/public/service/') }}/{{$gallery->featured_image}}" frameborder="0" scrolling="no" width="570" height="250" ></iframe>
											@endif	
                                        </div>

                                    @endforeach
                                    <a class="carousel-control-prev" href="#product-slider" data-slide="prev" role="button">
									<span class="carousel-control-prev-icon"></span> </a>
                                    <a class="carousel-control-next" href="#product-slider" data-slide="next" role="button"> 
									<span class="carousel-control-next-icon"></span> </a>
                                </div>                    
                                <ol class="carousel-indicators list-inline">
								<?php $j=1; $k=0; ?>
								@foreach($serviceDetails->galleries as $key => $gallery)
								<li class="list-inline-item <?php if($j==1){echo 'active';} ?>">
									<a id="carousel-selector-{{$k}}" class="selected" data-slide-to="{{$k}}" data-target="#product-slider"> 
									@if( $gallery->file_type==1)	
									<img src="{{ asset('/public/service/') }}/{{$gallery->featured_image}}" class="img-fluid"> 
									@elseif( $gallery->file_type==3)
									<iframe id="viewer" src="{{ asset('/public/service/') }}/{{$gallery->featured_image}}" frameborder="0" scrolling="no" width="670" height="350" class="img-fluid" ></iframe>
									@endif
									</a> 
								</li>
								<?php $j++; $k++; ?>
								@endforeach 
								</ol>

                            </div>
                        </div>
                    </div>
                    <div id="gig-description" class="gig-dtails gig-sub-section">
                        <h2 class="gig-section-title">About this gig</h2>
                        <div class="gig-desc">{!!  $serviceDetails->descriptions->description ?? '' !!}</td>
                        </div>
                    </div>
                    <div id="gig-about-seller" class="gig-sub-section">
                        <h2 class="gig-section-title">About the seller</h2>
                        <div class="user-about">
                            <div class="user-img">
                                <img src="{{ asset($serviceDetails->user->avatar) }}" alt="" class="img-circle img-thumbnail img-responsive"/>
                            </div>
                            <div class="user-other-detail">
                                <div class="uname">
                                    <a href="">{{ $serviceDetails->user->name }}</a>
                                </div>
                                <!--p>{{ $serviceDetails->user->bio ?? '' }}
                                </p-->
                                <button class="contact btn learn-btn-outline">Contact Me</button>
                            </div>
                        </div>
                        <div class="user-summary">
                            <div class="info">
                                <span class="info-head">From </span><br/>
                                <span class="info-content">{{ $serviceDetails->user->country ?? '' }}</span>
                            </div>
                            <div class="info">
                     <span class="info-head">
                     Member since </span><br/>
                                <span class="info-content">{{ $serviceDetails->user->created_at }}</span>
                            </div>
                            {{--                            <div class="info" style="margin-top: 20px;">--}}
                            {{--                                <span class="info-head">Avg. Response Time</span><br/>--}}
                            {{--                                <span class="info-content">6 hours</span>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="info" style="margin-top: 20px;">--}}
                            {{--                                <span class="info-head">Last Delivery </span><br/>--}}
                            {{--                                <span class="info-content">2 months</span>--}}
                            {{--                            </div>--}}
                            <hr class="gray-border">

                            </hr>
                            <p class="user-info-desc">{{ $serviceDetails->user->description }}
                            </p>
                        </div>
                    </div>

                    @if($serviceDetails->pricing != null && $serviceDetails->pricing->count() == 1)
                        <div id="gig-order-details" class="gig-sub-section">
                            <h2 class="gig-section-title">Order Details</h2>
                            <div class="single-sec">
                                <div class="one-package-title">
                                    @foreach($serviceDetails->pricing as $key => $pricing)
                                        <p class="one-package-name">{{ $pricing->package->name }}</p>
                                        <p class="one-package-price">${{ $pricing->price }}</p>
                                    @endforeach
                                </div>
                                <div class="one-package-content">
                                    @foreach($serviceDetails->pricing as $key => $pricing)
                                        <div class="">
                                            <p class="pricing-details">{{ $pricing->description }}</p>
                                            <div class="delivery">
                                                <div class="delivery-details">
                                                    <b class="delivery-date"> <i class="fa fa-clock-o"></i> {{ $pricing->delivery_date }} days Delivery </b>
                                                    <b class="revisions">  <i class="fa fa-refresh" aria-hidden="true"></i> {{ $pricing->revisions }}
                                                        Revisions</b>
                                                </div>
                                                {{--                                            <ul class="extra-features">--}}
                                                {{--                                                <li><i class="fa fa-check"></i> Stock photos</li>--}}
                                                {{--                                                <li><i class="fa fa-check"></i> Stock photos</li>--}}
                                                {{--                                                <li><i class="fa fa-check"></i> Stock photos</li>--}}
                                                {{--                                                <li><i class="fa fa-check"></i> Stock photos</li>--}}
                                                {{--                                            </ul>--}}
                                                <hr class="gray-border">
                                                <div class="gig-quantity one-package-title">
                                                    <b class="">Gig Quantity</b>
                                                    <label class="select">
                                                        <select class="form-control">
                                                            <option>1 (${{ $pricing->price }})</option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="gig-quantity one-package-title grayed">
                                                    @foreach($serviceDetails->serviceextra as $extra)
                                                        <span class="xf-checked">
                                                    <input type="checkbox" class="" name="xf-delivery"/>&nbsp;{{ $extra->extra_title }}:  {{ $extra->fast_delivery }} Day Delivery</span>
                                                        <span class="xf-price">${{ $extra->extra_price }}</span>
                                                    @endforeach
                                                </div>
                                                <form id="continue-order" action="{{ route('user.order.placed') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="service_id" value="{{ $serviceDetails->id }}">
                                                    <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                                                    <button class="btn  btn-block learn_btn" style="margin-top: 25px;width: 35%;float:right;">Continue ( {{ $pricing->price }}$ )</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                        </div><!--order details ends-->
                    @elseif($serviceDetails->pricing != null && $serviceDetails->pricing->count() > 1)
                        <div id="gig-compare-packages" class="gig-sub-section">
                            <h2 class="gig-section-title">Compare Packages</h2>
                            <div class="table-responsive">
                                <table id="gig-package-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Packages</th>
                                            @foreach($serviceDetails->pricing as $pricing)
                                                <th>
                                                    <div class="multi-package-title" style="margin-top:2px;">
                                                        <p class="one-package-price">${{ $pricing->price }}</p>
                                                        <p class="one-package-name">{{ $pricing->package->name }}</p>

                                                    </div>
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Description</td>
                                        @foreach($serviceDetails->pricing as $pricing)
                                            <td class="pricing-details">{{ $pricing->description }}</td>
                                        @endforeach

                                    </tr>
                                    <tr>
                                        <td>Revisions</td>
                                        @foreach($serviceDetails->pricing as $pricing)
                                            <td>{{ $pricing->revisions }}</td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>Delivery Time</td>
                                        @foreach($serviceDetails->pricing as $pricing)
                                            <td>{{ $pricing->delivery_date }}</td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>Total</td>
                                        @foreach($serviceDetails->pricing as $pricing)
                                            <td>
                                                ${{ $pricing->price }}
                                                <button class="btn  btn-block learn_btn" style="margin-top: 15px;width: 100%;">Select</button>

                                            </td>
                                        @endforeach
                                    </tr>
                                    </tbody>

                                </table>

                            </div>
                        </div><!--compare ends-->
                    @endif
					<?php	
					if(!empty($serviceDetails->tags))	{
					$str_arr = explode (",", trim($serviceDetails->tags));
					?>
						<div id="gig-compare-packages" class="gig-sub-section">
                            <h2 class="gig-section-title">Related Tags</h2>
                            <div class="table-responsive">
							@foreach($str_arr as $list)
                             <span class="badge badge-light" style="border-radius: 0px;background-color: #ccccb3;">{{str_replace(' ', '', $list)}}</span>					 	
							@endforeach	
                            </div>
                        </div><!--tags ends-->
					<?php } ?>
					<!--h2 class="gig-section-title">More Services By <span style="color:blue;">{{ $serviceDetails->user->name }}</span></h2-->
				

                    {{--                    <div id="gig-reviews" class="gig-sub-section">--}}
                    {{--                        <div class="gig-dtails feedback">--}}
                    {{--                            <div class="feed-header">--}}
                    {{--                                <h2 class="gig-section-title">4 Reviews <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>&nbsp;4.4</span></h2>--}}
                    {{--                                <p class="feed-sort">--}}
                    {{--                                    Sort By&nbsp;&nbsp;--}}
                    {{--                                    <label class="select">--}}
                    {{--                                        <select class="form-control">--}}
                    {{--                                            <option>Most Relevant</option>--}}
                    {{--                                            <option>Newest</option>--}}
                    {{--                                            <option>Oldest</option>--}}
                    {{--                                        </select>--}}
                    {{--                                    </label>--}}
                    {{--                                </p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="feed-header" style="margin-bottom: 30px;">--}}
                    {{--                                <ul class="rating-bar-wrap">--}}
                    {{--                                    <li><span class="rate-title">5 stars</span>--}}
                    {{--                                        <div class="progress"><div class="progress-bar bg-warning" style="width:70%"></div></div>--}}
                    {{--                                        <span class="rating-no">(20)</span></li>--}}

                    {{--                                    <li><span class="rate-title">4 stars</span>--}}
                    {{--                                        <div class="progress"><div class="progress-bar bg-warning" style="width:0"></div></div>--}}
                    {{--                                        <span class="rating-no">(0)</span></li>--}}

                    {{--                                    <li><span class="rate-title">3 stars</span>--}}
                    {{--                                        <div class="progress"><div class="progress-bar bg-warning" style="width:60%"></div></div>--}}
                    {{--                                        <span class="rating-no">(17)</span></li>--}}

                    {{--                                    <li><span class="rate-title">2 stars</span>--}}
                    {{--                                        <div class="progress"><div class="progress-bar bg-warning" style="width:0"></div></div>--}}
                    {{--                                        <span class="rating-no">(0)</span></li>--}}
                    {{--                                    <li><span class="rate-title">1 star</span>--}}
                    {{--                                        <div class="progress"><div class="progress-bar bg-warning" style="width:20%"></div></div>--}}
                    {{--                                        <span class="rating-no">(2)</span></li>--}}
                    {{--                                </ul>--}}

                    {{--                                <div class="breakdown-wrap">--}}
                    {{--                                    <b>Rating Breakdown</b>--}}
                    {{--                                    <div class="feed-header">--}}
                    {{--                                        <ul class="break-ul">--}}
                    {{--                                            <li>Seller communication level</li>--}}
                    {{--                                            <li>Recommend to a friend</li>--}}
                    {{--                                            <li>Service as described</li>--}}

                    {{--                                        </ul>--}}
                    {{--                                        <ul class="break-ul-ratings">--}}
                    {{--                                            <li><i class="fa fa-star"></i>5</li>--}}
                    {{--                                            <li><i class="fa fa-star"></i>4.3</li>--}}
                    {{--                                            <li><i class="fa fa-star"></i>5</li>--}}

                    {{--                                        </ul>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="boxx">--}}
                    {{--                                <div class="blog-top clearfix">--}}
                    {{--                                    <div class="news-allreply pull-left">--}}
                    {{--                                        <a href="#"><img src="{{asset('front_assets/image/pexels-photo-1264210.jpeg')}}" class="img-circle" alt=""></a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="blog-img-details">--}}
                    {{--                                        <div class="blog-title">--}}
                    {{--                                            <h4>Client Name Here<small><i class="fa fa-star"></i>5</small></h4>--}}
                    {{--                                            <span>Country</span>--}}
                    {{--                                        </div>--}}
                    {{--                                        <p class="p-border">Lorem ipsum dolor sit amet, consectetur adipisicing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>--}}
                    {{--                                        <small>Published 1 day ago</small>--}}
                    {{--                                        <div class="mt10">--}}
                    {{--                                            <div class="news-allreply pull-left">--}}
                    {{--                                                <a href="#"><img src="{{asset('front_assets/image/pexels-photo-1264210.jpeg')}}" class="img-circle" alt=""></a>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="blog-img-details">--}}
                    {{--                                                <div class="blog-title">--}}
                    {{--                                                    <h4>Seller Review <small><i class="fa fa-star"></i>5</small></h4>--}}
                    {{--                                                    <span>Country</span>--}}
                    {{--                                                </div>--}}
                    {{--                                                <p class="p-border">Lorem ipsum dolor exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>--}}
                    {{--                                                <small>Published 1 day ago</small>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="blog-top clearfix">--}}
                    {{--                                    <div class="news-allreply pull-left">--}}
                    {{--                                        <a href="#"><img src="{{asset('front_assets/image/pexels-photo-1264210.jpeg')}}" class="img-circle" alt=""></a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="blog-img-details">--}}
                    {{--                                        <div class="blog-title">--}}
                    {{--                                            <h4>Salim Rana akter <small><i class="fa fa-star"></i>4.5</small></h4>--}}
                    {{--                                            <span>Country</span>--}}
                    {{--                                        </div>--}}
                    {{--                                        <p class="p-border">Lorem ipsum dolor sit amet, consectetur adipisicing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>--}}
                    {{--                                        <small>Published 1 day ago</small>--}}
                    {{--                                        <div class="mt10">--}}
                    {{--                                            <div class="news-allreply pull-left">--}}
                    {{--                                                <a href="#"><img src="{{asset('front_assets/image/pexels-photo-1264210.jpeg')}}" class="img-circle" alt=""></a>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="blog-img-details">--}}
                    {{--                                                <div class="blog-title">--}}
                    {{--                                                    <h4>Seller Review <small><i class="fa fa-star"></i>4.5</small></h4>--}}
                    {{--                                                    <span>14 October, 2016 at 6 : 00 pm</span>--}}
                    {{--                                                </div>--}}
                    {{--                                                <p class="p-border">Lorem ipsum dolor exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>--}}
                    {{--                                                <small>Published 1 day ago</small>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}


                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="related-tags" class="gig-sub-section">--}}
                    {{--                        <h2 class="gig-section-title">Related Tags</h2>--}}
                    {{--                        <ul>--}}
                    {{--                            <li><a href="">Wordpress</a></li>--}}
                    {{--                            <li><a href="">Website</a></li>--}}
                    {{--                            <li><a href="">Blog</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                </div>
				
                <div class="col-md-4">
                    @if($serviceDetails->pricing != null && $serviceDetails->pricing->count() == 1)
                        <div class="sidebar">
                            <div class="single-sec">
                                <div class="one-package-title">
                                    @foreach($serviceDetails->pricing as $key => $pricing)
                                        <p class="one-package-name">{{ $pricing->package->name }}</p>
                                        <p class="one-package-price">${{ $pricing->price }}</p>
                                    @endforeach
                                </div>
                                <div class="one-package-content">
                                    @foreach($serviceDetails->pricing as $key => $pricing)
                                        <div class="">
                                            <p class="pricing-details">{{ $pricing->description }}</p>
                                            <div class="delivery">
                                                <div class="delivery-details">
                                                    <b class="delivery-date"> <i class="fa fa-clock-o"></i> {{ $pricing->delivery_date }} days Delivery </b>
                                                    <b class="revisions">  <i class="fa fa-refresh" aria-hidden="true"></i> {{ $pricing->revisions }}
                                                        Revisions</b>
                                                </div>
                                                @if($serviceDetails->serviceextra != null)
                                                    <ul class="extra-features">
                                                        @foreach($serviceDetails->serviceextra as $extra)
                                                            <li><i class="fa fa-check"></i> {{ $extra->extra_title }} - <span> Delivery In {{ $extra->fast_delivery }} days</span></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <form action="{{ route('user.order.placed') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="service_id" value="{{ $serviceDetails->id }}">
                                                    <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                                                    <button class="btn  btn-block learn_btn" style="margin-top: 15px;width: 100%;">Continue ( {{ $pricing->price }}$ )</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @elseif($serviceDetails->pricing != null && $serviceDetails->pricing->count() > 1)
                        <div class="sidebar">
                            <div class="single-sec-tab">
                                <div class="package-tab-menu">
                                    <div class="nav nav-tabs">

                                        @foreach($serviceDetails->pricing as $key => $pricing)
                                            <a class="@if($key == 0) active @endif" data-toggle="tab" href="#{{ $pricing->package->name }}">{{ $pricing->package->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-content">
                                    @foreach($serviceDetails->pricing as $key => $pricing)
                                        <div id="{{ $pricing->package->name }}" class="tab-pane @if($key == 0) active show @endif">
                                            <div class="one-package-title" style="margin-top:15px;">

                                                <p class="one-package-name" >{{ $pricing->package->name }}</p>
                                                <p class="one-package-price">${{ $pricing->price }}</p>
                                            </div>
                                            @if($serviceDetails->serviceextra != null)
                                                <ul class="extra-features">
                                                    @foreach($serviceDetails->serviceextra as $extra)
                                                        <li><i class="fa fa-check"></i> {{ $extra->extra_title }} - <span> Delivery In {{ $extra->fast_delivery }} days</span></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <p class="pricing-details">{{ $pricing->description }}</p>
                                            <div class="delivery">
                                                <div class="delivery-details">
                                                    <b class="delivery-date">
                                                        <i class="fa fa-clock-o"></i> {{ $pricing->delivery_date }} days Delivery </b>
                                                    <b class="revisions">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i> {{ $pricing->revisions }}
                                                        Revisions
                                                    </b>
                                                </div>
												<button type="button" class="btn btn-success" style="border-radius:0px;margin-left:93px;">Continue (${{ $pricing->price }})</button>
                                                <form action="{{ route('user.order.placed') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="service_id" value="{{ $serviceDetails->id }}">
                                                    <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                                                    <a href="#gig-compare-packages" class="btn btn-transparent" style="margin-top: 15px;width: 100%;">Compare Packages</a>
                                                </form>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <button class="lime-btn btn-outline" style="margin-top: 15px;width: 100%;">Contact Seller</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--row ends-->

    </section>
    <hr class="gig-page-bottom"><div class="max-width-container"></div></hr>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.gig-detail-links a').click(function(ev){
                //ev.preventDefault();
                $('.selected').removeClass('selected');
                $(this).addClass('selected');
            });

            document.getElementsByTagName("body")[0].style.backgroundColor="#fff";
            //on scroll

            $(window).scroll(function(){
                var scrollTop = $(window).scrollTop();
                if(scrollTop > 0){

                    $('.gig-detail-header').css({ position : 'fixed', zIndex : "10", top : "0px" });
                }else{

                    $('.gig-detail-header').css({ position : 'sticky', zIndex : "10" });
                }
            });
        });

    </script>
@endsection
