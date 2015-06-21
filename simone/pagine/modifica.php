<div>
<?php
include("pagine/configurazione.php");

$tabella=$_GET["tabella"];
$record=$_GET["record"];

echo <<<EOF
<fieldset>
<legend>Modifica record n. $record della tabella <em>$tabella</em></legend>
<form action="pagine/raccoltadati.php?azione=modifica&tabella=$tabella&record=$record" method="post">
EOF;
$risultatorecord=mysql_query("SELECT * FROM $tabella WHERE ID='$record'");
$righerecord=mysql_fetch_object($risultatorecord);

$risultatocolonne=mysql_query("SHOW COLUMNS FROM $tabella");

while($righecolonne=mysql_fetch_row($risultatocolonne)) {
  $nomecolonna=$righecolonne[0];
  if($nomecolonna!="ID") {
    echo "
	
  <p>
    <label for=\"$nomecolonna\">$nomecolonna</label> </br>";
 $value=stripslashes($righerecord->$nomecolonna);
    
    if(array_key_exists($nomecolonna,$relazioni)) {
      echo "
    <select name=\"$nomecolonna\">
      <option value=\"\">scegli...</option>";

      $queryrelazione="SELECT ID,Nome FROM {$relazioni[$nomecolonna]} ORDER BY Nome";
      $risultatorelazione=mysql_query($queryrelazione);

      while($righerelazione=mysql_fetch_array($risultatorelazione)) {
        echo "
      <option value=\"{$righerelazione["ID"]}";
        if($value==$righerelazione["ID"]) echo "selected=\"selected\"";
        echo "\">".stripslashes($righerelazione["Nome"])."</option>";
      }
 echo "
    </select>";

    } else echo "
    <input type=\"text\" name=\"$nomecolonna\" value=\"$value\" />";
    echo "
  </p>";
  }
}
echo <<<EOF2

  <p>
    <input type="submit" value="modifica" />
  </p>
  <p><a href="index.php?pagina=tabelle&tabella=$tabella">torna alla tabella <em>$tabella</em></a></p>
</form>
</fieldset>
EOF2;

?>
</div>
