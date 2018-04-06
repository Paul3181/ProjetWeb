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

    <?php
    require_once('include/connect.inc.php');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $reponse1 = $conn->query('SELECT * FROM formation WHERE id_formation=2');
    $master = $reponse1->fetch();

    $reponse2 = $conn->query('SELECT * FROM ancien_etudiant ae, a_effectue e WHERE ae.id_etud = e.fk_id_etud and e.fk_id_formation ='. $master[0]);



    ?>

  
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
  
		<div class="containerSpe">
			<div class="row">
				<div class="col-lg-12">
							<nav class="navbar-inverse navbar-fixed-top">
							  <div class="container-fluid">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
								  </button>
                                    <?php
								  echo'<a class="navbar-brand" href="#">'. $master[2] . '</a>'
								  ?>
								</div>
								<div>
								  <div class="collapse navbar-collapse" id="myNavbar">
									<ul class="nav navbar-nav">
									  <li><a href="#section1">Presentation</a></li>
									  <li><a href="#section2">Avis</a></li>
									  <li><a href="#section3">Statistique</a></li>
									  <li><a href="#section4">Contacts</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							</nav>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div id="section1" class="container-fluid">
					  <h1><?php echo $master[1]?></h1>
					  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
					  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
					</div>
					<div id="section2" class="container-fluid">
					  <h1>Avis</h1>
					  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
					  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
					</div>
					<div id="section3" class="container-fluid">
					  <h1>Statistique</h1>
					  <p>Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.</p>
					  <p>Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.</p>
					</div>
					<div id="section4" class="container-fluid">
					  <h1>Contacts</h1>
                        <?php
                        while ($etud = $reponse2->fetch()){
                            echo $etud[2] . '   ' . $etud[1] . "\n";
                        }

                        ?>
					</div>
				</div>
			</div>
		</div>
			

  </body>
</html>