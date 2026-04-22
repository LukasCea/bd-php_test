<?php 
// This line creates a new SQLite3 database or connects to it if it already exists.
$db = new SQLite3('database.db');

// This line reads the 'nom' parameter from the POST request, which is expected to be sent from a form submission.
$nom = $_POST['nom'];
echo "<p>Buscant usuaris amb el nom: $nom</p>";

// This block prepares a SQL statement to select all records from the 'usuaris' table where the 'usu_nom' column matches the provided name. It uses a prepared statement to prevent SQL injection.
$stmt = $db->prepare('SELECT * FROM usuaris WHERE usu_nom = :nom');
$stmt->bindValue(':nom', $nom, SQLITE3_TEXT);

// This line executes the prepared statement and stores the results in the $resultats variable.
$resultats = $stmt->execute();

// This loop iterates through the results of the query, fetching each row as an associative array and printing the user ID, name, and email.
while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
    echo "ID: ". $fila['usu_id'] ." - Nom: ". $fila['usu_nom'] ." - Email: ". $fila['usu_email'] ."<br>";
}

echo '<a href="pindex.php">Tornar a la pàgina de inici</a>';

$db->close();
