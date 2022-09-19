<!-- Header-->
<header id="header" class="header">
    <div class="container-fluid">
        <div class="row  tbarmenu">
            <div class="col-md-12">
                <a href="#"><img src="{{asset('image/admin-logo.png')}}" alt="logo"></a>


                <ul class="pull-right">
                    <li><a href="">View Site</a></li>
                    <li><a href="index">My Account</a></li>
                    <li><a href="index?view_notifications">Alerts</a></li>
                    <li><a href="index?view_coupons">Coupons</a></li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); getElementById('logoutform').submit()">Logout</a></li>
                    <form id="logoutform" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>

            </div>
        </div>

        <div class="row">

            <div class="col-md-12 flex-full-width">
                <nav class="navbar navbar-expand-lg" role="navigation">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}" ><i class="fa fa-home">
                                    </i><span>Dashboard</span>
                                </a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                                    <i class="fa fa-user"></i><span>Users</span>
                                </a>
                                <ul class="dropdown-menu">

                                    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                                    <li><a href="">Admin</a></li>
                                    <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                                    <li><a href="">Permissions</a></li>

                                </ul>
                            </li>
                            <li class="nav-item  dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""
                                >
                                    <i class="fa fa-list-alt"></i><span>Categories</span>
                                </a>

                                <ul class="dropdown-menu">

                                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                                    <li><a href="{{ route('admin.subcategories.index') }}">Sub Categories</a></li>


                                </ul>

                            </li>
                            <li class="nav-item  dropdown">
                                <a class="nav-link" href="{{ route('admin.proposals') }}">
                                    <i class="fa fa-briefcase"></i><span>Gigs</span>
                                </a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                                    <i class="fa fa-clock-o"></i><span>Activities</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="index?view_orders">View Orders</a></li>
                                    <li><a href="index?inbox_conversations">View Messages</a></li>
                                    <li><a href="index?view_buyer_reviews">View Reviews</a></li>
                                    <li><a href="index?buyer_requests">View Buyer Requests</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="index?plugins">
                                    <i class="fa fa-certificate"></i><span>Plugins</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                                    <i class="fa fa-money"></i><span>Payouts</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="index?payouts&status=pending">Pending</a></li>
                                    <li><a href="index?payouts&status=declined">Declined</a></li>
                                    <li><a href="index?payouts&status=completed">Completed</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                                    <i class="fa fa-random"></i><span>Site Layout</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="index?layout_settings">Layout Settings</a></li>

                                </ul>
                            </li>
                            <li class="nav-item  dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                                    <i class="fa fa-cogs"></i><span>Settings</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="index?general_settings">General Settings</a></li>
                                    <li><a href="index?payment_settings">Payment Settings</a></li>
                                    <li><a href="index?mail_settings">Mail Server Settings</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-bars"></i><span>Masters</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <h6>Accounting</h6>
                                    <li><a href="index?sales">Sales</a></li>
                                    <li><a href="index?expenses">Expenses</a></li>


                                    <h6>Support</h6>
                                    <li><a href="index?customer_support_settings">Support Settings</a></li>
                                    <li><a href="index?view_support_requests">Support Requests</a></li>
                                    <li><a href="index?view_enquiry_types">View Enquiry Types</a></li>
                                    <h6>Reports/Abuse</h6>
                                    <li><a href="index?message_reports">Message Reports</a></li>
                                    <li><a href="index?order_reports">Order Reports</a></li>
                                    <li><a href="index?proposal_reports">Gig Reports</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div><!--next-row-->
    </div><!--container-fluid-->
</header>
<!-- Header-->
