// // document.getElementById("header_start").onScroll = headerchange();
// // function headerchange() {
// // 	var header = document.getElementById("header_start");
// // 	console.log(header);
// // 	header.classList.remove("header-full");
// // }
// // var scroll = document.documentElement.clientHeight;
// // console.log(scroll);
// // if(scroll) {
// // 	scroll.onscroll = headerchange();
// // }
// // document.onscroll = function header_reset() {
// // 	var header = document.getElementById("header_start");
// // 	console.log(header);
// // 	for(var i = 1; i < 40; i = i + 1) {
// // 		setTimeout(function() {
// // 		header.style.margin=i+'% em';
// // 		console.log(i);
// // 		}, 200)
// // 	};
// // }
// // document.onscroll = header_reset();
// // document.onscroll = function() {
// // var header = document.getElementById("header_start");
// // console.log(window.onscroll);
// //  for(var i = 1;i < 20; i = i + 1 ){
// // 	console.log(i);
// // 	setInterval(function(){
// // 		header.style.margin=i+'% 2em';
// // 		// console.log('hello');
// // 	}, 100);

// // };
// // // document.classList.remove("header-full");
// // };
// window.onscroll = function headerchange() {
// var timeNamer;
// 	var header = document.getElementById("header_start");
// 	var loaded = header.getAttributeNode("headerloaded");

// 	console.log(header);
// 	console.log(window.scrollY);
// 	if(window.scrollY > 10 && loaded == null) {
// 	for(var i = 80; i <= 80, i>=20; --i) {
// 		(function(n) {
// 			setTimeout(function(){
// 				header.style.margin=n+"% 2em 0";
// 				console.log("N Master "+ n);
// 			},20*n);
// 		}(i));
// 		console.log(i);
// 	}
// 	var rm_node = header.getAttributeNode("style");
// 	console.log(rm_node);
// 	if(rm_node != null)	header.removeAttributeNode(rm_node);
// 	console.log(rm_node);
// 	var loaded2 = header.getAttributeNode("headerloaded");
// 	console.log('L Master '+loaded+'L Master 2'+ loaded2);
// 	header.setAttribute("headerloaded", "true");
// 	document.body.classList.remove("header-full");
// 	console.timeEnd(timeNamer);
// 	}
// }
// // window.onscroll = headerchange();