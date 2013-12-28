<?php

	session_start();
	if(isset($_SESSION['username'])){
		$id=$_SESSION['id'];
		$user=R::load('users',$id);
	}

?>