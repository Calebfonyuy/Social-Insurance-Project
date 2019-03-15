<?php 
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$fabriquer=$_POST['prod'];
		$regNafdac=$_POST['reg'];

		#$action ="INSERT INTO medicament(name,fabriquer,regNafdac) VALUES(\'".$name."\',\'".$fabriquer."\',\'".$regNafdac."\')";

		$conn = new mysqli("localhost","root","","organisme_sociale");
		if (!$conn) {
			die("Error connecting to database!!<br>");
		}
		$sql = "INSERT INTO medicament(nom, fabriqueur,regNafdac) VALUES(?,?,?)";
		$stmt = $conn->prepare($sql);

		if (!$stmt) {
			echo "Error: ".$conn->error;
		}else{
			$stmt->bind_param('sss',$name,$fabriquer,$regNafdac);
			$stmt->execute();
			echo "Data saved with id= ";
			echo $stmt->insert_id."<br>";
			$stmt->close();
		}
		$conn->close();
	}else{
		header("Location: index.php",true,301);
		exit();
	}
 ?>
 <a href="index.php">BACK HOME</a>