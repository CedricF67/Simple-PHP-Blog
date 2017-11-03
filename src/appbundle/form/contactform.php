<?php

$recipient = "cedric.falda@gmail.com";
$fmtMail= 'Bonjour,

<name> (<email>) à envoyé un message à partir du blog. En voici le contenu :
<message>';

foreach($_POST as $key=> $val) {
$fmtMail= str_replace("<$key>", $val, $fmtMail);
}

if ($_POST["access"] == "stopspam") {
mail($recipient, $_POST["subject"], $fmtMail);
}
