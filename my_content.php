<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<li>
	<article id="post-<?php the_ID(); ?>"  class="full-card">
		<?php if ( has_post_thumbnail() ) : ?>
				<div>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
					<div class="card-image" style="background-image: url('<?php echo $thumb['0'];?>')">

					</div>
				</div>
			<?php endif; ?>
		<header>
		<aside class="headband-card <?php echo get_post_custom_values('stage-district')[0];?>">
			
			<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span class="card-date"><?php show_date(get_the_ID()); ?></span>
			<span class="tag-label">
					<?php $tags = get_the_tags(); 
						foreach ($tags as $tag) {
							$permalink = get_post_custom_values('route-link')[0];
							echo '<a href="'. $permalink .'">'. "#".$tag->name .'</a>';
						}
					 ?>
				</span>
		</aside>
			
		</header>
		<div class="entry-content">
			<section class="excerpt-content">
				<?php the_excerpt( __( 'Continue reading...', 'foundationpress' ) ); ?>
			</section>
			
		</div>
	</article>
</li>

