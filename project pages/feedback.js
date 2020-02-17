$(document).ready(init);
function init(){
	
	$(".error").hide();
	
	$("#submit").click(validate);
}


function validate(event){
	
	alert("Validating");
	
	var succes = false;
	var firstName= $('#firstName').val();
	var LastName= $('#LastName').val();
	var tele= $('#phone').val();
	var email= $('#Email').val();
	var letters = /^[A-Za-z]+$/;
	
	if(firstName.value.match(letters))
     {
		 alert("true");
		succes = true;
     }
	 else {
		succes = false;
		alert("false");
	 }
	 if (LastName.value.match(letters))
     {
		 alert("hello no numbers");
		succes = true;
		alert("true");
     }else{
		 succes = false;
		alert("true");
	}
	
	
	if (succes == true ){
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        
		alert(succes);
  }
}
  

