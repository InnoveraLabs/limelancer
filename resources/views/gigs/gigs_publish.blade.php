@extends('layouts.master')

@section('main_content')


    <!--End header Area-->
    <div class="container-fluid cr-gig-box">

        @include('gigs.tabs')

        <section class="container mt-5 mb-5">

            <div class="row"><!--- row Starts --->
                <div class="col-md-10 offset-md-1">
                    <div class="tab-content card card-body"><!--- tab-content Starts --->
                        <div class="tab-pane active" id="publish">

                            <h1><img style="position:relative; top:-5px;">  Alomost there!</h1>
                            <h3 class="gig-edit-sec-sttl">Let's publish your Gig and get <br> some buyers rolling in.</h3>

                            <form action="{{ route('user.publish_gig') }}" method="POST">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <div class="form-group mb-0 mt-3"><!--- form-group Starts --->
                                    <a href="#" class="lime-btn lime-btn-secondary">Back</a>
                                    <button class="lime-btn learn_btn" type="submit" name="submit_proposal">Publish gig</button>

                                </div><!--- form-group Starts --->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection



