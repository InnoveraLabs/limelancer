<nav class="navbar navbar-expand-lg home-navbar">
    <a class="navbar-brand logo-main" href="{{ route('home') }}">
     <a href="index.html" class="logo flogo " style="color: #fff !important;">
        LimeLancer
    </a>
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></span>
</button>


<!--========== Collect the nav links, forms, and other content for toggling ==========-->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="nav navbar-nav menu ml-auto" id="nav">
        <li><a href="" class="hover-text">Limelancer Business</a></li>
        <li><a href="" class="hover-text">Explore</a></li>
        <li><a href="" class="hover-text">Become a Seller</a></li>
        @guest
        <li><a href="{{ route('login') }}" class="hover-text">Sign In</a></li>
        <a class="banner_btn btn-getnow hidden-sm hidden-xs" href="#" data-toggle="modal" data-target="#myModal">Join Now</a>
        @endguest
    </ul>
</div><!-- /.navbar-collapse -->
</div>
</nav>
<div id="scroll-nav-wrapper" style="display:none;">
    <nav class="navbar navbar-expand-lg scroll-navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span>
                <i class="fa fa-bars" aria-hidden="true" style="color:#212121"></i>
            </span>
        </button>
        <a class="navbar-brand logo-main" href="{{ route('home') }}">
         <a href="#" class="logo flogo " style="color: #7a7d85 !important;">
            LimeLancer
        </a>
    </a>

    <div class="col-md-3 header-search">
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

     <!--========== Collect the nav links, forms, and other content for toggling ==========-->
     <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav menu ml-auto" id="nav">
            <li><a href="" class="hover-text">Limelancer Business</a></li>
            <li><a href="" class="hover-text">Explore</a></li>
            <li><a href="" class="hover-text">Become a Seller</a></li>
            @guest()
            <li><a href="{{ route('login') }}" class="hover-text">Sign In</a></li>
            <a class="banner_btn btn-getnow hidden-sm hidden-xs" href="#" data-toggle="modal" data-target="#myModal">Join Now</a>
        </ul>
    </div>
    @else
</ul>
</div>
    @auth()
        @include('partials.user-menu')
    @endauth

@endguest

</nav>
    @include('partials.catmenu')
</div>
