<?php



//require_once explode("browse",dirname(__FILE__))[0] ."/controller/privileges_controller.php";


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

    <link href="css/msg.css" rel="stylesheet">


      


    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
     <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .jssora061 {display:block;position:absolute;cursor:pointer;}
        .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
        .jssora061:hover {opacity:.8;}
        .jssora061.jssora061dn {opacity:.5;}
        .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
    </style>


    
  </head>
  <body >
    
									<?php   //Print the header of the page
			         			  require_once "templates/header.php";

                   ?>

<div id="page_body">
  <div class="row" style="padding-top:30px;padding-left:20px;">
     <div class="col-lg-8" >
   <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1000px;height:450px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1000px;height:450px;overflow:hidden;">
          <?php GetSlideItems();  ?>
           
        </div>
        <!-- Thumbnail Navigator -->
        <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:1000px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
            <div u="slides">
                <div u="prototype" style="position:absolute;top:0;left:0;width:1000px;height:50px;">
                    <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
    </div>
   
 </div>
     <div class="col-lg-4" style="padding-left:50px;">
       <h1 class="text-primary text-capitalize">naviguer comme</h1><br>
       <img src="img/modals/women1.jpg" onclick="location.href='browse/?gender=women'" style="cursor:pointer;width:95%;margin-bottom:30px;">
       <img src="img/modals/men1.png" onclick="location.href='browse/?gender=men'" style="cursor:pointer;width:95%;"> 
     </div>
  </div>
  <br><br><br><br><br>  
  <div class="row brands">
      <div class="col-lg-12 text-center">
        <h1 style="color:black;">MARQUES</h1>
      </div>
      
      
      
      <div class="col-lg-12 brands-content ">
       
       
    <div class="col-lg-2 text-center">
       <a href="/browse/?query=celio&search_opt=Brand"><img src="images/logo/celio.png" style="width:90px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=nike&search_opt=Brand"><img src="images/logo/nike.png" style="width:90px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=lacoste&search_opt=Brand"><img src="images/logo/lacoste.png" style="width:90px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=bota&search_opt=Brand"><font size="1"><img src="images/logo/bota.png" style="width:70px; height: 23px;"></font></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=creeks&search_opt=Brand"><img src="images/logo/creeks.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=festina&search_opt=Brand"><img src="images/logo/festina.png" style="width:110px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
       <a href="/browse/?query=geox&search_opt=Brand"><img src="images/logo/geox.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
       <a href="/browse/?query=guess&search_opt=Brand"><font size="1"><img src="images/logo/guess.png" style="width:70px; height: 23px;"></font></a>
    </div>

    <div class="col-lg-2 text-center">
       <a href="/browse/?query=jackandjones&search_opt=Brand"><img src="images/logo/jackandjones.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=ladyblush&search_opt=Brand"><img src="images/logo/ladyblush.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=levis&search_opt=Brand"><img src="images/logo/levi's.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=lh&search_opt=Brand"><img src="images/logo/lh.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=mosquitos&search_opt=Brand"><img src="images/logo/mosquitos.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=Puma&search_opt=Brand"><img src="images/logo/Puma.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=schott&search_opt=Brand"><img src="images/logo/schott.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=timberland&search_opt=Brand"><img src="images/logo/timberland.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=kuma&search_opt=Brand"><img src="images/logo/kuma.png" style="width:70px; height: 23px;"></a>
    </div>

    <div class="col-lg-2 text-center">
        <a href="/browse/?query=adidas&search_opt=Brand"><img src="images/logo/adidas.png" style="width:70px; height: 23px;"></a>
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
   
    <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Orientation: 2,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    
     <script type="text/javascript">jssor_1_slider_init();</script>
   
  <!--  <script type="text/javascript" src="js/msg.js"></script>-->
  </body>
</html>


<?php

require_once "classes/sql.php";




function GetSlideItems(){
  $query = "SELECT `AdsImagePath`,`RedirectionLink`,`Desc` FROM `ads` WHERE `PageLocation` LIKE 'index'";
  
  $sql = new sql();
$sql = $sql->connection;
$i=0;
  if($result = $sql->query($query)){
    while($row = $result->fetch_assoc()){
   // $sql->real_escape_string($city);
   
      echo " <div data-p='170.00'  style='cursor:pointer;'>
                
                <img onclick=\"location.href='".$row["RedirectionLink"] ."';\"  data-u='image' src='".$row["AdsImagePath"] ."' />
                <div u='thumb'>".$row["Desc"] ."</div>
                
            </div>";
          
    }
    
  }
  
  
  
  
}







?>