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
    // controllo esistenza della sessione
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){  // se non esiste - mostro i link 
?>
        <h1>Web app2</h1>
		<a href="registrazione.php">Registrati</a>
        <br><br>
        <a href="login.php">Login</a>
        <br><br>
        <a href="riservata.php">Riservata</a>
<?php
    }else{  // se esiste - mostro i link
?>
        <h1>Web app2</h1>
        <a href="riservata.php">Riservata</a>
        <br><br>
        <a href="reset_Password.php">Resetta password</a>
        <br><br>
		<a href="delete_User.php">Cancella account</a>
        <br><br>
        <a href="logout.php">Logout</a>     
<?php   
    }
?>
</body>
</html>