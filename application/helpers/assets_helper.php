<?php 
	function get_stylesheet(){
		$files = array('assets/bootstrap/css/bootstrap.min.css',
			'assets/custom-css/custom.css');

		foreach ($files as $file) {
			echo '<link rel="stylesheet" href="'.base_url($file).'" />';
		}
	}

	function get_javaScript(){
		$files = array('assets/bootstrap/js/bootstrap.min.js',
			'assets/validation/lib/jquery.js',
			'assets/validation/dist/jquery.validate.js',
			'assets/notify.js');

		foreach ($files as $file) {
			echo '<script src="'.base_url($file).'"></script>';
		}
	}
?>