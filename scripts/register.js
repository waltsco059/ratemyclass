function register() {
	// get username, password, and repeat password from text fields
	var user = document.getElementById("reg_user").value;
	var pass = document.getElementById("reg_pass").value;
	var pass_2 = document.getElementById("reg_pass_2").value;
	
	// verify the username
	// length between 6 and 10
	if ((user.length < 6) || (user.length > 10)) {
		window.alert("The username must be between 6 and 10 characters long, inclusive.")
		return;
	}
	// letters and digits only
	if (!/^\w*$/.test(user)) {
		window.alert("The username must contain only letters and digits.")
		return;
	}
	// cannot begin with a digit
	if (/^\d/.test(user)) {
		window.alert("The username cannot begin with a digit.")
		return;
	}
	
	// verify the password
	// password and repeated password must match
	if (!(pass == pass_2)) {
		window.alert("The password and the repeat password must match")
		return;
	}
	// length between 6 and 10
	if ((pass.length < 6) || (pass.length > 10)) {
		window.alert("The password must be between 6 and 10 characters long, inclusive.")
		return;
	}
	// letters and digits only
	if (!/^\w*$/.test(pass)) {
		window.alert("The password must contain only letters and digits.")
		return;
	}
	// contains at least one lower case letter
	if (!/[a-z]/.test(pass)) {
		window.alert("The password must have at least one lower case letter.")
		return;
	}
	// contains at least one upper case letter
	if (!/[A-Z]/.test(pass)) {
		window.alert("The password must have at least one upper case letter.")
		return;
	}
	// contains at least one digit
	if (!/\d/.test(pass)) {
		window.alert("The password must have at least one digit.")
		return;
	}
	
	// all criteria followed
	window.alert("User validated")
}