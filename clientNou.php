<?php 

	if(!isset($nume))
		$nume='';

	if(!isset($prenume))
		$prenume='';

	if(!isset($email))
		$email='';

	if(!isset($cnp))
		$cnp='';

	if(!isset($cui))
		$cui='';

	if(!isset($str_sc))
		$str_sc='';

	if(!isset($nr_str))
		$nr_str='';

	if(!isset($oras_sc))
		$oras_sc='';

	if(!isset($sec))
		$sec='';

	if(!isset($tel))
		$tel='';
	if(!isset($jud_sec_sc))
		$jud_sec_sc='';

if(!isset($nume_sc))
		$nume_sc='';

?>	

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Client nou</title>

<style>
	.t
	{
		color: white;
		font-size: 20px;
	}

	.input
		{
			font: inherit;
			font-size: 17px;
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
				animation: change 120s ease-in-out infinite;
				font-family: serif;
			}


		ul
		{
			display: flex;
			justify-content: center;
			list-style-type: none;
			overflow: hidden;
			color: white;			
			background-clip: border-box;
			margin-top: 100px;
		}

		li
			{	
				float: left;
				font-size: 25px;
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
				font-size: 17px;
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
				ul
		{
			display: flex;
			justify-content: center;
			list-style-type: none;
			overflow: hidden;
			color: white;			
			background-clip: border-box;
			flex-direction: column;

		}
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
			background:  linear-gradient( 66deg, #2d2006,#70500f,#e0a01f,#eabe66,#332200);
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
				font-size: 10px;
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
<ul>
	<li><table><form action="clientNouPHP.php" action="EclientNou.php" method="POST">
				<tr><td>Nume:</td><td><input type="text" name="nume" value="<?php echo htmlspecialchars($nume) ?>" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Enume))
				echo $Enume."<br>";
			?>	
				</td></tr>
		<tr><td>Prenume:</td><td><input type="text" name="prenume" value="<?php echo htmlspecialchars($prenume) ?>" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Eprenume))
				echo $Eprenume."<br>"."Prenume sau Prenume1 Prenume2"."<br />";
			?>
					</td></tr>
		<tr><td>email:</td><td><input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Eemail))
				echo $Eemail."<br>";
			?>
				</td></tr>
		<tr><td>cnp:</td><td><input type="text" name="cnp" value="<?php echo htmlspecialchars($cnp) ?>" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Ecnp))
				echo $Ecnp."<br>";
			?>
				</td></tr>
		<tr><td>cui:</td><td><input type="text" name="cui" value="<?php echo htmlspecialchars($cui) ?>" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Ecui))
				echo $Ecui."<br>";
			?>
			<tr><td>Parola:</td><td><input type="password" name="parola" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Eparola))
				echo $Eparola."<br>";
			?>
</td></tr>
				</td></tr></table>
				</li><li>	
		Sediu social:&nbsp&nbsp&nbsp</li>
		<li><table>
		<tr><td>Numele Societatii:</td><td><input type="text" name="nume_sc" value="<?php echo htmlspecialchars($nume_sc) ?>" class="input"></br>
			<span class="border-bottom"></span>
		<?php 
				if(isset($Enume_sc))
				echo $Enume_sc."<br>";
			?></td></tr>
		<tr><td>Strada:</td><td><input type="text" name="str_sc"  class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Estr_sc))
				echo $Estr_sc."<br>";
			?>
				</td></tr>
		<tr><td>Numar:</td><td><input type="text" name="nr_str" value="<?php echo htmlspecialchars($nr_str) ?>" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Enr_str))
				echo $Enr_str."<br>";
			?>
				 </td></tr>
		<tr><td>Oras:</td><td><input type="text" name="oras_sc" value="<?php echo htmlspecialchars($oras_sc) ?>" class="input"></br>
		<span class="border-bottom"></span>
			<?php 
				if(isset($Eoras_sc))
				echo $Eoras_sc."<br>";
				?>
					</td></tr>
		<tr><td>Judet/sector:</td><td><input type="text" name="jud_sec_sc" value="<?php echo htmlspecialchars($jud_sec_sc) ?>" class="input"></br>
		<span class="border-bottom"></span>
		<?php 
				if(isset($Ejud_sec_sc))
				echo $Ejud_sec_sc."<br>";
				?>
</td></tr>
		<tr><td>Telefon</td><td><input type="tel" name="tel"  placeholder="0123456789"  pattern="[0-9]{10}" class="input"></br>
		<span class="border-bottom"></span>
</td></tr>
		
		</table></li>
		</ul>
		<div class="t">Prin crearea acestui cont esti de acord cu impartasirea datelor cu caracter personal, termenii si coditii<br /></div>
		<input type="submit" name="sub" value="Inscriete!" class="btn">
	</form>	


</center>


</body>
</html>