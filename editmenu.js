var nameerrorMessage = "";
var cuisineerrorMessage = "";
var paxerrorMessage = "";
var priceerrorMessage = "";
var descerrorMessage = "";


function checkname() {
    var name = document.getElementById("packagename").value;
    var nameregex = /^[a-zA-Z ]+$/;
    var nameregexresult = nameregex.test(name);
    var namevalid = true;
    if (name == "") {
        nameerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Package Name must be filled out.";
        namevalid = false;
    } else if (nameregexresult == false) {
        nameerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid package name.";
        namevalid = false;
    }
    return namevalid;
}

function checkcuisine() {
    var cuisine = document.getElementById("packagecuisine").value;
    var cuisineregex = /^[a-zA-Z ]+$/;
    var cuisineregexresult = cuisineregex.test(cuisine);
    var cuisinevalid = true;
    if (cuisine == "") {
        cuisineerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Package cuisine must be filled out.";
        cuisinevalid = false;
    } else if (cuisineregexresult == false) {
        cuisineerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid package cuisine.";
        cuisinevalid = false;
    }
    return cuisinevalid;
}

function checkpax() {
    var pax = document.getElementById("packagepax").value;
    var paxregex = /^[0-9]{2}|[0-9]{3}$/;
    var paxregexresult = paxregex.test(pax);
    var paxvalid = true;

    if (pax == "") {
        paxerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Pax must be filled out.";
        paxvalid = false;
    } else if (paxregexresult == false) {
        paxerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid pax number.";
        paxvalid = false;
    }
    return paxvalid;
}

function checkprice() {
    var price = document.getElementById("packageprice").value;
    var priceregex = /^\d{1,3}(,?\d{3})*(\.\d{1,2})?$/;
    var priceregexresult = priceregex.test(price);
    var pricevalid = true;

    if (price == "") {
        priceerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Price must be filled out.";
        pricevalid = false;
    } else if (priceregexresult == false) {
        priceerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Please enter a valid price.";
        pricevalid = false;
    }
    return pricevalid;
}

function checkdesc() {
    var desc = document.getElementById("packagedesc").value;
    var descvalid = true;
    if (desc == "") {
        descerrorMessage = "<i class='fa fa-exclamation-circle'></i>" + "Package description must be filled out.";
        descvalid = false;
    }
    return descvalid;
}

function validateForm() {
    displayError("nameerror", "")
    displayError("cuisineerror", "")
    displayError("paxerror", "")
    displayError("priceerror", "")
    displayError("descerror", "")
    var formvalid = false;
    var nameOk = checkname();
    var cuisineOk = checkcuisine();
    var paxOk = checkpax();
    var priceOk = checkprice();
    var descOk = checkdesc();

    if (nameOk == false) {
        displayError("nameerror", nameerrorMessage);
    }
    if (cuisineOk == false) {
        displayError("cuisineerror", cuisineerrorMessage);
    }
    if (paxOk == false) {
        displayError("paxerror", paxerrorMessage);
    }
    if (priceOk == false) {
        displayError("priceerror", priceerrorMessage);
    }
    if (descOk == false) {
        displayError("descerror", descerrorMessage);
    }

    if (nameOk && cuisineOk && paxOk && priceOk && descOk) {
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