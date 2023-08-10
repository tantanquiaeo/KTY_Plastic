<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Get form data
$senderEmail = $_POST['senderEmail'];
$customerName = $_POST['customerName'];
$contactNumber = $_POST['contactNumber'];
$pouchType = $_POST['pouchType'];
$materialType = $_POST['materialType'];
$thickness = $_POST['thickness'];
$size = $_POST['size'];
$orderQuantity = $_POST['orderQuantity'];
$haveDesign = isset($_POST['haveDesignCheckbox']) ? 'Yes' : 'No';

// Read the content of the email template file
$emailTemplatePath = 'template.php'; // Replace with the actual path
$emailContent = file_get_contents($emailTemplatePath);

// Replace placeholders with actual values
$placeholders = array(
    '$customerName' => $customerName,
    '$contactNumber' => $contactNumber,
    '$pouchType' => $pouchType,
    '$orderQuantity' => $orderQuantity,
    '$haveDesign' => $haveDesign,
    '$materialType' => $materialType,
    '$thickness' => $thickness,
    '$size' => $size,
);

foreach ($placeholders as $placeholder => $value) {
    $emailContent = str_replace($placeholder, $value, $emailContent);
}


$mail = new \PHPMailer\PHPMailer\PHPMailer();


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ktyplastic@gmail.com';
$mail->Password = 'loqxsdjykargjngu';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;


$mail->setFrom('ctquia-eo.ccit@unp.edu.ph', $customerName);
$mail->addAddress('cyrustristanquiaeo@gmail.com', 'Recipient Name');
$mail->isHTML(true);
$mail->Subject = 'Quote Request from ' . $customerName;
$mail->Body = $emailContent;

// Upload the image
if ($_FILES['printDesign']['error'] === UPLOAD_ERR_OK) {
    $imageTempPath = $_FILES['printDesign']['tmp_name'];
    $imageFileName = $_FILES['printDesign']['name'];
    
    // Provide the path where you want to save the uploaded image
    $targetImagePath = 'uploads/' . $imageFileName;
    
    if (move_uploaded_file($imageTempPath, $targetImagePath)) {
        // Image uploaded successfully, now proceed to send the email
        
        // ... (remaining code)
        
        // Add image attachment
        $mail->addAttachment($targetImagePath);
    }}
    
// Send email
if ($mail->send()) {
    // Delete the uploaded image after sending the email
    if (isset($targetImagePath) && file_exists($targetImagePath)) {
        unlink($targetImagePath);
    }

    // Redirect to index.html
    echo '<script>alert("Email sent successfully!"); window.location.href = "../index.html";</script>';
    exit(); // Ensure that the script stops here
} else {
    echo 'Email could not be sent';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


?>


