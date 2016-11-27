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
include("includes/menubar.php");




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
		            <div style="max-height: 250px; overflow: auto;">
		                <table class="table table-hover" >
		                    <thead>
			                    <tr>
			                        <th>Nom</th>
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
		</div>


	</body>
	<script src="js/proArray.js"></script>
</html>