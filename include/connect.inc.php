<HTML>
	<HEAD>
		<meta charset = "UTF-8"/>
	</HEAD>
		<?php
		$host = "localhost";
		$base = "projetweb";
		$login = "root";
		$password = "";
		try{
			$conn = new PDO("mysql:host=$host; dbname=$base; charset=UTF8", $login, $password);
		}
		catch(PDOException $e){
			echo "Erreur: ".$e->getMessage()."<br/>";
			die();
		}
		?>
</HTML>
