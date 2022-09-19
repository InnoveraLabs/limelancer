@extends('layouts.master')
@section('main_content')

    <div class="container-fluid selling-profile-box mt-2">
        <div class="row flex">
            <div class="col-md-8 offset-md-2">
                <section class="info-column">
                    <div class="seller-card seller_card-package">
                        <div style="position:absolute;right:0;height:20px;left:0">
                            <div class="user-online-indicator is-online"><i class="fa fa-circle"></i>online</div>
                        </div>
                        <div class="user-profile-info">
                            <div class="user-profile-image">
                                <label class="profile-pict editable" style="width:150px;height:150px;font-size:3em" for="profile_image">

                                    <img src="{{asset('image/empty-image.png')}}" class="profile-img" alt=""></label>
                            </div>
                            <div class="user-profile-label">
                                <div class="username-line">
                                    <b class="seller-link">username</b>
                                </div>

                            </div>
                        </div>

                        <!--change from here-->
                        <div class="profile-progresses-wrapper">
                            <ul class="progress-wrapper">

                                <li class="kpi-bar-wrapper">


                                    <a href="/users/sefatnoor/seller_analytics_dashboard#analytics-seller-level">
                                        <h6 class="text-body-1">Response Rate</h6>
                                        <div class="progress-container help hint--top" data-hint="Respond to 90% of the inquiries you received in the last 60 days">
                                            <div class="progress-bar-wrapper">
                                                <div class="fit-progressbar fit-progressbar-bar">
                                                    <div class="fit-progressbar-background"><span class="progress-fill" style="width: 100%;"></span></div>
                                                </div>
                                            </div>
                                            <div class="percent-text font-accent">100%</div>
                                        </div>
                                    </a></li>

                                <li class="kpi-bar-wrapper">
                                    <a href="/users/sefatnoor/seller_analytics_dashboard#analytics-seller-level"><h6 class="text-body-1">Delivered on Time</h6>
                                        <div class="progress-container help hint--top" data-hint="Deliver 90% of your orders on time, over the course of 60 days">
                                            <div class="progress-bar-wrapper">
                                                <div class="fit-progressbar fit-progressbar-bar">
                                                    <div class="fit-progressbar-background"><span class="progress-fill" style="width: 100%;"></span></div>
                                                </div>
                                            </div>
                                            <div class="percent-text font-accent">100%</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="kpi-bar-wrapper">
                                    <a href="/users/sefatnoor/seller_analytics_dashboard#analytics-seller-level"><h6 class="text-body-1">Order Completion</h6>
                                        <div class="progress-container help hint--top" data-hint="Complete 90% of your orders on time, over the course of 60 days">
                                            <div class="progress-bar-wrapper">
                                                <div class="fit-progressbar fit-progressbar-bar">
                                                    <div class="fit-progressbar-background"><span class="progress-fill" style="width: 100%;"></span></div>
                                                </div>
                                            </div>
                                            <div class="percent-text font-accent">100%</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>


                            <ul class="earn-summary">
                                <li class ="kpi-text-wrapper">
                                    <a href="/users/sefatnoor/balance/sales"><div class="kpi-data-inner"><h6>Earned in October</h6><span class= "text-body-1">$0</span></div></a>
                                </li>
                                <li class ="kpi-text-wrapper">
                                    <a href="/users/sefatnoor/balance/sales"><div class="kpi-data-inner"><h6>Response Time</h6><span class= "text-body-1">N/A</span></div></a>
                                </li>



                        </div>
                    </div>
                    <div class="seller-card seller_card-package">
                        <div style="position:absolute;right:0;height:20px;left:0">

                            <li class="kpi-bar-wrapper">
                                <a href="/users/sefatnoor/seller_analytics_dashboard#analytics-seller-level"><h6 class="text-body-1">Inbox</h6>
                                    <div class="progress-container help hint--top" data-hint="Deliver 90% of your orders on time, over the course of 60 days">
                                        <div class="progress-bar-wrapper">
                                            <div class="fit-progressbar fit-progressbar-bar">
                                                <div class="fit-progressbar-background"><span class="progress-fill" style="width: 100%;"></span></div>
                                            </div>
                                        </div>
                                        <div class="percent-text font-accent">See All</div>
                                    </div>
                                </a>
                            </li>
                        </div></div>
                </section>



                <section class="gigs-column">
                    <div class="filter-wrapper cf"><div class="title-wrapper">
                            <h3 class="font-accent">active orders<span> - 0 ($0)</span></h3></div>
                        <div class="fit-popover fit-popover-bottom-left fit-popover-clickable fit-select-wrapper" data-position="bottom-left">
			<span class="fit-popover-content fit-select statuses-select"><span class="fit-select-value" style="min-width: 171px;">All Orders</span><span class="fit-icon fit-select-caret" style="width: 11px; height: 11px;"><svg width="11" height="7" viewBox="0 0 11 7" xmlns="http://www.w3.org/2000/svg"><path d="M5.4636 6.38899L0.839326 1.769C0.692474 1.62109 0.692474 1.38191 0.839326 1.23399L1.45798 0.61086C1.60483 0.462945 1.84229 0.462945 1.98915 0.61086L5.72919 4.34021L9.46923 0.61086C9.61608 0.462945 9.85354 0.462945 10.0004 0.61086L10.619 1.23399C10.7659 1.38191 10.7659 1.62109 10.619 1.769L5.99477 6.38899C5.84792 6.5369 5.61046 6.5369 5.4636 6.38899Z"></path></svg></span><input type="hidden" name="statuses" value="">
			</span></div></div>
                </section>
            </div>

        </div>
    </div>

@endsection
