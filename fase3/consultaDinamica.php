<?php 

$db = new SQLite3('database.db');

$nom = $_POST['nom'];
echo "<p>Buscant usuaris amb el nom: $nom</p>";

$sql = "SELECT * FROM usuaris WHERE usu_nom = '$nom'";
echo "<p>Consulta exacutada: <code>$sql</code></p>";

$resultats = $db->query($sql);

while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
    echo "ID: ". $fila['usu_id'] ." - Nom: ". $fila['usu_nom'] ." - Email: ". $fila['usu_email'] ."<br>";
}

echo '<a href="pindex.php">Tornar a la pàgina de inici</a>';

$db->close();
