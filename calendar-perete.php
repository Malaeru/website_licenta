<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/produse.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calendar-perete</title>
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
<form action="calendar-peretePHP.php" method="POST">
	<tr><td>Hartie:</td><td><select name="hartie">
		<option>Hartie cretata mata 150g</option>
		<option>Hartie cretata lucioasa 150g</option>
	</select></td></tr>
	<tr><td>Format:</td><td><select name="format">
		<option>A3</option>
		<option>A4</option>
		<option>A5</option>
	</select></td></tr>
	<tr><td>Tiraj:</td><td><input type="number" name="tiraj" min="0" required></td></tr></table>
	<button name="addcos" class="btn">Adauga calendar</button>
</form></div></center>
<?php
$aux=0;
if(isset($_SESSION['cos']))
	{
	for ($i=0; $i<count($_SESSION['cos']); $i++)
	{ 
		if($_SESSION['cos'][$i][0]=='calendar-perete')
			$aux++;
	}
	
	if($aux>4)
		{
			echo "<center><span style='color: white; font-size:20px;'>doar 5 produse!</span></center>";
		}}
?>
</body>
</html>

<script>
	if (window.history.replaceState) 
		{
	     window.history.replaceState( null, null, window.location.href );
	    }
</script>
