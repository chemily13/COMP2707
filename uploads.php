<?php

// PHP code for the upload file button on the resources page.

$targetDirectory = "uploads/"; // Directory where uploaded files will be stored. In the same folder as the webpage
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); // Path to the uploaded file in the directory above.

// Check if file has been uploaded
if(isset($_POST["submit"])) {
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size 
    if ($_FILES["fileToUpload"]["size"] > 100000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // What file formats are allowed to be uploaded
    $allowedExtensions = array("jpg", "jpeg", "png", "pdf");
    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Sorry, only JPG, JPEG, PNG, and PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error and lets user know the file was not uploaded.
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Sends email notification to the department when user submits an email on the webiste.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get information the user has input into the form element on the webpage
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // This sets up who the email is sent to and fills in the elements of the email so the recipient can recieve what was sent.
    $to = "addisone@uwindsor.ca"; // Sends an email to the department. I set this to my own email to ensure this works.
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send an email to the user that their email was sent or if the email cannot be sent due to an error the user will get an error message.
    if (mail($to, $subject, $body)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
}
?>