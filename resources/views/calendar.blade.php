<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CESI - Planning</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
	
<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>     
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('home')}}">Menu</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div id="calendar" class="col-centered">
                </div>
            </div>			
        </div>
        <!-- /.row -->
        @if (Auth::user()->roles_id === 1)
         
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="post" action="/addEvent">
            {!! Form::token() !!}
			
			  <div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel">Ajouter une réservation de salle</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titre</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Couleur</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choisir</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Bleu</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Vert</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Jaune</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>
						  <option style="color:#000;" value="#000">&#9724; Noir</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Début</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="start" class="form-control" id="start">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fin</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="end" class="form-control" id="end">
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				
				<button type="submit" class="btn btn-primary">Sauver</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="/editEventTitle">
            {!! Form::token() !!}
      
			  <div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel">Editer une réservation de salle</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titre</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Couleur</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						<option value="">Choisir</option>
						<option style="color:#0071c5;" value="#0071c5">&#9724; Bleu</option>
						<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						<option style="color:#008000;" value="#008000">&#9724; Vert</option>						  
						<option style="color:#FFD700;" value="#FFD700">&#9724; Jaune</option>
						<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						<option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>
						<option style="color:#000;" value="#000">&#9724; Noir</option>
						</select>
					</div>
				  </div>
                  <div class="form-group">
					<label for="start-time" class="col-sm-2 control-label">Début</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="start" class="form-control" id="start time" readonly>
					</div>
				  </div>
                  <div class="form-group">
					<label for="end-time" class="col-sm-2 control-label">Fin</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="start" class="form-control" id="end time" readonly>
					</div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Supprimer</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				
				<button type="submit" class="btn btn-primary">Sauver</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
@endif
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.js"> </script>

    <script>
    $(document).ready(function() {
        $.ajaxSetup({
    		headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
   		 });
		
    $('#calendar').fullCalendar({
		// Vue initiale
		initialView: 'dayGridMonth',
          // L'indicateur de l'heure actuelle
          nowIndicator: true,
          // Affiche le numero des semaines
          weekNumbers: true,
          // Hauteur du calendrier
          height: 650,
          // Langue
          locale: 'fr',
          timeZone: 'local',
          // Permettre d'afficher la liste si trop d'event dans une case
          dayMaxEvents: true,
          // Edition
          editable : true,
          // Editer les attributs ?
          resourceEditable: true,
          // Selectionner plusieurs cellules
          selectable: true,
          selectHelper: true,
          eventLimit: true,
          // Le header
          headerToolbar: {
              left: 'prev,next today,addEventButton',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
          },
    
        select: function(start, end) {		
			$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
			$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
			$('#ModalAdd').modal('show');
		},

        eventRender: function(event, element) {
			element.bind('dblclick', function() {
				$('#ModalEdit #id').val(event.id);
				$('#ModalEdit #title').val(event.title);
				$('#ModalEdit #color').val(event.color);
				$('#ModalEdit').modal('show');
			});
		},

        eventDrop: function(event, delta, revertFunc) { // si changement de position
			edit(event);
		},
        
        eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
    		edit(event);
		},
        

	});
    
    @if (Auth::user()->roles_id === 1)    
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;	
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url:"{{route('editEventDate')}}",
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		@endif 
	});
</script>
</body>
</html>
