// register.js
// Handles displaying login requirements

var helpers = ["Your name must be in the form: first name, middle initial., last name",
               "Your email address must have the form: user@domain",
               "Your user ID must have at least six characters",
               "Your password must have at least six characters and it must include one digit",
               "This box provides advice on filling out the form on this page. Put the mouse cursor over any input field to get advice"]

//ptrUser = document.getElementById("reg_user")
function popwin(id){
	//left = (evt.clientX - 130);
	//top = (evt.clientY - 75);

	document.getElementById(id).style.display ="block"
	//myWin = window.open("","nCt", "left=0,width=272,height=54,status=no,toolbar=no,menubar=no,scrollbars=no");
	//myWin.document.write("<head><title>Example</title></head>");
	
}
function closewin(id){
	document.getElementById(id).style.display ="none"
	//if (!myWin.closed)
	//myWin.self.close()
}

ptrPass = document.getElementById("reg_pass")

// function that popups a window for the user when they hover over registration fields




function passwordPopup(evt){

}