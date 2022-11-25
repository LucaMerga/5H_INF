<?php
//validation nome
function checkNome(&$nome, &$erroreN) {
	$nome=trim($nome);	//elimina spazi vuoti
	if($nome==""){	//controllo che non sia vuoto
		$erroreN = "Inserire il nome";	//modifico valore dell'errore
	}
	if(!preg_match("/^[a-zA-Z-']*$/",$nome)){	//controllo se NON rispetta le condizioni: contenere solo caratteri alfabetici e apostrofo (valido per sostituire eventuali lettere accentate)
		$erroreN = "Il nome non può contenere numeri";	//modifico valore dell'errore
	}
}

//validation cognome
function checkCognome(&$cognome, &$erroreC) {
	$cognome=trim($cognome);	//elimina spazi vuoti
	if($cognome==""){	//controllo che non sia vuoto
		$erroreC = "Inserire il cognome";	//modifico valore dell'errore
	} 
	if(!preg_match("/^[a-zA-Z-' ]*$/",$cognome)){	//controllo se NON rispetta le condizioni: contenere solo caratteri alfabetici, spazi e apostrofo (valido per sostituire eventuali lettere accentate)
		$erroreC = "Il cognome non può contenere numeri";	//modifico valore dell'errore
	}
}

//validation data di nascita
function checkData(&$data, &$erroreD) {
	if(empty(strtotime($data))){	//controllo che non sia vuoto
		$erroreD = "Inserire la data di nascita";	//modifico valore dell'errore
	}
}

//validation email
function checkMail(&$email, &$erroreE) {
	$email=filter_var($email, FILTER_SANITIZE_EMAIL);	//rimuovo i caratteri illegali
	if($email==""){		//controllo che non sia vuoto
		$erroreE = "Inserire l'email";	//modifico valore dell'errore
		return 0;	//esce dalla funzione altrimenti entrerebbe nel secondo if che ha una condizione simile
	} 
	if(!preg_match("/^([\w]{6,}+\@[\w]+\.[\w]{2,6})*$/",$email)){	//controllo se NON rispetta le condizioni: avere almeno 6 caratteri alfanumeri e/o quelli speciali cosentiti @ un dominio composto da caratteri alfanumeri e/o quelli speciali cosentiti seguiti . da 2 a 6 caratteri alfabetici
		$erroreE = "Inserire un'email valida (almeno 6 caratteri prima della @)";	//modifico valore dell'errore
	}
}

//validation numero di telefono
function checkTel(&$telefono, &$erroreT) {
	if(!preg_match("/^([\d]{3}+\ [\d]{3}+\ [\d]{4})*$/",$telefono) && $telefono!=""){	//controllo se NON rispetta le condizioni: avere 3 cifre 'spazio' 3 cifre 'spazio' 4 cifre e che 
		$erroreT = "Inserire un numero di telefono valido (3 cifre 3 cifre 4 cifre)";	//modifico valore dell'errore
	}
}

//validation indirizzo
function checkIndirizzo(&$indirizzo, &$erroreI){
	if($indirizzo==""){	//controllo che non sia vuoto
		$erroreI = "Inserire l'indirizzo";	//modifico valore dell'errore
		return 0;	//esce dalla funzione altrimenti entrerebbe nel secondo if che ha una condizione simile
	}
	if(!preg_match("/^([a-zA-Z]{3,8}+\ [a-zA-Z ']+\, [\d]{1,5})+$/",$indirizzo)){	//controllo se NON rispetta le condizioni: avere da 3 a 8 caratteri alfabetici (via, viale ecc.) 'spazio' quanti caratteri alfabetici e spazi si vogliono 'virgola e spazio' da 1 a 5 cifre (n. civico)
		$erroreI = "Inserire un indirizzo valido (via/viale nome via, n. civico)";	//modifico valore dell'errore
	}
}

//validation provincia
function checkProvincia(&$provincia, &$errorePr){
	$provincia=trim($provincia);	//elimina spazi vuoti
	if($provincia==""){	//controllo che non sia vuoto
		$errorePr = "Inserire la provincia";	//modifico valore dell'errore
	} 
	if(!preg_match("/^[a-zA-Z-' ]*$/",$provincia)){	//controllo se NON rispetta le condizioni: contenere solo caratteri alfabetici, spazi e apostrofo (valido per sostituire eventuali lettere accentate)
		$errorePr = "La provincia non può contenere caratteri speciali";	//modifico valore dell'errore
	}
}

//validation comune
function checkComune(&$comune, &$erroreCm){
	$comune=trim($comune);	//elimina spazi vuoti
	if($comune==""){	//controllo che non sia vuoto
		$erroreCm = "Inserire il comune";	//modifico valore dell'errore
	} 
	if(!preg_match("/^[a-zA-Z-' ]*$/",$comune)){	//controllo se NON rispetta le condizioni: contenere solo caratteri alfabetici, spazi e apostrofo (valido per sostituire eventuali lettere accentate)
		$erroreCm = "Il comune non può contenere caratteri speciali";	//modifico valore dell'errore
	}
}

//validation cap
function checkCap(&$cap, &$erroreCap){
	if($cap==""){	//controllo che non sia vuoto
		$erroreCap = "Inserire il Cap";	//modifico valore dell'errore
		return 0;	//esce dalla funzione altrimenti entrerebbe nel secondo if che ha una condizione simile
	}
	if(!preg_match("/^[\d]{5}+$/",$cap)){	//controllo se NON rispetta le condizioni: avere 5 cifre
		$erroreCap = "Inserire un cap valido (5 cifre)";	//modifico valore dell'errore
	}
}

//validation username
function checkUsername(&$username, &$nome, &$cognome, &$erroreU){
	$username=trim($username);	//elimina spazi vuoti
	$nome=trim($nome);	//elimina spazi vuoti
	$cognome=trim($cognome);	//elimina spazi vuoti

	$nc=$nome.$cognome;	//variabiale composta da concatenazione del nome + cognome
	$cn=$cognome.$nome;	//variabiale composta da concatenazione del cognome + nome
	if($username==""){	//controllo che non sia vuoto
		$erroreU = "Inserire l'username";	//modifico valore dell'errore
		return 0;	//esce dalla funzione altrimenti entrerebbe nel secondo if che ha una condizione simile
	}
	//strcasecmp --> confronto tra stringhe NO CASE SENSITIVE
	if(strcasecmp($username,$nome)==0 || strcasecmp($username,$cognome)==0 || strcasecmp($username,$nc)==0 || strcasecmp($username,$cn)==0){	//controllo se l'username è diverso dal nome, dal cognome, dal nome+cognome e dal cognome+nome (eventuali caratteri speciali di congiugnione sono acettati)
		$erroreU = "L'username non può contenere il tuo nome o cognome";	//modifico valore dell'errore
	}
}

//validation password
function checkPassword(&$psw, &$erroreP) {
	if(empty($psw)){	//controllo che non sia vuoto
		$erroreP = "Inserire la password";	//modifico valore dell'errore
		return 0;	//esce dalla funzione altrimenti entrerebbe nel secondo if che ha una condizione simile
	}
	if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}+$/",$psw)){	//controllo se NON rispetta le condizioni: avere almeno una lettera minuscola, una maiuscola, un carattere speciale (tra quelli accettati) e un numero e che poi sia composta da 8 a 20 caratteri
		$erroreP = "Inserire una password valida (almeno un carattere minuscolo, uno maiuscolo, uno speciale e un numero)";	//modifico valore dell'errore
	}
}
?>
