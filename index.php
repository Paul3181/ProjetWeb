<!DOCTYPE html>
<html lang="fr">
    <head>
		<?php include("./include/head.php"); ?>
	</head>

    <body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
                <form action="index.php" method="GET">
				  <div class="form-group">
					<label for="query">Formation</label>
					<input type="text" class="form-control" id="query" name="query">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlSelect1">Type</label>
					<div class="form-check form-check-inline">
					  <?php
									require_once('include/connect.inc.php');
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$reponse = $conn->query('SELECT DISTINCT type_form FROM formation');
									$i=1;
										while ($donnees = $reponse->fetch()){
											echo '<label class="container">' . $donnees[0] . '
													  <input type="checkbox" name="inName'. $i .'" value="' . $donnees[0] . '">
													  <span class="checkmark"></span>
												</label>';
											$i++;
										}
										$reponse->closeCursor();
						?>
					</div>
					</div>
					<div class="form-group">
						<label for="inputSpe">Spécialité</label>
						<select name="inputSpe" id="inputSpe" class="form-control">
							<option selected>Choose...</option>
							<?php
										$reponse = $conn->query('SELECT lib_specialite FROM specialite');
											while ($donnees = $reponse->fetch()){
												echo '<option>' . $donnees[0] . '</option>';
											}
											$reponse->closeCursor();
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="inputReg">Régions</label>
						<select name="inputReg" id="inputReg" class="form-control">
							<option selected>Choose...</option>
							<?php
										$reponse = $conn->query('SELECT nom_region FROM region');
											while ($donnees = $reponse->fetch()){
												echo '<option>' . $donnees[0] . '</option>';
											}
											$reponse->closeCursor();
							?>
						</select>
					</div>
				  <button type="submit" class="btn btn-primary" value="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</form>
            </nav>


        <div id="content">

			<div class="navbar-header">
				<button type="button" id="sidebarCollapse" class="navbar-btn">
					<span></span>
					<span></span>
					<span></span>
				</button>
            </div>
			
			<div class="nav">
				<div>
					<h1>Trouver son master</h1>
				</div>
				<div>
					<form>
						<div class="form-group">
							<label>Rechercher un master</label>
								<div class="row">
									<div class="navleft">
										<input type="recherche" class="form-control" placeholder="Ex: Réseaux">
									</div>
									<div class="navright">
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									</div>
								</div>
						</div>
					</form>
				</div>
			</div>

            <div>
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
									if (isset($_GET['inputSpe'])){
										if ($_GET['inputSpe']!='Choose...'){
											$sql .= " AND lib_specialite='". $_GET['inputSpe'] . "'";
										}
									}
									if (isset($_GET['inputReg'])){
										if ($_GET['inputReg']!='Choose...'){
											$sql .= " AND nom_region='". $_GET['inputReg'] . "'";
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
											echo '<h1>Résultats</h1>';
											$coords = array();
											while($results = $raw_results->fetch()){
												$count = $raw_results->rowCount();
												$latitude = $results['latitude_etab'];
												$longitude = $results['longitude_etab'];
												$coords[] = array($latitude,$longitude);
												/*$coordArray = array(
													array('latitude'=>$latitude, 'longitude'=>$longitude)
												);*/
												?>	
													<div class="card">
													  <div class="card-body">
														<h5 class="card-title"><?php echo $results['intitule_form'] ?></h5>
														<p class="card-text"><?php echo $results['type_form'] . '<br />' . $results['nom_etab']?></p>
														<a href="#" class="btn btn-primary">Accéder au master</a>
													  </div>
													</div>
												<?php
											}
											/*$tailleCoords = sizeof($coords);
											  for($i=0; $i<$tailleCoords; $i++){
												echo $coords[ $i ][0] ,'<br/>';  
												echo $coords[ $i ][1] ,'<br/>'; 
											  }*/
										}else{
											echo "<h1>Aucun résultat</h1>";
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
		$('.left h1').append('<span class="badge badge-secondary">'+count+'</span>');
		
		var coords = <?php echo json_encode($coords); ?>;
		var map = L.map('map');
		var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		var osmAttrib='Map data © OpenStreetMap contributors';
		var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
		map.setView([47.0, 3.0], 6);
		map.addLayer(osm);

		// marker
		for (i=0;i<coords.length;i++){
			var marker = L.marker(coords[i]);
			//marker.on('click',clicMarker);
			marker.bindPopup('<b>Hello world!</b><br><a href="#">Accéder au master</a>').openPopup();
			marker.addTo(map);
		}
	</script>
    <script src="./include/js/script.js"></script>
    </body>
</html>