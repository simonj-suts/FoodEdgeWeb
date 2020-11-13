var nameerrorMessage = "";
var emailerrorMessage = "";
var addresserrorMessage = "";
var cnameerrorMessage = "";
var cnumerrorMessage = "";
var cmontherrorMessage = "";
var cyearerrorMessage = "";
var cvverrorMessage = "";

function checkname() {
    var name = document.getElementById("fname").value;
    var nameregex = /^[a-zA-Z ]+$/;
    var nameregexresult = nameregex.test(name);
    var namevalid = true;
    if (name == "") {
        nameerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Name must be filled out.\n";
        namevalid = false;
    } else if (nameregexresult == false) {
        nameerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid name.\n";
        namevalid = false;
    }
    return namevalid;
}

function checkemail() {
    var email = document.getElementById("femail").value;
    var emailregex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var emailregexresult = emailregex.test(email);
    var emailvalid = true;

    if (email == "") {
        emailerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Email must be filled out.\n";
        emailvalid = false;
    } else if (emailregexresult == false) {
        emailerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid email.\n";
        emailvalid = false;
    }

    return emailvalid;
}

function checkaddress() {
    var add = document.getElementById("fadd").value;
    var addvalid = true;
    if (add == "") {
        addresserrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Address must be filled out.\n";
        addvalid = false;
    }
    return addvalid;
}

function checkcname() {
    var cname = document.getElementById("cardname").value;
    var cnameregex = /^[a-zA-Z ]+$/;
    var cnameregexresult = cnameregex.test(cname);
    var cnamevalid = true;
    if (cname == "") {
        cnameerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Name on Card must be filled out.\n";
        cnamevalid = false;
    } else if (cnameregexresult == false) {
        cnameerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid Name on Card.\n";
        cnamevalid = false;
    }
    return cnamevalid;
}

function checkcnum() {
    var cnum = document.getElementById("cardnum").value;
    var cnumregex = /^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/;
    var cnumregexresult = cnumregex.test(cnum);
    var cnumvalid = true;

    if (cnum == "") {
        cnumerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Card number must be filled out.\n";
        cnumvalid = false;
    } else if (cnumregexresult == false) {
        cnumerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid Card number.\n";
        cnumvalid = false;
    }
    return cnumvalid;
}

function checkmonth() {
    var cmonth = document.getElementById("cardmonth").value;
    var cmonthregex = /^(0?[1-9]|1[012])$/;
    var cmonthregexresult = cmonthregex.test(cmonth);
    var cmonthvalid = true;

    if (cmonth == "") {
        cmontherrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Card expire month must be filled out.\n";
        cmonthvalid = false;
    } else if (cmonthregexresult == false) {
        cmontherrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid Card expire month.\n";
        cmonthvalid = false;
    }
    return cmonthvalid;
}

function checkyear() {
    var cyear = document.getElementById("cardyear").value;
    var cyearregex = /^[0-9]{4}$/;
    var cyearregexresult = cyearregex.test(cyear);
    var cyearvalid = true;

    if (cyear == "") {
        cyearerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Card expire year must be filled out.\n";
        cyearvalid = false;
    } else if (cyearregexresult == false) {
        cyearerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid Card expire year.\n";
        cyearvalid = false;
    }
    return cyearvalid;
}

function checkcvv() {
    var cvv = document.getElementById("cvv").value;
    var cvvregex = /^[0-9]{3}$/;
    var cvvregexresult = cvvregex.test(cvv);
    var cvvvalid = true;

    if (cvv == "") {
        cvverrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "CVV must be filled out.\n";
        cvvvalid = false;
    } else if (cvvregexresult == false) {
        cvverrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid CVV.\n";
        cvvvalid = false;
    }
    return cvvvalid;
}

function validateForm() {
    displayError("nameerror", "")
    displayError("emailerror", "")
    displayError("adderror", "")
    displayError("cnameerror", "")
    displayError("cnumerror", "")
    displayError("cmontherror", "")
    displayError("cyearerror", "")
    displayError("cvverror", "")
    var formvalid = false;
    var nameOk = checkname();
    var emailOk = checkemail();
    var addoOk = checkaddress();
    var cnameOk = checkcname();
    var cnumOk = checkcnum();
    var cmonthOk = checkmonth();
    var cyearOk = checkyear();
    var cvvOk = checkcvv();

    if(nameOk == false){
        displayError("nameerror", nameerrorMessage);
    }
    if(emailOk == false){
        displayError("emailerror", emailerrorMessage);
    }
    if(addoOk == false){
        displayError("adderror", addresserrorMessage);
    }
    if(cnameOk == false){
        displayError("cnameerror", cnameerrorMessage);
    }
    if(cnumOk == false){
        displayError("cnumerror", cnumerrorMessage);
    }
    if(cmonthOk == false){
        displayError("cmontherror", cmontherrorMessage);
    }
    if(cyearOk == false){
        displayError("cyearerror", cyearerrorMessage);
    }
    if(cvvOk == false){
        displayError("cvverror", cvverrorMessage);
    }

    if (nameOk && emailOk && addoOk && cnameOk && cnumOk && cmonthOk && cyearOk && cvvOk) {
        formvalid = true;
    } else {
        formvalid = false;
    }
    return formvalid;
}

function displayError(id, output) {
    var test = document.getElementById(id);
    test.innerHTML = output;
}

