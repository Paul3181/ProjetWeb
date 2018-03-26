<!DOCTYPE html>
<html lang="fr">
    <head>
		<?php include("./include/head.php"); ?>
	</head>
		
	<script type="text/javascript">

			$(document).ready(function(){
				$("#panel").hover(function(){
					$("#panel").delay(1500).slideUp("slow");
				});
			});
						
			
		</script>

	
  </head>
  
  <body>
		<div id="panel"></div>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>Projet web</h1>
				</div>
			</div>
			
						<div class="row">
				<form>
												
					<div class="form-group">
						<label for="exampleInputEmail1">Rechercher un master</label>
							<div class="row">
							
								<div class="col-sm-10">	
									<input type="recherche" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ex: Réseaux">
							
								</div>

								<div class="col-sm-2" >
									<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
								</div>
							</div>
					</div>					
				</form>			
			</div>
			<div class="row">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Recherche Avancée</button>
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-globe" aria-hidden="true"></span>  Recherche par localité</button>
			
			</div>
			
	
			
		</div>
		
		<?php include("./include/footer.php"); ?>

	

  </body>
</html>