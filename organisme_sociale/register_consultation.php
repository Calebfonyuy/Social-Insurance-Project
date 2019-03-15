<?php 
	if (isset($_POST['numAss'])) {
		unset($_POST['subm']);
		foreach ($_POST as $key=>$value) { 
			if($value=="Select drug" or $value=="")
				unset($_POST[$key]);
		}

		$conn = new mysqli("localhost","root","","organisme_sociale");
		if (!$conn) {
			echo "Error ".$conn->error;
			exit();
		}

		//Saving the consultation information
		$request ="INSERT INTO consultation(numAssurance,matricule,con_date,observation,diagnose) VALUES(?,?,?,?,?)";

		$stmt = $conn->prepare($request);
		if (!$stmt) {
			echo "Error saving data<br>".$conn->error;
		}else{
			$conDate = date("Y-m-d",strtotime($_POST['datc']));
			$stmt->bind_param('sssss',$_POST['numAss'],$_POST['mat'],$conDate,$_POST['obser'],$_POST['diag']);
			$stmt->execute();
			echo "Consultation saved with id =".$stmt->insert_id."<br>";
			unset($_POST['numAss']);
			unset($_POST['mat']);
			unset($_POST['datc']);
			unset($_POST['obser']);
			unset($_POST['diag']);
		}

		//Checking the presence of prescribtions and saving if any
		if (count($_POST)>0) {
			$drid = "drug_";
			$qtid = "qty_";
			$drug_info = array();
			for ($i=1; $i < 11; $i++) { 
				if (array_key_exists($drid."".$i, $_POST) and array_key_exists($qtid."".$i, $_POST)) {
					$drug_info[$_POST[$drid."".$i]]=$_POST[$qtid."".$i];
				}else{
					break;
				}
			}
		}


		$data = mysqli_query($conn,"SELECT idmed,nom FROM medicament");
		$drugs = array();

		if ($data) {
			while ($line=$data->fetch_assoc()) {
				$drugs[$line['idmed']]=$line['nom'];
			}
			$request = "INSERT INTO prescrire(idCons,idmed,quantite) VALUES(?,?,?)";
			$line = $conn->prepare($request);
			$ref = $stmt->insert_id;
			foreach ($drugs as $key => $value) {
				 $line->bind_param('sss',$ref,$key,$drug_info[$value]);
				 $status=$line->execute();
				 if(!$status){
				 	echo "failed ".$conn->error;
				 }
			}
		}else{
			echo "Error :".$conn->error;
		}

		$conn->close();
	}
 ?>
 <a href="consultation.php">REGISTER ANOTHER CONSULTATION</a><br>
 <a href="index.php">HOME</a>