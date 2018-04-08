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
		}
		.masthead li {
			border-bottom : solid 1px #000;
		}
	</style>
	<body  onload="plus()">
		<div id="page">


			
					
					<body>
					<div class="containerSpe">
						
						<div class="col-lg-12">
						<p>Bonjour, entrez le mot de passe :</p>
						<form action="checklogin.php" method="post">
							<p>
							<input type="password" name="mot_de_passe" />
							<input type="submit" value="Valider" />
							</p>
						</form>
						<p>Cette page est réservée à l'administration du site. Si vous n'en faites pas partie, velliez cliquer sur "Quitter" ! ;-)</p>
						
					</div>
					</div>
					</body>
	
			

			<?php include("./include/footer.php"); ?>

		</div>
		
	</body>
</html>
