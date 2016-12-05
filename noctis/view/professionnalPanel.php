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
                            <h4>Localisation : <span id="location"></span><br></h4>
                            
                            <h3>Devis</h3>
                            <label>Durée :</label>
                            <input type="text" name="duration" id="duration"/>
                            <label>Prix :</label>
                            <input type="text" name="price" id="price"><br>
                            <div id ="inputGroupConfirmation">
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
                   <circle cx="10" cy="10" r="10" fill="green" />
                </svg> Nouvelle intervention

                <svg width="20" height="20">
                   <circle cx="10" cy="10" r="10" fill="blue" />
                </svg> Devis envoyé, attente de la réponse du client.

                <svg width="20" height="20">
                   <circle cx="10" cy="10" r="10" fill="purple" />
                </svg> Intervention prête à être réalisée.
                <div id="calendar"></div>
            </div>

            
                

                </p>

            </div>
            
        </div> 
        
    </div>



</body>



<!--<script src="js/app.js"></script>-->
<script src="js/jquery.easing.min.js"></script>
<script src="js/fullcalendar-3.0.1/lib/jquery-ui.min.js"></script>
<script src="js/professionnalCalendar.js"></script>

</html>
