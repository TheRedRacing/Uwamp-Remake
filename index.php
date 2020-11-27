<?php
$UWAMPFOLDER="../";
?>

<html>
<head>
	<title>UwAmp</title>
	<link rel="shortcut icon" type="image/x-icon" href="AA-resources/img/uwamp.png" /> 
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

	<link rel="stylesheet" type="text/css" href="AA-resources/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="AA-resources/jquery-src/jQuery.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
	<style type="text/css">body{scroll-behavior: smooth;}</style>
</head>
<body class="m-0 p-0">
	<div style="min-height: 100vh;" id="section1">
		<div class=" text-white bg-dark mb-3 w-100">
			<div class="d-flex card-header container">
				<img src="AA-resources/img/uwamp.png" style="height:50px;">
				<h2 class="align-self-center ml-2 mb-0">Wamp Serveur</h2>
				<small class="align-self-end small">V1.0</small>
			</div>
		</div>
		<div class="container">
			<div class="alert alert-success" role="alert">
				<h2 class="my-2">Apache Work Fine !!!</h2>
			</div>

			<div class="alert alert-warning row align-items-center px-0 mx-0">
	        	<div class="col-1"><i class="h1 fas fa-exclamation-triangle my-1"></i></div>
	        	<div class="col-11">This is an upgraded version of Uwamp, it may have some bugs</div>
	    	</div>

			<div class="card">
				<div class="card-header">
					<h2 class="my-2">Configuration Setting</h2>
				</div>
	  			<div class="card-body">
	    			<ul class="nav flex-column">
						<li class="nav-item">
					    	<p class="m-0">Apache version : <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
					  	</li>
					  	<li class="nav-item">
					    	<a class="btn btn-light border mr-2 mt-2" href="/mysql/">PHPMyAdmin</a>
					    	<a class="btn btn-light border mr-2 mt-2" href="/uwamp/phpinfo.php">PHP Info</a>
					  	</li>
					</ul>
	  			</div>
			</div>
			<hr class="my-3">
			<div class="card">
				<div class="card-header">
					<h2 class="my-2">Virtual Host</h2>
				</div>
	  			<div class="card-body">
	    			<ul class="nav flex-column">
	    				<?php
						$handle=opendir($UWAMPFOLDER."www");
						$count=0;
						$idcount=0;
						while ($file = readdir($handle)) 
						{	
							
							if ($file=="." || $file==".." || $file=="AA-resources") continue;
							if (is_dir($file))
							{	
								echo '<div class="d-flex" >';
								$count++;
								echo '
								<li class="nav-item w-100">
									<a class="btn btn-primary mr-2 my-2 border border-dark" href="/'.$file.'">Projects : '.$file.'</a>';
									echo '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
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
											echo '<button id="btnmodal'.$idcount.'" class="btn btn-info border border-dark" value="'.$file.','.$file_parts['basename'].'">'.$file_parts['filename'].'</button>';
											$idcount++;
										}
									}
								}
								echo '</div>';	
								echo '</li>';	
								echo '</div>';					
							}
							
						}
						closedir($handle);
						if ($count==0)
						{
							echo '
							<div class="alert alert-danger text-center mb-0" role="alert">
								<p class="my-1">No project found</p>
							</div>';
						}
						?>
					</ul>
	  			</div>
			</div>	
			<hr class="my-3">
			<div class="alert alert-dark text-center" role="alert">
				<h2 class="my-1"><a class="btn btn-dark mx-2" href="http://www.uwamp.com">UwAmp Home</a> - <a class="btn btn-dark mx-2" href="http://www.ubugtrack.com">uBugtrack</a></h2>
			</div>
			<div class="text-center"><a class="h4 text-muted" href="#section2"><i class="fal fa-arrow-circle-down"></i></a></div>
		</div>
	</div>
	<div class="container py-2" style="height: 100vh;" id="section2">
		<div class="card">
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
		let btn = $('.btn');
		let title = $(".modal-title");
		let body = $(".modal-body");

		btn.click(function()
		{
			let id = $(this).attr('id');
			console.log(id);
			let value = $("#"+id).val();
			let val = value.split(",");
			title.html(val[1]);
			
			console.log(val);

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


		// Add smooth scrolling to all links
	  	$("a").on('click', function(event) 
	  	{
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