<?php

function checkPassword($pwd, &$errors) {

    $errors_init = $errors;

    if (strlen($pwd) < 8) {
        array_push($errors, ERR_PASSWORD_TOSHORT);
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        array_push($errors, ERR_PASSWORD_NONUMBER);
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        array_push($errors, ERR_PASSWORD_NOLETTER);
    }     

    return ($errors == $errors_init);
}

// Send en email with validation link
function mailRegister($mail, $mail_key){

    $confirm_link = SITEBASE_URL."index.php?adr=".urlencode($mail)."&key=".urlencode($mail_key)."&action=validate";
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
    {
        $carriage_return = "\r\n";
    }
    else
    {
        $carriage_return = "\n";
    }
    $txt_message = MES_MAIL_FORVALIDADRESS.$confirm_link;
    $html_message = "<html><head></head><body>".MES_HTML_MAIL_FORVALIDADRESS."<a href=\"$confirm_link\">$confirm_link</a></body></html>";

    $boundary = "-----=".md5(rand());
    $boundary_alt = "-----=".md5(rand());

    $header = "From: \"".REF_EMAIL_ADRESS."\"<".SEND_EMAIL_ADRESS.">".$carriage_return;
    $header.= "Reply-to: \"".REF_EMAIL_ADRESS."\" <".SEND_EMAIL_ADRESS.">".$carriage_return;
    $header.= "MIME-Version: 1.0".$carriage_return;
    $header.= "Content-Type: multipart/mixed;".$carriage_return." boundary=\"$boundary\"".$carriage_return;

    $message = $carriage_return."--".$boundary.$carriage_return;
    $message.= "Content-Type: multipart/alternative;".$carriage_return." boundary=\"$boundary_alt\"".$carriage_return;
    $message.= $carriage_return."--".$boundary_alt.$carriage_return;

    $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$carriage_return;
    $message.= "Content-Transfer-Encoding: 8bit".$carriage_return;
    $message.= $carriage_return.$txt_message.$carriage_return;

    $message.= $carriage_return."--".$boundary_alt.$carriage_return;

    $message.= "Content-Type: text/html; charset=\"UTF-8\"".$carriage_return;
    $message.= "Content-Transfer-Encoding: 8bit".$carriage_return;
    $message.= $carriage_return.$html_message.$carriage_return;

    $message.= $carriage_return."--".$boundary_alt."--".$carriage_return;

    $message.= $carriage_return."--".$boundary.$carriage_return;

    $subject = MES_MAIL_SUBJECT;

    mail($mail,$subject,$message,$header);

    echo "./inc/functions.php/mailRegister() : Confirm link if no sending mail ".$confirm_link;

}
?>