<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 pink lighten-4 p-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panellogin" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panelsignup" role="tab"><i class="fa fa-user-plus mr-1"></i> Register</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panellogin" role="tabpanel">
                        <!--Body-->
                        <div class="modal-body container">
                            <div class="md-form form-sm">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="email" id="login-email" class="form-control validate">
                                <label for="login-email">Your email</label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="login-password" class="form-control validate">
                                <label for="login-password">Your password</label>
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn pink lighten-4" onclick="signIn('login-email', 'login-password')">Log in <i class="fa fa-sign-in ml-1"></i></button>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer display-footer">
                            <div class="options text-center text-md-right mt-1">
                                <p>Not a member? <a href="./signup.php" class="pink-text">Sign Up</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-white pink lighten-4 waves-effect ml-auto" data-dismiss="modal">Close <i class="fa fa-times-circle ml-1"></i></button>
                        </div>

                    </div>
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panelsignup" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form form-sm">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="email" id="signup-email" class="form-control validate">
                                <label for="signup-email">Your email</label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="signup-pass" class="form-control validate">
                                <label for="signup-pass">Your password</label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="signup-pass2" class="form-control validate">
                                <label for="signup-pass2" data-error="Passwords do not match">Repeat password</label>
                            </div>
                            <div class="text-center form-sm mt-2">
                                <button class="btn pink lighten-4" onclick="signup('signup-email', 'signup-pass')">Sign up <i class="fa fa-sign-in ml-1"></i></button>
                            </div>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-right">
                                <p class="pt-1">Already have an account? <a href="./login.php" class="pink-text">Log In</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-white pink lighten-4 waves-effect ml-auto" data-dismiss="modal">Close <i class="fa fa-times-circle ml-1"></i></button>
                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>