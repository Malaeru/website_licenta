<?php

	

	include("conectare.php");

	$email= filter_input(INPUT_POST,'email');
	$parola= md5(filter_input(INPUT_POST, 'parola'));
	$aux=0;
	$sqlq= mysqli_query($conect, "SELECT email, parola FROM clienti WHERE email='$email' AND parola='$parola' ");

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

	if(isset($_POST['sub']))
		{
			if($aux==0)
				{
					if(mysqli_num_rows($sqlq)!=0)
						{	
							session_start();
							$r=mysqli_query($conect, "SELECT nivel, id_client FROM clienti WHERE email='$email' AND parola='$parola';");
							$a=mysqli_fetch_assoc($r);
								if(isset($_POST['cklog']))
									{																			
										$_SESSION['email']=$email;
										$_SESSION['parola']=$parola;
										$_SESSION['nivel']=$a['nivel'];
										$_SESSION['id_client']=$a['id_client'];
										$_SESSION['activ']= NULL;
									}
								else
									{										
										$_SESSION['email']=$email;
										$_SESSION['parola']=$parola;
										$_SESSION['nivel']=$a['nivel'];
										$_SESSION['id_client']=$a['id_client'];
										$_SESSION['activ']=time();
									}
							include("index.html");
						}
					else 
						{
							$Eemail="Contul nu este gasit";
							include("log.php");
						}
				}
			else
				{
					include("log.php");
				}
		}
?>