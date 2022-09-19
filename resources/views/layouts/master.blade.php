<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
		<!--    favicon-->
		<link rel="shortcut icon" href="{{asset('image/icon.png')}}" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="{{asset('css/all-plugin.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('vendors/themify-icon/themify-icons.css')}}">
        <!--css-->
		<link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
         <link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/profile-styles.css')}}">
		<link rel="stylesheet" href="{{asset('css/menu-styles.css')}}">
		<link rel="stylesheet" href="{{asset('css/lancer-styles.css')}}">
		<link rel="stylesheet" href="{{asset('css/gig-styles.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="{{asset('js/jquery-2.2.4.js')}}"></script>

        @yield('styles')


    </head>


    <body data-spy="scroll" data-target=".navbar" data-offset="70">

        <!--start header Area-->
		{{--  @guest()
            @include('partials.homemenu')
        @else
            @include('partials.menu')
        @endguest  --}}
		@if (\Route::current()->getName() == 'home')
			@include('partials.homemenu')
		 @else
            @include('partials.menu')
		@endif

        <!--End header Area-->

		<!-- Start Dynamic Content -->
		@yield('main_content')
		<!-- end Dynamic Content -->

        @include('partials.footer')

        {{-- Registration Modal --}}
        @include('partials.registermodal')

        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        <!-- waypoints js-->
        <script src="{{asset('vendors/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('vendors/counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('vendors/swipper/swiper.min.js')}}"></script>
        <script src="{{asset('vendors/parallax/twinlight.js')}}"></script>
        <script src="{{asset('vendors/parallax/jquery.wavify.js')}}"></script>
        <script src="{{asset('js/nav.js')}}"></script>

        <!--owl carousel js-->
        <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/croppie.js') }}"></script>
        <!--custom js -->
        @yield('scripts')
        <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    </body>


</html>
