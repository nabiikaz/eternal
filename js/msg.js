

$( document ).ready(function(){
	/*$.post("classes/msg.php","getnewmsg=1",function(data){
	*/

	Recieve_msg();

})


var source = new EventSource("classes/msg.php");
source.addEventListener("message", function(message) {
//    console.log(message.data)

	AppendMsg(message.data,"admin_msg");

})

function Recieve_msg() 
{
	
}


			Open_Conversation_Box();

			

var msg_box = 1; //0 means hidden 1 => shown
$(".conversation_box_head").click(function(){
	if(!msg_box){
			Open_Conversation_Box();


	}else{
		Close_Conversation_Box();


	}
	
//$(".collapse").collapse("hide");	


})
function Open_Conversation_Box()
{
	$(".conversation_box").animate(
			{top:"52%"}	,
			{ duration: 300,  queue: false} );
  			
  			$(".conversation_box_body").animate(
  				{height:"230px"}	,
			{ duration: 300,  queue: false} )
			
			$(".conversation_box_footer").animate(
  				{height:"40px"}	,
			{ duration: 300,  queue: false} )

			$(".collapsee").animate(
  				{height:"100%"}	,
			{ duration: 300,  queue: false} )

			$(".collapsee").css("visibility","visible");


			$(".conversation_box_head").children(".glyphicon").removeClass("glyphicon-chevron-up");
			$(".conversation_box_head").children(".glyphicon").addClass("glyphicon-chevron-down");

			
			textarea_focus();

			msg_box = 1;
}

function Close_Conversation_Box()
{
	$(".conversation_box").animate(
			{top:"94.5%"}	,
			{ duration: 200,  queue: false} );
  			
  			$(".conversation_box_body").animate(
  				{height:"0px"}	,
			{ duration: 200,  queue: false} )
			
			$(".conversation_box_footer").animate(
  				{height:"0px"}	,
			{ duration: 200,  queue: false} )

			$(".collapsee").animate(
  				{height:"0px"}	,
			{ duration: 200,  queue: false} )

			$(".collapsee").css("visibility","hidden");

			$(".conversation_box_head").children(".glyphicon").removeClass("glyphicon-chevron-down");
			$(".conversation_box_head").children(".glyphicon").addClass("glyphicon-chevron-up");

			


			
			msg_box = 0;
}



$(".conversation_box_footer").click(function(){
	$(".conversation_box_footer").children("span").css("display","none");
	$(".conversation_box_footer").children("textarea").focus();

})


$(".conversation_box_footer").children("textarea").focusout(function(){
	if($(this).val() == "")
	  $(".conversation_box_footer").children("span").css("display","block");

	//close the conversation box if it is not focused after 5 seconds 
	setTimeout(function(){
		if(!$(".conversation_box_footer").children("textarea").is(":focus")){
			Close_Conversation_Box();
		}
	},5000);

})

function textarea_focus(){
	$(".conversation_box_head").css("background-color","#4080ff");
	$(".conversation_box_head").css("color","white");
	$(".conversation_box_head").children(".glyphicon").css("color","white");


	$(".conversation_box_footer").children("span").css("display","none");
	$(".conversation_box_footer").children("textarea").focus();

}


$(".collapsee").click(function(){
	textarea_focus();
})


function textarea_focusout(){
	$(".conversation_box_head").css("background-color","#f6f7f9");
		$(".conversation_box_head").children(".glyphicon").css("color","#191919");
		$(".conversation_box_head").css("color","#191919");

}
$(".conversation_box_footer").children("textarea").focusout(function(){
	
		textarea_focusout();

		$(this).css("overflow-y","hidden");

})



$(".conversation_box_footer").children("textarea").keypress(function(e){
	 if( e.which === 13 && e.shiftKey ) {
	 	e.preventDefault();
		$(this).val($(this).val() + "\n");
	}
	else if(e.which == 13 ){
		e.preventDefault();
		AppendMsg($(this).val().replace("\n", "<br>"));
			$(this).val(``);
		}
})



$(".conversation_box_footer").children("textarea").focus(function(){
	$(this).css("overflow-y","scroll");
})


function AppendMsg(Msg,whos="your_msg") // append the message Msg : String to the conversation_box_body ,,, whos : admin_msg or your_msg
{
	var Msg_div = `<div class="col-xs-12">
        <div class="`+whos+` "> <span >` +Msg+`</span></div> 
     </div>`;
		$(".conversation_box_body").html($(".conversation_box_body").html() + Msg_div);
	

		$(".conversation_box_body").scrollTop($(".conversation_box_body")[0].scrollHeight);
	

}

















