<ul class="nav navbar-nav navbar-right">
	<p class="navbar-text">Welcome back,</p>
    <li class=''><a href='profile.php?id=<?php echo $aid?>'><?php echo $firstname ?></a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
        <ul class="dropdown-menu">
			<li><a href='message.php'>Inbox <span class="badge"><?php echo $newmsgnum ?></span> </a></li>
			<?php include $navbaruser; ?>
			<li style='border-top:1px solid #dddddd'><a href='logoutCTRL.php'>Log out</a></li>
		</ul> 
    </li>
</ul>