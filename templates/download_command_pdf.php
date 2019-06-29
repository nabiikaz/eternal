<?php



header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename=file.pdf');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
require_once explode("templates",dirname(__FILE__))[0] ."classes/sql.php";
require_once explode("templates",dirname(__FILE__))[0] ."classes/dompdf/autoload.inc.php";
//Qrcod : => ;P
require_once 'vendor/autoload.php';

        use Endroid\QrCode\QrCode;

    
   

/////////////////////////////////////////////////

use Dompdf\Dompdf;


$document = new Dompdf();
/*
$page = file_get_contents("test.html");
$html = $page;
*/

$document->load_html(PrintEveryThing());

$customPaper = array(0,0,1179,2000);
$document->set_paper($customPaper);

//$document->setPaper("A3","landscape");




$document->render();

//$document->stream("Purchase Order" ,array("attachement"=>0));


if(isset($_GET["download"])){
    $document->stream();

}else{

    $output = $document->output();
    file_put_contents("file.pdf", $output);
    readfile("file.pdf");
}



echo PrintEveryThing();
function PrintEveryThing() {
    if(!isset($_GET["purchase_id"]))
        return ;
    $sql = new sql();
    $sql = $sql->connection;
    $purchase_id = $_GET["purchase_id"];
    $query = "SELECT * FROM  `purchases` WHERE `Id` = $purchase_id";

    if($result = $sql->query($query)){
        $row = $result->fetch_assoc();
       if(count($row) !=0   )
        return GetHtml($row);
        else
        header("Location: ../checkout.php?msg=puchase_not_found");
            
          
        
       // var_dump($row);
    }
}


function SaveTmpImg($filename){
    $qrCode = new QrCode();
    $qrCode->setText($filename);
    $qrCode->setSize(200);
    return  $qrCode->getDataUri();
    $imgData = str_replace(' ','+',$qrCode->getDataUri());
$imgData =  substr($imgData,strpos($imgData,",")+1);
$imgData = base64_decode($imgData);
// Path where the image is going to be saved

// Write $imgData into the image file
/*
$file = fopen("tmp/".$filename.".png", 'w');
fwrite($file, $imgData);
fclose($file);*/
}

function GetHtml($row){
    $json_array = json_decode($row["Purchased_Items"],true);
    $userinfo = GetUserInfo($row["authentification_Id"]);
    $username = $userinfo["ClientFullName"];
    $ResidenceCity = $userinfo["ResidenceCity"];
    $Phone = $userinfo["Phone"];
    $purchase_date = $row["Purchase_Date"];

    if($row["Payment_confirmation"] == 1){
        $paid =  '';
    }

    $lines = "";
    $cart_total_price = 0;
    foreach ($json_array as $key => $value) {
        if($value != null){
            $lines .= '
            <tr>
                <th>'. $value["item_name"] .'</th>
                <th>'. $value["item_qte_nosize"] .'</th>
                <th>'. $value["item_qte_xs"] .'</th>
                <th>'. $value["item_qte_s"] .'</th>
                <th>'. $value["item_qte_m"] .'</th>
                <th>'. $value["item_qte_l"] .'</th>
                <th>'. $value["item_qte_xl"] .'</th>
                <th>'. $value["item_qte_xxl"] .'</th>
                <th>'. $value["item_qte_xxxl"] .'</th>
                <th>'. ($value["item_price"]-($value["item_price"]*GetItemDiscount($value["item_id"])/100)) .' DA</th>
                
            
        </tr>';
        $cart_total_price +=($value["item_qte_nosize"] +$value["item_qte_xs"] + $value["item_qte_s"] +$value["item_qte_m"]+$value["item_qte_l"] +$value["item_qte_xl"]+$value["item_qte_xxl"]+$value["item_qte_xxxl"])*($value["item_price"]-($value["item_price"]*GetItemDiscount($value["item_id"])/100));
        
        }
    }

    
    return '<!DOCTYPE html>
    <html lang="en">
    <head>
            <base href="/./" />
        <style>
            h1{
                color:#333;
            }
        th{
            width: 140px;
        }
    
        .head{
            background-color: grey;
            color: white;
            text-align: center;
        }
         tr{
            margin-bottom: 500px;
            
        }
    
        .items{
            margin-top: 250px;
        }
    
        .info {
            margin-left: 50px;
            position: absolute;
            
        }
        
        .qr_code{
            border: 1px solid black;
            height: 200px;
            width: 200px;
            margin-right: 50px; 
        }

        .Title{
            margin-left:-1000px;
           
            
        }
    
        th{
            text-align: center;
            
        }
        #total_price{
            color:red;
        }
        </style>
    
        
    
        
        
       
    </head>
    <body>
    
            <table class="info" style="float: left;">
                
                    <tr  >
                            <th>&nbsp;&nbsp;</th>
                                                  
                    </tr>
    
                    <tr  >
                            <th>&nbsp;&nbsp;</th>
                                                  
                    </tr>
    
                    
                    
                    <tr  >
                            <th>Purchase Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </th>
                            <th>'. $row["Id"] .'</th>                       
                    </tr>

                    <tr  >
                            <th>Nom Et Prenom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </th>
                            <th>'. $username .'</th>                       
                    </tr>
    
                    <tr >
                            <th>Adresse De residence &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </th>
                            <th>'. $ResidenceCity .'</th>                       
                    </tr>
    
                    <tr >
                            <th>Numero De Telephone &nbsp;&nbsp;&nbsp;&nbsp;:  </th>
                            <th>'. $Phone .'</th>                       
                    </tr>
    
                    <tr >
                            <th>CheckOut Demand Date&nbsp;&nbsp;:  </th>
                            <th>'. $purchase_date .'</th>                       
                    </tr>
    
                   
            </table>
    
            <table class="qr_code" style="float: right;">
                    <tr >
                        <th >
                        <img src="'. SaveTmpImg($row["Purchase_QrCode_content"]).'" alt="">
                        
                        </th>

                    </tr>
    
                    
            </table>

            <table class="Title" style="float: right;">
            <tr><th>&nbsp;</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr><th>&nbsp;</th></tr>
                <tr >
                        <th >
                        <h1>Mini-Projet Eternal </h1>
                        
                        </th>

                    </tr>
    
                    
            </table>
    
    
            
                
    
            <table border="0.1" class="items">
                    <tr class="head">
                        <th>Item Name</th>
                        <th>NoSize Qte</th>
                        <th>XS Qte</th>
                        <th>x Qte</th>
                        <th>m Qte</th>
                        <th>l Qte</th>
                        <th>xl Qte</th>
                        <th>xxl Qte</th>
                        <th>xxxl Qte</th>
                        <th>Prix Unitaire</th>
                    </tr>

                    '. $lines .'

                    <tr>
                        <th style="visibility:hidden;"></th>
                        <th style="visibility:hidden;"></th>
                        <th style="visibility:hidden;"></th>
                        <th style="visibility:hidden;"></th>
                        <th style="visibility:hidden;"></th>
                        <th style="visibility:hidden;"></th>
                        <th style="visibility:hidden;"></th>
                        <th style="visibility:hidden;"></th>
                        <th>Prix ToTal :</th>
                        <th id="total_price">'. $cart_total_price .' DA</th>
                    </tr>
                    
                </table>
        
    </body>
    </html>';
}



function GetUserInfo($auth_id){

    $sql = new sql();
    $sql = $sql->connection;

    $query = "SELECT *  FROM `user` WHERE `Authentification_Id` = $auth_id";

    if($result = $sql->query($query)){
        return $result->fetch_assoc();

       // var_dump($row);
    }
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
