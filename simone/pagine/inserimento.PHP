
<div>
<a href="index.php?pagina=home&sezione=principale" >
<img src="images/home.gif"  border="0px" width="50px" align="right" alt=""></a>
<a href="javascript:history.back()" target="_blank">
   <img src="images/indietro.gif"  border="0px" width="20px"  alt=""></a>
   
<?php
include("pagine/configurazione.php");

$querytabelle="SHOW TABLES";
$risultatotabelle=mysql_query($querytabelle);
while($righetabelle=mysql_fetch_row($risultatotabelle)) {
  $nometabella=$righetabelle[0];

  echo <<<EOF
<fieldset>
<legend>Inserimento $nometabella</legend>
<form action="pagine/raccoltadati.php?azione=inserimento" method="post">
EOF;


  $querycolonne="SHOW COLUMNS FROM $nometabella";
  $risultatocolonne=mysql_query($querycolonne);
  while($righecolonne=mysql_fetch_row($risultatocolonne)) {
    $nomecolonna=$righecolonne[0];
    if($nomecolonna!="ID") echo <<<EOF1
  <p><label for="$nomecolonna">$nomecolonna</label> 
  </br>
  <input type="text" name="$nomecolonna" /></p>
EOF1;
  }
  echo <<<EOF2
  <p>
    <input type="hidden" name="tabella" value="$nometabella" />
	<input id="inputsubmit1" type="submit" name="inputsubmit1" value="inserisci $nometabella" />
  </p>
</form>
</fieldset>
EOF2;
}

?>
</div>