<?php
    // avvio una nuova sessione riprendo quella esistente
    session_start();
	
	require('funzioni/function_Form.php');
	require('funzioni/function_CheckForm.php');
	require('funzioni/function_Signin.php');
	
	//inizializzazione delle variabili 
	$erroreE=$erroreI=$erroreU=$erroreP=$errorePr="";
	$email=$indirizzo=$username=$psw=$privacy="";
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
	if(!isset($_POST['login'])){    // controllo se i campi non sono stati inizializzati - mostro il form
		show_Rform($erroreE,$erroreI,$erroreU,$erroreP,$errorePr,$email,$indirizzo,$username,$psw);
	}else{	// se invece sono stati inizializzati - controllo credenziali
		$email=$_POST['email'];$indirizzo=$_POST['indirizzo'];$username=$_POST['user'];$psw=$_POST['password'];
		$privacy = isset($_POST['privacy']) ? $_POST['privacy'] : " ";	// operatore ternario - if(isset($_POST['privacy'])){ $privacy = $_POST['privacy']; }else{ $privacy = " "; }
		checkMail($email, $erroreE);
		checkIndirizzo($indirizzo, $erroreI);
		checkUsername($username, $erroreU);
		checkPassword($psw, $erroreP);
		checkPrivacy($privacy,$errorePr);
		
		//se non ci sono errori effetua l'accesso altrimenti ricarica il form (con eventuali errori)
		if($erroreE=="" && $erroreI=="" && $erroreU=="" && $erroreP=="" && $errorePr==""){
			list($val,$msg)=signin($username,$psw,$email,$indirizzo);	// list permette di restituire due valori con un solo return (bool, stringa)
			echo $msg;	//stampa del messaggio di conferma del login o errore
		}else{
			show_Rform($erroreE,$erroreI,$erroreU,$erroreP,$errorePr,$email,$indirizzo,$username,$psw);	
		}
	}
?>
</body>
</html>