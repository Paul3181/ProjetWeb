<!DOCTYPE html>
<html>
	<head>
		<?php include("./include/head.php"); ?>
		<title>Page protégée par mot de passe</title>
	</head>
		<script type="text/javascript">

			$(document).ready(function() {
				
									
				});
						
			
		</script>
	<style>
		body {
			padding-top: 20px;
			padding-bottom: 20px;
			margin: 5px;
		}
		.masthead li {
			border-bottom : solid 1px #000;
		}
	</style>
	<body>
		<div id="page">

					<body>
					
						<div class="col" style="font-size: 18px">
						<form action="index.php" method="post">
							<p>	
							<input type="submit" value="Quitter" />
							</p>
						</form>
						</div>
						<div class="row">
			
						<h1 style="font-size: 40px; font-weight: 700;">Accès Administratif </h1>
						
						</div>
						
						<div class="containerSpe">
						<div class="row" style="font-size: 18px">
						<div class="col-lg-12" style="margin-top:30px">
						
						<p>Bonjour, entrez le mot de passe :</p>
						
						<div class="row">
						<form action="checklogin.php" method="post">
							<p>
							<input type="password" name="mot_de_passe" />		
							<input type="submit" value="Valider" />
							</p>
						</form>
						
						</div>
						<p>Cette page est réservée à l'administration du site. Si vous n'en faites pas partie, velliez cliquer sur "Quitter" ! ;-)</p>
						
						</div>
						
						</div>
					</div>
					</body>
	
			


		</div>
					

	</body>
</html>
