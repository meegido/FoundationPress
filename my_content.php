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

<article id="post-<?php the_ID(); ?>"  class="small-2 large-4 columns block-grid full-card" >
	<header>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="row">
				<?php the_post_thumbnail( '', array('class' => 'border-img-card') ); ?>
			</div>
		<?php endif; ?>
		<span><?php the_taxonomies(); ?></span>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-content">
		<?php the_excerpt( __( 'Continue reading...', 'foundationpress' ) ); ?>
		<span><?php show_date(get_the_ID()); ?></span>
		<br>
		<span><?php show_price(get_the_ID()); ?></span>
		<br>
		
	</div>
	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
</article>
	