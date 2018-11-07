<header id="header" role="banner" class="main-header">
	<div class="header-inner">

		<nav class="header-nav">
			<?php
			if (isset($_SESSION['Admin']))
			{
    			if ($_SESSION['Admin'] == 1)
    			{
    			?>
			<ul>
				<li><a href="">Bienvenue <span style="color: red;">Admin <?php echo $_SESSION['pseudo'] ?> </span> !</a></li>
				<li><a href=""></a></li>
				<li><a href=""></a></li>
			</ul>
			<?php
    			}
    			else
    			{
    			?>
    		<ul>
				<li><a href="../EBoutique/index.php">Vous n'êtes pas <span style="color: red;">Admin</span> !</a>
					<a href="../EBoutique/index.php">Veuillez vous déconnecter et </a>
					<a href="../EBoutique/index.php">retournez sur la boutique officiel.</a></li>
			</ul>
			<?php
    			}
			}
			?>
		</nav>

	</div>
</header>