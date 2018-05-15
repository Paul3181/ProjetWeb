<!DOCTYPE html>
<html lang="fr">
    <head>
		<?php include("./include/head.php"); ?>
        <link rel="stylesheet" href="./include/css/sidebar.css"/>
		
		<!--Leaflet MarkerCluster-->
		<link rel="stylesheet" href="./include/css/MarkerCluster.css"/>
		<link rel="stylesheet" href="./include/css/MarkerCluster.Default.css"/>
		<script src="./include/js/leaflet.markercluster.js"></script>
		<script src="./include/js/leaflet.markercluster-src.js"></script>

		<!--Angular-->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	</head>

    <body ng-app="myApp" ng-controller="myCtrl">
	
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="active">
                <form action="index.php#results" method="GET">
				  <div class="form-group">
					<label for="query">Formation</label>
					<?php
									require_once('include/connect.inc.php');
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									if (isset($_GET['query'])){
										echo '<input type="search" class="form-control" id="query" name="query" value="'.$_GET['query'].'" placeholder="Ex: Réseaux" ng-model="name">';
									}else{
										echo '<input type="search" class="form-control" id="query" name="query" placeholder="Ex: Réseaux" ng-model="name">';
									}
					?>
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlSelect1">Type</label>
					<div class="form-check form-check-inline">
					  <?php
									$reponse = $conn->query('SELECT DISTINCT type_form FROM formation');
									$i=1;
										while ($donnees = $reponse->fetch()){
											if(isset($_GET['inName'. $i .''])){
												echo '<label class="container">' . $donnees[0] . '
														  <input type="checkbox" name="inName'. $i .'" value="' . $donnees[0] . ' " checked>
														  <span class="checkmark"></span>
													</label>';
											}else{
												echo '<label class="container">' . $donnees[0] . '
														  <input type="checkbox" name="inName'. $i .'" value="' . $donnees[0] . '">
														  <span class="checkmark"></span>
													</label>';
											}
											$i++;
										}
										$reponse->closeCursor();
						?>
					</div>
					</div>
					<div class="form-group">
					<label for="exampleFormControlSelect1">Formation en alternance</label>
					<div class="form-check form-check-inline">
					  <?php
											if(isset($_GET['alter'])){
												echo '<label class="container">
														  <input type="checkbox" name="alter" value="Oui" checked>
														  <span class="checkmark"></span>
													</label>';
											}else{
												echo '<label class="container">
														  <input type="checkbox" name="alter" value="Oui">
														  <span class="checkmark"></span>
													</label>';
											}
						?>
					</div>
					</div>
					<div class="form-group">
						<label for="inputSpe">Spécialité</label>
						<select name="inputSpe" id="inputSpe" class="form-control">
							<option selected>Indéfini(e)</option>
							<?php
										$reponse = $conn->query('SELECT lib_specialite FROM specialite');
											while ($donnees = $reponse->fetch()){
												echo '<option>' . $donnees[0] . '</option>';
											}
											$reponse->closeCursor();
											
											if (isset($_GET['inputSpe'])){
												echo '<option selected>' . $_GET['inputSpe'] . '</option>';
											}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="inputReg">Régions</label>
						<select name="inputReg" id="inputReg" class="form-control">
							<option selected>Indéfini(e)</option>
							<?php
										$reponse = $conn->query('SELECT nom_region FROM region');
											while ($donnees = $reponse->fetch()){
												echo '<option>' . $donnees[0] . '</option>';
											}
											$reponse->closeCursor();
											
											if (isset($_GET['inputReg'])){
												echo '<option selected>' . $_GET['inputReg'] . '</option>';
											}
							?>
						</select>
					</div>
				  <button type="submit" class="btn btn-primary" value="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button
				</form>
            </nav>


        <div id="content">

			<div class="navbar-header">
				<button type="button" id="sidebarCollapse" class="navbar-btn">
					<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true">
					<span></span>
					<span></span>
					<span></span>
				</button>
            </div>
			
			<div id="nav">
				<div>
					<h1>Trouver son master</h1>
				</div>
				<div>
					<form> 
						<div class="form-group">
								<div class="row">
									<div class="navleft">
									<?php
									if (isset($_GET['query'])){
										echo '<input type="search" class="form-control" id="query" name="query" value="'.$_GET['query'].'" placeholder="Ex: Réseaux" ng-model="name">';
									}else{
										echo '<input type="search" class="form-control" id="query" name="query" placeholder="Ex: Réseaux" ng-model="name">';
									}
									?>
									</div>
									<div class="navright">
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									</div>
								</div>
						</div>
					</form>
				</div>
			</div>

            <div id="results" class="results">
                <div class="left">
					<?php
								if (isset($_GET['query'])){
									$query = $_GET['query']; 
									$min_length = 3;
									
									$tableau = $conn->query("CREATE TEMPORARY TABLE tab
									(SELECT * FROM formation AS form
									INNER JOIN etablissement AS etab ON form.fk_id_etablissement_form = etab.id_etablissement
									INNER JOIN specialite AS spe ON form.fk_id_specialite_form = spe.id_specialite
									INNER JOIN region AS reg ON etab.fk_id_region_etab = reg.id_region)");
									
									$sql = "SELECT * FROM tab WHERE ((`intitule_form` LIKE '%".$query."%') OR (`sigle_form` LIKE '%".$query."%') OR (`type_form` LIKE '%".$query."%'))";
									
									if (isset($_GET['inName1'])){
										$sql .= " AND type_form='". $_GET['inName1'] . "'";
										if (isset($_GET['inName2'])){
											$sql .= " OR type_form='". $_GET['inName2'] . "'";
										}
										if (isset($_GET['inName3'])){
											$sql .= " OR type_form='". $_GET['inName3'] . "'";
										}
									}
									elseif (isset($_GET['inName2'])){
										$sql .= " AND type_form='". $_GET['inName2'] . "'";
										if (isset($_GET['inName1'])){
											$sql .= " OR type_form='". $_GET['inName1'] . "'";
										}
										if (isset($_GET['inName3'])){
											$sql .= " OR type_form='". $_GET['inName3'] . "'";
										}
									}
									elseif (isset($_GET['inName3'])){
										$sql .= " AND type_form='". $_GET['inName3'] . "'";
										if (isset($_GET['inName1'])){
											$sql .= " OR type_form='". $_GET['inName1'] . "'";
										}
										if (isset($_GET['inName2'])){
											$sql .= " OR type_form='". $_GET['inName2'] . "'";
										}
									}
									if (isset($_GET['alter'])){
										$sql .= " AND alternance_form='Oui'";
									}
									if (isset($_GET['inputSpe'])){
										if ($_GET['inputSpe']!='Indéfini(e)'){
											$sql .= " AND lib_specialite='". $_GET['inputSpe'] . "'";
										}
									}
									if (isset($_GET['inputReg'])){
										if ($_GET['inputReg']!='Indéfini(e)'){
											$sql .= ' AND nom_region="'. $_GET['inputReg'] . '"';
										}
									}
									$sql .= " ORDER BY intitule_form";
									
									$userArray = array(
										array('John Doe', 'john@example.com'),
										array('Marry Moe', 'marry@example.com'),
										array('Smith Watson', 'smith@example.com')
									);
									
									//if(strlen($query) >= $min_length){
										$raw_results = $conn->query($sql);
										if($raw_results->rowCount() > 0){
											echo '<h2>Résultats</h2>';
											$coords = array();
											echo '<div class="listResults">';
											while($results = $raw_results->fetch()){
												$count = $raw_results->rowCount();
												$latitude = $results['latitude_etab'];
												$longitude = $results['longitude_etab'];
												$coords[] = array($latitude,$longitude);
												$formation = $results['intitule_form'];
												$formations[] = array($formation);
												$href = "master.php?idm=". $results['id_formation'] ."";
												?>	
													<div class="card">
													  <div class="card-body">
														<h5 class="card-title"><?php echo $results['intitule_form'] ?></h5>
														<p class="card-text"><?php echo $results['type_form'] . '<br />' . $results['nom_etab']?></p>
                                                          <?php echo '<a href= "master.php?idm=' . $results['id_formation'] . '" onclick="window.open(this.href); return false;" class="btn btn-primary">Accéder au master</a>';
                                                          ?>
													  </div>
													</div>
												<?php
											}
											echo '</div>';
											/*$tailleCoords = sizeof($coords);
											  for($i=0; $i<$tailleCoords; $i++){
												echo $coords[ $i ][0] ,'<br/>';  
												echo $coords[ $i ][1] ,'<br/>'; 
											  }*/
										}else{
											echo "<h2>Aucun résultat</h2>";
										}
									/*}else{
										echo "Minimum length is ".$min_length;
									}*/
								}
							?>
                </div>
				
                <div class="right">
                    <div id="map"></div>
                </div>


            </div>



		</div>

    </div>
	
	<?php include("./include/footer.php"); ?>
	
	<script type="text/javascript">
		var count = "<?php echo $count ?>";
		$('.left h2').append('<span class="badge badge-secondary">'+count+'</span>');
		
		var coords = <?php echo json_encode($coords); ?>;
		var formations = <?php echo json_encode($formations); ?>;
		var href = <?php echo json_encode($href); ?>;
		
		var map = L.map('map');
		var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		var osmAttrib='Map data © OpenStreetMap contributors';
		var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
		map.setView([47.0, 3.0], 6);
		map.addLayer(osm);
		var markers = L.markerClusterGroup();
		
		// marker
		for (i=0;i<coords.length;i++){
			var marker = L.marker(coords[i]);
			marker.bindPopup('<b>'+formations[i]+'</b><br><a href="'+href+'" onclick="window.open(this.href); return false;">Accéder au master</a>').openPopup();
			markers.addLayer(marker);
		}
		map.addLayer(markers);
	</script>
    <script src="./include/js/script.js"></script>
    </body>
</html>