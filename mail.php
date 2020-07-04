<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Le nom ne peut être laissé vide', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'L\'e-mail ne peut être laissé vide', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Le format de l\'e-mail est invalide', 'code' => 0));
exit();
}
}
if ($subject === ''){
print json_encode(array('message' => 'Le sujet ne peut être laissé vide', 'code' => 0));
exit();
}
if ($message === ''){
print json_encode(array('message' => 'Le message ne peut être laissé vide', 'code' => 0));
exit();
}
$content="=== Message via le site ===\n\nDe: $name \nEmail: $email \nMessage:\n$message";
$recipient = "info@adcsonorisation.be";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Merci pour votre message !', 'code' => 1));
exit();
?>