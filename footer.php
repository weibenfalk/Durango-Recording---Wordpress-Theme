<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Durango_Recording
 */

?>
	</div><!-- #content -->

	<script>
        jQuery( document ).ready( function( $ ) {

            var body = document.body,
            doc = document.documentElement;

            $(window).scroll(function () {
                body.style.backgroundPosition = "0px " + ( 0 -(Math.max(doc.scrollTop, body.scrollTop) / 4) ) + "px";
            });

            var images = ['durango_bg2.jpg', 'durango_bg3.jpg', 'durango_bg4.jpg', 'durango_bg5.jpg'];
            jQuery('body').css({'background-image': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')'});

            var logos = ['images/logo_white.png', 'images/logo_green.png', 'images/logo_red.png', 'images/logo_ochra.png'];
            jQuery('.header-logo').attr("src", logos[Math.floor(Math.random() * images.length)] );
        });
    </script>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>