<?php
/**
 * Durango Recording Equipment
 *
 * @package Durango_Recording
 */

?>
<div style="margin:0 0 40px 0; padding:0 0 0 0;height:67px">
	<a class="buttonlink" href="#artists" data-toggle="collapse">Reference Artists</a>
</div>

<div id="artists" class="collapse">
	<div class="row">
		<?php $args = array( 'post_type' => 'artists', 'posts_per_page' => 3, 'showposts' => 3);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="col-sm-4">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php
