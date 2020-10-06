/* Filename: validateReg.js
   Target html: registration.html 
   Purpose: Validation through JavaScript
   Author: Joanna Wong Wei Jen
   Date written: 4/10/2020
*/

//Validates data, and if data is valid, store them into the sessionStorage

var errMsg="";

/*Check for the second time to see if input qualifies in terms of pattern */
function validateName(){
	 // Validate name input
	var name_correct = true;
	var firstName = document.getElementById("firstname").value;
	var lastName = document.getElementById("lastname").value;
	var pattern =/^[a-zA-Z ]+$/;
	
	// Gives false when name input is empty
	if(firstName=="" || lastName==""){ 
		errMsg+="Name field cannot be empty.\n";
		name_correct=false;
	}
	// Returns false when name input does not match the pattern
	else if(!pattern.test(firstName) || !pattern.test(lastName)){ 
		errMsg+="Invalid name.\n";
		name_correct= false;
	}
	return name_correct;
}
	
function validateEmail() {  
	var email = document.getElementById("email").value;
	var email_correct = true; 
	var pattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
	
	
	if(email==""){
		errMsg += "Email field cannot be empty.\n";
		email_correct=false;
	}
	else if (!pattern.test(email)){
		errMsg += "Please enter a valid email.\n";
		email_correct = false;
	}
    
	return email_correct;
}

function validatePassword() {  
	var password = document.getElementById("password").value;
	var password_correct = true; 
	var pattern = /[a-zA-Z0-9!@#\$%\^\&*+=\._-]{8,}/;
	
	
	if(password==""){
		errMsg += "Password field cannot be empty.\n";
		password_correct=false;
	}
	else if (!pattern.test(password)){
		errMsg += "Please enter a valid password(must contain at least one uppercase or lowercase or digit or at least one special character (all at least 9 letters without spacing)\n";
		password_correct = false;
	}
    
	return password_correct;
}

function validatePhoneNumber() {
	var phonenumber = document.getElementById("telephone").value;
	var pattern = /^(01)[0-9]{7}$/;  
	var phonenumber_correct = true;
	
	if(phonenumber==""){
		errMsg += "Please enter your phone number.\n";
		phonenumber_correct = false;
	}
	else if (!pattern.test(phonenumber)){  
		errMsg += "Invalid phone number.\n";
		phonenumber_correct = false;
	} 
	

	return phonenumber_correct;
}

function validateQuestion(){
	var question = document.getElementById("secQues").value;
	var question_filled = true;
	
	if(question==""){
		errMsg += "Please enter your security question.\n";
	}
	return question_filled;
	
}

function validateAnswer(){
	var answer = document.getElementById("secAns").value;
	var answer_filled = true;
	
	if(answer==""){
		errMsg += "Please enter your security answer.\n";
	}
	return answer_filled;
	
}


function ifInputInfoValid() {  // To validate the form
   var all_valid = false;  
   var name_valid = validateName();
   var email_valid= validateEmail();
   var password_valid = validatePassword();
   var phonenumber_valid = validatePhoneNumber();
   var question_valid = validateQuestion();
   var answer_valid = validateAnswer();
   
   
   if (name_valid && email_valid && password_valid &&phonenumber_valid&&question_valid && answer_valid){
      all_valid = true;
   }
   else{
	  alert(errMsg);
	  errMsg = "";
	  all_valid = false;
   }
   return all_valid;
}



function successRegistration(){
	alert("Registration is succesful. You data has been entered into the system");
	
}

