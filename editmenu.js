var errorMessage = "";

function checkname() {
    var name = document.getElementById("packagename").value;
    var nameregex = /^[a-zA-Z ]+$/;
    var nameregexresult = nameregex.test(name);
    var namevalid = true;
    if (name == "") {
        errorMessage = errorMessage + "Package Name must be filled out.\n";
        namevalid = false;
    } else if (nameregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid package name.\n";
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
        errorMessage = errorMessage + "Package cuisine must be filled out.\n";
        cuisinevalid = false;
    } else if (cuisineregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid package cuisine.\n";
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
        errorMessage = errorMessage + "Pax must be filled out.\n";
        paxvalid = false;
    } else if (paxregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid pax number.\n";
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
        errorMessage = errorMessage + "Price must be filled out.\n";
        pricevalid = false;
    } else if (priceregexresult == false) {
        errorMessage = errorMessage + "Please enter a valid price.\n";
        pricevalid = false;
    }
    return pricevalid;
}

function checkdesc() {
    var desc = document.getElementById("packagedesc").value;
    var descvalid = true;
    if (desc == "") {
        errorMessage = errorMessage + "Package description must be filled out.\n";
        descvalid = false;
    }
    return descvalid;
}

function validateForm() {
    var formvalid = false;
    var nameOk = checkname();
    var cuisineOk = checkcuisine();
    var paxOk = checkpax();
    var priceOk = checkprice();
    var descOk = checkdesc();


    if (nameOk && cuisineOk && paxOk && priceOk && descOk) {
        formvalid = true;
    } else {
        alert(errorMessage);
        errorMessage = "";
        formvalid = false;
    }
    return formvalid;
}