<?php get_header(); ?>


	<main role="main container-fluid">
		<?php get_template_part('/inc/post-header'); ?>

		<!-- section -->
		<section class="col-md-8 col-md-offset-2 row">

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
