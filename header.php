<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head();?>
</head>

	<body <?php body_class($class); ?>>
		<div id="wrapper" class="page-wrap">
			<header id="masthead">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name');?></a></h1>
			</header>
			<menu id="menu">
				<?php
				function st_wp_nav_menu_args( $args = '' )
				{
					$args['container'] = false;
					return $args;
				}
				
				add_filter( 'wp_nav_menu_args', 'st_wp_nav_menu_args' );
				?>

				<?php wp_nav_menu( array('menu' => 'Top Menu')); ?>
			</menu>
