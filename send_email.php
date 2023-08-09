<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture sender's email from the form data
    $senderEmail = $_POST['senderEmail'];

    // Recipients
    $to = 'cyrustristanquiaeo@gmail.com';
    $subject = 'Quote Request';

    // Email headers
    $headers = "From: $senderEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    // HTML content with image, table, and footer
    $htmlContent = '
        <div style="text-align: center;">
            <img src="path_to_your_image.jpg" alt="Image" width="200">
        </div>
        <h2>Quote Request</h2>
        <p>Sender\'s Email: ' . $senderEmail . '</p>
        <table>
            <!-- Your table rows here -->
        </table>
        <div style="text-align: center;">
            <p>Footer text here</p>
        </div>
    ';

    // Send email using mail() function
    $mailSent = mail($to, $subject, $htmlContent, $headers);

    if ($mailSent) {
        echo 'Email sent successfully';
    } else {
        echo 'Email could not be sent';
    }
} else {
    echo 'Invalid request';
}
?>
