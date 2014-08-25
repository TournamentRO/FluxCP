<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<!--[if IE]>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<![endif]-->	
		<link href="<?php echo $this->themePath('css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath('css/sticky-footer-navbar.css') ?>" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	
    <!-- Fixed navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="./"><?php echo Flux::config('SiteTitle'); ?></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<?php $menuItems = $this->getMenuItems(); ?>
						<?php if (!empty($menuItems)): ?>
							<?php foreach ($menuItems as $menuCategory => $menus): ?>
								<?php if (!empty($menus)): ?>
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo htmlspecialchars(Flux::message($menuCategory)) ?> <b class="caret"></b></a>
									<ul class="dropdown-menu">
									<?php foreach ($menus as $menuItem):  ?>
										<li>
											<a href="<?php echo $menuItem['url'] ?>"><?php echo htmlspecialchars(Flux::message($menuItem['name'])) ?></a>
										</li>
									<?php endforeach ?>
									</ul>
									</li>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>
						
						<?php $adminMenuItems = $this->getAdminMenuItems(); ?>
						<?php if (!empty($adminMenuItems) && Flux::config('AdminMenuNewStyle')): ?>
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Menu <b class="caret"></b></a>
									<ul class="dropdown-menu">
									<?php foreach ($adminMenuItems as $menuItem): ?>
										<li>
											<a href="<?php echo $this->url($menuItem['module'], $menuItem['action']) ?>"><?php echo htmlspecialchars(Flux::message($menuItem['name'])) ?></a>
										</li>
									<?php endforeach ?>
									</ul>
									</li>
						<?php endif ?>
						

					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>










    <div class="container">



		<?php //include 'main/sidebar.php' ?>

		<?php //include 'main/loginbox.php' ?>
					
			<?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
				<p class="notice">Please change your <strong>ServerAddress</strong> directive in your application config to your server's real address (e.g., myserver.com).</p>
			<?php endif ?>
								
								<!-- Messages -->
								<?php if ($message=$session->getMessage()): ?>
									<p class="message"><?php echo htmlspecialchars($message) ?></p>
								<?php endif ?>
								
								<!-- Sub menu -->
								<?php include 'main/submenu.php' ?>
								
								<!-- Page menu -->
								<?php include 'main/pagemenu.php' ?>
								
								<!-- Credit balance -->
								<?php //if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>
