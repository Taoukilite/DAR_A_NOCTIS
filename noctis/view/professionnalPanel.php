<?php
session_start();

if(!isset($_SESSION["type"]) || $_SESSION["type"] != "Professionnal")
{
	header("Location: index.php");
}
include("includes/menubar.php");
?>

	<body>

		<div class="jumbotron" style="height: 100vh;">
			<div class="container">
				<h1>Benvenue sur l'interface de gestion</h1>
				
			</div>
		</div>



	</body>
</html>
