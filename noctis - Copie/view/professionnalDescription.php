<?php
	session_start();

	if(!isset($_SESSION["type"]) || $_SESSION["type"] != "Client")
		header("Location: index.php");
	if(!isset($_GET["idpro"]))
		header("Location: clientPanel.php");
		

	include("includes/menubar.php");
	include("../controller/proController.php");
	
	$data = array();
	foreach($value as $values)	
		$data[$value] = getInfos($value);

?>
	<body>
		<div class="jumbotron" style="height: 100vh;">
			<div class="container">
				<h1>Benvenue sur la page de description de <?php echo $data["fname"]." ".strtoupper($data["fname"]); ?></h1>
				<ul>
					<li>
						Adresse : <?php echo $data["address"]." ".$data["town"]." ".$data["postal"]; ?>
					</li>
					<li>
						Mail : <?php echo $data["mail"]; ?>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>