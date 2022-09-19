<header class="lime-header">
<nav class="navbar navbar-expand-lg selling-navbar justify-start">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span>
            <i class="fa fa-bars" aria-hidden="true" style="color:#212121"></i>
        </span>
    </button>
    <a class="navbar-brand logo flogo" href="{{ route('home') }}" style="color:#7a7d85 !important;">
                        LimeLancer
                    
    </a>

    <!--========== Collect the nav links, forms, and other content for toggling ==========-->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav" id="selling-nav-ul">
            <li><a href="{{ route('profile_home') }}">Dashboard</a></li>
            <li><a href="">Messages</a></li>
            <li><a href="{{ route('orders') }}">Orders</a></li>
            <li><a href="{{ route('manage_gigs') }}">Gigs</a></li>
            <li><a href="{{ route('analytics') }}">Analytics</a></li>
            <li><a href="{{ route('earnings') }}">Earnings</a></li>
            <li><a href="">Community</a>
			
			
          
			
			
			
			
			
			
			
			</li>
            <li class="dropdown-toggle" data-toggle="dropdown" style="width:auto;position:relative;" aria-expanded="true"><a href="">More</a>
			
            <div class="dropdown-menu dropdown-menu-right">
                <div class="tip" style="left: calc(100% - 25px);"></div>

                <a class="dropdown-item" href="{{ route('buyer_requests') }}">
                    
                    Buyer Requests
                </a>
                <a class="dropdown-item" href="#">
                    
                    Scale Your Business
                </a>
                <a class="dropdown-item" href="#">
                    
                    Learn - Online Courses
                </a>
               
                <a class="dropdown-item" href="#">
                    
                    Contacts
                </a>
              
            </div>
        
			
			
			
			</li>
        </ul>
    </div>
    @include('partials.user-menu')
</nav>
</header>
