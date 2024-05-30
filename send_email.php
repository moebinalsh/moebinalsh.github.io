if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"]; // Added phone number field
    $message = $_POST["message"];

    // Set your email address where you want to receive messages.
    $to = "admin@urfitave.com";
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email";

    // Compose the email message.
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n"; // Include phone number in the message
    $email_message .= "Message:\n$message";

    // Send the email.
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    echo "Access denied.";
}
