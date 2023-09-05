var topBtn = document.getElementById("topBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 180 || document.documentElement.scrollTop > 180) {
		topBtn.style.display = "block";
	} else {
		topBtn.style.display = "none";
	}
}
function topFunction() {
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 
