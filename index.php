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
                        $donnees = $reponse->fetch();
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
                <button type="submit" class="btn btn-primary" value="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>
        </nav>


        <div id="content">

		<div class="container">

			<div class="row">
				<div class="col-lg-6">
					<h1>Trouver son master</h1>
				</div>
			</div>

			<div class="row">
				<form>
					<div class="form-group">
						<label>Rechercher un master</label>
							<div class="row">
								<div class="col-sm-8">
									<input type="recherche" class="form-control" placeholder="Ex: Réseaux">
								</div>
								<div class="col-sm-2" >
									<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
								</div>
							</div>
					</div>
				</form>
			</div>

			<div class="row">
					<button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
			</div>

            <div class="row">
                <div class="col-sm-7">

                        <h1>Les resultats...</h1>
                        <?php
                        require_once('./include/connect.inc.php');
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        if (isset($_GET['inName1'])){
                            echo "yes";
                        }

                        $query = $_GET['query'];
                        $min_length = 3;
                        if(strlen($query) >= $min_length){
                            $raw_results = $conn->query("SELECT * FROM formation INNER JOIN etablissement ON formation.fk_id_etablissement_form = etablissement.id_etablissement WHERE (`intitule_form` LIKE '%".$query."%') OR (`sigle_form` LIKE '%".$query."%') OR (`type_form` LIKE '%".$query."%')");
                            if($raw_results->rowCount() > 0){
                                while($results = $raw_results->fetch()){
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
                            }else{
                                echo "No results";
                            }
                        }else{
                            echo "Minimum length is ".$min_length;
                        }
                        ?>




                </div>
                <div class="col-sm-5">
                    <div id="map"></div>
                </div>


            </div>



		</div>
        </div>

    </div>
    <script src="./include/js/script.js"></script>
    </body>
</html>