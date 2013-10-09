<?php
// classes/Courier.class.php


/** 
 *  This class connects to an SMTP server using the RFC2487 protocol.
 *  It converts an Email class into SMTP commands to send an email through 
 *  a relay mail server.
 */
class Courier {

    public $server,
            $port,
            $username,
            $password;
    private $handle;
    
	/**
	 * Connect to the SMTP server using fsockopen,
	 * Stores the connection ID in $handle, then tries to authenticate
	 */
    function connect() {
        if (!$this->handle) {
            // connect to the mail relay server
            $this->handle = fsockopen($this->server, $this->port);
            fgets($this->handle, 4096);
            // begin the SMTP handshake
            $this->say("HELO ".$_SERVER['SERVER_ADDR'];
            $this->authenticate();
        }
    }
    
	/**
	 * issues the disconnect command to the SMPT server
	 */
    function disconnect() {
        $this->say("QUIT");
    }

	/**
	 * Issues authentication commands to the SMTP server
	 */
    function authenticate() {
        if ($this->handle and $this->username) {
            $this->say("AUTH LOGIN");
            $this->say(base64_encode($this->username));
            $this->say(base64_encode($this->password));
        }
    }
    
	/** 
	 * sends text through the socket, if the socket is connected
	 */
    function say($string) {
        if ($this->handle) {
            fputs($this->handle, 4096);
            $result = fgets($this->handle, 4096);
        }
    }
    
	/**
	 * converts the Email into a series of SMTP commands
	 * then sends those commands to an SMTP relay server.
	 * You must already connect() to the server
	 */
    function send($Email) {
        // who participates in this email
        $this->say("MAIL FROM:<".$Email->from.">");
        $this->say("RCPT TO:<".$Email->to.">");
        // prepare the server to recieve data
        $this->say("DATA");
        $this->say("Subject: ".$Email->subject);
        foreach ($Email->headers as $key => $value) {
            $this->say($key . ": " . $value);
        }
        // notify the server that we are beginning the message
        $this->say("");
        $this->say($Email->message);
        // end the message
        $this->say("");
        $this->say(".");
    }
    
}

?>