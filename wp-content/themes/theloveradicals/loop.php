<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('story col-md-12 row'); ?>>
		<div class="col-md-8 post_info">
			<!-- post title -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			<!-- /post title -->

			<!-- post details -->
			<span class="author"><?php _e( 'Written by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
			<!-- /post details -->
		</div>


		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<div class="post_thumb pull-right col-md-3">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php
					mapi_featured_img(
						array(
							'w'     => 150,
							'h'     => 150,
							'class' => 'aligncenter mapi-featured-img',
						)
					);
					?>

				</a>
			</div>
		<?php endif; ?>
		<!-- /post thumbnail -->


	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
