<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email address (the business email)
    $to = "qcharmzone@protonmail.com"; // Change this to your business email address

    // Email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Email content
    $email_body = "
    Name: $name\n
    Email: $email\n
    Subject: $subject\n
    Message:\n$message
    ";

    // Email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again.";
    }
}
?>
