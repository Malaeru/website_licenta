<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/produse.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Flyer</title>
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
<form action="flyerPHP.php" method="POST">
	<tr><td>Format:</td><td><select name="format">
    <option >A4</option>
    <option >A5</option>
    <option >A6</option>
</select></td></tr>
	<tr><td>Print:</td><td><select name="print">
				<option>4+0</option>
		<option>4+4</option>
		<option>1+0</option>
		<option>1+1</option>
		<option>4+1</option>
	</select></td></tr>
	<tr><td>Hartie:</td><td><select name="hartie">
		<option>lucios/mat 130g</option>
		<option>lucios/mat 150g</option>
		<option>lucios/mat 200g</option>
	</select></td></tr>
	<tr><td>Tiraj:</td><td><input type="number" name="tiraj" min="0" required></td></tr></table>
	
	<button name="addcos" class="btn">Adauga flyer</button> 
</form></div></center>
<?php
$aux=0;
if(isset($_SESSION['cos']))
	{for ($i=0; $i<count($_SESSION['cos']); $i++)
	{ 
		if($_SESSION['cos'][$i][0]=='flyer')
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
