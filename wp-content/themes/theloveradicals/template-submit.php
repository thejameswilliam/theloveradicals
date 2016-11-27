<?php
/* Template Name: Story Submit Page */
acf_form_head();
get_header();

$story_form = array(
	'post_id' => 'new_post',
	'new_post' => array(
     'post_type'		=> 'post',
	   'post_status'		=> 'draft',
  ),
  'id' => 'new-story',
	'field_groups' => array(41),
	'return' => '%post_url%',
	'submit_value' => __("Submit Story", 'acf'),
);
?>

	<main role="main container-fluid">
		<?php get_template_part('post-header'); ?>

	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post();	?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('story row'); ?>>
			<div class=" col-md-12 story_post">
				<!-- post title -->
				<div class="col-md-8 col-md-offset-2 row">
					<div class="post_info">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<!-- /post title -->

				<section class="col-md-8 col-md-offset-2 row">

				<?php
					if (is_user_logged_in() || current_user_can('manage_options')) : ?>

			      <?php the_content(); ?>
			      <?php acf_form($story_form); ?>

					<?php else : ?>
            <div class="alert alert-warning" role="alert">
							<strong>Oh no!</strong> You must login to tell your story.
						</div>
            <?php the_content(); ?>
            <?php get_template_part('/inc/login-register'); ?>




					<?php endif; ?>
				</section>

			</div>

		</article>
		<!-- /article -->
		<footer class="single_footer row">
			<div class="col-md-8 col-md-offset-2">
				<?php comments_template(); ?>
			</div>
		</footer>

	<?php endwhile; endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
