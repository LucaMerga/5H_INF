<?php
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
	if(!isset($_SESSION['nome']) || empty($_SESSION['nome'])){
        echo 'Non sei loggato non puoi fare il logout!';
        echo '<br><br>Vai a <a href="login.php">login</a>';
        echo '<br><br>Torna a <a href="index.php">home</a>';
    }else{
	echo 'Logout effettuato.';
    session_destroy();
?>
	<br><br>
    <a href="index.php">Torna alla home</a>
<?php
	}
?>
</body>
</html>