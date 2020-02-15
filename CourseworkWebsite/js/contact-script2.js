function revealForm(){ //reveal mailto form when user clicks text
	document.getElementById("mailto-form").style.display = "block";
}

function submitFormbetter(){ //generate mailto link base on form details
	var myForm = document.getElementById("mailto-form"); //set var to form
	myForm.onsubmit = function(e){ //when user submits form
		e.preventDefault(); //prevent default page refresh
		console.log(myForm.recipient.value); //just testing console logs

		var recipient = myForm.recipient.value; //form values
		var cc = myForm.cc.value;
		var sub = myForm.sub.value;
		var thebody = myForm.thebody.value;

		if (recipient=="" || sub=="" || thebody=="") { //empty form
			alert("Please complete the form");
    		return false;
		}
		else if (cc=="") { // no cc
			document.getElementById("mailto-link").href="mailto:"+recipient+"?&subject="+sub+"&body="+thebody; //concatinate to make mailto link
				}
		else{ // all fields filled
			document.getElementById("mailto-link").href="mailto:"+recipient+"?cc="+cc+"&subject="+sub+"&body="+thebody; //concatinate to make mailto link
			}
		document.getElementById("mailto-link").style.display = "none";
		window.setTimeout(showlink,100); //delay link give sense of new link when new form submitted
		
	}
}

function showlink(){
	document.getElementById("mailto-link").style.display = "block"; //show generated link
}