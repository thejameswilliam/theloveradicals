<?php
if(isset($_GET['updated'])) : $status = 'updated'; else : $status = 'viewed'; endif;
function my_kses_post( $value ) {
	// is array
	if( is_array($value) ) {
		return array_map('my_kses_post', $value);
	}
	// return
	return wp_kses_post( $value );
}
add_filter('acf/update_value', 'my_kses_post', 10, 1);

acf_form_head();
get_header();


?>

	<main role="main container-fluid">
		<?php get_template_part('/inc/post-header'); ?>

	<!-- section -->
	<section class="single-story col-md-12">

	<?php if (have_posts()): while (have_posts()) : the_post();
	$image_url = get_field('featured_image');
	?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('story row'); ?>>
			<!-- post thumbnail -->
			<?php if ($image_url) : // Check if Thumbnail exists ?>
				<div class="single_thumb fade-scroll ">

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php
						//mapi_var_dump($image_url);
						$image_args = array(
							'src' => $image_url,
							'w'   => 300,
							'h'   => 300,
						);
						?>
						<img src="<?php echo mapi_thumb($image_args); ?>" alt="<?php the_field('story_title'); ?>">
					</a>
				</div>

			<?php endif; ?>
			<!-- /post thumbnail -->
			<div class="col-md-12 story_post">
				<!-- post title -->
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
					<div class="post_info">
						<h1><?php the_field('story_title') ?></h1>
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
						<div class="meta">
								<?php
								echo 'Written by ';
								echo '<a href="' . get_author_posts_url($author_id) . '">';
								echo $author_name;
								echo '</a>';
								echo ' in ';
								echo the_time('F');
								?>
						</div>
					</div>
				</div>
				<!-- /post title -->

				<section class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
					<? if($status == 'updated') : ?>
						<div class="alert alert-success" role="alert">
							<strong>Well done!</strong> You successfully updated your story.
						</div>
					<?php endif; ?>
				<?php

				if (is_user_logged_in() && $current_user->ID == $post->post_author)  {
						echo 'You are the seller of this item!';
					}

					if ($current_user->ID == $post->post_author || current_user_can('manage_options')) : ?>
						<ul  class="nav nav-tabs">
								<li class="active"><a  href="#story" data-toggle="tab">My Story</a></li>
								<li><a href="#edit" data-toggle="tab">Edit My Story</a></li>
						</ul>

						<div class="tab-content clearfix">
			          <div class="tab-pane active" id="story">
			            <?php the_field('story'); ?>
			          </div>
							  <div class="tab-pane" id="edit">
			            <?php
									$form_options = array(
										'updated_message' => false
									);
									acf_form($form_options); ?>
							  </div>
						</div>
					<?php else : ?>
						<?php the_field('story'); ?>

					<?php endif; ?>
				</section>

			</div>

		</article>
		<!-- /article -->
		<footer class="single_footer row">
			<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
				<?php comments_template(); ?>
			</div>
		</footer>

	<?php endwhile; endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
