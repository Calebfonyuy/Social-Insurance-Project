<!DOCTYPE html>
<html>
<head>
	<title>DRUG REGISTRATION</title>
</head>
<body>

	<div class="top">DRUG REGISTRATION</div>
	<div>
		<form method="POST" action="save_drug.php">
			<fieldset>
				<table>
					<tr>
						<td>Name of drug</td>
						<td><input type="text" name="name" id="name"></td>
					</tr>
					<tr>
						<td>Producer</td>
						<td><input type="text" name="prod" id="prod"></td>
					</tr>
					<tr>
						<td>NAFDAC registration number</td>
						<td><input type="text" name="reg" id="reg"></td>
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