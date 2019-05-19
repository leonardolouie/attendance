$(document).ready(function(){


	   $("#retype_password").focusout(function(){
           var password = $("#password").val();
           
           if($(this).val() == password)
           {
           	$("#password_span").html("<span style='color:green;'> Password Match </span>");
           	$("#submit").attr('disabled', false);
           }
           else
           {
        	$("#password_span").html("<span style='color:red;'> Password did not Match </span>");
			$("#submit").attr('disabled', true);
       	   }



	   });

  



});
