<?php 
	if (isset($_POST['fname'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$prof = $_POST['prof'];
		$phone = $_POST['phone'];
		$email = $_POST['mail'];

		$conn = new mysqli("localhost","root","","organisme_sociale");
		if(!$conn){
			die("Unable to connect to database");
		}

		$request = "INSERT INTO assure(nom,prenom,adresse,profession,email,telephone) VALUES(?,?,?,?,?,?)";
		$stmt = $conn->prepare($request);
		if (!$stmt) {
			echo "Error saving data";
		}else{
			$stmt->bind_param('ssssss',$fname,$lname,$address,$prof,$email,$phone);
			$stmt->execute();
			echo $fname."'s info saved with id=".$stmt->insert_id."<br>";
		}
		$conn->close();
	}else{
		header("Location: index.php",true,301);
		exit();
	}
?>
<br>
<a href="index.php">HOME</a><br>
<a href="register_assure.php">REGISTER NEW MEMBER</a>