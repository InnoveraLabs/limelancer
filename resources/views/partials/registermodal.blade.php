<div class="modal fade " id="myModal" role="dialog"  >
    <div class="modal-dialog lo-sign-custom ">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center m-logo mb5">Join Limelancer</div>
                <form id="registerForm" class="no-overflow" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text"
                               id="nameInput"
                               class="form-control"
                               name="name"
                               placeholder="Enter Your Full Name"
                               value="{{ old('name') }}"

                        >
                        <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="text"
                               id="usernameInput"
                               class="form-control"
                               name="username"
                               placeholder="Enter Your Username"
                               value="{{ old('username') }}"

                        >
                        <span class="invalid-feedback" role="alert" id="usernameError">
                                <strong></strong>
                        </span>

                    </div>
                    <div class="form-group">

                        <input type="email"
                               id="emailInput"
                               class="form-control"
                               name="email"
                               placeholder="Enter Email"
                               value="{{ old('email') }}"

                        >
                        <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                        </span>

                    </div>
                    <div class="form-group">

                        <input type="password"
                               id="passwordInput"
                               class="form-control"
                               name="password"
                               placeholder="Enter Password"

                        >

                        <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                        </span>

                    </div>
                    <div class="form-group">
                        <input type="password"
                               id="password-confirm"
                               class="form-control"
                               name="password_confirmation"
                               placeholder="Confirm Password"
                        >
                    </div>
                    <button type="submit" class="btn btn-base btn-block mt-3" value="">Create Account</button>
                </form>

                <div class="clearfix"></div>
                <div class="text-center">or</div>

                <div class="line mt-3"><span></span></div>
                <div class="text-center mb-3">
                    <a href="#" onclick="window.location = '';" class="btn fb-btn btn-fb-connect">
                        <i class="fa fa-facebook float-left"></i> Continue with Facebook
                    </a>

                </div>
                <div class="text-center">
                    <a href="#" onclick="window.location = '';" class="btn google-btn btn-gplus-connect ">
                        <i class="fa fa-google-plus float-left"></i> Continue with Google
                    </a>
                </div>
                <div class="clearfix"></div>
                <div class="text-center mt-3 text-muted">
                    Already Have An Account?
                    <a href="{{ route('login') }}" class="text-success">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
            $(document).on('submit', '#registerForm', function (e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $(".invalid-feedback").children("strong").text("");
                $("#registerForm input").removeClass("is-invalid");
                $.ajax({
                    method: "POST",
                    headers: {
                        Accept: "application/json"
                    },
                    url: "{{ route('register') }}",
                    data: formData,
                    success: () => window.location.assign("{{ route('user.profile') }}"),
                    error: (response) => {
                        if(response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function (key) {
                                $("#" + key + "Input").addClass("is-invalid");
                                $("#" + key + "Error").children("strong").text(errors[key][0]);
                            });
                        } else {
                            window.location.reload();
                        }
                    }
                })
            });
    </script>
@endsection
