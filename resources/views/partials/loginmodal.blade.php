<div class="modal fade" id="login_modal" role="dialog"  >
    <div class="modal-dialog lo-sign-custom">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center m-logo mb5">Lancer</div>

                <form class="no-ovflow" role="form" action="{{URL::to('user_login')}}" method="POST" id="login_form">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user_email_address">Email address</label>
                            <input type="email" class="form-control" id="user_email_address" name="user_email_address" >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" class="form-control" id="user_password" name="user_password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <!--<button type="button" id="login_button" onclick="check_login()"class="btn  btn-base btn-sm mt5">Login</button>-->
                            <button type="submit" id="login_button" class="btn  btn-base btn-sm mt5">Login</button>
                        </div>
                        <div class="orlogin text-center">
                            <span>OR</span>
                        </div>
                        <div class="text-center top-mg">
                            <a href="" class="twitter-btn"><i class="fa fa-twitter"></i> &nbsp;Twitter</a>
                            <a href="" class="fb-button"><i class="fa fa-facebook"></i> &nbsp;Facebook</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
