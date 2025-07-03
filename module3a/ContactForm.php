<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Contact Me</title>
    </head>
    <body>
<?php

//Function to validate general output fields
function validateInput($data, $fieldName): string{
    global $errorCount; //Access Global error count

    if (empty($data)) {
        //field is empty display error and increment error
        echo "\"$fieldName\" is a required field. <br/>";
        ++ $errorCount;
        $retval = "";
    } else {
        //clean input: trim whitespace and remove backslashes
        $retval = trim(string: $data);
        $retval = stripslashes(string: $retval);
    }
    return($retval); //return the clean-up value
}
//function to validate email address
function validateEmail($data, $fieldName): mixed {
    global $errorCount;

    if (empty($data)) {
        //email is missing
        echo "\"$fieldName\" is a required field.<br/>>\n";
        ++ $errorCount;
        $retval = " ";
    } else {
        //sanitize and validate email format
        $retval = filter_var(value: $data, filter: FILTER_SANITIZE_EMAIL);
        if(!filter_var(value: $retval, filter: FILTER_VALIDATE_EMAIL)){
            echo "\"$fieldName\" is not a valid e-mail address. <br/>\n";
            ++ $errorCount;
        }
    }
    return($retval);
}

//Function to display the form and preserve entered values (sticky form)
function displayForm($Sender, $Email, $Subject, $Message): void {
?>
<form action="ContactForm.php" method="post">
<p><label for="Sender">Your Name:</label>
<input type="text" name="Sender" value="<?php echo htmlentities(string: $Sender); ?>"></p>

<p><label for="Email">Your E-mail:</label>
<input type="text" name="Email" value="<?php echo htmlentities(string: $Email); ?>"></p>

<p><label for="Subject">Subject:</label>
<input type="text" name="Subject" value="<?php echo htmlentities(string: $Subject); ?>"></p>

<p><label for="Message">Message:</label><br>
<textarea name="Message" rows="5" cols="40"><?php echo htmlentities(string: $Message); ?></textarea></p>

<p><input type="submit" name="Submit" value="Send Message"></p>
</form>
<?php
}
//Initialization
$ShowForm = true; //Flag to control form display
$errorCount = 0;
$Sender = $Email = $Subject = $Message = ""; //Initialize all form field variables

//Form Processing
if (isset($_POST['Submit'])){
    //Validate each field
    $Sender = validateInput(data: $_POST['Sender'], fieldName: "Your Name");
    $Email = validateEmail(data: $_POST['Email'], fieldName: "Your E-Mail");
    $Subject = validateInput(data: $_POST['Subject'], fieldName: "Subject");
    $Message = validateInput(data: $_POST['Message'], fieldName: "Message");
}

//if there are no errors, we don't need to show the form again
if($errorCount == 0 && isset($_POST['Submit'])){
    $ShowForm = false;
} else {
    $ShowForm = true;
}
if($ShowForm == true){
    //If there are errors or it is the first time form is being accessed
    if($errorCount > 0){
        echo "<p>Please re-enter the form information below</p>\n";
        displayForm(Sender: $Sender, Email: $Email, Subject: $Subject, Message: $Message);
    } else {
        displayForm(Sender: $Sender, Email: $Email, Subject: $Subject, Message: $Message);
    }
} else {
    //Prepare email header and send message
    $SenderAddress = "$Sender <$Email>";
    $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

    $result = mail(to: "recipient@example.com", subject: $Subject, message: $Message, additional_headers: $Headers);

    //display result to the user
    if($result){
        echo "<p>Your message has been sent. Thank you, " . htmlentities(string: $Sender) . ".</p>\n";
    } else {
        echo "<p>There was an error sending your message, " . htmlentities(string: $Sender) . ".</p>\n";
    }
}
/*
There was a few problems I had to check one by one with a little lightbulb
mainly missing brackets and misspelling text, writing something twice, also typo in spelling
contact I spelled it contract so I had to rename file as my link wasnt working
once I fixed those the form loaded properly
*/
?>

    </body>
</html>
