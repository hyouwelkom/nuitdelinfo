function menu() {
	var x = document.getElementById("nav");
	
	if (x.className === "topnav right") {
		x.className = "right";
	} else {
		x.className = "topnav right";
	}
}