<?php

class App_Controller_Visitor extends Fz_Controller {

    /**
     * Action called when uploading a file
     * @return string   json if request is made async or html otherwise
     */
    public function startAction () {
	
	fz_log ('visitor uploading', FZ_LOG_DEBUG, $_FILES);


	$uploaddir = fz_config_get ('app', 'upload_dir');

	$uploadfile = $uploaddir . '/' . basename($_FILES['userfile']['name']);

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	  $msg = "The file ".basename($_FILES['userfile']['name'])." was successfully uploaded to our server.\n";
	  fz_log ('visitor upload successful');
	} else {
	   $msg = "Upload failed.";
	  fz_log ('visitor upload FAILED');
	}

	//echo '<pre>';
	//echo 'Here is some more debugging info:';
	//print_r($_FILES);
	//print "</pre>";
	return html("<p>" . $msg . "</p>");
    }
}
