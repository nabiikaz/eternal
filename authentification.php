<?php

//require_once "controller/authentification_controller.php";
require_once explode("controller",dirname(__FILE__))[0] ."/controller/authentification_controller.php";

/*/ the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("someone@example.com","My subject",$msg);*/


?>




  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no" />

    <base href="/./" />
    <!-- relative path of all main ressources such as css and JS files ;) -->


    <link rel="icon" type="image/png" sizes="16x16" href="img/icon2.png">


    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Eternal</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->



    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
    <link href="css/item.css" rel="stylesheet">
    <link href="css/filter_bar.css" rel="stylesheet">
    <link href="css/authentification.css" rel="stylesheet">

    <link href="css/msg.css" rel="stylesheet">





    <link rel="stylesheet" href="css/font-awesome-animation.min.css">



  </head>

  <body>

    <?php   
                   //  require_once "templates/header.php";
                      require_once "templates/header.php";
                      
                   ?>

    <div id="page_body">


      <div class="col-xs-4" style="margin-right: 50px;"></div>
      <div class="action_type Login_display col-xs-4 authentification_title" style="margin-top:50px;">
        <div class="row authentification_title" style="background-color:#333;margin-bottom: 30px;">

          <div class="col-xs-12 text-center">
            <h2 style="color:#fff;">
              <b>Login</b>
            </h2>
          </div>

        </div>


        <form action="" method="POST">
          <div class="form-group">

            <a href="authentification.php?action=registration" class="registration">
              <b>Don't Have An Account ! </b>Click Here to create one. </a>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" tabindex="1" class="form-control " placeholder=" Email" value=""
              required>
          </div>

          <div class="form-group">
            <input type="password" name="password" id="password" tabindex="1" class="form-control " minlength="8" maxlength="16" placeholder="Password"
              value="" required>
            <span class="login_error_msg">Email Or / And Password Invalid Please Check Your Credentials </span>
            <br>
          </div>

          <div class="form-group" style="margin-top: 20px;">
            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn authentification_submit"
              value="Login">
            <a href="authentification.php?action=forgot_password" class="forgot_password">Forgot Your Password ! </a>
            <br>
          </div>

        </form>





      </div>


      <div class="action_type Registration_display col-xs-4 authentification_title" style="margin-top:10px;">
        <div class="row authentification_title" style="background-color:#333;margin-bottom: 30px;">


          <div class="col-xs-12 text-center">
            <h2 style="color:#fff;">
              <b>Registration</b>
            </h2>
          </div>


        </div>


        <form action="" method="POST">
          <div class="form-group">

            <a href="authentification.php?action=login" class="registration">
              <b>I Have An Account !</b> Click to Sign In. </a>
          </div>
          <div class="form-group">
            <input type="text" name="fullname" id="username" tabindex="1" class="form-control " placeholder="Full Name" maxlength="25"
              minlength="8" value="" title="FullName Must be between 8 & 25" required>
          </div>

          <div class="form-group">
            <input type="email" name="email" id="email" tabindex="2" class="form-control " placeholder="Email Address" value=""
              required>
          </div>


          <div class="form-group">

            <input type="password" name="password" data-minlength="6" tabindex="3" class="form-control" id="inputPassword" placeholder="Password"
              maxlength="25" minlength="8" value="" required>
            <span class="glyphicon glyphicon-eye-open" title="Show the password"></span>

          </div>


          <div class="form-group">
            <input style="overflow-y: hidden;" type="number" name="phone" id="phone" tabindex="4" class="form-control " placeholder="Phone Number"
              value="" data-toggle="tooltip" data-placement="right" title="Phone Number Should Be in a format of Ten Digits"
              required>
          </div>


          <div class="form-group">
            <input type="text" name="address" id="Address" tabindex="5" class="form-control " placeholder="Your Address" maxlength="255"
              value="" required>
          </div>



          <div class="form-group" style="margin-top: 20px;">
            <input type="submit" name="register-submit" id="register-submit" tabindex="6" class="form-control btn authentification_submit"
              value="Register">
            <a class="registration_error_msg" style="">Error Creating New User ( Email is aleady used ) </a>
          </div>

        </form>





      </div>


      <div class="action_type forgot_password_display col-xs-4 authentification_title" style="margin-top:50px;">
        <div class="row authentification_title" style="background-color:#333;margin-bottom: 30px;">


          <div class="col-xs-12 text-center">
            <h2 style="color:#fff;">
              <b>Password Recovery</b>
            </h2>
          </div>


        </div>


        <form>
          <div class="form-group">

            <span class="forgotpassword_msg_guide">Enter Your Email To Recover Your Password !</span>
          </div>
          <div class="form-group">
            <input type="Email" name="Email" tabindex="1" class="form-control email " placeholder="Your Email Address" value="" data-toggle="tooltip"
              data-placement="right" title="Email is required to Recover Your password!" required>

            <span class="emailsent" style=""></span>
          </div>



          <div class="form-group" style="margin-top: 20px;">
            <input type="submit" name="PasswordRecovery-submit" id="register-submit" tabindex="4" class="form-control btn authentification_submit PasswordRecovery_submit  "
              value="Send Recovery Link">
          </div>

        </form>





      </div>




      <div class="action_type recover_password_display col-xs-4 authentification_title" style="margin-top:50px;">
        <div class="row authentification_title" style="background-color:#333;margin-bottom: 30px;">


          <div class="col-xs-12 text-center">
            <h2 style="color:#fff;">
              <b>Password Changing</b>
            </h2>
          </div>


        </div>


        <form action="" method="POST">
          <div class="form-group">


          </div>
          <div class="form-group">
            <label for="inputPassword" class="control-label">Enter Your New Password</label>

            <div class="form-group ">
              <input type="password" name="newpassword" data-minlength="6" class="form-control" id="NewPassword" maxlength="25" minlength="8"
                placeholder="Password" required>

            </div>

            <div class="form-group ">
              <input type="password" data-minlength="6" class="form-control" id="ConfirmNewPassword" maxlength="25" minlength="8" placeholder="Confirm Password"
                data-toggle="tooltip" data-placement="right" title="Confirm Password Does not match with password." required>

            </div>

            <div class="form-group ">
              <input type="hidden" class="token" name="token" value="">

            </div>



          </div>



          <div class="form-group" style="margin-top: 20px;">
            <input type="submit" name="PasswordRecovery-submit" id="register-submit" tabindex="4" class="form-control btn authentification_submit RenewPassword_submit  "
              value="Submit New Changes">

          </div>

        </form>





      </div>

      <div class="col-xs-4"></div>




    </div>





    <div class="modal " id="cart_modal">
      <div class="modal-dialog fadeInDown animated" style="margin-top: 30px;">
        <div class="modal-content">
          <div class="modal-header text-left " style="padding:3px;padding-left: 10px;color: white;background-color: black;">
            <h5>
              <b style="/*border-bottom: 1px solid black;padding: 5px;*/">Your Cart :</b>
            </h5>

          </div>

          <div class="modal-body text-left">
            <!--<table border=0 class="rounded-list" style="margin-left: 5px;">
			        <tr>
			            <td>
			            <ol>
			            <li class="truncate-ellipsis" style="width: 250px;""><p style="padding-left: 10px;">There is a 2 drink minimum for all guests with reserved seating tickets</p></li>
			            
			            </ol>
			            </td>
			        </tr>
		    </table>-->

            <div class="panel panel-default cart_history">


            </div>


            <span id="SubTotal">
              SubTotal :
              <span id="cart_SubTotal">0</span> DA
            </span>



            <button class="btn btn-primary check_out"> CHECK OUT </button>


          </div>

        </div>

      </div>

    </div>





    <div class="modal" id="login_register_modal">
      <div class="modal-dialog " style="width: 400px;">
        <div class="modal-content">
          <div class="modal-header text-center " style="color: #4CAF50;">
            <h3>Authentification</h3>
          </div>

          <div class="modal-body">
            <div class="row ">
              <div class="col-xs-12  login_modal_content" style="display: block;">
                <h5>
                  <b>Login :</b>
                </h5>

                <form id="login-form" action="authentification.php?action=login" method="post" role="form" style="display: block;margin-top: 61px;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>

                  <div class="form-group Password_login">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control " placeholder="Password">
                  </div>



                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row ">
                      <div class="col-lg-12 ">
                        <a href="authentification.php?action=forgot_password" tabindex="5" class="forgot-password ">Forgot Password?</a>
                      </div>
                      <div class="col-lg-12 ">
                        <a href="authentification.php?action=registration" tabindex="5" class="registration_option ">Don't Have an Account !!</a>
                      </div>


                    </div>

                  </div>

                </form>
              </div>

              <div class="col-xs-12 register_modal_content" style="display: none;">
                <h5>
                  <b>Create An Account :</b>
                </h5>

                <form id="register-form" action="authentification.php?action=register" method="post" role="form" data-toggle="validator"
                  style="display: block;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" data-maxlength="8">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row ">
                      <div class="col-lg-6 ">
                        <div class="">
                          <a tabindex="5" class=" ">Sign In</a>
                        </div>
                      </div>


                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>

        </div>

      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->

    <script src="js/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
    <script type="text/javascript" src="js/filter.js"></script>
    <script type="text/javascript" src="js/authentification.js"></script>
    <!--  <script type="text/javascript" src="js/msg.js"></script>-->
  </body>

  </html>