<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./">HI!TECFEST</a>
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li id="registro"><a href="./registro.php">REGISTRO</a></li>
					<li id="kit"><a href="./kit.php">ASIGNACION DE EQUIPO</a></li>
					<li id="staff"><a href="./staff.php">STAFF</a></li>
					<?php if($staff->tipo=="capitan"){ ?>
						<li id="capitanes"><a href="./capitanes.php">CAPITANES</a></li>
					<?php }else{ ?>
						<li id="capitanes"><a href="./login_capitanes.php">LOGIN CAPITANES</a></li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($user->tipo=="admin"){ ?>
						<li id="admin"><a href="./admin.php">ADMIN</a></li>
					<?php }else if($user->tipo=="ch"){ ?>
						<li id="ch"><a href="./ch.php">CH</a></li>
					<?php }else if($user->tipo=="contenido"){ ?>
						<li id="contenido"><a href="./contenido.php">CONTENIDO</a></li>
					<?php }else{ ?>
						<li id="login"><a href="./login.php">LOGIN</a></li>
					<?php } ?>
					<?php if($user->tipo=="admin" || $staff->tipo=="capitan" || $user->tipo=="ch" || $user->tipo=="contenido"){ ?>
						<li id="logout"><a href="./logout.php">LOGOUT</a></li>
					<?php } ?>
				</ul>
				
				<!-- <ul class="nav navbar-nav navbar-right">
					<li><a href="#">Link</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li>
				</ul> -->
			</div><!-- /.navbar-collapse -->
		</nav>