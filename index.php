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
		<div class=" text-white bg-dark mb-3 w-100">
			<div class="d-flex justify-content-between card-header container">
				<div class="d-flex">
					<img src="AA-resources/img/uwamp.png" style="height:50px;">
					<h2 class="align-self-center ml-2 mb-0">Wamp Serveur</h2>
					<small class="align-self-end small">V1.5</small>
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
				<div class="card-header d-flex justify-content-around">
					<a class="my-2 btn border text-dark" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="" aria-hidden="true"><i style="line-height: 38px;" class="fas fa-fw fa-chevron-left text-dark icon"></i></span>
						<span class="sr-only">Previous</span>
					</a>
					<h2 class="my-2">Virtual Host</h2>					
					<a class="my-2 btn border text-dark" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="" aria-hidden="true"><i style="line-height: 38px;" class="fas fa-fw fa-chevron-right text-dark icon"></i></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="card-body p-0">
					<div id="carouselExampleIndicators" class="carousel slide pt-4" data-ride="carousel">
  						<div class="carousel-inner">
  							<div class="carousel-item active">
  								<div class="d-flex justify-content-around">
		  							<?php
									$handle=opendir($UWAMPFOLDER."www");
									$count=0;
									$idcount=0;
									$countslide = 1;
									while ($file = readdir($handle)) 
									{	
										
										if ($file=="." || $file==".." || $file=="AA-resources") continue;
										if (is_dir($file))
										{	

											
											//echo $count;
											$count++;
											echo '
											<div class="card mx-2" style="width: 15rem;">
			  									<div class="card-header text-center">'.$file.'</div>
			  									<div class="card-body">
			    									<a class="my-1 btn btn-primary border-dark w-100" href="/'.$file.'">Open</a>
			    									<div class="btn-group w-100" role="group" aria-label="Basic example">';
			    						
											
											$filehandle = opendir($file);												
											while ($file2 = readdir($filehandle)) 
											{
												if ($file2 =="." || $file2 =="..") continue;

												$file_parts = pathinfo($file2);
												
												if (count($file_parts) > 3) 
												{

													//var_dump($file_parts);
													if ($file_parts['extension'] == 'txt') 
													{
														echo '<button id="btnmodal'.$idcount.'" class="btnmodal btn btn-info border-dark" value="'.$file.','.$file_parts['basename'].'">'.$file_parts['filename'].'</button>';
														$idcount++;
													}
												}

											}

											echo '</div></div></div>';// end btn group // end card body // end card
											if ($count%4 == 0) 
											{
												echo '</div></div>'; // end flex // end carousel-item
												$countslide++;
												echo '<div class="carousel-item"><div class="d-flex justify-content-around">';
											}				
										}								
									}
									closedir($handle);
									if ($count==0)
									{
										echo '
										<div class="alert alert-danger text-center mb-0" role="alert">
											<p class="mt-1">No project found</p>
										</div>';
									}
									?>
								</div>
							</div>
					  	</div>
					  	<div class="card-footer mt-2">
							<ol class="carousel-indicators m-0">
								<?php 
									for ($i=0; $i < $countslide; $i++) 
									{ 
										if ($i==0) 
										{
											echo '<li class="active indicator bg-dark" data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
										}
										else
										{
											echo '<li class="indicator bg-dark" data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
										}
									}
								?>
		  					</ol>
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

		function nl2br (str, is_xhtml) 
		{
    		if (typeof str === 'undefined' || str === null) 
    		{
        		return '';
   			}
    		var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    		return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
		}

		let check = sessionStorage.getItem('mode');
		console.log(check);
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
				sessionStorage.setItem('mode', 'Light');
				console.log(sessionStorage.getItem('mode'));
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
				sessionStorage.setItem('mode', 'Dark');
				console.log(sessionStorage.getItem('mode'));
			}
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