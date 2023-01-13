<?php

include("conectare.php");

$sql= mysqli_query($conect, 'SELECT nr_comanda FROM comenzi');
$r= mysqli_query($conect, 'SELECT id_client, nr_agenda, nr_calendar, nr_carte, nr_plinant, nr_flyer FROM comenzi');

if(session_status()==0 || session_status()==1)
	session_start();
if($_SESSION['nivel']!=3)
	header("Location: index.html");
include("conectare.php");


$id_client=$_SESSION['id_client'];

$sql_com_as = "SELECT nr_comanda, data, nr_com_flyer, nr_com_cal_birou, nr_com_cal_perete, nr_com_carte, nr_com_cat_vizita, nr_com_pliant FROM comenzi WHERE pret_total IS NULL AND status='asteptare' ORDER BY data desc;";
$q_as= mysqli_query($conect, $sql_com_as);
$r_as= mysqli_num_rows($q_as);


$sql_com= "SELECT nr_comanda, data, nr_com_flyer, nr_com_cal_birou, nr_com_cal_perete, nr_com_carte, nr_com_cat_vizita, nr_com_pliant FROM comenzi WHERE status='respins' AND comenzi.pret_total IS NULL;";
$q_com= mysqli_query($conect, $sql_com);
$r_com= mysqli_num_rows($q_com);

$sql_com_res= "SELECT nr_comanda, data, nr_com_flyer, nr_com_cal_birou, nr_com_cal_perete, nr_com_carte, nr_com_cat_vizita, nr_com_pliant FROM comenzi WHERE status='respins' AND comenzi.pret_total IS NOT NULL;";
$q_com_res= mysqli_query($conect, $sql_com_res);
$r_com_res= mysqli_num_rows($q_com_res);
	
	


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/cos.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CEO administrare</title>
	<style>
		
	
		.parent {
display: grid;
grid-template-columns: repeat(2, 1fr);
grid-template-rows: repeat(7, 1fr);
grid-column-gap: 0px;
grid-row-gap: 0px;
}

	</style>
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



<center>
	<form method="POST">
		<button name="back" class="btn">Comenzi in asteptare</button>
		<button name="comenzi_pespinse" class="btn">Comenzi respinse</button>
		<button name="comenzi_pespinseCL" class="btn">Comenzi respinse de client</button>
		<button name="stats" class="btn">Statitica</button>
		<button name="clienti" class="btn">Clienti</button>
		<button name="logout" class="btn">Delogare</button>
	</form>
	</center>
	<?php

	if(isset($_POST['logout']))
	{
		$_SESSION['email']= NULL;
		$_SESSION['parola']= NULL;
		$_SESSION['nivel']= NULL;
		$_SESSION['id_client']= NULL;
		$_SESSION['activ']= NULL;
		header("location: index.html");
	}
if((!isset($_POST['comenzi_pespinse']) && !isset($_POST['comenzi_pespinseCL']) && !isset($_POST['stats']) && !isset($_POST['clienti']))|| isset($_POST['back']))
		if($r_as>0)
			{
				

		echo '<center><span style="color: white;">Comenzi in asteptare pentru pret</span>

<table border="3px">
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

				 	// echo '<td>'.$r['nr_com_cal_birou'].'<br>'.$r['nr_com_cal_perete'].'<br>'.$r['nr_com_carte'].'<br>'.$r['nr_com_cat_vizita'].'<br>'.$r['nr_com_flyer'].'<br>'.$r['nr_com_pliant'].'</td>';

				 	echo '</td><td><a href="comanda_val.php?nr_comanda='.$r['nr_comanda'].'"><img src="src/comanda.png" width="50" height="50"></a></td></tr>';
				 	
				 }
				 header("refresh: 300;");
			}
		else 
			echo '<center><span style="color: white;">Nu sunt comenzi in asteptare pt pret</span></center>';
	
	

if(isset($_POST['comenzi_pespinse']))
	{
		
		echo '<center>

<table border="3px">
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

				 	

				 	echo '</td><td><a href="comenzi_respinse.php?nr_comanda='.$r['nr_comanda'].' "><img src="src/detalii.png" width="50" height="50"></a></td></tr> </center';
				 	
				}
				
	}

if(isset($_POST['comenzi_pespinseCL']))
	{
		
		echo '<center>

<table border="3px">
	<tr>
		<td>nr.comanda</td>
		<td>data</td>
		<td>produse</td>
	</tr>';
		if($r_com_res>0)
			while($r=mysqli_fetch_assoc($q_com_res))
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

				 	
				 	echo '</td><td><a href="comenzi_respinseCL.php?nr_comanda='.$r['nr_comanda'].' "><img src="src/detalii.png" width="50" height="50"></a></td></tr><center>';
				 	
				}
				
	}

	if (isset($_POST['stats'])) 
		{
				echo '<iframe src="stats.php" width="100%" height="650px" frameBorder="0" style="background: #FFFFFF;"></iframe>';		
		}
		
	if(isset($_POST['clienti']))
		{
			echo '<iframe src="CLstats.php" width="100%" height="650px" frameBorder="0" style="background: #FFFFFF;"></iframe>';
		}
if(isset($_POST['back']))
	{
		unset($_POST['comenzi']);
		unset($_POST['back']);
		unset($_POST['comenzi_pespinse']);
	}



?>

</div>
	<script>
		if ( window.history.replaceState )
			{
        			window.history.replaceState( null, null, window.location.href );
    			}
	</script>
</body>
</html>
