
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="profile" href="http://vk.com/cooltolia">
	
	<?php wp_head(); ?>
</head>


<body class="pageload no-js"><!-- main-header --> 
    <header class="main-header">
		<div class="main-header__top-row"><?php the_custom_logo(); ?></a>
		</div>
		<div class="main-header__navigation">
			<div class="main-header__inner-row"><!-- main-nav --> 
			<nav class="main-nav">

				<?php
				wp_nav_menu([
					'theme_location' => 'main-menu',
					"menu"           => 'Top menu',
					'menu_class'     => 'main-nav__list',
					"container"      => false,
					'depth'          => 0,
				]);

				
				?>
			</nav><!--/ main-nav --> 
			<div class="main-header__tel"><span>тел.:</span> <?php echo get_option( 'company_phone' ) ?>
			</div>
			</div>
		</div>
    </header><!--/ main-header --> <!-- services --> 