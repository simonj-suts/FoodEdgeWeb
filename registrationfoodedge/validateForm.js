/* Filename: validateReg.js
   Target html: registration.html 
   Purpose: Validation through JavaScript
   Author: Joanna Wong Wei Jen
   Date written: 4/10/2020
*/

//Validates data, and if data is valid, store them into the sessionStorage

//var errMsg="";






/*Check for the second time to see if input qualifies in terms of pattern */
function validateName(){
	 // Validate name input
	var name_correct = true;
	
	var firstName = document.forms["registration-form"]["firstname"].value;
	var lastName = document.forms["registration-form"]["lastname"].value;
	var pattern =/^[a-zA-Z ]+$/;
	
	// Gives false when name input is empty
	if(firstName==""||lastName==""){ 
		if(firstName==""){ 
	
			name_correct=false;
			
			setErrorFor("fnamemessage", "<i class='fa fa-exclamation-circle'></i>"+" Field cannot be empty.");
		}
		if(lastName==""){ 
			
			name_correct=false;
			
			setErrorFor("lnamemessage", "<i class='fa fa-exclamation-circle'></i>"+" Field cannot be empty.");
		}
	}
	// Returns false when name input does not match the pattern
	else{
		if(!pattern.test(firstName) || !pattern.test(lastName) )
			if(!pattern.test(firstName)){ 
			
			name_correct= false;
			
			setErrorFor("fnamemessage", "<i class='fa fa-exclamation-circle'></i>"+" Invalid name.");
			
			}
			if(!pattern.test(lastName)){ 
				
				name_correct= false;
				
				setErrorFor("lnamemessage", "<i class='fa fa-exclamation-circle'></i>"+" Invalid name.");
			}
		
	}
	return name_correct;
}
	
function validateEmail() {  
	//var email = document.getElementById("email").value.trim();
	var email = document.forms["registration-form"]["email"].value;
	var email_correct = true; 
	var pattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
	
	
	if(email==""){
		
		email_correct=false;
		
		setErrorFor("email-message", "<i class='fa fa-exclamation-circle'></i>"+" Email field cannot be empty.");
	}
	else if (!pattern.test(email)){
		
		setErrorFor("email-message","<i class='fa fa-exclamation-circle'></i>"+" Please enter a valid email .");
		
		email_correct = false;
	}
    return email_correct;
}

function validatePassword() {  

	var password = document.forms["registration-form"]["password"].value;
	
	var cpassword = document.forms["registration-form"]["conpassword"].value;
	
	var password_correct = true; 
	var pattern = /[a-zA-Z0-9!@#\$%\^\&*+=\._-]{8,}/;
	
	if(password=="" || cpassword==""){
		if(password==""){
			
			password_correct=false;
			
			setErrorFor("pword-message", "<i class='fa fa-exclamation-circle'></i>"+" Password field cannot be empty.");
		}
		if(cpassword==""){
			//errMsg += "Confirm Password field cannot be empty.\n";
			password_correct=false;
			
			setErrorFor("cpword-message", "<i class='fa fa-exclamation-circle'></i>"+" Confirm password field cannot be empty.");
		}
	}
	else{
		if (!pattern.test(password)||!pattern.test(cpassword)){
			if (!pattern.test(password)){
			
			password_correct = false;
			setErrorFor("pword-message", "<i class='fa fa-exclamation-circle'></i>"+" Please enter a valid password(must contain at least one uppercase or lowercase or digit or at least one special character (all at least 9 letters without spacing)");
			}
			if (!pattern.test(cpassword)){
			
			password_correct = false;
			setErrorFor("cpword-message", "<i class='fa fa-exclamation-circle'></i>"+" Please enter a valid password(must contain at least one uppercase or lowercase or digit or at least one special character (all at least 9 letters without spacing)");
			}
			
			
		}
		
		else{
			if(password!=cpassword){
			
				password_correct=false;
				setErrorFor("pword-message", "<i class='fa fa-exclamation-circle'></i>"+" Password and Confirm Password field values are not equal.");
				setErrorFor("cpword-message","<i class='fa fa-exclamation-circle'></i>"+" Password and Confirm Password field values are not equal.");
			}
			
		}
			
	}	
	return password_correct;
}

function validatePhoneNumber() {
	
	var phonenumber = document.forms["registration-form"]["telephone"].value;
	
	var pattern = /^(01)[0-9]{7}$/;  
	var phonenumber_correct = true;
	
	if(phonenumber==""){
		//errMsg += "Please enter your phone number.\n";
		phonenumber_correct = false;
		setErrorFor("phone-message","<i class='fa fa-exclamation-circle'></i>"+" Phone number field cannot be empty.");		
	}
	else if (!pattern.test(phonenumber)){  
		//errMsg += "Invalid phone number.\n";
		phonenumber_correct = false;
		setErrorFor("phone-message", "<i class='fa fa-exclamation-circle'></i>"+" Invalid phone number");	
	} 

	return phonenumber_correct;
}

function validateAnswer(){

	var answer = document.getElementById("secAns").value;
	var answer_filled=true;
	//var answer = document.forms["registration-form"]["secAns"].value;
	
	if(answer==""){
	
		answer_filled= false;
	
		setErrorFor("secAns-message", "<i class='fa fa-exclamation-circle'></i>"+" Answer Field must not be empty");
	}
	
	return answer_filled;
}

function validateUserAccount(){
   var user_valid = false;  
   var uemail_valid= validateEmail();
   var upassword_valid = validatePassword();
   
   
   
   if (uemail_valid && upassword_valid){
      user_valid = true;
   }
   else{
	  alert(errMsg);
	  errMsg = "";
	  user_valid = false;
   }
   return user_valid;
}

function validateEmailRecovery(){
   var email_recov_valid= validateEmail();

   if (uemail_valid){
      user_recov_valid = true;
   }
   else{
	  alert(errMsg);
	  errMsg = "";
	  user_recov_valid = false;
   }
   return user_recov_valid;
}



function ifAnsCorrect(){
   var uanswer_valid = validateAnswer();

   if (uanswer_valid){
      uanswer_valid = true;
   }
   else{
	  alert(errMsg);
	  errMsg = "";
	  uanswer_valid = false;
   }
   return uanswer_valid;
}

function ifInputInfoValid() {  // To validate the form
	setErrorFor("fnamemessage","");
	setErrorFor("lnamemessage","");
	setErrorFor("email-message","");
	setErrorFor("pword-message","");
	setErrorFor("cpword-message","");
	setErrorFor("phone-message","");
	setErrorFor("secAns-message","");
	
	var all_valid = false;  
	var name_valid = validateName();
	var email_valid= validateEmail();
	var password_valid = validatePassword();
	var phonenumber_valid = validatePhoneNumber();
	var answer_valid = validateAnswer();
   
   
   if (name_valid &&email_valid&&password_valid&&phonenumber_valid&&answer_valid){
      all_valid = true;
   }
   else{ 
	  /*errMsg = "";*/
	  all_valid = false;
   }
   return all_valid;
}

function setErrorFor(smallId,message){
	
	var small= document.getElementById(smallId);
	small.innerHTML=message;
	/*var registrationUnit=test.parentElement;
	registrationUnit.className='registration-unit error';*/
}





