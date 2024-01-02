<?php
/**
 * This file is used to load the Composer autoloader if required.
 */

require 'vendor/autoload.php';



function sendgridApiMail($to, $message, $subject, $from, $fromname)
{
    $fromname = 'Coal Frame Briyaani';
    $sendgrid = new \SendGrid('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');
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($from, $fromname);
    $email->setSubject($subject);
    $email->addTo($to);
    // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent("text/html", $message);
    $response = $sendgrid->send($email);
    return $response;
}

