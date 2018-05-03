<!DOCTYPE html>
<html lang="fr">
    <head>
		<?php include("./include/head.php"); ?>
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
					  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
					  <p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>
					</div>
					<div id="section2">
					  <h3>Avis</h3>
					  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
					  <p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>
					</div>
					<div id="section3">
					  <h3>Statistiques</h3>
                        <div id="piechartMoyenne" style="width: 900px; height: 500px;"></div>
                        <div id="piechartStatut" style="width: 900px; height: 500px;"></div>
                        <h4><?php echo $nbEntreprise[0] . ' entreprises en contact dans la region'?></h4>
					</div>
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
			

  </body>

</html>