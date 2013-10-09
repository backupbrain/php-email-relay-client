Email Relay with PHP
=============================
This code shows how to send HTML emails using PHP.

It is intended as a complement to my tutorial:
http://tonygaitatzis.tumblr.com/post/63581161103/email-relay-with-php

Configuration
--------------
Set up a mail relay server through MailJet or some other email server.  You will need at least a server address and port (default 25 for SMTP or 587 for SMTP+SSL).  You will also likely need a username and password for the server.

Edit your settings.php to reflect your server's settings.
 
$settings['smtp_server'] = 'mail.server.com';
$settings['smtp_port'] = '25';
$settings['smtp_username'] = 'MAIL_PASSWORD';
$settings['smtp_password'] = 'MAIL_PASSWORD';


Now You should be good to go.


