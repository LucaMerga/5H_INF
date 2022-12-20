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
	
</head>
<body>
<?php
    echo 'ciao . $_SESSION['nome']';
?>
    <br><br>
    <a href="index.php">torna alla home</a>
    <br><br>
    <a href="logout.php">logout</a>
</body>
</html>