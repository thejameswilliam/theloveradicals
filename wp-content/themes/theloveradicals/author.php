<?php get_header(); ?>

<main role="main container-fluid">
	<?php get_template_part('/inc/post-header'); ?>
		<!-- section -->

		<?php if (have_posts()): the_post();
			$image_url = get_field('featured_image');
		?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class('story row'); ?>>
				<div class=" col-md-12 story_post">
					<div class="col-md-8 col-md-offset-2 row">
						<div class="post_info">
							<?php
								$author_id = get_the_author_meta('ID');
								$author_image = get_field('photo', 'user_'. $author_id );
								$pen_name_option = get_field('under_pen_name', 'user_'. $author_id );

								if($pen_name_option == 'yes') :
									$author_name = get_field('pen_name', 'user_'. $author_id );
								else :
									$author_name = get_the_author_meta('display_name', $author_id);
								endif;
							?>
							<h1><?php echo 'Stories by ' . $author_name; ?></h1>
						</div>

						<div class="col-md-12 row">
							<?php if ( get_field('bio', 'user_'.$author_id)) :
								$image_url = get_field('photo', 'user_'.$author_id);
								$image_args = array(
									'src' => $image_url,
									'w'   => 300,
									'h'   => 300,
								);
								?>
								<div class="author_photo col-md-3">
									<img src="<?php echo mapi_thumb($image_args); ?>" alt="<?php the_field('story_title'); ?>">
								</div>
								<div class="author_bio col-md-9">
									<?php echo get_field('bio', 'user_'.$author_id); ?>\
								</div>
							<?php endif; ?>
						</div>

						<?php get_template_part('/inc/loop'); ?>

					</div>
				</div>
			</article>
			<!-- /article -->
		<?php else: ?>
			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
