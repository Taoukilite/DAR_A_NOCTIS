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
            <div class="col-md-10">
                <div id="calendar"></div>
            </div>

            <div class="col-md-2" id="appointmentPanel">
                <h2 id="title"></h2>
                <br>
                <p><h5>Service :</h5>
                <span id="serviceName"></span><br>
                <h5>Localisation :</h5><br>
                <span id="location"> 1 bis rue werlé, Reims</span><br>
                <h5>Devis</h5><br>
                <label>Durée :</label>
                <input type="text" name="duration" id="duration"/><br>
                <label>Prix :</label>
                <input type="text" name="price" id="price"><br>
                <button type="button" id="btnConfirm" class="btn btn-primary">Confirmer</button>
                <button type="button" id="btnCancel" class="btn btn-danger">Annuler</button>

                </p>

            </div>
            
        </div> 
        
    </div>



</body>



<!--<script src="js/app.js"></script>-->
<script src="js/jquery.easing.min.js"></script>
<script src="js/fullcalendar/lib/jquery-ui.min.js"></script>
<script src="js/professionnalCalendar.js"></script>

</html>
