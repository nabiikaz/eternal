<?php

require_once "controller/privileges_controller.php";
require_once "classes/sql.php";
//LoginWithSession("");
AdminPrivilegeCheck();


if(isset($_POST["slide_item_description"]) && isset($_FILES["slide_item_image_file"]) && isset($_POST["slide_item_redirection"]) && isset($_POST["slide_item_id"]) ){
    
    	$img_filename = "img/slide/". md5(mt_rand(0,123456).mt_rand(0,time()).mt_rand(0,123456));
    	$exploded_filename = explode(".",$_FILES["slide_item_image_file"]["name"]);
    		$file_type = $exploded_filename[count($exploded_filename)-1];
    		$img_filename .=".".$file_type;
    	move_uploaded_file($_FILES["slide_item_image_file"]["tmp_name"],$img_filename);
    	
    	
    	$sql = new sql();
        $sql = $sql->connection;
        
        $query = "UPDATE `ads` set `RedirectionLink` = '".$_POST["slide_item_redirection"]."' , `AdsImagePath` = '$img_filename' , `Desc` = '".$_POST["slide_item_description"]."' WHERE `Id` = ".$_POST["slide_item_id"];
        
        if(!$sql->query($query)){
            echo $query;
            exit();
        }
        
        
    	
}

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
      <link href="css/dashboard.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/cart.css" rel="stylesheet">
      <link href="css/item.css" rel="stylesheet">
      <link href="css/filter_bar.css" rel="stylesheet">
      <link href="css/msg.css" rel="stylesheet">
      <link rel="stylesheet" href="css/font-awesome-animation.min.css">
   </head>
   <body >
      <div style="height: 1px;background-color: #f99d32">
         <div style="height: 1px;background-color: #0068b3;width: 33%; float:left"></div>
         <div style="height: 1px;background-color: #65b561;width: 33%;float:right; "></div>
      </div>
      <div class="dashboard_img">
         <div class="col-xs-12 dashboard_nav " >
         <div class="col-xs-8"></div>
        
         <div class="col-xs-4 text-right" style="margin-left: 140px;border: 0px solid red;width: 300px;">
            <div class="dashboard_nav_items " onclick="location.href='index.php?home=welcome'"><div><b>Accueil</b><span class="glyphicon glyphicon-globe"></span></div> </div>
              <div hidden class="dashboard_nav_items" onclick="location.href='settings.php'" > <div><b>Settings</b><span class="glyphicon glyphicon-cog"></span></div></div>
            <div class="dashboard_nav_items " onclick="location.href='authentification.php?action=logout'"> <div><b >Déconnecter</b> <span class="glyphicon glyphicon-log-out"></span></div></div>
         </div>
            
         </div>
         <h1><b>Gestion de magasin</b></h1>
         <h4><b>Dans cette section, vous allez gérer votre magasin</b></h4>
      </div>
      <div class="navigation_bar ">
         <div class="col-xs-3 text-center dashboard_option_active active accounts_manager" onclick="location.href='dashboard.php?dashboard=accounts_manager'">
            <h4><b>Gestionnaire des comptes</b></h4>
         </div>
         <div class="col-xs-3 text-center  stock_manager" onclick="location.href='dashboard.php?dashboard=stock_manager'">
            <h4><b>Gestionnaire de stock</b></h4>
           </div>
           <div class="col-xs-3 text-center msg_box_manager" onclick="location.href='dashboard.php?dashboard=msg_box_manager'">
              <h4><b>Gestionnaire de livraisons</b></h4>
           </div>
         <div class="col-xs-3 text-center ads_statistics_manager" onclick="location.href='dashboard.php?dashboard=ads_statistics_manager'">
            <h4><b>Gestionnaire de publicités</b></h4>
         </div>
      </div>
      <br>   
      <br>   
      <br>  
      <!-- accounts_display is the div that encapsulate all the accounts management   -->
      <div class="accounts_display dashboard_display">
         <div class="right_menu">
            <table class="table table-bordered  " style="/*width: 80%;">
               <thead >
                  <tr >
                     <th class="active"> </th>
                     <th class="active">Nom Du Client</th>
                     <th class="active">Adress</th>
                     <th class="active">Numeros De Telephone</th>
                     <th class="active">Email</th>
                     <th class="active">Status</th>
                     <th class="active">Block</th>
                  </tr>
               </thead>
               <tbody class="accounts_tbody">
                  
               </tbody>
               <div class="footer_tab" style=" ">
                  <div style="float: left;margin-top: 6px; ">
                     <img src="img/arrow.png" style="margin-top: -15px; margin-left: 0px;color: white;  "> 
                     <input type="checkbox" id="checkall" >
                     <span style=""><b>Check All</b></span> 
                     <i style="font-size: 12px;margin-left: 2em; margin-right:  2em;">With Selected </i>
                     <span class="glyphicon glyphicon-ok-circle unblock_btn" style="color: #4CAF50;cursor:pointer;"></span><b class="unblock_btn " style="cursor:pointer;color: #4CAF50;">Unblock</b>
                     <span class="glyphicon glyphicon-ban-circle block_btn" style="margin-left:  2em;color: orange;cursor:pointer;"></span><b class="block_btn " style="cursor:pointer;color: orange;">Block</b>
                     <span class=" glyphicon glyphicon-remove-sign delete_btn" style="cursor:pointer;margin-left:  2em; color: #ff00009e;  "></span><b class="delete_btn  " style="cursor:pointer;color: #ff00009e;">Delete</b>
                     <div style="margin-left:520px;margin-top: -28px;">
                        <div class="input-group">
                           <span class="input-group-btn">
                              <select class="form-control accounts_search_option" id="sel1" style="width:115px;background-color:#4CAF50;color:white;">
                                 <option>All</option>
                                 <option>Username</option>
                                 <option>Address</option>
                                 <option>Phone</option>
                                 <option>Email</option>
                              </select>
                           </span>
                           <input type="text" class="form-control accounts_search" value="" placeholder="Search...."  style="width:300px;">
                        </div>
                        <!-- /input-group -->
                     </div>
                     <!-- /.col-lg-6 -->
                  </div>
                  <div style="float: right; margin-top: -28px;color: red;margin-right: 100px;">
                     <b class="operation_status_msg " ></b>
                  </div>
               </div>
         </div>
         </table>
      </div>
      </div>
      <!--Stock Manager -->
      <div class="stock_display dashboard_display">
         <div class="col-xs-2 left_menu ">
           <span class="glyphicon glyphicon-menu-left show_hide_menu"></span>
            <ul class="list-group men_women_stock" >
               <div class="reference">
                  <li class="list-group-item list-group-item-gender text-center " ><b>MEN</b> </li>
                  </a>
                  <div class="collapse in" id="stock-item-men">
                     <li class="list-group-item stock-item  text-center "><b>Accessories</b> </li>
                     <li class="list-group-item stock-item text-center  "><b>Sunglasses</b> </li>
                     <li class="list-group-item stock-item text-center  "><b>Footware</b> </li>
                     <li class="list-group-item stock-item  text-center "><b>Clothing</b> </li>
                     <li class="list-group-item stock-item text-center  "><b>Watches</b> </li>
                  </div>
               </div>
               <div class="reference">
                  <li class="list-group-item list-group-item-gender text-center " ><b>WOMEN</b> </li>
                  </a>
                  <div class="collapse" id="stock-item-women">
                     <li class="list-group-item stock-item text-center "><b>Accessories</b> </li>
                     <li class="list-group-item stock-item text-center "><b>Footware</b> </li>
                     <li class="list-group-item stock-item text-center "><b>Clothing</b> </li>
                     <li class="list-group-item stock-item text-center "><b>Beauty</b> </li>
                     <li class="list-group-item stock-item text-center "><b>Bags</b> </li>
                  </div>
               </div>

               
            </ul>
         </div>
         <div class="col-xs-8 right_menu" >
            <table class="table table-bordered  " style="/*width: 80%;">
               <thead >
                  <tr >
                  
                     <th class="active" style="width: 200px;">Item Name</th>
                     <th class="active" style="width: 100px;">Unit Price</th>
                     <th class="active" style="width: 100px;">Size </th>
                     <th class="active" style="width: 90px;">Stock Quantity</th>
                     <th class="active" style="width: 110px;">Brand</th>
                     <th class="active" style="width: 80px;">Discount %</th>
                     
                     <th class="active" style="width: 410px;">Item Image</th>
                     
                  </tr>
               </thead>
               <tbody>
                


                 
                      
                     




               </tbody>
            </table>
            <div>
              
            </div>
         </div>
         <div class="col-xs-2"></div>
      </div>
      </div>
      <!--ads & Statistics manager-->
      <div class="ads_statistics_display dashboard_display">
        <h1 class="col-lg-12 text-center text-capitalize">Ajouter des Publicité aux Page :</h1>
       <div class="col-lg-3">
          <div class="panel panel-default  ">
                  <div class="panel-heading text-center text-uppercase" style="font-weight: bold;background-color:#333 ;color :white;">choisissez une page</div>
                  <div class="panel-body" style="padding: 0px;padding-top: 10px; overflow-y: scroll;">
                    <div class="alert alert-success index_page" style="cursor:pointer;" >
                       
                        <span class="text-center" >La page d'accuile :</span>
                      </div>
                      
                      
                       
                      <div class="alert alert-success browse_page " style="cursor:pointer;">
                       
                        <span class="text-center" >La page de Navigation :</span>
                      </div>
                      
                  </div>
                </div>
          
       </div>
       
       
       <div class="col-lg-9">
          
                 
                  
                     <ul class="list-group" > 
                        <li class="list-group-item ads_option index_slide_show" style="height:300px;" >
                          <table class="table table-bordered  " style="/*width: 80%;">
                                 <thead >
                                    <tr >
                                    
                                       <th class="active" style="width: 150px;">Description :</th>
                                       <th class="active" style="width: 100px;">Lien De Redirection :</th>
                                       <th class="active"  style="width: 30px;">Image :</th>
                                       
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                         Get_Ads("index");
                                     
                                     ?>
                                      
                                     
                  
                  
                                   
                                        
                                       
                  
                  
                  
                  
                                 </tbody>
                         </table>
                        </li>
                        
                        
                         <li class="list-group-item ads_option browse_ads" style="height:140px;display:none;">
                          <table class="table table-bordered  " style="/*width: 80%;">
                                 <thead >
                                    <tr >
                                    
                                       <th class="active" style="width: 150px;">Description :</th>
                                       <th class="active" style="width: 100px;">Lien De Redirection :</th>
                                       <th class="active"  style="width: 30px;">Image :</th>
                                       
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                         Get_Ads("browse");
                                     
                                     ?>
                                      
                                     
                  
                  
                                   
                                        
                                       
                  
                  
                  
                  
                                 </tbody>
                         </table>
                        </li>
                        
                        
                       
                     </ul>
                      
                  </div>
                
      </div>
      <!--message box -->
      <div class="message_box_display dashboard_display">
          <div class="col-lg-4">
              <div class="panel panel-default  ">
                  <div class="panel-heading text-center text-uppercase" style="font-weight: bold;background-color:#333 ;color :white;">Deliveries To Be Made</div>
                  <div class="panel-body" style="padding: 0px;padding-top: 10px; overflow-y: scroll;">
                    <ul class="list-group" id="Deliveries_display" >
                   <?php
                     Get_Deliveries();
                   ?>
                    </ul>
                  </div>
                </div>
          </div>

          <div class="col-lg-5">
              <div class="panel panel-default camera ">
                  <div class="panel-heading text-center text-uppercase" style="font-weight: bold;background-color:#333 ;color :white;">Deliveries To Be Made</div>
                
                  <div class="panel-body">
          <video controlss poster="img/.png" id="preview" style="width: 100%;" ></video>
          
                  </div>
                  
                </div>
          </div>

          <div class="col-lg-3">
              <div class="panel panel-default camera_orders ">
                  <div class="panel-heading text-center text-uppercase" style="font-weight: bold;background-color:#333 ;color :white;">commands</div>
                  <div class="panel-body">
                    <div class="col-lg-12">
                    <div  class="start_stop_camera start_camera text-center">Start Camera</div>
                    <div  class="reset text-center" onclick="location.reload(0);">Reset</div>
                    </div>
                    
                    
                    
                         
                  </div>
                </div>
                <div class="confirmation_log col-lg-12">
                    
                        <div class='alert alert-warning'> <span style="font-weight: bold;font-size:11px;" class="logs_">Start The Camera To Download The Delivery PDF oF the Detected Qr Code .</span></div>
                           
                            
                         
                  </div>
          </div>
              
          



       

         <div class="col-lg-3 camera_orders">
           
         </div>

         
      </div>
      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
      <script src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/instascan.min.js"></script>
      
      <script src="js/dashboard.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/cart.js"></script>
      <script type="text/javascript" src="js/update_content.js"></script>

   </body>
</html>


<?php



function Get_Ads($page){
    $sql = new sql();
  $sql = $sql->connection;
  
  $query = "SELECT `Id`,`AdsImagePath`,`RedirectionLink`,`Desc` FROM `ads` WHERE `PageLocation` LIKE '$page'";
  
  $sql = new sql();
$sql = $sql->connection;

  if($result = $sql->query($query)){
    while($row = $result->fetch_assoc()){
   // $sql->real_escape_string($city);
   
     echo '<form  enctype="multipart/form-data" method="POST">
                                   <tr class="slide_item" >
                                   
                                        <input type="text" name="slide_item_id" value="'.$row["Id"].'" hidden />
                                         <input type="text" name="page" value="'.$page.'" hidden />
                                       <th >
                                          <input type="text" class="slide_item_description" name="slide_item_description" value="'.$row["Desc"].'" placeholder="Description de publicité sur le slide show." required/>
                                       </th>
                                     
                                      
                                     
                                       <th >
                                           <input type="text" class="slide_item_redirection" name="slide_item_redirection" value="'.$row["RedirectionLink"].'" placeholder="Description de publicité sur le slide show." required/>
                                       </th>
                                       
                                        <th >
                                          <input name="slide_item_image_file" type="file" style="width:90%;"  required/>
                                          <div class="slide_item_image">
                                              
                                              <img src="'.$row["AdsImagePath"].'" style="width:100%;height:100%;	border-radius:6px;	border-bottom-left-radius: 0px;" ></img>
                                          </div>
                                       </th>
                                       
                                        <th style="width: 80px; border:0px solid black;" class="slide_item_ok_">
                                          <input  type="submit" class="slide_item_ok" style="width:90%;" />
                                       </th>
                                   
                                    </tr>
                                     </form>';
            
    }
    
  }
  
  
}

function Get_Deliveries(){

  $sql = new sql();
  $sql = $sql->connection;
  
  $query = "SELECT * FROM `purchases` ORDER BY `Payment_confirmation` DESC ";

  if($result = $sql->query($query)){
     if($result->num_rows == 0){
        echo '<li class="list-group-item delivery">
    <div class="alert alert-Primary">
     
      <span class="text-center">There Is No Delivery So Far</span>
    </div>
</li>';
return;
     }
    while($row = $result->fetch_assoc()){
      $Delivery = "success";
      $checkbox = "";
      $date = "This Delivery has Been Ordered In < ".$row["Purchase_Date"] ." > \n  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;   And Paid in :  < ".$row["Payment_confirmation_date"] ." >" ;
      if($row["Payment_confirmation"] == 0){
        $Delivery = "danger";
      $checkbox = '<input type="checkbox"  class="check_delivery" disabled>';
      $date = "This Delivery has Been Ordered In : ".$row["Purchase_Date"] ;
      
      }
      
      echo '<li class="list-group-item delivery" id="'. $row["Purchase_QrCode_content"] .'" data-toggle="tooltip" data-placement="right" title="'. $date .'">
            <div class="alert alert-'. $Delivery .'">
              '. $checkbox .'
              <span >This Delivery Hasn t Been Confirmed : </span>
              <a href="templates/download_command_pdf.php?purchase_id='. $row["Id"] .'&download=" download> Download Delivery List </a>
            </div>
        </li>';
    }
  }else{
    echo '<li class="list-group-item delivery">
    <div class="alert alert-Primary">
     
      <span class="text-center">There Is No Delivery So Far</span>
    </div>
</li>';
  }

}





?>