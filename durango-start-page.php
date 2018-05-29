<?php
/**
 * Template Name: Durango Start Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">

					<!-- Show the header first -->
					<h2>The Studio</h2>

					<!-- Show the random quotes -->
					<?php $args = array( 'post_type' => 'quotes', 'posts_per_page' => 1, 'showposts' => 1, 'orderby' => 'rand' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="quote">
							<?php the_content(); ?>
						</div>
					<?php endwhile;	?>

					<!-- Show the Durango Pages -->
					<?php $args = array( 'post_type' => 'durango_pages', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php $page_link = get_post_meta( get_the_ID(), 'page_link', true ); ?>
						<a name="<?php echo $page_link; ?>"></a>
						<!-- <h2><?php the_title(); ?></h2> -->
						<?php the_content(); ?>
						<hr/>
					<?php endwhile;	?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
/** get_sidebar(); */
 get_footer();