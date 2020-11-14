<h2>Account Information</h2>
<div id="dimScreen"></div>
<?php
    function formInput($fieldName, $fieldValue){
        $fieldNameStripped = preg_replace('/\s+/', '', $fieldName);
        $editButtonID = "edit-".$fieldNameStripped;
        $confirmButtonID = "confirm-".$fieldNameStripped;
        $cancelButtonID = "cancel-".$fieldNameStripped;
        $resetButtonID = "reset-".$fieldNameStripped;
        $inputFieldID = "input-".$fieldNameStripped;
        $fieldValueID = "value-".$fieldNameStripped;
        $popUpBoxID = "popUpBox-".$fieldNameStripped;


        echo '<form action="profileupdate.php" method="post">';
            echo '<table>';
                echo '<td class="pInfo-field-name">'.$fieldName.'</td> ';
                echo '<td>';
                    echo '<span id="'.$fieldValueID.'" class="pInfo-field-value">'.$fieldValue.'</span>';
                    echo '<input type="text" name="'.$fieldValueID.'" required="required" class="pInfo-field-input" id="'.$inputFieldID.'">'; //hidden
                echo '</td>';
            echo '</table>';

            echo '<div class="pInfo-form-buttons">';
                echo '<button type="button" class="edit-button" id="'.$editButtonID.'" onclick="editButton(\''.$fieldNameStripped.'\')">Edit</button>';
                echo '<button type="button" class="confirm-button" id="'.$confirmButtonID.'" onclick="confirmButton(\''.$fieldNameStripped.'\')">Confirm</button>'; // hidden
                echo '<button type="button" class="cancel-button" id="'.$cancelButtonID.'" onclick="cancelButton(\''.$fieldNameStripped.'\')">Cancel</button>';  // hidden
            echo '</div>';

            /* hidden */
            echo '<div class="pInfo-popUpBox" id="'.$popUpBoxID.'">';
                echo '<h3>Changing '.$fieldName.'</h3>';
                echo '<p>Please enter your password to confirm your changes</p>';
                echo '<p>Password: <input type="password" name="pass" required="required"></p>';
                echo '<button class="confirm-button">Submit</button>';
                echo '<button type="reset" class="cancel-button" onclick="resetButton(\''.$fieldNameStripped.'\')">Cancel</button>';
            echo '</div>';

            echo '<input type="hidden" name="formName" value="'.$fieldNameStripped.'">';
        echo '</form>';
    }

    formInput("First Name",$user->getCustomerFirstName());
    formInput("Last Name",$user->getCustomerLastName());
    formInput("Email",$user->getEmail());
    formInput("Phone Number",$user->getPhoneNo());
?>