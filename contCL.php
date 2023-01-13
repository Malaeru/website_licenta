<?php
if(session_status()==0 || session_status()==1)
	session_start();
include("conectare.php");
if($_SESSION['nivel']!=0)
	header("Location: index.html");
If(!isset($_SESSION['id_client']))
	header("Location: log.php");
$id_client=$_SESSION['id_client'];

$sql_com_as = "SELECT nr_comanda, data, nr_com_flyer, nr_com_cal_birou, nr_com_cal_perete, nr_com_carte, nr_com_cat_vizita, nr_com_pliant FROM comenzi WHERE id_client= '$id_client' AND status='asteptare';";
$q_as= mysqli_query($conect, $sql_com_as);
$r_as= mysqli_num_rows($q_as);

$sql_com= "SELECT nr_comanda, data, nr_com_flyer, nr_com_cal_birou, nr_com_cal_perete, nr_com_carte, nr_com_cat_vizita, nr_com_pliant FROM comenzi WHERE id_client= '$id_client' AND status='acceptat';";
$q_com= mysqli_query($conect, $sql_com);
$r_com= mysqli_num_rows($q_com);


if(!isset($_POST['comenzi']) || isset($_POST['back']))
	header("refresh: 300;");
	

if(isset($_POST['logout']))
{$_SESSION['id_client']= NULL;
header("Location:index.html");
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/contCL.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cont</title>
	
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
	<div><div class="activ"><a href="index.html">Acasa</a></div></div>
	<div><a href="shop.php">Produse</a></div>
	<div><a href="Termeniconditi.html">Termeni si conditii</a></div>
	<div><a href="Contact.html">Contact</a></div>
</div>
	<center><form method="POST">
		<button name="logout" class="btn">Delogare</button>
		<button name="comenzi" class="btn">Comenzi</button>
		<button name="back" class="btn">Comenzi in asteptare</button>
	</form></center>
	
	<?php
if(!isset($_POST['comenzi']) || isset($_POST['back']))
		if($r_as>0)
			{

		echo '<div class="com">Comenzi in asteptare pentru confirmare</div>
<center>
<table class="table">
	<tr>
		<td>nr.comanda</td>
		<td>data</td>
		<td>produse</td>
	</tr>';

				while($r=mysqli_fetch_assoc($q_as))
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


				 	echo '</td><td><a href="comanda.php?nr_comanda='.$r['nr_comanda'].'"><img src="src/comanda.png" width="50" height="50"></a></td></tr>';
				 	
				 }
				 
			}
		else 
			echo '<div class="com">Nu sunt comenzi in asteptare pentru accept</div>';
	
	

if(isset($_POST['comenzi']))
	{
		
		echo '<div class="com">Comenzi totale</div>
<center>
<table class="table">
	<tr>
		<td>nr.comanda</td>
		<td>data</td>
		<td>produse</td>
	</tr>';
		if($r_com>0)
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

				 

				 	echo '</td><td><a href="comandadetaliat.php?nr_comanda='.$r['nr_comanda'].' "><img src="src/detalii.png" width="50" height="50"></a></td></tr>';
				 	
				}
				
	}




if(isset($_POST['back']))
	{
		unset($_POST['comenzi']);
		unset($_POST['back']);
	}


	?>
</tr>

	

</body>
</html>