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
					<h1>Nom de la formation</h1>
				</div>
			</div>
			
			<div class="row">
				<ul class="nav nav-tabs">
				  <li class="nav-item">
					<a class="nav-link" href="master.php">Présentation</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="masterAvis.php">Avis</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">Statistique</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link active" href="#">Contact Anciens Etudiants</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				  </li>
				</ul>						
			</div>
			
			<div class="row">
				<div class="col-lg-6">
					Liste des anciens étudiants:
						<?php
						require_once("./include/connect.inc.php");
						//TODO
						?>
					
				</div>
			</div>
			
			
		
				
		</div>
		
		<?php include("./include/footer.php"); ?>

	

  </body>
</html>