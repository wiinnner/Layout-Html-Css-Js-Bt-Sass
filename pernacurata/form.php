<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');


// Verificăm dacă a fost apăsat butonul de trimitere
if (isset($_POST['submit'])) {
    // Colectăm datele din formular
    $nume = $_POST['numele'];
    $prenume = $_POST['prenumele'];
    $telefon = $_POST['telefonul'];
    $adresa = $_POST['adresa'];
    $serviciu = $_POST['serviciu'];
if (isset($_POST['oras'])) {
    $oras = $_POST['oras'];
} else 
    $oras = ''; // sau o valoare implicită
    // Configurăm obiectul PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.sendinblue.com
';  // Adresa serverului SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'victorgudumac2@gmail.com'; // Adresa de e-mail
    $mail->Password = 'VryhcaQLUJmw3IqT'; // Parola pentru adresa de e-mail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

   $mail->setFrom('from@example.com', 'Numele Expeditorului');
    $mail->addAddress('victorgudumac2@gmail.com', 'Numele Destinatarului');


    // Adăugăm subiectul și corpul mesajului
    $mail->Subject = 'Formular de contact';
    $mail->Body = "Nume: $nume\n"
                 ."Prenume: $prenume\n"
                 ."Telefon: $telefon\n"
                 ."Adresa: $adresa\n"
                 ."Serviciu: $serviciu\n"
                 ."Oras: $oras\n";

    // Trimitem e-mailul și afișăm un mesaj de confirmare sau de eroare
    try {
        $mail->send();
        echo 'Mesajul a fost trimis cu succes!';
    } catch (Exception $e) {
        echo 'Mesajul nu a putut fi trimis. Eroare: '.$mail->ErrorInfo;
    }
}