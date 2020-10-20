var errorMessage = "";

function checkname() {
    var name = document.getElementById("fname").value;
    var nameregex = /^[a-zA-Z ]+$/;
    var nameregexresult = nameregex.test(name);
    var namevalid = true;
    if (name == "") {
        errorMessage = errorMessage + "Name must be filled out.\n";
        namevalid = false;
    } else if (nameregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid name.\n";
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
        errorMessage = errorMessage + "Email must be filled out.\n";
        emailvalid = false;
    } else if (emailregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid email.\n";
        emailvalid = false;
    }

    return emailvalid;
}

function checkaddress() {
    var add = document.getElementById("fadd").value;
    var addvalid = true;
    if (add == "") {
        errorMessage = errorMessage + "Address must be filled out.\n";
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
        errorMessage = errorMessage + "Name on Card must be filled out.\n";
        cnamevalid = false;
    } else if (cnameregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid Name on Card.\n";
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
        errorMessage = errorMessage + "Card number must be filled out.\n";
        cnumvalid = false;
    } else if (cnumregexresult == false){
        errorMessage = errorMessage + "Please enter a valid Card number.\n";
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
        errorMessage = errorMessage + "Card expire month must be filled out.\n";
        cmonthvalid = false;
    } else if (cmonthregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid Card expire month.\n";
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
        errorMessage = errorMessage + "Card expire year must be filled out.\n";
        cyearvalid = false;
    } else if (cyearregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid Card expire year.\n";
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
        errorMessage = errorMessage + "CVV must be filled out.\n";
        cvvvalid = false;
    } else if (cvvregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid CVV.\n";
        cvvvalid = false;
    }
    return cvvvalid;
}

function validateForm() {
    var formvalid = false;
    var nameOk = checkname();
    var emailOk = checkemail();
    var addoOk = checkaddress();
    var cnameOk = checkcname();
    var cnumOk = checkcnum();
    var cmonthOk = checkmonth();
    var cyearOk = checkyear();
    var cvvOk = checkcvv();


    if (nameOk && emailOk && addoOk && cnameOk && cnumOk && cmonthOk && cyearOk && cvvOk) {
        formvalid = true;
    } else {
        alert(errorMessage);
        errorMessage = "";
        formvalid = false;
    }
    return formvalid;
}


