<div class="card-header d-flex justify-content-around w-100">
	<a class="my-2 btn border text-dark" href="#carouselproject" role="button" data-slide="prev">
		<span class="" aria-hidden="true"><i style="line-height: 38px;" class="fas fa-fw fa-chevron-left text-dark icon"></i></span>
		<span class="sr-only">Previous</span>
	</a>
	<h2 class="my-2">Virtual Host</h2>					
	<a class="my-2 btn border text-dark" href="#carouselproject" role="button" data-slide="next">
		<span class="" aria-hidden="true"><i style="line-height: 38px;" class="fas fa-fw fa-chevron-right text-dark icon"></i></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="card-body p-0">
	<div id="carouselproject" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="d-flex justify-content-around">
					<?php
						$UWAMPFOLDER="../";
						$handle=opendir($UWAMPFOLDER."www");
						$count=0;
						
						$countslide = 1;
						while ($file = readdir($handle)) 
						{	
							
							if ($file=="." || $file==".." || $file=="AA-resources") continue;
							if (is_dir($file))
							{	

								
								//echo $count;
								$count++;
								echo '
								<div class="card m-2" style="width: 15rem; min-height:175px;">
										<div class="card-header text-center">'.$file.'</div>
										<div class="card-body">
										<a class="my-1 btn btn-primary border-dark w-100" href="/'.$file.'">Open</a>
										<div class="btn-group w-100" role="group" aria-label="Basic example">';
							
								
								$filehandle = opendir($file);
								$idcount=0;												
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
								if ($idcount == 0)
								{
									//echo $idcount;
									$idcount++;
									echo '<button class="btn btn-danger border-dark">No txt files</button>';
								}

								echo '</div></div></div>';// end btn group // end card body // end card
								if ($count%4 == 0) 
								{
									echo '</div></div>'; // end flex // end carousel-item
									$countslide++;
									echo '<div class="carousel-item" data-interval="false"><div class="d-flex justify-content-around">';
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
		<div class="mt-2">
			<div class="carousel-indicators" style="position: relative;">
				<?php 
					for ($i=0; $i < $countslide; $i++) 
					{ 
						if ($i==0) 
						{
							echo '<li class="active indicator bg-dark" data-target="#carouselproject" data-slide-to="'.$i.'"></li>';
						}
						else
						{
							echo '<li class="indicator bg-dark" data-target="#carouselproject" data-slide-to="'.$i.'"></li>';
						}
					}
				?>
			</div>
		</div>					
	</div>
</div>