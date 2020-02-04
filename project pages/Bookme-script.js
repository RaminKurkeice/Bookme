var i = 0; // start point
var images = [];
var time = 3000;


// image list
images[0] = 'CollegeBooks.jpg';
images[1] = 'School discussion.jpg';
images[2] = 'students working.jpg';
images[3] = 'textbooks.jpg';

// change images
function changeImg(){
	document.slide.src = images[i];

if(i < images.length - 1){
	
	i++; 

}else{
	
	i = 0;

}

setTimeout("changeImg()", time);

}

function init() {
	initHeader();
	changeImg();
}

function search(){


}

window.onload = init;