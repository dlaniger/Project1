<!DOCTYPE html>
<html lang="en" ng-app="tikiTrotter">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Tiki Trotter | Hotel Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() . 'public/css/bootstrap.css'; ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url() . 'public/font-awesome/css/font-awesome.css'; ?>" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?= base_url() . 'public/css/style.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'public/css/style-responsive.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'public/lineicons/style.css'; ?>" rel="stylesheet"> 
    <link href="<?= base_url() . 'public/css/tiki.css'; ?>" rel="stylesheet"> 

    <script src="<?= base_url() . 'public/js/angular/angular.min.js'; ?>" type="text/javascript"></script>
    <script src="<?= base_url() . 'public/js/controllers/app.js'; ?>" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <div ng-controller="userController">
	  <div id="login-page">
	  	<div class="container"><br/><br/>
	  	<div align="center">
	  		<img src="<?= base_url() . 'public/img/tiki_trotter_big.png'; ?>">
	  	</div>
		      <form class="form-login" action="/dashboard/main" method="post">
		        <h2 class="form-login-heading"><strong>DASHBOARD LOGIN</strong></h2>
		        <div class="login-wrap">
		        	<div id="alert-message" style="display: none;" class="alert alert-warning">Email and/or password incorrect!</div>
		        	<div id="alert-change-s" style="display: none;" class="alert alert-success">Password successfully changed! You may now login.</div>
		        	<div id="div_busy" align="center" style="display: none; height: 30px; margin-bottom: 20px;"><img src="<?= base_url() . 'public/img/busy.gif'; ?>"/></div>
		            <input type="text" class="form-control" placeholder="Email" id="email" ng-model="login.email" autofocus>
		            <br>
		            <input ng-keyup="$event.keyCode == 13 && authenticateUser()" type="password" class="form-control" id="pass_key" ng-model="login.pass_key" placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-success btn-block" type="button" ng-click="authenticateUser()"><i class="fa fa-lock"></i> SIGN IN</button>
		            <div class="registration">
		            <hr/>
		                <a class="" href="#createAccount" data-toggle="modal">
		                    Create an account, it's really simple!
		                    <!-- <span align="center"> -->
		                    	<!-- OR -->
		                    <!-- </span><br/> -->
		                    <button class="btn btn-facebook" type="submit" style="width: 290px; margin-top: 10px;"><i class="fa fa-facebook"></i> Login with Facebook</button>
		                </a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="changePassword" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title"><i class="li_key"></i> Change Password</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p style="margin: 10px;">You are currently using a system generated password. Please change your password to continue.</p>
		                          <input type="hidden" ng-model="login.email">
		                          <div id="alert-change" style="display: none;" class="alert alert-warning">Passwords doesn't match!</div>
		                          <input type="password" placeholder="Password" class="form-control placeholder-no-fix" style="width: 400px; margin-bottom: 10px;" ng-model="cp.pk">
		                          <input ng-keyup="$event.keyCode == 13 && changePassword(login.email)" type="password" placeholder="Confirm password" class="form-control placeholder-no-fix" style="width: 400px; margin-bottom: 10px;" ng-model="cp.cpk">
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-success" type="button" ng-click="changePassword(login.email)">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		      </form>	  	
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="createAccount" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title"><strong><i class="li_user"></i> Create Account With Tiki Trotter</strong></h4>
		                      </div>
		                      <div class="modal-body">
			                      <div id="signup-form">
				                      <h5>Please provide us with your full name and email address.</h5>
				                          <!-- <div id="alert-signup" style="display: none;" class="alert alert-warning">Thank you for registering! An email containing your system generated password was sent to your email address.</div> -->
				                          <input type="text" ng-model="signup.fullname" placeholder="Full name (e.g. John Appleseed)" class="form-control placeholder-no-fix" style="width: 350px; margin-bottom: 10px; margin-top: 20px;" ng-model="signup.fullname"/>
				                          <input type="text" ng-model="signup.email" placeholder="Email address (e.g. someone@email.com)" class="form-control placeholder-no-fix" style="width: 350px; margin-bottom: 10px;" ng-model="signup.email"/>
				                          <div class="captcha" style="margin-right: 10px;" align="center">{{capt}}</div><div style="display: inline-block; margin-bottom: 10px;" class="pointer" ng-click="reCaptcha()"><img src="<?= base_url() . 'public/img/re_cap.png'; ?>"></div>
				                          <input type="text" ng-model="signup.captcha" id="cap" placeholder="Type what you see in the box" class="form-control has-error" style="width: 210px; margin-bottom: 10px;" ng-model="signup.email"/>
				                          <div style="display: inline-block; margin-bottom: 5px; display: none;" id="inv_cap"><font color="red">Invalid CAPTCHA!</font></div>
				                          <br/>
				                          &nbsp;<input type="checkbox">&nbsp;I agree to the <a href="#">privacy statement</a> of Tiki Trotter
				                      <div class="modal-footer">
				                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
				                          <button class="btn btn-success" type="button" ng-click="createAccount()">Submit</button>&nbsp;<div id="busy-signup" style="display: none; width: 33px; height: 33px; float: right; padding: 2px;"><img src="<?= base_url() . 'public/img/busy.gif'; ?>"/></div>
				                      </div>
			                      </div>
				                  <div id="signup-done" style="display: none;">
				                  <div style="padding: 20px;">
				                  	<h4><strong>Welcome to Tiki Trotter!</strong></h4>
				                  	<br/>
				                  	Thank you for registering! An email containing your system generated password was sent to the email address you used to register. Please check your spam folders if you don't see the email in your inbox.<br/><br/><strong>Tiki Trotter Team</strong>
				                  </div>
				                      <div class="modal-footer">
				                          <button class="btn btn-success" type="button" data-dismiss="modal">Okay</button>
				                      </div>
				                  </div>
			                  </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		      </form>	  	
		      <div align="center" style="margin-top: 30px;">
		      	<font color="#fff" size="2px;">
		      		&copy; Copyright 2015 Tiki Trotter Inc.<br/>
		      		Main Website | About | Contact | Privacy Policy
		      	</font>
		      </div>
	  	</div>
	  </div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url() . 'public/js/jquery.js'; ?>"></script>
    <script src="<?= base_url() . 'public/js/bootstrap.min.js'; ?>"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?= base_url() . 'public/js/jquery.backstretch.min.js'; ?>"></script>
    <script>
        $.backstretch("<?= base_url() . 'public/img/backpack.jpg'; ?>", {speed: 500});
    </script>


  </body>
</html>
