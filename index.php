<?php
$UWAMPFOLDER="../";
?>

<html>
<head>
	<title>UwAmp</title>
	<link rel="shortcut icon" type="image/x-icon" href="AA-resources/img/uwamp.png" /> 
	<link rel="stylesheet" type="text/css" href="AA-resources/css/styles.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

	<link rel="stylesheet" type="text/css" href="AA-resources/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="AA-resources/jquery-src/jQuery.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</head>
<body class="m-0 p-0">
	<div style="min-height: 100vh;" id="section1">
		<div class="text-white bg-dark mb-3 w-100 border-bottom">
			<div class="d-flex justify-content-between p-3 container ">
				<div class="d-flex">
					<img src="AA-resources/img/uwamp.png" style="height:50px;">
					<h2 class="align-self-center ml-2 mb-0">Wamp Serveur</h2>
					<small class="align-self-end small">V1.6</small>
				</div>
				<div class="">
					<button id="btnswitchmode" class="btn btn-dark border-light my-2">
						<i class="fas fa-fw fa-moon text-white"></i> Dark
						<!--<i class="fas fa-fw fa-sun text-warning"></i> Light--> Mode
					</button>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="alert bg-light" role="alert">
				<h2 class="my-2">Apache Work Fine !!!</h2>
			</div>

			<div class="alert bg-light row align-items-center px-0 mx-0">
	        	<div class="col-1"><i class="h1 fas fa-exclamation-triangle text-warning my-1"></i></div>
	        	<div class="col-11">This is an upgraded version of Uwamp, it may have some bugs</div>
	    	</div>

			<div class="card mt-2">
				<div class="card-header">
					<h2 class="my-2">Configuration Setting</h2>
				</div>
	  			<div class="card-body">
	    			<ul class="nav flex-column">
						<li class="nav-item">
					    	<p class="m-0">Apache version : <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
					  	</li>
					  	<li class="nav-item">
					    	<a class="btn border mr-2 mt-2" href="/mysql/">PHPMyAdmin</a>
					    	<a class="btn border mr-2 mt-2" href="/uwamp/phpinfo.php">PHP Info</a>
					  	</li>
					</ul>
	  			</div>
			</div>

					
			<div class="card mt-2">
				<?php 
					if (empty($_SESSION['affichage']))
					{
						$_SESSION['affichage'] = 'List';
					}

					if (isset($_POST['btnmode'])) 
					{
						if ($_POST['btnmode'] == 'List') 
						{
							$_SESSION['affichage'] = 'Block';
						}
						else
						{
							$_SESSION['affichage'] = 'List';
						}
					}

					if ($_SESSION['affichage']=='Block') 
					{
						include 'AA-resources/view/modelist.php';
						$_SESSION['affichage'] = 'List';
					}
					else
					{
						include 'AA-resources/view/modeslider.php';
						$_SESSION['affichage'] = 'Block';
					}
				?>			
			<div class="card-footer">
				<div class="ml-auto">
					<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
						<form action="" method="POST">
							<button value="List" type="submit" name="btnmode" class="btn <?php if($_SESSION['affichage']=='List'){echo 'bg-dark text-white';}?>"><i class="fas fa-list-ul"></i></button>
							<button value="block" type="submit" name="btnmode" class="btn <?php if($_SESSION['affichage']=='Block'){echo 'bg-dark text-white';}?>"><i class="fas fa-th-large"></i></button>
						</form>
					</div>
				</div>
			</div>		
					
					
								
			</div>
			<div class="alert bg-light text-center mt-2 mb-1" role="alert">
				<h2 class="my-1 d-flex justify-content-around">
					<a class="btn border mx-2" href="http://www.uwamp.com">UwAmp Home</a>
					 
					<a class="btn border mx-2" href="http://www.ubugtrack.com">uBugtrack</a>
				</h2>
			</div>
			<div class="float-per text-center"><a class="section h4 text-muted" href="#section2"><i class="fal fa-arrow-circle-down icon"></i></a></div>
		</div>
	</div>
	<div class="container py-2" style="height: 100vh;" id="section2">
		<div class="text-center"><a class="section h4 text-muted" href="#section1"><i class="fal fa-arrow-circle-up icon"></i></a></div>
		<div class="card mt-2">
				<div class="card-header">
					<h2 class="my-2">New project</h2>
				</div>
	  			<div class="card-body">
	    			<form>
	  					<div class="form-group row">
	    					<label for="folder" class="col-sm-2 col-form-label">Folder name</label>
	    					<div class="col-sm-10">
	      						<input type="text" class="form-control " id="folder" value="" placeholder="myNewWebSite">
	    					</div>
	  					</div>
	  					<hr>
	  					<div class="d-flex my-2">
						  	<div class="custom-control custom-checkbox mr-2">
		  						<input type="checkbox" class="custom-control-input" id="customCheck1">
		  						<label class="custom-control-label" for="customCheck1">add Index.php</label>
							</div>
							<div class="custom-control custom-checkbox mx-2">
		  						<input type="checkbox" class="custom-control-input" id="customCheck2">
		  						<label class="custom-control-label" for="customCheck2">add Resources</label>
		  						<label for="customCheck2" class="small form-text text-muted">bootstrap | css | images | js </label>
							</div>
							<div class="custom-control custom-checkbox mx-2">
		  						<input type="checkbox" class="custom-control-input" id="customCheck3">
		  						<label class="custom-control-label" for="customCheck3">add View</label>
		  						<label for="customCheck3" class="small form-text text-muted">Page | Components</label>
							</div>
							<div class="custom-control custom-checkbox mx-2">
		  						<input type="checkbox" class="custom-control-input" id="customCheck4">
		  						<label class="custom-control-label" for="customCheck4">add Controller</label>
							</div>
							<div class="custom-control custom-checkbox mx-2">
		  						<input type="checkbox" class="custom-control-input" id="customCheck5">
		  						<label class="custom-control-label" for="customCheck5">add Class</label>
							</div>
						</div>
	  					<button type="submit" class="btn btn-primary">Generate</button>
					</form>	
	  			</div>
			</div>
	</div>
</body>
</html>
<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div id="modal-body" class="modal-body">
        
      		</div>
      		<div class="modal-footer text-center" style="display: block;">
        		<small class="text-muted small">Click around the window to exit</small>
      		</div>
    	</div>
  	</div>
</div>
<script>
	$(document).ready(function()
	{
		$('#carouselproject').carousel({
       		pause: true,
        	interval: false
    	});
		let btn = $('.btnmodal');	


		btn.click(function()
		{
			let title = $(".modal-title");
			let body = $(".modal-body");
			let id = $(this).attr('id');
			let value = $("#"+id).val();
			let val = value.split(",");

			title.html(val[1]);

			body.load(val[0]+'/'+val[1],function( response, status, xhr ) 
			{
				if (success='success') 
				{
					if (response=='') 
	            	{
	            		body.html('<div class="alert alert-danger" role="alert">'+val[1]+' file is empty!</div>');
	            	}
	            	else
	            	{
	                	body.html(nl2br(response));
	                }
				}
				else
				{
					body.html('<div class="alert alert-danger" role="alert">An error has occurred. Please try again</div>');
				}
			});

			$('#showModal').modal('show')
		})

		let check = sessionStorage.getItem('mode');
		if (check=='Dark') 
		{
			sessionStorage.setItem('mode', 'light');
			switchmode();
		}

		$('#btnswitchmode').click(function(){
			switchmode();
		})

		function switchmode()
		{
			let mode = sessionStorage.getItem('mode');
				
			if (mode=="Dark") 
			{
				//light mode
				$('#btnswitchmode').html('<i class="fas fa-fw fa-moon text-white"></i> Dark Mode');
				$('.card').removeClass('text-white bg-dark border-light');
				$('body').removeClass('bg-dark');
				$('.btn').removeClass('text-light border-light');
				$('.indicator').addClass('bg-dark');
				$('.alert').removeClass('bg-dark border-light text-white');
				$('.icon').removeClass('text-light');
				$('.icon').addClass('text-dark');
				$('.modal-header').removeClass('bg-dark text-light');
				$('.modal-body').removeClass('bg-dark text-light');
				$('.modal-footer').removeClass('bg-dark text-light');
				sessionStorage.setItem('mode', 'Light');
			}
			else
			{
				//dark mode
				$('#btnswitchmode').html('<i class="fas fa-fw fa-sun text-warning"></i> Light Mode');
				$('.card').addClass('text-white bg-dark border-light');
				$('body').addClass('bg-dark');
				$('.btn').addClass('text-light border-light');
				$('.indicator').removeClass('bg-dark');
				$('.alert').addClass('bg-dark border-light text-white');
				$('.icon').removeClass('text-dark');
				$('.icon').addClass('text-light');
				$('.modal-header').addClass('bg-dark text-light');
				$('.modal-body').addClass('bg-dark text-light');
				$('.modal-footer').addClass('bg-dark text-light');
				sessionStorage.setItem('mode', 'Dark');
			}
		}

		function nl2br (str, is_xhtml) 
		{
    		if (typeof str === 'undefined' || str === null) 
    		{
        		return '';
   			}
    		var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    		return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
		}  

		// Add smooth scrolling to all links
	  	$(".section").on('click', function(event) 
	  	{
	  		console.log('test');
			// Make sure this.hash has a value before overriding default behavior
		    if (this.hash !== "") 
		    {
		    	// Prevent default anchor click behavior
		      	event.preventDefault();

		      	// Store hash
		      	var hash = this.hash;

		      	// Using jQuery's animate() method to add smooth page scroll
		      	// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		      	$('html, body').animate({
		        	scrollTop: $(hash).offset().top
		      	}, 1000, function(){
		   
		    		// Add hash (#) to URL when done scrolling (default click behavior)
		      		window.location.hash = hash;
		    	});
		   	} // End if
		});
	});
</script>