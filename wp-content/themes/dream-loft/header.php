
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://vk.com/cooltolia">
	
	<?php wp_head(); ?>

	<style>
		.langs {
			-webkit-box-ordinal-group: 3;
				-moz-box-ordinal-group: 3;
				-ms-flex-order: 2;
					order: 2;
			z-index: 9;
			width: 50px;
			background-color: #fff; }
		.langs .lang-item {
			display: none;
		}

		.langs__inner {
			width: 100%;
			position: relative;
			cursor: pointer; }

		.langs__result {
		position: relative;
		width: 100%;
		height: 29px;
		padding: 5px 8px;
		padding-left: 30px;
		font-size: 0;
		background-size: 19px 18px;
		background-repeat: no-repeat;
		background-position: left 5px center; }
		.langs__result::after {
			content: '';
			position: absolute;
			width: 8px;
			height: 5px;
			top: 14px;
			right: 10px;
			background-image: url(../images/lang-arrow.svg);
			background-size: cover; }

		.langs__dd {
		display: none;
		position: absolute;
		width: 100%;
		top: 29px;
		left: 0;
		padding: 0;
		margin: 0;
		list-style: none;
		background-color: #fff;
		overflow-y: auto; }
		.langs__dd.active {
			display: block; }

		.langs__item {
		padding: 5px 8px;
		padding-left: 30px;
		color: #0a0a0a;
		font-size: 9px;
		font-weight: 300;
		background-size: 19px 18px;
		background-repeat: no-repeat;
		background-position: left 5px top 2px; }

		.langs__item[rel="RU"] {
		background-image: url("../images/flags/russia.svg"); }

		.langs__item[rel="EN"] {
		background-image: url("../images/flags/united-kingdom.svg"); }

		.langs__item[rel="MO"] {
		background-image: url("../images/flags/moldova.svg"); }

		.langs__item[rel="FR"] {
		background-image: url("../images/flags/france.svg"); }

		@media (min-width: 768px) {
		.langs {
			width: 70px; }
		.langs__result {
			height: 38px;
			padding: 10px;
			padding-left: 44px;
			background-size: 29px 26px; }
			.langs__result::after {
			width: 12px;
			height: 8px;
			top: 17px;
			right: 10px; }
		.langs__dd {
			top: 38px; }
		.langs__item {
			padding: 10px;
			padding-left: 44px;
			font-size: 12px;
			background-size: 29px 26px; } }
	</style>
</head>

<body class="pageload no-js"><!-- main-header --> 
	<header class="main-header">
		<div class="main-header__inner">
			<a class="main-header__logo">
				<img src="images/logo.png" width="250" alt="Dream-loft"/>
			</a>
			<div class="langs">
				<div class="langs__inner">

				<?php pll_the_languages(array('show_names' => 1)); ?>

				<div class="langs__result">
				</div>
				<ul class="langs__dd">
					<li rel="ru-RU" class="langs__item">RU
					</li>
					<li rel="en-GB" class="langs__item">EN
					</li>
				</ul>
				</div>
			</div>
			<div class="main-header__navigation"><!-- main-nav --> 
				<nav class="main-nav">
					<?php
						wp_nav_menu([
							'theme_location' => 'main-menu',
							"menu"           => 'Top menu',
							'menu_class'     => 'main-nav__list',
							"container"      => false,
							'depth'          => 1,
						]);
					?>
				</nav>
			</div>
			<div class="main-header__contacts">
				<div class="main-header__tel">
					<?php echo get_option('company_phone') ?>
				</div>
				<div class="main-header__email">
					<?php echo get_option('company_email') ?>
				</div>
			</div>
			<div class="main-header__hamburger"><!-- hamburger --> 
				<div class="hamburger">
					<div class="hamburger__line">
					</div>
					<div class="hamburger__line">
					</div>
					<div class="hamburger__line">
					</div>
				</div><!--/ hamburger --> 
			</div>
			<div class="main-header__mobile-nav">
				<!-- mobile-nav --> 
				<nav class="mobile-nav">
					<?php
						wp_nav_menu([
							'theme_location' => 'mobile-menu',
							"menu"           => 'Mobile menu',
							'menu_class'     => 'mobile-nav__list',
							"container"      => false,
							'depth'          => 1,
						]);
					?> 
				</nav>
				<!--/ mobile-nav --> 
			</div>
		</div>
	</header><!--/ main-header --> <!-- index-catalog --> 