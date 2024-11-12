<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input to avoid XSS and other security issues
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Set recipient email addresses (replace with actual email addresses)
    $to = "khalifa@urfitave.com, moebinalsh@gmail.com";  // Update this with your actual email addresses
    $subject = "Contact Form Submission from $name";

    // Set headers to ensure the email is properly formatted
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Message:\n$message\n";

    // Send the email using PHP's mail() function
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    echo "Invalid request.";
}
?>
