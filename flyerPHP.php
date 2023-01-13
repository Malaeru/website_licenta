<?php


if(session_status()==0 || session_status()==1)
	session_start();
	
	if(!(isset($_SESSION['cos'])))
		{
			$_SESSION['cos']=array();
		}
$aux=0;
$format= filter_input(INPUT_POST, 'format');
$print= filter_input(INPUT_POST, 'print');
$hartie= filter_input(INPUT_POST, 'hartie');
$tiraj= filter_input(INPUT_POST, 'tiraj');

		
	for ($i=0; $i<count($_SESSION['cos']); $i++)
	{ 
		if($_SESSION['cos'][$i][0]=='flyer')
			$aux++;
	}

	if($aux>4)
		{
			header("Location: flyer.php");
		}
	else
	{if(isset($_POST['addcos'])&&isset($_SESSION['id_client']))
			{
				$_SESSION['cos'][]= array('flyer', $format, $print, $hartie, $tiraj);
				echo ' <script>window.history.back(-1);</script>';
			}
		else
			header("Location:log.php");
	}
?>

