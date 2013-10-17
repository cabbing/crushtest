Uso di form HTML (2)
<html> <body>
<h3>Cabber selezionati</h3>
<?php
/* prepara variabili per connessione MySQL */

/* Connessione al server MySQL */
$con = mysql_connect("localhost", "root") or die("Connessione fallita: " . mysql_error());
/* Selezione il DB per l’accesso */
mysql_select_db("prova") or die("Selezione DB fallita: " . mysql_error());
/* Prepara la Query SQL */
$sql = "SELECT * FROM tripper WHERE ( Surname like '%{$_POST['cognome_cabber']}%' )";
$result = mysql_query($sql) or die( "Errore nella query. Query non eseguita.");
?>

<table border=1>
<tr>
<td><b>Cognome</b></td>
<td><b>Nome</b></td>
</tr>

<?php

/* Recupera le tuple dal result set MySQL
e le formatta come righe di tabella HTML */
while ($row = mysql_fetch_array($result)) {
echo("<tr><td>".$row['Surname']."</td>");
echo("<td>".$row['Name']."</td></tr>");
}
?>
</table>
<?php
/* Chiude la connessione col server MySQL */
mysql_close ($con);
?>
</body> </html> 