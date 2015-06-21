</BR>
<h1 align="center">DISCIPLINE</h1>


<table> 
<?php 
 include("pagine/configurazione.php");
$query = mysql_query("SELECT * FROM corsi"); 

echo "<table align='center' width='300' border='1'>";
echo "<tr>";
echo "<td  align='center'> <h4>NOME</h4></td>";
echo "<td align='center'> <h4>ANNO</h4></td>";
echo "<td align='center'> <h4>CARATTERISTICHE</h4></td>";
echo "<td align='center'> <h4>POSTI</h4></td>";
echo"</tr>";
	while($cicle=mysql_fetch_array($query)){ 
		echo"</tr>";
		echo "<td align='center'>".$cicle['denominazione']."</td>"; 
		echo "<td align='center'>".$cicle['anno']."</td>"; 
		echo "<td align='center'>".$cicle['caratteristiche']."</td>"; 
		echo "<td align='center'>".$cicle['posti']."</td>";
		echo"<tr>";
}
echo"</table>";
?> 
</table>