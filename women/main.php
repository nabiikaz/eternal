<?php





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

      


    <link rel="stylesheet" href="css/font-awesome-animation.min.css">


    
  </head>
  <body data-spy="scroll" data-target=".nabi" data-offset="50">
    
    <nav class="navbar navbar-default  navbar-fixed-top" ">
    <div style="height: 1px;background-color: #f99d32">
      <div style="height: 1px;background-color: #0068b3;width: 33%; float:left"></div>
      <div style="height: 1px;background-color: #65b561;width: 33%;float:right; "></div>
    </div>
      
      <div ></div>
   
    <div class="container-fluid Top_Nav "  style="background-color: white; display: none;"><!--fadeInRight animated-->
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header ">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
     
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        
       <ul class="nav navbar-nav navbar-left">
          <li id="contact_us"><a href="">Contact Us <span class="glyphicon glyphicon-earphone   " style="margin-top:-3px;margin-right: 2px;font-size: 10px;"></span></a></li>
       </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="">Login</a></li>
                
                <!--<li role="separator" class="divider"></li>-->
                
              </ul>
            </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->










    <div class="container-fluid Middle_Nav">
    <!--<img src="img/eternal_clothing_writing.png" width="100">-->

        <div class="col-xs-1 logo" >
          <img src="img/logo.png " width="130">
        </div>
    
        <ul class="nav navbar-nav Main_Menu col-xs-4">
          <li class="Main_Menu_Tab " id="women_menu_title">WOMEN </li>
          <li class="Main_Menu_Tab"  id="men_menu_title">MEN </li>
          <li class="Main_Menu_Tab"  id="kids_menu_title">KIDS </li>
        
        </ul>  


        <div class="col-xs-3 right_block_main_menu navbar-nav navbar-right" >

            
              <div class="col-xs-1 ripple authentification_block " style="width: 180px; " data-toggle="modal" data-target="#login_register_modal">
                  <span style="margin-right:  -5px;font-size: 18px;margin-top: 1px;position: absolute;" class="glyphicon glyphicon-user"></span>
                 

                  <b  style="margin-left: 25px;" >Sign in / Register</b>

              </div>

                  
              



          <div class="col-xs-1 " data-toggle="modal" data-target="#cart_modal" id="cart_counter"> 

           <div class="cart_counter faa-shake   text-center" >
            <b >0</b>
          </div>
          <span class="glyphicon glyphicon-shopping-cart    " style="margin-left:-15px;font-size: 28px;margin-top: -5px;position: absolute;"></span>

         
          


          </div>
          
          
        </div>



    </div>












    <div class="container-fluid End_Nav">
          <div class="input-group col-xs-6 Middle_Nav_Menu   navbar-nav navbar-left  ">
                  <ul class="nav navbar-nav women_menu Menu fadeInRight animated" style="display: none;">
                          <li class="Main_Sub_Menu_Tab " id=""><b>BEAUTY</b> </li>
                          <li class="Main_Sub_Menu_Tab"><b>CLOTHING</b>  </li>
                          <li class="Main_Sub_Menu_Tab"><b>ACCESSORIES</b> </li>
                          <li class="Main_Sub_Menu_Tab"><b>FOOTWEAR</b> </li>	
                          <li class="Main_Sub_Menu_Tab"><b>BAGS</b> </li>
                          <li class="Main_Sub_Menu_Tab"><b>HOME  LIFESTYLE</b> </li>  
                          
                  </ul>
                   <ul class="nav navbar-nav men_menu Menu fadeInRight animated ">
                          <li class="Main_Sub_Menu_Tab " id=""><b>Shirts</b> </li>
                          <li class="Main_Sub_Menu_Tab"><b>Pants</b> </li>
                          <li class="Main_Sub_Menu_Tab"><b>Tees &  s</b> </li>
                          <li class="Main_Sub_Menu_Tab"><b>BAGS</b> </li>
                          <li class="Main_Sub_Menu_Tab"><b>HOME  LIFESTYLE</b> </li>
                          
                  </ul>
                  <ul class="nav navbar-nav kids_menu Menu fadeInRight animated ">
                          <li class="Main_Sub_Menu_Tab " >BOYS </li>
                          <li class="Main_Sub_Menu_Tab">GIRLS </li>
                          
                  </ul>
          </div>
    
    <div class="input-group col-xs-4 Middle_Nav_Search   navbar-nav navbar-right  ">
            
            <input type="text" class="form-control  " placeholder="Search " aria-describedby="basic-addon1" style="border: 0px solid red;">
            <span class="input-group-addon  " id="basic-addon2" style="border: 0px solid red; background-color: #00b34b;"><img class="search_icon" src="search.png" width="20" style=" margin:auto;"> </span>

    </div>
    </div>



  <!--  <div class="container-fluid Footer_Nav">
     <div id="men_menu_section"> ljlkjlk
    </div> -->

   



    </div>
  </nav>


<div id="page_body">
	<div class="row">
		<div class="fadeshow col-xs-8 ">
		<h4 class="text-center">SLIDE SHOW GOES HERE</h4>



		</div>
		<div class="col-xs-2 shop_by">
		<h5 style="line-height: 20px;font-size: 16px; color: black;"><b><span style="border-bottom: 3px solid black;"> SHOP</span> BY</b></h5><br>		

			<div class="col-xs-12">
			<a href="women">	<img  src="img/modals/women1.webp"  width="320"  height="115" ></a>
			</div>
			<div class="col-xs-12 ">
				<a href="men.php/">	<img  src="img/modals/men1.png"  width="320"  height="115"></a>
			</div>
			<div class="col-xs-12">
				<a href="kids.php/">	<img  src="img/modals/kid1.webp"  width="320"  height="115" ></a>
				
			</div>


		</div>
	</div>

<br>
<br>
<br>
	<div class="row">

		<div class="col-xs-2 " ></div>
		
		<div class="col-xs-4" style="border:1px solid black;margin-left: -40px;"></div>
		
		<div class="col-xs-4" style="border:1px solid black;margin-left:  50px; "></div>
 


		<div class="col-xs-2" ></div>
		
	</div>
	
				
</div>




  <div class="modal " id="cart_modal">
    <div class="modal-dialog fadeInDown animated" style="margin-top: 30px;">
        <div class="modal-content">
              <div class="modal-header text-left " style="padding:3px;padding-left: 10px;color: white;background-color: black;">
                <h5><b style="/*border-bottom: 1px solid black;padding: 5px;*/">Your Cart :</b></h5>
                
              </div>

              <div class="modal-body text-left">
              

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
                      <div class="col-lg-6 ">
                        <div class="">
                          <a href="authentification.php?action=forgot_password" tabindex="5" class="forgot-password ">Forgot Password?</a>
                        </div>
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
  </body>
</html>