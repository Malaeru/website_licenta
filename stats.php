<?php
session_start();
include("conectare.php");
if($_SESSION['nivel']!=3)
	header("Location: index.html");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<link rel="stylesheet" href="css/comanda.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Statistica</title>
</head>
<body>


<?php
	$ani = range(2021, strftime("%Y", time()));
			echo '<center><form method="POST" style="color: white;">
					Produs: <select name="select">
						<option>Carti</option>
						<option>Calendare-perete</option>
						<option>Flyere</option>
						<option>Calendare-birou</option>
						<option>Pliante</option>
						<option>Carti de vizita</option>
					</select>
					Luna: <select name="luna">
						<option>toate</option>
						<option>Ianuarie</option>
						<option>Februarie</option>
						<option>Martie</option>
						<option>Aprilie</option>
						<option>Mai</option>
						<option>Iunie</option>
						<option>Iulie</option>
						<option>August</option>
						<option>Septembrie</option>
						<option>Octombrie</option>
						<option>Noembrie</option>
						<option>Decembrie</option>
					</select>
					An: <select name="an">
  						<option>anul</option>';
							foreach($ani as $an) :
    					echo '<option>'.$an.'</option>';
						endforeach;
					echo '</select>
					Soteaza: <select name="ordine">
			<option> </option>
			<option>Tiraj crescator</option>
			<option>Tiraj descrescator</option>
			<option>Pret crescator</option>
			<option>Pret descrescator</option>
		</select>
					<input type="submit" name="sub" class="btn" value="cauta">
					<br />
					<select name="ord">
						<option>Crescator</option>
						<option>Descrescator</option>
						</select>
		<button name="pret" class="btn">Vanzari pe luni</button>

				</form>';

$sel= filter_input(INPUT_POST, "select");
$luna= filter_input(INPUT_POST,"luna");
$an= filter_input(INPUT_POST,"an");



$luna= str_replace("Ianuarie","01",$luna);
$luna= str_replace("Februarie","02",$luna);
$luna= str_replace("Martie","03",$luna);
$luna= str_replace("Aprilie","04",$luna);
$luna= str_replace("Mai","05",$luna);
$luna= str_replace("Iunie","06",$luna);
$luna= str_replace("Iulie","07",$luna);
$luna= str_replace("August","08",$luna);
$luna= str_replace("Septembrie","09",$luna);
$luna= str_replace("Octombrie","10",$luna);
$luna= str_replace("Noembrie","11",$luna);
$luna= str_replace("Decembrie","12",$luna);

$select= strtolower($sel);
$select= str_replace("-","_",$select);
$select= str_replace(" de ","_",$select);
$s= $select;
$a= array();
$nr_comanda= array();

	if($luna=='toate')
		{
			$sql_com= "SELECT nr_comanda FROM facturi WHERE data BETWEEN '$an/01/01' AND '$an/12/31';";
		}
	else
		$sql_com= "SELECT nr_comanda FROM facturi WHERE data BETWEEN '$an/$luna/01' AND '$an/$luna/31';";

$bc= mysqli_query($conect, $sql_com);
$c= mysqli_num_rows($bc);

$ord= NULL;
echo $ord;
$ordine= filter_input(INPUT_POST,"ordine");
		
	if(isset($_POST['ordine']))
		{
			if($ordine==' ')
				$ord= NULL;

			if($ordine=="Pret crescator")
				{
					if($select=='calendare_birou')
						{
							$ord='ORDER BY pret_cal_perete ASC';
						}
					if($select=='calendare_perete')
						{
							$ord='ORDER BY pret_cal_perete ASC';
						}
					if($select=='carti')
						{
							$ord='ORDER BY pret_carte ASC';
						}
					if($select=='carti_vizita')
						{
							$ord='ORDER BY pret_cart_vizita ASC';
						}
					if($select=='flyere')
						{
							$ord='ORDER BY pret_flyer ASC';
						}
					if($select=='pliante')
						{
							$ord='ORDER BY pret_pliant ASC';
						}	
				}
			elseif($ordine=="Pret descrescator")
				{
					if($select=='calendare_birou')
						{
							$ord='ORDER BY pret_cal_perete DESC';
						}
					if($select=='calendare_perete')
						{
							$ord='ORDER BY pret_cal_perete DESC';
						}
					if($select=='carti')
						{
							$ord='ORDER BY pret_carte DESC';
						}
					if($select=='carti_vizita')
						{
							$ord='ORDER BY pret_cart_vizita DESC';
						}
					if($select=='flyere')
						{
							$ord='ORDER BY pret_flyer DESC';
						}
					if($select=='pliante')
						{
							$ord='ORDER BY pret_pliant DESC';	
						}
					}
			elseif($ordine=="Tiraj crescator")
				{
					if($select=='calendare_birou')
						{
							$ord='ORDER BY tiraj_cal_birou ASC';
						}
					if($select=='calendare_perete')
						{
							$ord='ORDER BY tiraj_cal_perete ASC';
						}
					if($select=='carti')
						{
							$ord='ORDER BY tiraj_carte ASC';
						}
					if($select=='carti_vizita')
						{
							$ord='ORDER BY tiraj_cart_vizita ASC';
						}
					if($select=='flyere')
						{
							$ord='ORDER BY tiraj_flyer ASC';
						}
					if($select=='pliante')
						{
							$ord='ORDER BY tiraj_pliant ASC';
						}	
				}
			elseif($ordine=="Tiraj descrescator")
				{
					if($select=='calendare_birou')
						{
							$ord='ORDER BY tiraj_cal_birou DESC';
						}
					if($select=='calendare_perete')
						{
							$ord='ORDER BY tiraj_cal_perete DESC';
						}
					if($select=='carti')
						{
							$ord='ORDER BY tiraj_carte DESC';
						}
					if($select=='carti_vizita')
						{
							$ord='ORDER BY tiraj_cart_vizita DESC';
						}
					if($select=='flyere')
						{
							$ord='ORDER BY tiraj_flyer DESC';
						}
					if($select=='pliante')
						{
							$ord='ORDER BY tiraj_pliant DESC';
						}	
				}
		}

	if($c>0)
		{		
			while($r=mysqli_fetch_assoc($bc))
				{
					$nr_comanda[]= $r['nr_comanda'];
				}
		}

	for($i=0; $i<count($nr_comanda); $i++)
		{	
							if($select=='calendare_birou')
								{
									$sql= "SELECT nr_cal_birou1, nr_cal_birou2, nr_cal_birou3, nr_cal_birou4, nr_cal_birou5 FROM comenzi_cal_birou INNER JOIN comenzi ON comenzi_cal_birou.nr_com_cal_birou= comenzi.nr_com_cal_birou AND comenzi.nr_comanda='$nr_comanda[$i]' AND comenzi.stare='finalizat' AND comenzi.status='acceptat' AND comenzi.pret_total IS NOT NULL;";

									$f=mysqli_query($conect, $sql);

									if(mysqli_num_rows($f)>0)
										{
											while ($x= mysqli_fetch_assoc($f))
												{
													$a[]= $x['nr_cal_birou1'];
													$a[]= $x['nr_cal_birou2'];
													$a[]= $x['nr_cal_birou3'];
													$a[]= $x['nr_cal_birou4'];
													$a[]= $x['nr_cal_birou5'];
												}
										}
								}

							if($select=='calendare_perete')
								{
									$sql= "SELECT nr_cal_perete1, nr_cal_perete2, nr_cal_perete3, nr_cal_perete4, nr_cal_perete5 FROM comenzi_cal_perete INNER JOIN comenzi ON comenzi_cal_perete.nr_com_cal_perete= comenzi.nr_com_cal_perete AND comenzi.nr_comanda='$nr_comanda[$i]' AND comenzi.stare='finalizat' AND comenzi.status='acceptat' AND comenzi.pret_total IS NOT NULL;";

									$f=mysqli_query($conect, $sql);

									if(mysqli_num_rows($f)>0)
										{
											while ($x= mysqli_fetch_assoc($f))
												{
													$a[]= $x['nr_cal_perete1'];
													$a[]= $x['nr_cal_perete2'];
													$a[]= $x['nr_cal_perete3'];
													$a[]= $x['nr_cal_perete4'];
													$a[]= $x['nr_cal_perete5'];
												}
										}
								}

							if($select=='carti')
								{
									$sql= "SELECT nr_carte1, nr_carte2, nr_carte3, nr_carte4, nr_carte5 FROM comenzi_carti INNER JOIN comenzi ON comenzi_carti.nr_com_carte= comenzi.nr_com_carte AND comenzi.nr_comanda='$nr_comanda[$i]' AND comenzi.stare='finalizat' AND comenzi.status='acceptat' AND comenzi.pret_total IS NOT NULL;";

									$f=mysqli_query($conect, $sql);

									if(mysqli_num_rows($f)>0)
										{
											while ($x= mysqli_fetch_assoc($f))
												{
													$a[]= $x['nr_carte1'];
													$a[]= $x['nr_carte2'];
													$a[]= $x['nr_carte3'];
													$a[]= $x['nr_carte4'];
													$a[]= $x['nr_carte5'];
												}
										}
								}

							if($select=='carti_vizita')
								{
									$sql= "SELECT nr_cart_vizita1, nr_cart_vizita2, nr_cart_vizita3, nr_cart_vizita4, nr_cart_vizita5 FROM comenzi_carti_vizita INNER JOIN comenzi ON comenzi_carti_vizita.nr_com_cat_vizita= comenzi.nr_com_cat_vizita AND comenzi.nr_comanda='$nr_comanda[$i]' AND comenzi.stare='finalizat' AND comenzi.status='acceptat' AND comenzi.pret_total IS NOT NULL;";

									$f=mysqli_query($conect, $sql);

									if(mysqli_num_rows($f)>0)
										{
											while ($x= mysqli_fetch_assoc($f))
												{
													if($x['nr_cart_vizita1']!= NULL)
														$a[]= $x['nr_cart_vizita1'];
													if($x['nr_cart_vizita2']!= NULL)
														$a[]= $x['nr_cart_vizita2'];
													if($x['nr_cart_vizita3']!= NULL)
														$a[]= $x['nr_cart_vizita3'];
													if($x['nr_cart_vizita4']!= NULL)
														$a[]= $x['nr_cart_vizita4'];
													if($x['nr_cart_vizita5']!= NULL)
														$a[]= $x['nr_cart_vizita5'];
												}
										}
								}

							if($select=='flyere')
								{
									$sql= "SELECT nr_flyer1, nr_flyer2, nr_flyer3, nr_flyer4, nr_flyer5 FROM comenzi_flyere INNER JOIN comenzi ON comenzi_flyere.nr_com_flyer= comenzi.nr_com_flyer AND comenzi.nr_comanda='$nr_comanda[$i]' AND comenzi.stare='finalizat' AND comenzi.status='acceptat' AND comenzi.pret_total IS NOT NULL;";

									$f=mysqli_query($conect, $sql);

									if(mysqli_num_rows($f)>0)
										{
											while ($x= mysqli_fetch_assoc($f))
												{
													$a[]= $x['nr_flyer1'];
													$a[]= $x['nr_flyer2'];
													$a[]= $x['nr_flyer3'];
													$a[]= $x['nr_flyer4'];
													$a[]= $x['nr_flyer5'];
												}
										}
								}

							if($select=='pliante')
								{
									$sql= "SELECT nr_pliant1, nr_pliant2, nr_pliant3, nr_pliant4, nr_pliant5 FROM comenzi_pliante INNER JOIN comenzi ON comenzi_pliante.nr_com_pliant= comenzi.nr_com_pliant AND comenzi.nr_comanda='$nr_comanda[$i]' AND comenzi.stare='finalizat' AND comenzi.status='acceptat' AND comenzi.pret_total IS NOT NULL;";

									$f=mysqli_query($conect, $sql);

									if(mysqli_num_rows($f)>0)
										{
											while ($x= mysqli_fetch_assoc($f))
												{
													$a[]= $x['nr_pliant1'];
													$a[]= $x['nr_pliant2'];
													$a[]= $x['nr_pliant3'];
													$a[]= $x['nr_pliant4'];
													$a[]= $x['nr_pliant5'];
												}
										}
								}		
		}

$produse= array();

	for ($i=0; $i< count($a); $i++) 
		{
			if($select=='calendare_birou')
				{
					$sql= "SELECT format_cal_birou, hartie_cal_birou, tiraj_cal_birou, pret_cal_birou FROM $select WHERE nr_cal_birou= '$a[$i]';";

					$f=mysqli_query($conect, $sql);

					if(mysqli_num_rows($f)>0)
						{
							while ($x= mysqli_fetch_assoc($f))									
								$produse[]= array('calendar-birou',  $x['format_cal_birou'], $x['hartie_cal_birou'], $x['pret_cal_birou']);
						}
				}
			if($select=='calendare_perete')
				{
					$sql= "SELECT format_cal_perete, hartie_cal_perete, tiraj_cal_perete, pret_cal_perete FROM $select WHERE nr_cal_perete= '$a[$i]';";

					$f=mysqli_query($conect, $sql);

					if(mysqli_num_rows($f)>0)
						{
							while ($x= mysqli_fetch_assoc($f))									
								$produse[]=array('calendar-perete', $x['format_cal_perete'], $x['hartie_cal_perete'], $x['tiraj_cal_perete'], $x['pret_cal_perete']);
						}
				}
			if($select=='carti')
				{
					$sql= "SELECT titlu, format_carte, pg_carte, nr_pag, hartie_carte, prt_coperta, grosime_carton, laminare, clp_flaps, tiraj_carte, pret_carte FROM $select WHERE nr_carte= '$a[$i]';";

					$f=mysqli_query($conect, $sql);

					if(mysqli_num_rows($f)>0)
						{
							while ($x= mysqli_fetch_assoc($f))									
								$produse[]=array('carte', $x['titlu'], $x['format_carte'], $x['pg_carte'], $x['nr_pag'], $x['hartie_carte'], $x['prt_coperta'], $x['grosime_carton'], $x['laminare'], $x['clp_flaps'], $x['tiraj_carte'], $x['pret_carte']);
						}
				}
			if($select=='carti_vizita')
				{
					$sql= "SELECT carton_cart_vizita, colt_rotund, tiraj_cart_vizita, pret_cart_vizita FROM $select WHERE nr_cart_vizita='$a[$i]' $ord;";

					$f=mysqli_query($conect, $sql);

					if(mysqli_num_rows($f)>0)
						{
							while ($x= mysqli_fetch_assoc($f))									
								$produse[]=array('carte-vizita', $x['carton_cart_vizita'], $x['colt_rotund'], $x['tiraj_cart_vizita']);
						}
				}
			if($select=='flyere')
				{
					$sql= "SELECT format_flyer, print_flyer, hartie_flyer, tiraj_flyer, pret_flyer FROM $select WHERE nr_flyer= '$a[$i]';";

					$f=mysqli_query($conect, $sql);

					if(mysqli_num_rows($f)>0)
						{
							while ($x= mysqli_fetch_assoc($f))									
								$produse[]=array('flyer', $x['format_flyer'], $x['print_flyer'], $x['hartie_flyer'], $x['tiraj_flyer'], $x['pret_flyer']);
						}
				}
			if($select=='pliante')
				{
					$sql= "SELECT format_pliant, hartie_pliant, tiraj_pliant, pret_pliant FROM $select WHERE nr_pliant= '$a[$i]';";

					$f=mysqli_query($conect, $sql);

					if(mysqli_num_rows($f)>0)
						{
							while ($x= mysqli_fetch_assoc($f))									
								$produse[]= array('pliant', $x['format_pliant'], $x['hartie_pliant'], $x['tiraj_pliant'], $x['pret_pliant']);
						}
				}		
		}

if(isset($_POST['sub']))
{if($an=='anul')
	echo "<span style='color: white; font-size:20px;'>Selecteaza un an!</span>";
	else
	{
	if($produse!=NULL)
		for($i=0; $i<count($produse); $i++)
		{
			
			if($produse[$i][0]== 'carte')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="3"><img src="src/carte.png" width="100" height="100"></td>
					<td>Titlu: '.$produse[$i][1].'</td>
					<td>Format: '.$produse[$i][2].'</td>
					<td>Pagini: '.$produse[$i][3].'</td>
					</tr>
					<tr><td>numar pagini: '.$produse[$i][4].'</td</tr
					<tr>
					<td>Hartie: '.$produse[$i][5].'</td>
					<td>Print coperta: '.$produse[$i][6].'</td>
					<td>Grosime carton: '.$produse[$i][7].'</td>
					</tr>
					<tr>
					<td>Laminare: '.$produse[$i][8].'</td>
					<td>Clapa/Flaps: '.$produse[$i][9].'</td>
					<td>Tiraj: '.$produse[$i][10].'</td>
					<td>Pret: '.$produse[$i][11].'</td>
					</tr>
					</table>
					</a>';
				}
			elseif($produse[$i][0]=='calendar-perete')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="4"><img src="src/calendar-perete.png" width="100" height="100"></td></tr>
					<tr><td>Hartie: '.$produse[$i][1].'</td></tr>
					<tr><td>Format: '.$produse[$i][2].'</td></tr>
					<tr><td>Tiraj: '.$produse[$i][3].'</td>
					</tr>
					</table>
					</a>';
				}
			elseif($produse[$i][0]=='flyer')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="5"><img src="src/flyer.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Format: '.$produse[$i][1].'</td></tr>
					<tr><td>Print: '.$produse[$i][2].'</td>
					</tr>
					<tr>
					<td>Hartie: '.$produse[$i][3].'</td></tr>
					<tr><td>Tiraj: '.$produse[$i][4].'</td>
					</tr>
					</table>
					</a>';
				}
			elseif($produse[$i][0]=='calendar-birou')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="4"><img src="src/calendar-birou.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Format: '.$produse[$i][1].'</td></tr>
					<tr><td>Hartie: '.$produse[$i][2].'</td></tr>
					<tr><td>Tiraj: '.$produse[$i][3].'</td>
					</tr>
					</table>
					</a>';
				}
			elseif($produse[$i][0]=='pliant')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="4"><img src="src/pliant.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Format: '.$produse[$i][1].'</td></tr>
					<tr><td>Hartie: '.$produse[$i][2].'</td>
					</tr>					
					<tr><td>Tiraj: '.$produse[$i][3].'</td>
					</tr>
					</table>
					</a>';
				}
			elseif($produse[$i][0]=='carte-vizita')
				{
					echo '
					<table border="3px">
					<tr>
					<td rowspan="5"><img src="src/carte-vizita.png" width="100" height="100"></td>
					</tr>
					<tr>
					<td>Caerton: '.$produse[$i][1].'</td></tr>
					<tr><td>Colt rotund: '.$produse[$i][2].'</td></tr>
					<tr><td>Tiraj: '.$produse[$i][3].'</td></tr>
					<tr><td>Pret: '.$produse[$i][3].'</td>
					</tr>
					</table>
					</a>';
				}
			
		}
		else 
			echo "<span style='color: white; font-size:20px;'>Nu exista valori!</span>";
	}
}
echo '</center>';

	if(isset($_POST['pret']))
		{
			$an= date("Y");
			$luna=date("m");
			$p=array();

			$ord= filter_input(INPUT_POST,"ord");

			if($ord=='Crescator')
						{
							$ord='ORDER BY pret_total ASC';
						}
			if($ord=='Descrescator')
						{
							$ord='ORDER BY pret_total DESC';
						}		
			$sql= "SELECT pret_total, data FROM comenzi WHERE stare='finalizat' AND status='acceptat' AND pret_total IS NOT NULL AND data BETWEEN '2021/01/01' AND '$an/$luna/31' $ord;";

			$f=mysqli_query($conect, $sql);	
			
			if(mysqli_num_rows($f)>0)
				{
					while ($x= mysqli_fetch_assoc($f))
						{	
							$data=explode('-', $x['data']);
							$p[]= array($data[0], $data[1], $x['pret_total']);
						}
					
				}

				echo "<center><table>
								<tr width= 70px><td width= 70px>Anul</td>
									<td width= 70px>Luna</td>
									<td width= 70px>Valoare</td></tr></table>";

			 for ($i=0; $i <count($p); $i++)
					{	
						echo "<center><table><tr width= 70px>
								<td width= 70px>".$p[$i][0]."</td>
								<td width= 70px>".$p[$i][1]."</td>
								<td width= 70px>".$p[$i][2]."</td>
							</tr>
							</table></center>";
					}
				

				
		}
?>
</body>
</html>