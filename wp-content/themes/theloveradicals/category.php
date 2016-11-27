<?php get_header(); ?>
	<main role="main container-fluid">
		<?php get_template_part('/inc/post-header'); ?>

		<!-- section -->
		<section class="col-md-8 col-md-offset-2 row">
			<article id="post-<?php the_ID(); ?>" class="story row">
				<div class=" col-md-12 page">
					<div class="col-md-8 col-md-offset-2 row">
						<div class="post_info">
							<h1><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>
						</div>
					</div>

					<section class="col-md-8 col-md-offset-2 row">
						<?php get_template_part('/inc/loop'); ?>
					</section>

					<?php get_template_part('/inc/pagination'); ?>
				</div>
			</article>
		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
