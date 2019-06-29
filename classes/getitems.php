<?php

require_once "sql.php";



if(isset($_POST["GetItems"]) && isset($_POST["gender"]) && isset($_POST["item_category"]) ){
	//GetItems($_POST["gender"],$_POST["item_category"]);
}

/*function GetItems($gender,$item_category){
	$sql = new  sql();
	$sql = $sql->connection;

    $query = "SELECT * FROM `item` JOIN `itemcategorybysize` ON `item`.`Id` = `itemcategorybysize`.`item_Id` 
                                        WHERE `Caterogy` LIKE '%$item_category%' AND `Gender` LIKE $gender $search LIMIT $index,$offset ";

}*/





$offset = 12;
$page = 0;

if(isset($_GET["page"])){
  $page = intval($_GET["page"]);
}

$page=($page-1)*$offset+$offset;


if(isset($_GET["filter"])){
    $filter = $_GET["filter"];

}else
    $filter = "";


 //echo $page;
  //  echo $filter ."<br>sss";
  //echo "<pre>";

  
  if(strpos($_SERVER["SCRIPT_NAME"],'browse'))
    GetItems($filter,$page,$offset,'PrintItemsForBrowsing');
  else  if(strpos($_SERVER["SCRIPT_NAME"],'getitems.php'))
    GetItems($filter,0,1000,'PrintItemsForDashboard');



  //echo "</pre>";


function GetItems($category,$index,$offset,$callback){
    $sql = new sql();
    $sql = $sql->connection;
    $gender = "";
    $brand = "";
    if(isset($_GET["gender"])){
      $gender = "AND `Gender` LIKE '". $_GET["gender"] ."'";

  }

  if(isset($_GET["brand"])){
    $brand = "AND `Brand` LIKE '". $_GET["brand"] ."'";

  }

  $sort_query = "";
  if(isset($_GET["sort"])){
    $sort_type = explode("-",$_GET["sort"])[0];
    $sort_sense = explode("-",$_GET["sort"])[1];
    switch ($sort_type) {
      case '_alphab_':
          $sort_query = "ORDER BY `Name` $sort_sense";
        break;

        case '_date_':
          $sort_query = "ORDER BY `AddDate` $sort_sense";
            
        break;

        case '_rating_':
          $sort_query = "ORDER BY `ranking` $sort_sense";
          
        break;

        case '_promotion_':
          $sort_query = "ORDER BY `Promotion_%` $sort_sense";
          
        break;

        case '_price_':
          $sort_query = "ORDER BY `UnitPrice` $sort_sense";
          
        break;
      
      default:
      $sort_query = "";
        break;
    }
  }


    $search = "";

    if(isset($_GET["query"]) && isset($_GET["search_opt"])){
      switch ($_GET["search_opt"]) {
        case 'All':
              $search = "AND `Name` LIKE '%". $_GET["query"] ."%' OR `item`.`Brand` LIKE '%". $_GET["query"] ."%'  ";            
          break;

          case 'Men':
              $search = "AND `item`.`Gender` LIKE '%men%' AND `Name` LIKE '%". $_GET["query"] ."%'";            
              
          break;
             
          case 'Women':
        
              $search = "AND `item`.`Gender` LIKE '%Women%' AND `Name` LIKE '%". $_GET["query"] ."%'";         
          
          break;

          case 'Brand':
              $search = "AND `item`.`Brand` LIKE '%". $_GET["query"] ."%'";            
              
         
          break;

          case 'Category':
              $search = "AND `item`.`Name` LIKE '(%". $_GET["query"] ."%)'";            
              
          break;
        
        default:
            $search = "AND `Name` LIKE '%". $_GET["query"] ."%' OR `item`.`Brand` LIKE '%". $_GET["query"] ."%' ";            
        
        break;
      }
        //$search = "AND `Name` LIKE '%". $_GET["query"] ."%'";

    }
    
    DeleteEmptyItems();
    if($category != ""){
        $category = "`Caterogy` LIKE '$category'";
    }else{
      $category = "1 = 1";
    }

   // echo $search;   
    
    $query = "SELECT * FROM `item` JOIN `itemcategorybysize` ON `item`.`Id` = `itemcategorybysize`.`item_Id` 
                                        WHERE $category $gender $brand $search $sort_query LIMIT $index,$offset ";
                                       
                                       
                                       //echo $query;
    if($result = $sql->query($query)){
       // echo $result->num_rows;
        while($row = $result->fetch_assoc()){
          
           // PrintItems($row);
            $callback($row);
        }
    }
    else
        echo "Error";


    //exit();
    

}


function DeleteEmptyItems() {//this function deletes every item that its Name has been set to empty
    $sql = new sql();
    $sql = $sql->connection;

    $query = "DELETE FROM `item` WHERE `item`.`Name` LIKE '' ;";
    if($sql->query($query)){

    }
}





function PrintItemsForDashboard($item){
 /*  echo "<pre>";
  var_dump($item);
  echo "</pre>";*/
     echo '  <tr class="stock_tbody_item" id="'. $item["Item_Id"] .'">
                          
                         <th >
                       <input type="text" class="stock_tbody_item_name" placeholder="Item Name" value="'. $item["Name"] .'" >                       
                     </th>

                     <th >
                       <input type="text" class="stock_tbody_item_unit_price" placeholder="00.00 DA" value="'. $item["UnitPrice"] .'"> 
                    </th>

                    <th >
                         <select class="stock_tbody_Item_sizes" id="">
                           <option value="NOSIZE">NOSIZE</option>
                           <option value="XS">XS</option>
                           <option value="S">S</option>
                           <option value="M">M</option>
                           <option value="L">L</option>
                             <option value="XL">XL</option>
                             <option value="XXL">XXL</option>
                             <option value="XXXL">XXXL</option>
                          

                         </select>
                       </th>
                     <th >
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_NOSIZE" value="'. $item["Qte_NOSIZE"] .'"> 
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_XS" value="'. $item["Qte_xs"] .'"> 
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_S" value="'. $item["Qte_s"] .'"> 
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_M" value="'. $item["Qte_m"] .'"> 
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_L" value="'. $item["Qte_l"] .'"> 
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_XL" value="'. $item["Qte_xl"] .'"> 
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_XXL" value="'. $item["Qte_xxl"] .'"> 
                       <input type="number" class="stock_tbody_stock_qte" placeholder="0" id="stock_tbody_XXXL" value="'. $item["Qte_xxxl"] .'"> 
                      
                     </th>
                     <th>
                       <input type="text" class="stock_tbody_item_brand" placeholder="Brand Name" value="'.$item["Brand"].'"  >                       					
				             </th>

                     <th>
                       <input type="text" class="stock_tbody_item_discount" placeholder="..%" value="'.$item["Promotion_%"].'"  >                       					 
					           </th>

                     <th>
                       <form class="stock_tbody_item_image_update_uploader" enctype="multipart/form-data">
                        <input name="file" type="file" style=""/>
                        </form>
                        <div class="item_image_box">
                        <img class="item_image_" src="img/items/'. $item["ImageFileName"] .'" >
                          
                        </div>
                     </th>
                    

                     <th style="position: absolute;border:0px;">
                       <input type="submit" class="update_item" value="Update Item">
                       
                     </th>

                       </tr>
';
}




function PrintItemsForBrowsing($item){
   // var_dump($item);
   $discount = "";
   if($item["Promotion_%"] > 0 && $item["Promotion_%"] < 50)
            $discount = '<div class="discount"> 
                      <span >Promotion : -&nbsp;'. $item["Promotion_%"] .'&nbsp;%</span>
                    
                      <img class="discount" src="img/discounts1.png" alt="">
                    </div>';
    else if($item["Promotion_%"] > 49 && $item["Promotion_%"] < 100)
            $discount = '<div class="discount"> 
                      <span >Promotion : -&nbsp;'. $item["Promotion_%"] .'&nbsp;%</span>
                    
                      <img class="discount" src="img/discounts.png" alt="">
                    </div>';
        
    echo '	<div class="col-xs-4">
			<div class="panel  Item" id="'. $item["Item_Id"] .'" >
            '.$discount.'
				  <div class="panel-body Item_Panel_Picture text-center">
				  	<img src="img/items/'. $item["ImageFileName"] .'" >
				  </div>

				  <div class="panel-body Item_Panel_Body ">
				  		<h4 class="text-center " style="margin-bottom: 10px;">
				  			<span class="ellipis Item_Panel_Name"  style=" ">'. $item["Name"] .'</span> 
				  		</h4>
				  		<div class="text-center" style="border:0px solid grey;margin-bottom: 5px;">
					  		<span class="text-center Item_Panel_Price" >

					  		<strong>Price</strong> 
					  		<span style="font-size: 15px;color: #29cf42;">'. $item["UnitPrice"] .' DA</span>
					  		</span>
					  			
					  	</div>
				  			<div class="item_rattings text-center">	<!--div with item_ratings -->
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star checked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star unchecked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star unchecked" style="font-size: 20px;"></span>
								<span class="glyphicon glyphicon-star unchecked" style="font-size: 20px;"></span>
								
							</div>
				  		
				  		
				  </div>

				  <div class="panel-body Item_Panel_Footer">
				  		<button class="add_to_cart text-center">
				  			ADD TO CART
				  		</button>
				  </div>
			</div>

			</div>';
}


?>