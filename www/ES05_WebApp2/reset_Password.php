<?php
    // avvio una nuova sessione riprendo quella esistente
    session_start();

    require('funzioni/function_Form.php');
    require('funzioni/function_CheckForm.php');
    require('funzioni/function_Reset_Password.php');

    //inizializzazione delle variabili 
	$password=$psw="";
	$erroreP=$errorePsw="";
?>

<html>
<head>
	<title>Web app2</title>

    <!-- importazione font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	
	<!-- importazione css -->
	<link rel="stylesheet" type="text/css" href="stile/Stile_WebApp2.css"/>
</head>
<body>
<?php 
	$username=$_SESSION['user'];	// uso della variabile di sessione per identificare l'utente
	if(!isset($_POST['login'])){    // controllo se i campi non sono stati inizializzati - mostro il form
		show_Pform($erroreP,$errorePsw,$password,$psw);
	}else{	// se invece sono stati inizializzati - controllo credenziali
		$password=$_POST['password'];$psw=$_POST['psw'];
		checkPassword($password, $erroreP);
		checkPsw($psw, $password, $errorePsw);
		check_OldPsw($password, $erroreP);
		
		//se non ci sono errori effetua l'accesso altrimenti ricarica il form (con eventuali errori)
		if($erroreP=="" && $errorePsw==""){
			list($val,$msg)=reset_Password($password,$username);	// list permette di restituire due valori con un solo return (bool, stringa)
			echo $msg;	//stampa del messaggio di conferma del login o errore
		}else{
			show_Pform($erroreP,$errorePsw,$password,$psw);	
		}
	}
?>
</body>
</html>