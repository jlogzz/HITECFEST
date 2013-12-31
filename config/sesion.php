<?php

	session_start();
	if(isset($_SESSION['username'])){
		$id=$_SESSION['id'];
		$user=R::load('users',$id);
	}else if(isset($_SESSION['color'])){
		$id=$_SESSION['id'];
		$staff=R::load('staff', $id);
	}

?>