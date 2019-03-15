<!DOCTYPE html>
<html>
<head>
	<title>DOCTOR REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="top">DOCTOR REGISTRATION</div>
	<div>
		<form method="POST" action="save_doc.php">
			<fieldset>
				<label>Doctor's information</label><br>
				<table>
					<tr>
						<td>First Name</td>
						<td><input type="text" name="fname" id="fname" required="required"></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type="text" name="lname" id="lname" ></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" name="address" required="required"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="mail" id="mail"></td>
					</tr>
					<tr>
						<td>Matricule</td>
						<td><input type="number" name="mat" id="mat" placeholder="XXXXX" required="required"></td>
					</tr>
					<tr>
						<td>Type of Doctor</td>
						<td><select name="type" id="type" style="min-width: 100px; width: 175px;">
							<option>Generalist</option>
							<option>Specialist</option>
						</select></td>
					</tr>
					<tr>
						<td><input type="reset" name="res" id="res"></td>
						<td><input type="submit" name="sub" id="sub"></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<footer><a href="index.php">HOME</a></footer>
</body>
</html>