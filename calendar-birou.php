<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/produse.css">
	<link rel="icon" href="src/rcrprint.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calendar-birou</title>
</head>

<body>

<div class="bar">
		<a href="index.html"><img src="src/RCRprint.png" class="logo"></a>
			<ul>
				<li><a href="cos.php"><img src="src/cos.png" class="img"></a></li>
				<li><a href="log.php"><img src="src/cont_client.png" class="img"></a></li>			
			</ul>
	</div>
<div class="navbar">
	<div><a href="index.html">Acasa</a></div>
	<div><div class="activ"><a href="shop.php">Produse</a></div></div>
	<div><a href="Termeniconditi.html">Termeni si conditii</a></div>
	<div><a href="Contact.html">Contact</a></div>
</div>
<br /><br /><br /><br /><br />
<center><div class="prod"><table>
	<form action="calendar-birouPHP.php" method="POST">
<tr><td>Format:</td><td><select name="format">
	<option>21x10cm</option>
	<option>15x16cm</option>
	<option>10.5x14cm</option>
</select></td></tr>
<tr><td>Hartie:</td><td><select name="hartie">
	<option>hartie cretata mata 150g</option>
	<option>hartie cretata lucioasa 150g</option>
</select></td></tr>
<tr><td>Tiraj:</td><td><input type="number" name="tiraj" min="0" required></td></tr></table>

<button name="addcos" class="btn">Adauga calendar</button>
</form>
</center>
<?php
$aux=0;
if(isset($_SESSION['cos']))
	{
	for ($i=0; $i<count($_SESSION['cos']); $i++)
	{ 
		if($_SESSION['cos'][$i][0]=='calendar-birou')
			$aux++;
	}
	
	if($aux>4)
		{
			echo "<center><span style='color: white; font-size:20px;'>doar 5 produse!</span></center>";
		}}
?>

</body>
</html>