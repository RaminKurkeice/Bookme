window.onload = init;

function init() {
	initHeader();
	initFAQ();
}

function initFAQ() {
	
	$(".faq").each(function(i) {
		let faqId = "faq"+i
		
		$(this).attr("id", faqId);
		setInfoToggle(this.id, false);
		$(this).children(".showToggle").click(function() {
			toggleInfoToggle(faqId);
		});
	});
}

function toggleInfoToggle(faqId) {
	let faq = "#" + faqId
	
	if ($(faq).attr("isVisible") == "true") {
		setInfoToggle(faqId, false);
	}
	else {
		setInfoToggle(faqId, true);
	}
}

function setInfoToggle(faqId, visible) {
	let faq = "#" + faqId
	
	if (visible) {
		$(faq).attr("isVisible", "true");
		$(faq).children(".answer").show();
		$(faq).children(".showToggle").html("˄ Hide Answer");
	}
	else {
		$(faq).attr("isVisible", "false");
		$(faq).children(".answer").hide();
		$(faq).children(".showToggle").html("˅ Show Answer");
	}
}