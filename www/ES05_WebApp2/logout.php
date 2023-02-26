<?php
    // avvio una nuova sessione riprendo quella esistente
    session_start();
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
	// distruggo tutti i dati della sessione 
	session_destroy();
	echo "Logout effettuato.";
?>
	<br><br>
	Torna alla <a href="index.php">home</a>
</body>
</html>