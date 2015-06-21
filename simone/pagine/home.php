
<?php
isset($_GET["sezione"]) ? $sezione=$_GET["sezione"] : $sezione="secondaria";

include("$sezione.php");
?>