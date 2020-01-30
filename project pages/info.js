window.onload = init;

function init() {
	initFAQ();
}

var faqs = document.getElementsByClassName("faq");

function initFAQ() {
	for (let i = 0; i < faqs.length; i++) {
		var toggle = faqs[i].getElementsByClassName("showToggle")[0];
		
		faqs[i].setAttribute("id", "faq" + i)
		setInfoToggle(faqs[i].id, false);
		toggle.onclick = function() {toggleInfoToggle(faqs[i].id);};
	}
}

function toggleInfoToggle(faqId) {
	var faq = document.getElementById(faqId);
	
	if (faq.getAttribute("isVisible") == "true") {
		setInfoToggle(faqId, false);
	}
	else {
		setInfoToggle(faqId, true);
	}
}

function setInfoToggle(faqId, visible) {
	var faq = document.getElementById(faqId);
	var answer = faq.getElementsByClassName("answer")[0];
	var toggle = faq.getElementsByClassName("showToggle")[0];
	
	if (visible) {
		faq.setAttribute("isVisible", "true");
		answer.style.display = "block";
		toggle.innerHTML = "˄ Hide Answer";
	}
	else {
		faq.setAttribute("isVisible", "false");
		answer.style.display = "none";
		toggle.innerHTML = "˅ Show Answer";
	}
}