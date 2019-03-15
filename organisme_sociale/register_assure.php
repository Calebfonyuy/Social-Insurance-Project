<!DOCTYPE html>
<html>
<head>
	<title>MEMBER REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="top">
		MEMBER REGISTRATION
	</div>
	<div class="reg_form">
		<form method="POST" action="save_assure.php">
			<fieldset>
				<label>Identification information</label><br>
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
						<td>Profession</td>
						<td><input type="text" name="prof" id="prof"></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<label>Contact information</label><br>
				<table>
					<tr>
						<td>Phone number</td>
						<td><input type="number" name="phone" id="phone" required="required"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="mail" id="mail"></td>
					</tr>
					<tr>
						<td><input type="reset" name="res" value="Clear form"></td>
						<td><input type="submit" name="subm" value="Save member"></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<footer><a href="index.php">HOME</a></footer>
</body>
</html>