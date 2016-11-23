<?php get_header();
?>
<div class="wrapper">
	<main role="main" class="row col-md-12 container-fluid">
		<!-- section -->

		<?php get_template_part('/inc/left_head'); ?>


		<section class="col-md-7 pull-right love_stories">

			<h1><?php _e( 'Our Stories', 'html5blank' ); ?></h1>
			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
			<?php get_footer(); ?>
		</section>
		<!-- /section -->


	</main>
</div>
