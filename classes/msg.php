<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header("Connection: Keep-alive");
header('X-Accel-Buffering: no');//Nginx: unbuffered responses suitable for Comet and HTTP streaming applications




/*
while(1){
	 echo "this is msgs numbe " . $i . '<br />';
    flush();
    ob_flush();
    sleep(1);
    $i++;
}
*
for ($i=0; $i < 5; $i++) { 
     
    echo "Admin msg n : ".$i;
   flush();
    ob_flush(); 
    sleep(1);
}
*/


function sendMsg($id, $msg) {
  echo "id: $id" . PHP_EOL;
  echo "data: $msg" . PHP_EOL;
  echo PHP_EOL;
  ob_flush();
  flush();
}
$i = 0;
while(true) {
  $serverTime = time();
  $i++;
  sendMsg($i, 'server time: ' . date("h:i:s", time()));
  sleep(1);
}



function get_msg($session_id){
  if(isset($_SESSION["UserID"])){

  }




}



function is_admin(){ //test if UserID  Cookie is for an admin(true) else client(false)


}
?>


