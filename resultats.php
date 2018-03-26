<!DOCTYPE html>
<html lang="fr">
    <head>
		<?php include("./include/head.php"); ?>
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
	
  </head>
  
  <body>

			
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>Les resultats...</h1>
				</div>
			</div>
		<?php
				require_once('include/connect.inc.php');
				echo 'test Affichage de tous les master : <br />';
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$reponse = $conn->query('SELECT * FROM formation');
				$donnees = $reponse->fetch();
					while ($donnees = $reponse->fetch())
					{
					echo $donnees['intitule_form'] . '<br />';
					}
					$reponse->closeCursor();
		?>	
			
			
		
				
		</div>
		
		<?php include("./include/footer.php"); ?>

	

  </body>
</html>