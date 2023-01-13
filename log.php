<?php 	

if(session_status()==0 || session_status()==1)
	session_start();

	if(isset($_SESSION['activ']))
		{
			if(time()- $_SESSION['activ']>600)
				{
					$_SESSION['email']=NULL;
					$_SESSION['parola']=NULL;
					$_SESSION['nivel']=NULL;
					$_SESSION['id_client']=NULL;
				}
		}

	if(isset($_SESSION['email']) && isset($_SESSION['parola']) && isset($_SESSION['nivel']) && isset($_SESSION['id_client']))
		{

			if($_SESSION['nivel']==3)
				{		
					header("location:CEOcontrol.php");
				}
			elseif($_SESSION['nivel']==2)
				{
					header("location:productie.php");
				}
			elseif($_SESSION['nivel']==0)
				{
					header("location:contCL.php");
				}
		}
		

	if(!isset($email))
		$email='';

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Autentificare</title>

<style>
	
	

	.input
		{
			font: inherit;
			font-size: 25px;
			color: white;
			background-color: transparent;
			border: none;
			border-bottom: 2px solid black;
			outline: none;
			padding-block: 5px;
			margin-top: 70px;
		}

	.input::placeholder
		{
			color: inherit;
			transition: opacity .25s;
		}

	.input:focus::placeholder
		{
			opacity: 0;
		}

	.border-bottom
		{
			position: absolute;
			left: 0;
			width:  ;
			height: 2px;
			background-color: transparent;
			transform: scaleX(1);
			transform-origin: left;
			transition: transform .25s;
		}

	.input:focus+.border-bottom,
	.input:valid+.border-bottom
		{
			transform: scaleX(1);
		}
	
	
	

	
	
		.bar
			{
				height: 60px;
				width: 95%;
				margin: auto;
				padding: 3px;
				display: flex;
				align-items: center;
				justify-content: center;
			}

		.logo
			{

				width: 90px;
				cursor: pointer;
			}

		.bar ul li
			{
				list-style: none;
				display: inline-block;
				margin: 5px;
			}

		.img
			{
				height: 60px; 
				width: 60px;
			}

		body
			{
				background-color: rgba(0, 0, 0, 1);
				background:  linear-gradient( 45deg, #332200,#eabe66,#332200);
				background-size: 400% 400%;
				animation: change 35s ease-in-out infinite;
				font-family: serif;
			}

			@keyframes change
		{
			0%{background-position: 0 50%;}
			50%{background-position: 100% 50%;}
			100%{background-position: 0 50%;}
		
		}

		.login
			{
				display: inline-block;
				width: 30%;
				color: white;
				margin: 15px;
				font-size: 25px;
			}

		.btn
			{
				border: none;
				background-color: black;
				color: white;
				padding: 7px;
				padding-right: 25px;
				padding-left: 25px;
				margin-bottom: 25px;
			}

		.link
			{
				text-decoration: none;
				color: white;
				background-color: black;
				padding: 15px
			}
			.navbar
		{
			display: flex;
		    flex-wrap: nowrap;
		    justify-content: center;
		    align-items: flex-start;
		    align-content: center;
		    overflow: hide;
		    flex-direction: row;
		    
		    margin: 20px;
		}

		.navbar a
		{
			text-decoration: none;
			text-align: center;
			display: inline-block;
			color: #F1F3CE;
			padding: 10px;
			width: 180px;
			ont-family: serif;
			font-size: 25px;
			font-weight: 500;
		}

		.navbar a:hover
		{
			background-color: #90AFC5;
			color: black;
		}

		.activ
		{
		background:  linear-gradient( 90deg, #332200,#eabe66,#e0a01f,#70500f,#2d2006);
		background-size: 400% 400%;
		animation: change 15s ease-in-out infinite;
		}

		@keyframes change
		{
			0%{background-position: 0 50%;}
			50%{background-position: 100% 50%;}
			100%{background-position: 0 50%;}
		}

@media screen and (max-width: 1000px)
		{
			.navbar a
		{
			text-decoration: none;
			text-align: center;
			display: inline-block;
			color: #F1F3CE;
			padding: 10px;
			width: 100px;
			ont-family: serif;
			font-size: 25px;
			font-weight: 500;
		}
		}
		@media screen and (max-width: 600px)
			{

				.navbar
		{
			display: flex;
		    flex-wrap: nowrap;
		    justify-content: center;
		    align-items: center;
		    align-content: center;
		    overflow: hide;
		    flex-direction: column;
		    
		    margin: 20px;
		}

		.navbar a
		{	
			text-decoration: none;
			text-align: center;
			display: inline-block;
			color: #F1F3CE;
			padding: 10px;
			width: 150px;
			ont-family: serif;
			font-size: 25px;
			font-weight: 500;

			
		}

		.navbar a:hover
		{
			background-color: #90AFC5;
			color: black;
		}


		.activ
		{
			display: inline-block;
			background:  linear-gradient( 90deg, #2d2006,#70500f,#e0a01f,#eabe66,#332200);
			background-size: 400% 400%;
			animation: change 15s ease-in-out infinite;
		}

		@keyframes change
		{
			0%{background-position: 0 50%;}
			50%{background-position: 100% 50%;}
			100%{background-position: 0 50%;}
		
		}
				.input
		{
			margin-top: 41px;
			font: inherit;
			color: white;
			background-color: transparent;
			border: none;
			border-bottom: 2px solid black;
			outline: none;
			padding-block: 5px;
		}

	.input::placeholder
		{
			color: inherit;
			transition: opacity .25s;
		}

	.input:focus::placeholder
		{
			opacity: 0;
		}

	.border-bottom
		{
			
			left: 0;
			width:  100%;
			height: 2px;
			background-color: transparent;
			transform: scaleX(0);
			transform-origin: left;
			transition: transform .25s;
		}

	.input:focus+.border-bottom,
	.input:valid+.border-bottom
		{
			transform: scaleX(1);
		}

	.login
			{
				display: inline-block;
				color: white;
				margin: 15px;
				font-size: 15px;
			}
	
	}
			
</style>
</head>
<body>


<div class="bar">
	<a href="index.html"><img src="src/RCRprint.png" class="logo"></a>
</div>
<div class="navbar">
	<div><a href="index.html">Acasa</a></div>
	<div><a href="shop.php">Produse</a></div>
	<div><a href="Termeniconditi.html">Termeni si conditii</a></div>
	<div><a href="Contact.html">Contact</a></div>
</div>
		
<center>
	<div class="login">
		
		<form action="logPHP.php" method="post" >
				<input type="text" name="email" placeholder="email" class="input" value="<?php echo htmlspecialchars($email) ?>"></br>
				<span class="border-bottom"></span>
			
					<?php 
						if(isset($Eemail))
						echo $Eemail."<br>";
					?>
			
				<input type="password" name="parola" placeholder="parola" class="input">
						<?php 
							if(isset($Eparola))
							echo $Eparola."<br>";
						?>
				<span class="border-bottom"></span>
			<br />
			<input type="submit" name="sub" value="Autentifica!" class="btn"><br />
			Tine-ma minte<input type="checkbox" name="cklog"><br />
			
		</form>
		<br />Daca nu ai inca cont intra pe link-ul accesta<br /></div>
		<center><a href="clientNou.php" class="link">CLIENT NOU</a></center>
		





</body>
</html>