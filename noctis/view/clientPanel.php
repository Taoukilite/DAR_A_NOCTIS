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
<<<<<<< HEAD
$services = getServices();

$professionnals = getProfessionnals();

foreach($professionnals as $pro){
	setSuppliedServices($pro);
}
include("includes/menubar.php");
=======

include("includes/menubar_new.php");
>>>>>>> refs/remotes/origin/develop

?>



		<br>
		<div class="container">
		    <div class="page-header">
		        <h1>Services disponibles</h1>
		    </div>

		    <div class="row">
		        <div class="col-md-4">
		            <h3>Catégories de services</h3>
		            <div class="list-group" style="max-height: 250px; overflow: auto;">
		            	<a class="list-group-item service">Tous</a>
		                <?php 

		                	foreach($services as $s)
		                	{
		                		echo "<a id='". $s->getName() ."' class='list-group-item service'>". $s->getName() . "</a>";
		                	}
		                ?>
		            </div>
		        </div>

		        <div class="col-md-8">
		            <h3>Services disponibles</h3>
		            <div style="max-height: 400px;">
		                <table id="proTable">
		                    <thead>
			                    <tr>
			                        <th>Nom</th>
			                        <th>Adresse</th>
			                        <th style="width:33%">Services</th>
			                    </tr>
		                    </thead>
		                    <tbody>
			                    
			                    <?php
			                    	foreach($professionnals as $pro)
			                    	{
			                    		echo "<tr class='professionnal ";

			                    		if($pro->getSuppliedServices() != NULL)
			                    		{
				                    			foreach($pro->getSuppliedServices() as $service){
				                    			echo $service->getName() . " ";
				                    		}
			                    		}

			                    		echo "'>";


			                    		echo "<td> <a href='professionnalDescription.php?idpro=". $pro->getId() ."' target='_blank'>". $pro->getName() . " " . $pro->getFirstName() . "</a></td>";

			                    		echo "<td>" . $pro->getAddress() . ", " . $pro->getTown() . " [".$pro->getPostalCode() . "]</td>";


			                    		
			                    		echo "<td>";


			                    		if($pro->getSuppliedServices() != NULL)
			                    		{
				                    			foreach($pro->getSuppliedServices() as $service){
				                    			echo $service->getName() . " ";
				                    		}
			                    		}else{
			                    			echo "Aucun";
			                    		}
			                    		
			                    		echo "</td>";

			                    		echo "</tr>";
			                    	}
			                    ?>
		                    </tbody>
		                </table>
		            </div>
		        </div>
		    </div>

<<<<<<< HEAD
		    <br>


		    <div style="height:40%; width:inherit; position:absolute; overflow: hidden">
	    		<div id="map"></div>
		    </div>
=======
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
	                            <div id ="inputGroupConfirmation">
	                            	<h4>Valider le devis et confirmer l'intervention</h4>
	                                <button type="button" id="btnConfirm" class="btn btn-primary">Confirmer</button>
	                                <button type="button" id="btnCancel" class="btn btn-danger">Refuser</button>
	                            </div>
	                            <div id="noConfirmation">
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


>>>>>>> refs/remotes/origin/develop
		</div>


	</body>
<<<<<<< HEAD
	<script src="js/datatables.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#proTable').DataTable( {
		        "language": {
		            "lengthMenu": "Afficher _MENU_ éléments par page",
		            "zeroRecords": "Aucun résultat",
		            "info": "Page _PAGE_ sur _PAGES_",
		            "infoEmpty": "Aucun résultat disponible",
		            "infoFiltered": "(filtré depuis _MAX_ resultats)",
		            "paginate": {
				        "first":      "Premier",
				        "last":       "Dernier",
				        "next":       "Suivant",
				        "previous":   "Précédent"
				    },
				    "search":"Rechercher:"
		        }
		    } );
		});


	</script>
	<script src="js/proArray.js"></script>
	<script src="js/location.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3xnAzto0zBmLwke0_3cBtlnMsTYK5yD8&signed_in=true&callback=initMap" async defer></script>
=======
	
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/fullcalendar-3.0.1/lib/jquery-ui.min.js"></script>
	<script src="js/clientCalendar.js"></script>
>>>>>>> refs/remotes/origin/develop

</html>