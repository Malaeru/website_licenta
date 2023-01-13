<?php

	include("conectare.php");

	$nume= filter_input(INPUT_POST,'nume');
	
	$prenume= filter_input(INPUT_POST,'prenume');
	$email= filter_input(INPUT_POST,'email');
	$cnp= filter_input(INPUT_POST,'cnp');
	$cui= filter_input(INPUT_POST,'cui');
	$parola=md5(filter_input(INPUT_POST, 'parola'));
	$aux=0;
	$er=0;
	$pverif=md5('');
	$nume_sc= filter_input(INPUT_POST,'nume_sc');
	$str_sc= filter_input(INPUT_POST,'str_sc');
	$nr_str= filter_input(INPUT_POST,'nr_str');
	$oras_sc= filter_input(INPUT_POST,'oras_sc');
	$jud_sec_sc= filter_input(INPUT_POST,'jud_sec_sc');
	$tel= filter_input(INPUT_POST,'tel');
	$nume_sc= filter_input(INPUT_POST,'nume_sc');
	$sql= "INSERT INTO clienti (nume, prenume, email, cnp, cui, parola, nume_sc, str_sc, nr_str, oras_sc, jud_sec_sc, tel) VALUES ('$nume', '$prenume', '$email', '$cnp', '$cui', '$parola', '$nume_sc', '$str_sc', '$nr_str', '$oras_sc', '$jud_sec_sc', '$tel');";
	$sqlqc= "SELECT cnp FROM clienti WHERE cnp='$cnp';" ;
	$sqlqe= "SELECT email FROM clienti WHERE email='$email';" ;

	
		if(empty($nume))
				{
					$Enume= "Completeaza campul";
					$aux=$aux+1;
				}

		if(empty($prenume))
				{
					$Eprenume= "Completeaza campul";
					$aux=$aux+1;
				}

		for($i=1; $i<strlen($nume); $i++)
			{
				$string= $nume;
				if(preg_match('@[a-z]@', $string[0])|| preg_match('@[0-9]@', $string[0]))
					{
						$aux=$aux+1;
						$Enume='respecta modelul';
						
					}
				if(preg_match('@[A-Z]@', $string[$i])|| preg_match('@[0-9]@', $string[$i]))
					{
						$aux=$aux+1;
						$Enume='respecta modelul';						
					}		
			}

		if(preg_match('@[0-9]@', $prenume))
			{
				$aux=$aux+1;
				$Eprenume='fara cifre';
			}
		elseif(preg_match('@[^\w\ ]@',$prenume))
			{
				$aux=$aux+1;
				$Eprenume='respecta modelul';
			}
		else
		{
			for($j=0; $j<mb_strlen($prenume); $j++)
				{		
					$string=$prenume;
					if(($j==0)||($string[$j-1]==' '))	
						{				
							if(preg_match('@[a-z]@', $string[$j]))
									{
										$aux=$aux+1;
										$Eprenume='respecta modelul';
									}
						}
					else
						{
							if(preg_match('@[A-Z]@', $string[$j]))
								{
									$aux=$aux+1;
									$Eprenume='respectati modelul';
								}
						}	
				}						
		}
		if(empty($jud_sec_sc))
			{
				$Ejud_sec_sc= "Completeaza campul";
				$aux=$aux+1;
			}

		if(empty($email))
			{
				$Eemail= "Completeaza campul";
				$aux=$aux+1;
			}
		elseif(filter_var($email, FILTER_VALIDATE_EMAIL)==False)
			{
				$Eemail= "email invalid";
				$aux=$aux+1;
			}
		elseif (mysqli_num_rows(mysqli_query($conect, $sqlqe))!=0) 
			{
				$Eemail="exista deja";
				$aux=$aux+1;
			}

		if(empty($cnp))
			{
				$Ecnp= "Completeaza campul";
				$aux=$aux+1;			
			}
		elseif(!(mb_strlen(($cnp), "UTF-8")==13))
			{
				$Ecnp="cnp gresit";
				$aux=$aux+1;
			}
		elseif (!preg_match('@[0-9]@', $cnp))
			{
				$Ecnp="trebuie cifre";
				$aux=$aux+1;
			}
		elseif (mysqli_num_rows(mysqli_query($conect, $sqlqc))!=0) 
			{
				$Ecnp="exista deja";
				$aux=$aux+1;
			}
		
		

		if($parola==$pverif)
				{
					$Eparola= "Completeaza campul";
					$aux=$aux+1;
				}
			elseif(mb_strlen(($_POST['parola']), "UTF-8")<=7)
				{
					$Eparola="min 8 caractere";
					$aux=$aux+1;
				}
			elseif ((!preg_match('@[A-Z]@', $_POST['parola'])) && (!preg_match('@[a-z]@', $_POST['parola']))) 
				{
					$Eparola="trebuie caractere mici si mari";
					$aux=$aux+1;
				}
			elseif (!preg_match('@[0-9]@', $_POST['parola']))
				{
					$Eparola="trebuie si cifre";
					$aux=$aux+1;
				}
			elseif (!preg_match('@[^\w]@', $_POST['parola'])) 
				{
					$Eparola="trebuie si caractere speciale";
					$aux=$aux+1;
				}

		if(empty($nr_str))
			{
				$Enr_str= "Completeaza campul";
				$aux=$aux+1;			
			}
		elseif(!preg_match('@[0-9]@', $nr_str))
			{
				$aux=$aux+1;
				$Enr_str='fara cifre';
			}

if(empty($nume_sc))
			{
				$Enume_sc= "Completeaza campul";
				$aux=$aux+1;			
			}
		
		if(empty($str_sc))
				{
					$Estr_sc= "Completeaza campul";
					$aux=$aux+1;
				}
		elseif(preg_match('@[0-9]@', $str_sc))
			{
				$aux=$aux+1;
				$Estr_sc='fara cifre';echo $aux;
			}

		if(empty($oras_sc))
				{
					$Eoras_sc= "Completeaza campul";
					$aux=$aux+1;
				}
		elseif(preg_match('@[0-9]@', $oras_sc))
			{
				$aux=$aux+1;
				$Eoras_sc='fara cifre';
			}

			

		if(isset($_POST['sub']))
			if($aux==0)
				{
					$to= $email;
					$subject= "Bine ai venit";
					$body= "Bine ai venit!
Permiteți-mi să profit de această ocazie pentru a vă mulțumi că ați ales serviciile companiei noastre. Suntem bucuroși să ne vedem clienții mulțumiți de munca pe care o facem și așteptăm mulți ani de colaborare împreună. Dacă aveți întrebări cu privire la serviciile noastre vă invităm să ne contactați la numărul de telefon 0777777777 și vom fi extrem de încântați să vă ajutăm. Încă o dată, vă mulțumesc pentru încrederea pe care ne-o acordați!
";
					$headers = 'From: ccalculator87@gmail.com' . "\r\n";
					mysqli_query($conect, $sql);
					echo mysqli_error($conect);
					mail($to, $subject, $body, $headers);
					include("index.html");
	 				
				}
			else
				include("clientNou.php");	
				
		

		
?>