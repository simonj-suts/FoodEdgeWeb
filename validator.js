
function checkForm(){
	var error = "";
	//var namecheck = false;
	var timecheck = false;
	var eventdatecheck = false;
	var addresscheck = false;
	var occasioncheck = false;
	var packagecheck = false;
	//var name = document.forms["bookingform"]["name"].value;
	var time = document.forms["bookingform"]["time"].value;
	var address = document.forms["bookingform"]["address"].value;
	var eventdate = document.forms["bookingform"]["eventdate"].value;
	var occasion = document.forms["bookingform"]["occasion"].value;
	var package_ = document.forms["bookingform"]["package"].value;
	
	//if (name == "") {
	//	error += "Name must be filled out\n";
	//}else{
	//	namecheck = true;
	//}
	
	if (time == "") {
		error += "Please select the time\n";
	}else{
		timecheck = true;
	}
	
	if (address == "") {
		error += "Address must be filled out\n";
	}else{
		addresscheck = true;
	}
	
	if (eventdate == "") {
		error += "Please include the date of the event\n";
	}else{
		eventdatecheck = true;
	}
	
	if (occasion == "") {
		error += "Please select the occasion of the event\n";
	}else{
		occasioncheck = true;
	}
	
	if(package_ == ""){
		error += "Please select one of the packages\n";
	}else{
		packagecheck = true;
	}
	
	if(timecheck && addresscheck && eventdatecheck && occasioncheck && packagecheck == true)
	{
		return true;
	}
	else{
		alert(error);
		return false;
	}
}

function resetForm(){
	
}

