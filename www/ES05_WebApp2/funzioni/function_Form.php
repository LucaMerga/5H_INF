<?php
// funzione form del login
function show_form(){
?>
	<div class="container"> <!-- div contenente il form e il titolo per modifiche css -->
		<h3 class="title">Accedi</h3> <!-- titolo del form -->
		<div class="contenuto"> <!-- div contenente il form per modifiche css -->
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">  <!-- form con metodo POST / chiamata a se stesso ($_SERVER['PHP_SELF']) / trasformazione caratteri speciali in caratteri html (htmlspecialchars) -->
				<div class="user-details">  <!-- div contenente gli input del form per modifiche css -->
					<div class="input-box"> <!-- div contenente ogni singolo input del form per modifiche css -->
						<label for="user">Username</label>  <!-- etichetta con il usern -->
						<input type="text" name="user" value="" placeholder="Username" id="user"> <!-- type text perchè si tratta di una stringa (user) -->
					</div>

					<div class="input-box">
						<label for="password">Password</label>
						<input type="password" name="password" value="" placeholder="Password" id="password"> <!-- type password perchè si tratta di una password -->
					</div>
				</div>

				<div class="button">  <!-- div contenente l'input del submit del form per modifiche css -->
					<input type="submit" value="login" name="login" id="btn"> <!-- type submit perchè si tratta di un bottone per l'invio dei dati -->
				</div>

				<div class="user-details">
					<div>
						<small>Non hai un account? <a href="registrazione.php">Registrati</a></small>	<!-- small per avere le scritte molto piccole -->
					</div>
					<div>
						<small>Torna a <a href="index.php">home</a></small>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
}

// funzione form della registrazione
function show_Rform(&$erroreE,&$erroreI,&$erroreU,&$erroreP,&$errorePr,&$email,&$indirizzo,&$username,&$psw){
?>
	<div class="container"> <!-- div contenente il form e il titolo per modifiche css -->
		<h3 class="title">Registrati</h3> <!-- titolo del form -->
		<div class="contenuto"> <!-- div contenente il form per modifiche css -->
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">  <!-- form con metodo POST / chiamata a se stesso ($_SERVER['PHP_SELF']) / trasformazione caratteri speciali in caratteri html (htmlspecialchars) -->
				<div class="user-details">  <!-- div contenente gli input del form per modifiche css -->
					<div class="input-box"> <!-- div contenente ogni singolo input del form per modifiche css -->
						<label for="user">Username*</label>  <!-- etichetta con il usern -->
						<input type="text" name="user" value="<?=$username?>" placeholder="Username" id="user"> <!-- type text perchè si tratta di una stringa (user) -->
						<span class="error"><?php echo $erroreU;?></span>
					</div>

					<div class="input-box">
						<label for="password">Password*</label>
						<input type="password" name="password" value="<?=$psw?>" placeholder="Password" id="password"> <!-- type password perchè si tratta di una password -->
						<span class="error"><?php echo $erroreP;?></span>
					</div>
					
					<div class="input-box">
						<label for="email">Email*</label>
						<input type="email" name="email" value="<?=$email?>" placeholder="Email" id="email">	<!-- type email perchè si tratta di un'email -->
						<span class="error"><?php echo $erroreE;?></span>
					</div>
					
					<div class="input-box">
						<label for="indirizzo">Indirizzo*</label>
						<input type="text" name="indirizzo" value="<?=$indirizzo?>" placeholder="Via/Piazza, civico" id="indirizzo">	<!-- type text perchè si tratta di una stringa (indirizzo) -->
						<span class="error"><?php echo $erroreI;?></span>
					</div>

					<div class="check-box">
						<input type="checkbox" name="privacy" value="privacy">	<!-- type checkbox perchè si tratta di una checkbox -->
						<label for="privacy"><a href="privacy.php" target="_blank">Informativa sulla privacy</a>*</label>	<!-- link alla pagina con la normativa -->
						<span class="error"><?php echo $errorePr;?></span>
					</div>
				</div>

				<div class="button">  <!-- div contenente l'input del submit del form per modifiche css -->
					<input type="submit" value="registrati" name="login" id="btn"> <!-- type submit perchè si tratta di un bottone per l'invio dei dati -->
				</div>

				<div class="user-details">
					<div>
						<small>Hai già un account? <a href="login.php">Accedi</a></small>	<!-- small per avere le scritte molto piccole -->
					</div>
					<div>
						<small>Torna a <a href="index.php">home</a></small>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
}

// funzione form del cambio password
function show_Pform(&$erroreP,&$errorePsw,&$password,&$psw){
?>
	<div class="container"> <!-- div contenente il form e il titolo per modifiche css -->
		<h3 class="title">Cambia password</h3> <!-- titolo del form -->
		<div class="contenuto"> <!-- div contenente il form per modifiche css -->
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">  <!-- form con metodo POST / chiamata a se stesso ($_SERVER['PHP_SELF']) / trasformazione caratteri speciali in caratteri html (htmlspecialchars) -->
				<div class="user-details">  <!-- div contenente gli input del form per modifiche css -->
					<div class="input-box"> <!-- div contenente ogni singolo input del form per modifiche css -->
						<label for="password">Nuova password</label>  <!-- etichetta con la nuova password -->
						<input type="password" name="password" value="<?=$password?>" placeholder="Password" id="password"> <!-- type password perchè si tratta di una password -->
						<span class="error"><?php echo $erroreP;?></span> <!-- eventuale messaggio d'errore -->
					</div>

					<div class="input-box">
						<label for="psw">Conferma password</label>
						<input type="password" name="psw" value="<?=$psw?>" placeholder="Password" id="psw"> <!-- type password perchè si tratta di una password -->
						<span class="error"><?php echo $errorePsw;?></span>
					</div>
				</div>

				<div class="button">  <!-- div contenente l'input del submit del form per modifiche css -->
					<input type="submit" value="cambia" name="login" id="btn"> <!-- type submit perchè si tratta di un bottone per l'invio dei dati -->
				</div>

				<div>
					<small>Torna a <a href="index.php">home</a></small>	<!-- small per avere le scritte molto piccole -->
				</div>
			</form>
		</div>
	</div>
<?php
}
?>