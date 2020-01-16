<?php
 namespace System;
 
 /*
 * View - load template pages
 *
 */
 
 	class View{
	 
	 /**
     $path will hold the path of the requested file.
	 $data will hold the content to be passed to the view file.
	 $data is optional; note it has a default value of false. 
	 This means if there is only one parameter passed to the render method, 
	 then the data will not be used.
     */
	 
	 public function render($path,$data= false){
		 
		if ($data) {
            // Extract the rendering variables.
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
        }

        $filepath = "../app/views/$path.php";

        if (file_exists($filepath)) {
            require $filepath;
        } else {
            die("View: $path not found!");
        }

		 
		 
	 }
	 
	 
 }