<?php
	// avvio una nuova sessione riprendo quella esistente
	session_start();
	
	require('funzioni/function_Form.php');
	require('funzioni/function_Login.php');
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
		show_form();
	}else{	// se invece sono stati inizializzati - chiamata della funzione login
		list($val,$msg)=login($_POST['user'], $_POST['password']);	// list permette di restituire due valori con un solo return (bool, stringa)
		echo $msg;	//stampa del messaggio di conferma del login o errore
	}
?>
</body>
</html>
