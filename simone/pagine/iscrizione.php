<link rel="stylesheet" type="text/css" href="style.css" />
<h1 align="center">ISCRIZIONE</h1>
<a href="javascript:history.back()" target="_blank">
   <img src="images/indietro.gif"  border="0px" width="20px"  alt=""></a>
<div>
<fieldset>
<form action="pagine/raccoltadati.php?azione=iscrizione" method="post">
  <p>nome</br><label for="nome"> <input type="text" name="nome" /></p>
  <p>
    <p>cognome</br><label for="cognome"> <input type="text" name="cognome" /></p>
	 <p>
    <p>telefono</br> <label for="telefono"> <input type="text" name="telefono" /></p>
	 <p>
    <p>user</br><label for="user"> <input type="text" name="user" /></p>
	 <p>
    <p>password</br><label for="pass"> <input type="text" name="pass" /></p>
    <input type="hidden" name="tabella" value="clienti" />
    <input id="inputsubmit1" type="submit" name="inputsubmit1" value="inserisci" />
  </p>
</form>
</fieldset>
</div>
