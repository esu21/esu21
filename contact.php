<?php
// Simple contact form handler for Hostinger (PHP mail).
// TODO: Change $to to the inbox where you want to receive messages.
$to = 'info@mrdbenefitsconsulting.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /#contact');
    exit;
}

// Honeypot: bots fill this hidden field; pretend success and drop it.
if (!empty($_POST['website'])) {
    header('Location: /?sent=1#contact');
    exit;
}

function clean($value) {
    return trim(str_replace(["\r", "\n"], ' ', strip_tags($value ?? '')));
}

$name     = clean($_POST['name'] ?? '');
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$phone    = clean($_POST['phone'] ?? '');
$interest = clean($_POST['interest'] ?? '');
$message  = trim(strip_tags($_POST['message'] ?? ''));

if ($name === '' || !$email || $message === '') {
    header('Location: /?sent=0#contact');
    exit;
}

$subject = "New website inquiry from $name";
$body = "Name: $name\nEmail: $email\nPhone: $phone\nInterested in: $interest\n\nMessage:\n$message\n";
$headers = "From: MRD Benefits Website <$to>\r\nReply-To: $email\r\n";

$ok = mail($to, $subject, $body, $headers);
header('Location: /?sent=' . ($ok ? '1' : '0') . '#contact');
exit;
