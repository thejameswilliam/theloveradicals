<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo get_bloginfo('description'); ?>">
		<meta property="og:url" content="<?php echo get_bloginfo('url'); ?>">
		<meta property="og:site_name" content="<?php get_bloginfo('name'); ?>">

		<meta name="twitter:card" content="summary_large_image">
			<meta name="twitter:site" content="@theloveradicals">
		<meta name="twitter:title" content="<?php get_bloginfo('name'); ?>">
		<meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>">
		<meta name="twitter:image" content="https://theloveradicals.com/wp-content/uploads/2016/11/jgoldcrown-heart-graffiti.jpg">


		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>
