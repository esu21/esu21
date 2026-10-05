<?php
// Contact form handler for Hostinger (PHP mail). Scheduling requests only:
// the form asks people not to send SSNs, Medicare numbers, or medical details.
$to = 'Info@MRDBenefitsConsulting.com';
$back = '/contact.html';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: $back");
    exit;
}

// Honeypot: bots fill this hidden field; pretend success and drop it.
if (!empty($_POST['website'])) {
    header("Location: $back?sent=1");
    exit;
}

function clean($value) {
    return trim(str_replace(["\r", "\n"], ' ', strip_tags($value ?? '')));
}

$name     = clean($_POST['name'] ?? '');
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$phone    = clean($_POST['phone'] ?? '');
$state    = clean($_POST['state'] ?? '');
$method   = clean($_POST['contact_method'] ?? '');
$interest = clean($_POST['interest'] ?? '');
$access   = clean($_POST['accommodations'] ?? '');
$message  = trim(strip_tags($_POST['message'] ?? ''));

if ($name === '' || !$email || $state === '' || $message === '') {
    header("Location: $back?sent=0");
    exit;
}

$subject = "Free consultation request from $name";
$body = "Name: $name\nEmail: $email\nPhone: $phone\nState during appointment: $state\n"
      . "Preferred contact: $method\nInterested in: $interest\nAccommodations/interpreter: $access\n\n"
      . "Message:\n$message\n";
$headers = "From: MRD Benefits Website <$to>\r\nReply-To: $email\r\n";

$ok = mail($to, $subject, $body, $headers);
header("Location: $back?sent=" . ($ok ? '1' : '0'));
exit;
