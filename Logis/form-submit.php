<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $to = 'victorgudumac2@gmail.com'; // replace with your email address

  $subject = 'New form submission';

  $name = $_POST['form_fields']['name'];
  $email = $_POST['form_fields']['email'];

  $message = "Name: $name\n\nEmail: $email";

  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $name <$email>\r\n";

  if (mail($to, $subject, $message, $headers)) {
    echo 'Thank you for your submission!';
  } else {
    echo 'There was a problem sending your message.';
  }

}

?>
