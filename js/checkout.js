$(document).ready(function () {
// $("#confirm_payment_modal").modal("toggle");
   //$("#add_payment_method_modal").modal("show");
   $('[data-toggle="popover"]').popover({
    container: 'body'
  });  

  $('[data-toggle="tooltip"]').tooltip({
    container: 'body'
  });

 
  
    });


    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })

$(document).on("click",".checkout_date",function(){
    $(".purchase_order").collapse("hide");
    $(this).parent().children("ul.purchase_order").collapse("toggle");
})


$(document).on("change",".purchase_order_item_size",function(){
    //$(this).find(":selected").val()
    $(this).parent().children(".purchase_order_item_quantity").css("display","none");
    $(this).parent().children(".purchase_order_item_quantity#"+$(this).find(":selected").val()).css("display","block");

})


$(document).on("click",".download_pdf",function(){
    //get the purchase_id 
    var purchase_id = $(this).parents(".purchase_order_id").attr("id");
    //alert(purchase_id);

    window.open('./templates/download_command_pdf.php?purchase_id='+purchase_id, '_blank');
    
    


    
})

var json= "";
$(document).on("click",".Confirm_checkout_pdf",function () {
    
   //show the confirm payment modal to complete and confirm the withdrawal of purchase amount
   



   
       
    //   alert($(this).hasClass("Confirm_checkout_pdf"));
       
  

    
    var Items = $(this).parents("ul.purchase_order").children(".purchase_order_item");
     json = '{';
    //var purchase_id = $(this).children(".purchase_order_item_name").parents(".purchase_order_id").attr("id");
    
    $.each(Items,function(index,value){
        var comma = ",";
        if(Items.length-1  == index)
           comma = "";
       // alert();

       
        json += '"'+index+'" : { "item_name" : "'+$(this).children(".purchase_order_item_name").html() 
        +'", "item_id" : "'+$(this).attr("id")
        +'", "item_qte_nosize" : "'+$(this).children(".col-lg-6").children("#NOSIZE").val()
        +'", "item_qte_xs" : "'+$(this).children(".col-lg-6").children("#XS").val()
        +'", "item_qte_s" : "'+$(this).children(".col-lg-6").children("#S").val()
        +'", "item_qte_m" : "'+$(this).children(".col-lg-6").children("#M").val()
        +'", "item_qte_l" : "'+$(this).children(".col-lg-6").children("#L").val()
        +'", "item_qte_xl" : "'+$(this).children(".col-lg-6").children("#XL").val()
        +'", "item_qte_xxl" : "'+$(this).children(".col-lg-6").children("#XXL").val()
        +'", "item_qte_xxxl" : "'+$(this).children(".col-lg-6").children("#XXXL").val()

        +'", "item_price" : "'+$(this).children(".purchase_order_item_price").children("i").children("b").html()+'"}'+comma;
        
        
    })

    json += '}';

    
    

    
    $("#confirm_payment_modal").modal("toggle");
    

})


$(".confirm_payment_modal_done").click(function () { 
   
    //$(".alert").css("display","none");
    $.post("classes/checkout.php","CheckOutCart="+json+"&password="+$(".account_password").val(),function(data){
        //$(".alert").css("display","none");
        $(".alert").slideUp(1,function(){
            // $(this).css("display","none");
         })

        if(data == "payment_confirmed_alert"){
            json = "";
            $(".modal").modal("hide");
            $.get(location.href).then(function(page) {
                $(".Deliveries_display").html($(page).find(".Deliveries_display").html());
                $("#cart_modal").html($(page).find("#cart_modal").html());
               
            })
        }

        if(data.includes("error_qte_")){
            var error_in_item_id = data.split("error_qte_")[1];

           $(".purchase_order_item").children(".qte_col").children(".purchase_order_item_size").css("border","1px solid black");
           $(".purchase_order_item").children(".qte_col").children(".purchase_order_item_quantity").css("border","1px solid black");

            
           $(".purchase_order_item#"+error_in_item_id).children(".qte_col").children(".purchase_order_item_size").css("border","2px solid red");
           $(".purchase_order_item#"+error_in_item_id).children(".qte_col").children(".purchase_order_item_quantity").css("border","2px solid red");
           $(".modal").modal("hide");

           
           $(".purchase_order_item#"+error_in_item_id).children(".qte_col").tooltip("show");
        }

        $("."+data).slideDown(800, function() {
            
            /*$(this).delay(60000).slideUp(800,function(){
               // $(this).css("display","none");
            })*/
         }); 
    })


    
    
})




$(document).on("click",".remove_purchase",function(){
    var purchase_id = $(this).parents(".purchase_order_id").attr("id");
    
    $.post("classes/checkout.php","remove_purchase="+purchase_id,function(data){
        if(data == "purchase_deleted")
            window.location.reload(0);
        else
            alert(data);
        
    })
})



var execute_confirm_payment_modal = () =>{} ;
$(".no_payment_method_alert_click").click(function(){
    $("#confirm_payment_modal").modal("hide");
    $("#add_payment_method_modal").modal("show");
    execute_confirm_payment_modal = ()=>{
        $(".alert").css("display","none");
        
        $("#confirm_payment_modal").modal("show");
        $("#add_payment_method_modal").modal("hide");
    };
})


$(".add_payment_method_modal_done").click(function (event) {  
    var bank_account_key = $(".payment_account_key").val();
    var account_password = $(".payment_account_password").val();

    if(bank_account_key.length >=8 && account_password.length >=8){
        event.preventDefault();
        $.post("classes/checkout.php","add_new_payment_method="+bank_account_key+"&password="+account_password,function(data){
            //alert(data);
            $(".alert").slideUp(1,function(){
                // $(this).css("display","none");
             })
            if(data == "new_account_has_been_added"){
                execute_confirm_payment_modal();
                $("."+data).slideDown(800, function() {
            
                  /*  $(this).delay(60000).slideUp(800,function(){
                        $(this).css("display","none");
                    })*/
                 }); 
                
            }
            $(".new_p_m_"+data).slideDown(800, function() {
            
               /* $(this).delay(60000).slideUp(800,function(){
                    $(this).css("display","none");
                })*/
             }); 
        })
    }
   
    return true;
})