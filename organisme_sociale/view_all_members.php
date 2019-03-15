<!DOCTYPE html>
<html>
<head>
	<title>MEMBERS</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="top">MEMBER LIST</div>
	<div>
		<?php 
			$conn = new mysqli("localhost","root","","organisme_sociale");
			if (!$conn) {
				echo "<b>Failed to load list</b>";
				die("");
			}else{
				$result = mysqli_query($conn,"SELECT * FROM assure");
				if ($result) {
					echo "<table>";
					echo "<thead>
							<th>NO ASS</th>
							<th>FIRST NAME</th>
							<th>LAST NAME</th>
							<th>ADDRESS</th>
							<th>PROFESSION</th>
							<th>EMAIL</th>
							<th>TELEPHONE</th>
						</thead>";
					while ($row=$result->fetch_assoc()) {
						echo "<tr><td>";
						echo $row['numAssurance'];
						echo "</td><td>";
						echo $row['nom'];
						echo "</td><td>";
						echo $row['prenom'];
						echo "</td><td>";
						echo $row['adresse'];
						echo "</td><td>";
						echo $row['profession'];
						echo "</td><td>";
						echo $row['email'];
						echo "</td><td>";
						echo $row['telephone'];
						echo "</td></tr>";
					}
					echo "</table>";
				}else{
					echo "<b>Failed to load list</b>";
				}
				$conn->close();
			}
		?>
	</div>
<br>
<a href="index.php">HOME</a>
</body>
</html>