<?php

//require_once "controller/authentification_controller.php";
//require_once explode("controller",dirname(__FILE__))[0] ."/controller/authentification_controller.php";

/*/ the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("someone@example.com","My subject",$msg);*/
require_once "controller/checkout.php";

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no" />

    <base href="/./" /> <!-- relative path of all main ressources such as css and JS files ;) -->

    
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

    <link href="css/checkout.css" rel="stylesheet">


      


    <link rel="stylesheet" href="css/font-awesome-animation.min.css">


    
  </head>
  <body >
    
                    <?php   
                   //  require_once "templates/header.php";
                      require_once "templates/header.php";
                      
                   ?>
<div id="page_body">
   

  <div class="row">
    <div class="col-xs-2"></div>
      <div class="col-xs-8">
          <div class="panel panel-default checkout_panel Deliveries_display">
              <!-- Default panel contents -->
              <div class="panel-heading text-center ">
                  <h3>Purchases Management</h3> 
              </div>
              <div class="panel-body ">

                   

              </div>
             
                  <?php
                 
                  GetTmpCart();
                  GetPendingAndPayedCarts();
                  
                ?>
            
              

              
              
            
              <!-- List group -->
            
          </div>
      </div>
   

  </div>

  <div class="col-xs-2" style="padding: 0px;float: right;margin-top: -200px;">
   
      <div class="alert alert-success payment_confirmed_alert">
          <strong>Success!</strong> Opération Achat Success . 
      </div>
    

  </div>
  

</div>


<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add_payment_method_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="col-xs-3" style="padding: 0px;margin-top: 40px;;float: right;margin-right: 20px;">
       
        <div class="alert alert-warning new_p_m_error_password_alert">
            <strong>Error !</strong> Mauvais mot de passe s'il vous plaît entrer votre mot de passe correctement .
        </div>
        <div class="alert alert-danger new_p_m_payment_frosen">
            <strong>Error :</strong> Pour la protection de votre compte ... votre mode de paiement a été bloqué pour une période de  24 heures. S'il vous plaît essayer plus tard

        </div>

        <div class="alert alert-danger new_p_m_server_error">
            <strong>Error :</strong> SERVER ERROR .

        </div>
      </div>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title text-center text-uppercase" id="exampleModalLongTitle">Ajouter une nouvelle méthode de paiement
          </h5>
      </div>
      <div class="modal-body">
          <form style="margin-top: 10px;">
            <div class="form-group">
                <input type="text" tabindex="1" class="form-control payment_account_key" maxlength="16" minlength="8" placeholder="Entrez la clé unique de votre compte bancaire" value="" required >
            </div>

            <div class="form-group">
            
                <input type="password" tabindex="2" class="form-control payment_account_password" maxlength="16" minlength="8"  placeholder="Entrez le mot de passe de votre compte
                " value="" required >
              </div>

              <div class="form-group">
            
                  <button type="submit" class="btn btn-primary add_payment_method_modal_done">Ajouter</button>
              </div>

           
            
               
          </form>
        
      </div>
      
    </div>
  </div>
</div>

<!-- Payment confirmation modal -->
<div class="modal fade" id="confirm_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="col-xs-3" style="padding: 0px;margin-top: 40px;;float: right;margin-right: 20px;">
       
        <div class="alert alert-success new_account_has_been_added">
            <strong>Success : </strong> Votre compte bancaire a été ajouté avec succès à votre compte Eternal
        </div>

        <div class="alert alert-warning error_password_alert">
            <strong>Error !</strong> Mauvais mot de passe s'il vous plaît entrer votre mot de passe correctement Vous avez un nombre fixe d'essais .
        </div>

        <div class="alert alert-warning account_with_no_payment_method">
            <strong>Error !</strong> Il semble que vous n'avez pas encore défini votre mode de paiement. <a class="no_payment_method_alert_click"  >Cliquez ici</a> pour définir un nouveau mode de paiement .
        </div>

        <div class="alert alert-warning balance_insuffisant">
            <strong>Error !</strong> Votre compte ne dispose pas de fonds suffisants .
        </div>
    
        <div class="alert alert-danger payment_frosen">
            <strong>Error :</strong> Pour la protection de votre compte ... votre mode de paiement a été bloqué pour une période de  48 heures. S'il vous plaît essayer plus tard

        </div>
        <div class="alert alert-danger server_error">
            <strong>Error :</strong> SERVER ERROR .
        </div>
    </div>
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
      <div class="modal-header bg-primary confirm_payment_modal_header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" 1style="color: rgb(255, 255, 255);-webkit-tap-highlight-color: rgba(255,255,255,255)">&times;</span>
        </button>
        <h5 class="modal-title text-uppercase text-center " id="confirm_payment_modal_title">Payment  Confirmation</h5>
      </div>
      <div class="modal-body" style="height: 120px;">
        <span style="font-size: 12px;font-weight: 600;">Pour des raisons de sécurité, veuillez entrer votre mot de passe comme une vérification de votre identité pour confirmer le retrait du montant de l'achat de votre compte bancaire. </span>
       
            <form style="margin-top: 10px;">
                <input type="password" class="form-control account_password"  placeholder="Enter Your Password" value="administrator"  >
                <button type="button" class="btn btn-primary confirm_payment_modal_done">Confirm Payment</button>
                 
            </form>
            
          
      
      </div>
      
    </div>
  </div>
</div>
 
  <div class="modal " id="cart_modal">
    <div class="modal-dialog fadeInDown animated" style="margin-top: 30px;">
        <div class="modal-content">
              <div class="modal-header text-left " style="padding:3px;padding-left: 10px;color: white;background-color: black;">
                <h5><b style="/*border-bottom: 1px solid black;padding: 5px;*/">Your Cart :</b></h5>
                
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
					SubTotal :  <span id="cart_SubTotal">0</span>  DA
				</span>
				
				

				<button class="btn btn-primary check_out"> CHECK OUT </button>
                    
                
              </div>
          
        </div>
      
    </div>
    
  </div>





<div class="modal" id="login_register_modal">
  <div class="modal-dialog " style="width: 400px;">
      <div class="modal-content" >
          <div class="modal-header text-center " style="color: #4CAF50;">
            <h3>Authentification</h3>
          </div>

          <div class="modal-body">
          <div class="row ">
            <div class="col-xs-12  login_modal_content" style="display: block;">
              <h5 ><b>Login :</b></h5>

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
              <h5><b>Create An Account :</b></h5>

              <form id="register-form" action="authentification.php?action=register" method="post" role="form" data-toggle="validator" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" data-maxlength="8" >
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
                          <a  tabindex="5" class=" ">Sign In</a>
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
    <script type="text/javascript" src="js/checkout.js"></script>
    <script type="text/javascript" src="js/update_content.js"></script>
    
  <!--  <script type="text/javascript" src="js/msg.js"></script>-->
  </body>
</html>