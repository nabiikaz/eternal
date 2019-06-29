
 
$( document ).ready(function(){
	ChangeFocusOverMenu();
	//$(".small").click();

	PrintPagination();

//sort manupilation 
if(getParameterByName("sort") == null)
 return;
	sort = getParameterByName("sort").split("-");
	
	if(sort[1].includes("asc")){
		$("#"+sort[0]).children(".sort_type").children(".glyphicon-arrow-up").css("font-size","14px");

	}else if(sort[1].includes("desc")){
		$("#"+sort[0]).children(".sort_type").children(".glyphicon-arrow-down").css("font-size","14px");

	}
	if(sort !== null){
		$("#"+sort[0]).addClass("activate");
		$("#"+sort[0]).children(".sort_type").css("display","inline");
		$("#"+sort[0]).children(".sort_type").css("color","green");
	}
////////////////////////////////
})

function ChangeFocusOverMenu(){
	var gender = getParameterByName("gender");
	if(gender !== null){
		switch (gender) {
			case "men":
				$("#men_menu_title").trigger("mouseover");
			break;

			case "women":
				$("#women_menu_title").trigger("mouseover");
			break;
		
			default:
				break;
		}
	}
}

//animations 
$("#contact_us").mouseenter(
	function(){
		$('.glyphicon-earphone').addClass('faa-wrench animated');
	});
$("#contact_us").mouseleave(
	function(){
		$('.glyphicon-earphone').removeClass('faa-wrench animated');
	});
////////////

//animating the navigation menus 
//var current_selected_menu = ".men_menu"
//dashboard page controls :

var MenuFocusChangeInterval = setInterval(function(){
	$("#women_menu_title,#men_menu_title").mouseleave(function(){
		$(".Menu").mouseleave(function(){
			ChangeFocusOverMenu();
		});   

		
	});
},2000)




$("#women_menu_title").mouseover(
	function(){
		
		//hide the menu content of which the the menu title is hovered :( 
		$(".Menu").css('display','none');
		$(".women_menu").css('display','block');
		$(".Main_Menu_Tab_hovered").removeClass("Main_Menu_Tab_hovered");
		$(this).addClass("Main_Menu_Tab_hovered");	
		//$(".women_menu").addClass('fadeInRight animated');
	});


$("#men_menu_title").mouseover(
	function(){
		$(".Menu").css('display','none');
		$(".men_menu").css('display','block');
		$(this).addClass("Main_Menu_Tab_hovered");	

		$(".Main_Menu_Tab_hovered").removeClass("Main_Menu_Tab_hovered");
		$(this).addClass("Main_Menu_Tab_hovered");	

		//$(".men_menu").addClass('fadeInRight animated');

	});

$("#kids_menu_title").mouseover(
	function(){
		$(".Menu").css('display','none');
		$(".kids_menu").css('display','block');
		$(this).addClass("Main_Menu_Tab_hovered");	

		$(".Main_Menu_Tab_hovered").removeClass("Main_Menu_Tab_hovered");
		$(this).addClass("Main_Menu_Tab_hovered");	

		//$(".men_menu").addClass('fadeInRight animated');

	});


$(".Main_Sub_Menu_Tab").mouseover(function(){
	$(".Main_Sub_Menu_Tab_hovered").removeClass("Main_Sub_Menu_Tab_hovered");
	$(this).addClass("Main_Sub_Menu_Tab_hovered");

	$(".Footer_Nav").css("height","250px");


});
$(".Footer_Nav").mouseover(function(){
	$(".Footer_Nav").css("height","250px");
})

$(".Footer_Nav").mouseout(function(){
	$(".Footer_Nav").css("height","0px");
})

$(".Main_Sub_Menu_Tab").mouseout(function(){
	$(".Footer_Nav").css("height","0px");
})




/*$(".Main_Menu_Tab").mouseleave(function(){

	

	
		window.setTimeout(function(){
			$(".Menu").css('display',"none");
			$(current_selected_menu).css('display',"block");
		},2000);
		

});*/


//ripple effect function ///////////////////////////////////////////////////////

    
    
    $('.ripple').on('click', function (event) {
      event.preventDefault();
      
      var $div = $('<div/>'),
          btnOffset = $(this).offset(),
      		xPos = event.pageX - btnOffset.left,
      		yPos = event.pageY - btnOffset.top;
      

      
      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      
      $ripple.css("height", $(this).height());
      $ripple.css("width", $(this).height());
      $div
        .css({
          top: yPos - ($ripple.height()/2),
          left: xPos - ($ripple.width()/2),
          background: $(this).data("ripple-color")
        }) 
        .appendTo($(this));

      window.setTimeout(function(){
        $div.remove();
      }, 2000);
    });
    

  


////////////////////////////////////////////////////////////////////////////








$(".search_btn").click(function(){
	$(".items_display").html("");
})




$(".my_account_list").on("mouseleave",function(){
	$('.my_account_list').collapse('hide');
})

$(".my_account").on("mouseover click ",function(){
	$('.my_account_list').collapse('toggle');
})


$("div").click(function(){
	if(!$(this).hasClass("authentification_block")){
		$('.my_account_list').collapse('hide');		
	}
	
		if($(this).parents(".filter_").size() ==0 ){
			
				hidefilter();
		}
		
		
	
	
	

})



$(".search_items").keypress(function(e){
	var search_option = $(".search_opt option:selected").val();
	
	if(e.which == 13){
		
	 document.location.href = "browse/?query="+$(this).val()+"&search_opt="+search_option;


	}
	
})

$( document ).on("click",".Main_Sub_Menu_Tab", function () {
  var filter =	$(this).attr("id");
  var gender = $(this).parents(".Menu").attr("id");

 

 document.location.href = "browse/?gender="+gender+"&filter="+filter;

return;




 var str = document.location.toString();
var res = str.split("&"),first_char = "&";


if(res[0].includes("?")){
	var tmp = res[0];
	res[0] = tmp.split("?")[0];
	res[res.length] = tmp.split("?")[1];
}
alert(res);	


var newUrl = "" ;
$.each(res,function(index,value){
	if(index == 0)
		newUrl +=value+"?";
	else
	newUrl +="&"+value;
})		



/*
//alert(res[0]);
if(res[0].includes("?gender=")){
	var newUrl =res[0];
	newUrl = newUrl.split("?")[0];
	//alert(newUrl);
	first_char = "?";

}
else
var newUrl =res[0];
	if(res.length > 1){



		$.each(res,function(index,value){
			if(!value.includes("gender=") && !value.includes("filter=") && index != 0)
				newUrl +="&"+value;
		})
			newUrl +=first_char+"gender="+gender+"&filter="+filter;

	}else{
		
		newUrl +=first_char+"gender="+gender+"&filter="+filter;
		
	}
	alert(newUrl);
	
	window.location.href = newUrl;


*/
  
});

$(".filter_col_item").mouseover(function(){
		
	if(!$(this).hasClass("activate"))
		$(this).children(".sort_type").css("display","inline");
	
})

$(".filter_col_item").mouseleave(function(){
	if(!$(this).hasClass("activate"))
		$(this).children(".sort_type").css("display","none");
	
})

$(".sort_type").children(".glyphicon-arrow-up").click(function () {
	 up_down = "asc";
		
})


$(".sort_type").children(".glyphicon-arrow-down").click(function () {
	 up_down = "desc";
		
})

var up_down = "asc";
$(document).on("click",".filter_col_item",function () {
	
	var url = location.href.toString();
	if(!url.includes("?")){
		location.href = url + "?sort="+$(this).attr("id")+"-"+up_down;
	}else{
		sort = getParameterByName("sort");

		
		var tmp = url.split("?");

		if( !tmp[1].includes("&")) {
			//alert(tmp[0] + "?sort="+$(this).attr("id"));
			location.href = tmp[0] + "?sort="+$(this).attr("id")+"-"+up_down;	
			return;		
		}

		var tmp1 = tmp[1].split("&");
		var new_url = "";
		$.each(tmp1,function(index,val){
			if(!val.includes("sort") && !val.includes("page") ){
				new_url += "&"+val;
			}
		})


		location.href = tmp[0]+"?sort="+$(this).attr("id")+"-"+up_down +new_url;

		
		
		
		
		
		
		
		
		
		/*var tmp = url.split("?");
		var tmp1 = tmp[1].split("&");
		var new_url = "";
		$.each(tmp1,function(index,val){
			if(!val.includes("sort")){
				new_url += "&"+val;
			}
		})

		if(tmp1.length == 1){
			location.href = tmp + "sort="+$(this).attr("id");
			
		}else {
			location.href = tmp + "sort="+$(this).attr("id");			
		}
		location.href = url + "&sort="+$(this).attr("id");*/
		
	}
	error_ta3_bassif :P
	hidefilter();
})




$( document).on("click", "h3.filter_title_col", function() {
	error_ta3_bassif :P
	hidefilter();
//	alert(parent.children(".filter_content").css());

	
});
function hidefilter(){
	var parent = $(".filter_title_col").parent().parent();
	parent.children(".glyphicon").show();
	parent.children(".filter_content").hide();
	
	
	parent.removeClass("big"); parent.addClass("small"); 
}






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






$(document).on("click",".page-item",function(){
	var page = 0;
	if(getParameterByName("page") !== null){

		page = getParameterByName("page");
		
	}
	var next_page = $(this).children(".page-link").html();
	//alert(location.href.toString());
	/*if($(this).children(".page-link").html().includes("Next")){
		location.href = location.href.toString().split("?page=")[0] +"?page="+(page+1);
		

	}*/
	var tmp = next_page;
	if(next_page.includes("Next")){
		
		next_page = parseInt(page)+1;
	}else
	if(next_page.includes("Previous")){
		if(parseInt(page) == 0)
			return;
		next_page = parseInt(page)-1;
	}
	

	if(!location.href.toString().includes("?")){
		if($(this).children(".page-link").html().includes("Next")){
			
			return;
		}
		location.href = location.href.toString() +"?page="+$(this).children(".page-link").html();
	}else{

		var tmp = location.href.toString().split("?");
		var paras = tmp[1].split("&");
		var new_paras = "";
		$.each(paras,function(index,val){
			if(!val.includes("page"))
				new_paras += "&"+val;
		})

		new_paras = "?page="+next_page+new_paras;
		newUrl = tmp[0]+new_paras;
		location.href = newUrl;
		//alert(newUrl);

	}

	
	
})



function PrintPagination(){
	//var page;
	if(page = getParameterByName("page") !== null){
		var page = Number(getParameterByName("page"));
		if(page != 0){
			//alert(page);
			var string = " <li class='page-item' ><a class='page-link' >Previous</a></li> <li class='page-item' ><a class='page-link' >"+(page -1)+"</a></li> <li class='page-item active' ><a class='page-link' >"+(page)+"</a></li> <li class='page-item' ><a class='page-link' >"+(page +1)+"</a></li><li class='page-item' ><a class='page-link' >Next</a></li>";
			$(".pagination").html(string);
			//alert("lkjj");
		}
		


	}
}




function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$( document ).on("click", ".small", function() {
	$(this).children(".glyphicon").hide();
	var small = $(this);
	
		small.children(".filter_content").fadeIn();

		

	
   $(this).removeClass("small"); $(this).addClass("big");
});