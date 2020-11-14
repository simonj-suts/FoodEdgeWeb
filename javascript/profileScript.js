window.onload = function(){
    if (sessionStorage.getItem("defaultpage") == "order"){
        displayOrder();
    }
    sessionStorage.setItem("defaultpage", "info");
}

/* Check for mactching password */
var check = function() {
    if  (document.getElementById('newPass').value || document.getElementById('confPass').value){
        if (document.getElementById('newPass').value == document.getElementById('confPass').value) {
            document.getElementById('matchMsg').style.color = 'green';
            document.getElementById('matchMsg').innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> matching';
        } else {
            document.getElementById('matchMsg').style.color = 'red';
            document.getElementById('matchMsg').innerHTML = '<i class="fa fa-times" aria-hidden="true"></i> not matching';
        }
    } else {
            document.getElementById('matchMsg').innerHTML = '';
    }
}

function setDefaultPage(){
    if (confirm('Are you sure you want to change your order status?')){
        sessionStorage.setItem("defaultpage", "order");
        return true;
    } else {
        return false;
    }
}

function displayProfile(){
    var infoButton = document.getElementById("profile-info-button");
    var orderButton = document.getElementById("profile-order-button");
    var infoContent = document.getElementById("profile-info");
    var orderContent= document.getElementById("profile-order");

    infoButton.style.textDecoration = "underline";
    orderButton.style.textDecoration = "none";
    infoContent.style.display="block";
    orderContent.style.display="none";
}

function displayOrder(){
    var infoButton = document.getElementById("profile-info-button");
    var orderButton = document.getElementById("profile-order-button");
    var infoContent = document.getElementById("profile-info");
    var orderContent= document.getElementById("profile-order");

    infoButton.style.textDecoration = "none";
    orderButton.style.textDecoration = "underline";
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
    confirmButton.style.display = "inline-block";
    cancelButton.style.display = "inline-block";
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

function validatePassword(){
    var currPass = document.forms['changePassword']['currPass'].value;
    var newPass = document.forms['changePassword']['newPass'].value;
    var confPass = document.forms['changePassword']['confPass'].value;

    if (currPass && newPass && confPass){
        if (newPass==confPass){
            confirm('Confirm change password?');
            return true;
        } else {
            alert('New password and Confirm password does not match.');
            return false;
        }
    } else{
        alert('Invalid input. You must fill in all the password fields.');
        return false;
    }
}