
</BR>
<link rel="stylesheet" type="text/css" href="style.css" />
<h1 align="center">PERSONAL TRAINER</h1>


<table> 
<?php 
 include("pagine/configurazione.php");
$query = mysql_query("SELECT * FROM istruttori"); 

echo "<table align='center' width='300' border='1'>";
echo "<tr>";
echo "<td  align='center'> <h4>NOME</h4></td>";
echo "<td align='center'> <h4>INDIRIZZO EMAIL</h4></td>";
echo "<td align='center'> <h4>TELEFONO</h4></td>";
echo "<td align='center'> <h4>DISCIPLINA</h4></td>";
echo "<tr>";
		while($cicle=mysql_fetch_array($query)){ 
		echo "<tr>";
		echo "<td align='center'>".$cicle['nome']."</td>"; 
		echo "<td align='center'>".$cicle['indirizzoemail']."</td>"; 
		echo "<td align='center'>".$cicle['telefono']."</td>"; 
		echo "<td align='center'>".$cicle['disciplina']."</td>";
		echo"</tr>";
} 
echo"</table>";
?> 
</table>