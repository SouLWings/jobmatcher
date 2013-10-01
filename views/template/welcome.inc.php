<ul class="nav navbar-nav navbar-right">
	<p class="navbar-text">Welcome back,</p>
    <li class=''><a href='profile.php?id=<?php echo $aid?>'><?php echo $firstname ?></a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <?php if($newmsgnum>0) echo '<span class="badge">'.$newmsgnum.'</span>' ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
			<li><a href='message.php'><span class="glyphicon glyphicon-envelope"></span> Inbox <span class="badge"><?php echo $newmsgnum ?> new</span> </a></li>
			<?php include $navbaruser; ?>
			<li style='border-top:1px solid #dddddd'><a href='logoutCTRL.php'> <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
		</ul> 
    </li>
</ul>