			<!-- footer -->
			<footer class="footer fluid-container row" role="contentinfo">

                <?php if(!is_home()) : ?>
                <div class="footer_widgets col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <?php dynamic_sidebar( 'widget-col-1' ); ?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <?php dynamic_sidebar( 'widget-col-2' ); ?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <?php dynamic_sidebar( 'widget-col-3' ); ?>
                    </div>

                </div>


				<!-- copyright -->
				<div class="copyright col-md-12 col-sm-12 col-xs-12">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.</br>
					Design and Development by <a href="http://www.thejameswilliam.com" title="Designer">James W. Johnson</a>.
				</div>
				<!-- /copyright -->
                <?php endif; ?>
			</footer>
			<!-- /footer -->

		<?php wp_footer(); ?>

		<!-- analytics -->


	</body>
</html>
