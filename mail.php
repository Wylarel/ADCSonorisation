<?php
$name = (isset($_POST['name']) and !empty($_POST['name'])) ? $_POST['name'] : false;
$email = (isset($_POST['email']) and !empty($_POST['email'])) ? $_POST['email'] : false;
$message = (isset($_POST['message']) and !empty($_POST['message'])) ? $_POST['message'] : false;
$subject = (isset($_POST['subject']) and !empty($_POST['subject'])) ? $_POST['subject'] : false;

header('Content-Type: application/json');

if ($name and $email and $message and $subject) {
    $content = "=== Message via le site ===\n\nDe: $name \nEmail: $email \nMessage:\n$message";
    $recipient = "info@adcsonorisation.be";
    $mailheader = "From: $email \r\n";
    if (mail($recipient, $subject, $content, $mailheader)) {
        print json_encode(array('message' => 'Merci pour votre message !', 'code' => 1));
    } else {
        print json_encode(array('message' => 'Une erreur s\'est produite lors de l\'envoie', 'code' => 0));
    }
} else {
    print json_encode(array('message' => 'Veuillez correctement remplir le formulaire', 'code' => 0));
}

?>
