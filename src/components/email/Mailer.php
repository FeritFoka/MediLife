<?php

require_once("../../src/components/email/MailSettings.php");

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../../vendor/autoload.php';
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

final class Mailer
{
    private $mail;

    public function __construct()
    {
        //Create a new PHPMailer instance
        $this->mail = new PHPMailer();

        //Tell PHPMailer to use SMTP
        $this->mail->isSMTP();

        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;

        //Set the hostname of the mail server
        $this->mail->Host = 'smtp.gmail.com';
        //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        //if your network does not support SMTP over IPv6,
        //though this may cause issues with TLS

        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $this->mail->Port = 465;

        //Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $this->mail->Username = MailSettings::EMAIL;

        //Password to use for SMTP authentication
        $this->mail->Password = MailSettings::PASSWORD;

        //Set who the message is to be sent from
        //Note that with gmail you can only use your account address (same as `Username`)
        //or predefined aliases that you have configured within your account.
        //Do not use user-submitted addresses in here
        $this->mail->setFrom(MailSettings::EMAIL, MailSettings::FROM_FIELD);

        //Set who the message is to be sent to
        $this->mail->addAddress(MailSettings::EMAIL, MailSettings::TO_FILED);
    }

    public function sendEmail($name, $email, $phone, $msg)
    {

        //Set an alternative reply-to address
        //This is a good place to put user-submitted addresses
        $this->mail->addReplyTo($email, $name);

        //Set the subject line
        $this->mail->Subject = 'Medilife Contact From ' . $name;

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        if (!empty($phone)) {
            $this->mail->msgHTML($msg . "\n Contact phone: " . $phone);
        } else {
            $this->mail->msgHTML($msg);
        }


        //Replace the plain text body with one created manually
        //$this->mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$this->mail->send()) {
            return $this->mail->ErrorInfo;
        } else {
            return 'Message sent!';
        }
    }
}
