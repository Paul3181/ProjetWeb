<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("./include/head.php"); ?>
    <link href="./include/css/comments.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
//On recupere les avis
$reponse6 = $conn->query('SELECT * FROM avis_attente WHERE id_master=' . $_GET['idm']);

//On recupere la description
$reponse7 = $conn->query('SELECT * FROM description_attente WHERE id_master=' . $_GET['idm']);

//On recupere l'établissement
$reponse8 = $conn->query('SELECT * FROM formation AS form INNER JOIN etablissement AS etab ON form.fk_id_etablissement_form = etab.id_etablissement AND id_formation=' . $_GET['idm']);

//Le formulaire de description
if(isset($_POST['submit_desc'])) {
	$sql = "INSERT INTO description_attente (id_master, nom, prenom, detail_desc)VALUES('". $master[0] . "', '". $_POST["nom"] . "','" . $_POST["prenom"] . "','" . $_POST["desc"] . "')";
	if ($conn->query($sql) == TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

//Le formulaire d'avis
if(isset($_POST['submit_avis'])) {
	$sql2 = "INSERT INTO avis_attente(id_master, nom, prenom, detail_avis, star) VALUES ('". $master[0] ."', '". $_POST['nom'] . "','" . $_POST['prenom'] . "', '" . $_POST['avis'] . "', '" . $_POST['note'] . "')";
	if ($conn->query($sql2) == TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
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
                                <li><a href="#section3">Statistiques</a></li>
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
                <h1 style="margin: 20px 0 70px 0;"><?php echo $master[1]?></h1>
                <div class="description">
					<div id="map"></div>
          <?php echo $master[7]; ?>
					<?php
						while ($description = $reponse7->fetch()){
							echo '<p> '. $description[4] .' </p>';
						}
						while ($master = $reponse8->fetch()){
							$latitude = $master['latitude_etab'];
							$longitude = $master['longitude_etab'];
							$coords[] = array($latitude,$longitude);
							$nom = $master['nom_etab'];
						}
					?>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
                    Modifier la description
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
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name ="desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-5 col-xs-offset-3">
											<button type="submit" class="btn btn-primary" name="submit_desc">Envoyer</button>
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
					<section class="comment-list">
					<?php
						$compteur=0;
						$count = 0;
						$stars = array();
						while ($avis = $reponse6->fetch()){
							$count = $reponse6->rowCount();
							$star = $avis[5];
							array_push($stars, $star);
							?>
							<article class="row">
								<div class="col-md-2 col-sm-2 hidden-xs">
								  <figure class="thumbnail">
									<img class="img-responsive" src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" />
								  </figure>
								</div>
								<div class="col-md-10 col-sm-10">
								  <div class="panel panel-default arrow left">
									<div class="panel-body">
									  <header class="text-left">
										<?php echo '<div class="comment-user" id=comment'.$compteur.'> '. $avis[3] .' '. $avis[2] .' </div>'; ?>
										<!--<time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>-->
									  </header>
									  <div class="comment-post">
										<?php echo '<p>'. $avis[4] .'</p>';?>
									  </div>
									</div>
								  </div>
								</div>
							  </article>
							<?php
							$compteur++;
						}

					?>

					</section>
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
                                            <input type="text" class="form-control" name="nom" required="obligatoire"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Prénom</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="prenom" required="obligatoire"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Avis</label>
                                        <div class="col-xs-8">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name ="avis" required="obligatoire"></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
										<label class="col-xs-3 control-label">Note</label>
										<div class="col-xs-5">
											<select name="note" id="note" class="form-control">
												<option selected>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="col-xs-5 col-xs-offset-3">
                                            <button type="submit" name="submit_avis" class="btn btn-primary">Envoyer</button>
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
                <h3>Statistiques</h3>
                <div id="piechartMoyenne" style="width: 100%; height: 500px;"></div>
                <div id="piechartStatut" style="width: 100%; height: 500px;"></div>
                <h4><?php echo $nbEntreprise[0] . ' entreprises en contact dans la region'?></h4>
            </div>

            <hr>

            <div id="section4">
                <h3>Contacts</h3>
					<table class="table table-striped">
					  <thead>
						<tr>
						  <th scope="col">Nom</th>
						  <th scope="col">Prénom</th>
						  <th scope="col">E-mail</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
							while ($etud = $reponse2->fetch()){
								echo '<tr><td>'. $etud[1] .'</td><td>'. $etud[2] .'</td><td>'. $etud[3] .'</td></tr>';
							}
						?>
					  </tbody>
					</table>

            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>

<script>
	var count = "<?php echo $count ?>";
	$('#section2 h3').append('<span class="badge badge-secondary">'+count+'</span>');
	if(count>0){
		var starTab = <?php echo json_encode($stars); ?>;
		for (i=0;i<starTab.length;i++){
			for (var iter = 0; iter < starTab[i]; iter++) {
				$('#comment'+i).append('<span class="fa fa-star checked"></span>');
			}
			for (var iter = 0; iter < 5-starTab[i]; iter++) {
				$('#comment'+i).append('<span class="fa fa-star"></span>');
			}

		}
	}

		var coords = <?php echo json_encode($coords); ?>;
		var nom = <?php echo json_encode($nom); ?>;
		var map = L.map('map');
		var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		var osmAttrib='Map data © OpenStreetMap contributors';
		var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
		map.setView(coords[0], 13);
		map.addLayer(osm);
		var marker = L.marker(coords[0]);
		marker.bindPopup('<b>'+nom+'</b>').openPopup();
		map.addLayer(marker);

</script>


</body>
</html>
