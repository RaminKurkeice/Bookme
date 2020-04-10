$(document).ready(init);

function init(){
	$('.error').hide();
	$('#submit').click(validate);
	$('#submit').click(function() {
									location.href = 'Login.php';
									return false;
	}
	
	
}


function validate(event){
	var password = $("input#password").val();
	var email = $("input#email").val();
	var fname = $("input#firstname").val();
	var lname = $("input#lastname").val();
	
	$(".error").hide();
	
	if (fname == "" || !/^[a-zA-Z]+$/.test(fname)){
		$("label#fname_error").show();
		$("input#firstname").focus();
		return false;
	}
	
	else if (lname == "" || !/^[a-zA-Z]+$/.test(lname)){
		$("label#lname_error").show();
		$("input#lastname").focus();
		return false;
	}
	
	else if (email == ""){ 
		$("label#email_error").show();
		$("input#email").focus();
		return false;
	}
	else if (password.length < 8 || !/[a-zA-Z]/.test(password) || !/[0-9]/.test(password) || !/[ !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/.test(password) || /[^a-zA-Z0-9 !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/.test(password)){
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