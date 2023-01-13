<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/produse.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carte de vizita</title>
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
<form action="carte-vizitaPHP.php" method="POST">
<tr><td>Carton:</td><td><select name="carton">
		<option>carton cretat mat 250g</option>
		<option>carton cretat mat 300g</option>
		<option>carton cretat mat 350g</option>
		<option>carton cretat lucios 250g</option>
		<option>carton cretat lucios 300g</option>
		<option>carton cretat lucios 350g</option>
</select></td></tr>
<tr><td>Colturi rotunde:</td><td><select name="colt">
	<option>da</option>
	<option>nu</option>
</select></td></tr>
<tr><td>Tiraj:</td><td><input type="number" name="tiraj" min="0" required></td></tr></table>
<button name="addcos" class="btn">Adauga carte vizita</button>
</form></div></center>
<?php


$aux=0;
if(isset($_SESSION['cos']))
	{
	for ($i=0; $i<count($_SESSION['cos']); $i++)
	{ 
		if($_SESSION['cos'][$i][0]=='carte-vizita')
			$aux++;
	}
	
	if($aux>4)
		{
			echo "<center><span style='color: white; font-size:20px;'>doar 5 produse!</span></center>";
		}
		}

?>
</body>
</html>