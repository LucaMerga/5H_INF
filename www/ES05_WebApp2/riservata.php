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
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){  // se non esiste - mostro messaggio d'errore e i 2 link
        echo "Non sei loggato non puoi entrare!";
        echo "<br><br>Vai a <a href='login.php'>login</a>";
        echo "<br><br>Torna a <a href='index.php'>home</a>";
    }else{  // se esiste - mostro messaggio di benvenuto e i link per tornare alla home o per fare il logout
        echo "Benvenuto " . $_SESSION['user'] . " nella tua pagina riservata.";
?>
        <br><br>
        Torna a <a href="index.php">home</a>
        <br><br>
        <a href="logout.php">Logout</a>
<?php
    }
?>
</body>
</html>