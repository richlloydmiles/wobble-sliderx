<?php
/**
 * This is the content for the wxslides shortcode
 **/
query_posts( array( 'post_type' => 'wxslide' , 'wxsliders' => $a['slug'] ) );?>
<style>
	.background-img {
	width: 100%;
	/*set the height to a fix value*/
	background-repeat: no-repeat;
	/*set the focal point*/
	background-position: top;
	background-size: cover;
	}	

</style>
<ul class="bxslider">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();?>
	<li><div class="background-img" style="height:260px;background-image:url('<?php echo wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'image_field', TRUE ), 'full' )[0]; ?>');">
	<?php echo the_title(); ?>
	<?php echo get_post_meta( get_the_ID(), 'content_field', TRUE ); ?>
</div>
</li>
<?php endwhile; endif; wp_reset_query(); 
?>
</ul>
<script>
	jQuery(document).ready(function($) {
		jQuery('.bxslider').bxSlider({
			minSlides: 1,
			maxSlides: 3,
			slideWidth: 360,
			slideMargin: 10
		});		
	});
</script>