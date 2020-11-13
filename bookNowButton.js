 /* Filename: validateReg.js
   Target html: registration.html 
   Purpose: Button behaviour through JavaScript
   Author: Joanna Wong Wei Jen
   Date written: 11/11/2020
*/
var package_item = ["package1","package2","package3","package4","package5"];

function selectPackage(x){
	 sessionStorage.setItem("packageSelected",package_item[x])
	 
	
}

function selectRadio(){
	var packageSelected= sessionStorage.getItem("packageSelected");
	document.getElementById(packageSelected).checked=true;
	
}
