<?php get_header(); ?>


	<main role="main container-fluid">
		<?php get_template_part('/inc/post-header'); ?>

		<!-- section -->
		<section class="col-md-8 col-md-offset-2 row">

			<h1><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>

			<?php get_template_part('/inc/loop'); ?>

			<?php get_template_part('/inc/pagination'); ?>

		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
