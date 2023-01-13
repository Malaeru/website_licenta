<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="src/rcrprint.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Magazin</title>
	
		<style>
	::-webkit-scrollbar
		{
			width: 3px;	
		}

		::-webkit-scrollbar-thumb
		{
			background-color:  #2d2006;
		}

		::-webkit-scrollbar-track
		{
			background-color: #332200;
		}

		::-webkit-scrollbar-thumb:hover
		{
			background-color: #e0a01f;
		}
		.bar
			{
				width: 95%;
				margin: auto;
				padding: 3px;
				display: flex;
				align-items: center;
				justify-content: space-between;
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
				height: 30px; 
				width: 30px;
			}

		body
		{
			background-image: linear-gradient(rgba(5, 0, 0, 0.85),rgba(255,255,200, 0.30)),url(src/Tipografie.webp);
			margin: 0px;
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			backdrop-filter: blur(3px);
		}

		h1
			{
				text-align: center;
				color: white;
				font-style: italic;
				font-family: Goudy Old Style, serif;
				font-size: 70px;
				margin-top: 0px;
			}

		h2
			{
				color: white;
				font-size: 40px;
				font-family: serif;
				margin-top: 5px;
				margin-bottom: 5px;
			}

		.despre
			{
				display: flex;
				flex-wrap: nowrap;
				flex-direction: row;
				align-items: center;
				margin: 25px;
				min-width: 70%;
				justify-content: center;
				padding: 5px;

			}	

		.imgdespre img
			{
					max-width: 500px;
					max-height: 300px;

					margin: 5px;  
			}

		.text
			{	font-family: serif;
				font-size: 25px;
				font-weight: 500;
				color: white;
				width: 50%;
				text-align: center;
				margin: 5px;  
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

		.produse
			{
				width: 95%;
				display: flex;
		    	flex-wrap: nowrap;
		    	justify-content: center;
		    	align-items: center;
		    	align-content: flex-start;
		    	overflow: hide;
		    	flex-direction: row;
		    	margin-right: 20px;
		    	margin-left: 20px;
			}

		.produse ul
			{	
				display: inline-block;
				margin:10px;
				align-items: center;
				padding: 5px;
			}
		.produse li
		{
			margin: 10px;
			list-style: none;
			text-decoration: none;
			text-align: center;
			display: inline-block;		
			padding: 10px;
			width: 250px;
			ont-family: serif;
			font-size: 25px;
			font-weight: 500;
			background-color: rgba(255,255,255, 0.60);
			backdrop-filter: blur(5px);
		}

		.produse a
			{
				text-decoration: none;
				color: black;
			}

		.prod
			{
				width: 250px;
				height: 250px;		
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
				.bar
			{
				width: 95%;
				margin: auto;
				padding: 3px;
				display: flex;
				align-items: center;
				justify-content: space-between;
			}

		.logo
			{
				width: 50px;
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
				height: 20px; 
				width: 20px;
			}

		h1
			{
				text-align: center;
				color: white;
				font-style: italic;
				font-family: Goudy Old Style;
				font-size: 25px;
				margin-top: 0px;
			}

		h2
			{
				color: white;
				font-size: 30px;
				font-family: Goudy Old Style;
			}

		.despre
			{
				display: flex;
				flex-wrap: nowrap;
				flex-direction: row;
				align-items: center;
				justify-content: flex-start;
				flex-direction: column;

				
			}	

		.imgdespre img
			{
					max-width: 250px;
					max-height: 250px;
					align-items: center;
					margin: 5px;  
			}

		.text
			{
				min-width: 90%; 
				font-family: serif;
				font-size: 16px;
				font-weight: 500;
				color: white;
				width: 50%;
				text-align: center;
				margin: 5px;  

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

	}
	</style>

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
	<div><a href="index.html">Acasa</a></div>
	<div><div class="activ"><a href="shop.php">Produse</a></div></div>
	<div><a href="Termeniconditi.html">Termeni si conditii</a></div>
	<div><a href="Contact.html">Contact</a></div>
</div>
<div class="produse">
	<ul><center>
		<li><a href="carte.php"><img src="src/carte.png" class="prod">Carte</a></li>
		<li><a href="calendar-perete.php"><img src="src/calendar-perete.png" class="prod" >Calendar perete</a></li>
		<li><a href="flyer.php"><img src="src/flyer.png" class="prod">Flyer</a></li>
		<li><a href="calendar-birou.php"><img src="src/calendar-birou.png" class="prod">Calendar birou</a></li>
		<li><a href="pliant.php"><img src="src/pliant.png" class="prod">Pliant</a></li>
		<li><a href="carte-vizita.php"><img src="src/carte-vizita.png" class="prod">Carte vizita</a></li></center>
	</ul>
</div>



</body>
</html>