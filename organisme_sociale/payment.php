<!DOCTYPE html>
<html>
<head>
	<title>BENEFIT PAYMENT</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<?php
		$conIds = array();
		$connect = new mysqli("localhost","root","","organisme_sociale");
		if (!$connect) {
			die("Error connecting to database");
		}

		$result = mysqli_query($connect,"SELECT idCons FROM consultation");
		if ($result) {
			while ($row=$result->fetch_assoc()) {
				$conIds[] = $row['idCons'];
			}
		}else{
			echo $connect->error;
		}
		$connect->close();
	?>
<?php  ?>
	<script type="text/javascript">
		var regCons = new Array();
		regCons.push(<?php echo implode(",", $conIds) ?>);

		function validateData() {
			var id = parseInt(document.getElementById("idCons").value);
			if (regCons.indexOf(id)!=-1) {
				return true;
			}
			document.getElementById("error_space").innerHTML="<b>Invalid consultation ID</b>";
			return false;
		}
	</script>
</head>
<body>
	<div class="top">BENEFIT PAYMENT FORM</div>
	<form method="POST" onsubmit="return validateData();" action="save_payment.php">
		<label>Benefit payment form</label><br>
		<span class="error" id="error_space"></span><br>
		<table>
			<tr>
				<td>Date of payment</td>
				<td><input type="date" name="pdate" id="pdate" required="required"></td>
			</tr>
			<tr>
				<td>Consultation ID</td>
				<td><input type="number" name="idCons" id="idCons" required="required"></td>
			</tr>
			<tr>
				<td>Amount paid out</td>
				<td><input type="number" name="amount" id="amount" required="required"></td>
			</tr>
			<tr>
				<td><input type="reset" value="Clear form"></td>
				<td><input type="submit" name="save" id="save"></td>
			</tr>
		</table>
	</form>
	<footer><a href="index.php">HOME</a></footer>
</body>
</html>