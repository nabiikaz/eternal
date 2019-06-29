$( document ).ready(function(){
        Get_RefreshOrder();
})



var GetRefreshOrder = null;
function Get_RefreshOrder(){
    var page = ""
    if(document.location.toString().includes("dashboard.php")){
        page = "dashboard";
    }
    
    if(GetRefreshOrder == null){
         GetRefreshOrder = new EventSource("classes/refresh_order.php?page="+page);
        GetRefreshOrder.addEventListener("message", function(message) {
                   // console.log(message.data);
                    if(message.data.includes("-do refresh-")){
                        if(page == "dashboard"){
                         if( $(".accounts_tbody").children("tr").children("th").children("input:checked").length == 0)
                            $(".accounts_search_option").trigger("change");
                        }
                        else
                           location.reload();
						   console.log(message.data);
                        
                    }


        })
    }


}