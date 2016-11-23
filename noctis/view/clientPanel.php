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
		            	<a href="#" class="list-group-item">Tous</a>
		                <?php 

		                	foreach($services as $s)
		                	{
		                		echo "<a href='#' id='". $s->getName() ."' class='list-group-item'>". $s->getName() . "</a>";
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
			                        <!-- <th style="width:100px">Supprimer</th> -->
			                    </tr>
		                    </thead>
		                    <tbody>
			                    <!-- <tr>
			                        <td><a href="service.php?service=toto">Baby-sitting</a></td>
			                        <td>Service à domicile</td>
			                        <td>john@example.com</td>
			                    </tr> -->
			                    
			                    <?php
			                    	foreach($professionnals as $pro)
			                    	{
			                    		echo "<tr>";
			                    		echo "<td>". $pro->getName() . " " . $pro->getFirstName() . "</td>";
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
</html>