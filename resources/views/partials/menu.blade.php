<header class="lime-header">
    <div class="max-width-container">
        <nav class="navbar navbar-expand-lg selling-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span>
                    <i class="fa fa-bars" aria-hidden="true" style="color:#212121"></i>
                </span>
            </button>
            <a class="navbar-brand logo flogo" href="{{ route('home') }}" style="color:#7a7d85 !important;">
                LimeLancer
            </a>

            @if(session()->has('buying') ||  Auth::guest())
                <div class="header-search" style="margin-right: 10px;">
                    <div class="search-bar-wrapper">
                        <form class="">
                                <span class="fit-icon search-bar-icon" style="width:16px;height:16px">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.8906 14.6531L12.0969 10.8594C12.025 10.7875 11.9313 10.75 11.8313 10.75H11.4187C12.4031 9.60938 13 8.125 13 6.5C13 2.90937 10.0906 0 6.5 0C2.90937 0 0 2.90937 0 6.5C0 10.0906 2.90937 13 6.5 13C8.125 13 9.60938 12.4031 10.75 11.4187V11.8313C10.75 11.9313 10.7906 12.025 10.8594 12.0969L14.6531 15.8906C14.8 16.0375 15.0375 16.0375 15.1844 15.8906L15.8906 15.1844C16.0375 15.0375 16.0375 14.8 15.8906 14.6531ZM6.5 11.5C3.7375 11.5 1.5 9.2625 1.5 6.5C1.5 3.7375 3.7375 1.5 6.5 1.5C9.2625 1.5 11.5 3.7375 11.5 6.5C11.5 9.2625 9.2625 11.5 6.5 11.5Z"></path></svg>
                                </span>
                            <input type="search" autocomplete="off" placeholder="Find Services" value="">
                            <button class="btn btn-success header-search-btn">Search</button>
                        </form>
                    </div>
                </div>
            @endif

        <!--========== Collect the nav links, forms, and other content for toggling ==========-->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="nav navbar-nav @guest ml-auto menu @endguest" id="selling-nav-ul">
                        @guest()
                            <li><a href="" class="hover-text">Limelancer Business</a></li>
                            <li><a href="" class="hover-text">Explore</a></li>
                            <li><a href="" class="hover-text">Become a Seller</a></li>
                            <li><a href="{{ route('login') }}" class="hover-text">Sign In</a></li>
                            <a class="banner_btn btn-getnow hidden-sm hidden-xs" href="#" data-toggle="modal" data-target="#myModal">Join Now</a>
                        @else
                            @if(session()->has('buying'))
                                <li class="display-from-lg"><a href="{{ route('limelancer_pro') }}">Limelancer Pro</a></li>
                                <li class="display-from-lg"><a href="explore">Explore</a></li>
                                <li class="display-from-md"><a href="messages">Messages</a></li>
                                <li class="display-from-lg"><a href="saved_orders">Saved</a></li>
                                <li class="display-from-lg"><a href="{{ route('user.buyers.orders') }}">Orders</a></li>
                            @else
                                <li><a href="{{ route('user.profile') }}">Dashboard</a></li>
                                <li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown">Messages</a>

                                        <form class="dropdown-menu mssg-tab">
                                            <ul class="nav nav-tabs">
                                                <li class="notf-link active"><a  href="#notifications">Notifications(0)</a></li>
                                                <li class="notf-link"><a href="#inbox">Inbox(0)</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="notifications" class="tab-pane fade show active">
                                                    <ul class="notif-list">
                                                        <li class="notif-wrapper">
                                                            <div class="notif-icon"><i class="fa fa-bell-o"></i></div>
                                                            <p class="notif-content"><b class="">Action required:</b> Increase your visibility by completing your Gig information.<br><span class="notif-time"></span></p>

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div id="inbox" class="tab-pane fade">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </li>
                                <li><a href="{{ route('user.orders') }}">Orders</a></li>
                                <li><a href="{{ route('user.manage_gigs') }}">Gigs</a></li>
                                <li><a href="{{ route('analytics') }}">Analytics</a></li>
                                <li><a href="{{ route('user.earnings') }}">Earnings</a></li>

                                <li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown">Community</a>


                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Events</a></li>
                                            <li><a class="dropdown-item" href="#">Blog</a></li>
                                            <li><a class="dropdown-item" href="#">Forum</a></li>
                                            <li><a class="dropdown-item" href="#">Community Standards</a></li>
                                            <li><a class="dropdown-item" href="#">Podcast</a></li>
                                        </ul>

                                    </div>
                                </li>

                                <li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown">More</a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Buyer Requests</a></li>
                                            <li><a class="dropdown-item" href="#">Scale Your Business</a></li>
                                            <li><a class="dropdown-item" href="#">Learn - Online Courses</a></li>
                                            <li><a class="dropdown-item" href="#">Contacts</a></li>

                                        </ul>

                                    </div>
                                </li>
                            @endif
                        @endguest
                    </ul>
            </div>
            @auth()
                @include('partials.user-menu')
            @endauth
        </nav>
    </div>
</header>
