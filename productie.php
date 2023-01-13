<?php
if(session_status()==0 || session_status()==1)
	session_start();
include("conectare.php");
if($_SESSION['nivel']!=2)
	header("Location: index.html");


$id_client=$_SESSION['id_client'];

$sql_com= "SELECT nr_comanda, data, nr_com_flyer, nr_com_cal_birou, nr_com_cal_perete, nr_com_carte, nr_com_cat_vizita, nr_com_pliant FROM comenzi WHERE  status='acceptat' AND stare='nefinalizat';";
$q_com= mysqli_query($conect, $sql_com);
$r_com= mysqli_num_rows($q_com);
	

echo $id_client;

if(isset($_POST['logout']))
	{
		$_SESSION['id_client']= NULL;
		header("location: index.html");
	}

?>
		

	<!DOCTYPE html>
	<html>
	<head>
		<link rel="icon" href="src/rcrprint.png">
		<link rel="stylesheet" type="text/css" href="css/cos.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Productie</title>
		<
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
	<div><a href="shop.php">Produse</a></div>
	<div><a href="Termeniconditi.html">Termeni si conditii</a></div>
	<div><a href="Contact.html">Contact</a></div>
</div>

	
	<form method="POST"><center>
<button name="logout" class="btn">delogare</button></center>
</form>

<?php
if($r_com>0)
			{

		echo '<center><span style="color: white;">Comenzi de facut</span>

<table border="3px">
	<tr>
		<td>nr.comanda</td>
		<td>data</td>
		<td>produse</td>
	</tr>';

				while($r=mysqli_fetch_assoc($q_com))
				{
					echo '<tr><td>'.$r['nr_comanda'].'</td>';
				 	echo '<td>'.$r['data'].'</td>';
				 	echo '<td>';
				 	if($r['nr_com_cal_birou']!= NULL)
				 		{
				 			$r['nr_com_cal_birou']='calendar birou';
				 			echo $r['nr_com_cal_birou'].'<br>';
				 		}
				 	if($r['nr_com_cal_perete']!= NULL)
				 		{
				 			$r['nr_com_cal_perete']='calendar perete';
				 			echo $r['nr_com_cal_perete'].'<br>';
				 		}
				 	if($r['nr_com_carte']!= NULL)
				 		{
				 			$r['nr_com_carte']='carte';
				 			echo $r['nr_com_carte'].'<br>';
				 		}
				 	if($r['nr_com_cat_vizita']!= NULL)
				 		{
				 			$r['nr_com_cat_vizita']='carte vizita';
				 			echo $r['nr_com_cat_vizita'].'<br>';
				 		}
				 	if($r['nr_com_flyer']!= NULL)
				 		{
				 			$r['nr_com_flyer']='flyer';
				 			echo $r['nr_com_flyer'].'<br>';
				 		}
				 	if($r['nr_com_pliant']!= NULL)
				 		{
				 			$r['nr_com_pliant']='pliant';
				 			echo $r['nr_com_pliant'];
				 		}

				 	

				 	echo '</td><td><a href="prod_com.php?nr_comanda='.$r['nr_comanda'].'"><img src="src/comanda.png" width="50" height="50"></a></td></tr></center>';
				 	
				 }
				 header("refresh: 300;");
			}
		else 
			echo '<center>Nu sunt comenzi de facut</center>';




// echo mysqli_num_rows(mysqli_query($conect,$sql));
// $a= mysqli_fetch_assoc(mysqli_query($conect,$sql));
// echo '<br>'.$a['nr_comanda'];
	?>

	</body>
	</html>