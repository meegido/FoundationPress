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
	<article id="post-<?php the_ID(); ?>"  class="full-card" >
		<header>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="row">
					<?php the_post_thumbnail( '', array('class' => 'border-img-card') ); ?>
				</div>
			<?php endif; ?>
			<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span>
				<?php $tags = get_the_tags(); 
					foreach ($tags as $tag) {
						echo '<a href="#">'. $tag->name .'</a>';
					}
				 ?>
			</span>
		</header>
		<div class="entry-content">
			<section class="excerpt-content">
				<?php the_excerpt( __( 'Continue reading...', 'foundationpress' ) ); ?>
			</section>
			<section>
				<p><?php show_date(get_the_ID()); ?></p>
				<p><?php show_price(get_the_ID()); ?></p>
				<br>
			</section>
		</div>
		<footer>

		</footer>
	</article>
</div>