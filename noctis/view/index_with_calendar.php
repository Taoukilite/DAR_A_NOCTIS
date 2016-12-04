<?php
require_once "../model/accesBdd.php";
?>


<!doctype html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Mini calendar in the scheduler header</title>

   <!--<script src="../codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script> 
   <script src="../codebase/ext/dhtmlxscheduler_minical.js" type="text/javascript" charset="utf-8"></script>
   <link rel="stylesheet" href="../codebase/dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8"> -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.css' />
    <script src='js/jquery.js'></script>
    <script src='js/moment.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js'></script>

    <link rel="stylesheet" href="css/style.css">
</head>


<!--<script type="text/javascript" charset="utf-8">
    function init() {
        scheduler.config.multi_day = true;
        

        scheduler.config.xml_date="%Y-%m-%d %H:%i";
        scheduler.attachEvent("onClick", function(id, e) {
           var obj = scheduler.getActionData(e);
           alert(e);
           return false;
        });
        scheduler.init('scheduler_here',new Date(),"week");
        scheduler.load("./data/events.xml");
    }
    
    function show_minical(){
        if (scheduler.isCalendarVisible())
            scheduler.destroyCalendar();
        else
            scheduler.renderCalendar({
                position:"dhx_minical_icon",
                date:scheduler._date,
                navigation:true,
                handler:function(date,calendar){
                    scheduler.setCurrentView(date);
                    scheduler.destroyCalendar()
                }
            });
      }    
      function ajout_events()
      {
          var eventId = scheduler.addEvent({
              start_date: "16-06-2013 09:00",
              end_date:   "16-06-2013 12:00",
              text:   "Meeting",
              holder: "John", //userdata
              room:   "5"     //userdata
            });      
        
      }    
    onload="init();"
</script> -->

<body  id="page-top" data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Tyrell</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">git
                    <li>
                        <a class="page-scroll" href="login.php">Connexion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Intro Section -->

    <section id="intro" class="intro-section">
        <div class="overlay-color">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-inline home-form">
                            <div class="form-group">
                                <input class="form-control input-lg home-input-service" id="inputlg" type="text" placeholder="Service recherché">
                            </div>
                            <button type="submit" class="input-lg home-input-submit btn btn-default">Rechercher</button>
                        </form>
                    </div>

                    <div class="col-sm-12" id="form-address">
                        <form class="form-inline home-form">
                            <div class="form-group">
                                <input class="form-control input-lg home-input-address" id="inputlg" type="text" placeholder="Entrez votre adresse">
                            </div>
                            <button type="submit" class="input-lg home-input-submit btn btn-default">Rechercher</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div>
            <h1>Disponibilité Services</h1>
            <div id="calendar"></div>
        </div>
        <!--           <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
                     <div class="dhx_cal_navline">
                     <div class="dhx_cal_prev_button">&nbsp;</div>
                     <div class="dhx_cal_next_button">&nbsp;</div>
                     <div class="dhx_cal_today_button"></div>
                     <div class="dhx_cal_date"></div>
                     <div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
                     <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
                     <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
                     <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
                     </div>
                     <div class="dhx_cal_header">
                     </div>
                     <div class="dhx_cal_data">
                     </div>
                  </div>   -->
                  <!-- <iframe src="#" class="frame-services"></iframe> -->
    </section>
    <script>
        $(document).ready(function () {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                defaultView: "agendaWeek",
                events: [
        {
            title  : 'event1',
            start  : '2016-12-01'
        },
        {
            title  : 'event2',
            start  : '2016-12-05',
            end    : '2016-12-07'
        },
        {
            title  : 'event3',
            start  : '2016-12-09T12:30:00',
            allDay : false // will make the time show
        }
    ],
                eventClick: function (event) {
alert(event);
                },
                    drop: function(date) {
        alert("Dropped on " + date.format());
    },
    
		droppable: true,	
		editable: true

                // put your options and callbacks here
            })

        });
    </script>

</body>
</html>
