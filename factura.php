<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
	.h{
		border: 3px solid black;
	}
</style>
</head>
<body>
	<table  align="center">
		<tr><td><img src="src/factura_sigla.png" width="150px" height="100px"></td></tr>
		<tr><td colspan="3">SC R.C.R. PRINT SRL<br />
Nr.Ord.Reg.Com./An: J40/7855/1997<br />
C.U.I.: RO9865944<br />
Sediul social: Str. Prometeu, nr. 12-14,<br />
Bl. 12E Sc. 3, et. 3, ap. 41, Sector 1, București<br />
Sediul de activitate: Bd. Dimitrie Pompei 10,<br />
Sector 2, Bucureşti<br />
Cont: RO46RZBR0000060005064808<br />
Banca: Raiffeisen Bank - Ag. Pipera<br />
Cont: RO89TREZ7015069XXX004321<br />
Banca: Trezorerie Sector 1<br /></td>
			
			<?php session_start();include("conectare.php");
			$id_client= $_GET['id_client'];


			$cl="SELECT nume_sc, cui, str_sc, nr_str, oras_sc, jud_sec_sc FROM clienti WHERE id_client= '$id_client';";
			$q= mysqli_query($conect, $cl);
			$m= mysqli_num_rows($q);
			if($m>0)
		{
			while($r=mysqli_fetch_assoc($q))
				{

					echo "<td>Cumpărător:".$r['nume_sc']."<br />
							C.U.I.: ".$r['cui']."<br />
							Sediul social: Str. ".$r['str_sc'].", Nr. ".$r['nr_str'].", ".$r['oras_sc'].", ".$r['jud_sec_sc']."<br />
							Cont:<br />
							Banca:<br /></td></tr>";

				}
		}


			?>
			<tr><td colspan="7"><span style="font-size: 25px;"><center><b>FACTURĂ FISCALĂ</b></center></span></td></tr>
<?php
$nr_comanda= $_GET['nr_comanda'];
			$c="SELECT nr_factura, data FROM facturi WHERE id_client= '$id_client' AND nr_comanda='$nr_comanda';";
			$qf= mysqli_query($conect, $c);
			$mf= mysqli_num_rows($qf);
			if($m>0)
		{
			while($r=mysqli_fetch_assoc($qf))
				{

					echo "<tr><td align='center' colspan='7'>Nr facturii:".$r['nr_factura']."</td></tr><br />
							<tr><td align='center' colspan='7'>Data: ".$r['data']."</td></tr><br /></table>";

				}
		}
?>

<?php


	
			
			

			$sql_cal_birou = "SELECT nr_cal_birou1, nr_cal_birou2, nr_cal_birou3, nr_cal_birou4, nr_cal_birou5 FROM comenzi_cal_birou INNER JOIN comenzi ON comenzi_cal_birou.nr_com_cal_birou= comenzi.nr_com_cal_birou AND comenzi.nr_comanda='$nr_comanda';";

			$sql_cal_perete = "SELECT nr_cal_perete1, nr_cal_perete2, nr_cal_perete3, nr_cal_perete4, nr_cal_perete5 FROM comenzi_cal_perete INNER JOIN comenzi ON comenzi_cal_perete.nr_com_cal_perete= comenzi.nr_com_cal_perete AND comenzi.nr_comanda='$nr_comanda';";

			$sql_carte = "SELECT nr_carte1, nr_carte2, nr_carte3, nr_carte4, nr_carte5 FROM comenzi_carti INNER JOIN comenzi ON comenzi_carti.nr_com_carte= comenzi.nr_com_carte AND comenzi.nr_comanda='$nr_comanda';";

			$sql_cart_vizita = "SELECT nr_cart_vizita1, nr_cart_vizita2, nr_cart_vizita3, nr_cart_vizita4, nr_cart_vizita5 FROM comenzi_carti_vizita INNER JOIN comenzi ON comenzi_carti_vizita.nr_com_cat_vizita= comenzi.nr_com_cat_vizita AND comenzi.nr_comanda='$nr_comanda';";

			$sql_flyere = "SELECT nr_flyer1, nr_flyer2, nr_flyer3, nr_flyer4, nr_flyer5 FROM comenzi_flyere INNER JOIN comenzi ON comenzi_flyere.nr_com_flyer= comenzi.nr_com_flyer AND comenzi.nr_comanda='$nr_comanda' ;";

			$sql_pliant= "SELECT nr_pliant1, nr_pliant2, nr_pliant3, nr_pliant4, nr_pliant5 FROM comenzi_pliante INNER JOIN comenzi ON comenzi_pliante.nr_com_pliant= comenzi.nr_com_pliant AND comenzi.nr_comanda='$nr_comanda';";

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
		
$comanda=array();

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
							$s_carte= "SELECT titlu, format_carte, pg_carte, nr_pag, hartie_carte, prt_coperta, grosime_carton, laminare, clp_flaps, tiraj_carte, pret_carte FROM carti WHERE nr_carte='$nr_carte';";
							
							$carte= mysqli_query($conect, $s_carte);
							$rcarte= mysqli_num_rows($carte);

							if($rcarte>0)
								{
									while($r=mysqli_fetch_assoc($carte))
										{
											$comandaDetaliat[]=array('carte', $r['titlu'], $r['tiraj_carte'], $r['pret_carte']);
										}
								}
						}
			
					elseif($comanda[$i][0]=='calendar-perete')
						{
							$nr_cal_perete= $comanda[$i][$j];

							$s_cal_perete= "SELECT format_cal_perete, hartie_cal_perete, tiraj_cal_perete, pret_cal_perete FROM calendare_perete WHERE nr_cal_perete= '$nr_cal_perete';";

							$cal_perete= mysqli_query($conect, $s_cal_perete);
							$rcal_perete= mysqli_num_rows($cal_perete);

							if($rcal_perete>0)
								{
									while($r=mysqli_fetch_assoc($cal_perete))
										{
											$comandaDetaliat[]=array('calendar-perete', $r['tiraj_cal_perete'], $r['pret_cal_perete']);
										}
								}
						}

					elseif($comanda[$i][0]=='flyer')
						{
							$nr_flyer= $comanda[$i][$j];

							$s_flyer= "SELECT format_flyer, print_flyer, hartie_flyer, tiraj_flyer, pret_flyer FROM flyere WHERE nr_flyer= '$nr_flyer';";

							$flyer= mysqli_query($conect, $s_flyer);
							$rflyer= mysqli_num_rows($flyer);

							if($rflyer>0)
								{
									while($r=mysqli_fetch_assoc($flyer))
										{
											$comandaDetaliat[]=array('flyer', $r['tiraj_flyer'], $r['pret_flyer']);
										}
								}
						}

					elseif($comanda[$i][0]=='calendar-birou')
						{
							$nr_cal_birou= $comanda[$i][$j];

							$s_cal_birou= "SELECT format_cal_birou, hartie_cal_birou, tiraj_cal_birou, pret_cal_birou FROM calendare_birou WHERE  nr_cal_birou= '$nr_cal_birou';";

							$cal_birou= mysqli_query($conect, $s_cal_birou);
							$rcal_birou= mysqli_num_rows($cal_birou);

							if($rcal_birou>0)
								{
									while($r=mysqli_fetch_assoc($cal_birou))
										{
											$comandaDetaliat[]=array('calendar-birou', $r['tiraj_cal_birou'], $r['pret_cal_birou']);
										}
								}
						}

					elseif($comanda[$i][0]=='pliant')
						{
							$nr_pliant= $comanda[$i][$j];

							$s_pliant= "SELECT format_pliant, hartie_pliant, tiraj_pliant, pret_pliant FROM pliante WHERE nr_pliant= '$nr_pliant';";

							$pliant= mysqli_query($conect, $s_pliant);
							$rpliant= mysqli_num_rows($pliant);

							if($rpliant>0)
								{
									while($r=mysqli_fetch_assoc($pliant))
										{
											$comandaDetaliat[]=array('pliant',$r['tiraj_pliant'], $r['pret_pliant']);
										}
								}
						}

					elseif($comanda[$i][0]=='carte-vizita')
						{
							$nr_cart_vizita= $comanda[$i][$j];

							$s_cart_vizita= "SELECT carton_cart_vizita, colt_rotund, tiraj_cart_vizita, pret_cart_vizita FROM carti_vizita WHERE nr_cart_vizita= '$nr_cart_vizita';";

							$cart_vizita= mysqli_query($conect, $s_cart_vizita);
							$rcart_vizita= mysqli_num_rows($cart_vizita);

							if($rcart_vizita>0)
								{
									while($r=mysqli_fetch_assoc($cart_vizita))
										{
											$comandaDetaliat[]=array('carte-vizita', $r['tiraj_cart_vizita'], $r['pret_cart_vizita']);
										}
								}
						}
				}
		}

?>
<table style="border: 3px solid black; text-align: center; border-collapse: collapse; ">
	
<tr ><td style="border: 3px solid black;" >Nr.<br />crt.</td>
	<td style="border: 3px solid black;">Denumirea produselor</td>
	<td style="border: 3px solid black;">U.M</td>
	<td style="border: 3px solid black;">Cantitate</td>
	<td style="border: 3px solid black;">Pret unitar</td>
	<td style="border: 3px solid black;">Valoare</td>
	<td style="border: 3px solid black;">Valoare TVA</td></tr>
<tr><td style="border: 3px solid black;">0</td>
	<td style="border: 3px solid black;">1</td>
	<td style="border: 3px solid black;">2</td>
	<td style="border: 3px solid black;">3</td>
	<td style="border: 3px solid black;">4</td>
	<td style="border: 3px solid black;">5</td>
	<td style="border: 3px solid black;">6</td></tr>


<?php
$total=0;
$Ttva=0;
for($i=0; $i<count($comandaDetaliat); $i++)
		{
			
			if($comandaDetaliat[$i][0]== 'carte')
				{
					$h=$i;
					$h++;
					(float)$tva=($comandaDetaliat[$i][2]*$comandaDetaliat[$i][3]*5)/100;
					echo '
					
					<tr><td style="border: 3px solid black;">'.$h.'</td><td style="border: 3px solid black; text-align: left;">Carte: '.$comandaDetaliat[$i][1].'</td><td style="border: 3px solid black;">ex.</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][2].'</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][3].' lei</td>
					<td style="border: 3px solid black;">'.(float)$comandaDetaliat[$i][2]*$comandaDetaliat[$i][3].' lei</td>
					<td style="border: 3px solid black;">'.$tva.' lei</td>
					
					</tr>';

					$total+=(float)$comandaDetaliat[$i][2]*$comandaDetaliat[$i][3];
					$Ttva+=$tva;
				}
			elseif($comandaDetaliat[$i][0]=='calendar-perete')
				{
					$h=$i;
					$h++;
					(float)$tva=($comandaDetaliat[$i][1]*$comandaDetaliat[$i][2]*19)/100;
					echo '
					
					<tr><td style="border: 3px solid black;">'.$h.'</td><td style="border: 3px solid black; text-align: left;">Calendar-perete</td><td style="border: 3px solid black;">ex.</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][1].'</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.$tva.' lei</td>
					</tr>
					';

					$total+=(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2];
					$Ttva+=$tva;
				}
			elseif($comandaDetaliat[$i][0]=='flyer')
				{
					$h=$i;
					$h++;
					(float)$tva=($comandaDetaliat[$i][1]*$comandaDetaliat[$i][2]*19)/100;
					echo '
					
					<tr><td style="border: 3px solid black;">'.$h.'</td><td style="border: 3px solid black; text-align: left;">Flyer</td><td style="border: 3px solid black;">ex.</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][1].'</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.$tva.' lei</td>
					</tr>
					';

					$total+=(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2];
					$Ttva+=$tva;
				}
			elseif($comandaDetaliat[$i][0]=='calendar-birou')
				{
					$h=$i;
					$h++;
					(float)$tva=($comandaDetaliat[$i][1]*$comandaDetaliat[$i][2]*19)/100;
					echo '
					
					<tr><td style="border: 3px solid black;">'.$h.'</td><td style="border: 3px solid black; text-align: left;">Calendar-birou</td><td style="border: 3px solid black;">ex.</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][1].'</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.$tva.' lei</td>
					</tr>
					';

					$total+=(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2];
					$Ttva+=$tva;
				}
			elseif($comandaDetaliat[$i][0]=='pliant')
				{
					$h=$i;
					$h++;
					(float)$tva=($comandaDetaliat[$i][1]*$comandaDetaliat[$i][2]*19)/100;
					echo '
					
					<tr><td style="border: 3px solid black;">'.$h.'</td><td style="border: 3px solid black; text-align: left;">Pliant</td><td style="border: 3px solid black;">ex.</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][1].'</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.$tva.' lei</td>
					</tr>
					';

					$total+=(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2];
					$Ttva+=$tva;
				}
			elseif($comandaDetaliat[$i][0]=='carte-vizita')
				{
					$h=$i;
					$h++;
					(float)$tva=($comandaDetaliat[$i][1]*$comandaDetaliat[$i][2]*19)/100;
					echo '
					
					<tr><td style="border: 3px solid black;">'.$h.'</td><td style="border: 3px solid black; text-align: left;">Carte de vizita</td><td style="border: 3px solid black;">ex.</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][1].'</td>
					<td style="border: 3px solid black;">'.$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2].' lei</td>
					<td style="border: 3px solid black;">'.$tva.' lei</td>
					</tr>
					';

					$total+=(float)$comandaDetaliat[$i][1]*$comandaDetaliat[$i][2];
					$Ttva+=$tva;
				}
			
		}
		
		
?>

<tr><td colspan="7" style="border: 3px solid black;">Notă: Prezenta factură reprezintă contract de vânzare-cumpărare comercială încheiat în formă simplificată (în cazul în
care nu s-a încheiat încă contract)</td></tr>

<tr ><td rowspan="3" colspan="2" style="text-align: left; vertical-align: top; border: 3px solid black;">Semnătura și stampila<br />
furnizorului</td>
<td rowspan="3" colspan="2" style=" text-align: left; border: 3px solid black;">
	
Date privind expediția:<br />
Numele delegatului:<br />
Buletin / carte de identitate
seria:&nbsp;&nbsp;&nbsp;&nbsp;
Eliberat<br />
Mijloc de transport:<br />
	Expedierea s-a efectuat în prezența noastră<br />
la data de &nbsp;&nbsp;&nbsp;&nbsp;ora:<br />
Semnăturile:</td>
<td  style="border: 3px solid black; ">Total:</td>
<td style="border: 3px solid black; "> <?php echo $total; ?> lei</td>
<td style="border: 3px solid black; "><?php echo $Ttva; ?> lei</td>

</tr>
<tr><td rowspan="2" style="text-align: left; vertical-align: top; border: 3px solid black;">Semnatură de primire</td>
<td rowspan="2" colspan="2" style="border: 3px solid black; ">Total de plată<br />
		(col. 5+ col. 6)<br />
		<?php echo $total+$Ttva; ?> lei</td></tr></table>
</body>

</html>