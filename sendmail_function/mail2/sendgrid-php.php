<?php
/**
 * This file is used to load the Composer autoloader if required.
 */

require 'vendor/autoload.php';



function sendgridApiMail($to, $message, $subject, $from, $fromname)
{
    $fromname = 'Wisdom Tooth';
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

