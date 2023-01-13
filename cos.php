<?php
session_start();
include("conectare.php");
if(!(isset($_SESSION['cos'])))
		{
			$_SESSION['cos']=array();
		}

if(isset($_POST['clr']))
{
	$_SESSION['cos']=array();
	echo ' <script>window.history.back(-1);</script>';
}




?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/cos.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cos</title>
<style>	
		

		
	</style>


	<script>
		if ( window.history.replaceState )
			{
        			window.history.replaceState( null, null, window.location.href );
    			}
	</script>



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
<form method="POST">
	<button name="clr"><img src="src/cosgunoi.png" class="cos"></button>
</form>
<?php
$coslenght=count($_SESSION['cos']);
echo "<center>";
	for($i=0; $i<$coslenght; $i++)
		{
			
			if($_SESSION['cos'][$i][0]== 'carte')
				{
					echo '<div class="td">
					<table border="3px" width="450px">
					<tr>
					<td rowspan="6" width="100px"><img src="src/carte.png" width="100" height="100"></td></tr><tr>
					<td>Titlu: '.$_SESSION['cos'][$i][1].'</td>
					<td>Format: '.$_SESSION['cos'][$i][2].'</td></tr>
					<tr><td>Pagini: '.$_SESSION['cos'][$i][3].'</td>
					<td>Grosime carton: '.$_SESSION['cos'][$i][7].'</td></tr>
					<tr><td>Numar pagini: '.$_SESSION['cos'][$i][4].'</td>
					
					<td>Hartie: '.$_SESSION['cos'][$i][5].'</td></tr>
					<tr><td>Print coperta: '.$_SESSION['cos'][$i][6].'</td>
					
					
					<td>Laminare: '.$_SESSION['cos'][$i][8].'</td></tr>
					<tr><td>Clapa/Flaps: '.$_SESSION['cos'][$i][9].'</td>
					<td>Tiraj: '.$_SESSION['cos'][$i][10].'</td></tr>
					
					</table>
					<div>
					';
				}
			elseif($_SESSION['cos'][$i][0]=='calendar-perete')
				{
					echo '
					<table border="3px" width="450px">
					<tr>
					<td rowspan="3" width="100px"><img src="src/calendar-perete.png" width="100" height="100"></td>
					<td>Hartie: '.$_SESSION['cos'][$i][1].'</td>
					<tr><td>Format: '.$_SESSION['cos'][$i][2].'</td></tr>
					<tr><td>Tiraj: '.$_SESSION['cos'][$i][3].'</td></tr>
					</tr>
					</table>
					';
				}
			elseif($_SESSION['cos'][$i][0]=='flyer')
				{
					echo '
					<table border="3px" width="450px">
					<tr>
					<td rowspan="3" width="100px"><img src="src/flyer.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Format: '.$_SESSION['cos'][$i][1].'</td>
					<td>Print: '.$_SESSION['cos'][$i][2].'</td>
					</tr>
					<tr>
					<td>Hartie: '.$_SESSION['cos'][$i][3].'</td>
					<td>Tiraj: '.$_SESSION['cos'][$i][4].'</td>
					</tr>
					</table>
					';
				}
			elseif($_SESSION['cos'][$i][0]=='calendar-birou')
				{
					echo '
					<table border="3px" width="450px">
					<tr>
					<td rowspan="3" width="100px"><img src="src/calendar-birou.png" width="100" height="100"></td>
					
					<td>Format: '.$_SESSION['cos'][$i][1].'</td></tr>
					<tr><td>Hartie: '.$_SESSION['cos'][$i][2].'</td>
					</tr><tr><td>Tiraj: '.$_SESSION['cos'][$i][3].'</td>
					</tr>
					</table>
					';
				}
			elseif($_SESSION['cos'][$i][0]=='pliant')
				{
					echo '
					<table border="3px" width="450px">
					<tr>
					<td rowspan="3" width="100px"><img src="src/pliant.png" width="100" height="100"></td>
					
					<td>Format: '.$_SESSION['cos'][$i][1].'</td></tr>
					<tr><td>Hartie: '.$_SESSION['cos'][$i][2].'</td>
					</tr>					
					<tr><td>Tiraj: '.$_SESSION['cos'][$i][3].'</td>
					</tr>
					</table>
					';
				}
			elseif($_SESSION['cos'][$i][0]=='carte-vizita')
				{
					echo '
					<table border="3px" width="450px">
					<tr>
					<td rowspan="3" width="100px"><img src="src/carte-vizita.png" width="100" height="100"></td>
					
					<td>Caerton: '.$_SESSION['cos'][$i][1].'</td></tr>
					<tr><td>Colt rotund: '.$_SESSION['cos'][$i][2].'</td>
					</tr><tr><td>Tiraj: '.$_SESSION['cos'][$i][3].'</td>
					</tr>
					</table>
					';
				}
			
		}
echo "</center>";


?><form method="POST">
	<center><button name="sub" class="btn">Comanda</button></center>
</form>

<?php
$id_client=$_SESSION['id_client'];
	if(isset($_POST['sub']))
		{if($_SESSION['nivel']!=0)
	echo "<center><span style='color: white; font-size: 25px;'>Doar clientii pot comanda!</span></center>";
else
{
			if(isset($_SESSION['id_client']))
				if(isset($_SESSION['cos']) && $_SESSION['cos']!=NULL)
					{

						$carte= 0;
						$calendar_perete= 0;
						$calendar_birou= 0;
						$flyer= 0;
						$pliant= 0;
						$carte_vizita= 0;
						$cartedb= array();
						$calendar_peretedb= array();
						$calendar_biroudb= array();
						$flyerdb= array();
						$pliantdb= array();
						$carte_vizitadb= array();

						for($i=0; $i<$coslenght; $i++)
							{
								if($_SESSION['cos'][$i][0]== 'carte')
									{
										$titlu=$_SESSION['cos'][$i][1];
										$format_carte=$_SESSION['cos'][$i][2];
										$pg_carte=$_SESSION['cos'][$i][3];
										$nr_pag=$_SESSION['cos'][$i][4];
										$hartie_carte=$_SESSION['cos'][$i][5];
										$prt_coperta=$_SESSION['cos'][$i][6];
										$grosime_carton=$_SESSION['cos'][$i][7];
										$laminare=$_SESSION['cos'][$i][8];
										$clp_flaps=$_SESSION['cos'][$i][9];
										$tiraj_carte=$_SESSION['cos'][$i][10];

										if($carte==0)
											{
												$nr_carte= mysqli_fetch_row(mysqli_query($conect, "SELECT nr_carte FROM carti ORDER BY nr_carte DESC LIMIT 1;"));
											}

										$carte++;

										mysqli_query($conect, "INSERT INTO carti (titlu, format_carte, pg_carte, nr_pag, hartie_carte, prt_coperta, grosime_carton, laminare, clp_flaps, tiraj_carte, id_client) VALUES('$titlu', '$format_carte', '$pg_carte', '$nr_pag', '$hartie_carte', '$prt_coperta', '$grosime_carton', '$laminare', '$clp_flaps', '$tiraj_carte', '$id_client');");			
									}
								elseif($_SESSION['cos'][$i][0]=='calendar-perete')
									{
										$hartie= $_SESSION['cos'][$i][1];
										$format= $_SESSION['cos'][$i][2];
										$tiraj= $_SESSION['cos'][$i][3];

										if($calendar_perete==0)
											{
												$nr_cal_perete= mysqli_fetch_row(mysqli_query($conect, "SELECT nr_cal_perete FROM calendare_perete ORDER BY nr_cal_perete DESC LIMIT 1;"));
											}
										
										$calendar_perete++;

										mysqli_query($conect, "INSERT INTO calendare_perete (format_cal_perete, hartie_cal_perete, tiraj_cal_perete, id_client) VALUES('$format', '$hartie', '$tiraj', '$id_client');");						
									}
								elseif($_SESSION['cos'][$i][0]=='flyer')	
									{
										$format= $_SESSION['cos'][$i][1];
										$print= $_SESSION['cos'][$i][2];
										$hartie=$_SESSION['cos'][$i][3];
										$tiraj= $_SESSION['cos'][$i][4];

										if($flyer==0)
											{
												$nr_flyer= mysqli_fetch_row(mysqli_query($conect, "SELECT nr_flyer FROM flyere ORDER BY nr_flyer DESC LIMIT 1;"));	
											}

										$flyer++;
										
										mysqli_query($conect, "INSERT INTO flyere (format_flyer, print_flyer, hartie_flyer, tiraj_flyer, id_client) VALUES ('$format', '$print', '$hartie', '$tiraj', '$id_client');");				
									}
								elseif($_SESSION['cos'][$i][0]=='calendar-birou')
									{
										$forma= $_SESSION['cos'][$i][1];
										$hartie= $_SESSION['cos'][$i][2];
										$tiraj= $_SESSION['cos'][$i][3];

										if($calendar_birou==0)
											{
												$nr_cal_birou= mysqli_fetch_row(mysqli_query($conect, "SELECT nr_cal_birou FROM calendare_birou ORDER BY nr_cal_birou DESC LIMIT 1;"));
											}
										
											$calendar_birou++;
										
											mysqli_query($conect, "INSERT INTO calendare_birou (format_cal_birou, hartie_cal_birou, tiraj_cal_birou, id_client) VALUES ('$format', '$hartie', '$tiraj', '$id_client');");
									}
								elseif($_SESSION['cos'][$i][0]=='pliant')
									{
										$format= $_SESSION['cos'][$i][1];
										$hartie= $_SESSION['cos'][$i][2];
										$tiraj= $_SESSION['cos'][$i][3];

										if($pliant==0)
											{		
												$q= mysqli_query($conect, "SELECT nr_pliant FROM pliante ORDER BY nr_pliant DESC LIMIT 1;");						
												$nr_pliant= mysqli_fetch_row($q);
											}		
										
										$pliant++;
										
										mysqli_query($conect, "INSERT INTO pliante (format_pliant,hartie_pliant, tiraj_pliant, id_client) VALUES ('$format', '$hartie', '$tiraj', '$id_client');");						
									}
								elseif($_SESSION['cos'][$i][0]=='carte-vizita')
									{
										$carton= $_SESSION['cos'][$i][1];
										$colt= $_SESSION['cos'][$i][2];
										$tiraj= $_SESSION['cos'][$i][3];

										if($carte_vizita==0)
											{
												$nr_cart_vizita= mysqli_fetch_row(mysqli_query($conect, "SELECT nr_cart_vizita FROM carti_vizita ORDER BY nr_cart_vizita DESC LIMIT 1 ;"));
											}

										$carte_vizita++;

										mysqli_query($conect, "INSERT INTO carti_vizita (carton_cart_vizita, colt_rotund, tiraj_cart_vizita, id_client) VALUES ('$carton', '$colt', '$tiraj', '$id_client');");	
									}
							}

						$cart=$carte;
						$cal_per=$calendar_perete;
						$cal_bir=$calendar_birou;
						$fly=$flyer;
						$pli=$pliant;
						$car_viz=$carte_vizita;

						for($i=0; $i<=4; $i++)
							{
								if($carte!=0)
									{
										$cartedb[]=$nr_carte[0]+$carte;
										$carte--;
									}
								else
									{
										$cartedb[]=NULL;
									}

								if($calendar_perete!=0)
									{
										$calendar_peretedb[]=$nr_cal_perete[0]+$calendar_perete;
										$calendar_perete--;
									}
								else
									{
										$calendar_peretedb[]=NULL;
									}

								if($calendar_birou!=0)
									{
										$calendar_biroudb[]=$nr_cal_birou[0]+$calendar_birou;
										$calendar_birou--;
									}
								else
									{
										$calendar_biroudb[]=NULL;
									}
								
								if($flyer!=0)
									{
										$flyerdb[]=$nr_flyer[0]+$flyer;
										$flyer--;
									}
								else
									{
										$flyerdb[]=NULL;
									}

								if($carte_vizita!=0)
									{
										$carte_vizitadb[]=$nr_cart_vizita[0]+$carte_vizita;
										$carte_vizita--;
									}
								else
									{
										$carte_vizitadb[]=NULL;
									}

								if($pliant!=0)
									{
										$pliantdb[]=$nr_pliant[0]+$pliant;
										$pliant--;
									}
								else
									{
										$pliantdb[]=NULL;
									}
							}

						$com_carte[]=NULL;
						$com_cal_per[]=NULL;
						$com_cal_bir[]=NULL;
						$com_fly[]=NULL;
						$com_pli[]=NULL;
						$com_car_viz[]=NULL;

						if($cart!=0)
							{
								mysqli_query($conect, "INSERT INTO comenzi_carti (nr_carte1, nr_carte2, nr_carte3, nr_carte4, nr_carte5, id_client) VALUES ('$cartedb[0]', NULLIF('$cartedb[1]', ''), NULLIF('$cartedb[2]', ''), NULLIF('$cartedb[3]', ''), NULLIF('$cartedb[4]', ''), '$id_client');");	

								$com_carte=mysqli_fetch_row(mysqli_query($conect, "SELECT nr_com_carte FROM comenzi_carti ORDER BY nr_com_carte DESC LIMIT 1;"));
							}

						if($cal_per!=0)
							{
								mysqli_query($conect, "INSERT INTO comenzi_cal_perete (nr_cal_perete1, nr_cal_perete2, nr_cal_perete3, nr_cal_perete4, nr_cal_perete5, id_client) VALUES ('$calendar_peretedb[0]', NULLIF('$calendar_peretedb[1]', ''), NULLIF('$calendar_peretedb[2]', ''), NULLIF('$calendar_peretedb[3]', ''), NULLIF('$calendar_peretedb[4]', ''), '$id_client');");

								$com_cal_per=mysqli_fetch_row(mysqli_query($conect, "SELECT nr_com_cal_perete FROM comenzi_cal_perete ORDER BY nr_com_cal_perete DESC LIMIT 1;"));	
							}

						if($cal_bir!=0)
							{
								mysqli_query($conect, "INSERT INTO comenzi_cal_birou (nr_cal_birou1, nr_cal_birou2, nr_cal_birou3, nr_cal_birou4, nr_cal_birou5, id_client) VALUES ('$calendar_biroudb[0]', NULLIF('$calendar_biroudb[1]', ''), NULLIF('$calendar_biroudb[2]', ''), NULLIF('$calendar_biroudb[3]', ''), NULLIF('$calendar_biroudb[4]', ''), '$id_client');");

								$com_cal_bir=mysqli_fetch_row(mysqli_query($conect, "SELECT nr_com_cal_birou FROM comenzi_cal_birou ORDER BY nr_com_cal_birou DESC LIMIT 1;"));	
							}

						if($fly!=0)
							{
								mysqli_query($conect, "INSERT INTO comenzi_flyere (nr_flyer1, nr_flyer2, nr_flyer3, nr_flyer4, nr_flyer5, id_client) VALUES ('$flyerdb[0]', NULLIF('$flyerdb[1]', ''), NULLIF('$flyerdb[2]', ''), NULLIF('$flyerdb[3]', ''), NULLIF('$flyerdb[4]', ''), '$id_client');");

								$com_fly=mysqli_fetch_row(mysqli_query($conect, "SELECT nr_com_flyer FROM comenzi_flyere ORDER BY nr_com_flyer DESC LIMIT 1;"));		
							}

						if($pli!=0)
							{
								mysqli_query($conect, "INSERT INTO comenzi_pliante (nr_pliant1, nr_pliant2, nr_pliant3, nr_pliant4, nr_pliant5, id_client) VALUES ('$pliantdb[0]', NULLIF('$pliantdb[1]', ''), NULLIF('$pliantdb[2]', ''), NULLIF('$pliantdb[3]', ''), NULLIF('$pliantdb[4]', ''), '$id_client');");

								$com_pli=mysqli_fetch_row(mysqli_query($conect, "SELECT nr_com_pliant FROM comenzi_pliante ORDER BY nr_com_pliant DESC LIMIT 1;"));		
							}

						if($car_viz!=0)
							{
								mysqli_query($conect, "INSERT INTO comenzi_carti_vizita (nr_cart_vizita1, nr_cart_vizita2, nr_cart_vizita3, nr_cart_vizita4, nr_cart_vizita5, id_client) VALUES ('$carte_vizitadb[0]', NULLIF('$carte_vizitadb[1]',' '), NULLIF('$carte_vizitadb[2]',' '), NULLIF('$carte_vizitadb[3]',' ') , NULLIF('$carte_vizitadb[4]',' '), '$id_client');");

								$com_car_viz=mysqli_fetch_row(mysqli_query($conect, "SELECT nr_com_cat_vizita FROM comenzi_carti_vizita ORDER BY nr_com_cat_vizita DESC LIMIT 1;"));
							}
						echo $com_carte[0].'<br>';
						// echo $com_cal_bir[0];

						mysqli_query($conect, "INSERT INTO comenzi (nr_com_carte, nr_com_cal_birou, nr_com_cal_perete, nr_com_cat_vizita, nr_com_flyer, nr_com_pliant, id_client) VALUES (NULLIF('$com_carte[0]', ' '), NULLIF('$com_cal_bir[0]', ' '), NULLIF('$com_cal_per[0]', ' '), NULLIF('$com_car_viz[0]', ' '), NULLIF('$com_fly[0]', ' '), NULLIF('$com_pli[0]', ' '), '$id_client');");
						$_SESSION['cos']=NULL;
						echo ' <script>window.history.back(-1);</script>';
					}
				else
						echo "<center><div class='gol'>Cosul este gol!</div></center>";
			else
				header("Location:log.php");
		}
		}
?></body>
</html>



