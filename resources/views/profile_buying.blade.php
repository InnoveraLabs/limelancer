@extends('layouts.master')
@section('main_content')
    <!--start category menu-->
    @include('partials.catmenu')
    <!--End header Area-->
    <div class="container-fluid dashboard-box my-5">

        <section class="dashboard-banner row">
            <div class="col-md-3">
                <div class="request-box">
                    <h6 class="text-bold">Hi {{ auth()->user()->username }},</h6>
                    <p>Get offers from sellers for your project</p>

                    <button class="btn btn-outline">Post a request</button>
                </div>
            </div>
            <div class="col-md-9">
                <div id="dashboard-slider" class="carousel slide" data-ride="carousel" data-interval="4000">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#dashboard-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#dashboard-slider" data-slide-to="1"></li>
                        <li data-target="#dashboard-slider" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="{{asset('image/slider1.jpg')}}">
                            <div class="carousel-overlay"></div>
                            <div class="carousel-caption">
                                <h3>Make your dream website</h3>
                                <p>Choose from thousands of skilled website developers</p>
                            </div>

                        </div>

                        <div class="carousel-item">
                            <img src="{{asset('image/slider2.jpg')}}">
                            <div class="carousel-overlay"></div>
                            <div class="carousel-caption">
                                <h3>Help locals find you</h3>
                                <p>Implement SEO for your local business</p>
                            </div>

                        </div>

                        <div class="carousel-item">
                            <img src="{{asset('image/slider3.jpeg')}}">
                            <div class="carousel-overlay"></div>
                            <div class="carousel-caption">
                                <h3>Audio and video contents on the go</h3>
                                <p>Choose content creators at no hassle!</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="best-sellers gig-nav row mt-4 team_area best_freelancer">
            <div class="col-md-12">
                <h4>Recent Services</h4>
                <div class="display-flex">

                    @forelse($services as $service)
                    <div class="gig-wrapper" >
                        <div class="team_member">
                            @forelse($service->galleries as $key => $serviceImage)
                            <img src="{{ asset('/public/service/'.$serviceImage->featured_image) }}" alt="member">
                            @empty
                                <img src="{{ asset('image/no-image.svg') }}" class="featured-image" alt="">
                            @endforelse
                            <div class="content text-left">
                                <img class="img-circle img-thumbnail" src="{{ $service->user->avatar }}" alt="test">
                                <div class="seller-info">
                                    <span>{{ $service->user->name }}</span>
                                    <p class="orange">Top Rated Seller</p>
                                </div>
                                <div class="gig-title">
                                    <a href="{{ route('service_details', $service->gig_slug) }}">
                                        I will {{ $service->title }}
                                    </a>
                                </div>
                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>
                            </div>
                            <div class="gig-footer dis-flex">
                                <a href="#"><i class="fa  fa-heart-o"></i></a>
                                <span class="pull-right">Starting <b>${{ @$service->pricing[0]->price }}</b></span>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h4>No recent Services</h4>
                    @endforelse

                </div>


            </div>
        </section>
{{--        <section class="top-services gig-nav row mt-2 team_area best_freelancer">--}}
{{--            <div class="col-md-12">--}}
{{--                <h4>Top pro services </h4>--}}
{{--                <div class="display-flex">--}}
{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}


{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}

{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}

{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}
{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <section class="editors-picks gig-nav row mt-2 mb-2 team_area best_freelancer">--}}
{{--            <div class="col-md-12">--}}
{{--                <h4>Editor's picks</h4>--}}
{{--                <div class="display-flex">--}}
{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}


{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}

{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}

{{--                    <div class="gig-wrapper"><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}
{{--                    <div class="gig-wrapper" ><div class="team_member">--}}
{{--                            <img src="{{asset('image/gig-photo.jpg')}}" alt="member">--}}
{{--                            <div class="content text-left">--}}
{{--                                <img class="img-circle img-thumbnail" src="{{asset('image/gig-photo.jpg')}}" alt="test">--}}
{{--                                <div class="seller-info">--}}
{{--                                    <span>Zannat</span>--}}
{{--                                    <p class="orange">Top Rated Seller</p>--}}
{{--                                </div>--}}
{{--                                <div class="gig-title">--}}
{{--                                    <a href="https://orninoor.com/lancer/gig_detail/2">I will create eye catching 2d animation or cartoon explainer.</a>--}}
{{--                                </div>--}}
{{--                                <div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
{{--                            </div>--}}
{{--                            <div class="gig-footer dis-flex">--}}
{{--                                <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>--}}
{{--                                <span class="pull-right">Starting <b>$5</b></span>--}}
{{--                            </div>--}}
{{--                        </div></div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}


    </div>
    <script>
        $(document).ready(function(){
            $("body").css("background", "white");
        });
    </script>
@endsection

