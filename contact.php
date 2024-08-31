<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);


    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $to = "your-email@example.com";  
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $email_subject = "New Contact Form Submission: $subject";
        $email_body = "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Message:\n$message\n";

        if (mail($to, $email_subject, $email_body, $headers)) {
            echo "Thank you for contacting us. We will get back to you shortly.";
        } else {
            echo "There was a problem sending your message. Please try again later.";
        }
    } else {
        echo "Please fill in all fields and provide a valid email address.";
    }
} else {
    echo "Invalid request method.";
}
?>
