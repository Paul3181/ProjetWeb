<!DOCTYPE html>
<html lang="fr">
    <head>
		<?php include("./include/head.php"); ?>
		<link href="./include/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
		<link href="./include/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="./include/js/star-rating.js" type="text/javascript"></script>
		<script src="./include/js/star-rating.min.js" type="text/javascript"></script>
	</head>


    <?php
    require_once('include/connect.inc.php');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //On recupere le master
    $reponse1 = $conn->query('SELECT * FROM formation WHERE id_formation=' . $_GET['idm']);
    $master = $reponse1->fetch();

    //On recupere les etudiants du master
    $reponse2 = $conn->query('SELECT * FROM ancien_etudiant ae, a_effectue e WHERE ae.id_etud = e.fk_id_etud and e.fk_id_formation ='. $master[0]);

    //On recupere les mentions
    $reponse3 = $conn->query('SELECT * FROM moyenne_l3');
    $tabMoyenne = array();
    while ($mention = $reponse3->fetch()){
        $cpt = $conn->query('SELECT COUNT(*) FROM ancien_etudiant ae, a_effectue e WHERE ae.id_etud = e.fk_id_etud and e.fk_id_formation ='. $master[0] .' and ae.fk_id_moyenne_l3_etud='. $mention[0]);
        $nbrM = $cpt->fetch();
        $tab = array($mention[1],$nbrM[0]);
        $tabMoyenne[] = ($tab);
    }

    //On recupere le nombre d'entreprise dans la region
    $reponse4 = $conn->query('Select COUNT(id_entreprise) from entreprise where fk_id_region_ese = (SELECT DISTINCT fk_id_region_etab FROM etablissement e, formation f WHERE e.id_etablissement = (SELECT fk_id_etablissement_form from formation WHERE id_formation ='. $_GET['idm'] . '))');
    $nbEntreprise = $reponse4 -> fetch();

    //On recupere le statut des etudiants
    $reponse5 = $conn->query('SELECT * FROM statut');
    $tabStatut = array();
    while ($statut = $reponse5->fetch()) {
        $cpt = $conn->query('SELECT COUNT(*) FROM ancien_etudiant ae, a_effectue e WHERE ae.id_etud = e.fk_id_etud and e.fk_id_formation =' . $master[0] . ' and e.fk_statut_id=' . $statut[0]);
        $nbrS = $cpt->fetch();
        $tabS = array($statut[1], $nbrS[0]);
        $tabStatut[] = ($tabS);
    }
    ?>


    <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChartMoyenne);
        google.charts.setOnLoadCallback(drawChartReussite);


        function drawChartMoyenne() {

            var moyenne = new Array(['Nombre Etudiants','Mention']);
            <?php foreach($tabMoyenne as $key => $val){ ?>
            moyenne.push(['<?php echo $val[0]; ?>',<?php echo $val[1]; ?>]);
            <?php } ?>

            var dataMoyenne = google.visualization.arrayToDataTable(moyenne);

            var optionsMoyenne = {
                title: 'Mention l3 des étudiants:'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechartMoyenne'));

            chart.draw(dataMoyenne, optionsMoyenne);
        }

        function drawChartReussite() {

            var reussite = new Array(['Nombre Etudiants','Statut']);
            <?php foreach($tabStatut as $key => $val){ ?>
            reussite.push(['<?php echo $val[0]; ?>',<?php echo $val[1]; ?>]);
            <?php } ?>

            var dataStatut = google.visualization.arrayToDataTable(reussite);

            var optionsStatut = {
                title: 'Statut des étudiants du master:'
            };

            var chart2 = new google.visualization.PieChart(document.getElementById('piechartStatut'));

            chart2.draw(dataStatut, optionsStatut);
        }
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
					<div id="section1">
					  <h1><?php echo $master[1]?></h1>
					  <div class="description">
						  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
						  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
					  </div>
					  <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
						  Modification de la description
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Description</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								<form id="descriptionForm" method="post" class="form-horizontal">
									<div class="form-group">
										<label class="col-xs-3 control-label">Nom</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="nom" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">Prénom</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="prenom" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">Description</label>
										<div class="col-xs-8">
											<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-5 col-xs-offset-3">
											<button type="submit" class="btn btn-primary">Envoyer</button>
										</div>
									</div>
								</form>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							  </div>
							</div>
						  </div>
						</div>
					</div>
					
					<hr>
					
					<div id="section2">
					  <h3>Avis</h3>
					  <div class="avis">
						  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
						  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
					  </div>
					  <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">
						  Donner son avis
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Avis</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								<form id="avisForm" method="post" class="form-horizontal">
									<div class="form-group">
										<label class="col-xs-3 control-label">Nom</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="nom" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">Prénom</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="prenom" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">Avis</label>
										<div class="col-xs-8">
											<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
									</div>
									<div class="form-group">
										<input id="input-21b" value="0" type="text" class="rating" data-min=0 data-max=5 data-step=0.2 data-size="lg"
											   required title="">
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="col-xs-5 col-xs-offset-3">
											<button type="submit" class="btn btn-primary">Envoyer</button>
										</div>
									</div>
								</form>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							  </div>
							</div>
						  </div>
						</div>
					</div>
					
					<hr>
					
					<div id="section3">
					  <h3>Statistique</h3>
                        <div id="piechartMoyenne" style="width: 900px; height: 500px;"></div>
                        <div id="piechartStatut" style="width: 900px; height: 500px;"></div>
                        <h4><?php echo $nbEntreprise[0] . ' entreprises en contact dans la region'?></h4>
					</div>
					
					<hr>
					
					<div id="section4">
					  <h3>Contacts</h3>
                        <?php
                        while ($etud = $reponse2->fetch()){
                            echo $etud[2] . '   ' . $etud[1] . "\n" . $etud[3] . "\n";
                        }
                        ?>
					</div>
				</div>
			</div>
		</div>
		
		<script>
		</script>
			

  </body>
</html>