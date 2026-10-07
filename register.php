<?php

// =====================================================
// REGISTER FORM - GODREJ PROPERTIES HOME FEST 2026
// =====================================================

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}


// =====================================================
// GET FORM DATA
// =====================================================

$name = isset($_POST['name'])
    ? trim($_POST['name'])
    : '';

$phone = isset($_POST['phone'])
    ? trim($_POST['phone'])
    : '';



$visit_date = isset($_POST['visit_date'])
    ? trim($_POST['visit_date'])
    : '';


// =====================================================
// VALIDATION
// =====================================================

if ($name === '' || $phone === '' || $visit_date === '') {
    exit('Please fill all required fields.');
}




// =====================================================
// EMAIL CONFIGURATION
// =====================================================

$to = "your-email@example.com";

$subject = "Godrej Home Fest 2026 Registration - " . $name;


// =====================================================
// EMAIL BODY
// =====================================================

$message = "
New Home Fest 2026 Registration

----------------------------------------

Name:
$name

Phone:
$phone



Preferred Visit Date:
$visit_date

----------------------------------------

Event:
GODREJ PROPERTIES HOME FEST 2026

Date:
17 & 18 October 2026

Venue:
JW Marriott, Jaipur

----------------------------------------
";


// =====================================================
// EMAIL HEADERS
// =====================================================

$headers = "From: Website Registration <noreply@yourdomain.com>\r\n";
$headers .= "Reply-To: " . $name . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";


// =====================================================
// SEND EMAIL
// =====================================================

if (mail($to, $subject, $message, $headers)) {

    // Redirect back to website
    header("Location: thank-you.html");
    exit;

} else {

    http_response_code(500);
    exit("Sorry, something went wrong. Please try again.");
}
?>