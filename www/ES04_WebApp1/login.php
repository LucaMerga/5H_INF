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
    if(!isset($_SESSION['nome']) || empty($_SESSION['nome'])){  // se non esiste - carico il form o controllo le credenziali
        if(!isset($_POST['login'])){    // controllo se i campi non sono stati inizializzati - mostro il form
            $nome="";$password="";
?>
            <div class="container">	<!-- div contenente il form e il titolo per modifiche css -->
                <h3 class="title">Accedi</h3>	<!-- titolo del form -->
                <div class="contenuto">	<!-- div contenente il form per modifiche css -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">	<!-- form con metodo POST / chiamata a se stesso ($_SERVER['PHP_SELF']) / trasformazione caratteri speciali in caratteri html (htmlspecialchars) -->

                        <div class="user-details">	<!-- div contenente gli input del form per modifiche css -->
                            <div class="input-box">	<!-- div contenente ogni singolo input del form per modifiche css -->
                                <label for="nome">Nome</label>	<!-- etichetta con il nome -->
                                <input type="text" name="nome" value="<?=$nome?>" placeholder="Nome" id="nome">	<!-- type text perchè si tratta di una stringa (nome) -->
                                <!--<span class="error"><?php echo $erroreN;?></span>	 eventuale messaggio d'errore -->
                            </div>

                            <div class="input-box">
                                <label for="password">Password*</label>
                                <input type="password" name="password" value="<?=$password?>" placeholder="Password" id="password">	<!-- type password perchè si tratta di una password -->
                                <!--<span class="error"><?php echo $erroreC;?></span> -->
                            </div>
                        </div>

                        <div class="button">	<!-- div contenente l'input del submit del form per modifiche css -->
                            <input type="submit" value="login" name="login" id="btn">	<!-- type submit perchè si tratta di un bottone per l'invio dei dati -->
                        </div>
                    </form>
                </div>
                Torna a <a href="index.php">home</a>
		    </div>
<?php     
        }else{  // se invece sono stati inizializzati - controllo credenziali
            $nome=$_POST['nome'];
            $psw=$_POST['password'];
            //controllo credenziali
            if($nome=="Luca" && $psw=="ciao"){  // se corrispondono creo variabili di sessione e carcio riservata.php
                $_SESSION['nome']=$nome;
                $_SESSION['psw']=$psw;
                header("location: riservata.php");
            }
            else{   // altrimenti mostro messaggio d'errore con link per tornare a home e login
                echo 'non puoi accedere alla pagina riservata con queste credenziali!';
                echo '<br><br>Torna a <a href="login.php">login</a>';
                echo '<br><br>Torna a <a href="index.php">home</a>';
            }
        }
    }  
?>
</body>
</html>