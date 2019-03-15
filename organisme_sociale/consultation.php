<!DOCTYPE html>
<html>
<head>
	<title>CONSULTATION</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.left-pos{
			float: left;
			margin: 10px;
		}
	</style>
	<?php
		$selection = "<option>Select drug</option>";
		$count = 1;

		$conn = new mysqli("localhost","root","","organisme_sociale");
		if (!$conn) {
			echo "Error connecting to db!";
			die("Not able to read drug list");
		}
		$result = mysqli_query($conn,"SELECT nom FROM medicament");
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$selection =$selection."<option>".$row['nom']."</option>";
			}
		}else{
			echo "Error with request!".$conn->error;
		}

		$matricules = array();
		$result = mysqli_query($conn,"SELECT matricule FROM medecine");
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				array_push($matricules, $row['matricule']);
			}
		}else{
			echo "Error with request!".$conn->error;
		}

		$numbers = array();
		$result = mysqli_query($conn,"SELECT numAssurance FROM assure");
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				array_push($numbers, $row['numAssurance']);
			}
		}else{
			echo "Error with request!".$conn->error;
		}
		$conn->close();
	 ?>
	 <script type="text/javascript">
	 	var numbers = new Array(<?php echo implode(",", $numbers); ?>);
	 	var matricules = new Array(<?php echo implode(",", $matricules) ?>);
	 	function validateData() {
	 		 var num = parseInt(document.getElementById("numAss").value);
	 		 var mat = parseInt(document.getElementById("mat").value);
	 		 if (numbers.indexOf(num)!=-1) {
	 		 	if (matricules.indexOf(mat)!=-1) {
	 		 		return true;
	 		 	}
	 		 	document.getElementById("error").innerHTML="<b>Invalid doctor matricule</b>";
	 		 	return false;
	 		 }
	 		 document.getElementById("error").innerHTML="<b>Invalid patient registration number</b>";
	 		 return false;
	 	}
	 </script>
</head>
<body>
	<div class="top">CONSULTATION FICHE</div>
	<div>
		<div class="left-pos">
		<form method="POST" onsubmit="return validateData();" action="register_consultation.php">
			<fieldset>
				<label>Participant Information</label><br><span class="error_message" id="error"></span>
				<table>
					<tr>
						<td>Patient registration number</td>
						<td><input type="number" name="numAss" id="numAss" required="required"></td>
					</tr>
					<tr>
						<td>Doctor's matricule</td>
						<td><input type="number" name="mat" id="mat" required="required"></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<label>Consultation information</label>
				<table>
					<tr>
						<td>Date</td>
						<td><input type="date" name="datc" id="datc" required="required"></td>
					</tr>
					<tr>
						<td>Observations</td>
						<td><textarea cols="40" rows="7" name="obser" id="obser"></textarea></td>
					</tr>
					<tr>
						<td>Diagnosis</td>
						<td><textarea cols="40" rows="6" name="diag" id="diag"></textarea></td>
					</tr>
				</table>
			</fieldset>
			</div>
			<div class="left-pos">
			<fieldset>
				<label>Drug Prescriptions</label><br>
				<table>
					<?php 
						while ($count<11) {
							$addition="<tr><td>Drug ".$count."  </td><td><select name='drug_".$count."'>".$selection."</select></td><td><input type='text' name='qty_".$count."'></td></tr>";
							echo $addition;
							$count = $count+1;
						}
					 ?>
				</table>
				<br>
			</fieldset>
			</div>
			<table style="float: left; clear: both;">
				<tr>
					<td><input type="reset" name="res" value="Clear data"></td>
					<td><input type="submit" name="subm" value="Save" id="subm"></td>
				</tr>
			</table>
		</form>
	</div>
	<footer style="float: left; clear: both;"><a href="index.php">HOME</a></footer>
</body>
</html>