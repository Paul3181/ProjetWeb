<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Panel Controle Admoun please!</title>
    </head>
    <body>
    
        <?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "RushB") // Si le mot de passe est bon
    {
    // On affiche les codes
    ?>
	
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
  
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
  
		<div class="containerSpe">
			<div class="row">
				<div class="col-lg-12">
							<nav class="navbar navbar-inverse navbar-fixed-top">
							  <div class="container-fluid">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
								  </button>
								  <a class="navbar-brand" href="#">Administration</a>
								</div>
								<div>
								  <div class="collapse navbar-collapse" id="myNavbar">
									<ul class="nav navbar-nav">
									</ul>
								  </div>
								</div>
							  </div>
							</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div id="section1" class="container-fluid">
					  <h1>Ajout BDD</h1>
					  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
					  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
					</div>
				</div>
				
				<div class="col-lg-6">	
					<div id="section2" class="container-fluid">
					  <h1>Avis</h1>
					  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
					  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
					</div>
				
				</div>
			</div>
				<?php include("./include/footer.php"); ?>
		</div>
			

  </body>
        
	
		
		
        <?php
    }
    else // Sinon, on affiche un message d'erreur
    {
        echo '<p>Mot de passe incorrect</p>';
    }
    ?>
    
        
    </body>
</html>
