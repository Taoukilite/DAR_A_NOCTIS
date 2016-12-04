<?php
session_start();

if(!isset($_SESSION["type"]) || $_SESSION["type"] != "Professionnal")
{
	header("Location: index.php");
}

include("includes/menubar_new.php");
?>

<br>
<div class="container">
    <div class="page-header">
        <h1>Mes interventions</h1>
		</div>
</div>



	</body>
</html>
