<?php get_header();
?>
<div class="wrapper">
	<main role="main" class="row col-md-12 col-sm-12 col-xs-12 container-fluid">
		<?php get_template_part('/inc/post-header'); ?>
		<?php get_template_part('/inc/left_head'); ?>


		<section class="col-md-7 col-sm-12 col-xs-12 pull-right love_stories">
			<h1><?php _e( 'Our Stories', 'html5blank' ); ?></h1>
			<?php get_template_part('/inc/loop'); ?>

			<?php get_template_part('/inc/pagination'); ?>
		</section>

		<!-- /section -->


	</main>
    <?php get_footer(); ?>
</div>
