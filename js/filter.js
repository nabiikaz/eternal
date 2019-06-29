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



$( document ).ready(function () {

	//highlight the selected category in the filter box
	if(getParameterByName("Category") !== null)
	{
		
		$("."+getParameterByName("Category")).addClass("_subtitle_hovered");
		$("."+getParameterByName("Category")).css("color","#4caf50");
		$("."+getParameterByName("Category")).css("font-weight","bold");

		//alert(getParameterByName("Category"));
	}

	if(getParameterByName("filter") !== null)
	{
		
		$(".filter_"+getParameterByName("filter")).css("display","block");

		//alert(getParameterByName("Category"));
	}

})



