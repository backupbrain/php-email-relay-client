<?php 
// classes/Email.class.php

/**
 * Email class conceptualizes an email. 
 * It contains the information that the Courier
 * needs to send an email message to a recipient
 */
class Email {
    public $to,
            $from,
            $subject,
            $message,
            $headers;

}

?>