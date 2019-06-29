<?php

if(!isset($_COOKIE["LoginSession"]))
    header("Location: authentification.php?action=login&return_url=checkout.php");
require_once explode("controller",dirname(__FILE__))[0] ."classes/sql.php";



function GetTmpCart(){
    if(!isset($_COOKIE["UserID"]))
        return;
    $sql = new SQL();
    $sql = $sql->connection;
    $UserId = $_COOKIE["UserID"];


    $query = "SELECT `JsonContent` FROM `tmpcart` WHERE `UserId` = $UserId";

    if($result = $sql->query($query)){
        $row = $result->fetch_assoc();
        PrintCartItems($row["JsonContent"]);
        
    }
    
}




function PrintCartItems($items){
   // echo "<pre>";
    //var_dump();
    $json_array = json_decode($items,true);
    if(count($json_array) == 0 || $items == '{"0":{}}')
        return ;
    
    echo '<ul class="list-group purchase_order purchase_order_id" id="">
    <li class="list-group-item checkout_date payment_not_received">
      <span class="col-lg-6">CheckOut in : ( Has not been checkout yet )</span>
     
      
    
    </li>
    <ul class="list-group purchase_order ">';
    $cart_total_price = 0;
    foreach ($json_array as $key => $value) {
        if($value != null){
            /*'. $value["item_name"] .'*/
            echo '
                <li class="list-group-item purchase_order_item" title="Quantité Disponible Dans Le stock : " id="'. $value["item_ref"] .'" data-html="true" data-trigger="hover" data-toggle="popover" data-content="'.GetAvailable_Qte($value["item_ref"]).'">
                  <span class="col-lg-3 purchase_order_item_name ellipis ">'. $value["item_name"] .'</span>
                  <div class="col-lg-6 qte_col" data-toggle="tooltip"  data-placement="top" data-trigger="hover" title="veuillez choisir les quantités en fonction des quantités disponibles dans le stock" >
                    <select class="col-lg-3 purchase_order_item_size">
                        <option value="NOSIZE">NOSIZE</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                          <option value="XXXL">XXXL</option>
                    </select>


                    
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="NOSIZE" value="'. $value["item_quantity"] .'"> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XS" value="0"> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="S" value="0"> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="M" value="0"> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="L" value="0"> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XL" value="0"> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XXL" value="0"> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XXXL" value="0"> 
                       
                    
                  </div>
                 
                  <span class="col-lg-3 purchase_order_item_price"><i><b>'.round(($value["item_price_unit"]-($value["item_price_unit"]*GetItemDiscount($value["item_ref"])/100)),2) .'</b> DA </i>  </span>
                  
                </li>
                
               ';
               $cart_total_price +=($value["item_quantity"] )*($value["item_price_unit"]-($value["item_price_unit"]*GetItemDiscount($value["item_ref"])/100));
               
        }

            
    }

    $cart_total_price = round($cart_total_price,2);
    echo ' <li class="list-group-item Confirm_checkout">
    <div class="col-lg-6">
        <div class=" Confirm_checkout_pdf text-center">Confirm CheckOut.</div>
      </div>
      <div class="col-lg-3">
      
      </div>

      <div class="col-lg-3">
      <div class=" text-left">Total Price : '. $cart_total_price .' DA</div>
    </div>
</li>

</ul>
</ul>';

}


function GetAvailable_Qte($item_id){
    $sql = new SQL();
    $sql = $sql->connection;
    
    
    $query = "SELECT Qte_NOSIZE,Qte_xs,Qte_s,Qte_m,Qte_l,Qte_xl,Qte_xxl,Qte_xxxl FROM `itemcategorybysize` WHERE `Item_Id` = $item_id ;";
    if($result = $sql->query($query)){
        $row = $result->fetch_assoc();
        
        $return_val = "";
        if(!empty($row))
        foreach ($row as $key => $value) {
            $return_val .= "<span class='col-lg-5 text-right'>".explode("_",$key)[1]."</span><span class='col-lg-1'>:</span><span class='col-lg-5'>$value</span>";
            
        }
        return  $return_val;


    }
}

function GetPendingAndPayedCarts(){
    $sql = new SQL();
    $sql = $sql->connection;
    $auth_Id = GetAuthentificationId($sql);
    $query = "SELECT * FROM  `purchases` WHERE `authentification_Id` = $auth_Id  ";
    //echo "<pre>";
    if($result = $sql->query($query)){
        while($row = $result->fetch_assoc()){
         

            PrintPendingAndPayedCarts($row);
        }
       // var_dump($row);
    }
    
    

}


function PrintPendingAndPayedCarts($row){
    $json_array = json_decode($row["Purchased_Items"],true);
   // var_dump($json_array);
    if(count($json_array) == 0)
        return ;
    
    echo '<ul class="list-group purchase_order purchase_order_id " id="'. $row["Id"] .'">';
    $payment_status = "payment_not_received";
    $checkout_status = $row["Purchase_Date"];
    //$payment_date    = '<span class="col-lg-6">Payment : Pending</span>';
    $payment_date    = '<span class="col-lg-6">Waiting For Delivery</span>';
    $remove_purchase = '';
    if($row["Payment_confirmation"] == 1){
        $payment_status = "payment_confirmed";
    $remove_purchase = '<div class="col-lg-2 remove_purchase  text-center" >REMOVE</div>';
      
        
    $payment_date    = '<span class="col-lg-6">Delivery Confirmed In : '. $row["Payment_confirmation_date"] .'</span>';
        
        

    }
   echo ' <li class="list-group-item checkout_date  '.$payment_status.'">
      <span class="col-lg-4">CheckOut in : '.$checkout_status.'</span>
      '. $payment_date .$remove_purchase.'
      

      
    </li>
    <ul class="list-group purchase_order collapse">';

    $cart_total_price = 0;
    foreach ($json_array as $key => $value) {
        if($value != null){
            
            echo '
                <li class="list-group-item purchase_order_item" title="'. $value["item_name"] .'" id="">
                  <span class="col-lg-3 purchase_order_item_name ellipis ">'. $value["item_name"] .'</span>
                  <div class="col-lg-6 ">
                    <select class="col-lg-3 purchase_order_item_size">
                        <option value="NOSIZE">NOSIZE</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                          <option value="XXXL">XXXL</option>
                    </select>


                    
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="NOSIZE" value="'. $value["item_qte_nosize"] .'" disabled> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XS" value="'. $value["item_qte_xs"] .'" disabled> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="S" value="'. $value["item_qte_s"] .'" disabled> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="M" value="'. $value["item_qte_m"] .'" disabled> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="L" value="'. $value["item_qte_l"] .'" disabled> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XL" value="'. $value["item_qte_xl"] .'" disabled> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XXL" value="'. $value["item_qte_xxl"] .'" disabled> 
                        <input type="number" class="col-lg-3 purchase_order_item_quantity" placeholder="0" id="XXXL" value="'. $value["item_qte_xxxl"] .'" disabled> 
                       
                    
                  </div>
                 
                  <span class="col-lg-3 purchase_order_item_price"><i><b>'.round(($value["item_price"]-($value["item_price"]*GetItemDiscount($value["item_id"])/100)),2) .'</b> DA </i>  </span>
                  
                </li>
                
               ';
               $cart_total_price +=($value["item_qte_nosize"] +$value["item_qte_xs"] + $value["item_qte_s"] +$value["item_qte_m"]+$value["item_qte_l"] +$value["item_qte_xl"]+$value["item_qte_xxl"]+$value["item_qte_xxxl"])*($value["item_price"]-($value["item_price"]*GetItemDiscount($value["item_id"])/100));
        }
    }

    $cart_total_price = round($cart_total_price,2);

    echo ' <li class="list-group-item Confirm_checkout">
    
    <div class="col-lg-6">
      <div class=" download_pdf text-center">Download Pdf Version Of this purchase order</div>
    </div>

    <div class="col-lg-3">
    </div>

    <div class="col-lg-3">
      <div class=" text-left">Total Price : '. $cart_total_price .' DA</div>
    </div>
</li>

</ul>
</ul>';

}


function GetAuthentificationId($sql){
    
    $query = "SELECT `Authentification_Id` FROM  `session` WHERE `Content` LIKE  '".$_COOKIE["LoginSession"]."';";
    if($result = $sql->query($query)){
        $row = $result->fetch_assoc()['Authentification_Id'];
        return $row;
        
    }else
        echo "checkout_confirmation_error";
}


function GetItemDiscount($item_id){
    $sql = new sql();
    $sql = $sql->connection;

    $query = "SELECT `Promotion_%` FROM `item` WHERE `Id` = $item_id";

    if($result = $sql->query($query)){
        $row = $result->fetch_assoc();
        return $row["Promotion_%"];
    }
}

?>