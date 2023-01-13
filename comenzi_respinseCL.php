<?php
include("conectare.php");
session_start();
if($_SESSION['nivel']!=3)
	header("Location: index.html");

	$nr_comanda= $_GET['nr_comanda'];
	$id_client=$_SESSION['id_client'];

	if(isset($_GET['nr_comanda']))
		{
			$nr_comanda= $_GET['nr_comanda'];

			$sql_cal_birou = "SELECT nr_cal_birou1, nr_cal_birou2, nr_cal_birou3, nr_cal_birou4, nr_cal_birou5 FROM comenzi_cal_birou INNER JOIN comenzi ON comenzi_cal_birou.nr_com_cal_birou= comenzi.nr_com_cal_birou AND comenzi.nr_comanda='$nr_comanda' AND comenzi.status='respins' AND comenzi.pret_total IS NOT NULL;";

			$sql_cal_perete = "SELECT nr_cal_perete1, nr_cal_perete2, nr_cal_perete3, nr_cal_perete4, nr_cal_perete5 FROM comenzi_cal_perete INNER JOIN comenzi ON comenzi_cal_perete.nr_com_cal_perete= comenzi.nr_com_cal_perete AND comenzi.nr_comanda='$nr_comanda' AND comenzi.status='respins' AND comenzi.pret_total IS NOT NULL;";

			$sql_carte = "SELECT nr_carte1, nr_carte2, nr_carte3, nr_carte4, nr_carte5 FROM comenzi_carti INNER JOIN comenzi ON comenzi_carti.nr_com_carte= comenzi.nr_com_carte AND comenzi.nr_comanda='$nr_comanda' AND comenzi.status='respins' AND comenzi.pret_total IS NOT NULL;";

			$sql_cart_vizita = "SELECT nr_cart_vizita1, nr_cart_vizita2, nr_cart_vizita3, nr_cart_vizita4, nr_cart_vizita5 FROM comenzi_carti_vizita INNER JOIN comenzi ON comenzi_carti_vizita.nr_com_cat_vizita= comenzi.nr_com_cat_vizita AND comenzi.nr_comanda='$nr_comanda' AND comenzi.status='respins' AND comenzi.pret_total IS NOT NULL;";

			$sql_flyere = "SELECT nr_flyer1, nr_flyer2, nr_flyer3, nr_flyer4, nr_flyer5 FROM comenzi_flyere INNER JOIN comenzi ON comenzi_flyere.nr_com_flyer= comenzi.nr_com_flyer AND comenzi.nr_comanda='$nr_comanda' AND comenzi.status='respins' AND comenzi.pret_total IS NOT NULL;";

			$sql_pliant= "SELECT nr_pliant1, nr_pliant2, nr_pliant3, nr_pliant4, nr_pliant5 FROM comenzi_pliante INNER JOIN comenzi ON comenzi_pliante.nr_com_pliant= comenzi.nr_com_pliant AND comenzi.nr_comanda='$nr_comanda' AND comenzi.status='respins' AND comenzi.pret_total IS NOT NULL;";

			$cal_birou= mysqli_query($conect, $sql_cal_birou);
			$rcal_birou= mysqli_num_rows($cal_birou);

			$cal_perete= mysqli_query($conect, $sql_cal_perete);
			$rcal_perete= mysqli_num_rows($cal_perete);

			$carte= mysqli_query($conect, $sql_carte);
			$rcarte= mysqli_num_rows($carte);

			$cart_vizita= mysqli_query($conect, $sql_cart_vizita);
			$rcart_vizita= mysqli_num_rows($cart_vizita);

			$flyere= mysqli_query($conect, $sql_flyere);
			$rflyere= mysqli_num_rows($flyere);

			$pliant= mysqli_query($conect, $sql_pliant);
			$rpliant= mysqli_num_rows($pliant);	
		}

	if($rcal_birou>0)
		{		
			while($r=mysqli_fetch_assoc($cal_birou))
				{

					$comanda[]=array('calendar-birou', $r['nr_cal_birou1'], $r['nr_cal_birou2'], $r['nr_cal_birou3'], $r['nr_cal_birou4'], $r['nr_cal_birou5']);

				}
		}

	if($rcal_perete>0)
		{
			while($r=mysqli_fetch_assoc($cal_perete))
				{

					$comanda[]=array('calendar-perete', $r['nr_cal_perete1'], $r['nr_cal_perete2'], $r['nr_cal_perete3'], $r['nr_cal_perete4'], $r['nr_cal_perete5']);

				}
		}

	if($rcarte>0)
		{		
			while($r=mysqli_fetch_assoc($carte))
				{

					$comanda[]=array('carte', $r['nr_carte1'], $r['nr_carte2'], $r['nr_carte3'], $r['nr_carte4'], $r['nr_carte5']);

				}
		}

	if($rcart_vizita>0)
		{
			while($r=mysqli_fetch_assoc($cart_vizita))
				{

					$comanda[]=array('carte-vizita', $r['nr_cart_vizita1'], $r['nr_cart_vizita2'], $r['nr_cart_vizita3'], $r['nr_cart_vizita4'], $r['nr_cart_vizita5']);

				}
		}

	if($rflyere>0)
		{
			while($r=mysqli_fetch_assoc($flyere))
				{

					$comanda[]=array('flyer', $r['nr_flyer1'], $r['nr_flyer2'], $r['nr_flyer3'], $r['nr_flyer4'], $r['nr_flyer5']);

				}
		}

	if($rpliant>0)
		{
			while($r=mysqli_fetch_assoc($pliant))
				{

					$comanda[]=array('pliant', $r['nr_pliant1'], $r['nr_pliant2'], $r['nr_pliant3'], $r['nr_pliant4'], $r['nr_pliant5']);

				}
		}

$comandaDetaliat=array();

for($i=0; $i<count($comanda); $i++)
		{
			for($j=1; $j<count($comanda[$i]); $j++)
				{
					if($comanda[$i][0]== 'carte')
						{
							$nr_carte= $comanda[$i][$j];

							$s_carte= "SELECT titlu, format_carte, pg_carte, nr_pag, hartie_carte, prt_coperta, grosime_carton, laminare, clp_flaps, tiraj_carte FROM carti WHERE nr_carte='$nr_carte' AND pret_carte IS NOT NULL;";
			
							$carte= mysqli_query($conect, $s_carte);
							$rcarte= mysqli_num_rows($carte);

							if($rcarte>0)
								{

									while($r=mysqli_fetch_assoc($carte))
										{
											$comandaDetaliat[]=array('carte', $r['titlu'], $r['format_carte'], $r['pg_carte'], $r['nr_pag'], $r['hartie_carte'], $r['prt_coperta'], $r['grosime_carton'], $r['laminare'], $r[ 'clp_flaps'], $r['tiraj_carte']);
										}
								}
						}
			
					elseif($comanda[$i][0]=='calendar-perete')
						{
							$nr_cal_perete= $comanda[$i][$j];

							$s_cal_perete= "SELECT format_cal_perete, hartie_cal_perete, tiraj_cal_perete  FROM calendare_perete WHERE nr_cal_perete= '$nr_cal_perete' AND pret_cal_perete IS NOT NULL;";

							$cal_perete= mysqli_query($conect, $s_cal_perete);
							$rcal_perete= mysqli_num_rows($cal_perete);

							if($rcal_perete>0)
								{
									while($r=mysqli_fetch_assoc($cal_perete))
										{
											$comandaDetaliat[]=array('calendar-perete', $r['format_cal_perete'], $r['hartie_cal_perete'], $r['tiraj_cal_perete']);
										}
								}
						}

					elseif($comanda[$i][0]=='flyer')
						{
							$nr_flyer= $comanda[$i][$j];

							$s_flyer= "SELECT format_flyer, print_flyer, hartie_flyer, tiraj_flyer  FROM flyere WHERE nr_flyer= '$nr_flyer' AND pret_flyer IS NOT NULL;";

							$flyer= mysqli_query($conect, $s_flyer);
							$rflyer= mysqli_num_rows($flyer);

							if($rflyer>0)
								{
									while($r=mysqli_fetch_assoc($flyer))
										{
											$comandaDetaliat[]=array('flyer', $r['format_flyer'], $r['print_flyer'], $r['hartie_flyer'], $r['tiraj_flyer']);
										}
								}
						}

					elseif($comanda[$i][0]=='calendar-birou')
						{
							$nr_cal_birou= $comanda[$i][$j];

							$s_cal_birou= "SELECT format_cal_birou, hartie_cal_birou, tiraj_cal_birou  FROM calendare_birou WHERE nr_cal_birou= '$nr_cal_birou' AND pret_cal_birou IS NOT NULL;";

							$cal_birou= mysqli_query($conect, $s_cal_birou);
							$rcal_birou= mysqli_num_rows($cal_birou);

							if($rcal_birou>0)
								{
									while($r=mysqli_fetch_assoc($cal_birou))
										{
											$comandaDetaliat[]=array('calendar-birou', $r['format_cal_birou'], $r['hartie_cal_birou'], $r['tiraj_cal_birou']);
										}
								}
						}

					elseif($comanda[$i][0]=='pliant')
						{
							$nr_pliant= $comanda[$i][$j];

							$s_pliant= "SELECT format_pliant, hartie_pliant, tiraj_pliant  FROM pliante WHERE nr_pliant= '$nr_pliant' AND pret_pliant IS NOT NULL;";

							$pliant= mysqli_query($conect, $s_pliant);
							$rpliant= mysqli_num_rows($pliant);

							if($rpliant>0)
								{
									while($r=mysqli_fetch_assoc($pliant))
										{
											$comandaDetaliat[]=array('pliant', $r['format_pliant'], $r['hartie_pliant'], $r['tiraj_pliant']);
										}
								}
						}

					elseif($comanda[$i][0]=='carte-vizita')
						{
							$nr_cart_vizita= $comanda[$i][$j];

							$s_cart_vizita= "SELECT carton_cart_vizita, colt_rotund, tiraj_cart_vizita  FROM carti_vizita WHERE nr_cart_vizita= '$nr_cart_vizita' AND pret_cart_vizita IS NOT NULL;";

							$cart_vizita= mysqli_query($conect, $s_cart_vizita);
							$rcart_vizita= mysqli_num_rows($cart_vizita);

							if($rcart_vizita>0)
								{
									while($r=mysqli_fetch_assoc($cart_vizita))
										{
											$comandaDetaliat[]=array('carte-vizita', $r['carton_cart_vizita'], $r['colt_rotund'], $r['tiraj_cart_vizita']);
										}
								}
						}
				}
		}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/comanda.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comenzi respinse de client</title>
</head>
<body>
	<center>
	<?php
for($i=0; $i<count($comandaDetaliat); $i++)
		{
			
			if($comandaDetaliat[$i][0]== 'carte')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="6" width="100"><img src="src/carte.png" width="100" height="100"></td></tr>
					<tr><td>Titlu: '.$comandaDetaliat[$i][1].'</td>
					<td>Format: '.$comandaDetaliat[$i][2].'</td></tr>
					<tr><td>Pagini: '.$comandaDetaliat[$i][3].'</td>
				
					<td>numar pagini: '.$comandaDetaliat[$i][4].'</td</tr>
					<tr>
					<td>Hartie: '.$comandaDetaliat[$i][5].'</td>
					<td>Print coperta: '.$comandaDetaliat[$i][6].'</td></tr>
					<tr><td>Grosime carton: '.$comandaDetaliat[$i][7].'</td>
					
					<td>Laminare: '.$comandaDetaliat[$i][8].'</td></tr>
					<tr><td>Clape/flapsuri: '.$comandaDetaliat[$i][9].'</td>
					
					<td>Tiraj: '.$comandaDetaliat[$i][10].'</td>
					</tr>
					
					</table>
					';
				}
			elseif($comandaDetaliat[$i][0]=='calendar-perete')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="4" width="100"><img src="src/calendar-perete.png" width="100" height="100"></td></tr>
					<tr><td>Hartie: '.$comandaDetaliat[$i][1].'</td></tr>
					<tr><td>Format: '.$comandaDetaliat[$i][2].'</td></tr>
					<tr><td>Tiraj: '.$comandaDetaliat[$i][3].'</td>
					
					</tr>
					</table>
					';
				}
			elseif($comandaDetaliat[$i][0]=='flyer')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="5" width="100"><img src="src/flyer.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Format: '.$comandaDetaliat[$i][1].'</td></tr>
					<tr><td>Print: '.$comandaDetaliat[$i][2].'</td>
					</tr>
					<tr>
					<td>Hartie: '.$comandaDetaliat[$i][3].'</td></tr>
					<tr><td>Tiraj: '.$comandaDetaliat[$i][4].'</td>
					
					</tr>
					</table>
					';
				}
			elseif($comandaDetaliat[$i][0]=='calendar-birou')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="4" width="100"><img src="src/calendar-birou.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Format: '.$comandaDetaliat[$i][1].'</td></tr>
					<tr><td>Hartie: '.$comandaDetaliat[$i][2].'</td></tr>
					<tr><td>Tiraj: '.$comandaDetaliat[$i][3].'</td>
					
					</tr>
					</table>
					';
				}
			elseif($comandaDetaliat[$i][0]=='pliant')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="4" width="100"><img src="src/pliant.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Format: '.$comandaDetaliat[$i][1].'</td></tr>
					<tr><td>Hartie: '.$comandaDetaliat[$i][2].'</td>
					</tr>					
					<tr><td>Tiraj: '.$comandaDetaliat[$i][3].'</td>
					
					</tr>
					</table>
					';
				}
			elseif($comandaDetaliat[$i][0]=='carte-vizita')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="4" width="100"><img src="src/carte-vizita.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Caerton: '.$comandaDetaliat[$i][1].'</td></tr>
					<tr><td>Colt rotund: '.$comandaDetaliat[$i][2].'</td></tr>
					<tr><td>Tiraj: '.$comandaDetaliat[$i][3].'</td>
					
					</tr>
					</table>
					';
				}
			
		}
?>

<form method="POST">
<button name="inapoi" class="btn">inapoi</button>
</form>

<?php

if(isset($_POST['inapoi']))
	header("Location: CEOcontrol.php")

?>
</center>

</body>
</html>