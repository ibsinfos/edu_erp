<?php echo $html_heading; ?>
<main>
    <div class="login-wrapper">
        <form name="erp_user_login_form" id="erp_user_login_form" action="#" class="form-vertical" method="post">
            <div class="panel panel-bordered z-depth-1">
                <div class="panel-header">
                    <h5>
                        Sign In to <b class="main-text">School ERP</b>
                    </h5>
                </div>
                <div class="panel-body">
                    <div class="row no-gutter margin-bottom-0">
                        <div class="input-field col s12">
                            <input type="text" name="userName" id="userName" required>
                            <label for="login">Username</label>
                        </div>
                    </div>
                    <div class="row no-gutter margin-bottom-0">
                        <div class="input-field col s12">
                            <input type="password" name="password" id="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="remember-forgot-wrapper">
                        <!--<p class="remember-me">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </p>-->
                        <p class="forgot-password">
                            <a href="forgot_password.html">
                                <i class="material-icons">lock</i>
                                Forgot password
                            </a>
                        </p>
                    </div>
                </div>
                <!--<div class="panel-footer panel-footer-social">
                    <a class="btn-floating google-plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn-floating facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn-floating twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn-floating linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <a class="btn-floating github">
                        <i class="fa fa-github"></i>
                    </a>
                </div> -->
                <div class="panel-footer">
                    <div class="right-align">
                        <!--<a href="register.html" class="btn-flat waves-effect">
                            REGISTER
                        </a>-->
                        <button type="submit" class="btn-flat waves-effect">
                            LOG IN
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php echo $footer; ?>
<script src="<?php echo SchoolSiteJSURL; ?>custom/forgot-password-login.js"></script>
<script type="text/javascript">
    myJsMain.login();
</script>