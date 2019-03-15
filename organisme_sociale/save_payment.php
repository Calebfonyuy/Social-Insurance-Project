<?php 
	if (isset($_POST['pdate'])) {
		$connect = new mysqli("localhost","root","","organisme_sociale");
		if (!$connect) {
			die("Error connecting to database");
		}

		$request = "INSERT INTO remboursement(montant,date_rem,idCons) VALUES(?,?,?)";
		$stmt = $connect->prepare($request);
		if (!$stmt) {
			echo "Error saving data";
		}else{
			$stmt->bind_param('sss',$_POST['amount'],$_POST['pdate'],$_POST['idCons']);
			$stmt->execute();
			$stmt->close();
			echo "Data saved successfully!<br>";
		}
		$connect->close();
	}else{
		header("Location: index.php",true,301);
		exit();
	}
 ?>
 <br><a href="index.php">HOME</a>