


//this function is for removing an item row from the cart history 
function remove_item(e) {
	/*$(e).parent().parent().parent().fadeOut("slow",function(){ //removing an item from the cart with the animation of fadeOut 
		$(e).parent().parent().parent().remove();
	});*/

	//removing an item from the cart without the amination;
	$(e).parent().parent().parent().remove();
	//$(e).parent().parent().parent().remove();

	//number of items in the cart 
	var items_number = $(".cart_item").size();
	//hide the modal if the the number of items in the cart are 0 
	if(items_number == 0)
	$("#cart_modal").modal("toggle");

update_cart_counter();

update_cart_subtotal();

update_remotecart();
}






//rating stars design implementation :

$(".glyphicon-star").click(function(){
	//if the star is checked then uncheck all stars from this position to the end
	var star_index = $(this).index();  //the index of the clicked star
	
	var checked_stars = $(this).parent().children(".checked"); // get all of the stars which are checked 
	var unchecked_stars = $(this).parent().children(".unchecked"); // get all of the stars which are unchecked 

	 if($(this).hasClass("checked"))
	 {  //loop through the checked stars 
	 	checked_stars.each(function()
	 		{
	 			//uncheck the stars from the index of the clicked star untill the end
		 		if($(this).index() >= star_index)
		 		{
		 			$(this).removeClass("checked");
		 			$(this).addClass("unchecked");
		 		}
	 		});

	 }else if($(this).hasClass("unchecked"))
	 {  //loop through the unchecked stars 
	 	unchecked_stars.each(function()
	 		{
	 			//uncheck the stars from the index of the clicked star untill the end
		 		if($(this).index() <= star_index)
		 		{
		 			$(this).removeClass("unchecked");
		 			$(this).addClass("checked");
		 		}
	 		});

	 }

	
	 //update the number of the items which are checked in this rating_item
	 checked_stars = $(this).parent().children(".checked");
	 //alert(checked_stars.size());

	 	
});




$(".child").click(function(){
	var parents = $(this).parents(".parent");

	alert(parents.size());			
})

//Items //////////////////////////////////////


$(".add_to_cart").click(function(){

	//get the reference of the item which is unique 
	var ref = $(this).parents(".Item").attr("id");

	add_item_to_cart(ref);
	update_cart_counter();
	$(".cart_counter").addClass("animated");
	
	
	window.setTimeout(function(){$(".cart_counter").removeClass("animated")},2000);


	//update the cart of this visitor in the database
	update_remotecart();


})

//update cart_counter 
function update_cart_counter()
{
	var number_items = $(".cart_history").children("div").size();
	$(".cart_counter").children("b").html(number_items)

 }



//when "ADD TO CART" button  of an item is clicked this function adds the information of that item in the cart 
function add_item_to_cart(item_ref,new_quantity = 0)
{
	var content  = $(".cart_history").html();

	

	//if the item exist in the cart than all we need to do is to modify the row by incrementing the quantity and change 
	//the price to the new one according to the unit price and the quantity of that item 
	if($("#ref_"+item_ref).length)
	{


		//var price    = $("#ref_"+item_ref).children(".cart_item_total_price").children("span");
			var quantity = $("#ref_"+item_ref).children(".cart_item_quantity").children("div").children("input");
			var quantity_int;

			var price     = $("#ref_"+item_ref).children(".cart_item_total_price").children("span");
			var unit_price     = $("#ref_"+item_ref).children(".cart_item_quantity").children("div").children(".item_price_unit").html();
			var price_total;

		if(new_quantity == 0){ //if new_quantity == 0 thats means that the quantity is  incremented by  1

			quantity_int = (parseInt(quantity.val()) +1);
			price_total = unit_price * quantity_int;
			
		}else // if the new_quantity != 0 thats means that the quantity is changed there for we need to update the new price of the item 
		{
			quantity_int = new_quantity;
			price_total = parseFloat(unit_price) * quantity_int;
			
		}



		

		//update the html tags 
		quantity.attr("value",quantity_int);
		price.html(price_total.toFixed(2));
		//alert(price.html());

		
	}else{
		var item_name = $("#"+item_ref).children(".Item_Panel_Body").children("h4").children(".Item_Panel_Name");
		item_name = item_name.html();

		var item_price = $("#"+item_ref).children(".Item_Panel_Body").children("div").children(".Item_Panel_Price").children("span");
		item_price = parseFloat(item_price.html()).toFixed(2);

		//now we put item_price and item_name in a new row in the cart history modal 
		$(".cart_history").html( content + `
						<div>
						<hr style="margin: 0px; width: 95%;margin-left: 2.5%;">
					    	  <div class="panel-body cart_item " id="ref_`+item_ref+`">
							  
								  <div class="col-xs-1 cart_item_name ellipis" >
								  	<b >`+item_name+`</b>
								  </div>

								  <div class="col-xs-1 cart_item_quantity">
									  <div class="form-group text-center" >
									  	  
									  	  <div class="item_price_unit " style="display:none;" >`+item_price+`</div>
										
										 <input  type="number" class="form-control text-center item_quantity " onchange="update_cart_item_quatity(this)" value="1"   style="width:50px"  min="1" />
									  </div>
								  </div>

								  <div class="col-xs-1 cart_item_total_price text-center">
								  		<span>`+item_price+`</span>DA
								  </div>

								  <div class="col-xs-1 text-right">
								  		<button class="btn btn-primary cart_item_remove_btn"  onclick="remove_item(this);" style="">X</button>
								  </div>
								  
							  </div>
				    	</div>` );
	}

		update_cart_subtotal();


}

//when this function is called the subtotal of the cart selected items is recalculated :
function update_cart_subtotal()
{

	//calculation of the subtotal of the items selected in the cart and then putting it in its div
	var subtotal = 0;
	$(".cart_item_total_price").children("span").each(function(){
		subtotal += parseFloat($(this).html());
		
	});


	$("#cart_SubTotal").html(subtotal.toFixed(2));
}







////this function is fired when the quantity on an item in the cart is beening changed 
function update_cart_item_quatity(e){
	//$(e).parent().children(".item_quantity").html($(e).val());

	//new quantity of the item in the cart
	var new_quatity = parseInt($(e).val());

	//referece of the item of which the quantity in the cart has changed 
	var referece = $(e).parents(".cart_item").attr("id").split("ref_")[1];

	//add this new quantity to the item in the cart
	add_item_to_cart(referece,new_quatity);



	update_remotecart();


}




//// Check out  ////////////////////////

$(".check_out").click(function(){
	
	Check_Out();
		

})




function Check_Out(){
	window.location.href = "./checkout.php";
	
}


//generate the json of all selected items in the cart 
function GenerateCheckOutJson(){
	//alert($(".cart_item").size());

	//for each cart_item retrieve the data in the cart and send it to the server 
var cart_items  = '{';
var index = 0;

		$(".cart_item").each(function(){

			// retrieving the ref of the item :
			var item_ref = $(this).attr("id").split("ref_")[1];  
			// retrieving the the desired quantity of item for purchase : 
			var item_quantity = $(this).children(".cart_item_quantity").children("div").children(".item_quantity").attr("value");

			// retrieving the name of the item ; 
			var item_name = $(this).children(".cart_item_name").children("b").html();

			// retrieving unitprice of the item ; 
			var item_price_unit = $(this).children(".cart_item_quantity").children("div").children(".item_price_unit").html();


				//alert("index ="+$(this).index() +"\nref = "+item_ref +"\n quantity = "+item_quantity);
				cart_items += '"'+index+'":{ "item_ref" : "'+item_ref+'","item_name" :"'+item_name+'", "item_quantity" : "'+item_quantity+'", "item_price_unit" : "'+item_price_unit+'" },';
				 index++;

			
		})
		
		cart_items += '"'+index+'":{}}';
		return cart_items;
		//console.log(cart_items);
		//alert(JSON.stringify( cart_items ));
}


//this function will send and recieve data through xhr 
//its main function is to update the cart of this  user in the server side 
// reason : imagin when the user add to cart muliple items but is not ready to check out yet and the page is refreched then all of 
//			his selected items will be gone so with this function we are going to send every selected item to the data base:
function update_remotecart(){
	$.post("classes/cart.php","SaveCart="+GenerateCheckOutJson(),function(data){
		//alert(data);
	})

}



$( document ).ready(function(){
	$.post("classes/cart.php","LoadCart=1",function(data){

		ExecuteJson(data,Update_LocalCart);

	});
});




//this function 
function Update_LocalCart(data){
	console.log(data);

	$.each(data,function(i,tmp){
		if(data[i].item_ref !== undefined)
		{
		//console.log(data[i].item_ref + "  " +data[i].item_name + " " + data[i].item_quantity);

		var content  = $(".cart_history").html();
			//add the item to cart 
			//calculate the total price of the item compared to the quantity : 
			var totalprice = parseFloat(data[i].item_price_unit) * parseInt(data[i].item_quantity);
			totalprice = totalprice.toFixed(2);
				$(".cart_history").html( content + `
								<div>
								<hr style="margin: 0px; width: 95%;margin-left: 2.5%;">
							    	  <div class="panel-body cart_item " id="ref_`+data[i].item_ref+`">
									  
										  <div class="col-xs-1 cart_item_name ellipis" >
										  	<b >`+data[i].item_name+`</b>
										  </div>

										  <div class="col-xs-1 cart_item_quantity">
											  <div class="form-group text-center" >
											  	  
											  	  <div class="item_price_unit " style="display:none;" >`+data[i].item_price_unit+`</div>
												
												 <input  type="number" class="form-control text-center item_quantity " onchange="update_cart_item_quatity(this)" value="`+data[i].item_quantity+`"   style="width:50px"  min="1" />
											  </div>
										  </div>

										  <div class="col-xs-1 cart_item_total_price text-center">
										  		<span>`+totalprice+`</span>DA
										  </div>

										  <div class="col-xs-1 text-right">
										  		<button class="btn btn-primary cart_item_remove_btn"  onclick="remove_item(this);" style="">X</button>
										  </div>
										  
									  </div>
						    	</div>` );

		}
		
		
			
	
		
	})

	update_cart_counter();
	update_cart_subtotal();
	
}


//this function test if the data is in the json format if so then execute the callback function with the parsed json from string to object format 
function ExecuteJson(data,callback){
	var is_json = true;

	try
	{
		//var json = $.parseJSON(data);
		//alert($.parseJSON(data));
		callback($.parseJSON(data));
	}
	catch(err)
	{
		is_json = false;
	}


	return is_json;
}





/////////filter left bar functionnalites 

$(".filters_fixed").click(function(){
	//alert($(this).offset().top);
	$(".fixed_side_right_bar").css("margin-top","200px");
})


$(".filters_fixed").on("change ",function(){
	alert("position top = "+$(this).offset().top);
})







