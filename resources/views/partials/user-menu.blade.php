<ul class="user-menu-ul">


    <li class="mode-switch">

        @if(session()->has('buying'))
            <a class="text-hover"
               onclick="event.preventDefault();document.getElementById('switch-mode').submit();">
                Switch to Selling
            </a>
        @else
            <a class="text-hover"
               onclick="event.preventDefault();document.getElementById('switch-mode').submit();">
                Switch to Buying
            </a>

        @endif

        <form id="switch-mode" action="{{ route('user.switch') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    <li class="user-thumb">
     <div class="dropdown">
  <button type="button" class="user-thumb-wrapper dropdown-toggle" style="
    background-image: url('{{ auth()->user()->avatar }}');" data-toggle="dropdown">

  </button>

  <div class="dropdown-menu dropdown-menu-right">
  <div class="tip" style="left: calc(100% - 25px);"></div>
    <a class="dropdown-item" href="{{route('user.profile')}}"> <i class="fa fa-user"></i>&nbsp;Profile</a>
    <a class="dropdown-item" href="{{route('buyer_requests')}}"> <i class="fa fa-file-text"></i>&nbsp;
                    Manage Requests</a>
    <a class="dropdown-item" href="{{route('buyer_requests')}}"><i class="fa fa-pencil-square-o"></i>&nbsp;
                    Post a Request</a>
					<a class="dropdown-item" href="{{route('user.profile_settings')}}"><i class="fa fa-cog"></i>&nbsp;
                    Settings</a>
					<a class="dropdown-item" href="#"><i class="fa fa-language"></i></i>&nbsp;
                    English</a>
					<a class="dropdown-item" href="#"><i class="fa fa-money"></i>&nbsp;
                    $USD</a>
					<a class="dropdown-item" href="#"> <i class="fa fa-life-ring"></i>&nbsp;
                    Help & Support</a>
					<a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logoutform').submit();">
                    <i class="fa fa-sign-out"></i>&nbsp;
                    Logout
                </a>
				 <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
  </div>
</div>

    </li>
</ul>
