<?php get_header(); ?>

	<main role="main container-fluid">
		<div class="single_navigation">

        <?php /* Primary navigation */
          wp_nav_menu( array(
            'menu' => 'top_menu',
            'depth' => 0,
            'container' => false,
            )
          );
      ?>
    </div>
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('story'); ?>>
			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="single_thumb row container-fluid">

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php
						mapi_featured_img(
							array(
								'w'     => 1200,
								'h'     => 600,
								'class' => 'aligncenter row',
							)
						);
						?>
					</a>
				</div>

			<?php endif; ?>
			<!-- /post thumbnail -->
			<div class=" col-md-12 story_post">
				<!-- post title -->
				<div class="single_thumb col-md-8 col-md-offset-2 row">
					<div class="post_info">
						<h1><?php the_title(); ?></h1>
						<div class="meta">
								<?php _e( 'Written by ', 'html5blank' ); the_author_posts_link(); _e( ' on ', 'html5blank' ); the_time('F j, Y'); ?>
						</div>
					</div>
				</div>
				<!-- /post title -->

				<section class="single_thumb col-md-8 col-md-offset-2 row">
					<?php the_content(); // Dynamic Content ?>

					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

					<?php comments_template(); ?>
				</section>
			</div>



		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
