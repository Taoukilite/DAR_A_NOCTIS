<?php
session_start();

if(!isset($_SESSION["type"]) || $_SESSION["type"] != "Client")
{
	header("Location: index.php");
}

require_once '../model/_service.php';
require_once '../model/_professionnal.php';
require_once '../controller/serviceController.php';
require_once '../controller/professionnalController.php';

include("includes/menubar_new.php");

?>



		<br>
		<div class="container">
		    <div class="page-header">
		        <h1>Mes rendez-vous</h1>
		    </div>

		    <div class="row">
		    	<div class="col-md-12">
			    	Légende : <br>
	                <svg width="20" height="20">
	                   <circle cx="10" cy="10" r="10" fill="blue" />
	                </svg> Nouvelle intervention

	                <svg width="20" height="20">
	                   <circle cx="10" cy="10" r="10" fill="green" />
	                </svg> Devis envoyé, vous pouvez confirmer l'intervention

	                <svg width="20" height="20">
	                   <circle cx="10" cy="10" r="10" fill="purple" />
	                </svg> Intervention prête à être réalisée.
		    		<div id="calendar"></div>
		    		<br>
		    	</div>
		    </div>	


		</div>


	</body>
	
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/fullcalendar-3.0.1/lib/jquery-ui.min.js"></script>
	<script src="js/clientCalendar.js"></script>

</html>