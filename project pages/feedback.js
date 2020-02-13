$(document).ready(init);
function init(){
	$(".error").hide();
	
	$("#submit").click(validate);
}


function validate(event){
	$(".error").hide();
	var hasNumber = /\d/;
	$("input#name_error").hide();
	var name = $("input#name").val();
	
	if(name = ""){
		$("input#name_error").show();
		$("input#name").focus();
		return false;
	}
	else if (hasNumber.test("name")){
		$("label#name_error").show();
		$("input#name").focus();
		return false;
	}
	var email = $("input#email").val();
	if (email == ""){ 
		$("label#email_error").show();
		$("input#email").focus();
		return false;
	}
	
	var dataString = 'name='+ name  +'&email=' + email ;
	alert(dataString);
	return false;
}