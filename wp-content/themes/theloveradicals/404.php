<?php get_header(); ?>

<main role="main container-fluid">
	<?php get_template_part('/inc/post-header'); ?>
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404" <?php post_class('story row'); ?>>
				<div class="col-md-12 story_post">
					<div class="col-md-8 col-md-offset-2 row">
						<div class="post_info">
							<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
							<h3><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a></h2>
							<h4>Or check out the stories below.</h3>
						</div>
						<section class="col-md-12 row">
							<?php get_template_part('/inc/loop'); ?>
						</section>

						<?php get_template_part('/inc/pagination'); ?>
					</div>

				</div>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
