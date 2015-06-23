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

<div class="grid-row small-2 large-4 columns">
	<article id="post-<?php the_ID(); ?>"  class="full-card">
		<?php if ( has_post_thumbnail() ) : ?>
				<div>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
					<div class="card-image" style="background-image: url('<?php echo $thumb['0'];?>')">

					</div>
				</div>
			<?php endif; ?>
		<header>
			<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-content">
			<section class="excerpt-content">
				<?php the_excerpt( __( 'Continue reading...', 'foundationpress' ) ); ?>
			</section>
			<aside class="bottom-card">
			
				<span class="tag-label">
					<?php $tags = get_the_tags(); 
						foreach ($tags as $tag) {
							echo '<a href="#">'. $tag->name .'</a>';
						}
					 ?>
				</span>
				<section >
					<p><?php show_date(get_the_ID()); ?></p>
				</section>
			
			</aside>
		</div>
	</article>
</div>