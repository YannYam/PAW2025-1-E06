<?php 
	function required($data) {
		return $data == "";
	}

	function alfabet($data) {
		return preg_match("/^[a-zA-Z\s]+$/", $data);
	}

	function numerik($data){
		return preg_match("/^[0-9]+$/", $data);
	}
?>