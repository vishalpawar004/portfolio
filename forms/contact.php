<?php
// Replace with your receiving email address
$receiving_email_address = 'vishalpawar8924@gmail.com';

// Path to PHP Email Form library
$php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';

if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

// SMTP Configuration for Gmail
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'yourgmail@gmail.com',      // your Gmail address
  'password' => 'your_app_password',        // App password from Gmail
  'port' => '587',                          // Gmail SMTP port
  'encryption' => 'tls'                     // Use TLS encryption
);

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'] ?? '';
$contact->from_email = $_POST['email'] ?? '';
$contact->subject = $_POST['subject'] ?? 'New Message from Website';

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
