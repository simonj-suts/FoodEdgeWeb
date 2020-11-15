function checkForm(){
	var timecheck = false;
	var eventdatecheck = false;
	var addresscheck = false;
	var occasioncheck = false;
	var packagecheck = false;
	var time = document.forms["bookingform"]["time"].value;
	var address = document.forms["bookingform"]["address"].value;
	var eventdate = document.forms["bookingform"]["eventdate"].value;
	var occasion = document.forms["bookingform"]["occasion"].value;
	var package_ = document.forms["bookingform"]["package"].value;

	displayError("timeappear", "");
	displayError("addressappear", "");
	displayError("occasionappear", "");
	displayError("dateappear", "");
	displayError("packageappear", "");

	if (time == "") {
		displayError("timeappear", "<i class='fas fa-exclamation-circle'></i>" + " Please select your time");
	}else{
		timecheck = true;
	}
	
	if (address == "") {
		displayError("addressappear", "<i class='fas fa-exclamation-circle'></i>" + " Address must be filled out");
	}else{
		addresscheck = true;
	}
	
	if (eventdate == "") {
		displayError("dateappear", "<i class='fas fa-exclamation-circle'></i>" + " Please include the date of the event");
	}else{
		var ToDate = new Date();
		if(new Date(eventdate).getTime() <= ToDate.getTime()){
			displayError("dateappear", "<i class='fas fa-exclamation-circle'></i>" + "The date must be bigger or equal to today's date");
		}
		else{
			eventdatecheck = true;
		}
	}
	
	if (occasion == "") {
		displayError("occasionappear", "<i class='fas fa-exclamation-circle'></i>" + " Please select the occasion of the event");
	}else{
		occasioncheck = true;
	}
	
	if(package_ == ""){
		displayError("packageappear", "<i class='fas fa-exclamation-circle'></i>" + " Please select one of the packages");
	}else{
		packagecheck = true;
	}
	
	if(timecheck && addresscheck && eventdatecheck && occasioncheck && packagecheck == true)
	{
		return true;
	}
	else{
		return false;
	}
}

function displayError(small, output){
	var test = document.getElementById(small);
	test.innerHTML = output;
}
