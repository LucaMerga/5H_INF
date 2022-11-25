<html>
<head>
	<title>Login</title>

	<!-- importazione font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	
	<!-- importazione css -->
	<link rel="stylesheet" type="text/css" href="Stile/Stile_Form3.css"/>
</head>
<body>
<?php

	//chiamata del file php con le funzioni
	require('Function_Form.php');

	//inizializzazione delle variabili 
	$erroreN=$erroreC=$erroreD=$erroreE=$erroreT=$erroreI=$errorePr=$erroreCm=$erroreCap=$erroreU=$erroreP="";
	$nome=$cognome=$data=$email=$telefono=$indirizzo=$provincia=$comune=$cap=$username=$psw="";
	
	//se i campi sono inizializzati (tutte le volte che premi il tasto login)
	if(isset($_POST['login'])){
		//avvaloro le variabili degli input con i valori inseriti dall'utente
		$nome=$_POST['nome'];$cognome=$_POST['cognome'];$data=$_POST['data'];$email=$_POST['email'];$telefono=$_POST['telefono'];$indirizzo=$_POST['indirizzo'];$provincia=$_POST['provincia'];$comune=$_POST['comune'];$cap=$_POST['cap'];$username=$_POST['username'];$psw=$_POST['psw'];
		
		//richiamo funzioni per la validation
		checkNome($nome, $erroreN);
		checkCognome($cognome, $erroreC);
		checkData($data, $erroreD);
		checkMail($email, $erroreE);
		checkTel($telefono, $erroreT);
		checkIndirizzo($indirizzo, $erroreI);
		checkProvincia($provincia, $errorePr);
		checkComune($comune, $erroreCm);
		checkCap($cap, $erroreCap);
		checkUsername($username, $nome, $cognome, $erroreU);
		checkPassword($psw, $erroreP);
		
		//se non ci sono errori effetua l'accesso altrimenti ricarica il form (con eventuali errori)
		if($erroreN=="" && $erroreC=="" && $erroreD=="" && $erroreE=="" && $erroreT=="" && $erroreI=="" && $errorePr=="" && $erroreCm=="" && $erroreCap=="" && $erroreU=="" && $erroreP==""){
			echo 'Benvenuto '.$nome.' nella tua pagina riservata.';
		}
		else{
			form($erroreN,$erroreC,$erroreD,$erroreE,$erroreT,$erroreI,$errorePr,$erroreCm,$erroreCap,$erroreU,$erroreP);	
		}
	}
	//altrimenti (prima volta che si carica la pagina) carico il form
	else{	
		form($erroreN,$erroreC,$erroreD,$erroreE,$erroreT,$erroreI,$errorePr,$erroreCm,$erroreCap,$erroreU,$erroreP);
	}

	//funzione contenente il form avente come parametri i messaggi di errore
	function form(&$erroreN,&$erroreC,&$erroreD,&$erroreE,&$erroreT,&$erroreI,&$errorePr,&$erroreCm,&$erroreCap,&$erroreU,&$erroreP){
		//richiamo degli attributi globali per i valori del form
		global $nome,$cognome,$data,$email,$telefono,$indirizzo,$provincia,$comune,$cap,$username,$psw;
?>
		<div class="container">	<!-- div contenente il form e il titolo per modifiche css -->
			<h3 class="title">Benvenuto</h3>	<!-- titolo del form -->
			<div class="contenuto">	<!-- div contenente il form per modifiche css -->
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">	<!-- form con metodo POST / chiamata a se stesso ($_SERVER['PHP_SELF']) / trasformazione caratteri speciali in caratteri html (htmlspecialchars) -->

					<div class="user-details">	<!-- div contenente gli input del form per modifiche css -->
						<div class="input-box">	<!-- div contenente ogni singolo input del form per modifiche css -->
							<label for="nome">Nome*</label>	<!-- etichetta con il nome -->
							<input type="text" name="nome" value="<?=$nome?>" placeholder="Nome" id="nome">	<!-- type text perchè si tratta di una stringa (nome) -->
							<span class="error"><?php echo $erroreN;?></span>	<!-- eventuale messaggio d'errore -->
						</div>

						<div class="input-box">
							<label for="cognome">Cognome*</label>
							<input type="text" name="cognome" value="<?=$cognome?>" placeholder="Cognome" id="cognome">	<!-- type text perchè si tratta di una stringa (cognome) -->
							<span class="error"><?php echo $erroreC;?></span>
						</div>

						<div class="input-box">
							<label for="data">Data di Nascita*</label>
							<input type="date" name="data" value="<?=$data?>" id="data" max="2004-12-31">	<!-- type data perchè si tratta di una data -->
							<span class="error"><?php echo $erroreD;?></span>
						</div>

						<div class="input-box">
							<label for="email">Email*</label>
							<input type="email" name="email" value="<?=$email?>" placeholder="Email" id="email">	<!-- type email perchè si tratta di un'email -->
							<span class="error"><?php echo $erroreE;?></span>
						</div>

						<div class="input-box">
							<label for="telefono">Telefono</label>
							<input type="tel" name="telefono" value="<?=$telefono?>" placeholder="Telefono" id="telefono">	<!-- type tel perchè si tratta di un numero di telefono -->
							<span class="error"><?php echo $erroreT;?></span>
						</div>
						
						<div class="input-box">
							<label for="indirizzo">Indirizzo*</label>
							<input type="text" name="indirizzo" value="<?=$indirizzo?>" placeholder="Via/Piazza, civico" id="indirizzo">	<!-- type text perchè si tratta di una stringa (indirizzo) -->
							<span class="error"><?php echo $erroreI;?></span>
						</div>

						<div class="input-box">
							<label for="provincia">Provincia*</label>
							<input type="text" name="provincia" value="<?=$provincia?>" placeholder="Provincia" id="provincia">	<!-- type text perchè si tratta di una stringa (provincia) -->
							<span class="error"><?php echo $errorePr;?></span>
						</div>

						<div class="input-box">
							<label for="comune">Comune*</label>
							<input type="text" name="comune" value="<?=$comune?>" placeholder="Comune" id="comune">	<!-- type text perchè si tratta di una stringa (comune) -->
							<span class="error"><?php echo $erroreCm;?></span>
						</div>

						<div class="input-box">
							<label for="cap">Cap*</label>
							<input type="number" name="cap" value="<?=$cap?>" placeholder="Cap"  id="cap">	<!-- type number perchè si tratta di un numero (cap) -->
							<span class="error"><?php echo $erroreCap;?></span>
						</div>

						<div class="input-box">
							<label for="username">Username*</label>
							<input type="text" name="username" value="<?=$username?>" placeholder="Username" id="username">	<!-- type text perchè si tratta di una stringa (username) -->
							<span class="error"><?php echo $erroreU;?></span>
						</div>

						<div class="input-box">
							<label for="psw">Password*</label>
							<input type="password" name="psw" value="<?=$psw?>" placeholder="Password" id="password">	<!-- type password perchè si tratta di una password -->
							<span class="error"><?php echo $erroreP;?></span>
						</div>
					</div>
					<div class="button">	<!-- div contenente l'input del submit del form per modifiche css -->
						<input type="submit" value="login" name="login" id="btn">	<!-- type submit perchè si tratta di un bottone per l'invio dei dati -->
					</div>
				</form>
			</div>
		</div>
<?php
	}
?>
</body>
</html>
