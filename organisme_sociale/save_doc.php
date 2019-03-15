<?php
	if(isset($_POST['mat'])){
		$type =1;
		if ($_POST['type']!="Generalist") {
			$type=2;
		}
	
		$conn = new mysqli("localhost","root","","organisme_sociale");
		if(!$conn){
			die("Error connecting to database");
		}
	
		$request = "INSERT INTO medecine VALUES(?,?,?,?,?,?)";
		$stmt = $conn->prepare($request);
		if ($stmt) {
			$stmt->bind_param('ssssss',$_POST['mat'],$_POST['fname'],$_POST['lname'],$_POST['address'],$_POST['mail'],$type);
			$stmt->execute();
			echo $_POST['fname']."'s information saved<br>";
			$stmt->close();
		}else{
			echo "Error: ".$conn->error;
		}
		$conn->close();
	}else{
		header("Location: index.php",true,301);
		exit();
	}
?>
<br>
<a href="index.php">HOME</a><br>
<a href="register_doc.php">REGISTER NEW DOCTOR</a>