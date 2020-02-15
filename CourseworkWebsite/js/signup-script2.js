function submitFormbetter(){ //generate mailto link base on form details
	var myForm = document.getElementById("mailto-form"); //set var to form
	myForm.onsubmit = function(e){ //when user submits form
		e.preventDefault(); //prevent default page refresh
		console.log(myForm.recipient.value); //just testing console logs

		var recipient = myForm.recipient.value; //use myForm to access values from form inputs
		document.getElementById("mailto-link").href="mailto:" + recipient; //set mailto string
		document.getElementById("mailto-link").style.display = "block"; //show generated link
	}
}


function revealForm(){ //reveal mailto form when user clicks text
	document.getElementById("mailto-form").style.display = "block";
}


function revealSignUp(){
	document.getElementById("reg-form").reset(); //reset form when canceling it
}

function hideSignUp(){
	document.getElementById("fixed-reg").style.display = "none"; //hide reg when click x
}

function revealNext(){
	document.getElementById("nextinfo").style.display = "block"; /*hide first page, show next page*/
	document.getElementById("preinfo").style.display = "none";
	document.getElementById("reg-next").style.display = "none";
}