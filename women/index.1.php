<?php



require_once explode("women",dirname(__FILE__))[0] ."/controller/privileges_controller.php";


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


    
  </head>
  <body >
    
									<?php   
			           require_once explode("women",dirname(__FILE__))[0] ."templates/header.php";

                   ?>

<div id="page_body">
  				
				

<div class="row">
	<div class="col-xs-2 fixed_side_right_bar " >
		<dir class="col-lg-12 text-left filter_title">
		<h4 ><b>FILTER BY: </b><small><b></b></small></h4> 
		

		</dir>

		<div class="category_subtitles">
		<br>
		<br>
		<div class="filter_beauty filter_tag"  >
			<h5 ><b>BEAUTY   </b> </h5> 
			<div ><a href="women/?filter=beauty&Category=makeup" class="_subtitle makeup">Make-Up</a></div>
			<div ><a href="women/?filter=beauty&Category=skincare" class="_subtitle skincare">Skin Care</a></div>
			<div ><a href="women/?filter=beauty&Category=bath_and_body" class="_subtitle bath_and_body">Bath and Body</a></div>	
			<div ><a href="women/?filter=beauty&Category=haircare" class="_subtitle haircare">Hair Care</a></div>
			<div ><a href="women/?filter=beauty&Category=lipcare" class="_subtitle lipcare">Lip Care</a></div>
			<div ><a href="women/?filter=beauty&Category=eyecare" class="_subtitle eyecare">Eye Care</a></div>	
			<div ><a href="women/?filter=beauty&Category=footcare" class="_subtitle footcare">Foot Care</a></div>
		</div>


		<div class="filter_clothing filter_tag"  >
			<h5 ><b>CLOTHING   </b> </h5> 
			<div ><a href="women/?filter=clothing&Category=tops" class="_subtitle tops">Tops</a></div>
			<div ><a href="women/?filter=clothing&Category=dresses" class="_subtitle dresses">Dresses</a></div>
			<div ><a href="women/?filter=clothing&Category=Pants" class="_subtitle Pants">Pants</a></div>	
			<div ><a href="women/?filter=clothing&Category=shorts" class="_subtitle shorts">Shorts</a></div>	
			<div ><a href="women/?filter=clothing&Category=skirts" class="_subtitle skirts">Skirts</a></div>	
			<div ><a href="women/?filter=clothing&Category=jumpsuits" class="_subtitle jumpsuits">Jumpsuits</a></div>	
			
		</div>

		<div class="filter_accessories filter_tag"  >
			<h5 ><b>ACCESSORIES   </b> </h5> 
			<div ><a href="women/?filter=accessories&Category=socks" class="_subtitle socks">Socks</a></div>
			<div ><a href="women/?filter=accessories&Category=scarves" class="_subtitle scarves">Scarves</a></div>
			<div ><a href="women/?filter=accessories&Category=hats" class="_subtitle hats">Hats</a></div>	
			<div ><a href="women/?filter=accessories&Category=belts" class="_subtitle belts">Belts</a></div>	
			<div ><a href="women/?filter=accessories&Category=gloves" class="_subtitle gloves">Gloves</a></div>	
			
		</div>
			

		</div>	
	</div>
	<div class="col-xs-7 items_display">

		<div class="row">
			<div class="col-xs-4">
			<div class="panel  Item" id="01240" >
				  <div class="panel-body Item_Panel_Picture text-center">
				  	<img src="img/items/test2.jpg" >
				  </div>

				  <div class="panel-body Item_Panel_Body ">
				  		<h4 class="text-center " style="margin-bottom: 10px;">
				  			<span class="ellipis Item_Panel_Name"  style=" "> Teechirt CooColjld</span> 
				  		</h4>
				  		<div class="text-center" style="border:0px solid grey;margin-bottom: 5px;">
					  		<span class="text-center Item_Panel_Price" >

					  		<strong>Price</strong> 
					  		<span style="font-size: 15px;color: #29cf42;">150.12 DA</span>
					  		</span>
					  			
					  	</div>
				  			<div class="item_rattings text-center">	<!--div with item_ratings -->
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								
							</div>
				  		
				  		
				  </div>

				  <div class="panel-body Item_Panel_Footer">
				  		<button class="add_to_cart text-center">
				  			ADD TO CART
				  		</button>
				  </div>
			</div>

			</div>


			<div class="col-xs-4">
			<div class="panel  Item" id="01241">
				  <div class="panel-body Item_Panel_Picture text-center">
				  	<img src="img/items/test4.jpg" >
				  </div>

				  <div class="panel-body Item_Panel_Body ">
				  		<h4 class="text-center " style="margin-bottom: 10px;">
				  			<span class="ellipis Item_Panel_Name"  style=" ">  hola coco</span> 
				  		</h4>
				  		<div class="text-center" style="border:0px solid grey;margin-bottom: 5px;">
					  		<span class="text-center Item_Panel_Price" >

					  		<strong>Price</strong> 
					  		<span style="font-size: 15px;color: #29cf42;">10.21 DA</span>
					  		</span>
					  			
					  	</div>
				  			<div class="item_rattings text-center">	<!--div with item_ratings -->
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								
							</div>
				  		
				  		
				  </div>

				  <div class="panel-body Item_Panel_Footer">
				  		<button class="add_to_cart text-center">
				  			ADD TO CART
				  		</button>
				  </div>
			</div>
			
			</div>

			<div class="col-xs-4">
			<div class="panel  Item" id="01242">
				  <div class="panel-body Item_Panel_Picture text-center">
				  	<img src="img/items/test5.jpg" >
				  </div>

				  <div class="panel-body Item_Panel_Body ">
				  		<h4 class="text-center " style="margin-bottom: 10px;">
				  			<span class="ellipis Item_Panel_Name"  style=" "> bla tees</span> 
				  		</h4>
				  		<div class="text-center" style="border:0px solid grey;margin-bottom: 5px;">
					  		<span class="text-center Item_Panel_Price" >

					  		<strong>Price</strong> 
					  		<span style="font-size: 15px;color: #29cf42;">251.2 DA</span>
					  		</span>
					  			
					  	</div>
				  			<div class="item_rattings text-center">	<!--div with item_ratings -->
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								
							</div>
				  		
				  		
				  </div>

				  <div class="panel-body Item_Panel_Footer">
				  		<button class="add_to_cart text-center">
				  			ADD TO CART
				  		</button>
				  </div>
			</div>
			
			</div>
		</div>

		<div class="row">
			<div class="col-xs-4">
			<div class="panel  Item" id="01243">
				  <div class="panel-body Item_Panel_Picture text-center">
				  	<img src="img/items/test6.jpg" >
				  </div>

				  <div class="panel-body Item_Panel_Body ">
				  		<h4 class="text-center " style="margin-bottom: 10px;">
				  			<span class="ellipis Item_Panel_Name"  style=" "> Teechirt black of bla</span> 
				  		</h4>
				  		<div class="text-center" style="border:0px solid grey;margin-bottom: 5px;">
					  		<span class="text-center Item_Panel_Price" >

					  		<strong>Price</strong> 
					  		<span style="font-size: 15px;color: #29cf42;">10.12 DA</span>
					  		</span>
					  			
					  	</div>
				  			<div class="item_rattings text-center">	<!--div with item_ratings -->
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								
							</div>
				  		
				  		
				  </div>

				  <div class="panel-body Item_Panel_Footer">
				  		<button class="add_to_cart text-center">
				  			ADD TO CART
				  		</button>
				  </div>
			</div>

			</div>


			<div class="col-xs-4">
			<div class="panel  Item" id="01244">
				  <div class="panel-body Item_Panel_Picture text-center">
				  	<img src="img/items/test7.jpg" >
				  </div>

				  <div class="panel-body Item_Panel_Body ">
				  		<h4 class="text-center " style="margin-bottom: 10px;">
				  			<span class="ellipis Item_Panel_Name"  style=" "> item perfect</span> 
				  		</h4>
				  		<div class="text-center" style="border:0px solid grey;margin-bottom: 5px;">
					  		<span class="text-center Item_Panel_Price" >

					  		<strong>Price</strong> 
					  		<span style="font-size: 15px;color: #29cf42;">50.12 DA</span>
					  		</span>
					  			
					  	</div>
				  			<div class="item_rattings text-center">	<!--div with item_ratings -->
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								
							</div>
				  		
				  		
				  </div>

				  <div class="panel-body Item_Panel_Footer">
				  		<button class="add_to_cart text-center">
				  			ADD TO CART
				  		</button>
				  </div>
			</div>
			
			</div>

			<div class="col-xs-4">
			<div class="panel  Item" id="01245">
				  <div class="panel-body Item_Panel_Picture text-center">
				  	<img src="img/items/test8.jpg" >
				  </div>

				  <div class="panel-body Item_Panel_Body ">
				  		<h4 class="text-center " style="margin-bottom: 10px;">
				  			<span class="ellipis Item_Panel_Name"  style=" "> Teechirt CooColjld</span> 
				  		</h4>
				  		<div class="text-center" style="border:0px solid grey;margin-bottom: 5px;">
					  		<span class="text-center Item_Panel_Price" >

					  		<strong>Price</strong> 
					  		<span style="font-size: 15px;color: #29cf42;">150.12 DA</span>
					  		</span>
					  			
					  	</div>
				  			<div class="item_rattings text-center">	<!--div with item_ratings -->
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								
							</div>
				  		
				  		
				  </div>

				  <div class="panel-body Item_Panel_Footer">
				  		<button class="add_to_cart text-center">
				  			ADD TO CART
				  		</button>
				  </div>
			</div>
			
			</div>
		</div>





	</div>
	<div class="col-xs-2 fixed_side_left_bar">
		<div class="ads position1">
			<div style="background-color:black;">jhjkjh</div>
			
		</div>
		<div class="ads position2">
			<div style="background-color:black;">jhjkjh</div>
		</div>
		<div class="ads position3">
			<div style="background-color:black;">jhjkjh</div>
			
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
  <!--  <script type="text/javascript" src="js/msg.js"></script>-->
  </body>
</html>