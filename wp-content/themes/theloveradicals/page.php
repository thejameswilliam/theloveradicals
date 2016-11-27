<?php get_header(); ?>

	<main role="main container-fluid">
		<?php get_template_part('/inc/post-header'); ?>
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post();
	$image_url = the_post_thumbnail_url();
	?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('story row'); ?>>
			<!-- post thumbnail -->
			<?php

			if ($image_url) : // Check if Thumbnail exists ?>
				<div class="single_thumb fade-scroll ">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php
						$image_args = array(
							'src' => $image_url,
							'w'   => 300,
							'h'   => 300,
						);
						?>
						<img src="<?php echo mapi_thumb($image_args); ?>" alt="<?php the_title(); ?>">
					</a>
				</div>

			<?php endif; ?>
			<!-- /post thumbnail -->
			<div class=" col-md-12 page">
				<!-- post title -->
				<div class="col-md-8 col-md-offset-2 row">
					<div class="post_info">
						<h1><?php the_title() ?></h1>
					</div>
				</div>
				<!-- /post title -->

				<section class="col-md-8 col-md-offset-2 row">
				<?php if (current_user_can('manage_options')) : ?>
					<ul  class="nav nav-tabs">
							<li class="active"><a  href="#story" data-toggle="tab">Page Content</a></li>
							<li><a href="#edit" data-toggle="tab">Edit Page</a></li>
					</ul>

					<div class="tab-content clearfix">
							<div class="tab-pane active" id="story">
								<?php the_content(); ?>
							</div>
							<div class="tab-pane" id="edit">
								<?php
								$form_options = array(
									'updated_message' => false,
									'post_content' => true,
								);
								acf_form($form_options); ?>
							</div>
					</div>
				<?php else : ?>
					<?php the_content(); ?>

				<?php endif; ?>
				</section>

			</div>

		</article>
		<!-- /article -->
		<footer class="single_footer row">

		</footer>

	<?php endwhile; endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
