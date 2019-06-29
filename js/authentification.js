function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$( document ).ready(function(){
    var action =  getParameterByName("action");
    
    if(action !== null){
            switch (action) {
                case "login":
                    //display the Login_display class action_type
                    $(".action_type").css("display","none");
                    $(".Login_display").css("display","block");
                    
                    
                    break;
                case "registration":
                    $(".action_type").css("display","none");
                    $(".Registration_display").css("display","block");
                break;

                case "forgot_password":
                    $(".action_type").css("display","none");
                    $(".forgot_password_display").css("display","block");
                break;

                case "recover_password":
                    $(".action_type").css("display","none");
                    $(".recover_password_display").css("display","block");
                break;
                default:
                $(".action_type").css("display","none");
                    $(".Login_display").css("display","block");
                break;
            }
    }
    var error = getParameterByName("error");
    if(error !== null){
        switch (error) {
            case "emailexist":
                $(".registration_error_msg").css("display","block");
                
            break;

            case "wronginfo":
                    
                $(".login_error_msg").css("visibility","visible");
                
            break;

            case "userblocked":
                $(".login_error_msg").html("This User is Currently Blocked For Certain Reasons Please Try Again Later.");
                $(".login_error_msg").css("visibility","visible");
                $(".Login_display").css("height","350px");
                

        
            default:
                break;
        }
    }
})



var EmailSentWaiting;
$(".PasswordRecovery_submit").click(function(event){
    event.preventDefault();
    
    var email = $(this).parent("div").parent("form").children("div").children(".email");

    if(!isEmail(email.val())){
        email.tooltip("show");
        email.css("border-color","red");
    }else{
       
       
        SendEmailPasswordRecovery(email.val());
        
        var PasswordRecovery_submit = $(this),this_val = $(this).val(),points = "" ;


         EmailSentWaiting = setInterval(function(){
             if(points == " . . . . .")
                points = "";
            points += " .";
           PasswordRecovery_submit.val(this_val + points);
        },500);

         email.val("");
        email.tooltip("hide");
    }
    
  
})





function SendEmailPasswordRecovery(email){
    var PasswordRecovery_submit_val =  $(".PasswordRecovery_submit").val();
   $.post("classes/passwordrecovery.php","email="+email,function(data){
        
        if(data == "Error: Email Couldn't Be sent."){
            $(".forgot_password_display").css("height","300px");
            $(".forgotpassword_msg_guide").html("Its Seems that we are having some problems in our server please try again later....");
            $(".emailsent").html("Error: Recovery Email Couldn't Be sent. ")
            $(".emailsent").css("display","block");
        }else if(data == "Success: Email Sent ."){
            $(".forgot_password_display").css("height","300px");
            $(".forgotpassword_msg_guide").html("If Your Email Exist in our Database then Check Your Inbox.");
            $(".emailsent").html("The recovery link has been sent to your Email Please verify You Inbox .")
            $(".emailsent").css("display","block");
        }

        clearInterval(EmailSentWaiting);
        $(".PasswordRecovery_submit").val(PasswordRecovery_submit_val);

   })
}


$("form div span.glyphicon").click(function(){
   if($(this).hasClass("glyphicon-eye-open")){
    //show the password :        
        $(this).parent("div").children("input#inputPassword").attr("type","text");

        $(this).removeClass("glyphicon-eye-open");
        $(this).addClass("glyphicon-eye-close");
   }else if($(this).hasClass("glyphicon-eye-close")){
    //hide the password :               
        $(this).parent("div").children("input#inputPassword").attr("type","password");

        $(this).removeClass("glyphicon-eye-close");
        $(this).addClass("glyphicon-eye-open");
   }
  
});

var Register = false;
$("#register-submit").bind("click",function(event){
   
    CheckPhone(event);
    if(Register == false)
        event.preventDefault();
    


    
    
})




$("#phone").bind("keypress  keydown keyup focusout",function(){
    CheckPhone();
    
})


function CheckPhone(event){
    var PhoneContext = $("#phone");
 if(PhoneContext.val().length <9 ||PhoneContext.val().length >10){
    
       // $("#register-submit").trigger("preventDefault"); 
        Register = false;                      
        PhoneContext.tooltip("show"); 
        PhoneContext.css("border-color","red");
        PhoneContext.css("color","red");

    }else{
        Register = true;        
        PhoneContext.tooltip("hide"); 
        PhoneContext.css("border-color","#ccc");
        PhoneContext.css("color","#555");

      
       
    }
}


$(".RenewPassword_submit").on("click",function(event){
    var token = getParameterByName("token");
    if(token != null){
        $(".token").attr("value",token);
        var password = $("#NewPassword").val(),
        confirmpassword = $("#ConfirmNewPassword").val();

        if(password != confirmpassword){
            event.preventDefault();
            $("#ConfirmNewPassword").tooltip("show");
        }

    }else
             location.href="authentification.php?action=login";



    //event.preventDefault();
})


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}