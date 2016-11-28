<?php get_header(); ?>

<main role="main container-fluid">
	<?php get_template_part('/inc/post-header'); ?>
		<!-- section -->

		<?php if (have_posts()): the_post();?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class('story row'); ?>>
				<div class=" col-md-12 story_post">
					<div class="col-md-8 col-md-offset-2 row">






						<div class="post_info">
							<?php
								$image_url = get_field('featured_image');
								$author_id = get_the_author_meta('ID');
								$author_image = get_field('photo', 'user_'. $author_id );
								$pen_name_option = get_field('under_pen_name', 'user_'. $author_id );

								if($pen_name_option == 'true') :
									$author_name = get_field('pen_name', 'user_'. $author_id );
								else :
									$author_name = get_the_author_meta('display_name', $author_id);
								endif;
							?>
							<h1><?php echo 'Stories by ' . $author_name; ?></h1>
						</div>

						<div class="author_meta col-md-12 row">
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
									<?php echo get_field('bio', 'user_'.$author_id); ?>
								</div>
								<hr />
							<?php endif; ?>
						</div>

						<?php if (have_posts()): while (have_posts()) : the_post();

						if(get_field('featured_image')) :
							$image_url = get_field('featured_image');
						else :
							$author_id = get_the_author_meta('ID');
							$image_url = get_field('photo', 'user_'. $author_id );
						endif;
						$image_args = array(
							'src'            => $image_url,
							'w'              => 100,
							'h'              => 100,
						);
						?>





							<!-- article -->
							<article id="post-<?php the_ID(); ?>" <?php post_class('love_stories story col-md-10 col-md-offset-1 row'); ?>>
								<div class="col-md-8 post_info">
									<!-- post title -->
									<span class="date"><?php the_time('F j, Y'); ?></span>
									<h2>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</h2>
									<!-- /post title -->

									<!-- post details -->
									<span class="author">
										<?php
										echo 'Written by ';
										echo '<a href="' . get_author_posts_url($author_id) . '">';
										echo $author_name;
										echo '</a>';
										?>
									</span>
									<!-- /post details -->
								</div>


								<!-- post thumbnail -->

									<div class="post_thumb pull-right col-md-3">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo mapi_thumb($image_args); ?>" alt="<?php the_field('story_title'); ?>">
										</a>
									</div>

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








					</div>
				</div>
			</article>
			<!-- /article -->



		<?php else: ?>
			<!-- article -->
			<article>

				<h2><?php _e( 'This author has not written any stories.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
