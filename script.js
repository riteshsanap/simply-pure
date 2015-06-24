window.onscroll = function animateHeader() {
	var header = document.getElementById("pure-main-header");

	if(window.scrollY > 10 && !header.classList.contains("animate_header") && window.innerWidth >= 768) {
		header.classList.add("animate_header");
		var sidebar = document.getElementById("widget-sidebar");
		sidebar.classList.add("animate_sidebar");
	}
}