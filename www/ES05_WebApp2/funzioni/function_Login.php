<?php
define('DB_SERVER', 'localhost');
define('DB_NAME', 'webapp2');
define('DB_USER', 'Merga');
define('DB_PASSWORD', 'cornicione1');

function login($username, $password){
	try {
		//connesione DB
		$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		// Preparazione della query di selezione
		$stmt = $pdo->prepare("SELECT * FROM utente WHERE username = '$username' AND password = '$password'");
		// Esecuzione della query
		$stmt->execute();
		 
		if ($stmt->rowCount() == 1) {	// controllo corrispondenza - se la tabella della select restituisce una riga allora i valori inseriti corrispondono e l'utente esiste
			$_SESSION['user']=$username;	// impostazione variabili di sessione 
			$_SESSION['password']=$password;
			return array(true, "Benvenuto ". $username . "<br><br>Vai a <a href='riservata.php'>riservata</a>");	// return con valore true e messaggio di benvenuto
		} else {
			return array(false, "Username o password errati! <br><br>Torna a <a href='login.php'>login</a>"); 	// return con valore false e messaggio di credenziali sbagliate
		}
		$pdo = null; // Chiudi la connessione al database
	} catch (PDOException $e) {
		// Gestione dell'eccezione
		return array(false, "Errore di esecuzione della query: " . $e->getMessage());	// return con valore false e messaggio con valore dell'eccezione
		exit;
	}
}
?>