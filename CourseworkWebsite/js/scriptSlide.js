var slidelocation = 1; //start slide from 1st's picture

	function incr(){ //increment and change display properties to show the next photo
		if (slidelocation > 0 && slidelocation < 4) { //limit slidelocation value to stay within photo amount
		slidelocation++; //incr
		}
		if (slidelocation == 1) { //display set according to current slidelocation
			document.getElementById("slideshow1").style.display = "block"; //block = show
			document.getElementById("slideshow2").style.display = "none"; //none = hide
			document.getElementById("slideshow3").style.display = "none";
			document.getElementById("slideshow4").style.display = "none";
		}
		else if (slidelocation == 2) {
			document.getElementById("slideshow1").style.display = "none";
			document.getElementById("slideshow2").style.display = "block";
			document.getElementById("slideshow3").style.display = "none";
			document.getElementById("slideshow4").style.display = "none";
		}
		else if (slidelocation == 3) {
			document.getElementById("slideshow1").style.display = "none";
			document.getElementById("slideshow2").style.display = "none";
			document.getElementById("slideshow3").style.display = "block";
			document.getElementById("slideshow4").style.display = "none";
		}
		else if (slidelocation == 4) {
			document.getElementById("slideshow1").style.display = "none";
			document.getElementById("slideshow2").style.display = "none";
			document.getElementById("slideshow3").style.display = "none";
			document.getElementById("slideshow4").style.display = "block";
		}
		
	}

	function decr(){ //decrement and change display properties to show previous photo
		if (slidelocation > 1 && slidelocation < 5) {
		slidelocation--; //decr
		}
		if (slidelocation == 1) {
			document.getElementById("slideshow1").style.display = "block";
			document.getElementById("slideshow2").style.display = "none";
			document.getElementById("slideshow3").style.display = "none";
			document.getElementById("slideshow4").style.display = "none";
		}
		else if (slidelocation == 2) {
			document.getElementById("slideshow1").style.display = "none";
			document.getElementById("slideshow2").style.display = "block";
			document.getElementById("slideshow3").style.display = "none";
			document.getElementById("slideshow4").style.display = "none";
		}
		else if (slidelocation == 3) {
			document.getElementById("slideshow1").style.display = "none";
			document.getElementById("slideshow2").style.display = "none";
			document.getElementById("slideshow3").style.display = "block";
			document.getElementById("slideshow4").style.display = "none";
		}
		else if (slidelocation == 4) {
			document.getElementById("slideshow1").style.display = "none";
			document.getElementById("slideshow2").style.display = "none";
			document.getElementById("slideshow3").style.display = "none";
			document.getElementById("slideshow4").style.display = "block";
		}
	}

/*
slide starts from first by default (1) and is defaultly set to block. using the variable, incrementing and decrementing the
variable will change the display valies for each picture accordingly. this way i can display photos will button functions.
added limits to increment and decrement to make sure the variable doesn't go out of the 1-4 bounds
*/