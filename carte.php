<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/produse.css">
	<meta charset="utf-8">
	<link rel="icon" href="src/rcrprint.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carte</title>
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
<form action="cartePHP.php" method="POST">
	<tr><td>Titlu:</td><td><input type="text" name="titlu" required></td></tr>
	<tr><td>Format:</td><td><select name="format">
		<option>A5</option>
		<option>B5</option>
		<option>A4</option>
	</select></td></tr>
	<tr><td>Pagini:</td><td><select name="pg">
		<option>alb-negru</option>
		<option>color</option>
	</select></td></tr>
	<tr><td>Numar pagini:</td><td><input type="number" name="nr_pag"><td></tr>
	<tr><td>Hartie:</td><td><select name="hartie">
		<option>hartie alba 60g</option>
		<option>hartie alba 70g</option>
		<option>hartie alba 80g</option>
		<option>hartie alba 90g</option>
		<option>hartie alba 120g</option>
		<option>hartie alba lucioasa 130g</option>
		<option>hartie alba lucioasa 150g</option>
		<option>hartie alba lucioasa 170g</option>
		<option>hartie alba lucioasa 200g</option>
		<option>hartie alba lucioasa 250g</option>
		<option>hartie alba volumica 70g</option>
		<option>hartie alba volumica 80g</option>
	</select><td></tr>
	<tr><td>Print coperta:</td><td><select name="coperta">
		<option>4+0</option>
		<option>4+4</option>
		<option>1+0</option>
		<option>1+1</option>
		<option>4+1</option>
	</select><td></tr>
	<tr><td>Grosime carton:</td><td><select name="grosime_carton">
		<option>350g</option>
		<option>300g</option>
		<option>250g</option>
		<option>200g</option>
			</select><td></tr>
	<tr><td>Laminare:</td><td><select name="laminare">
		<option>lucioasa</option>
		<option>mata</option>
		<option>fara laminare</option>
	</select><td></tr>
	<tr><td>Clape/flapsuri:</td><td><select name="clp_flaps">
		<option>da</option>
		<option>nu</option>
	</select><td></tr>
	<tr><td>Tiraj:</td><td><input type="number" name="tiraj" min="0" required><td></tr></table>
	<button name="addcos" class="btn">Adauga carte</button>
</form></div></center>
<?php
$aux=0;
if(isset($_SESSION['cos']))
	{
	for ($i=0; $i<count($_SESSION['cos']); $i++)
	{ 
		if($_SESSION['cos'][$i][0]=='carte')
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
<script>
	if (window.history.replaceState) 
		{
	     window.history.replaceState( null, null, window.location.href );
	    }
</script>
