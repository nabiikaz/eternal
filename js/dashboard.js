
var selected_manager;
function GetAccounts(option,manager){
	$.post("classes/dashboard.php","search_query=&option="+option+"&manager="+manager,function(data){
				$(".accounts_tbody").html(data);//override the tbody with the result of the search
			
			})
}

$( document ).ready(function(){
	//alert(getParameterByName("dashboard"));
	$('[data-toggle="tooltip"]').tooltip({
		container: 'body'
	  });
	   
	switch(getParameterByName("dashboard")){
		case "accounts_manager":// alert("accounts");
		selected_manager = "accounts_manager";
			$(".accounts_display").show();
			//display all users when the page loads for the first time :
			GetAccounts("All","accounts_manager");


		break;

		case "stock_manager":// alert("accounts");
		selected_manager = "stock_manager";
			$(".stock_display").show();
			//display all users when the page loads for the first time :
			/*$.post("classes/dashboard.php","search_query=&option=All&manager=stock_manager",function(data){
				$(".accounts_tbody").html(data);//override the tbody with the result of the search
				
			})*/





		break;

		case "ads_statistics_manager":// alert("accounts");
		selected_manager = "ads_statistics_manager";
			$(".ads_statistics_display").show();
			//display all users when the page loads for the first time :
			/*$.post("classes/dashboard.php","search_query=&option=All&manager=stock_manager",function(data){
				$(".accounts_tbody").html(data);//override the tbody with the result of the search
				
			})*/





		break;


		case "msg_box_manager":// alert("accounts");
		selected_manager = "msg_box_manager";
			$(".message_box_display").show();
			//display all users when the page loads for the first time :
			/*$.post("classes/dashboard.php","search_query=&option=All&manager=stock_manager",function(data){
				$(".accounts_tbody").html(data);//override the tbody with the result of the search
				
			})*/





		break;


		default: 

		break;
	}



	$(".navigation_bar").children(".col-xs-3").removeClass("dashboard_option_active");
	$("."+selected_manager).addClass("dashboard_option_active");

	$(".navigation_bar").children(".col-xs-3").removeClass("active");
	$("."+selected_manager).addClass("active");



})




//this function returns the value of the parameter name of some url or the page's url:
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



$(".navigation_bar").children(".col-xs-3").click(function(){
	$(".navigation_bar").children(".col-xs-3").removeClass("dashboard_option_active");
	$(this).addClass("dashboard_option_active");

	$(".navigation_bar").children(".col-xs-3").removeClass("active");
	$(this).addClass("active");


})


$(".navigation_bar").children(".col-xs-3").mouseenter(function(){
	if(!$(this).hasClass("active"))
		$(this).addClass("dashboard_option_active");
	
})


$(".navigation_bar").children(".col-xs-3").mouseleave(function(){
	if(!$(this).hasClass("active"))
	$(this).removeClass("dashboard_option_active");


	
})


//alert($(".accounts_tbody").children("tr").children("th").children("input:checked").length);


$(".block_btn").click(function(){
	var deleted_number = 0;
	var checked_accounts = $(".accounts_tbody").children("tr").children("th").children("input:checked");
	if(checked_accounts.length == 0){
		alert("Please Select an account to block")
	}
	
	checked_accounts.each(function(){
		var user = $(this).parents(".user_row");
		
		$.post("classes/dashboard.php","blockuser="+user.attr("id"),function(data){
			if(data == "Done"){
				deleted_number++;
				user.children(".block_th").html("Yes");
			}
			$(".accounts_search_option").trigger("change");

	//	$(".operation_status_msg").html(deleted_number+" Account Has Been Blocked.");
			

		
		})
	})




})


$(".unblock_btn").click(function(){
	var tmp_counter = 0; // number of affected users with the block;
	var checked_accounts = $(".accounts_tbody").children("tr").children("th").children("input:checked");
	if(checked_accounts.length == 0){
		alert("Please Select an account to Unblock")
	}
	
	checked_accounts.each(function(){
		var user = $(this).parents(".user_row");
		
		$.post("classes/dashboard.php","unblockuser="+user.attr("id"),function(data){
			if(data == "Done"){
				tmp_counter++;
				user.children(".block_th").html("No");
				user.children(".block_th").removeClass("danger");
				user.children(".block_th").addClass("primary");

			}
			$(".accounts_search_option").trigger("change");
			
		//$(".operation_status_msg").html(tmp_counter+" Account Has Been Unblocked.");
			
		
		})
	})




})



$(".delete_btn").click(function(){
	var tmp_counter = 0; //the number of users affected  with the deletion;
	var checked_accounts = $(".accounts_tbody").children("tr").children("th").children("input:checked");
	if(checked_accounts.length == 0){
		alert("Please Select an account to Delete")
	}
	
	checked_accounts.each(function(){
		var user = $(this).parents(".user_row");
		
		$.post("classes/dashboard.php","deleteuser="+user.attr("id"),function(data){
			if(data == "Done"){
				tmp_counter++;
			user.remove();

			}
			$(".accounts_search_option").trigger("change");
			
		//$(".operation_status_msg").html(tmp_counter+" Account Has Been Deleted.");
		
		})
	})
})

$("#checkall").click(function(){ //when this check box is clicked  all accounts rows will be selected ;
	if($(this).is(":checked")){
		$(".checkbox_select").prop("checked",true);
	}
	else{
		$(".checkbox_select").prop("checked",false);
	}


})

//accounts_search_option

/*$(".accounts_search").keypress(function(e){
	if(e.which == 13){
		var search_option = $(".accounts_search_option option:selected").html(); //get the selected option 
		if(search_option == "Search For: "){
			alert("Please Select An Option");
		}else{
			alert("option :"+ search_option +" \n search query : "+$(this).val());	

		}
	}
})*/




$(".accounts_search").keyup(function(){
		var search_option = $(".accounts_search_option option:selected").html(); //get the selected option 

	//$(".operation_status_msg").html($(this).val());	
	$.post("classes/dashboard.php","search_query="+$(this).val()+"&option="+search_option+"&manager=accounts_manager",function(data){
		$(".accounts_tbody").html(data);//override the tbody with the result of the search
	})


	
})



$(".accounts_search_option").bind("change",function(){
	var search_option = $(".accounts_search_option option:selected").html(); //get the selected option 

	//$(".operation_status_msg").html($(".accounts_search").val());	
	$.post("classes/dashboard.php","search_query="+$(".accounts_search").val()+"&option="+search_option+"&manager=accounts_manager",function(data){
		$(".accounts_tbody").html(data);//override the tbody with the result of the search
		//alert(data);
	//$(".accounts_tbody").css("color","red");
		
	})

	
	
})



	/*$(document).on("mouseenter",".user_row",function(){
		
			

			$(this).css("background-color","#ff1700b3");
			$(this).css("color","white");
	})

	$(document).on("mouseleave",".user_row",function(){
		if($(this).children(".block_th").html() == "Yes"){
			
			$(this).children(".block_th").removeClass("btn-primary");
			$(this).children(".block_th").addClass("danger");
		}else{
			$(this).children(".block_th").removeClass("danger");
			$(this).children(".block_th").addClass("btn-primary");
		}
			

	})*/









//stock manager collapse menue between men and women menus ;
$(".list-group-item-gender").click(function(){
	//alert($(this).parents(".list-group").children(".reference").children(".collapse").size());

	$(this).parents(".list-group").children(".reference").children(".collapse").each(function(){
		$(this).collapse("hide");
	})
	$(this).parents(".reference").children(".collapse").collapse("toggle");	

})


//$selected_stock_item = "";
$(".stock-item").click(function(){
	$(".stock-item").removeClass("stock-item-selected");
	$(this).addClass("stock-item-selected");
	//alert($(this).parents("div").attr("id") + "\n" +$(this).children("b").html());

	var gender = $(".stock-item-selected").parents("div").attr("id");
	var item_category = $(".stock-item-selected").children("b").html()
	if(gender != undefined && item_category != undefined ){
		GetItemsFromDB(gender,item_category);	
	}
})

$( document ).on("change",".Item_sizes",function(){
	$(".stock_qte").css("display","none");
	$("#"+$(this).children("select :selected").val()).css("display","block");
})

$( document ).on("change",".stock_tbody_Item_sizes",function(){

	$(this).parents(".stock_tbody_item").children("th").children(".stock_tbody_stock_qte").css("display","none");
	$(this).parents(".stock_tbody_item").children("th").children("#stock_tbody_"+$(this).children("select :selected").val()).css("display","block");
})


$( document ).on("click","#add_item_to_db",function(){

	
	var gender = $(".stock-item-selected").parents("div").attr("id");
	var item_category = $(".stock-item-selected").children("b").html()
	if(gender != undefined && item_category != undefined ){
		SubmitNewItemInfo(gender,item_category,$(this));	
	}else{
		alert("Please Select A category To Add this new Item");
	}
	
})

$( document ).on("click",".update_item",function(){
	

	var gender = $(".stock-item-selected").parents("div").attr("id");
	var item_category = $(".stock-item-selected").children("b").html()
	if(gender != undefined && item_category != undefined ){
		//SubmitNewItemInfo(gender,item_category);
		UpdateItemInfo($(this),gender,item_category);
		
	}else{
		alert("Please Select A category To Update this  Item");
	}

	
})


function SubmitNewItemInfo(gender,item_category,context){
	var item_name = $(".item_name").val(),  item_unit_price= $(".item_unit_price").val();
	var item_brand = $(".item_brand").val(),item_discount = $(".item_discount").val();
	var item_qte_by_size = "";
	$.each($(".stock_qte"),function(index,val){
		if(index != $(".stock_qte").size()-1)
			item_qte_by_size += $(this).val()+",";
		else
			item_qte_by_size += $(this).val();
		
		//alert($(this).attr("id")+ "\n val = "+$(this).val());
	})
	
/*	alert(item_qte_by_size);

	alert(item_unit_price);

	alert(item_name);*/
	//alert(gender + "\n" +item_category);

	if(Item_Image != undefined)	{
		var formData = new FormData();
		formData.append('file', Item_Image);
		formData.append('item_qte_by_size', item_qte_by_size);
		formData.append('item_unit_price', item_unit_price);
		formData.append('item_name', item_name);
		formData.append('gender', gender);
		formData.append('item_category', item_category);
		formData.append('item_brand', item_brand);
		formData.append('item_discount', item_discount);
		$.ajax({
		url: "classes/dashboard.php",
		type: 'POST',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		error: function(xhr, textStatus, errorThrown){
       alert('request failed');
    },
		success: function(){
			$(".stock-item-selected").trigger("click");
		}
			});
	}else{
			alert("please select a picture for this new item ....");
			context.parents("tr").children("th").children("form").children(":file").focus();
			context.parents("tr").children("th").children("form").children(":file").click();


		}
	
	
}

function UpdateItemInfo(context,gender,item_category){
	var stock_tbody_item = context.parents(".stock_tbody_item");
	var item_id = stock_tbody_item.attr("id");
	var item_name = stock_tbody_item.children("th").children(".stock_tbody_item_name").val();
	var item_unit_price = stock_tbody_item.children("th").children(".stock_tbody_item_unit_price").val();

	var item_brand = stock_tbody_item.children("th").children(".stock_tbody_item_brand").val();
	var item_discount = stock_tbody_item.children("th").children(".stock_tbody_item_discount").val();
	

//	var item_name = $(".item_name").val(),  item_unit_price= $(".item_unit_price").val();
	var item_qte_by_size = "";
	$.each(stock_tbody_item.children("th").children(".stock_tbody_stock_qte"),function(index,val){
		if(index != context.children("th").children(".stock_tbody_stock_qte").size()-1)
			item_qte_by_size += $(this).val()+",";
		else
			item_qte_by_size += $(this).val();
		
		//alert($(this).attr("id")+ "\n val = "+$(this).val());
	})
	//alert(item_id);
	/*alert(item_qte_by_size);

	alert(item_unit_price);

	alert(item_name);*/

	
	 stock_tbody_item.children("th").children("form").children(":file").trigger("change");

	if(Item_Image != undefined)	{
		var formData = new FormData();
		formData.append('file', Item_Image);
		formData.append('item_id', item_id);
		formData.append('item_qte_by_size', item_qte_by_size);
		formData.append('item_unit_price', item_unit_price);
		formData.append('item_name', item_name);
		formData.append('gender', gender);
		formData.append('item_category', item_category);
		formData.append('item_brand', item_brand);
		formData.append('item_discount', item_discount);
		$.ajax({
		url: "classes/dashboard.php",
		type: 'POST',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		error: function(xhr, textStatus, errorThrown){
       alert('request failed');
   		 },
		success: function(){
			$(".stock-item-selected").trigger("click");
		}
			});
	}else{
		var formData = new FormData();
					formData.append('nofile', "");
					formData.append('item_id', item_id);	
					formData.append('item_qte_by_size', item_qte_by_size);
					formData.append('item_unit_price', item_unit_price);
					formData.append('item_name', item_name);
					formData.append('gender', gender);
					formData.append('item_category', item_category);
					formData.append('item_brand', item_brand);
					formData.append('item_discount', item_discount);
					$.ajax({
						url: "classes/dashboard.php",
						type: 'POST',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						error: function(xhr, textStatus, errorThrown){
									alert('request failed');
								},
						success: function(){
									$(".stock-item-selected").trigger("click");
								}
				});
	}
	
	
	
}

var Item_Image ;
$( document ).on("change",":file",function(){
	
	  Item_Image = this.files[0];
	
 
		
})



function GetItemsFromDB(gender,item_category){
if(gender == "stock-item-women") gender = "women";
if(gender == "stock-item-men") gender = "men";
	$.get("classes/getitems.php","gender="+gender+"&filter="+item_category,function(data){
		
		$(".stock_display").children(".right_menu").children("table").children("tbody").html(add_item_tr);
			$(".stock_display").children(".right_menu").children("table").children("tbody").html(add_item_tr+data);

		

	});
}







$( document ).on("mouseover",".stock_tbody_item",function(){
	$(this).children("th").children(".update_item").css("visibility","visible");
	$(this).children("th").children(".item_image_box").css("display","block");
	

	
})

$( document ).on("mouseleave",".stock_tbody_item",function(){
	
		$(this).children("th").children(".update_item").css("visibility","hidden");
		$(this).children("th").children(".item_image_box").css("display","none");

	
	
	
})

$( document ).on("focusin",".stock_tbody_item",function(){
	
	$(this).css("box-shadow","0px 0px 5px -4px rgba(0,0,0,0.75)");

});

$( document ).on("focusout",".stock_tbody_item",function(){
	
	$(this).css("box-shadow","0px 0px 0px 0px rgba(0,0,0,0.75)");

});





$(document).on("keypress",".Item_sizes,.item_unit_price,.item_name,:file",function(event){
		hide_men_women_menu();
	
	if(event.which == 13){
		Item_Image  = null;		
		$(this).parents("tr").children("th").children("#add_item_to_db").click();
		
	}
//	$(this).parents(".stock_tbody_item").children("th").children(".update_item").css("visibility","visible");
})
function hide_men_women_menu(){
	//hide the men_women menu
	$(".stock_display .left_menu").css("width","0px");
		$(".men_women_stock").fadeOut();
		$(".show_hide_menu").removeClass("glyphicon-menu-left").addClass("glyphicon-menu-right");
		$(".stock_display .right_menu").css("width","1270px");
	///////////////////////////////////
}

$(document).on("keypress",".stock_tbody_Item_sizes,.stock_tbody_item_unit_price,.stock_tbody_item_name,.stock_tbody_item_brand,.stock_tbody_item_discount",function(event){
	hide_men_women_menu();
	if(event.which == 13){
		$(this).parents(".stock_tbody_item").children("th").children(".update_item").click();
		$(".stock-item-selected").trigger("click");
		
	}
//	$(this).parents(".stock_tbody_item").children("th").children(".update_item").css("visibility","visible");
})

$(".Item_sizes,.item_unit_price,.stock_qte,.item_name").focusout(function(){
	$(this).parents(".stock_tbody_item").mouseleave();
	
	//$(this).parents(".stock_tbody_item").children("th").children(".update_item").css("visibility","hidden	");
	
	
})

$(".show_hide_menu").click(function(){
	if($(this).hasClass("glyphicon-menu-left")){
		$(".stock_display .left_menu").css("width","0px");
		$(".men_women_stock").fadeOut();
		$(this).removeClass("glyphicon-menu-left").addClass("glyphicon-menu-right");
		$(".stock_display .right_menu").css("width","1270px");
	}else if($(this).hasClass("glyphicon-menu-right")){
		$(".stock_display .left_menu").css("width","210px");
		$(".men_women_stock").fadeIn();
		$(this).removeClass("glyphicon-menu-right").addClass("glyphicon-menu-left");
		$(".stock_display .right_menu").css("width","1080px");
		
	}
})



var Qr_value = "";
var step =  0;
var Step0DetectedQr = "";
var DetectionTimeout = setTimeout(function(){},60000);
let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {

		Qr_value = content;
		//$(".confirm_payment").trigger("confirm_payment",content);
		if(step == 0){
			$(".confirmation_log").html("<div class='alert alert-info'><span >Delivery Package Has Been Picked From Delivery Stock .</span></div>");
			Step0DetectedQr = content;
			$(".start_stop_camera").click();
		step = 1;
		}else if(step == 1){
			if(content == Step0DetectedQr){
				$(document).trigger("confirm_payment",content);

				//refresh_content();

			}
			
			
			
			

		}

		/*clearTimeout(DetectionTimeout);
				DetectionTimeout = setTimeout(function(){
					$(".confirmation_log").html("<div class='alert alert-danger'><span >20 Seconds Past And No Qr Has been detected (Camera Off)</span></div>");
					$(".start_stop_camera").click();
						step =  0;
						Step0DetectedQr = "";		
					},1000);*/
        console.log(content);
	  });
	  
	  
$(document).bind("confirm_payment",function(e,content){
	$.post("classes/dashboard.php","confirm_purchase="+content,function(data){
	//$(".confirmation_log ").html($(".confirmation_log ").html()+data);
	$(".confirmation_log").append(data);
	var step =  0;
	var Step0DetectedQr = "";
	if($(".confirmation_log").children(".alert-success").size() == 1)
		refresh_content();
	})
	$(".start_stop_camera").click();
})


$(".start_stop_camera").click(function(){
	//$(".confirm_payment").trigger("confirm_payment","ZDFlNDlkNDFlNTM2NjBkOWNlNjk3MTBhOTlhODA2M2Y=");
	
	if($(this).hasClass("stop_camera")){
		
		$(".start_stop_camera").removeClass("stop_camera");
		$(".start_stop_camera").addClass("start_camera");
		$(".start_stop_camera").html("Start Camera");

		Instascan.Camera.getCameras().then(function (cameras) {
			if (cameras.length > 0) {
			  scanner.stop(cameras[0]);
			} else {
			  alert('No cameras found.');
			}
		  }).catch(function (e) {
			alert(e);
		  });
	
		
	}else{
		$(".start_stop_camera").removeClass("start_camera");
		$(".start_stop_camera").addClass("stop_camera");
		$(".start_stop_camera").html("Stop Camera");
		Instascan.Camera.getCameras().then(function (cameras) {
			if (cameras.length > 0) {
			  scanner.start(cameras[0]);
			} else {
				alert('No cameras found.');
			  
			}
		  }).catch(function (e) {
			console.error(e);
		  });
	}
	
	
})







function refresh_content(){
	step =  0;
	Step0DetectedQr = "";
	$.get(location.href).then(function(page) {
		$("#Deliveries_display").html($(page).find("#Deliveries_display").html());
		//$(".confirmation_log").html($(page).find(".confirmation_log").html());
	})
}





$(".slide_item").mouseover(function(){
	
	$(".slide_item_ok").css("display","none");
	$(".slide_item_image").css("display","none");
	$(this).children("th").children(".slide_item_ok").css("display","block");
	$(this).children("th").children(".slide_item_image").css("display","block");
	//alert($(this).children("th").size());
})

$(".slide_item").mouseleave(function () {
	$(this).children("th").children(".slide_item_ok").css("display","none");
	$(this).children("th").children(".slide_item_image").css("display","none");
})



$(".index_page").click(function() {
	 
    $(".ads_option").css("display","none");
    
    $(".index_slide_show").css("display","block");
   
})


$(".browse_page").click(function() {
    $(".ads_option").css("display","none");
    
    $(".browse_ads").css("display","block");
})


var add_item_tr = `<tr  >

                    
                     <th >
                       <input type="text" class="item_name" placeholder="Item Name" value=""  >                       
                     </th>

                     <th >
                       <input type="text" class="item_unit_price" placeholder="00.00 DA" value="" > 
                     </th>

                    <th >
                         <select class="Item_sizes" id="" >
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
                       <input type="number" class="stock_qte" placeholder="0" id="NOSIZE" value="0"> 
                       <input type="number" class="stock_qte" placeholder="0" id="XS" value="0"> 
                       <input type="number" class="stock_qte" placeholder="0" id="S" value="1"> 
                       <input type="number" class="stock_qte" placeholder="0" id="M" value="2"> 
                       <input type="number" class="stock_qte" placeholder="0" id="L" value="3"> 
                       <input type="number" class="stock_qte" placeholder="0" id="XL" value="4"> 
                       <input type="number" class="stock_qte" placeholder="0" id="XXL" value="5"> 
                       <input type="number" class="stock_qte" placeholder="0" id="XXXL" value="6"> 
                      
                     </th>
                    
					<th>
                       <input type="text" class="item_brand" placeholder="Brand Name" value="N/A"  >                       					
					</th>

                     <th>
                       <input type="text" class="item_discount" placeholder="..%" value="0"  >                       					 
					 </th>
                     <th>
                       <form id="item_image_uploader" enctype="multipart/form-data">
                        <input name="file" type="file" style=""/>
                     </form>
                     </th>
					 


                     <th style="position: absolute;border:0px;">
                       <input type="submit" id="add_item_to_db" value="Add New Item">
                     </th>
                     
                  </tr>`;