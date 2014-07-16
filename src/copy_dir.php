<?php
	function copy_dir($dir2copy, $dir_paste)
	{
		if (is_dir($dir2copy))
		{
			if ($dh = opendir($dir2copy))
			{     
				while (($file = readdir($dh)) !== false)
				{
				  	if(!is_dir($dir_paste))
				  		mkdir ($dir_paste, 0777);
				    if(is_dir($dir2copy.$file) && $file != '..'  && $file != '.')
				    	copy_dir($dir2copy.$file.'/', $dir_paste.$file.'/' );
				    elseif($file != '..'  && $file != '.')
				    	copy($dir2copy.$file, $dir_paste.$file );                                       
				}
				closedir($dh);
			}
		}
	}
?>