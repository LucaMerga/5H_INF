<?php
    // avvio una nuova sessione riprendo quella esistente
    session_start();
?>

<html>
<head>
	<title>Web app1</title>

    <!-- importazione font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	
    <!-- importazione css -->
	<link rel="stylesheet" type="text/css" href="stile/Stile_WebApp1.css"/>
</head>
<body>
<?php
    // controllo esistenza della sessione
    if(!isset($_SESSION['nome']) || empty($_SESSION['nome'])){  // se non esiste - mostro i 3 link
?>
        <h1>Web app1</h1>
        <a href="login.php">Login</a>
        <br><br>
        <a href="riservata.php">Riservata</a>
        <br><br>
        <a href="logout.php">Logout</a>
<?php
    }else{  // se esiste - mostro i 2 link (senza login)
?>
        <h1>Web app1</h1>
        <a href="riservata.php">Riservata</a>
        <br><br>
        <a href="logout.php">Logout</a>     
<?php   
    }
?>
</body>
</html>
