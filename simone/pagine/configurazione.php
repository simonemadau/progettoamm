<?php
define("COSTANTE_HOST","localhost");
define("COSTANTE_UTENTE","simoneMadau");
define("COSTANTE_PASSWORD","pipistrello896");
define("COSTANTE_DATABASE","amm14_simoneMadau");
$connessione=mysql_connect(COSTANTE_HOST,COSTANTE_UTENTE,COSTANTE_PASSWORD) 
  or die("Problemi di connessione: controlla le credenziali");
mysql_select_db(COSTANTE_DATABASE) or die("Database non presente");
$relazioni=array("Impiego"=>"impieghi","Cliente"=>"clienti","Iscrizione"=>"iscrizioni");
?>
