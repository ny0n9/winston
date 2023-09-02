//Get the button:
var topBtn = document.getElementById("topBtn");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 180 || document.documentElement.scrollTop > 180) {
		topBtn.style.display = "block";
	} else {
		topBtn.style.display = "none";
	}
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 
