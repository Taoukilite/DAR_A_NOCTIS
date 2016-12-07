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
$services = getServices();

$professionnals = getProfessionnals();

foreach($professionnals as $pro){
	setSuppliedServices($pro);
}
include("includes/menubar_new.php");

?>


		<br>
		<div class="container">
			<div class="page-header">
				<h1>Mes rendez-vous</h1>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary" id="appointmentPanel">
						<h2 id="title"></h2>
						<div class="panel panel-default" >
							<div class="panel-body" >
								
								<div hidden id="appointmentId"></div>
								<div hidden id="stateId"></div>
								<div hidden id="start"></div>
								
								<h3>Service : <span id="serviceName"></span><br></h3>
								
								<div hidden id="devis">
									<h3>Devis</h3>
									<h4>Prix : <span id="price"></span>€</h4>
								</div>
								<div hidden id="buybutton"></div>
								<div hidden id ="inputGroupConfirmation">
									<h4>Valider le devis et confirmer l'intervention</h4>
									<button type="button" id="btnConfirm" class="btn btn-primary">Confirmer</button>
									<button type="button" id="btnCancel" class="btn btn-danger">Refuser</button>
								</div>
								<div hidden id="noConfirmation">
									<h3>Aucune confirmation nécessaire pour le moment</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
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
    
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/fullcalendar/fullcalendar.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/fullcalendar/lib/jquery-ui.min.js"></script>
	<script src="js/clientCalendar.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/jquery-paypal-buyitnow-plugin-1.0.js"></script>
	<script>
		;(function($)
		{
			$(document).ready(function()
			{
				var options =
				{
					formId: 'Achat',
					itemName: 'buybutton',
					email: 'le4x5w7-facilitator-1@hotmail.fr',
					basePrice: localStorage.getItem("price"),
					countryCode: 'fr',
					currencySymbol: '€',
					currencyCode: 'EUR'
				};
				$('#buybutton').paypalBuyButton(options);
			});
		})(jQuery);
	</script>
</html>
