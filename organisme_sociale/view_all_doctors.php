<!DOCTYPE html>
<html>
<head>
	<title>REGISTERED DOCTORS</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="top">LIST OF REGISTERED DOCTORS</div>
	<?php 
		$connect = new mysqli("localhost","root","","organisme_sociale");

		if(!$connect){
			die("Unable to connect to database!");
		}

		$request = mysqli_query($connect,"SELECT * FROM medecine");

		if (!$request) {
			echo "Error :".$connect->error;
		}else{
			echo "<table>
			 	<thead>
			 		<th>Matricule</th>
			 		<th>First Name</th>
			 		<th>Last Name</th>
			 		<th>Address</th>
			 		<th>Email</th>
			 		<th>Type</th>
			 	</thead>";

			 	while ($row=$request->fetch_assoc()) {
			 		echo "<tr><td>";
			 		echo $row['matricule'];
			 		echo "</td><td>";
			 		echo $row['nom'];
			 		echo "</td><td>";
			 		echo $row['prenom'];
			 		echo "</td><td>";
			 		echo $row['adresse'];
			 		echo "</td><td>";
			 		echo $row['email'];
			 		echo "</td><td>";
			 		echo ($row['idType']==1)?"Generalist":"Specialist";
			 		echo "</td></tr>";
			 	}

			echo "</table>";
		}
		$connect->close();
	 ?>
	 <br><a href="index.php">HOME</a>
</body>
</html>