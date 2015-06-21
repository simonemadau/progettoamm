<?php
define("COSTANTE_HOST","localhost");
define("COSTANTE_UTENTE","root");
define("COSTANTE_PASSWORD","");
define("COSTANTE_DATABASE","fitness");
$connessione=mysql_connect(COSTANTE_HOST,COSTANTE_UTENTE,COSTANTE_PASSWORD) 
  or die("Problemi di connessione: controlla le credenziali");
mysql_select_db(COSTANTE_DATABASE) or die("Database non presente");
$relazioni=array("Impiego"=>"impieghi","Cliente"=>"clienti","Iscrizione"=>"iscrizioni");
?>
