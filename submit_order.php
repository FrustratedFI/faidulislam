<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $item = $_POST['item'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Email recipient
    $to = "faidthegamer67@gmail.com"; // Your email address
    $subject = "New Order - Faidul Islam Merchandise";

    // Email content
    $message = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <h2>New Order Details</h2>
        <p><strong>Item:</strong> $item</p>
        <p><strong>Size:</strong> $size</p>
        <p><strong>Quantity:</strong> $quantity</p>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Shipping Address:</strong><br>$address</p>
    </body>
    </html>
    ";

    // Set content-type header for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: no-reply@faidulislam.com" . "\r\n";  // Replace with your own domain if you have one
    $headers .= "Reply-To: $email" . "\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Thank you for your order!'); window.location.href = 'thank_you.html';</script>";
    } else {
        echo "<script>alert('There was an error processing your order. Please try again later.'); window.location.href = 'order_form.html';</script>";
    }
}
?>
