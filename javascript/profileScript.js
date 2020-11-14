window.onload = function(){
    if (sessionStorage.getItem("defaultpage") == "order"){
        displayOrder();
    }
    sessionStorage.setItem("defaultpage", "info");
}

function displayProfile(){
    var infoButton = document.getElementById("profile-info-button");
    var orderButton = document.getElementById("profile-order-button");
    var infoContent = document.getElementById("profile-info");
    var orderContent= document.getElementById("profile-order");

    //infoButton.style.backgroundColor="";
    //orderButton.style.backgroundColor="";
    infoContent.style.display="block";
    orderContent.style.display="none";
}

function displayOrder(){
    var infoButton = document.getElementById("profile-info-button");
    var orderButton = document.getElementById("profile-order-button");
    var infoContent = document.getElementById("profile-info");
    var orderContent= document.getElementById("profile-order");

    //infoButton.style.backgroundColor="";
    //orderButton.style.backgroundColor="";
    infoContent.style.display="none";
    orderContent.style.display="block";
}

function editButton(fieldName){
    var editButton = document.getElementById("edit-"+fieldName);
    var confirmButton = document.getElementById("confirm-"+fieldName);
    var cancelButton = document.getElementById("cancel-"+fieldName);
    var inputField = document.getElementById("input-"+fieldName);

    editButton.style.display = "none";
    inputField.style.display = "inline";
    confirmButton.style.display = "block";
    cancelButton.style.display = "block";
}

function cancelButton(fieldName){
    var editButton = document.getElementById("edit-"+fieldName);
    var confirmButton = document.getElementById("confirm-"+fieldName);
    var cancelButton = document.getElementById("cancel-"+fieldName);
    var inputField = document.getElementById("input-"+fieldName);

    editButton.style.display = "block";
    inputField.style.display = "none";
    confirmButton.style.display = "none";
    cancelButton.style.display = "none";
}

function confirmButton(fieldName){
    var popUpBox = document.getElementById("popUpBox-"+fieldName);

    popUpBox.style.display = "block";
}

function resetButton(fieldName){
    var popUpBox = document.getElementById("popUpBox-"+fieldName);

    popUpBox.style.display = "none";
}