<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate form data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Recipient email
    $to = "basseyo991@gmail.com"; // Replace with your email

    // Email subject and body
    $email_subject = "Contact Form: $subject";
    $email_body = "You have received a new message from the contact form on your website.\n\n".
                  "Here are the details:\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message";

    // Email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
}
?>
