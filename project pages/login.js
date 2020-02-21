$(document).ready(init);

function init(){
	$('.error').hide();
	$('#submit').click(validate);
	
}


function validate(event){
	
	$(".error").hide();
	
	var password = $("input#password").val();
	var email = $("input#email").val();
	var fname = $("input#firstname").val();
	var lname = $("input#lastname").val();
	
	
	if (fname == "" || fname == /[0-9]/.test("fname")){
		$("label#fname_error").show();
		$("input#firstname").focus();
		return false;
	}
	
	else if (lname == "" || lname == /[0-9]/.test("lname")){
		$("label#lname_error").show();
		$("input#lastname").focus();
		return false;
	}
	
	else if (email == ""){ 
		$("label#email_error").show();
		$("input#email").focus();
		return false;
	}
	else if (password == "" || password.length <= 8 || password != /[a-z]/.test(password) || password == /[^\w\s]/.test(password) || password != /[0-9]/.test(password)){
		$("label#password_error").show();
		$("input#password").focus();
		return false;
	}
	else {
		window.alert("confirmed redirecting ...");
		window.open("Bookme-MainPage.html");
	return true;
	}
	
	return false;
}