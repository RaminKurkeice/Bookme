$(document).ready(init);

function init(){
	$(".error").hide();
	$("#submit").click(validate);
}


function validate(event){
	$(".error").hide();
	var hasNumber = /\d/;
	
	var fname = $("input#firstname").val();
	if (fname == ""){
		$("label#fname_error").show();
		$("input#firstname").focus();
		return false;
	}
	else if (hasNumber.test("fname")){
		$("label#fname_error").show();
		$("input#firstname").focus();
		return false;
	}
		var lname = $("input#lastname").val();
	if (lname == ""){
		$("label#lname_error").show();
		$("input#lastname").focus();
		return false;
	}
	else if (hasNumber.test("lname")){
		$("label#lname_error").show();
		$("input#lastname").focus();
		return false;
	}
	var email = $("input#email").val();
	if (email == ""){ 
		$("label#email_error").show();
		$("input#email").focus();
		return false;
	}
	var password = $("input#password").val();
	if (password == ""){
		$("label#password_error").show();
		$("input#password").focus();
		return false;
	}
	else if(password.length >= 8 && /[a-z]/.test(password) || /[A-Z]/.test(password) && /\d/.test(password) && /[^\w\s]/.test(password)){
		$("label#password_error").show();
		$("input#password").focus();
		return false;
	}
	  var dataString = 'name='+ fname + lname +'&email=' + email + '&password=' + phone;
  alert (dataString);
  return false;

}