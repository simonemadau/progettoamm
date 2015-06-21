<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
<head>
<title>fitnesscenter</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="content-type" content="text/html;charset=iso-8859-15" /> 
</head>
<body>
<div id="container">
<div id="header">
<h1>FITNESS CENTER</h1>
<ul id="menu">
<?php
session_start();
$pagineriservate=array("inserimento","tabelle","personaltrainer");
isset($_GET["pagina"]) ? $pagina=$_GET["pagina"] : $pagina="home";
$vocimenu=array("home","iscrizione","discipline","contatti","personaltrainer","immagini","news");
if(in_array($pagina,$pagineriservate) && !isset($_SESSION["utenteautorizzato"])) {
  header("Location: index.php?pagina=secondaria&messaggio=DEVI-AUTENTICARTI!");
  exit;
}

foreach($vocimenu as $voce) {
  echo "
  <li>";
  if($pagina!=$voce) echo '<a href="index.php?pagina='.$voce.'">';
  echo $voce;
  if($pagina!=$voce) echo "</a>";
  echo "</li>";
}
echo "\n";
?>
</ul>
</div>
<div id="content"> 

<div id="nav">

<div id="login" class="boxed">


          <fieldset>
		  <form action="pagine/raccoltadati.php?azione=login" method="post" id="form1" ">
<p style="color:red"><strong><?php if(isset($_GET["messaggio"])) echo $_GET["messaggio"] ?></strong>
  
  <h6 style="<?php
	$visibilita = "visibility:hidden";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:visible";
	}
	echo $visibilita;
 ?>">Effettua il
 
<a style="<?php
	$visibilita = "visibility:hidden";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:visible";
	}
	echo $visibilita;
 ?>" href="pagine/raccoltadati.php?azione=logout">Logout</a></p></h6>
 
 <h2 style="<?php
	$visibilita = "visibility:visible";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:hidden";
	}
	echo $visibilita;
 ?>"class="title">Client Account</h2>
 
 </br>
  <label style="<?php
	$visibilita = "visibility:visible";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:hidden";
	}
	echo $visibilita;
 ?>" for="user">username </label>
  </br>
  <input style="<?php
	$visibilita = "visibility:visible";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:hidden";
	}
	echo $visibilita;
 ?>" type="text" name="user" id="user" />
    </br>

  <label style="<?php
	$visibilita = "visibility:visible";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:hidden";
	}
	echo $visibilita;
 ?>" for="pass">password </label>
    </br>
  <input style="<?php
	$visibilita = "visibility:visible";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:hidden";
	}
	echo $visibilita;
 ?>" type="password" name="pass" id="pass" />
	
<input style="<?php
	$visibilita = "visibility:visible";
	if (isset($_SESSION["utenteautorizzato"]))
	{
		$visibilita = "visibility:hidden";
	}
	echo $visibilita;
 ?>" id="inputsubmit1" type="submit" name="inputsubmit1" value="accedi" />
</fieldset>

</form>

</div>
 
<img src="images/img04.gif" alt="" width="auto" height="auto" />
  </br>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2548.6962204545143!2d9.170357!3d40.272062!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12dc2ab521e2ad53%3A0xcba4d21c87d4aa1!2sComune+Di+Oniferi!5e1!3m2!1sit!2sit!4v1425683146744" width="240" height="328" frameborder="0"></iframe>
</br>
</div>

<div id="main">
<?php include("pagine/$pagina.php") ?> 
 
</div>
</div>

<div id="footer">
Copyrigt &copy;
</div>

</div>
</body>
</html>