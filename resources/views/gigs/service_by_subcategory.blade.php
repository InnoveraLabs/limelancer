@extends('layouts.master')
@section('main_content')
    <!--start category menu-->
    @include('partials.catmenu')
    <!--End header Area-->
    <div class="container-fluid dashboard-box my-5">

        <section class="best-sellers gig-nav row mt-4 team_area best_freelancer">
            <div class="col-md-12">
                <h4>All Services for {{ $sub_c_slug }}</h4>
                <div class="display-flex">

                    @forelse($getServiceBysubcategory as $service)
                        <div class="gig-wrapper">
                            <div class="team_member">
                                @forelse($service->galleries as $key => $serviceImage)
                                    <img src="{{ asset('/public/service/'.$serviceImage->featured_image) }}" alt="member">
                                @empty
                                    <img src="{{ asset('image/no-image.svg') }}" alt="member">
                                @endforelse
                                <div class="content text-left">
                                    <img class="img-circle img-thumbnail" src="{{ asset($service->user->avatar) }}" alt="test">
                                    <div class="seller-info">
                                        <span>{{ $service->user->name }}</span>
                                        <p class="orange">Top Rated Seller</p>
                                    </div>
                                    <div class="gig-title">
                                        <a href="{{ route('service_details', $service->gig_slug) }}">
                                            I will {{ $service->title }}
                                        </a>
                                    </div>
                                    {{--<div class="rating-info"><i class="fa fa-star"></i> <span>4.6</span> (1k+)</div>--}}
                                </div>
                                <div class="gig-footer dis-flex">
                                    <a href="https://orninoor.com/lancer/gig_detail/2"><i class="fa  fa-heart-o"></i></a>
                                    <span class="pull-right">Starting <b>${{ @$service->pricing[0]->price }}</b></span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4>No Services Available</h4>
                    @endforelse

                </div>


            </div>
        </section>
    </div>
    <script>
        $(document).ready(function(){
            $("body").css("background", "white");
        });
    </script>
@endsection

