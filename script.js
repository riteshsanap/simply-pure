window.onscroll = function animateHeader() {
	var header = document.getElementById("pure-main-header");
	// console.log(header);

	if(window.scrollY > 10 && !header.classList.contains("animate_header") && window.innerWidth >= 768) {
		// console.log(header.classList);
		header.classList.add("animate_header");
		var sidebar = document.getElementById("widget-sidebar");
		sidebar.classList.add("animate_sidebar");
	}
}