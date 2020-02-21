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
	var hasNumber = /\d/;
	if(firstName == letters.test(firstName))
     {
		 alert("true");
		succes = true;
     }
	 else if () {
		succes = false;
		alert("false");
		break;
	 }
	 if (lastName == letters.test(lastName))
     {
		
		succes = true;
		alert("true");
     }else{
		 succes = false;
		alert("false");
		break;
	}
	
	
	if (succes == true ){
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        
		alert(succes);
  }

}
  

