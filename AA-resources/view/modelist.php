<div class="card-header d-flex justify-content-around w-100">
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
							echo '<button id="btnmodal'.$idcount.'" class="btnmodal btn btn-info border-dark" value="'.$file.','.$file_parts['basename'].'">'.$file_parts['filename'].'</button>';
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
