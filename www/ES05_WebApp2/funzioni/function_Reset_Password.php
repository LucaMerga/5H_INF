<?php
define('DB_SERVER', 'localhost');
define('DB_NAME', 'webapp2');
define('DB_USER', 'Merga');
define('DB_PASSWORD', 'cornicione1');

function reset_Password($password,$username){
	try {
		//connesione DB
		$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		// Preparazione della query di update
		$stmt = $pdo->prepare("UPDATE utente SET password = '$password' WHERE username = '$username' ");
		// Esecuzione della query
		$stmt->execute();
		
		return array(true, $username." La tua password è stata cambiata con successo.<br><br>Torna a <a href='index.php'>home</a>");	// return con valore true e messaggio di cambio password avvenuta
		
		$pdo = null; // Chiudi la connessione al database
	} catch (PDOException $e) {
		// Gestione dell'eccezione
		return array(false, "Errore di esecuzione della query: " . $e->getMessage());	// return con valore false e messaggio con valore dell'eccezione
		exit;
	}
}
?>