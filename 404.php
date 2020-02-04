<?php get_header(); ?>

<div id="main-content">
	<!-- <div class="container"> -->
		<!-- <div id="content-area" class="clearfix"> -->
			<!-- <div id="left-area"> -->
        <article id="post-0" class="page type-page" <?php post_class( 'et_pb_post not_found' ); ?>>
          <div id="et-boc" class="et-boc">
            <div class="et_builder_inner_content et_pb_gutters3">
              <?php echo do_shortcode('[et_pb_section global_module="954"][/et_pb_section]'); ?>
              <?php echo do_shortcode('[et_pb_section global_module="955"][/et_pb_section]'); ?>
              <?php echo do_shortcode('[et_pb_section global_module="902"][/et_pb_section]'); ?>
              <?php echo do_shortcode('[et_pb_section global_module="903"][/et_pb_section]'); ?>
            </div>
          </div>
				</article> <!-- .et_pb_post -->
			<!-- </div> #left-area -->
		<!-- </div> #content-area -->
	<!-- </div> .container -->
</div> <!-- #main-content -->

<?php get_footer();