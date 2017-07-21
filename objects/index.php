<?php
    //$temp = file_get_contents('data.db');
    //var_dump(unserialize($temp));
    session_start();


    require_once 'signup.php';
    require_once 'database.php';
    require_once 'signin.php';
    $message = '';

    if (!empty($_POST)) {
        if ($_POST['register_form']){
            $signUp = new SignUp();
            $signUp->setPost($_POST);
            if ($signUp->validation()) {
                $database = new Database();
                if ($database->setData($_POST)){
                    $message = 'Successful registration! Thanks!';
                }
            } else $message = $signUp->error;
        }
        else {
            $signIn = new SignIn();
            $signIn->setPost($_POST);
            $signIn->getUserName();
            $signIn->getPassword();
            $database = new Database();
            $data = $database->getData();
            $check = $signIn->checkUser($data['username'], $data['password']);

            if ($check && $_POST['remember']){
                $signIn->remember();
                $message = 'Welcome, ' .$data['username'];
            }
            elseif ($check){
                $message = 'Welcome, ' .$data['username'];
            }
            else $message = 'Error password or name!';
        }
    }
    elseif (isset($_SESSION['user_name'])) {
        $message = 'Hello, ' . $_SESSION['user_name'] . '. You are remembered now!' . ' <a href="./?logout=true">Logout</a>';
        if ($_GET['logout']) {
            $signIn = new SignIn();
            $signIn->logOut();
        }
    }
    elseif(empty($_POST)){;
        $message = '';
    }

?>

<!-- http://homelaravel.com.vagrant.uvolan -->
<!-- https://www.google.com/recaptcha/admin#list -->
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="script.js"></script>

    <link href="style.css" rel="stylesheet" media="all">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="container">
    <? if ($message != ''): ?>
        <div class="row">
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <?= $message ?>
            </div>
        </div>
    <? endif; ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" >
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Remember Me</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="hidden" name="login_form" value="login_form">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form"  method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LempykUAAAAAAxsjjjLoKNrZ3SpU2Mcr8y-fhXd"></div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="hidden" name="register_form" value="register_form">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
