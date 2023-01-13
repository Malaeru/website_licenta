<?php
if(session_status()==0 || session_status()==1)
	session_start();
	
	if(!(isset($_SESSION['cos'])))
		{
			$_SESSION['cos']=array();
		}

	if(isset($_SESSION['id_client']))
			{
$titlu= filter_input(INPUT_POST, 'titlu');
$format= filter_input(INPUT_POST, 'format');
$pg= filter_input(INPUT_POST, 'pg');
$nr_pag= filter_input(INPUT_POST, 'nr_pag');
$hartie= filter_input(INPUT_POST, 'hartie');
$print_coperta= filter_input(INPUT_POST, 'coperta');
$grosime_carton= filter_input(INPUT_POST, 'grosime_carton');
$laminare= filter_input(INPUT_POST, 'laminare');
$clp_flaps= filter_input(INPUT_POST, 'clp_flaps');
$tiraj_carte= filter_input(INPUT_POST, 'tiraj');
		
	for ($i=0; $i<count($_SESSION['cos']); $i++)
	{ 
		if($_SESSION['cos'][$i][0]=='carte')
			$aux++;
	}
	
	if($aux>4)
		{
			header("Location: carte.php");
		}
	else
	{if(isset($_POST['addcos']) && isset($_SESSION['id_client']))
			{
				$_SESSION['cos'][]= array('carte', $titlu, $format, $pg, $nr_pag, $hartie, $print_coperta, $grosime_carton, $laminare, $clp_flaps, $tiraj_carte);
				echo ' <script>window.history.back(-1);</script>';			
			}	}}
			else
			include("log.php");
?>