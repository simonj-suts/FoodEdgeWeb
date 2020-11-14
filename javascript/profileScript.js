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
    var fieldValue = document.getElementById("value-"+fieldName);

    editButton.style.display = "none";
    inputField.style.display = "inline";
    confirmButton.style.display = "block";
    cancelButton.style.display = "block";
    fieldValue.style.display = "none";
}

function cancelButton(fieldName){
    var editButton = document.getElementById("edit-"+fieldName);
    var confirmButton = document.getElementById("confirm-"+fieldName);
    var cancelButton = document.getElementById("cancel-"+fieldName);
    var inputField = document.getElementById("input-"+fieldName);
    var fieldValue = document.getElementById("value-"+fieldName);

    editButton.style.display = "block";
    inputField.style.display = "none";
    confirmButton.style.display = "none";
    cancelButton.style.display = "none";
    fieldValue.style.display = "block";
}

function confirmButton(fieldName){
    var popUpBox = document.getElementById("popUpBox-"+fieldName);
    var dimScreen = document.getElementById("dimScreen");

    document.body.style.pointerEvents = "none";
    dimScreen.style.display = "block";
    popUpBox.style.pointerEvents = "auto";
    popUpBox.style.display = "block";
    popUpBox.style.zIndex = "10";
}

function resetButton(fieldName){
    var popUpBox = document.getElementById("popUpBox-"+fieldName);
    var dimScreen = document.getElementById("dimScreen");

    document.body.style.pointerEvents = "auto";
    dimScreen.style.display = "none";
    popUpBox.style.display = "none";
    popUpBox.style.zIndex = "0";
}