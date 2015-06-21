<?php
session_start();
include("configurazione.php");
include("funzioni.php");
$azione=$_GET["azione"];
$tabella=$_REQUEST["tabella"];

#ISCRIZIONE

if($azione=="iscrizione") {

  $risultatocolonne=mysql_query("SHOW COLUMNS FROM $tabella");
  $numerocolonne=mysql_num_rows($risultatocolonne);
  $query="INSERT INTO $tabella VALUES('',";
  $campiinseriti=1;

  while($colonne=mysql_fetch_row($risultatocolonne)) {
    if($colonne[0]!="ID") {
      $nomecampo=$colonne[0];
      $valoredaaggiungere=addslashes($_POST[$nomecampo]);
      $query.="'".$valoredaaggiungere."'"; 
      $campiinseriti++;
      if($campiinseriti<$numerocolonne) $query.=",";
    }
  }

  $query.=")";
  mysql_query($query) or die("Inserimento fallito");
  header("Location: ../index.php?pagina=iscrizione");
  exit;
}



#INSERIMENTO

if($azione=="inserimento") {

  $risultatocolonne=mysql_query("SHOW COLUMNS FROM $tabella");
  $numerocolonne=mysql_num_rows($risultatocolonne);
  $query="INSERT INTO $tabella VALUES('',";
  $campiinseriti=1;

  while($colonne=mysql_fetch_row($risultatocolonne)) {
    if($colonne[0]!="ID") {
      $nomecampo=$colonne[0];
      $valoredaaggiungere=addslashes($_POST[$nomecampo]);
      $query.="'".$valoredaaggiungere."'"; 
      $campiinseriti++;
      if($campiinseriti<$numerocolonne) $query.=",";
    }
  }

  $query.=")";
  mysql_query($query) or die("Inserimento fallito");
  header("Location: ../index.php?pagina=inserimento");
  exit;
}
# MODIFICA

elseif($azione=="modifica") {
  $record=$_GET["record"];
  $query="UPDATE $tabella SET ";
  foreach($_POST as $chiave=>$valore) $query.="$chiave='$valore',";
  $query.=" WHERE ID='$record'";
  $query=ereg_replace(", WHERE"," WHERE",$query);
  mysql_query($query) or die("aggiornamento fallito");
  header("Location: ../index.php?pagina=tabelle&tabella=$tabella");
  exit;
}
# CANCELLAZIONE

elseif($azione=="cancellazione") {
  $record=$_GET["record"];
  mysql_query("DELETE FROM $tabella WHERE ID='$record'") or die("cancellazione fallita");
  header("Location: ../index.php?pagina=tabelle&tabella=$tabella");
  exit;
}

# LOGIN

elseif($azione=="login") {
  $user=$_POST["user"];
  $pass=($_POST["pass"]);
  $risultatoamministratore=mysql_query("SELECT ID FROM amministratori WHERE User='$user' AND Pass='$pass'");
   $risultatocliente=mysql_query("SELECT ID FROM clienti WHERE User='$user' AND Pass='$pass'");
  if(mysql_num_rows($risultatoamministratore) == 0 AND mysql_num_rows($risultatocliente) == 0){
     reindirizza("pagina=home&sezione=secondaria&messaggio=UTENTE-NON-AUTORIZZATO");}
  elseif (mysql_num_rows($risultatoamministratore) == 0 AND mysql_num_rows($risultatocliente) != 0) {
    $_SESSION["utenteautorizzato"]=mysql_result($risultatoamministratore,0,0);
	$home=(header("Location: ../index.php?pagina=cliente&messaggio=Salve $user sei loggato come cliente"));
	 header("Location: ../index.php?pagina=cliente&messaggio=Salve $user sei loggato come cliente");
  exit;
  }
  else {
    $_SESSION["utenteautorizzato"]=mysql_result($risultatoamministratore,0,0);
	 header("Location: ../index.php?pagina=home&sezione=principale&messaggio=Salve $user sei loggato come amministratore");
  exit;
  }
 
}

# LOGOUT

elseif($azione=="logout") {
  session_unset();
  reindirizza("pagina=home&sezione=secondaria&messaggio=LOGOUT-ESEGUITO");
}
?>