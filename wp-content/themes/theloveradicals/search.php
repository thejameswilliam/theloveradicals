<?php get_header(); ?>

	<main role="main container-fluid">
		<!-- section -->
		<section class="col-md-8 col-md-offset-2 row">
			<article class="story row">
				<div class=" col-md-12 page">


					<div class="col-md-8 col-md-offset-2 row">
						<div class="post_info">
							<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
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
