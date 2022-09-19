@extends('layouts.master')
@section('title', 'Login')
@section('main_content')
    <!--start category menu-->
    @include('partials.catmenu')
    <!--End header Area-->

    <section class="gig-details">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 mt-5">
                    <div class="box-login">
                        <h2 class="fav-text">Login To Limelancer</h2>
                        <form class="no-ovflow" id="login_form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Email address"
                                           name="email"
                                           value="{{ old('email') }}"/>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Password"
                                           name="password"
                                    />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <!--<button type="button" id="login_button" onclick="check_login()"class="btn  btn-base btn-sm mt5">Login</button>-->
                                    <button type="submit" class="btn btn-base mt5 btn-100">Login</button>
                                </div>
                                <div class="orlogin text-center">
                                    <span>OR</span>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('social.login', 'facebook') }}" class="btn btn-sm btn-outline-info w-100">
                                        <i class="fa fa-facebook"></i> Continue with Facebook
                                    </a>

                                </div>
                                <div class="text-center">
                                    <a href="#" onclick="window.location = '';" class="btn google-btn btn-gplus-connect ">
                                        <i class="fa fa-google-plus float-left"></i> Continue with Google
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
