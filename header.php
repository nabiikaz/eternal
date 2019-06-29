<?php
require_once explode("templates",dirname(__FILE__))[0] ."/controller/privileges_controller.php";
$LoginWithSession_output = LoginWithSession_();

?>
<nav class="navbar navbar-default  navbar-fixed-top" >
    <div style="height: 1px;background-color: #f99d32 ">
      <div style="height: 1px;background-color: #0068b3;width: 33%; float:left "></div>
      <div style="height: 1px;background-color: #65b561;width: 33%;float:right; "></div>
    </div>
      
      <div ></div>
   
    <div class="container-fluid Top_Nav "  style="background-color: white; display: none; "><!--fadeInRight animated-->
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header ">

        <button type="button " class="navbar-toggle collapsed " data-toggle="collapse " data-target="#bs-example-navbar-collapse-1 " aria-expanded="false ">

          <span class="sr-only ">Toggle navigation</span>
          <span class="icon-bar "></span>
          <span class="icon-bar "></span>
          <span class="icon-bar "></span>
     
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1 ">
        
        
       <ul class="nav navbar-nav navbar-left ">
          <li id="contact_us "><a href=" ">Contact Us <span class="glyphicon glyphicon-earphone " style="margin-top:-3px;margin-right: 2px;font-size: 10px; "></span></a></li>
       </ul>
        <ul class="nav navbar-nav navbar-right ">
            <li class="dropdown ">
              <a href="# " class="dropdown-toggle " data-toggle="dropdown " role="button " aria-haspopup="true " aria-expanded="false ">My Account <span class="caret "></span></a>
              <ul class="dropdown-menu ">
                <li><a href=" ">Login</a></li>
                
                <!--<li role="separator " class="divider "></li>-->
                
              </ul>
            </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->










    <div class="container-fluid Middle_Nav ">
    <!--<img src="img/eternal_clothing_writing.png " width="100 ">-->

        <div class="col-xs-1 logo " >
          <img src="img/logo.png " width="130 " onclick="location.href='index.php?home='">
        </div>
    
        <ul class="nav navbar-nav Main_Menu col-xs-4 ">
          <li class="Main_Menu_Tab " id="women_menu_title">WOMEN </li>
          <li class="Main_Menu_Tab "  id="men_menu_title">MEN </li>
        <?php 
        if(AdminPrivilegeCheck(true)){ //check if the user has an admin privilegs if true then give him the privileg to go see the dashboard menu :
            echo '<li onclick="location.href=\'dashboard.php\' " class="Main_Menu_Tab " style="margin-left: 10px; "  id="men_menu_title "> <img src="img/dashboard_icon.png " style="margin-top:-5px; " width="20 "> DASHBOARD </li>';
        }
        
        
        ?> 
        
        </ul>  


        <div class="col-xs-3 right_block_main_menu navbar-nav navbar-right " >

            
              <div class="col-xs-1 authentification_block " style="width: 180px; " data-toggle="modal " data-target="##login_register_modal " >
                  <span style="margin-right: -5px;font-size: 18px;margin-top: 1px;position: absolute; " class="glyphicon glyphicon-user "></span>
                 

                  <b  style="margin-left: 25px; " class="account_status " >
                  <?php
                   echo $LoginWithSession_output;
                       
                        
                   ?>
                       
                    </b>

              </div>
              
                  
              



          <div class="col-xs-1 " data-toggle="modal" data-target="#cart_modal" id="cart_counter"> 

           <div class="cart_counter faa-shake text-center " >
            <b >0</b>
          </div>
          <span class="glyphicon glyphicon-shopping-cart " style="margin-left:-15px;font-size: 28px;margin-top: -5px;position: absolute; "></span>

         
          


          </div>
          
          
        </div>



    </div>












    <div class="container-fluid End_Nav ">
          <div class="input-group col-xs-6 Middle_Nav_Menu navbar-nav navbar-left ">
                  <ul class="nav navbar-nav women_menu Menu fadeInRight animated " id="women" style="display: block; ">
                          <li class="Main_Sub_Menu_Tab"  id="beauty" ><b>BEAUTE</b> </li>
                          <li  class="Main_Sub_Menu_Tab"  id="clothing"><b>CLOTHING</b>  </li>
                          <li  class="Main_Sub_Menu_Tab"  id="accessories"><b>ACCESSORIES</b> </li>
                          <li  class="Main_Sub_Menu_Tab"  id="footware"><b>FOOTWARE</b> </li>	
                          <li class="Main_Sub_Menu_Tab"  id="bags "><b>BAGS</b> </li>
                          
                  </ul>
                   <ul class="nav navbar-nav men_menu Menu fadeInRight animated " id="men" >
                          <li class="Main_Sub_Menu_Tab"  id="clothing" id=" "><b>CLOTHING</b> </li>
                          <li  class="Main_Sub_Menu_Tab"  id="accessories"><b>ACCESSORIES</b> </li>
                          <li class="Main_Sub_Menu_Tab"  id="watches"><b>WATCHES</b> </li>
                          <li  class="Main_Sub_Menu_Tab"  id="sunglasses"><b>SUNGLASSES</b> </li>
                          <li  class="Main_Sub_Menu_Tab "  id="footware"><b>FOOTWARE</b> </li>
                          
                  </ul>
                
          </div>
          <div class="col-xs-2 text-center">
            <select class="search_opt "  >
              <option  disabled>sélectionnez l'option de la recherche</option>
              <option value="All" selected>All</option>
              <option value="Men">Homme</option>
              <option value="Women">Femme</option>
              <option value="Brand">Marque</option>
              <option value="Category" >Catégorie</option>
            </select>
          </div>
          
    <div class="input-group col-xs-4 Middle_Nav_Search navbar-nav navbar-right ">
      
            <input type="text " class="form-control search_items" placeholder="Search " aria-describedby="basic-addon1 " style="border: 0px solid red; ">
            <span class="input-group-addon " id="basic-addon2 " style="border: 0px solid red; background-color: #00b34b; "><img class="search_icon " src="search.png " width="20 " style=" margin:auto; "> </span>

    </div>
    
    </div>



  <!--  <div class="container-fluid Footer_Nav ">
     <div id="men_menu_section "> ljlkjlk
    </div> -->

   



    </div>
  </nav>';
