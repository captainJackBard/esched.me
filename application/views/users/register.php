<?php
	if($this->session->Auth){
		return redirect('dashboard');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eSched.me - Register</title>
	<link href="img/logoicon.ico" rel="shortcut icon">

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
	<link href="css/aken.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<!-- media -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script>
    <script src="//cdn.backand.net/backand/dist/1.8.2/backand.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular-route.js"></script>

	<script src="../js/app.js"></script>
	<script src="../js/controllers/AuthController.js"></script>
	<script src="../js/services/AuthService.js"></script>
	
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav page-scroll" href="#">
					<div class="logo">
						<img src="img/logo.png" class="logoimg">
					</div>
				</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="admin/login">Sign In</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



    <!-- Header bg -->
    	<div class="container" ng-app="app" ng-controller="AuthController as vm">
			<div class="row main">
				<div class="panel-heading">
	               <div class="login-logo">
	               		<a href="../../index2.html"><b>eSched</b>.me</a>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" ng-model="vm.firstname"class="form-control" name="email" id="email"  placeholder="Enter your First Name"/>
								</div>
							</div>
						</div>

                        <div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" ng-model="vm.lastname"class="form-control" name="email" id="email"  placeholder="Enter your Last Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" ng-model="vm.email"class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" ng-model="vm.password"class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password"  ng-model="vm.confirmPassword" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="button" ng-click="vm.register(vm.firstname, vm.lastname, vm.email, vm.password, vm.confirmPassword)"class="btn btn-primary btn-lg btn-block login-button">Register</button>
						</div>
						<div class="login-register">
				            <a href="index.php">Login</a>
				         </div>
					</form>
				</div>
			</div>
		</div>
	
    <!-- /header bg -->
	
    <!-- Footer -->
    <footer>
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Top Page</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
						<li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="service.php">Services</a>
                        </li>
						<li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy;
					E-Sched.me. All Rights Reserved 2016 &nbsp
					<a href="#" data-toggle="modal" data-target="#disclaimer">Disclaimer</a></p>
                
				</div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

	
	<!-- js plugin -->
	<script src="js/easyease.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/modal.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <style>
            /*
        /* Created by Filipe Pina
        * Specific styles of signin, register, component
        */
        /*
        * General styles
        */

        body, html{
            height: 100%;
            background-repeat: no-repeat;
            background-color: #d3d3d3;
            font-family: 'Oxygen', sans-serif;
        }

        .main{
            margin-top: 70px;
        }

        h1.title { 
            font-size: 50px;
            font-family: 'Passion One', cursive; 
            font-weight: 400; 
        }

        hr{
            width: 10%;
            color: #fff;
        }

        .form-group{
            margin-bottom: 15px;
        }

        label{
            margin-bottom: 15px;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 11px;
            padding-top: 3px;
        }

        .main-login{
            background-color: #fff;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

        }

        .main-center{
            margin-top: 30px;
            margin: 0 auto;
            max-width: 330px;
            padding: 40px 40px;

        }

        .login-button{
            margin-top: 5px;
        }

        .login-register{
            font-size: 11px;
            text-align: center;
        }

    </style>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <script>
    toastr.options.closeButton = true;
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 300;
    toastr.options.closeEasing = 'swing';
</script>
</body>
</html>
