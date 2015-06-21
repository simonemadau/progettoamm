
<div>
<a href="index.php?pagina=home&sezione=principale" >
<img src="images/home.gif"  border="0px" width="50px" align="right" alt=""></a>
<a href="javascript:history.back()" target="_blank">
   <img src="images/indietro.gif"  border="0px" width="20px"  alt=""></a>
  <ul>
<?php

include("pagine/configurazione.php");
$querytabelle="SHOW TABLES";
$risultatotabelle=mysql_query($querytabelle);
while($righetabelle=mysql_fetch_row($risultatotabelle)) {
  $nometabella=$righetabelle[0];
   echo "<h4>";
  echo "<li>";
  if(!isset($_GET["tabella"]) || $_GET["tabella"]!=$nometabella) 
    echo "<a href=\"index.php?pagina=tabelle&tabella=$nometabella\">";
  echo $nometabella;
  if(!isset($_GET["tabella"]) || $_GET["tabella"]!=$nometabella) echo "</a>";
  echo "</li>";
}
echo "</ul> </hr> </h4>";


if(isset($_GET["tabella"])) {
  $tabella=$_GET["tabella"];
  $colonne=array();
  $risultatocolonne=mysql_query("SHOW COLUMNS FROM $tabella");
  while($colonnetabella=mysql_fetch_row($risultatocolonne)) array_push($colonne,$colonnetabella[0]);
  echo "
  <table summary=\"tabella $tabella\" border=\"1\" cellpadding=\"2\">
    <tr>";

  foreach($colonne as $colonna) echo "
      <th>$colonna</th>";

  echo "
      <th colspan=\"2\"><em>azioni</em></th>
    </tr>";

  $risultatotabella=mysql_query("SELECT * FROM $tabella");
  while($righe=mysql_fetch_array($risultatotabella)) {
    echo "
    <tr>";
    foreach($colonne as $colonna) {
      echo "
      <td>";

      if(array_key_exists($colonna,$relazioni)) {
        $risultatorelazione=mysql_query("SELECT Nome FROM {$relazioni[$colonna]} WHERE ID='{$righe[$colonna]}'");
        $campo=stripslashes(mysql_result($risultatorelazione,0,0));
      } else $campo=stripslashes($righe[$colonna]);
      echo "$campo</td>";
    }
 echo "
      <td><a href=\"index.php?pagina=modifica&tabella=$tabella&record={$righe["ID"]}\">modifica</a></td>
      <td><a href=\"index.php?pagina=tabelle&tabella=$tabella&cancellarecord={$righe["ID"]}\">cancella</a></td>
    </tr>";
  }
  echo "
  </table>\n";
}
if(isset($_GET["cancellarecord"])) echo "
<center><div style='width: 300px; border: #ff0000 5px double; background-color: #000000'>

   <h5 style='color:red'>
     <em>Sei sicuro di voler cancellare il record n. <strong>{$_GET["cancellarecord"]}</strong>?</em>
           
     <a href=\"index.php?pagina=tabelle&tabella=$tabella\" title=\"annulla la cancellazione\">NO</a>
           
     <a href=\"pagine/raccoltadati.php?azione=cancellazione&tabella=$tabella&record={$_GET["cancellarecord"]}\" 
       title=\"conferma la cancellazione\">SI</a>
  </h5> </p></div></center>";
?>
</div>